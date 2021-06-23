<?php 
define('ROOT',__DIR__);
include 'auth.php';
include 'data/similar-products.php';
include 'data/images-arr.php';
include 'functions.php';
include 'blocks/header.php';

  if (!empty($_GET['action']) && file_exists('pages/'.$_GET['action'].'.php')){
    include 'pages/'.$_GET['action'].'.php';
  }

  include 'blocks/left-menu.php';


 include 'blocks/footer.php';
