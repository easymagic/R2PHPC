<?php 
/**

@Inject(@models/entityv2/EntityRead);

*/
class MerchantGetList{


  function GetList(){
  	global $data;

  	$this->EntityRead->Read('merchant');

  	return $data['merchant_data'];
  }



}