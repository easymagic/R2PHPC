<?php 

/**

@Inject(@models/entityv2/EntityUpdate);

*/

class EntityEnableField{



   function EnableField($entity,$field,$criteria){
     global $data;

     $data['error'] = false;

   	 $this->EntityUpdate->DoUpdate($entity,array($field=>1),$criteria);

   	 $data['message'] = $field . ' enabled.';

     
   }




}