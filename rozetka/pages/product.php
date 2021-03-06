<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<pre>
<?php 


$product_id = (int)$_GET['id'];
 $product = db_query("SELECT * FROM products WHERE id = $product_id");
 $product = $product[0];

 $product['fast_info'] = json_decode($product['fast_info'], true);

 
// // print_r($_GET);
// // print_r($similar_products);
// // print_r($product);
// // $title = $product['title']
if(!isset($_SESSION['viewed'])) $_SESSION['viewed'] = [];
if(!in_array($product_id, $_SESSION['viewed'])) $_SESSION['viewed'][] = $product_id;
if(count($_SESSION['viewed']) > 8){
    $_SESSION['viewed'] = array_slice($_SESSION['viewed'], count($_SESSION['viewed']) - 8);
} 


// pa($_SESSION['viewed']);


?>
</pre>
<div class="product-page">
<ul class="breadcrums">
   <li class="breadcrum-item home">
        <a href="?action=main" class="breadcrum-link">
        <?php include 'svg/home.svg' ?>
        </a>
    </li>
       <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="?action=category" class="breadcrum-link">Все товары</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="?action=brands" class="breadcrum-link">Бренды</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="?action=category&brand=<?= $product['brand_name']?>" class="breadcrum-link"><?= $product['brand_name']?></a>
    </li>

</ul>

<h1 class="product-title"><?php echo $product['title'] ?>

     <?php edit_product_link($product['id'])?>
</h1>
<div class="under-title">
    <div class="rating">
<div class="stars">
    <?php for($i = 1; $i <=5; $i++): ?>
    <span class="star <?php echo $product['rating'] < $i ? 'empty' : '' ?> "></span>
    <?php endfor; ?>
</div>

        <a href="#"> <?=$product['reviews'] ?> отзыв<?= sklonenie($product['reviews'], '', 'а', 'ов') ?></a>
    </div>
    <div class="sku">
      <small>Код:</small><?php echo $product['sku']?>
    </div>

</div>

<div class="product-tabs-wrapper">
        <ul class="product-tabs" id="product_tabs">
            <li class="product-tabs-item <?= is_tab_active(1) ?>">
            <a href="?action=product&id=1&tab=1"> Все о товаре </a> </li>
            <li class="product-tabs-item <?= is_tab_active(2) ?>">
            <a href="?action=product&id=1&tab=2"> Характеристики </a></li>
            <?php if (_get('reviews')): ?>
            <li class="product-tabs-item <?= is_tab_active(3) ?>">
            <a href="?action=product&id=1&tab=3"> Отзывы  </a>
            <span class="tabs-reviews"> <?php echo $product['reviews'] ?> </span>
        </li>
        <?php else: ?>
        <li class="product-tabs-item <?= is_tab_active(3) ?>">
            <a href="?tab=3"> Оставить отзыв  </a>
        </li>
        <?php endif; ?>
        <?php if (isset($product['questions']) && $product['questions']): ?>
            <li class="product-tabs-item <?= is_tab_active(4) ?>">
            <a href="?tab=4"> Вопросы  </a>
            <span class="tabs-questions"> <?php echo $product['questions'] ?> </span>
        </li>
        <?php else: ?>
        <li class="product-tabs-item <?= is_tab_active(4) ?>">
            <a href="?tab=4"> Задать вопрос  </a>
        </li>
        <?php endif; ?>
            
            <li class="product-tabs-item <?= is_tab_active(5) ?>"><a href="?tab=5"> Видео </a></li>
            <li class="product-tabs-item <?= is_tab_active(6) ?>"><a href="?tab=6">  Фото  </a></li>
            <li class="product-tabs-item <?= is_tab_active(7) ?>"><a href="?tab=7">  Покупают вместе  </a></li>
        </ul>
</div>


<div class="tabs-wrapper">
<?php if(isset($_GET['tab'])&& $_GET['tab'] == 1): ?>
<?php include 'tabs/tab1.php' ?>
    
<?php elseif(isset($_GET['tab'])&& $_GET['tab'] == 2): ?>
    <div class="tab-content">Тут будет: Характеристики </div>
<?php elseif(isset($_GET['tab'])&& $_GET['tab'] == 3): ?>
    <div class="tab-content">Тут будет: Отзывы </div>
<?php elseif(isset($_GET['tab'])&& $_GET['tab'] == 4): ?>
    <div class="tab-content">Тут будет: Вопросы </div>
