<?php 

class TransactionCallPayStackTransactionCheck{

   

   function CallPayStackTransactionCheck($reference){

   	 global $payStackResponse;
   	 global $payStackSecret;
   	 global $data;
   	 global $payStackPaymentStatus;


			$curl = curl_init();
			// $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
			// if(!$reference){
			  // die('No reference supplied');
			// }

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_HTTPHEADER => [
			    "accept: application/json",
			    "authorization: Bearer $payStackSecret",
			    "cache-control: no-cache"
			  ],
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			if($err){
				$data['error'] = true;
				$data['message'] = 'Curl returned error: ' . $err;
				// there was an error contacting the Paystack API
			  // die('Curl returned error: ' . $err);
			}

			$tranx = json_decode($response);

			if(!$tranx->status){
				$data['error'] = true;
				$data['message'] = 'API returned error: ' . $tranx->message;				
			  // there was an error from the API
			  // die('API returned error: ' . $tranx->message);
			}

			if('success' == $tranx->data->status){
				$payStackPaymentStatus = true;
				$dt = get_object_vars($tranx->data);

				foreach ($dt as $k=>$v){
		          $payStackResponse[$k] = $v;
				}

			  // transaction was successful...
			  // please check other things like whether you already gave value for this ref
			  // if the email matches the customer who owns the product etc
			  // Give value
			}



   }


}