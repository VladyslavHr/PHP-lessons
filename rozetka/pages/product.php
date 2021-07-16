<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<pre>
<?php 
$product_id = $_GET['id'];
$product = $similar_products[$product_id];
// print_r($_GET);
// print_r($similar_products);
// print_r($product);
// $title = $product['title']
if (isset($_GET['fake'])){
    $faker = Faker\Factory::create();
    $product = array_merge($product, [
        'title' => $faker->jobTitle(),
        'price' => $faker->randomFloat(2,0,10000),
    ]);
}
?>
</pre>
<div class="product-page">
<ul class="breadcrums">
   <li class="breadcrum-item home">
        <a href="#" class="breadcrum-link">
        <?php include 'svg/home.svg' ?>
        </a>
    </li>
       <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="#" class="breadcrum-link">Спорт и увлечения</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="#" class="breadcrum-link">Активный отдых, туризм и хобби</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="#" class="breadcrum-link">Радиоуправляемые модели</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="#" class="breadcrum-link">Квадрокоптеры</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="#" class="breadcrum-link">Квадрокоптеры Visuo
</a>
    </li>

</ul>

<div class="product-title"><?php echo $product['title'] ?></div>

<div class="under-title">
    <div class="rating">
<div class="stars">
    <?php for($i = 1; $i <=5; $i++): ?>
    <span class="star <?php echo $product['rating'] < $i ? 'empty' : '' ?> "></span>
    <?php endfor; ?>
</div>

        <a href="#">14 отзывов</a>
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



</div>