<?php 

/**

@Inject(@models/entityv2/EntityRead);

*/

class AdminGetList{


   
   function GetList(){
   	global $data;

   	$this->EntityRead->Read('admin');

   	return $data['admin_data'];
   	
   }


}