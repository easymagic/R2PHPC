<?php 

/**

@Inject(@models/entityv2/EntityChangePassword);

*/

class AdminChangePassword{


   
   function ChangePassword($id){

   	$this->EntityChangePassword->ChangePassword('admin',"id=$id");

   }


}