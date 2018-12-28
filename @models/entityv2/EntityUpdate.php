<?php 

class EntityUpdate{



   function DoUpdate($entity,$data,$criteria){

   	 global $db_where;

   	 $db_where = " where ($criteria)";
     
     DbUpdate($entity,$data);
     
   }




}