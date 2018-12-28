<?php 
/**

@Inject(@models/entityv2/EntityRead);

*/


class EntitySendPasswordReset{



   function SendPasswordReset($entity,$email){

   	 global $db_where;
   	 global $data;
   	 global $emailQueue;
     global $from;

   	 $data['error'] = false;

   	 $db_where = " where (email = '" . $email . "')";

   	 $this->EntityRead->Read($entity);

   	 if (count($data[$entity . '_data']) > 0){
        $data[$entity . '_data'] = $data[$entity . '_data'][0];

        $name = 'User';
        $data_ = $data[$entity . '_data'];
        if (isset($data_['first_name'])){
          $name = $data_['first_name'];
        }else if (isset($data_['name'])){
          $name = $data_['name'];
        }

        $message = 'Dear ' . $name . ',<br />
          Your Password-Reset request was successful,<br />
          Click ' . $this->GetResetLink($entity,'here',$data_['id']) . ' to reset your password.
          <br />
          <br />
          <br />
          Kind Regards
        ';
        $to = $data_['email'];
        $from = $from;
        $subject = 'PASSWORD RESET.';

        $emailQueue[] = array(
          'to'=>$to,
          'subject'=>$subject,
          'message'=>$message,
          'from'=>$from
        );

        $data['message'] = 'A password reset link has been sent to your E-mail.';

   	 }else{
   	 	$data['error'] = true;
   	 	$data['message'] = 'This E-mail does not exist on this platform!';
   	 }
     
   }

   private function GetResetLink($entity,$link,$id){
     $check = 'check' . $id;
     $check = md5($check);
     $r = BASE_URL . ucfirst($entity) . '/PasswordReset/' . $id . '/' . $check;
     
     return '<a href="' . $r . '">' . $link . '</a>';
   }




}