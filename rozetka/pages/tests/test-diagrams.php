<?php
// кол-во товров от 0 - 1000 грн и так далее по возрастанию 

$reviews = db_query("SELECT reviews,COUNT(*) as count FROM products ORDER BY reviews ");

pa($reviews);

usort($reviews, function($a, $b) {
    return $a['count'] - $b['count'];
});

$max_count = $reviews[count($reviews) - 1]['count'];



?>

<style>
    .diagram{
        display: flex;
        height: 500px;
        align-items: flex-end;
        margin-top: 50px;
    }

    .row{
        width: 20px;
        height: 100%;
        background: #4c5f70;
        margin: 3px;
        position: relative;
    }

    .row span{
        transform: rotate(-90deg);
        position: absolute;
        bottom: 0;
        color: #fff;
        left: -10px;
    }
</style>

<div class="diagram">
    <?php foreach ($reviews as &$review):
            $height = $review['count'] * 100 / $max_count;
            $review['$height'] = $height;
        ?>
        <div class="row" style="height: <?= $height ?>% "><span><?= $review['reviews']?></span></div>
    <?php endforeach; 
    
    ?>
</div>




