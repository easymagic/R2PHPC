<?php 

/**

@Inject(@models/entityv2/EntityUpdate);

*/
class MerchantUpdate{

  


  function Update($id){
    global $postData;
    global $data;
  	$this->EntityUpdate->DUpdate('merchant',$postData,"id=$id");
  	$data['error'] = false;
  	$data['message'] = 'Account saved.';

  }



}