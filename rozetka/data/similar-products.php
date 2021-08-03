<?php

$similar_products = db_query("SELECT * FROM products");

function decode_fast_info_json($product)
{
    $product['fast_info'] = json_decode($product['fast_info'], true);
    return $product;
}

$similar_products = array_map('decode_fast_info_json',$similar_products);

// pa($similar_products);

?>