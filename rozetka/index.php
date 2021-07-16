<?php 
define('ROOT',__DIR__);
require_once 'vendor/autoload.php';
include 'auth.php';
include 'data/similar-products.php';
include 'data/images-arr.php';
include 'functions.php';
include 'blocks/header.php';

  if (!empty($_GET['action']) && file_exists('pages/'.$_GET['action'].'.php')){
    include 'pages/'.$_GET['action'].'.php';
  }else{
    include 'pages/404.php';
  }

  include 'blocks/left-menu.php';


 include 'blocks/footer.php';
