<?php 
define('ROOT',__DIR__);
require_once 'vendor/autoload.php';
include 'config.php';
include 'classes/DB.class.php';
include 'langs.php';
include 'functions.php';
include 'admin/actions.php';


if(!$_POST) include 'admin/blocks/header.php';




  if (!empty($_GET['action']) && file_exists('admin/'.$_GET['action'].'.php')){
    include 'admin/'.$_GET['action'].'.php';
  }else{
    include 'admin/404.php';
  }


if(!$_POST) include 'admin/blocks/footer.php';



