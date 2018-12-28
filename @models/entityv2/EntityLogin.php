<?php 

/**

@Inject(@models/entityv2/EntityRead);

*/


class EntityLogin{



   function Login($entity){ //Standardization (email,password,status)
     
     global $db_where;
     global $post;
     global $data;
     global $session;
     global $accountDisabled;

     $accountDisabled = false;

     $data['error'] = false;
     $data['message'] = '';

     $db_where = " where (email = '" . $post['email'] . "' and password = '" . $post['password'] . "')";

     $this->EntityRead->Read($entity);

     if (count($data[$entity . '_data']) > 0){
       $data[$entity . '_data'] = $data[$entity . '_data'][0];
       if ($data[$entity . '_data']['status']*1 == 1){
         $data['message'] = 'Welcome (:';
         $session[$entity . '_data'] = $data[$entity . '_data'];
       }else{
         $data['message'] = 'Your account has been disabled, please contact your administrator!';
         $data['error'] = true;
         $accountDisabled = true;
       }
     }else{
         $data['message'] = 'Invalid login!';
         $data['error'] = true;
     }
     
   }




}