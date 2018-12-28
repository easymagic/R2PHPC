<?php 

/**

@Inject(@models/entityv2/EntityAccountCreate,
        @models/entityv2/EntityGenerateUID);

*/

class MerchantCreate{


  function Create(){
    global $newID;

    $this->EntityAccountCreate->AccountCreate('merchant');
    $this->EntityGenerateUID->GenerateUID('merchant','merch_secret',$newID,"id=$newID",11);

  }


}