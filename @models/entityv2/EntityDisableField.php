<?php 

/**

@Inject(@models/entityv2/EntityUpdate);

*/

class EntityDisableField{



   function DisableField($entity,$field,$criteria){
     global $data;

     $data['error'] = false;

   	 $this->EntityUpdate->DoUpdate($entity,array($field=>0),$criteria);

   	 $data['message'] = $field . ' disabled.';

     
   }




}