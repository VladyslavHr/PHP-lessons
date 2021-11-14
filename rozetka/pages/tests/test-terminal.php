<?php

if ($argv) {
    foreach ($argv as $k=>$v)
    {
        if ($k==0) continue;
        $it = explode("=",$argv[$k]);
        if (isset($it[1])) $_GET[$it[0]] = $it[1];
    }
}

print_r($_GET);