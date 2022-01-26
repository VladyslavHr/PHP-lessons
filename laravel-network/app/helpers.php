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

