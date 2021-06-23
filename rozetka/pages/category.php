<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<div class="category">
    <div class="products">
    <?php foreach($similar_products as $id => $product): ?>
        <div class="product">
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
        </div>
        <?php endforeach ?>
    </div>
</div>