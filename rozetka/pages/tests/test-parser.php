<div style="padding: 25px">

<?php

$products = db_query("SELECT id,`url`,title FROM products WHERE title = '' LIMIT 5 ");

pa($products);


foreach ($products as $key => $product){
    parse_product_update($product['url']);
}
// for ($page_num=16; $page_num <= 67; $page_num++){
//   parse_category_page($page_num);
// }

function parse_category_page($page_num){

  $html = file_get_html('https://rozetka.com.ua/mobile-phones/c80003/page='.$page_num.'/');

  $products = $html->find('.goods-tile__heading');

  if($products){
    pa(count($products));
    foreach($products as $product) {
      // echo $product->href;
      // echo '<hr>';
      $url = db_escape($product->href);
      $product_exists = db_query("SELECT id FROM products WHERE `url` = '$url'");
      if(!$product_exists){
        db_query("INSERT INTO products SET `url` = '$url' ");
      }

      // parse_product($product->href);
    }
  }

}
// parse_product('https://rozetka.com.ua/oneplus-5011101484/p310574003/');
// parse_product('https://rozetka.com.ua/motorola-789433/p306218988/');
// parse_product('https://rozetka.com.ua/nokia_719901148431/p294467393/');
// parse_product('https://rozetka.com.ua/poco-819068/p298153403/');
// parse_product('https://rozetka.com.ua/oneplus-5011101269/p310571223/');


