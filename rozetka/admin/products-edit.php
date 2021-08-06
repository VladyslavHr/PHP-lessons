<?php
// Create
if(isset($_POST['edit_product'])){
  // pa($_POST);
  // return;
    $product_id = (int)$_POST['edit_product'];
    $title = db_escape($_POST['title']);
    $description = db_escape($_POST['description']);
    $price = db_escape($_POST['price']);
    $old_price = db_escape($_POST['old_price']);
    $favorite = db_escape($_POST['favorite']);
    $sku = db_escape($_POST['sku']); //Экранирует строку для использования в mysql_query
    $rating = db_escape($_POST['rating']);
    $reviews = db_escape($_POST['reviews']);
    $questions = db_escape($_POST['questions']);
    $fast_info = [];
    foreach ($_POST['fast_info'] as $row){
      $fast_info[$row['name']] = $row['value'];
    }
   $fast_info = json_encode($fast_info);
   $fast_info = db_escape($fast_info);
    db_query("UPDATE products SET
      title = '$title',
      `description` = '$description',
      price = '$price',
      old_price = '$old_price',
      favorite = '$favorite',
      sku = '$sku',
      rating = '$rating',
      reviews = '$reviews',
      questions = '$questions',
      fast_info = '$fast_info'
      WHERE id = '$product_id'");
    header('Location: admin.php?action=products');
    exit;
}

$product_id = (int)$_GET['product_id'];
$product = db_query("SELECT * FROM products WHERE id = '$product_id' ");
$product = $product[0];

$product = array_map(function($value)
{
  return esc_attr($value);
}, $product);

?>

<h2>Edit Product <?= $product['title'] ?> <?= $product['description'] ?> (<?= $product['sku'] ?>)</h2>

<form action="?action=products-edit" method="Post">

<div class="row my-3">
  <div class="col">
    <input name="title" value="<?=$product['title']?>" type="text" class="form-control" placeholder="Title" aria-label="Title">
  </div>
  <div class="col">
    <input name="description" value="<?=$product['description']?>" type="text" max="50" class="form-control" placeholder="Description" aria-label="description">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="price" value="<?=$product['price']?>" type="number" class="form-control" step=".01" placeholder="Price" aria-label="Price">
  </div>
  <div class="col">
    <input name="old_price" value="<?=$product['old_price']?>" type="number" class="form-control" step=".01" placeholder="Old price" aria-label="Old price">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="sku" value="<?=$product['sku']?>" type="text" class="form-control" placeholder="Sku" aria-label="Sku">
  </div>
  <div class="col">
    <select name="favorite" class="form-control">
    <option <?= if_selected($product['favorite'], '1') ?> value="1">like</option>
    <option <?= if_selected($product['favorite'], '0') ?> value="0">dislike</option>
    </select>
  </div>
  <div class="col">
    <select name="rating" class="form-control">
    <option <?= if_selected($product['rating'], '1') ?> value="1">1</option>
    <option <?= if_selected($product['rating'], '2') ?> value="2">2</option>
    <option <?= if_selected($product['rating'], '3') ?> value="3">3</option>
    <option <?= if_selected($product['rating'], '4') ?> value="4">4</option>
    <option <?= if_selected($product['rating'], '5') ?> value="5">5</option>
    </select>
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="reviews" value="<?=$product['reviews']?>" type="text" class="form-control" placeholder="Reviews" aria-label="Reviews">
  </div>
  <div class="col">
    <input name="questions" value="<?=$product['questions']?>" type="text" class="form-control" placeholder="Questions" aria-label="Questions">
  </div>
</div>

<div>
  <div>
    <h3>Fast info</h3>
    <?php 
    $product['fast_info'] = json_decode(htmlspecialchars_decode($product['fast_info']), true);
    if(is_array($product['fast_info'])){
      $i = 0;
      foreach ($product['fast_info'] as $key => $value) {
        echo '<div class="row my-3">';
        echo '<div class="col-3">';
        echo '<input name="fast_info['.$i.'][name]" class="form-control" value="'.$key.'">';
        echo '</div>';
        echo '<div class="col-1 text-center"> => </div>';
        echo '<div class="col-3">';
        echo '<input name="fast_info['.$i.'][value] class="form-control" value="'.$value.'">';
        echo '</div>';
      echo '</div>';
      $i++;
      }
    }
    ?>
  </div>
</div>

<button name="edit_product" value="<?= $product['id']?>" type="submit" class="btn btn-primary">Save</button>

</form>