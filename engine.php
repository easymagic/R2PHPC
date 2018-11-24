<?php 

// if (get_magic_quotes_gpc()) {
//     $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
//     while (list($key, $val) = each($process)) {
//         foreach ($val as $k => $v) {
//             unset($process[$key][$k]);
//             if (is_array($v)) {
//                 $process[$key][stripslashes($k)] = $v;
//                 $process[] = &$process[$key][stripslashes($k)];
//             } else {
//                 $process[$key][stripslashes($k)] = stripslashes($v);
//             }
//         }
//     }
//     unset($process);
// }
 
 require_once('functions/functions.php');
 require_once('engine_helpers/engine-libs.php');
 require_once('engine_helpers/engine-config.php');
 require_once('engine_helpers/engine-db.php');
 require_once('engine_helpers/engine-pdo.php');

 load_traits();
 listen_for_action();

 
 function is_include_supported($file){

   $supported = array('php'); 	

   $r = explode('.', $file);

   $ext = end($r);

   return in_array($ext, $supported);

 }

 //handle hooks on classes
 function GetHook($file){
  $r = explode('.', $file);
  $r = explode('/', $r[0]);
  $r = implode('_', $r);
  return $r;
 }

 function GetDirFiles($dir){
    $r = scandir($dir);
    $r = array_diff($r, array('.','..'));
    return $r;
 }

 function GetPlugins(){
  
  static $plugins = null;

  if ($plugins == null){
    $plugins = array(); 
    // $r = scandir('plugins');
    // $r = array_diff($r, array('.','..'));
    $plugins0 = GetDirFiles('plugins'); // $r;
    foreach ($plugins0 as $k=>$v){

      // is_dir(filename) enabled
      if (is_dir('plugins/' . $v) && substr($v, -8) == '_enabled'){

         $plugins1 = GetDirFiles('plugins/' . $v);
         foreach ($plugins1 as $k1=>$v1){
           
             require_once('plugins/' . $v . '/' . $v1);
             $v1 = explode('.', $v1);
             $obj = $v1[0];
             $plugins[$v1[0]] = new $obj();           

         }

      }


    }
  }

  return $plugins;

 }

 function CallProxy($obj,$method,$args=array()){
   $r = '';

   if (is_object($obj)){
     if (method_exists($obj, $method)){
      $r = call_user_func_array(array($obj,$method), $args);
     }
   }

   return $r;
 }

 function RunHooks($hook){
  // $r = end($r);
  $plugins = GetPlugins();
  $r = '';

  foreach ($plugins as $k=>$plugin){
      // CallProxy();
      $t = CallProxy($plugin,$hook,array($plugins));
      if (is_array($t)){
        if (empty($r)){
           $r = array();
        }
        $r = array_merge($r,$t);
      }else{
        if (!is_array($r)){
         $r.= $t;  
        }
      }
      
  }

  return $r;

 }



  extract($_REQUEST);

  try {
    

    //check for exceptions start
        if (empty($__q__)){
          $__q__ = 'index.php'; 
        } 
        
        if (file_exists($__q__)){
          if (is_include_supported($__q__)){
           $_SERVER['PHP_SELF'] = $__q__; 
           $hook = GetHook($__q__);
           
           //Process action hooks here
           if (isset($_POST) && !empty($_POST)){
            $action_permission_vars = RunHooks($hook . '_Action_Permission');
            $action_vars = RunHooks($hook . '_Action');
            extract($action_permission_vars);
            extract($action_vars);
           }
           
           RunHooks($hook . '_Permission');
           RunHooks('Before_' . $hook);
           $global_vars = RunHooks('Inject_Global');
           // print_r($global_vars);
           extract($global_vars);
           $vars = RunHooks('Inject_' . $hook);
           // print_r($vars);
           extract($vars);
           include($__q__);
           RunHooks($hook . '_After');

          }
        }

       //check for exceptions stop




  } catch (Exception $e) {
    
    echo $e->getMessage();

  }  
  // echo $__q__;
  // $__q__ = $_REQUEST['__q__'];
 
 

