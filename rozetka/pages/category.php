<?php if(!defined('ROOT')){ die('Direct request not allowed'); }?>
<?php











$sorting = $_GET['sorting'] ?? 'default';

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 20;

$final_where = [];

if(!empty($_GET['brand'])){
  $brand_name = db_escape($_GET['brand']);
  $final_where[] = "(brand_name = '$brand_name')";
}elseif (!empty($_GET['brands'])) {
  $where_brands = [];
  foreach ($_GET['brands'] as $brand) {
    $where_brands[] = "brand_name = '$brand'";
  }
  $brand_name = implode(', ' , $_GET['brands']);
  $brand_name = '';
  $where_brands = implode(' OR ', $where_brands);
  $final_where[] = "($where_brands)";
}else{
  $brand_name = '';
}

if(!empty($_GET['min_price']) || !empty($_GET['max_price'])) {
  $where_price = [];
  if(!empty($_GET['min_price'])){
    $min_price = (float)$_GET['min_price'];
    $where_price[] = "price > '$min_price'";
  }
  if(!empty($_GET['max_price'])){
    $max_price = (float)$_GET['max_price'];
    $where_price[] = "price < '$max_price'";
  }
  $where_price = implode(' AND ', $where_price);
  $final_where[] = "($where_price)";
}
if($final_where){
  $final_where = 'WHERE' .implode(' AND ', $final_where);
}else{
  $final_where = '';
}

$total_count = db_query("SELECT count(*) FROM products $final_where");
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

$products = db_query("SELECT * FROM products $final_where $order_by LIMIT $limit OFFSET $offset ");

function decode_fast_info_json($product)
{
    $product['fast_info'] = json_decode($product['fast_info'], true);
    $product['price'] = number_format( $product[ 'price'], 0, '', ' ');
    $product['old_price'] = number_format( $product[ 'old_price'], 0, '', ' ');
    return $product;
}
$products = array_map('decode_fast_info_json',$products);



$brands = db_query("SELECT DISTINCT brand_name FROM products WHERE brand_name <> '' ORDER BY brand_name");

