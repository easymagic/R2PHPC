<?php 

class EntitySum{

  
  function GetSum($entity,$field){
     
     global $db_cols;
     global $db_records;

     $db_cols = " SUM($field) as fieldSum ";

  	 DbRead($entity);
     
     return $db_records[0]['fieldSum'];

  }


}