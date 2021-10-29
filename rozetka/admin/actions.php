<?php if(!defined('ROOT'))  die('Direct request not allowed!');

session_start();

if ($_POST) $_SESSION['post'] = $_POST;
if ($_GET) $_SESSION['get'] = $_GET;

// редиректит на страницу логина не авторизованых пользователей
if($_GET['action'] !== 'login' && !isset($_SESSION['user'])){
    flash_alert('danger','Pleas authorise!');
    redirect('admin.php?action=login');
}

if (isset($_POST['login'])) {
    if (empty($_POST['email'])){
        $message = 'Please enter email!';
        flash_alert('danger',$message);
        redirect('admin.php?action=login');
        
    }

    if (empty($_POST['password'])){
        $message = 'Please enter password!';
        flash_alert('danger' ,$message);
        redirect('admin.php?action=login');
        
    }

    $email = db_escape($_POST['email']);
    $user = db_query("SELECT * FROM users WHERE email = '$email' ");
    if($user){
        $user = $user[0];
        $current_password = $user['password'];
        $entered_password = $_POST['password'];
        $is_password_correct = password_verify($entered_password, $current_password);
        // pa($user);
        // var_dump($is_password_correct);
        sleep(1);
        if($user['role'] === 'admin' && $is_password_correct){
            $_SESSION['user'] = $user;
            $message = "Welcome <b>$user[name]!</b>";
            flash_alert('primary', $message);
            redirect('admin.php?action=console');
        }else{
            $message = 'Wrong email or password! Or not enough permission!';
            flah_alert('danger', $message);
            redirect('admin.php?action=login');
        }
    }
}
//flash_set($message)

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    redirect('admin.php?action=login');
}

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}else{
    $_SESSION['count']++;
}


if(!empty($_GET['order_status'])){
    $order_id = (int)$_GET['order_id'];
    $order_status = db_escape($_GET['order_status']);
    db_query("UPDATE orders SET `status` = '$order_status' WHERE id = '$order_id' ");
    redirect(query_del(['order_id', 'order_status']));
  }

  if(isset($_POST['generate_jquery_export'])){

    $arr = db_query("SELECT * FROM jq_rules");

    $json = json_encode($arr, 128);

    $bytes = file_put_contents('data/jquery_export.json', $json);

    echo json_encode([
      'status' => $bytes ? 'ok' : 'error',
    ]);
    exit;
  }

  if(isset($_GET['jquery_import'])){
    if($_FILES['import_file']['size'] > 0){
        move_uploaded_file($_FILES["import_file"]["tmp_name"], 'data/file-for-import.json');
        $file = file_get_contents('data/file-for-import.json');
        $rules = json_decode($file, true);
        foreach ( $rules as $rule)
        {
            if(!$rule['link']) continue;
            $rule = db_escape($rule);
            $exists = db_query("SELECT id FROM jq_rules WHERE link = '$rule[link]' ");
            if($exists){
                $sql = "UPDATE jq_rules SET 
                    title = '$rule[title]',
                    `description` = '$rule[description]',
                    example = '$rule[example]',
                    `type` = '$rule[type]',
                    link = '$rule[link]'
                    WHERE link = '$rule[link]'";
                db_query($sql);
            }else{
                $sql = "INSERT INTO jq_rules SET 
                    title = '$rule[title]',
                    `description` = '$rule[description]',
                    example = '$rule[example]',
                    `type` = '$rule[type]',
                    link = '$rule[link]'";
                db_query($sql);
            }

        }
    }
    redirect(query_del(['jquery_import']));
    // exit;
  }