<?php
if(!defined('ROOT')){
    die('Direct request not allowed');
  }
  session_start();

  if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])){

    if ($_POST['email'] === 'admin' && $_POST['password'] === '123'){
       
        $_SESSION['user'] = [
            'name' => 'Admin',
        ];
    }
    header('Location:?');
  }

  if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('Location:?');
  }

  if (!isset($_SESSION['count'])){
    $_SESSION['count'] = 1;
  }else{
    $_SESSION['count'] ++;
  }