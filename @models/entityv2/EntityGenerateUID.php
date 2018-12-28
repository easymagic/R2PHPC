<?php 

/**

@Inject(@models/entityv2/EntityUpdate);

*/


class EntityGenerateUID{



   function GenerateUID($entity,$field,$id,$criteria,$len=5){ //Standardization (email,password,status)
   	 global $UID;

     $this->EntityUpdate->DoUpdate($entity,array($field=>$this->GenUID($id,$len)),$criteria);      

   }

   private function GenUID($id,$len){
   	 global $UID;

     $r = md5($id);
     $r = substr($r, -1 * $len);
     $UID = $r;
     return $r;
   }




}