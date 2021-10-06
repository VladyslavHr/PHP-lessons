<?php
$order_id = (int)$_SESSION['last_order_id'];
$orders = db_query("SELECT * FROM orders WHERE id = '$order_id'  ");
header('Location: ?action=orders');


?>


<h2>New orders </h2>

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
    <?php foreach($orders as $order): ?>
  <tr>
      <td> <a href="?action=order">66678445</a></td>
      <td><?= $order['order_id']?></td>
      <td><?= $order['total_sum']?></td>
      <td><?= $order['payment']?></td>
      <td><?= $order['name']?></td>
      <td><?= $order['adress']?></td>
      <td><?= $order['created_at']?></td>
      <td><?= $order['status']?></td>
      <td><?= $order['products'] ?></td>
  </tr>
  <?php endforeach ?>