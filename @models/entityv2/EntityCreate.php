<?php 

class EntityCreate{



   function DoCreate($entity,$data){
     global $newID;
     DbCreate($entity,$data);
     return $newID;
   }




}