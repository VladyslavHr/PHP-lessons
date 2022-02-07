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
