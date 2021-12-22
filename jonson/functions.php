<?php

define('db_HOST', 'localhost',);
define('db_USER', 'root',);
define('db_PASS', '',);
define('db_NAME', 'todo',);

include 'DB.class.php';

function db_query($query){
	if(!$query) return DB::getInstance();

    if (stripos($query, 'select') === 0 || stripos($query, 'show') === 0 || stripos($query, 'describe') === 0) {
        return DB::getInstance()->get_results($query);
    }else{
        return DB::getInstance()->query($query);
    }
}

function db_escape($string)
{
    return DB::getInstance()->escape($string);
}