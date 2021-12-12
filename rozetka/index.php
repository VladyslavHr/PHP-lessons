<?php 
define('ROOT',__DIR__);
session_start();
require_once 'vendor/autoload.php';
include 'config.php';
include 'classes/DB.class.php';
include 'classes/simple_html_dom.php';
include 'langs.php';
include 'functions.php';
include 'actions.php';
include 'blocks/header.php';

  if (!empty($_GET['action']) && file_exists('pages/'.$_GET['action'].'.php')){
    include 'pages/'.$_GET['action'].'.php';
    
  }elseif(!isset($_GET['action'])){

    include 'pages/main.php';

  }else{

    include 'pages/404.php';

  }

  include 'blocks/left-menu.php';


 include 'blocks/footer.php';
