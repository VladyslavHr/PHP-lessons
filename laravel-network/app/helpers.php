<?php


/*
Custom Functions
*/

if (!function_exists('routeIs')) {
    function routeIs($route_name)
    {
        return request()->routeIs('$route_name');
    }
}

if (!function_exists('pa')) {
    function pa($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}


if (!function_exists('sklonenie')){
    //  p1 - end with 1
    function sklonenie($count, $p1, $p2, $p3)
    {
        if(in_array($count, [11,12,13,14])) return $p3;
        // $count = 234
        $last_digit = $count % 10; // 1 % 10 = 0.[1]
        if ($last_digit == 1) {
            return $p1;
        }
        if ($last_digit == 2 || $last_digit == 3 || $last_digit == 4) {
            return $p2;
        }
        // if (in_array($last_digit, [2, 3, 4])) {
        //     return $p2;
        // }
        return $p3;
    }
}


if (!function_exists('s_ending')) {
   function s_ending($count, $single, $plural)
   {
       if($count == 1) {
           return $single;
       }else{
           return $plural;
       }
   }
}
