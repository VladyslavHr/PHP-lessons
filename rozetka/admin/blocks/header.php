<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin/css/admin.css">
</head>
<body class="<?= $_GET['action'] ?? '' ?>">
    
<?php if(!(isset($_GET['action']) && $_GET['action'] === 'login')): ?>
    <div class="admin-top-panel ">
            <ul class="line-items" >
            <li><a href="index.php?action=main">
            <?php include 'svg/bootstrap/clipboard-data.svg' ?>	
            Shop</a></li>
            <li><a href="index.php?action=tests" >
            <?php include 'svg/bootstrap/cup-straw.svg' ?>		
            Test Page</a></li>
            </ul>
     <div class="admin-profile">
         <div class="name">
             HEllo <b><?= auth_user('name') ?> <?= auth_user('last_name') ?></b> (<i><?= auth_user('email') ?></i>)
         </div>
         <a href="?logout" class="logout"><i class="bi bi-x-square"></i></a>
     </div>
    </div>
<div class="admin-left-menu-wrap">
   
    <div class="admin-left-menu">
        <h5 class="js-open-modal" data-target="left-menu-sub-products">Products</h5>
        <ul class="admin-left-menu-sub list-unstyled <?= menu_sub_active('products')?>" id="left-menu-sub-products">
        <li><a class="<?= menu_item_active('products')?>" href="?action=products">Products list</a></li>
        <li><a class="<?= menu_item_active('products-add')?>" href="?action=products-add">Add product</a></li>
        </ul>
    </div>

    <div class="admin-left-menu">
        <h5 class="js-open-modal" data-target="left-menu-sub-users">Users</h5>
        <ul class="admin-left-menu-sub list-unstyled <?= menu_sub_active('users')?>" id="left-menu-sub-users">
        <li><a class="<?= menu_item_active('users')?>" href="?action=users">Users list</a></li>
        <li><a class="<?= menu_item_active('users-add')?>" href="?action=users-add">Add user</a></li>
        </ul>
    </div>

    <div class="admin-left-menu">
        <h5 class="js-open-modal" data-target="left-menu-sub-orders">Orders</h5>
        <ul class="admin-left-menu-sub list-unstyled <?= menu_sub_active('orders')?>" id="left-menu-sub-orders">
        <li><a class="<?= menu_item_active('orders')?>" href="?action=orders">Orders list</a></li>
        <li><a class="<?= menu_item_active('orders-add')?>" href="?action=orders-add">Add order</a></li>
        </ul>
    </div>

    <div class="admin-left-menu">
        <h5 class="js-open-modal" data-target="left-menu-sub-chats">Chats</h5>
        <ul class="admin-left-menu-sub list-unstyled <?= menu_sub_active('chats')?>" id="left-menu-sub-chats">
        <li><a class="<?= menu_item_active('chats')?>" href="?action=chats">Chats list</a></li>
        </ul>
    </div>
</div>
<?php endif ?>
    <div class="admin-main-content">

    <div class="alert-wrapper">
    <?= flash_get() ?>
    </div>