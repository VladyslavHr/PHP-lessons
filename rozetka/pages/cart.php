<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<?php

$products = db_query("SELECT id, title, price, old_price, `card` FROM products order by RAND() LIMIT 5");




?>

<div class="cart-head">
    <h3>Корзина</h3>
</div>
<div class="cart-products">
<?php foreach($products as $product):   ?>
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
            <div class="price"><?php echo $product[ 'price'] ?> ₴ </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
<div class="cart-summary">
    <div class="cart-summary-left">
        <a href="?action=category" class="shop-link">Продолжить покупки</a>
    </div>
    <div class="cart-summary-right">
        <div class="cart-total">
            <div class="total-sum">54565 UAH</div>
            <a href="#" class="checkout">Оформить заказ</a>
        </div>
    </div>
</div>