<?php elseif(isset($_GET['tab'])&& $_GET['tab'] == 5): ?>
    <div class="tab-content">Тут будет:  Видео </div>
<?php elseif(isset($_GET['tab'])&& $_GET['tab'] == 6): ?>
    <div class="tab-content">Тут будет: Фото </div>
<?php elseif(isset($_GET['tab'])&& $_GET['tab'] == 7): ?>
    <div class="tab-content">Тут будет: Покупают вместе </div> 
<?php endif ?>

</div>

<h2 class="recommend">Вас так же может заинтересовать</h2>
<div class="recommend-products-wrapper products category">
    <?php 
        
        $products = db_query("SELECT * FROM products ORDER BY RAND() LIMIT 6");
        foreach($products as $product): 
        // $reviews = $product_r['reviews'];

        include 'blocks/category-product.php';
        continue;
    ?>
    <div class="recommend-product-wrap">
       <div class="recommend-product">
                <a href="?<?= 'action=product&tab=1&id=' . $product_r['id'] ?>" class = "recommend-product-title">
                    <img 
                        src="<?= get_product_image_src($product_r) ?>"
                        alt=""
                    />
                    <?= $product_r['title'] ?>
                </a>             
              
            <?php if(isset($product_r['old_price'])): ?>
                <div class="old-price"><?= $product_r['old_price'] ?> ₴ </div>
            <?php else: ?>
                <div class="old-price no-style">&nbsp;</div>
            <?php endif; ?>
                <div class="price"><?php echo $product_r[ 'price'] ?> ₴ </div>
            <?php if($product_r['rating']):?>
                <div class="rating"><?= $product_r['rating'] ?></div>
            <?php else: ?>
                <div></div>
            <?php endif; ?> 
            <?php if($reviews):?>   
                <div class="reviews"> <a href="#"><?= $reviews ?> Отзыв<?= sklonenie($reviews, '', 'а', 'ов') ?></a></div>
            <?php else: ?>
                <div class="leave-reviwe"><a href="#">Оставить отзыв</a></div>
            <?php endif; ?>    
            <?php if($product_r['ends']): ?>
                <div class="is-over">Заканчивается</div>
            <?php else: ?>
                <div class="is-over">&nbsp;</div>
            <?php endif; ?>
       </div>
    </div>
            <?php endforeach; ?>    
</div>


<h2 class="recommend">Просмотренные товары</h2>
<div class="recommend-products-wrapper products category">
    <?php 
        $viewed = $_SESSION['viewed'];
        $viewed = array_reverse($viewed);
        $viewed = implode(',', $viewed);
        $products = db_query("SELECT * FROM products WHERE id IN($viewed) LIMIT 6");
        foreach($products as $product): 
        // $reviews = $product_r['reviews'];

        include 'blocks/category-product.php';
        continue;
    ?>
    <div class="recommend-product-wrap">
       <div class="recommend-product">
                <a href="?<?= 'action=product&tab=1&id=' . $product_r['id'] ?>" class = "recommend-product-title">
                    <img 
                        src="<?= get_product_image_src($product_r) ?>"
                        alt=""
                    />
                    <?= $product_r['title'] ?>
                    <?php
                    if(auth_admin()){
                        echo "[$product_r[id]]";
                    }

                    ?>
                </a>             
              
            <?php if(isset($product_r['old_price'])): ?>
                <div class="old-price"><?= $product_r['old_price'] ?> ₴ </div>
            <?php else: ?>
                <div class="old-price no-style">&nbsp;</div>
            <?php endif; ?>
                <div class="price"><?php echo $product_r[ 'price'] ?> ₴ </div>
            <?php if($product_r['rating']):?>
                <div class="rating"><?= $product_r['rating'] ?></div>
            <?php else: ?>
                <div></div>
            <?php endif; ?> 
            <?php if($reviews):?>   
                <div class="reviews"> <a href="#"><?= $reviews ?> Отзыв<?= sklonenie($reviews, '', 'а', 'ов') ?></a></div>
            <?php else: ?>
                <div class="leave-reviwe"><a href="#">Оставить отзыв</a></div>
            <?php endif; ?>    
            <?php if($product_r['ends']): ?>
                <div class="is-over">Заканчивается</div>
            <?php else: ?>
                <div class="is-over">&nbsp;</div>
            <?php endif; ?>
       </div>
    </div>
            <?php endforeach; ?>    
</div>





</div>