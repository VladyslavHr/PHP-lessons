<?php if(!defined('ROOT')){
  die('Direct request not allowed');
} 

$card = $product['card'] ? 'cards/'.$product['card'] : 'img/noimage.png';
?>
<div class="tab-content"> 
    <div class="product-info">
        <div class="product-images">
            <div class="badges">
                <div class="top-sale">Топ продаж</div>
                
                <div class="sale">sale</div>
            </div>
<div class="right-bages">
            <div class="delivery">
                <?php include 'svg/freedelivery.svg' ?>
                <div class="delivery-text">Бесплатная <br> доставка </br> от 200 ₴ </div>
             </div>
                <div class="delivery">
                <?php include 'svg/freedelivery.svg' ?>
                <div class="delivery-text">Бесплатная <br> доставка </br> от 200 ₴ </div>
            </div>
</div>
       <div class="img-prev img-prev1">
           <a href="<?= get_product_image_src($product)?>" data-fancybox="gallery">
               <img src="<?= get_product_image_src($product)?>" alt="">
            </a>
        </div>
        <?php 
        if ($product['gallery']):
            $images_arr = json_decode($product['gallery'], true);
            foreach ($images_arr as $key => $image):
                ?> 
       <div class="img-prev img-prev<?= ($key + 2)?>">
           <a href="<?= $image ?>" data-fancybox="gallery">
               <img src="<?= $image ?>" alt="">
            </a>
        </div>
        <?php
            if($key > 3) break;

            endforeach;
            endif;
        ?>
    
       
        <div class="main-image">
            <div class="img-wrapper img1">
                <img class="" src="<?= get_product_image_src($product)?>" alt="">
            </div>
            <?php 
        if ($product['gallery']):
            $images_arr = json_decode($product['gallery'], true);
            foreach ($images_arr as $key => $image):
                ?>
            <div class="img-wrapper img<?= ($key + 2)?>"> 
                <img class="" src="<?= $image ?>" alt="">
            </div> 


<!-- select distinct status from products запрос дз -->
       <!-- <div class="img-prev img-prev<?= ($key + 2)?>">
           <a href="<?= $image ?>" data-fancybox="gallery">
               <img src="<?= $image ?>" alt="">
            </a>
        </div> -->
        <?php
            if($key > 3) break;

            endforeach;
            endif;
        ?>
            
            </div>
        </div>
        <div class="product-options">
            <div class="stock-status">
                <?php if($product['sell_status'] === 'available'): ?>
                <div class="available">
                    <?php include 'svg/bootstrap/check-circle.svg' ?>
                    Есть в наличии
                </div>

                <?php elseif($product['sell_status'] === 'unavailable'): ?>
                <div class="unavailable">
                    <?php include 'svg/bootstrap/dash-circle.svg' ?>
                    Нет в наличии
                </div>

                <?php elseif($product['sell_status'] === 'limited'): ?>
                <div class="limited">
                    <?php include 'svg/bootstrap/clock.svg' ?>
                    Заканчивается
                </div>
                
                <?php elseif($product['sell_status'] === 'out_of_stock'): ?>
                <div class="out_of_stock">
                    <?php include 'svg/bootstrap/dash-circle.svg' ?>
                    Нет в наличии
                </div>
                    <?php endif ?>
                </div>
                <!-- <div class="sprite"></div> -->
                <div class="product-about">
                    <div class="trade">
                    <div class="price">
                        <?php if(!$product['old_price'] || $product['old_price'] === $product['price']): ?>
                            <?= $product['price']  ?> ₴
                        <?php else: ?>
                            <span class="reg-price"><?= $product['price'] ?> ₴ </span> 
                            <span class="old-price"><?= $product['old_price'] ?> ₴ </span> 
                            
                        <?php endif; ?>

                        </div>
                        <div class="add-to-cart">
                        <?php include 'svg/cart.svg' ?>   
                        Купить</div>
                        <div class="buy-credit">Купить в кредит</div>
                        <div class="compare">
                            <?php include 'svg/icon-compare.svg'?>
                        </div>
                        <div class="favorite">
                            <?php include 'svg/heart-empty.svg' ?>
                        </div>

                    </div>
                    <div class="bonuses">
                        <?php include 'svg/icon-bonus-premium.svg' ?>
                    <b>+ 189 бонусных ₴</b>&nbsp; 
                    при покупке этого товара
                    &nbsp; <a href="<?= $product['url'] ?>">дельцев Premium</a> 
                    </div>
                </div>
                 <div class="specs">
                     <h2>Характеристики</h2>
                     <ul class="fast-info">
                     <?php foreach($product ['fast_info'] as $spec => $value): ?>
                     <li>
                         <span class="spec-name"><s><?= $spec ?>:</s></span> 
                         <span class="spec-value"><?= $value ?></span>
                     </li>
                     <?php endforeach; ?>
                     </ul>
                 </div>
            
        </div>
    </div>
        <div class="product-bottom">
                     <div class="description">
                         <h2>Описание</h2>
                         <div class="description-text"><?= $product['description']?></div>
                         
                        <div class="reviews">
                            <h2>Отзывы покупателей</h2>
                            <div class="review-block">
                                <div class="review-head">Ivan Ivanov <span class="date"><i class="bi bi-clock"></i> 15 june 2020</span></div>
                                <div class="review-body">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae doloribus explicabo tempora doloremque eius, omnis et nemo a natus pariatur est cupiditate ducimus! Cumque eum id et perferendis, voluptas aut!</div>
                            </div>
                            <div class="review-block">
                                <div class="review-head">Ivan Ivanov <span class="date"><i class="bi bi-clock"></i> 15 june 2020</span></div>
                                <div class="review-body">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae doloribus explicabo tempora doloremque eius, omnis et nemo a natus pariatur est cupiditate ducimus! Cumque eum id et perferendis, voluptas aut!</div>
                            </div>
                            <div class="review-block">
                                <div class="review-head">Ivan Ivanov <span class="date"><i class="bi bi-clock"></i> 15 june 2020</span></div>
                                <div class="review-body">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae doloribus explicabo tempora doloremque eius, omnis et nemo a natus pariatur est cupiditate ducimus! Cumque eum id et perferendis, voluptas aut!</div>
                            </div>
                        </div>
                 </div>
    

</div>

