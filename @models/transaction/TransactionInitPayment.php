<?php 
/**

@Inject(@models/entityv2/EntityCreate,
        @models/entityv2/EntityGenerateUID,
        @models/entityv2/EntityRead,
        @models/transaction/TransactionCallPayStackInit,
        @models/entityv2/EntityUpdate);

*/

class TransactionInitPayment{

  


   function InitPayment(){//
   	global $data;
   	global $payStackResponse;
   	global $newID;
   	global $postData;
   	global $UID;

   	$data['error'] = false;
   	$data['message'] = '';

   	$this->CheckMerchantSecret();
   	$this->CheckDuplicateMerchantReference();
   	$this->CheckParams();

   	
   	if (!$data['error']){
   	 
   	 $email = $postData['email'];
   	 $amount = $postData['amount'];

     $this->TransactionCallPayStackInit->CallPayStackInit($email,$amount);
      if (!$data['error']){
	     $postData['paystack_echo_init_data'] = json_encode($payStackResponse);
	     $postData['date_created'] = date('Y-m-d h:i:s');

	     $this->EntityCreate->DoCreate('transaction',$postData);
	     $this->EntityGenerateUID->GenerateUID('transaction','interpay_reference',$newID,"id=$newID",7);
	     $this->EntityUpdate->DoUpdate('transaction',
	     	array('interpay_auth_url'=>BASE_URL . 'WebPayment/GateWay/' . $UID,
	     		  'paystack_reference'=>$payStackResponse['data']['reference'],
	     		  'paystack_auth_url'=>$payStackResponse['data']['authorization_url']),"id=$newID");
	     // $postData['interpay_auth_url'] = BASE_URL . 'WebPayment/GateWay/';
	     $data['interpay_reference'] = $UID;
	     $data['interpay_auth_url'] = BASE_URL . 'WebPayment/GateWay/' . $UID;
      }
   	}


   }

   private function CheckDuplicateMerchantReference(){
   	global $db_where;
   	global $postData;
   	global $data;

   	$db_where = " where (merchant_reference = '" . $postData['merchant_reference'] . "')";
   	
   	$this->EntityRead->Read('transaction');

   	if (count($data['transaction_data']) > 0){
      $data['error'] = true;
      $data['message'] = 'Duplicate merchant_reference (' . $postData['merchant_reference'] . ')!';
   	}

   }

   private function CheckMerchantSecret(){//merch_secret
     global $db_where;
     global $post;
     global $data;
     global $postData;

     // print_r($post);

     if (isset($post['merch_secret'])){
	     $db_where = " where (merch_secret = '" . $post['merch_secret'] . "')";

	     $this->EntityRead->Read('merchant');

	     if (count($data['merchant_data']) <= 0){
	       $data['error'] = true;
	       $data['message'] = 'Invalid Merchant!,';
	     }else{
	     	$postData['merchant_id'] = $data['merchant_data'][0]['id'];
	     }
     }else{
     	$data['error'] = true;
     	$data['message'] = 'merch_secret param missing!,';
     }


   }

   private function CheckParams(){
   	global $postData;
   	global $data;

   	if (!isset($postData['merchant_reference'])){
      $data['message'].='Missing (merchant_reference)!';
      $data['error'] = true;
   	}else if (!isset($postData['email'])){
      $data['message'].='Missing (email)!';
      $data['error'] = true;
   	}else if (!isset($postData['amount'])){
      $data['message'].='Missing (amount)!';
      $data['error'] = true;      
   	}else if (!isset($postData['merchant_feedback_page'])){
      $data['message'].='Missing (merchant_feedback_page)!';
      $data['error'] = true;      
   	}


   }



}