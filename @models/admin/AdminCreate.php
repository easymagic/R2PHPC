<?php 
/**

@Inject(@models/entityv2/EntityAccountCreate);

*/

class AdminCreate{

  

  function Create(){
    $this->EntityAccountCreate->AccountCreate('admin');
  }


}