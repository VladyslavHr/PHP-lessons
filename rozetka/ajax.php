<?php 
define('ROOT',__DIR__);
session_start();
if (!empty($argv)) {
  foreach ($argv as $k=>$v)
  {
      if ($k==0) continue;
      $it = explode("=",$argv[$k]);
      if (isset($it[1])) $_GET[$it[0]] = $it[1];
  }
}
require_once 'vendor/autoload.php';
include 'config.php';
include 'classes/DB.class.php';
include 'classes/simple_html_dom.php';
include 'langs.php';
include 'functions.php';
include 'actions.php';
// include 'blocks/header.php';

  if (!empty($_GET['action']) && file_exists('pages/'.$_GET['action'].'.php')){
    include 'pages/'.$_GET['action'].'.php';
    
  }elseif(!isset($_GET['action'])){

    include 'pages/main.php';

  }else{

    include 'pages/404.php';

  }

  // include 'blocks/left-menu.php';


//  include 'blocks/footer.php';
