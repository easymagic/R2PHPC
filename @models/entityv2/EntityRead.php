<?php 

class EntityRead{

   

   function Read($entity){     
     global $db_records;
     global $data;
     // echo "$entity";
     DbRead($entity);

     $data[$entity . '_data'] = $db_records;
 
     return $db_records;
   }


}