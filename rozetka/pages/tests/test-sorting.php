<?php
// $similar_products
$arr = [1, 54, 44, 97, 35, 28, 13];

$a = 'firts';
$b = 'asecond';
if($a > $b){
    echo 'a > b';
}else{
    echo 'a < b';
}

pa($similar_products);

usort($similar_products, function($a, $b)
{

    return strcmp($a['title'], $b['title']);
});

pa($similar_products);

