<?php    


$arr = [
    'key' => 'value',
    'num' => 123,
    'bool' => false,
    'arr' => [1,2,3,4],
    
];



pa($arr);


$json = json_encode($similar_products[1], JSON_PRETTY_PRINT );

pa($json);

$data = json_decode($json, true);

pa($data['title']);