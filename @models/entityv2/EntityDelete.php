<?php 

class EntityDelete{

   

   function DoDelete($entity,$criteria){

     global $db_where;

     $db_where = " where ($criteria) "; //$where;

     DbDelete($entity);
 
     
   }


}