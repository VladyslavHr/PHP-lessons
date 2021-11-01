<?php
if(!defined('ROOT')){
    die('Direct request not allowed');
  }
  

  if (isset($_POST['email']) && isset($_POST['password'])){

      if (empty($_POST['email'])){
        $message = 'Please enter email!';
        flash_alert('danger',$message);
        
        
    }

    if (empty($_POST['password'])){
        $message = 'Please enter password!';
        flash_alert('danger' ,$message);
        
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
        if($is_password_correct){
            $_SESSION['user'] = $user;
            $message = "Welcome <b>$user[name]!</b>";
            flash_alert('primary', $message);
        }else{
            $message = 'Wrong email or password!';
            flash_alert('danger', $message);
        }
    }
    redirect(query_del([]));
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
    $user_id = isset($_GET['ajax']) ? (int)$_GET['userId'] : (int)auth_user('id');
    $user_favs = db_get_row("SELECT favorites FROM users WHERE id = '$user_id'");
    $user_favs = $user_favs['favorites'];
    if($_GET['favorite'] === 'add'){
      
      // pa($user_favs);
      if($user_favs){
        $user_favs = explode('|', $user_favs);
        $user_favs[] = $_GET['product_id'];
      }else{
        $user_favs = [$_GET['product_id']];
      }
      $user_favs = implode('|', $user_favs);
      $user_favs = db_escape($user_favs);
      
      db_query("UPDATE users SET favorites = '$user_favs' WHERE id = '$user_id' ");
      if  (!isset($_GET['ajax'])) flash_alert($type = 'success', $message = 'Товар добавлен в избранное');
      
    }
    if($_GET['favorite'] === 'remove'){
      if($user_favs){
        $user_favs = explode('|', $user_favs);
        $user_favs = array_flip($user_favs); // меняем местами ключи и значения
        unset($user_favs[$_GET['product_id']]); //удаляем элемент масива
        $user_favs = array_flip($user_favs); 
        $user_favs = implode('|', $user_favs);
        $user_favs = db_escape($user_favs);
        db_query("UPDATE users SET favorites = '$user_favs' WHERE id = '$user_id' ");
        if  (!isset($_GET['ajax'])) flash_alert($type = 'warning', $message = 'Товар удален из избранных');
      }else{
        // $user_favs = [$_GET['id']];
      }
    }
    if (isset($_GET['ajax'])){
      echo 1;
      exit;
    }else{
      redirect(query_del(['id', 'favorite']));
    }
    
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
    if (isset($_GET['ajax']))
    {
      $product = ['id' => $product_id];
      echo json_encode(['status' => 'ok', 
      'cart_item_count' => cart_item_count($product),
      'cart_items_count' => cart_items_count(), 
      'in_the_cart' => in_the_cart($product),
    ]);
      exit;
    }else{
      flash_alert($type = 'success', $message = 'Товар добавлен в корзину');
      redirect(query_del(['add_to_cart', 'prduct_id']));
    }

  }




  if(isset($_GET['remove_from_cart'])){
    $product_id = (int)$_GET['remove_from_cart'];
    if(isset($_SESSION['cart']['items'][$product_id])) unset($_SESSION['cart']['items'][$product_id]);
    flash_alert($type = 'warning', $message = 'Товар удален из корзины');
    redirect(query_del(['remove_from_cart']));
  }

  if(isset($_GET['cart_item_qtty_minus'])) {
    $product_id = (int)$_GET['cart_item_qtty_minus'];
    if(isset($_SESSION['cart']['items'][$product_id])){
      if( $_SESSION['cart']['items'][$product_id] < 2){
        unset($_SESSION['cart']['items'][$product_id]);
      }else{
        $_SESSION['cart']['items'][$product_id] -= 1;
        // $_SESSION['cart']['items'][$product_id] -- ;
      }
    }
    
    redirect(query_del(['cart_item_qtty_minus']));
  }

  if(isset($_GET['cart_item_qtty_plus'])) {
    $product_id = (int)$_GET['cart_item_qtty_plus'];
    if(isset($_SESSION['cart']['items'][$product_id])){
        $_SESSION['cart']['items'][$product_id] += 1;
        // $_SESSION['cart']['items'][$product_id] -- ;
      }
    
    redirect(query_del(['cart_item_qtty_plus']));
  }

  if(isset($_GET['add_product_comment']))
  {
    $product_id = (int)$_GET['add_product_comment'];
    $author = db_escape($_POST['author']);
    $rating = db_escape($_POST['rating']);
    $comment = db_escape($_POST['comment']);
    db_query("INSERT INTO reviews SET product_id = '$product_id', author = '$author', rating = '$rating', comment = '$comment', created_at = now()");
    flash_alert($type = 'success', $message = 'Отзыв успешно добавлен');
    redirect(query_del(['add_product_comment']));
  }

  if(isset($_POST['new_order'])){
    pa($_POST);

    foreach($_POST as $key => $value){
      $_POST[$key] = db_escape($value);
    }
    $delivery = isset($_POST['delivery']) ? $_POST['delivery'] : '';
    $payment = isset($_POST['payment']) ? $_POST['payment'] : '';
    db_query("INSERT INTO orders SET 
      `name` = '$_POST[name]',
      last_name = '$_POST[last_name]',
      phone = '$_POST[phone]',
      city = '$_POST[city]',
      delivery = '$delivery',
      `address` = '$_POST[address]',
      payment = '$payment',
      products = '$_POST[products]',
      total_sum = '$_POST[total_sum]',
      created_at = NOW() ");
      $_SESSION['cart'] = '';
      $_SESSION['last_order_id'] = db_query()->lastid();
      redirect("?action=thankyou");
  }

  if (isset($_POST['show_more_products'])) {
    $offset = (int)$_POST['offset'];
    $limit = (int)$_POST['limit'];

    if (!empty($_GET['sorting']) && $_GET['sorting'] === 'title'){
      $order_by = 'ORDER BY title';
    
    }
    elseif (!empty($_GET['sorting']) && $_GET['sorting'] === 'price_asc'){
      $order_by = 'ORDER BY price';
    }
    elseif (!empty($_GET['sorting']) && $_GET['sorting'] === 'price_desc'){
      $order_by = 'ORDER BY price DESC';
    }
    elseif (!empty($_GET['sorting']) && $_GET['sorting'] === 'rating'){
      $order_by = 'ORDER BY rating DESC';
    }
    else{
      $order_by = '';
    }

    $products = db_query("SELECT * FROM products $order_by LIMIT $limit OFFSET $offset ");
    foreach ($products as $product){
      include 'blocks/category-product.php';
    }
    echo show_more_btn($offset, $limit);
    exit;
  }

  if(is_cart_empty() && isset($_GET['action']) && $_GET['action'] === 'checkout' ){ 
      flash_alert($type = 'danger', $message = 'выберете товары перед оформлением заказа');
      redirect('?action=cart');
    }
  
  if (isset($_POST['create_chat'])){

    $user_name = db_escape($_POST['user_name']);
    db_query("INSERT INTO chat_dialogs SET user_name = '$user_name' ");

    $chat_dialog_id = db_query()->lastid();

    echo json_encode([
      'status' => 'ok',
      'chat_dialog_id' => $chat_dialog_id,
    ]);
    exit;
  }


  if (isset($_POST['send_chat_message']))
  {
    $chat_dialog_id = (int)$_POST['chat_dialog_id'];
    $message = db_escape($_POST['message']);
    db_query("INSERT INTO chat_messages SET
    chat_dialog_id = '$chat_dialog_id',
    `message` = '$message',
    sent_at = NOW() ");
        echo json_encode([
          'status' => 'ok',
        ]);
        exit;
  }


  if (isset($_POST['ajax_search'])) {
    $query = db_escape($_POST['query']);
    $results = db_query("SELECT id, title FROM products WHERE title LIKE '%$query%' LIMIT 10 ");
    $results = array_map(function($product)
    {
      $product['link'] = product_link($product['id']);
      return $product;
    }, $results);
    echo json_encode([
      'success' => 'ok',
      'results' => $results,
    ]);
    exit;
  }




