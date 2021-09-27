<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<?php

// pa($_SESSION['cart']);
// pa(array_keys($_SESSION['cart']['items']));
if(is_array($_SESSION['cart']['items']) && $_SESSION['cart']['items']){
    $cart_items = $_SESSION['cart']['items'];
    $ids_list = implode(',', array_keys($cart_items));
    // pa($ids_list);
    $products = db_query("SELECT id, title, price, old_price, `card` FROM products WHERE id IN($ids_list)");
}else{
    $products = [];
}





?>

<div class="cart-head">
    <h3>Корзина</h3>
</div>
<div class="cart-products products">
    
<?php 
if(!$products) echo '<h2 class="text-center">Корзина пуста</h2>';
$total_sum = 0;
foreach($products as $product):   ?>
    <div class="cart-product">
        <div class="cart-left">
            <a class="cart-image-link" href="?action=product&tab=1&id=<?= $product['id'] ?>">
            <img class="cart-image" src="<?= get_product_image_src($product) ?>" alt="" >
            </a>
        </div>
        <div class="cart-right">
            <h2 class="title">
            <a href="?action=product&tab=1&id=<?= $product['id'] ?>">
              <?= $product['title'] ?> <?php if(auth_admin()): ?> [<?=$product['id'] ?>] <?php endif ?>
            </a>
            </h2>
        
            <?php if(isset($product['old_price']) && $product['old_price'] !== $product['price']): ?>
            <div class="old-price"><?= $product['old_price'] ?> ₴ </div>
            <?php else: ?>
            <div class="old-price no-style">&nbsp;</div>
            <?php endif; ?>
            <div class="price">
                <div class="price-per-one"><?php echo (int)$product[ 'price'] ?> ₴ </div>
                <div class="items-count input-group mb-3">
                    <button class="btn btn-outline-secondary" type="button"><?php include 'svg/bootstrap/dash-lg.svg'?></button>
                    <span name="cart-items"><?= $cart_items[$product['id']] ?></span>
                    <input type="number" name="cart-items" class="form-control" placeholder="" aria-label="Example text with two button addons">
                    <button class="btn btn-outline-secondary" type="button"><?php include 'svg/bootstrap/plus-lg.svg'?></button>
                </div>
                <div class="price-per-all"><?= $product_sum = $product[ 'price'] * $cart_items[$product['id']]; ?> ₴</div>
            </div>
                <div class="fav-and-del">
                    <?php product_heart($product) ?>
                    <a href="<?= query_add(['remove_from_cart' => $product['id']]) ?>" class="cart-remove"><?php include 'svg/bootstrap/trash.svg' ?></a>
                </div>
        </div>
    </div>
    
    <?php 
    $total_sum += $product_sum;
    endforeach; 
    ?>
</div>
<div class="cart-summary">
    <div class="cart-summary-left">
        <a href="?action=category" class="shop-link">Продолжить покупки</a>
    </div>
    <div class="cart-summary-right">
        <div class="cart-total">
            <div class="total-sum"><?= $total_sum ?> UAH</div>
            <a href="#" class="checkout">Оформить заказ</a>
        </div>
    </div>
</div>