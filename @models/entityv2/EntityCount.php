<?php 

class EntityCount{

   

   function GetCount($entity){
     global $db_cols;
     global $db_records;

     $db_cols = ' count(*) as recordCount ';

     DbRead($entity);
 
     return $db_records[0]['recordCount'];
   }


}