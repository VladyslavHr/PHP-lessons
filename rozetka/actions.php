<?php
if(!defined('ROOT')){
    die('Direct request not allowed');
  }
  

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
    $user_favs = db_get_row("SELECT favorites FROM users WHERE id = '$user_id'");
    $user_favs = $user_favs['favorites'];
    if($_GET['favorite'] === 'add'){
      
      // pa($user_favs);
      if($user_favs){
        $user_favs = explode('|', $user_favs);
        $user_favs[] = $_GET['id'];
      }else{
        $user_favs = [$_GET['id']];
      }
      $user_favs = implode('|', $user_favs);
      $user_favs = db_escape($user_favs);
      
      db_query("UPDATE users SET favorites = '$user_favs' WHERE id = '$user_id' ");
      flash_alert($type = 'success', $message = 'Товар добавлен в избранное');
      
    }
    if($_GET['favorite'] === 'remove'){
      if($user_favs){
        $user_favs = explode('|', $user_favs);
        $user_favs = array_flip($user_favs); // меняем местами ключи и значения
        unset($user_favs[$_GET['id']]); //удаляем элемент масива
        $user_favs = array_flip($user_favs); 
        $user_favs = implode('|', $user_favs);
        $user_favs = db_escape($user_favs);
        db_query("UPDATE users SET favorites = '$user_favs' WHERE id = '$user_id' ");
        flash_alert($type = 'warning', $message = 'Товар удален из избранных');
      }else{
        // $user_favs = [$_GET['id']];
      }
    }
    redirect(query_del(['id', 'favorite']));
  }

  // не пускаем неавторизованных на page = favorites
  if(isset($_GET['action']) && $_GET['action'] === 'favorites' && !auth_check()) {
    redirect('index.php');
  }


  if(isset($_GET['add_to_cart'])) {
    if(!isset($_SESSION['cart']['items'])){
      $_SESSION['cart'] = [
        'items' =>[
          // 55 => 2,
          // 12 => 4,
        ],
        // 'total_sum' = 0,
      ];
    }
    $product_id = (int)$_GET['product_id'];
    $product_qtt = (int)$_GET['add_to_cart']; //1
    if(isset( $_SESSION['cart']['items'][$product_id])){
      $_SESSION['cart']['items'][$product_id] = $_SESSION['cart']['items'][$product_id] + $product_qtt;
    }else{
      $_SESSION['cart']['items'][$product_id] = $product_qtt;
    }
    flash_alert($type = 'success', $message = 'Товар добавлен в корзину');
    redirect(query_del(['add_to_cart', 'prduct_id']));
  }




  if(isset($_GET['remove_from_cart'])){
    $product_id = (int)$_GET['remove_from_cart'];
    if(isset($_SESSION['cart']['items'][$product_id])) unset($_SESSION['cart']['items'][$product_id]);
    flash_alert($type = 'warning', $message = 'Товар удален из корзины');
    redirect(query_del(['remove_from_cart']));
  }