<?php

  session_start([
      'cache_limiter' => 'private' ,
      'read_and_close' => 'true' ,
      ]) ;
  header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
  header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  //設定樣板
  require("../lib/libs/Smarty.class.php");
  define ( 'APP_PATH' , '../'  );
  $smarty = new Smarty() ;
  $smarty ->template_dir = APP_PATH . "templates" ;
  $smarty ->compile_dir = APP_PATH . "templates_c" ;
  $smarty ->config_dir = APP_PATH . "configs" ;
  $smarty ->cache_dir = APP_PATH . "cache" ;

?>
