<?php 

/**

@Inject(@models/entityv2/EntityUpdate);

*/

class AdminUpdate{
  



  function Update($id){
    global $postData;
    global $data;

    $this->EntityUpdate->DoUpdate('admin',$postData,"id=$id");

    $data['message'] = 'Account saved.';
    $data['error'] = false;

  }


}