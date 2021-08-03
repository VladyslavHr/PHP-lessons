<?php if(!empty($_GET['delete'])){
    $product_id = (int)$_GET['delete'];
    db_query("DELETE FROM products WHERE id = '$product_id'");
    header('Location: ?action=products');
  
  }

$products = db_query("SELECT * FROM products");
function decode_fast_info_json($product)
{
    $product['fast_info'] = json_decode($product['fast_info'], true);
    return $product;
}
$products = array_map('decode_fast_info_json',$products);


?>
<h2>Products</h2>

<table class="table table-striped">
  <tr>
      <th>Title</th>
      <th>Desctiption</th>
      <th>Price</th>
      <th>Old price</th>
      <th>Favorite</th>
      <th>Ends</th>
      <th>Sku</th>
      <th>Rating</th>
      <th>Reviews</th>
      <th>Questions</th>
      <th>Fast info</th>
      <th></th>

  </tr>
  <?php foreach($products as $product): ?>
  <tr>
        <td><?= $product['title'] ?></td>
        <td><?= $product['description'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['old_price'] ?></td>
        <td><?= $product['favorite'] ?></td>
        <td><?= $product['ends'] ?></td>
        <td><?= $product['sku'] ?></td>
        <td><?= $product['rating'] ?></td>
        <td><?= $product['reviews'] ?></td>
        <td><?= $product['questions'] ?></td>
        <td><?= $product['fast_info'] ?></td>
        <td>
        <a href="?action=products-edit&product_id=<?= $product['id']?>" class="me-3 text-sucsess"><i class="bi bi-pencil"></i></a>
        <a onclick="if(!confirm('Are you sure?')) return false" href="?action=products&delete=<?= $product['id']?>" ><i class="bi bi-trash ms-auto text-danger"></i></a>
        </td>
 </tr>
 <?php endforeach ?>
 </table>