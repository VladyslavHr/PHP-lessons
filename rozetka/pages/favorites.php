<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<?php





$sorting = $_GET['sorting'] ?? 'default';

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 20;


if($user_favs_g){
    $user_favorites = implode(',', $user_favs_g);
    $where = " WHERE id in($user_favorites)";


$total_count = db_query("SELECT count(*) FROM products $where");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;


if (!empty($_GET['sorting']) && $_GET['sorting'] === 'title'){
  $order_by = 'ORDER BY title';

}
elseif (!empty($_GET['sorting']) && $_GET['sorting'] === 'price_asc'){
  $order_by = 'ORDER BY price';
}
elseif (!empty($_GET['sorting']) && $_GET['sorting'] === 'price_desc'){
  $order_by = 'ORDER BY price DESC';
}
elseif (!empty($_GET['sorting']) && $_GET['sorting'] === 'rating'){
  $order_by = 'ORDER BY rating DESC';
}
else{
  $order_by = '';
}

$products = db_query("SELECT * FROM products $where $order_by LIMIT $limit OFFSET $offset ");

function decode_fast_info_json($product)
{
    $product['fast_info'] = json_decode($product['fast_info'], true);
    return $product;
}
$products = array_map('decode_fast_info_json',$products);

}else{
    $products = [];
    $total_count = 0;
}



?>
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
  <h2 class="category-title text-center">Your favorites</h2>
  <div class="category-pagination">
<?php bs_pagination($offset, $limit, $total_count); ?>
</div>
    <div class="before-products">
        <div class="count">
          <?php
            $amount = $limit < $total_count ? $limit : $total_count;
          ?>
           Показано <?= $amount  ?> товар<?= sklonenie($amount, '', 'а', 'ов') ?>.
        </div>
        <div class="category-settings">
        <span class="category-settings-text">Товаров на странице</span>
        <select oninput="location.href = this.value">
        <!-- <option>Товаров на странице</option> -->
          <option <?= if_selected($limit, '5')  ?> value="<?= query_add(['offset' => 0,'limit' => '5'])?>">5</option>
          <option <?= if_selected($limit, '10')  ?> value="<?= query_add(['offset' => 0,'limit' => '10'])?>">10</option>
          <option <?= if_selected($limit, '20')  ?> value="<?= query_add(['offset' => 0,'limit' => '20'])?>">20</option>
          <option <?= if_selected($limit, '50')  ?> value="<?= query_add(['offset' => 0,'limit' => '50'])?>">50</option>
          <option <?= if_selected($limit, '100')  ?> value="<?= query_add(['offset' => 0,'limit' => '100'])?>">100</option>
          <!-- <option> Новинки </option>
          <option> Акционные </option> -->        
        </select>
        <select oninput="location.href = this.value">
          <option <?= if_selected($sorting, 'default')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'default'])?>">Сортировать</option>
          <option <?= if_selected($sorting, 'price_asc')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'price_asc'])?>"> От дешевых к дорогим </option>
          <option <?= if_selected($sorting, 'price_desc')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'price_desc'])?>"> От дорогих к дешевым </option>
          <option <?= if_selected($sorting, 'rating')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'rating'])?>"> Популярные </option>
          <option <?= if_selected($sorting, 'title')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'title'])?>"> По названию </option>
          <!-- <option> Новинки </option>
          <option> Акционные </option> -->        
        </select>
        <div class="view-type">
        <input id="view_type1" type="radio" name="view_type" checked onchange="change_view_type()">
        <label for="view_type1"><i class="bi bi-grid"></i></label>
        <input id="view_type2" type="radio" name="view_type" onchange="change_view_type()">
          
          <label for="view_type2"><i class="bi bi-list"></i></label>
          <script>
            function change_view_type(input){
              document.all.category_product_list.classList.toggle('list')
            }
          </script>
        </div>
        </div>
    </div>
    <div class="products" id="category_product_list">
      <?php foreach($products as $id => $product): 
        
        include 'blocks/category-product.php';
        continue;
        ?>
        <div class="product">
            <div class="category-list-item-left">
            <?php product_heart($product) ?>
              <a class="category-product-image" href="?action=product&tab=1&id=<?= $product['id'] ?>">
                <img class="image-main" src="<?= get_product_image_src($product) ?>" alt="" >
                <img class="image-hover" src="<?= get_gallery_image_src($product) ?>" alt="" >
              </a>
            </div>
          <div class="category-list-item-right">
            
              <h2 class="title">
                <a href="?action=product&tab=1&id=<?= $product['id'] ?>">
                  <?= $product['title'] ?> <?php if(auth_admin()): ?> [<?=$product['id'] ?>] <?php endif ?>
                </a>
              <?php edit_product_link($product['id'])?> 
            </h2>
          <div class="category-color-wrapper">
            <ul class="category-colors">
            <?php
            if($product['colors']){
                $colors = explode('|', $product['colors']);
            foreach ($colors as $color){
               echo "<li class='category-color'><span style='$color'></span></li>";
            }
        } ?>
            </ul>
          </div>


            <?php if(isset($product['old_price']) && $product['old_price'] !== $product['price']): ?>
              <div class="old-price"><?= $product['old_price'] ?> ₴ </div>
                <?php else: ?>
                  <div class="old-price no-style">&nbsp;</div>
                    <?php endif; ?>
            <div class="price"><?php echo $product[ 'price'] ?> ₴ </div>
            
        <div class="category-status">
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
      
              <?php if($product['ends']): ?>
                <div class="is-over">Заканчивается</div>
                  <?php else: ?>
                    <div class="is-over">&nbsp;</div>
                      <?php endif; ?>
              <div class="rating">rating: <?= !empty($product ['rating']) ? $product ['rating'] : 0  ?></div>
              <?php if(!empty($product ['fast_info']) && is_array($product ['fast_info'])) : ?>
                <ul class="fast-info">
                  <?php foreach($product ['fast_info'] as $spec => $value): ?>
                    <li><?= $spec ?>: <span><?= $value ?></span></li>
                      <?php endforeach; ?>
                        </ul>
                          <?php endif; ?>
              <?php if(!empty($product['finger_print']) && $product['finger_print']): ?>
                <div class="finger-print"><img src="img/finger-info.png" alt=""></div>
                  <?php endif; ?>
                    </div>

              </div>
           
        <?php endforeach ?>
              </div>
</div>