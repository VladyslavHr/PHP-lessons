hello
<?php
$sorting = $_GET['sorting'] ?? 'default';
$products = db_query("SELECT * FROM products $where $order_by LIMIT $limit OFFSET $offset ");

function decode_fast_info_json($product)
{
    $product['fast_info'] = json_decode($product['fast_info'], true);
    return $product;
}
$products = array_map('decode_fast_info_json',$products);
?>
<div class="wish-list">
    <div class="my-wish-list">Список моих желаний</div>
    <div class="wish-list-settings">
        <select oninput="location.href = this.value">
            <?= if_selected($sorting, 'default' ) ?> value="<? query_add(['offset' => 0 'sorting' => 'default' }) ?>"
            <?= if_selected($sorting, 'price_asc' ) ?> value="<? query_add(['offset' => 0 'sorting' => 'price_asc' }) ?>"
            <?= if_selected($sorting, 'price_desc' ) ?> value="<? query_add(['offset' => 0 'sorting' => 'price_desc' }) ?>"
            <?= if_selected($sorting, 'rating' ) ?> value="<? query_add(['offset' => 0 'sorting' => 'rating' }) ?>"
            <?= if_selected($sorting, 'title' ) ?> value="<? query_add(['offset' => 0 'sorting' => 'title' }) ?>"

        </select>
    <!-- <select oninput="location.href = this.value">
          <option <?= if_selected($sorting, 'default')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'default'])?>">Сортировать</option>
          <option <?= if_selected($sorting, 'price_asc')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'price_asc'])?>"> От дешевых к дорогим </option>
          <option <?= if_selected($sorting, 'price_desc')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'price_desc'])?>"> От дорогих к дешевым </option>
          <option <?= if_selected($sorting, 'rating')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'rating'])?>"> Популярные </option>
          <option <?= if_selected($sorting, 'title')  ?> value="<?= query_add(['offset' => 0,'sorting' => 'title'])?>"> По названию </option> -->
    </div>
    <div class="wish-liat-product" id="category_product_list">
        <?php foreach ($product as $id => $product) : ?>
            <div class="product">
                    <div class="category-list-item-left">
                        <?php if(in_array($product['id'], $user_favs)): ?>
                            <a href="?action=category&id=<?= $product['id'] ?>&favorite=remove" class="heart"></a>
                        <?php else: ?>
                            <a href="?action=category&id=<?= $product['id'] ?>&favorite=add" class="heart heart-empty"></a>
                        <?php endif; ?>
                    <a class="category-product-image" href="?action=product&tab=1&id=<?= $product['id'] ?>">
                        <img class="image-main" src="<?= get_product_image_src($product) ?>" alt="" >
                        <img class="image-hover" src="<?= get_gallery_image_src($product) ?>" alt="" >
                    </a>
                    </div>
                <div class="category-list-item-right">
                    <h2 class="title">
                        <a href="?action=product&tab=1&id=<?= $product['id'] ?>">
                        <?= $product['title'] ?> <?php if(auth_admin()): ?> [<?=$product['id'] ?>] <?php endif ?>
                        </a>
                        <?php edit_product_link($product['id'])?> 
                    </h2>
                </div>
                <div class="category-color-wrapper">
                    <ul class="category-colors">
                    <?php
                        if($product['colors']){
                        $colors = explode('|', $product['colors']);
                        foreach ($colors as $color){
                        echo "<li class='category-color'><span style='$color'></span></li>";
                            }
                        } ?>
                    </ul>
                </div>
            </div>
    </div>
</div>