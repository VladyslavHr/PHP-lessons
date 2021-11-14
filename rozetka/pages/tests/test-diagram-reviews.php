<?php

$reviews = db_query("SELECT reviews,COUNT(*) as count FROM products WHERE reviews > 0 GROUP BY reviews ");


// pa($reviews);
$diagram_data = [];
$max_value = $reviews[count($reviews) - 1]['reviews'];
foreach ($reviews as $product) {

    for ($a = 1; $a < $max_value; $a += 10) { 
        $b = $a+9;
        if(!isset($diagram_data["$a - $b"]))  $diagram_data["$a - $b"] = 0;
        if($product['reviews'] >= $a && $product['reviews'] <= $b) {
            $diagram_data["$a - $b"] = $diagram_data["$a - $b"] + $product['count'];
    
        }
    }

}


pa($diagram_data);

$max_count = max($diagram_data);


$max = 0;
foreach ($diagram_data as $value) {
    if ($value > $max) {
        $max = $value;
    }
}

pa($max);

pa($max_count);


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
        width: 30px;
        height: 100%;
        background: #4c5f70;
        margin: 3px;
        position: relative;
    }

    .row .col-name{
        transform: rotate(-90deg);
        position: absolute;
        bottom: -45px;
        left: -20px;
        color: #fff;
        width: 70px;
        /* outline: 1px solid red; */
        color: black;
    }

    .row .count{
        color: #7aa6d1;
        position: absolute;
        bottom: 100%;
        margin-bottom: 2px;
        display: block;
        text-align: center;
        width: 100%;
    }
</style>



<div class="diagram">
    <?php foreach ($diagram_data as $column_name => &$review_count):
            $height = $review_count * 100 / $max_count;
        ?>
        <div class="row" style="height: <?= $height ?>% ">
        <span class="count"><?= $review_count ?></span>
        <span class="col-name"><?= $column_name ?></span>
    </div>
    <?php endforeach; 
    
    ?>
</div>
