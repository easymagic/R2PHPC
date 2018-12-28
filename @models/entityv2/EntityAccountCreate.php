<?php 
/**

@Inject(@models/entityv2/EntityCreate,
        @models/entityv2/EntityRead);

*/

class EntityAccountCreate{

  

  function AccountCreate($entity){
    global $data;
    global $newID;
    global $postData;

    $data['error'] = false;
    $data['message'] = '';

    $this->CheckPassword();
    $this->CheckDuplicate($entity);    
    
    if (!$data['error']){
    	$this->EntityCreate->DoCreate($entity,$postData); 
    	$data['message'] = ucfirst($entity) . ' account created successfully.';
    } 	

  }

  private function CheckDuplicate($entity){
   global $data;
   global $db_where;
   global $postData;
   
   $db_where = " where (email = '" . $postData['email'] . "') ";
   $this->EntityRead->Read($entity);
   
   if (count($data[$entity . '_data']) > 0){
      $data['error'] = true;
      $data['message'].= 'An account with this <b>E-mail</b> already exist!';
   }

  }

  private function CheckPassword(){
   global $data;
   global $post;
   global $postData;
  
   if ($post['password1'] != $post['password2'] || empty($post['password1'])){
    $data['error'] = true;
    $data['message'].= 'Passwords do not match!<br />';
   }else{
   	$postData['password'] = $post['password1'];
   }

  }




}