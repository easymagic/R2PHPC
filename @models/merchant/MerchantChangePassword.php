<?php 
/**

@Inject(@models/entityv2/EntityChangePassword);

*/

class MerchantChangePassword{

  
   function ChangePassword($id){
     $this->EntityChangePassword->ChangePassword('merchant',"id=$id");
   }

}