<?php if(!empty($_GET['delete'])){
    $product_id = (int)$_GET['delete'];
    db_query("DELETE FROM products WHERE id = '$product_id'");
    header('Location: ?action=products');
  
  }

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 5;

$total_count = db_query("SELECT count(*) FROM products");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;

$products = db_query("SELECT * FROM products LIMIT $limit OFFSET $offset ");
function decode_fast_info_json($product)
{
    $product['fast_info'] = json_decode($product['fast_info'], true);
    return $product;
}
$products = array_map('decode_fast_info_json',$products);


?>
<h2>Products <a href="?action=products-add" class="btn btn-primary">Add product</a></h2>

<?php include 'blocks/admin-page-top.php';?> 
<table class="table table-striped">
  <tr>
      <th></th>
      <th>Title</th>
      <th>Desctiption</th>
      <th>Price</th>
      <th>Old price</th>
      <th>Favorite</th>
      <th>Ends</th>
      <th>Sku</th>
      <th>Rating</th>
      <th>Status</th>
      <th>Reviews</th>
      <th>Questions</th>
      <th style="width: 30%">Fast info</th>
      <th></th>

  </tr>
  <?php foreach($products as $product): 
    ?>
  <tr>
        <td>
          <img class="admin-product-picture" src="<?= get_product_image_src($product) ?>" alt="">
        </td>
        <td><?= $product['title'] ?></td>
        <td><?= mb_substr($product['description'],0 , 150) ?>...</td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['old_price'] ?></td>
        <td><?= $product['favorite'] ? '<i class="bi bi-heart-fill"></i>' : '<i class="bi bi-heart"></i>' ?></td>
        <td><?= $product['ends'] ? '<i class="bi bi-emoji-frown-fill"></i>' : '<i class="bi bi-emoji-smile"></i>' ?></td>
        <td><?= $product['sku'] ?></td>
        <td><?= $product['rating'] ?></td>
        <td>
          <?php if ($product['status'] === 'in_stock'): ?>
            <div class="instock" title="instock">
                <?php include 'svg/bootstrap/check-circle.svg' ?>
                </div>
          <?php elseif ($product['status'] === 'out_of_stock'): ?>
            <div class="outofstock" title="outofstock">
                <?php include 'svg/bootstrap/dash-circle.svg' ?>
            </div>
          <?php elseif ($product['status'] === 'from_warehouse'): ?>
            <div class="fromwarehouse" title="fromwarehouse">
              <?php include 'svg/bootstrap/truck.svg' ?>
            </div>
          <?php endif ?>
      
      </td>
        <td><?= $product['reviews'] ?></td>
        <td><?= $product['questions'] ?></td>
        <td><?php
          if(is_array($product['fast_info'])){
            foreach ($product['fast_info'] as $key => $value) {
              echo '<div class="fs-80">';
              echo $key;
              echo ' => ';
              echo $value;
              echo '</div>';
            }
          }
        ?></td>
        <td>
        <a title="edit product" href="?action=products-edit&product_id=<?= $product['id']?>" class="me-3 text-info">
        <?= bi('pencil') ?></a>
        <a class="mx-auto text-danger" onclick="if(!confirm('Are you sure?')) return false" href="?action=products&delete=<?= $product['id']?>" >
        <?= bi('trash') ?></a>
        <a class="text-success" href="index.php?action=product&tab=1&id=<?= $product['id'] ?>" 
        target="_blank"><?= bi('eye') ?></a>
        </td>
 </tr>
 <?php endforeach ?>
 </table>