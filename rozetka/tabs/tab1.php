<?php if(!defined('ROOT')){
  die('Direct request not allowed');
} ?>
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
           <a href="https://content2.rozetka.com.ua/goods/images/big/56474742.jpg" data-fancybox="gallery">
               <img src="https://content2.rozetka.com.ua/goods/images/preview/56474742.jpg" alt="">
            </a>
        </div>
       <div class="img-prev img-prev2">
           <a href="https://content1.rozetka.com.ua/goods/images/big/56474743.jpg" data-fancybox="gallery">
               <img src="https://content1.rozetka.com.ua/goods/images/preview/56474743.jpg" alt="">
            </a>
        </div>
       <div class="img-prev img-prev3">
           <a href="https://content.rozetka.com.ua/goods/images/big/56474747.jpg" data-fancybox="gallery">
               <img src="https://content.rozetka.com.ua/goods/images/preview/56474747.jpg" alt="">
            </a>
        </div>
       <div class="img-prev img-prev4">
           <a href="https://content1.rozetka.com.ua/goods/images/big/56474749.jpg" data-fancybox="gallery">
               <img src="https://content1.rozetka.com.ua/goods/images/preview/56474749.jpg" alt="">
            </a>
        </div>
       <div class="img-prev img-prev5">
           <a href="https://content.rozetka.com.ua/goods/images/big/56474746.jpg" data-fancybox="gallery">
               <img src="https://content.rozetka.com.ua/goods/images/preview/56474746.jpg" alt="">
            </a>
        </div> 
       
        <div class="main-image">
            <img class="img1" src="https://content2.rozetka.com.ua/goods/images/big/56474742.jpg" alt="">
            <img class="img2" src="https://content1.rozetka.com.ua/goods/images/big/56474743.jpg" alt="">
            <img class="img3" src="https://content.rozetka.com.ua/goods/images/big/56474747.jpg" alt="">
            <img class="img4" src="https://content1.rozetka.com.ua/goods/images/big/56474749.jpg" alt="">
            <img class="img5" src="https://content.rozetka.com.ua/goods/images/big/56474746.jpg" alt="">
            </div>
        </div>
        <div class="product-options">
            <div class="stock-atatus">
                <div class="instock">
                    <?php include 'svg/ok.svg'?>
                    В наличии
                </div>
                <!-- <div class="sprite"></div> -->
                <div class="product-about">
                    <div class="trade">
                    <div class="price">
                        <?php if(empty($_GET['old_price'])): ?>
                            <?= _get('price')  ?> ₴
                        <?php else: ?>
                            <span class="reg-price"><?= _get('price') ?> ₴ </span> 
                            <span class="old-price"><?= _get('old_price') ?> ₴ </span> 
                            
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
                    &nbsp; <a href="#">для владельцев Premium</a> 
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
    </div>
        <div class="product-bottom">
                     <div class="description">
                         <h2>Описание</h2>
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nam error, amet nulla eveniet eum saepe. Ea vitae, aspernatur quaerat omnis dignissimos itaque qui doloremque ducimus cum, beatae nam aliquid!</p>
                         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo reiciendis impedit sequi ab voluptate voluptatibus, necessitatibus fugiat corrupti harum blanditiis rerum quam dolorem pariatur placeat animi eveniet, explicabo, doloremque consequuntur.</p>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores distinctio placeat eos totam sit porro a voluptatibus ipsa quas cum accusantium, veniam ex excepturi illum. Rem repellendus voluptatem inventore itaque.</p>
                        </div>
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

