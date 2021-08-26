<?php
// Create
if(isset($_POST['edit_product'])){
  // pa($_POST);
  // return;
    $product_id = (int)$_POST['product_id'];
    $title = db_escape($_POST['title']);
    $description = db_escape($_POST['description']);
    $price = db_escape($_POST['price']);
    $old_price = db_escape($_POST['old_price']);
    $favorite = db_escape($_POST['favorite']);
    $ends = db_escape($_POST['ends']);
    $sku = db_escape($_POST['sku']); //Экранирует строку для использования в mysql_query
    $rating = db_escape($_POST['rating']);
    $status = db_escape($_POST['status']);
    $reviews = db_escape($_POST['reviews']);
    $questions = db_escape($_POST['questions']);
    $product = db_query("SELECT `card` FROM products WHERE id = '$product_id' ");
    $card_title = $product[0]['card'];

    if(isset($_FILES['card'])  && $_FILES['card']['size'] > 0){

      if(file_exists("cards/$card_title")) unlink("cards/$card_title");

      $card_title = time() . '-' . $_FILES["card"]["name"]; 
      $file_path = "cards/$card_title";   
    move_uploaded_file($_FILES["card"]["tmp_name"], "cards/$card_title");
    resizeSaveImage($file_path, $file_path, 300);
    $card_title = db_escape($card_title);
    }
    $fast_info = [];
    foreach ($_POST['fast_info'] as $row){
      if(!trim($row['name'])) continue;
      if(!trim($row['value'])) continue;
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
      ends = '$ends',
      sku = '$sku',
      rating = '$rating',
      `status` = '$status',
      reviews = '$reviews',
      questions = '$questions',
      `card` = '$card_title',
      fast_info = '$fast_info'
      WHERE id = '$product_id'");

    if($_POST['edit_product'] === 'save') redirect("admin.php?action=products-edit&product_id=$product_id");
    if($_POST['edit_product'] === 'save_list') redirect('admin.php?action=products');
    if($_POST['edit_product'] === 'save_open') redirect("index.php?action=product&tab=1&id=$product_id");
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

<form action="?action=products-edit" method="Post"  enctype='multipart/form-data'>

<input type="hidden" name="product_id" value="<?= $product['id']?>">

<div class="row">
  <div class="col-lg-3">
   <label for="product_card_input" class="cursor-pointer"> <img src="<?= get_product_image_src($product) ?>" class="img-thumbnail" alt="..."> 
   </label>
    <div class="mb-3">
  <label for="formFile" class="form-label">Card</label>
  <input name="card" class="form-control" type="file" id="product_card_input">
</div>
  </div>
  <div class="col-lg-9">


<div class="row my-3">
  <div class="col">
    <label class="form-label">Title</label>
    <input name="title" value="<?=$product['title']?>" type="text" class="form-control" placeholder="Title" aria-label="Title">
    <label class="form-label">Sku</label>
    <input name="sku" value="<?=$product['sku']?>" type="text" class="form-control" placeholder="Sku" aria-label="Sku">
  </div>
  <div class="col">
  <label class="form-label">Description</label>
    <textarea name="description" rows="4" value="<?=$product['description']?>" type="text" max="50" class="form-control" placeholder="Description" aria-label="description"> </textarea>
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Price</label>
    <input name="price" value="<?=$product['price']?>" type="number" class="form-control" step=".01" placeholder="Price" aria-label="Price">
  </div>
  <div class="col">
  <label class="form-label">Old price</label>
    <input name="old_price" value="<?=$product['old_price']?>" type="number" class="form-control" step=".01" placeholder="Old price" aria-label="Old price">
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Favorite</label>
    <select name="favorite" class="form-select">
    <option <?= if_selected($product['favorite'], '1') ?> value="1">like</option>
    <option <?= if_selected($product['favorite'], '0') ?> value="0">dislike</option>
    </select>
  </div>
  <div class="col">
  <label class="form-label">Ends</label>
    <select name="ends" class="form-select">
    <option <?= if_selected($product['ends'], '1') ?> value="1">yes</option>
    <option <?= if_selected($product['ends'], '0') ?> value="0">no</option>
    </select>
  </div>
  <div class="col">
  <label class="form-label">Rating</label>
    <select name="rating" class="form-select">
    <option <?= if_selected($product['rating'], '1') ?> value="1">1</option>
    <option <?= if_selected($product['rating'], '2') ?> value="2">2</option>
    <option <?= if_selected($product['rating'], '3') ?> value="3">3</option>
    <option <?= if_selected($product['rating'], '4') ?> value="4">4</option>
    <option <?= if_selected($product['rating'], '5') ?> value="5">5</option>
    </select>
  </div>
  <div class="col">
  <label class="form-label">Status</label>
    <select name="status" class="form-select">
    <option <?= if_selected($product['status'], 'in_stock') ?> value="in_stock">In stock</option>
    <option <?= if_selected($product['status'], 'out_of_stock') ?> value="out_of_stock">Out of stock</option>
    <option <?= if_selected($product['status'], 'from_warehouse') ?> value="from_warehouse">From Varhaus</option>
    </select>
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Reviews</label>
    <input name="reviews" value="<?=$product['reviews']?>" type="text" class="form-control" placeholder="Reviews" aria-label="Reviews">
  </div>
  <div class="col">
  <label class="form-label">Questions</label>
    <input name="questions" value="<?=$product['questions']?>" type="text" class="form-control" placeholder="Questions" aria-label="Questions">
  </div>
</div>

<div>
  <div>
    <h3>Fast info </h3>
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
        echo '<div class="row my-3">';
        echo '<div class="col-3">';
        echo '<input name="fast_info['.$i.'][name]" class="form-control" value="">';
        echo '</div>';
        echo '<div class="col-1 text-center"> => </div>';
        echo '<div class="col-3">';
        echo '<input name="fast_info['.$i.'][value] class="form-control" value="">';
        echo '</div>';
      echo '</div>';
    ?>
  </div>
</div>

<button name="edit_product" value="save" type="submit" class="btn btn-primary">Save</button>
<button name="edit_product" value="save_list" type="submit" class="btn btn-primary"><?= bi('list-ul') ?> Save Show List</button>
<button name="edit_product" value="save_open" type="submit" class="btn btn-primary"><?= bi('eye') ?> Save and Open</button>


</div>
  </div>

</form>