<?php 
 // this note is about how to get a DOMNode's outerHTML and innerHTML.
    // $dom = new DOMDocument('1.0','UTF-8');
//     $dom = '<table  class="table table-striped table-bordered" cellspacing="0" width="100%">               
//               <tbody>
//                     <tr>
//                         <td>Firstname</td>
//                         <td><span style="color:#006666; font-weight:bold">DAVID</span></td>                        
//                     </tr>
//                     <tr>
//                         <td>Lastname</td>
//                         <td><span style="color:#006666; font-weight:bold">UGBE</span></td>
                      
//                     </tr>
                   
//                     <tr>
//                         <td>Polling Unit</td>
//                         <td><span style="color:#006666; font-weight:bold">OLORUNLOGBON ST. BETWEEN HOUSE NOS. 50 & 52</span></td>
                      
//                     </tr>
//                     <tr>
//                         <td>VIN</td>
//                         <td><span style="color:#006666; font-weight:bold">90F5AEF5A4296557578</span></td>
                      
//                     </tr>
//                     <tr>
//                         <td>Date of Birth</td>
//                         <td><span style="color:#006666; font-weight:bold">22/8/1976</span></td>
                      
//                     </tr>
//                     <tr>
//                         <td>Gender</td>
//                         <td><span style="color:#006666; font-weight:bold">Male</span></td>
                      
//                     </tr>                   
                    
//                 </tbody>
//             </table>
// ';    

// $r = file_get_contents('http://52.23.145.6/web/site/votersearch?state_id=24&lastname=Ugbe&vin=6557578&year=&day=&month=');


function CleanKey($r){
  $r = explode('</td>', $r);
  return $r[0];
}

function CleanValue($r){
  $r = explode('>', $r);
  $r = $r[1];
  $r = explode('<', $r);
  $r = $r[0];
  return $r;
}


function Verify($state_id,$lastname,$vin){
 
 $r = file_get_contents("http://52.23.145.6/web/site/votersearch?state_id=$state_id&lastname=$lastname&vin=$vin&year=&day=&month=");

$config = array();
$config['error'] = false;
$config['message'] = 'Verification successful.';
// echo $r;
$r = explode('<td>', $r);

if (count($r) > 1){

	array_shift($r);
	// array_pop($r);

	$key = '';
	$value = '';
	foreach ($r as $k=>$v){
	  
	  if (pow(-1, $k) == 1){
	    $key = CleanKey($v);
	  }else{
	    $value = CleanValue($v);
	  }

	  $config[$key] = $value;

	}
  
}else{
	$config['error'] = true;
	$config['message'] = 'Verification Failed!!!';
}

return $config;

  
}

//votersearch?state_id=24&lastname=Ugbe&vin=6557578&year=&day=&month=');
// $r = Verify($state_id='24',$lastname='Ugbe',$vin='6557578');

// print_r($r);


// $r = explode('<td>', $dom);
// array_shift($r);
// array_pop($r);
// $config = array();
// $key = '';
// $value = '';
// foreach ($r as $k=>$v){
  
//   if (pow(-1, $k) == 1){
//     $key = CleanKey($v);
//   }else{
//     $value = CleanValue($v);
//   }

//   $config[$key] = $value;

// }

// print_r($config);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<style type="text/css">
		input,select{

    border: 1px solid #555;
    padding: 11px;
    margin: 11px;

		}

		.c1{
			margin: 11px;
		}

	</style>

<h2 style="color: green;">Card Verification</h2>


<?php 
 if (!empty($_POST)){

?>
<div style="
    display: inline-block;
    border: 1px solid #777;
    border-radius: 11px;
    padding: 5px;
    background-color: #eee;
">

<?php   
   extract($_POST);
   $state_id = $StateID;
   $lastname = $LastName;
   $vin = $Card7;

   $r = Verify($state_id,$lastname,$vin);
   $config = $r;
   extract($config);
   // print_r($r);

   if ($r['error']){
     echo '<b><u>Pin Verification Failed.</u></b>';
   }else{
     echo '<b><u>Verification Successful.</u></b><br />';
     // print_r($r);
     ?>

     <b>
      First Name
     </b><?php echo $Firstname; ?><br />


     <b>
      Last Name
     </b><?php echo $Lastname; ?><br />

     <b>
      Polling Unit
     </b><?php echo $config['Polling Unit']; ?><br />


     <b>
      VIN
     </b><?php echo $VIN; ?><br />


     <b>
      Date of Birth
     </b><?php echo $config['Date of Birth']; ?><br />

     <b>
       Gender
     </b><?php echo $Gender; ?><br />


     <?php 
   }

// print_r($r);


?>
</div>
<?php  

 }
?>  




  <form method="post">
  	<div class="c1">
  		<b>Select State</b>
  	</div>
  	<div>
<select class="form-control" name="StateID">
<option value="">--Select State--</option>
<option value="1">ABIA</option>
<option value="2">ADAMAWA</option>
<option value="3">AKWA IBOM</option>
<option value="4">ANAMBRA</option>
<option value="5">BAUCHI</option>
<option value="6">BAYELSA</option>
<option value="7">BENUE</option>
<option value="8">BORNO</option>
<option value="9">CROSS RIVER</option>
<option value="10">DELTA</option>
<option value="11">EBONYI</option>
<option value="12">EDO</option>
<option value="13">EKITI</option>
<option value="14">ENUGU</option>
<option value="37">FCT</option>
<option value="15">GOMBE</option>
<option value="16">IMO</option>
<option value="17">JIGAWA</option>
<option value="18">KADUNA</option>
<option value="19">KANO</option>
<option value="20">KATSINA</option>
<option value="21">KEBBI</option>
<option value="22">KOGI</option>
<option value="23">KWARA</option>
<option value="24">LAGOS</option>
<option value="25">NASARAWA</option>
<option value="26">NIGER</option>
<option value="27">OGUN</option>
<option value="28">ONDO</option>
<option value="29">OSUN</option>
<option value="30">OYO</option>
<option value="31">PLATEAU</option>
<option value="32">RIVERS</option>
<option value="33">SOKOTO</option>
<option value="34">TARABA</option>
<option value="35">YOBE</option>
<option value="36">ZAMFARA</option>
</select>  		
  	</div>


  	<div  class="c1">
  		<b>
  		  	Last Name
  		</b>
  	</div>
  	<div>
  		<input type="text" name="LastName" />
  	</div>


  	<div  class="c1">
  		<b>
  		  	Last 7-Digits of your Voter's Card Number
  		</b>
  	</div>
  	<div>
  		<input type="text" name="Card7" />
  	</div>


  	<div  class="c1">
  	 <button type="submit">Check Card Validity</button>
  	</div>
  	
  </form>


</body>
</html>
