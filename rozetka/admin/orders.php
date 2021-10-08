<?php


$orders = db_query("SELECT * FROM orders ");

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 5;

$total_count = db_query("SELECT count(*) FROM orders");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;


$orders = db_query("SELECT * FROM orders LIMIT $limit OFFSET $offset  ");
?>


<h2>New orders </h2>
<?php include 'blocks/admin-page-top.php';?> 
<table class="table table-striped">
  <tr>
      <th>Order id</th>
      <th>Amount of products</th>
      <th>Total sum</th>
      <th>Payment</th>
      <th>User name</th>
      <th>Delivery adress</th>
      <th>Date of creation</th>
      <th>Status</th>
      <th>Products</th>

  </tr>
  <?php
  $ids_arr = [];
    foreach($orders as $order){
      $cart_items = json_decode($order['products'], true);
      $ids_arr[] = implode(',', array_keys($cart_items));
    } 
      $ids_arr = implode(',', $ids_arr);
      $products = db_query("SELECT id, title, price FROM products WHERE id IN($ids_arr)");
      $products = array_column($products, null, 'id');
  ?>
    <?php foreach($orders as $order): 
      $cart_items = json_decode($order['products'], true);
    ?>
  <tr>
      <td><?= $order['id']?></td>
      <td><?= $order['id']?></td>
      <td><?= $order['total_sum']?></td>
      <td><?= $order['payment']?></td>
      <td><?= $order['name']?></td>
      <td><?= $order['address']?></td>
      <td><?= $order['created_at']?></td>
      <td>
        <select oninput="location.href = this.value">
          <option <?= if_selected($order['status'], 'new_order')  ?> 
                    value="<?= query_add(['order_id' => $order['id'], 'order_status' => 'new_order'])?>">
                    <?= langs('order_status.new_order')?></option>
          <option <?= if_selected($order['status'], 'in_process')  ?> 
                    value="<?= query_add(['order_id' => $order['id'], 'order_status' => 'in_process'])?>">
                    <?= langs('order_status.in_process')?></option>
          <option <?= if_selected($order['status'], 'sent')  ?> 
                    value="<?= query_add(['order_id' => $order['id'], 'order_status' => 'sent'])?>">
                    <?= langs('order_status.sent')?></option>
          <option <?= if_selected($order['status'], 'received')  ?> 
                    value="<?= query_add(['order_id' => $order['id'], 'order_status' => 'received'])?>">
                    <?= langs('order_status.received')?></option>
        </select>
      </td>
      <td>
      <?php
          if(is_array($cart_items)){
            foreach ($cart_items as $product_id => $quantity) {
              echo '<div class="fs-80" title="'.esc_attr($products[$product_id]['title']).'">';
              echo mb_substr($products[$product_id]['title'],0 , 40) ;
              echo ' ... => ';
              echo $quantity;
              echo '</div>';
            }
          }
        ?>
      </td>
  </tr>
  <?php endforeach ?>