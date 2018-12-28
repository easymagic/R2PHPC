<?php 

/**

@Inject(@models/entityv2/EntityDisableField);

*/

class AdminDisable{

  

   function Disable($id){
     $this->EntityDisableField->DisableField('admin','status',"id=$id");
   }


}