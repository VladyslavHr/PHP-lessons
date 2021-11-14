<?php

$prices = db_query("SELECT price,COUNT(*) as count FROM products WHERE price > 0 GROUP BY price");


$data_price = [];
$max_value = $prices[count($prices) - 1]['price'];

foreach ($prices as $product_price) {
    for ($a = 1; $a < $max_value ; $a += 1000) { 
        $b = $a + 999;
        if(!isset($data_price["$a - $b"])) $data_price["$a - $b"] = 0;
        if($product_price['price'] > $a && $product_price['price'] <= $b ) {
            $data_price["$a - $b"] = $data_price["$a - $b"] + $product_price['count'];
        }
    }
}


$max_count = max($data_price);

?>

<style>
    .diagram{
        display: flex;
        height: 500px;
        align-items: flex-end;
        margin-top: 50px;
        padding: 5px 5px 65px;
    }

    .row{
        width: 60px;
        height: 100%;
        background: #4c5f70;
        margin: 3px;
        position: relative;
    }

    .row .col-name{
        transform: rotate(-90deg);
        position: absolute;
        bottom: -26px;
        left: -65px;
        color: #fff;
        width: 150px;
        /* outline: 1px solid red; */
        color: black;
        font-size: 14px;
    }

    .row .count{
        color: #7aa6d1;
        position: absolute;
        bottom: 100%;
        margin-bottom: 2px;
        display: block;
        text-align: center;
        width: 100%;
        font-size: 11px;
    }
</style>


<div class="diagram">
    <?php foreach ($data_price as $column_name => &$price_count):
            $height = $price_count * 100 / $max_count;
        ?>
        <div class="row" style="height: <?= $height ?>% ">
        <span class="count"><?= $price_count ?></span>
        <span class="col-name"><?= $column_name ?></span>
    </div>
    <?php endforeach; 
    
    ?>
</div>