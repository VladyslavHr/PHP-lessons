<?php
// Create
if(isset($_POST['edit_product'])){
    $product_id = (int)$_POST['edit_product'];
    $title = db_escape($_POST['title']);
    $description = db_escape($_POST['description']);
    $price = db_escape($_POST['price']);
    $old_price = db_escape($_POST['old_price']);
    $favorite = db_escape($_POST['favorite']);
    $sku = db_escape($_POST['sku']); //Экранирует строку для использования в mysql_query
    $rating = db_escape($_POST['raiting']);
    $reviews = db_escape($_POST['reviews']);
    $questions = db_escape($_POST['questions']);
    $fast_info = db_escape($_POST['fast_info']);
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

}

$product_id = (int)$_GET['product_id'];
$product = db_query("SELECT * FROM products WHERE id = '$product_id' ");
$product = $product[0];

?>

<h2>Edit Product <?= $product['title'] ?> <?= $product['description'] ?> (<?= $product['sku'] ?>)</h2>

<form action="?action=products-edit" method="Post">

<div class="row my-3">
  <div class="col">
    <input name="title" type="text" class="form-control" placeholder="Title" aria-label="Title">
  </div>
  <div class="col">
    <input name="description" type="text" max="50" class="form-control" placeholder="Description" aria-label="description">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="price" type="number" class="form-control" step=".01" placeholder="Price" aria-label="Price">
  </div>
  <div class="col">
    <input name="old_price" type="number" class="form-control" step=".01" placeholder="Old price" aria-label="Old price">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="sku" type="text" class="form-control" placeholder="Sku" aria-label="Sku">
  </div>
  <div class="col">
    <select name="favorite" class="form-control">
    <option <?= if_selected($product['favorite'], 'like') ?> value="like">like</option>
    <option <?= if_selected($product['favorite'], 'dislike') ?> value="dislike">dislike</option>
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
    <input name="reviews" type="text" class="form-control" placeholder="Reviews" aria-label="Reviews">
  </div>
  <div class="col">
    <input name="questions" type="text" class="form-control" placeholder="Questions" aria-label="Questions">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="fast_info" type="text" class="form-control" placeholder="Fast info" aria-label="Fast info">
  </div>
</div>

<button name="edit_product" type="submit" class="btn btn-primary">Save</button>

</form>