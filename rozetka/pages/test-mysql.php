hello sql

<?php 

$total_count = db_query("SELECT count(*) FROM products");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;
pa($total_count);



return;

$mysqli = new mysqli("localhost", "root", "", "rozetka");


$result = $mysqli->query("SELECT * FROM products");

for ($row_no = $result->num_rows - 1; $row_no >= 0; $row_no--) {
    $result->data_seek($row_no);
    $row = $result->fetch_assoc();
    pa($row);
}

return;


// pa($similar_products);

foreach($similar_products as $product){
pa($product);

$product['title'] = $mysqli->real_escape_string($product['title']);
$product['description'] = $mysqli->real_escape_string($product['description']);
$product['price'] = $mysqli->real_escape_string($product['price']);
$product['old_price'] = $mysqli->real_escape_string($product['old_price']);
$product['fav'] = $mysqli->real_escape_string($product['fav'] ? 1 : 0);
$product['ends'] = $mysqli->real_escape_string($product['ends'] ? 1 : 0);
$product['sku'] = $mysqli->real_escape_string($product['sku']);
$product['rating'] = $mysqli->real_escape_string($product['rating']);
$product['reviews'] = $mysqli->real_escape_string($product['reviews']);
$product['fast_info'] = $mysqli->real_escape_string( json_encode($product['fast_info']));
$product['questions'] = $mysqli->real_escape_string($product['questions']);


$sql = "INSERT INTO products SET 
title = '$product[title]',
price = '$product[price]', 
description = '$product[description]',
old_price = '$product[old_price]',
favorite = '$product[fav]',
ends = '$product[ends]',
sku = '$product[sku]',
rating = '$product[rating]',
reviews = '$product[reviews]',
questions = '$product[questions]',
fast_info = '$product[fast_info]'";

pa($sql);

$mysqli->query($sql);

}





?>