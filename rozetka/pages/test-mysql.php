hello sql

<?php 

$mysqli = new mysqli("localhost", "root", "", "rozetka");


// $result = $mysqli->query("SELECT * FROM users");

// for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
//     $result->data_seek($row_no);
//     $row = $result->fetch_assoc();
//     pa($row['name']);
// }


// pa($similar_products);

foreach($similar_products as $product){
pa($product);
$mysqli->query("INSERT INTO products SET 
             title = '$product[title]',
             description = '$product[description]',
             price = '$product[price]' ");

}





?>