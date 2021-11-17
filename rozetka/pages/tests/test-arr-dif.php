<?php


$arr1 = array( "blue", "green", "yellow", "red");
$arr2 = array( "blue", "brown", "red" );
// $arr3 = ["blue", "brown", "red"];


// $new1 = array_diff($arr1, $arr2);
// $new2 = array_diff($arr2, $arr1);

// $final = array_merge($new1, $new2);

// pa($final);

$res = my_array_diff($arr1, $arr2);

pa($res);

function my_array_diff(array $arr1, array $arr2) :array
{
    $result_arr = [];
    foreach ($arr1 as $value) {
        if(!in_array($value, $arr2)) {
            $result_arr [] = $value;
        }
    }

    foreach ($arr2 as $value) {
        if(!in_array($value, $arr1)){
            $result_arr [] = $value;
        }
    }
    return $result_arr;
}

// function my_array_diff(array $arr1, array $arr2) :array
// {
//     $result_arr = [];
//     foreach ($arr1 as $value1) {
//         foreach ($arr2 as $value2) {
//            if($value1 === $value2) {
//                continue 2;
//            }
//         }
//         $result_arr [] = $value1;
//     }

//     foreach ($arr2 as $value1) {
//         foreach ($arr1 as $value2) {
//            if($value1 === $value2) {
//                continue 2;
//            }
//         }
//         $result_arr [] = $value1;
//     }



// pa($arr1);
// pa($arr2);
// pa($arr3);


// $old_arr = [$arr1, $arr2];
// pa($old_arr);
// $new_arr = [];
// foreach ($old_arr as $key => $value) {
//     if ($arr1 != $arr2){
//         unset($arr1 == $arr2);
//         return $new_arr;
//     };
    
// }




// pa($new_arr);

// $arr_new = [];

// function arr_check($arr1, $arr2)
// {
//     foreach ($arr1 as $key => $value){
//         $arr_new[] = $arr1[$value];
//         $arr_new[] = $arr2[$value];
//     }
//     return $arr_new;
// }

// pa($arr_new);


// $arr3 = [];
// foreach ($arr1 as $key1 => $value1) {
//     foreach ($arr2 as $key2 => $value2) {
//         if($value1 != $value2){
//             $arr3 [] = $value1; 
//         }
//     }
// }

// pa($arr3);



// if($arr1 != $arr2){
//     return 
// }
// $uniqueArray = [];

// foreach($arr1 as $k1 => $v1) {
//     foreach($arr2 as $k2 => $v2) {
//         if(your_condition()) {
//             $uniqueArray[] = $v1;
//             unset($array2[$k2]);
//         }
//     }
// }

// pa($uniqueArray);