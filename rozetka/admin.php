<?php 
define('ROOT',__DIR__);
require_once 'vendor/autoload.php';
include 'classes/DB.class.php';
include 'functions.php';
include 'admin/auth.php';
include 'admin/blocks/header.php';

  if (!empty($_GET['action']) && file_exists('admin/'.$_GET['action'].'.php')){
    include 'admin/'.$_GET['action'].'.php';
  }else{
    include 'admin/404.php';
  }


 include 'admin/blocks/footer.php';