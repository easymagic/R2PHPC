<?php 
/**

@Inject(@models/entityv2/EntityUpdate);

*/

class EntityChangePassword{



   function ChangePassword($entity,$criteria){

	   	global $post;
	   	global $data;

	   	$data['error'] = false;
	   	$data['message'] = '';
	    
	    if ($post['password1'] != $post['password2'] || empty($post['password1'])){
	      $data['message'] = 'Passwords do not match!';
	      $data['error'] = true;
	    }else{
	      $data['message'] = 'Passwords changed successfully.';
	      $this->EntityUpdate->DoUpdate($entity,array('password'=>$post['password1']),$criteria);
	    }

     
   }




}