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
                    Товар закончился
                </div>
                    <?php endif ?>
                </div>



                <div class="tab-color-wrapper">
            <ul class="tab-colors">
            <?php
            if($product['colors']){
                $colors = explode('|', $product['colors']);
            foreach ($colors as $color){
               echo "<li><span style='$color'></span></li>";
            }
        } ?>
            </ul>
          </div>


                <!-- <div class="sprite"></div> -->
                <div class="product-about">
                    <!-- <?php pa($_SESSION['cart']) ?> -->
                    <div class="trade">
                    <div class="price">
                        <?php if(!$product['old_price'] || $product['old_price'] === $product['price']): ?>
                            <?= $product['price']  ?> ₴
                        <?php else: ?>
                            <span class="reg-price"><?= $product['price'] ?> ₴ </span> 
                            <span class="old-price"><?= $product['old_price'] ?> ₴ </span> 
                            
                        <?php endif; ?>

                        </div>
                        <a href="<?= query_add(['add_to_cart' => 1, 'product_id' => $product['id']])?>" class="add-to-cart">
                        <?php include 'svg/cart.svg' ?>   
                        Купить
                        <span class="add-to-cart-count"><?= cart_item_count($product) ?></span>
                        </a>
                        
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
            <div class="description-wrapper">
                <div class="description-background js-open-modal" data-target="product_description" id="product_description">
                        <div class="description" >
                            <h2>Описание</h2>
                            <div class="description-text" ><?= $product['description']?></div>
                                <div class="buy-credit more-btn js-open-modal" data-target="product_description">Подробнее...</div> 
                        </div>
                </div>
            </div>
                        <div class="reviews">
                            <h2>Отзывы покупателей</h2>
                            <form action="<?= query_add(['add_product_comment' => $product['id']]) ?>" class="reviews-form" method="POST">
                                <input class="author" type="text" name="author">
                                <select class="rating" name="rating" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button class="submit" type="submit">Отправить</button>
                                <textarea class="comment" name="comment" id="" cols="30" rows="10"></textarea>
                                
                            </form>
                            <?php 
                                $reviews = db_query("SELECT * FROM reviews WHERE product_id = '$product[id]'");
                                foreach ($reviews as $key => $review):
                            
                            ?>
                            <div class="review-block">
                                <div class="review-head"><?= $review['author'] ?> <?= $review['rating'] ?> <span class="date"><i class="bi bi-clock"></i> <?= $review['created_at']?></span></div>
                                <div class="review-body">
                                    <?= $review ['comment'] ?>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        

                 </div>
    

</div>

