<?php

$brands = db_query("SELECT DISTINCT brand_name FROM products WHERE brand_name <> '' ORDER BY brand_name");



$brands = array_column($brands, 'brand_name');



foreach ($brands as $key => $brand){

}

?>

<div class="brands-wrapp">
    <div class="brands-block">
            <div class="brands-letter"><?= first_letter($brands[0]) ?></div>
                <div class="brands-list">
                    <ul class="brand-content">
                        <?php
                        $first_letter = '';
                        foreach ($brands as $key => $brand){
                            if($first_letter && $first_letter !== first_letter($brand)){
                              echo  '</ul>
                                </div>
                            </div>  
                            <div class="brands-block">
                               <div class="brands-letter">'.first_letter($brand).'</div>
                                    <div class="brands-list">
                                        <ul class="brand-content">';
                            }

                            $first_letter = substr($brand, 0 ,1);
                            echo "<li><a href='?action=category&brand=$brand'>$brand</a>,</li>";
                        }
                        ?>
           
                        </ul>
                </div>
    </div>
</div>