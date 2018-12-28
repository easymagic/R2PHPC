<?php 
/**

@Inject(@models/entityv2/EntityLogin);

*/
class MerchantLogin{

  

  function Login(){
    $this->EntityLogin->Login('merchant');
  }


}