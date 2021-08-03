<?php if(!defined('ROOT')){ die('Direct request not allowed'); }


define('db_HOST', 'localhost',);
define('db_USER', 'root',);
define('db_PASS', '',);
define('db_NAME', 'rozetka',);

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


function _get($key, $default = '')

{
    if(!empty($_GET[$key])){
        return $_GET[$key];
    }else{
        return $default;
    }
}


function is_tab_active($current_tab)
{
    if(isset($_GET['tab'])&& $_GET['tab'] == $current_tab){
return "active";
    }else{
        return '';
    }
  
}

function tovarov($count)

{
    if($count == 0) return 'Ничего не найдено';

    if($count == 1) return 'Найден 1 товар';

    if($count < 5) return "Найдено $count товара";


    else return "Найдено $count товаров";
}

function get_product_params($product)
{
    return http_build_query($product) . '&tab=1';
}

// function get_reviews($reviews)

function auth_check()
{
    if (isset($_SESSION['user'])){
        return true;
    }else{
        return false;
    }
}

function get_random_img_src()
{
    global $images_arr;
    $count = count($images_arr);
    $random_index = random_int(0, $count - 1);
    return $images_arr[$random_index];
}

function sklonenie($count, $p1, $p2, $p3)
{
    $last_digit = $count % 10;
    if ($last_digit === 1) {
        return $p1;
    }
    if ($last_digit === 2 || $last_digit === 3 || $last_digit === 4) {
        return $p2;
    }
    // if (in_array($last_digit, [2, 3, 4])) {
    //     return $p2;
    // }
    return $p3;
}

function my_pagination ($offset, $limit, $total_count)
{
    if ($total_count < $limit) return ''; 
    // $action = $_GET['action'];
    $new_offset = in_range($offset - $limit, 0, $total_count); 
    $prev_link = query_add(['offset'=> $new_offset]);
    // "?action=$action&offset=$new_offset&limit=$limit";
    $new_offset = in_range($offset + $limit, 0, $total_count); 
    $next_link = query_add(['offset'=> $new_offset]);
    // "?action=$action&offset=$new_offset&limit=$limit";
?>
 <div class="pagination">
    <?php if($offset > 0): ?>
        <a href="<?= $prev_link ?>" class="prev active"><i class="bi bi-arrow-left"></i></a>
    <?php else: ?>
        <a class="prev disabled"><i class="bi bi-arrow-left"></i></a>
    <?php endif ?>
    <ul>
        <?php 
        $last_page = ceil($total_count / $limit);
        $left_prefix = $right_prefix = '';
        $link_first_page = query_add(['offset'=> 0]);
        //  "?action=$action&offset=0&limit=$limit"; 
        $link_last_page = query_add(['offset'=> $last_page]);
        //  "?action=$action&offset=$last_page&limit=$limit";
        // ceil($total_count / $limit) кол-во страниц
        $button_count = 0;
        $current_page = floor($offset / $limit);
        
        $from = $current_page - 2;
        if($current_page >= 3) $left_prefix = "<li><a href='$link_first_page'>1</a></li><li>...</li>";
        if($from < 0) $from = 0;
        $to = $current_page + 3;
        if($to > $last_page) $to = $last_page;
        if($last_page - $current_page > 3) $right_prefix = "<li>...</li><li><a href='$link_last_page'>$last_page</a></li>";
        if($last_page - $current_page == 4) $right_prefix = "<li><a href='$link_last_page'>$last_page</a></li>";
        echo $left_prefix;
        for ($i=$from; $i < $to; $i++): 
            // $new_offset = ($i) * $limit;
            $link = query_add(['offset'=> $i * $limit]);
            //  "?action=$action&offset=$new_offset&limit=$limit";
            $button_count++ ;
           if ($current_page ) {
               # code...
           }
        ?>
        <?php if($current_page == $i): ?>
        <li><a class="active"><?= $i + 1 ?></a></li>
        <?php else: ?>
            <li><a href="<?=  $link ?>"><?= $i + 1 ?></a></li>
            <?php endif ?>
        <?php endfor;
        echo $right_prefix; ?>
    </ul>
    <?php if($total_count > $offset + $limit): ?>
        <a href="<?= $next_link ?>" class="prev active"><i class="bi bi-arrow-right"></i></a>
    <?php else: ?>
        <a class="prev disabled"><i class="bi bi-arrow-right"></i></a>
    <?php endif ?>
</div>
<?php
}

function in_range($number, $min, $max)
{
    if($number < $min) return $min;
    if($number > $max) return $max;
    return $number;
}

function query_add($values = [])
{
   $new_array = array_merge($_GET, $values);
   return '?' . http_build_query($new_array);
}

function if_selected($name, $value)
{
    if(empty($_GET[$name])) return '';
    return $_GET[$name] === $value ? 'selected' : '';
}

function pa($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}