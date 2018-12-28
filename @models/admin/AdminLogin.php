<?php 

/**

@Inject(@models/entityv2/EntityLogin);

*/

class AdminLogin{

  

  function Login(){
    $this->EntityLogin->Login('admin');
  }



}