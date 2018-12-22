<?php 

$db_server = 'localhost';
$db_username = 'bytescloud_usr';
$db_password = 'E5S2Kbha9e';
$db_databasename = 'bytescloud_usr';


$db_table = '';
$db_cols = '*';
$db_where = '';
$db_group = '';
$db_having = '';
$db_sort = '';
$db_limit = '';

$db_values = '';
$db_set = '';

$db_records = array();
$db_intermediate_record = array();
$db_sql = '';
$db_connection = null;
$db_query = null;


function DbGetConnection(){
  global $db_connection;
  global $db_username;
  global $db_password;
  global $db_databasename;

	if ($db_connection == null){
	 $db_connection = mysqli_connect($db_server,
	                                 $db_username,
	                                 $db_password,
	                                 $db_databasename); // or die('Error in connection.');
	}
   
  return $db_connection; 
}


function DbResetVars(){
 global $db_table;
 global $db_cols;
 global $db_where;
 global $db_group;
 global $db_having;
 global $db_sort;
 global $db_limit;
 global $db_values;
 global $db_set;

	$db_table = '';
	$db_cols = '*';
	$db_where = '';
	$db_group = '';
	$db_having = '';
	$db_sort = '';
	$db_limit = '';

	$db_values = '';
	$db_set = '';

}


function DbExecQuery(){
 global $db_sql;
 global $db_query;

 // $db_sql = $sql;

 $db_query = mysqli_query(DbGetConnection(),$db_sql); 

 DbResetVars(); //reset vars.
 
 return $db_query;
}


function DbRead($table){
 global $db_table;
 global $db_cols;
 global $db_where;
 global $db_group;
 global $db_having;
 global $db_sort;
 global $db_limit;

 global $db_sql;
 global $db_query;
 global $db_records;
 global $db_intermediate_record;

 $db_table = $table;

 $db_sql = "SELECT $db_cols FROM $db_table $db_where $db_group $db_having $db_sort $db_limit";

 DbExecQuery();

 $db_records = array();

    
    while ($db_intermediate_record = mysqli_fetch_assoc($db_query)){

      CallAction($db_table . '_GetIntermediateRecord');	

      $db_records[] = $db_intermediate_record;

    }

    // print_r($r);
    return $db_records;
 
}

function DbGetCreateParams($data){
	global $db_values;
	global $db_cols;

	$keys = array_keys($data);
	$values = array_values($data);

	$db_cols = implode(',', $keys);

	foreach ($values as $k=>$v){
      $values[$k] = "'$v'";
	}

	$db_values = implode(',', $values);

}

function DbGetUpdateParams($data){
  
  global $db_set;

  $r = array();
  foreach ($data as $k=>$v){
    $r[] = "$k='$v'";
  }

  $db_set = implode(',', $r);

}

function DbCreate($table,$data){
  global $db_table;
  global $db_cols;
  global $db_values;
  global $db_sql;
  global $newID;
  
  $db_table = $table;
  DbGetCreateParams($data);

  $db_sql = "INSERT INTO $db_table ($db_cols) VALUES ($db_values)";

  DbExecQuery();

  $newID = mysqli_insert_id(DbGetConnection());

}

function DbUpdate($table,$data){

  global $db_table;
  global $db_set;
  global $db_sql;
  global $db_where;
  
  $db_table = $table;
  DbGetUpdateParams($data);

  $db_sql = "UPDATE $db_table SET $db_set $db_where";

  DbExecQuery();


}

function DbDelete($table){

  global $db_table;
  global $db_sql;
  global $db_where;

  $db_table = $table;

  $db_sql = "DELETE FROM $db_table $db_where";

  DbExecQuery();

}

