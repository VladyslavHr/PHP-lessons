<?php if(!defined('ROOT'))  die('Direct request not allowed!');

session_start();

if($_GET['action'] !== 'login' && !isset($_SESSION['user'])){
    $_SESSION['flash_message'] = 'Pleas authorise!';
    header('Location: admin.php?action=login');
}

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
    pa($_POST);
    $email = db_escape($_POST['email']);
    $user = db_query("SELECT * FROM users WHERE email = '$email' ");
    if($user){
        $user = $user[0];
        $current_password = $user['password'];
        $entered_password = $_POST['password'];
        $is_password_correct = password_verify($entered_password, $current_password);
        pa($user);
        var_dump($is_password_correct);
        if($user['role'] === 'admin' && $is_password_correct){
            $_SESSION['user'] = $user;
            header('Location: admin.php?action=console');
        }else{
            $_SESSION['flash_message'] = 'Wrong email or password! Or not enough permission!';
            header('Location: admin.php?action=login');
        }
    }
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('Location: admin.php?action=login');
}

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}else{
    $_SESSION['count']++;
}