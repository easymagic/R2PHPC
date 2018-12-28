<?php 

class TransactionCallPayStackInit{

   

   function CallPayStackInit($email,$amount){

   	 global $payStackResponse;
   	 global $payStackSecret;
   	 global $data;

		$curl = curl_init();

		// $email = "your@email.com";
		$amount*= 100;  //the amount in kobo. This value is actually NGN 300
       //sk_test_36658e3260b1d1668b563e6d8268e46ad6da3273
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode([
		    'amount'=>$amount,
		    'email'=>$email,
		  ]),

		  CURLOPT_HTTPHEADER => [
		    "authorization: Bearer $payStackSecret", //replace this with your own test key
		    "content-type: application/json",
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
		}else{

			$tranx = json_decode($response, true);
			// print_r($tranx);

			if(!$tranx['status']){
			  // there was an error from the API
			  $data['error'] = true;
			  $data['message'] = 'API returned error: ' . $tranx['message'];			
			  // print_r('API returned error: ' . $tranx['message']);
			}

			// comment out this line if you want to redirect the user to the payment page
			// print_r($tranx);
			foreach ($tranx as $k=>$v){
	          $payStackResponse[$k] = $v;
			}

			// redirect to page so User can pay
			// uncomment this line to allow the user redirect to the payment page
			//header('Location: ' . $tranx['data']['authorization_url']);


		}


   }


}