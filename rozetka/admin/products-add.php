<?php

if (isset($_POST['new_product'])) {
if (empty($_POST['title'])){
  $message = 'Please add title!';
  flash_alert('danger', $message);
  redirect('admin.php?action=products-add');
}

if (empty($_POST['price'])){
  $message = 'Please add price!';
  flash_alert('danger', $message);
  redirect('admin.php?action=products-add');
}

if (empty($_POST['description'])){
  $message = 'Please add description!';
  flash_alert('danger', $message);
  redirect('admin.php?action=products-add');
}

if (empty($_POST['sku'])){
  $message = 'Please add sku!';
  flash_alert('danger', $message);
  redirect('admin.php?action=products-add');
}
}

// Create
if(isset($_POST['new_product'])){
    $title = db_escape($_POST['title']);
    $description = db_escape($_POST['description']);
    $price = db_escape($_POST['price']);
    $old_price = db_escape($_POST['old_price']);
    $favorite = db_escape($_POST['favorite']);
    $sku = db_escape($_POST['sku']); //Экранирует строку для использования в mysql_query
    $rating = db_escape($_POST['rating']);
    $status = db_escape($_POST['status']);
    $reviews = db_escape($_POST['reviews']);
    $questions = db_escape($_POST['questions']);
    $fast_info = db_escape($_POST['fast_info']);
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
      sku = '$sku',
      rating = '$rating',
      `status` = '$status',
      reviews = '$reviews',
      questions = '$questions',
      fast_info = '$fast_info',
      `card` = '$card_title'");

      $message = 'Product add successfully!';
      flash_alert('success', $message);

    redirect('admin.php?action=products');
  

}





?>

<h2>Add Product</h2>
<form action="?action=products-add" method="Post" enctype='multipart/form-data'>

<div class="row">
  <div class="col-lg-3">
   <label for="product_card_input" class="cursor-pointer"> <img src="<?= get_product_image_src($product) ?>" class="img-thumbnail" alt="..."> 
   </label>
    <div class="mb-3">
  <label for="formFile" class="form-label">Card</label>
  <input name="card" class="form-control" type="file" id="product_card_input">
</div>
  </div>
<!-- <div class="mb-3">
  <label for="formFile" class="form-label">Card</label>
  <input name="card" class="form-control" type="file" id="formFile">
</div> -->
<div class="row my-3">
  <div class="col">
  <label class="form-label">Title</label>
    <input name="title" value="<?= session_take_post('title')?>" type="text" class="form-control" placeholder="Title" aria-label="Title">
    <label class="form-label">Sku</label>
    <input name="sku" value="<?= session_take_post('sku')?>" type="text" class="form-control" placeholder="Sku" aria-label="Sku">
  </div>
  <div class="col">
  <label class="form-label">Description</label>
    <textarea name="description" value="<?= session_take_post('description')?>" rows="4" type="text" max="50" class="form-control" placeholder="Description" aria-label="description"></textarea>
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Price</label>
    <input name="price" value="<?= session_take_post('price')?>" type="number" class="form-control" step=".01" placeholder="Price" aria-label="Price">
  </div>
  <div class="col">
  <label class="form-label">Old price</label>
    <input name="old_price" type="number" class="form-control" step=".01" placeholder="Old price" aria-label="Old price">
  </div>
</div>


  <div class="col">
  <label class="form-label">Favorite</label>
    <select name="favorite" class="form-select">
    <option value="like">like</option>
    <option value="dislike">dislike</option>
    </select>
  </div>
  <div class="col">
  <label class="form-label">Rating</label>
    <select name="rating" class="form-select">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
  </div>
  <div class="col">
  <label class="form-label">Status</label>
    <select name="status" class="form-select">
    <option selected="selected" value="in_stock">In stock</option>
    <option  value="out_of_stock">Out of stock</option>
    <option  value="from_warehouse">From Varhaus</option>
    </select>
  </div>


<div class="row my-3">
  <div class="col">
  <label class="form-label">Reviews</label>
    <input name="reviews" type="text" class="form-control" placeholder="Reviews" aria-label="Reviews">
  </div>
  <div class="col">
  <label class="form-label">Questions</label>
    <input name="questions" type="text" class="form-control" placeholder="Questions" aria-label="Questions">
  </div>
</div>

<div class="row my-3 f">
  <div class="col">
  <label class="form-label">Fast info</label>
    <input name="fast_info" type="text" class="form-control" placeholder="Fast info" aria-label="Fast info">
  </div>
</div>

<button name="new_product" type="submit" class="btn btn-primary">Save</button>


</form>