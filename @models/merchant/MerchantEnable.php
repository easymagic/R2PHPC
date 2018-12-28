<?php 
/**

@Inject(@models/entityv2/EntityEnableField);

*/

class MerchantEnable{

   

   function Enable($id){

   	  $this->EntityEnableField->DisableField('merchant','status',$id);

   }




}