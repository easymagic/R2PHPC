<?php 
/**

@Inject(@models/entityv2/EntityChangePassword);

*/

class EntityChangePasswordReset{



   function ChangePasswordReset($entity,$id,$check){

   	 global $data;

   	 $data['error'] = false;

   	 if (md5('check' . $id) == $check){
         // $this->EntityChangePassword->ChangePasswordReset('user',$id,$check,'id=$id');
         $this->EntityChangePassword->ChangePassword($entity,"id=$id");

   	 }else{
   	 	$data['error'] = true;
   	 	$data['message'] = 'Invalid password reset link!';
   	 }
     
   }


}