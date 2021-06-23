<?php


$string = 'Hello';

echo $string;

$num = 45;

echo '<hr>';

echo $num;

$i_am_old = false;

echo '<hr>';
var_dump($string);
echo '<hr>';

$i_am_old = 'hi';
if($i_am_old){
    echo 'True';
}else{
    echo 'Fales';
}

// 'hi' -> true
// '' -> fales
// ' ' -> true
// 0 -> fales
// '0' -> fales
// 1,2... -> true
// '1,2...' -> true
// [] -> fales
// [0,..] -> true


$arr = [
    'Anna',
    'Sveta',
    'Kirill',
    'Max',
    'Anton',
    'Katya',
];
// echo '<hr>';
// echo $arr[0];

foreach($arr as $key => $name){
  
   echo '<hr>';
    echo $name; 
    if($key > 3) break;
}
// $name = 'Vasya';



// for ($i=0; $i < 3; $i++) { 
//      echo '<hr>';
//     echo $arr[$i];
// }