function parse_product($url)
{



$html = file_get_html($url);

if(!$html) return null;




// ->href - любой атрибут

// plaintext - забирает текст внутри
// innertext - забирает тескт и теги
// outertext - забирает теги и тескт включая текущий тег


// $product_title = $html->find('.product__title', 0)->plaintext;

// $product_title = trim($product_title);

// pa($product_title);

$characteristics = $html->find('.characteristics-full__list > div');
// pa(count($characteristics));

$fast_info = [];
foreach ($characteristics as  $characteristics){
  $fast_info[$characteristics->find('dt',0)->plaintext] = $characteristics->find('dd li',0)->plaintext;
  // echo $characteristics->find('dt',0)->plaintext;
  // echo '========>';
  // echo $characteristics->find('dd li',0)->plaintext;
  // echo '<hr>';
}

// pa($fast_info);

$json = $html->find('[data-seo="Product"]', 0);

if(!$json) return null;

$json = $json->innertext; 

$arr = json_decode($json, true);


// pa($json);

// pa($arr);

$product_id = $arr ['sku'];

$get_goods_total = file_get_contents("https://product-api.rozetka.com.ua/v4/comments/get-goods-total?front-type=xl&country=UA&lang=ru&goodsIds=$product_id");

$get_goods_total = json_decode($get_goods_total, true);

// pa($get_goods_total);


if($arr['image'])$card = str_replace('base_action', 'big', array_shift($arr['image']));
if($arr['image'])$gallery = json_encode($arr['image']);

$product_arr = [
    'title' => $arr['name'],
    'description' => $arr['description'],
    'price' => $arr['offers']['price'],
    'old_price' => '0',
    'favorite' => '0',
    'ends' => '0',
    'sku' => $arr['sku'],
    'rating' => '0',
    'status' => $arr['offers']['availability'] === 'http://schema.org/InStock' ? 'instock' : 'outofstock',
    'reviews' => $get_goods_total['data'][0]['comments']['amount'],
    'questions' => $get_goods_total['data'][0]['questions']['amount'],
    'card' => $card ?? '',
    'gallery' => $gallery ?? '',
    'fast_info' => json_encode($fast_info),

];

// pa($product_arr);


$title = db_escape($product_arr['title']);
$description = db_escape($product_arr['description']);
$price = db_escape($product_arr['price']);
$old_price = db_escape($product_arr['old_price']);
$favorite = db_escape($product_arr['favorite']);
$ends = db_escape($product_arr['ends']);
$sku = db_escape($product_arr['sku']); //Экранирует строку для использования в mysql_query
$rating = db_escape($product_arr['rating']);
$status = db_escape($product_arr['status']);
$reviews = db_escape($product_arr['reviews']);
$questions = db_escape($product_arr['questions']);
$card = db_escape($product_arr['card']);
$gallery = db_escape($product_arr['gallery']);
$fast_info = db_escape($product_arr['fast_info']);
$url = db_escape($url);
$card_title = '';
if(isset($_FILES['card'])){
  $card_title = time() . '-' . $_FILES["card"]["name"];    
move_uploaded_file($_FILES["card"]["tmp_name"], "cards/$card_title");
$card_title = db_escape($card_title);
}
db_query("INSERT INTO products SET
  title = '$title',
  `description` = '$description',
  price = '$price',
  old_price = '$old_price',
  favorite = '$favorite',
  ends = '$ends',
  sku = '$sku',
  rating = '$rating',
  `status` = '$status',
  reviews = '$reviews',
  questions = '$questions',
  `card` = '$card',
  gallery = '$gallery',
  `url` = '$url',
  fast_info = '$fast_info'");

}







function parse_product_update($url)
{



$html = file_get_html($url);

if(!$html) return null;




// ->href - любой атрибут

// plaintext - забирает текст внутри
// innertext - забирает тескт и теги
// outertext - забирает теги и тескт включая текущий тег


// $product_title = $html->find('.product__title', 0)->plaintext;

// $product_title = trim($product_title);

// pa($product_title);

$characteristics = $html->find('.characteristics-full__list > div');
pa(count($characteristics));

$fast_info = [];
foreach ($characteristics as  $characteristics){
  $fast_info[$characteristics->find('dt',0)->plaintext] = $characteristics->find('dd li',0)->plaintext;
  // echo $characteristics->find('dt',0)->plaintext;
  // echo '========>';
  // echo $characteristics->find('dd li',0)->plaintext;
  // echo '<hr>';
}

// pa($fast_info);

$json = $html->find('[data-seo="Product"]', 0);

if(!$json) return null;

$json = $json->innertext; 

$arr = json_decode($json, true);


// pa($json);

// pa($arr);

$product_id = $arr ['sku'];

$get_goods_total = file_get_contents("https://product-api.rozetka.com.ua/v4/comments/get-goods-total?front-type=xl&country=UA&lang=ru&goodsIds=$product_id");

$get_goods_total = json_decode($get_goods_total, true);

// pa($get_goods_total);


if($arr['image'])$card = str_replace('base_action', 'big', array_shift($arr['image']));
if($arr['image'])$gallery = json_encode($arr['image']);

$product_arr = [
    'title' => $arr['name'],
    'description' => $arr['description'],
    'price' => $arr['offers']['price'],
    'old_price' => '0',
    'favorite' => '0',
    'ends' => '0',
    'sku' => $arr['sku'],
    'rating' => '0',
    'status' => $arr['offers']['availability'] === 'http://schema.org/InStock' ? 'instock' : 'outofstock',
    'reviews' => $get_goods_total['data'][0]['comments']['amount'],
    'questions' => $get_goods_total['data'][0]['questions']['amount'],
    'card' => $card ?? '',
    'gallery' => $gallery ?? '',
    'fast_info' => json_encode($fast_info),

];

// pa($product_arr);


$title = db_escape($product_arr['title']);
$description = db_escape($product_arr['description']);
$price = db_escape($product_arr['price']);
$old_price = db_escape($product_arr['old_price']);
$favorite = db_escape($product_arr['favorite']);
$ends = db_escape($product_arr['ends']);
$sku = db_escape($product_arr['sku']); //Экранирует строку для использования в mysql_query
$rating = db_escape($product_arr['rating']);
$status = db_escape($product_arr['status']);
$reviews = db_escape($product_arr['reviews']);
$questions = db_escape($product_arr['questions']);
$card = db_escape($product_arr['card']);
$gallery = db_escape($product_arr['gallery']);
$fast_info = db_escape($product_arr['fast_info']);
$url = db_escape($url);
$card_title = '';
if(isset($_FILES['card'])){
  $card_title = time() . '-' . $_FILES["card"]["name"];    
move_uploaded_file($_FILES["card"]["tmp_name"], "cards/$card_title");
$card_title = db_escape($card_title);
}
db_query("UPDATE products SET
  title = '$title',
  `description` = '$description',
  price = '$price',
  old_price = '$old_price',
  favorite = '$favorite',
  ends = '$ends',
  sku = '$sku',
  rating = '$rating',
  `status` = '$status',
  reviews = '$reviews',
  questions = '$questions',
  `card` = '$card',
  gallery = '$gallery',
  fast_info = '$fast_info' WHERE `url` = '$url' ");

}
?>
</div>