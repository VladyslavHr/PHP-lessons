<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<?php

// pa($_SESSION['cart']);
// pa(array_keys($_SESSION['cart']['items']));
if(is_cart_empty()){
    $products = [];
}else{
    $cart_items = $_SESSION['cart']['items'];
    $ids_list = implode(',', array_keys($cart_items));
    // pa($ids_list);
    $products = db_query("SELECT id, title, price, old_price, `card` FROM products WHERE id IN($ids_list)");
}

function decode_fast_info_json($product)
{
    $product['price_formated'] = number_format( $product[ 'price'], 0, '', ' ');
    $product['old_price_formated'] = number_format( $product[ 'old_price'], 0, '', ' ');
    return $product;
}
$products = array_map('decode_fast_info_json',$products);




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
                <div class="price-per-one"><?php echo $product[ 'price_formated'] ?> ₴ </div>
                <div class="items-count input-group mb-3">
                    <a href="<?= query_add(['cart_item_qtty_minus' => $product['id']] )?>" class="btn btn-outline-secondary" ><?php include 'svg/bootstrap/dash-lg.svg'?></a>
                    <input class="cart-item-qtty" type="number" name="cart-items" value="<?= $cart_items[$product['id']] ?>" placeholder="" aria-label="Example text with two button addons">
                    <a href="<?= query_add(['cart_item_qtty_plus' => $product['id']] )?>" class="btn btn-outline-secondary" ><?php include 'svg/bootstrap/plus-lg.svg'?></a>
                </div>
                <div class="price-per-all"><?= thousands($product_sum = $product[ 'price'] * $cart_items[$product['id']])  ?> ₴</div>
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
            <div class="total-sum"><?= thousands($total_sum) ?> UAH</div>
            <a <?= is_cart_empty('', 'href="?action=checkout"') ?> class="checkout <?= is_cart_empty('disabled') ?>">Оформить заказ</a>
        </div>
    </div>
</div>