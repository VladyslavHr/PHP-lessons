<?php
$min = 1;
$max = 999999;

// if(is_array($_SESSION['cart']['items']) && $_SESSION['cart']['items']){
//     $cart_items = $_SESSION['cart']['items'];
//     $ids_list = implode(',', array_keys($cart_items));
//     $products = db_query("SELECT id, title, price, old_price, `card` FROM products WHERE id IN($ids_list)");
// }else{
//     $products = [];
// }

// function decode_fast_info_json($product)
// {
//     $product['price_formated'] = number_format( $product[ 'price'], 0, '', ' ');
//     $product['old_price_formated'] = number_format( $product[ 'old_price'], 0, '', ' ');
//     return $product;
// }
// $products = array_map('decode_fast_info_json',$products);

// $total_count = db_query("SELECT count(*) FROM products WHERE id IN($ids_list) ");
// $total_count = $total_count ? $total_count[0]['count(*)'] : 0;

// $total_sum = 0;
// foreach ($products as $product):
// $product_sum = $product['price'] * $cart_items[$product['id']];
// $total_sum += $product_sum;
// endforeach;


?>

<div class="thankyou-wrap">
    <div class="thanks">
        <h1>Спасибо за покупку</h1>
        <div class="thanks-time">
            <div class="thanks-clock">
                <?php include 'svg/bootstrap/clock.svg' ?>
            </div>
            <p>Ваш заказ будет обработан автоматически, в случае необходимости с вами свяжется менеджер</p> 
        </div>
        <div class="thanks-info">
            <div class="thanks-loc">
                <?php include 'svg/bootstrap/geo-alt-fill.svg' ?>
            </div>
            <h4>Информация о заказе: </h4>
        </div>
        <div class="thanks-adress">
            <p> Ваша посылка будет доставлена по адрессу:</p>
            <span></span>
        </div>
        <div class="thanks-approve">
            <div class="thanks-ok">
                <?php include 'svg/bootstrap/check-circle.svg' ?>
            </div>
            <h4>Номер вашего заказа: <?= rand($min, $max) ?></h4>
            <!-- <div class="thanks-total">
               Сумма заакза: <?= thousands($total_sum)  ?>₴
            </div> -->
        </div>
        <div class="thansk-link">
            <a href="?action=main">Перейти на главную страницу</a>
        </div>
    </div>
</div>