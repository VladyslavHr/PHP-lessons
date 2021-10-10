<?php
if(is_cart_empty()){
    $products = [];
}else{
    $cart_items = $_SESSION['cart']['items'];
    $ids_list = implode(',', array_keys($cart_items));
    $products = db_query("SELECT id, title, price, old_price, `card` FROM products WHERE id IN($ids_list)");
}

function decode_fast_info_json($product)
{
    $product['price_formated'] = number_format( $product[ 'price'], 0, '', ' ');
    $product['old_price_formated'] = number_format( $product[ 'old_price'], 0, '', ' ');
    return $product;
}
$products = array_map('decode_fast_info_json',$products);

$total_count = db_query("SELECT count(*) FROM products WHERE id IN($ids_list) ");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;

$total_sum = 0;
foreach ($products as $product):
$product_sum = $product['price'] * $cart_items[$product['id']];
$total_sum += $product_sum;
endforeach;




?>
<style>
    #input_name_error{
        color: red;
    }
</style>


<form class="checkout-form" method="POST">
    <input type="hidden" name="products" value="<?= esc_attr(json_encode($_SESSION['cart']['items'])) ?>">
    <input type="hidden" name="total_sum" value="<?= $total_sum ?>">
    <div class="checkout-title">
        <h1>Оформление заказа</h1>
    </div>
    <div class="checkout-contact">
        <div class="checkout-important">
            <span>!</span>
            <h4>Ваши контактные данные</h4>
        </div>
        <div class="checkout-contact-data">
            <div class="check-surname">
                <label for="label-surname">Фамилия </label>
                <input type="text" name="last_name" value="<?= auth_user('last_name') ?? '' ?>" id="label-surname">
            </div>
            <div class="check-name">
                <label for="input_name">Имя <span id="input_name_error"></span></label>
                <input type="text" name="name" value="<?= auth_user('name') ?? '' ?>" id="input_name">
            </div>
        </div>
            <div class="checkout-phone-city">
                <div class="check-phone">
                    <label for="label-phone">Мобильный телефон</label>
                    <input type="tel" name="phone" value="+380 " id="label-phone">
                </div>
                <div class="check-name">
                    <label for="label-email">Email</label>
                    <input type="tel" name="phone" value="<?= auth_user('name') ?? '' ?>" id="label-email">
                </div>
            </div>
        
    </div>
    <div class="checkout-order">
        <div class="checkout-order-num">
            <h3>Ваш заказ</h3>
            <span>на сумму: <?= thousands($total_sum) ?> ₴</span>
        </div>
            <div class="check-goods">
                <span>1</span>
                <h4>Товары продавца</h4>
            </div>
            <div class="checkout-order-products-wrap">
                <?php

                foreach ($products as $product):
                ?>
                <div class="checkout-order-products">
                    <div class="checkout-order-product-left">
                        <a href="?action=product&tab=1&id=<?= $product['id'] ?>">
                        <img src="<?= get_product_image_src($product) ?>" alt="" >
                        </a>
                    </div>
                    <div class="checkout-order-product-right">
                        <h2 class="checkou-title">
                            <a href="?action=product&tab=1&id=<?= $product['id'] ?>">
                            <?= $product['title'] ?> <?php if(auth_admin()): ?> [<?=$product['id'] ?>] <?php endif ?>
                            </a>
                        </h2>
                        <div class="checkout-price">

                            <div class="checkout-price-per-one">
                                <p>Цена</p>
                                <?php if(isset($product['old_price_formated']) && $product['old_price_formated'] !== $product['price']): ?>
                                    <div class="checkout-old-price"><?= $product['old_price_formated'] ?> ₴ </div>
                                <?php else: ?>
                                    <div class="checkout-old-price no-style">&nbsp;</div>
                                <?php endif; ?>
                                    <span><?php echo $product[ 'price_formated'] ?> ₴</span> 
                            </div>
                            <div class="checkout-items-count">
                                <p>Колличество</p>
                                <span><?= $cart_items[$product['id']] ?></span>
                            </div>
                            <div class="checkout-price-per-all">
                                <p>Сумма</p>
                                <span><?= thousands($product_sum = $product[ 'price'] * $cart_items[$product['id']])  ?> ₴</span>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                        endforeach; 
                    ?>
                
            </div>
    </div>

    <div class="checkout-delivery">
            <div class="checkout-delivery-head">
                <span>2</span>
                <h4>Доставка</h4>
            </div>
        <div class="checkout-delivery-city">
            <label for="label-city">Ваш город</label>
                <select name="city" id="label-city">
                    <option value="Днепр">Днепр</option>
                    <option value="Львов">Львов</option>
                    <option value="Киев">Киев</option>
                    <option value="Харьков">Харьков</option>
                    <option value="Одесса">Одесса</option>
                </select>
        </div>
        <div class="checkout-delivery-type">
            <ul>
                <li> 
                    <input checked class="delivery-input" type="radio" name="delivery" value="shop" id="delivery-1">
                        <label class="delivery-block" for="delivery-1">
                            <div class="delivery-radio"></div>
                            <p>Самовывоз с магазина</p>
                            <span class="delivery-free">Бесплатно</span>
                        </label>
                </li>
                <li>
                    <input class="delivery-input" type="radio" name="delivery" value="post" id="delivery-2">
                        <label class="delivery-block" for="delivery-2">
                            <div class="delivery-radio"></div>
                            <p>Доставка на отеделние почты</p>
                            <span class="delivery-free">Бесплатно</span>
                        </label>
                </li>
                <li>
                    <input class="delivery-input" type="radio" name="delivery" value="courier" id="delivery-3"> 
                        <label class="delivery-block" for="delivery-3">
                            <div class="delivery-radio"></div>
                            <p>Доставка курьером</p>
                            <span class="delivery-free">Бесплатно</span>
                            <div class="delivery-adress">
                                <textarea name="address" id="" cols="30" rows="10"></textarea>
                            </div>
                        </label>
                </li>  
            </ul>
        </div>
    </div>
    <div class="checkout-pay-by">
        <div class="checkout-payment">
            <span>3</span>
            <h4>Оплата</h4>
        </div>
        <div class="checkout-payment-method">
            <ul>
                <li>
                <input checked class="delivery-input" type="radio" name="payment" value="cash" id="payment-1">
                        <label class="delivery-block" for="payment-1">
                            <div class="delivery-radio"></div>
                            <p>Оплата наличными при получении</p>
                        </label>
                </li>
                <li>
                <input class="delivery-input" type="radio" name="payment" value="card" id="payment-2">
                        <label class="delivery-block" for="payment-2">
                            <div class="delivery-radio"></div>
                            <p>Оплата онлайн картой</p>
                        </label>
                </li>
                <li>
                <input class="delivery-input" type="radio" name="payment" value="pp" id="payment-3">
                        <label class="delivery-block" for="payment-3">
                            <div class="delivery-radio"></div>
                            <p>Оплата PayPal</p>
                            <span class="delivery-free">Комиссия 3,5%</span>
                        </label>
                </li>
            </ul>
        </div>
    </div>
    <div class="checkout-total">
        <h4>Итого</h4>
        <div class="checkout-amount">
            <span><?= $total_count ?> товар<?= sklonenie($total_count, '', 'а', 'ов') ?> на сумму</span>
            <div class="checkout-amount-sum"><?= thousands($total_sum) ?> ₴</div> 
        </div>
        <div class="checkout-total-delivery">
            <p>Стоимость доставки</p>
            <h5>Бесплатно</h5>
        </div>
        <div class="checkout-total-for-pay">
            <p>К оплате</p>
            <span><?= thousands($total_sum) ?> ₴</span>
        </div>
        <div class="checkout-confirm-order">
            <button type="submit" name="new_order" id="checkout_submit_btn">Заказ подтверждаю</button>
        </div>
    </div>
</form>


<script>
    var input_name = document.getElementById('input_name')
    var input_name_error = document.getElementById('input_name_error')

    input_name.addEventListener('keyup', function(event){
        console.log(this.value.length)
        var input_value = this.value
        if(input_value.length < 3){
            input_name_error.innerHTML = '(Please enter more than 3 charachters)'
        }else if(input_value.length > 10){
            input_name_error.innerHTML = '(Please enter less than 10 charachters)'
        }else{
            input_name_error.innerHTML = ''
        }
    })

</script>