<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>

<div class="category">
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
        <a href="#" class="breadcrum-link">Категории</a>
    </li>
    <li class="breadcrum-devider">
           <?php include 'svg/breadcrum-arrow.svg' ?>
       </li>
    <li class="breadcrum-item">
        <a href="#" class="breadcrum-link">Активный отдых, туризм и хобби</a>
    </li>
</ul>
  <h2 class="category-title text-center">Product category</h2>
    <div class="pagination">
      <a href="" class="prev"></a>
      <ul>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li><a href="">5</a></li>
        <li><a href="">6</a></li>
        <li><a href="">7</a></li>
        <li><a href="">8</a></li>
      </ul>
      <a href="" class="next"></a>
    </div>
    <div class="products">
    <?php foreach($similar_products as $id => $product): ?>
        <a class="product" href="?action=product&tab=1&id=<?= $id ?>">
            <img src="<?php echo get_random_img_src() ?>" alt="">
            <h2 class="title">Product titile</h2>
            <?php if(isset($product['old_price'])): ?>
              <div class="old-price"><?= $product['old_price'] ?> ₴ </div>
              <?php else: ?>
                <div class="old-price no-style">&nbsp;</div>
                <?php endif; ?>
              <div class="price"><?php echo $product[ 'price'] ?> ₴ </div>
              <?php if($product['ends']): ?>
                <div class="is-over">Заканчивается</div>
              <?php else: ?>
                <div class="is-over">&nbsp;</div>
              <?php endif; ?>
            </a>
        <?php endforeach ?>
    </div>
</div>