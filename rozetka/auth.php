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


  if(isset($_GET['favorite']) && auth_check()) {
    $user_id = (int)auth_user('id');
    if($_GET['favorite'] === 'add'){
      $user_favs = db_query("SELECT favorites FROM users WHERE id = '$user_id'");
      pa($user_favs);
      $user_favs = $user_favs[0]['favorites'];
      if($user_favs){
        $user_favs = explode('|', $user_favs);
        pa($user_favs);
        $user_favs[] = $_GET['id'];
        pa($user_favs);
      }else{
        $user_favs = [$_GET['id']];
      }
      $user_favs = implode('|', $user_favs);
      $user_favs = db_escape($user_favs);
      
      db_query("UPDATE users SET favorites = '$user_favs' WHERE id = '$user_id' ");
      
    }
    if($_GET['favorite'] === 'remove'){
  
    }
    // redirect('?action=category');
  }