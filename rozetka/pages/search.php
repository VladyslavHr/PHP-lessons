<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<?php $result_arr = array_filter($similar_products, function($product)
{
        $position = stripos($product['title'], $_GET['query']);
        $position2 = stripos(@$product['sku'], $_GET['query']);
         if($position === false && $position2 === false ){
            return false;
         }else{
            return true;
         }
       
    


});
$count = count($result_arr);


?>
<div class="main-container">
<?php include 'blocks/sidebar.php' ?>
      <div class="main-content">
      <h2 class="block-title">Вы искали "<?= $_GET['query'] ?>"</h2>
     
        
      
     <h4> <?= tovarov($count)?> </h4> 
     
        <?php if (count($result_arr) == 1): ?>
        <h4>Найден <?=count($result_arr)?> товар </h4>
        <?php elseif (count($result_arr) == 2): ?>
        <h4>Найдено <?=count($result_arr)?> товара </h4>
        <?php elseif (count($result_arr) == 3): ?>
        <h4>Найдено <?=count($result_arr)?> товара </h4>
         <?php elseif (count($result_arr) == 4): ?>
          <h4>Найдено <?=count($result_arr)?> товара </h4>
          <?php elseif (count($result_arr) >=5): ?>
          <h4>Найдено <?=count($result_arr)?> товаров </h4>
          <?php elseif (count($result_arr) ==0): ?>
            <h4>Товаров не найдено </h4>
          <?php endif ?>




      <div class="products">
          <?php foreach($result_arr as $id => $product): 


            ?>
          <div class="product-wrapper">    
            <div class="product">
              <?php if($product['fav']): ?>
              <div class="heart"></div>
              <?php else: ?>
                <div class="heart heart-empty"></div>
              <?php endif; ?>
              <img
                src="https://content.rozetka.com.ua/goods/images/preview/100267119.jpg"
                alt=""
              />
              <a href="?action=product&tab=1&id=<?= $id ?>" class = "product-title">
              <?= $product['title'] ?>
              </a>
             
              
              <?php if(isset($product['old_price'])): ?>
              <div class="old-price"><?= $product['old_price'] ?></div>
              <?php else: ?>
                <div class="old-price no-style">&nbsp;</div>
                <?php endif; ?>
              <div class="price"><?php echo $product[ 'price'] ?> </div>
              <?php if($product['ends']): ?>
                <div class="is-over">Заканчивается</div>
              <?php else: ?>
                <div class="is-over">&nbsp;</div>
              <?php endif; ?>
            </div>
          </div>
            <?php endforeach; ?>
                
     
               
   
    
      
         </h4>



        </div>
      </div>
    </div>
