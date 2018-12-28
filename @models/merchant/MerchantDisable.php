<?php 
/**

@Inject(@models/entityv2/EntityDisableField);

*/

class MerchantDisable{

   

   function Disable($id){

   	  $this->EntityDisableField->DisableField('merchant','status',"id=$id");

   }




}