$brands = array_column($brands, 'brand_name');




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
  <h2 class="category-title text-center">Product category</h2>
  <div class="category-pagination">
    <?php bs_pagination($offset, $limit, $total_count); ?>
  </div>
  <div class="before-products">
    <div class="count">
      <?php
        $amount = $limit < $total_count ? $limit : $total_count;
      ?>
      Показано <?= $amount  ?> товар<?= sklonenie($amount, '', 'а', 'ов') ?>.
      <?= $brand_name ? "Бренд: <b>$brand_name</b>" : '' ?>
    </div>
    <div class="filter-choosen">
      <a class="filter-reset" href="<?= query_del([ 'brands' ])?>">Reset</a>
      <?php foreach ($_GET['brands'] ?? [] as $key => $brand_) : ?>
      <a class="filter-choosen-brand" href="<?= query_del([ 'brands' => [$brand_] ])?>"><?= $brand_ ?> <span><?= bi('x') ?></span></a>
      <?php endforeach ?>
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
    <div class="produscts-with-sidebar">
      <div class="sidebar-filtr">
        <?php if(auth_admin()) pa($_GET); ?>
        <div class="category-brands-filtr">
          <a href="?action=brands">Бренд</a> 
          <input class="filtr-brands-input" type="text">
          <a href="#" class="filtr-a-name">Алфавитный указатель</a>
          <ul class="category-filtr-list category-brands-list"> 
            <?php foreach($brands as $key => $brand):
            if(in_array($brand, $_GET['brands'] ?? [])) {
              $href = '';
              $active = 'active';
            }else{
              $href = 'href="'.query_add(['brands[]' => $brand]) . '"';
              $active = '';
            }
               ?>
            <li class="category-filtr-schedule">
              <a class="filtr-link" <?= $href ?>>

                    <span class="checkbox <?= $active ?>">&nbsp</span>
                    <span class="brand"><?= $brand ?></span>


              </a>
            </li>
            <?php endforeach ?>
          </ul>
        </div>
          
        <div class="category-price-filtr">
          <span class="price-filtr-span">Цена</span>
          <form id="filter_price_form" class="category-price-filtr-input-wrap">
            <input type="number" name="min_price">
            <span> — </span>
            <input type="number" name="max_price">
            <button type="submit"> 
              <p>OK</p> 
            </button>
          </form>
        </div>
            <script>
              var log = console.log
              $('#filter_price_form').on('submit', function(event){
                event.preventDefault()
                log(location.search)
                log($(this).serialize())
                location.href = location.search + '&' + $(this).serialize()
              })
            </script>
      

        <div class="category-connections">
          <a href="#" class="filtr-a-name">Стандарт связи</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="3G">
                <label class="filtr-label" for="3G">3G</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="4G">
                <label class="filtr-label" for="4G">4G</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="LTE">
                <label class="filtr-label" for="LTE">LTE</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-screen">
          <a href="#" class="filtr-a-name">Диагональ экрана</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="to4">
                <label class="filtr-label" for="to4">До4</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="from_4to5">
                <label class="filtr-label" for="from_4to5">4,1-5,1</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="6_abd_more">
                <label class="filtr-label" for="6_and_more">6,5 и более</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-battery">
          <a href="#" class="filtr-a-name">Емкость аккумулятора</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="battery3">
                <label class="filtr-label" for="battery3">3000 - 3999 мА*ч</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="battery4">
                <label class="filtr-label" for="battery4">4000 - 4999 мА*ч</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="battery6">
                <label class="filtr-label" for="battery6">6000 мА*ч и более</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-memory">
          <a href="#" class="filtr-a-name">Оперативная память</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="memory6">
                <label class="filtr-label" for="memory6">6 ГБ</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="memory10">
                <label class="filtr-label" for="memory10">10 ГБ</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="memory16">
                <label class="filtr-label" for="memory16">16 ГБ</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-cameras-special">
          <a href="#" class="filtr-a-name">Особенности основной камеры</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="autofocus">
                <label class="filtr-label" for="autofocus">Автофокус</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="flashlight">
                <label class="filtr-label" for="flashlight">Вспышка</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="stabilisation">
                <label class="filtr-label" for="stabilisation">Стабилизация</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-camras-mgp">
          <a href="#" class="filtr-a-name">Колличество мегапикселей основной камеры</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="9mgp">
                <label class="filtr-label" for="9mgp">9-15 МП</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="16mgp">
                <label class="filtr-label" for="16mgp">16-20МП</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="100mgp">
                <label class="filtr-label" for="100mgp">100 и более МП</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-matrix">
          <a href="#" class="filtr-a-name">Тип матрицы</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="amoled">
                <label class="filtr-label" for="amoled">Super Amouled</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="ips">
                <label class="filtr-label" for="ips">IPS</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="pls">
                <label class="filtr-label" for="pls">PLS</label>
              </a>
            </li>
          </ul>
        </div>

        <div class="category-screen-refresh">
          <a href="#" class="filtr-a-name">Частота обновления экрана</a>
          <ul class="category-filtr-list">
            <li class="category-filtr-schedule">
              <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="3G">
                <label class="filtr-label" for="3G">60 Гц</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="4G">
                <label class="filtr-label" for="4G">90 Гц</label>
              </a>
            </li>
            <li class="category-filtr-schedule">
            <a class="filtr-link" href="#">
                <span class="filtr-checkbox"></span>
                <input class="filtr-input" type="checkbox" id="LTE">
                <label class="filtr-label" for="LTE">120 Гц</label>
              </a>
            </li>
          </ul>
        </div>
      </div>

        <div class="products" id="category_product_list">
          <?php foreach($products as $id => $product):   ?>
              <?php include 'blocks/category-product.php' ?>
            <?php endforeach; ?>
            <?= show_more_btn($offset, $limit); ?>
        </div>       
    </div>

</div> 
                 