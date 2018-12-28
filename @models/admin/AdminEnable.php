<?php 

/**

@Inject(@models/entityv2/EntityEnableField);

*/

class AdminEnable{

  

   function Enable($id){
     $this->EntityDisableField->EnableField('admin','status',"id=$id");
   }


}