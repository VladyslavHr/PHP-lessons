<pre>

<?php


$num = 12;

echo $num;

$str = '12';
my_function();

echo '<hr>';

echo $str;

echo '<hr>';

$bool = true;

echo $bool;

var_dump($bool);

echo '<hr>';
if($num == $str && $num > 5){   // > < >= <= == === && ||
    echo 'I sad true'; // true

}else{
    echo 'I sad false';
}



echo '<hr>';
if($num == $str && $num < 5){   // > < >= <= == === && ||
    echo 'I sad true';

}else{
    echo 'I sad false'; // false
}

echo '<hr>';

$arr = array();

$arr = [1,2,3,4,5];

print_r($arr);


$products = include '../rozetka/data/similar-products.php';


foreach($products as $key => $product){
    echo '<hr>';
    echo 'Hello';
    echo $key;
    echo '<br>';
    echo $product['title'];
}

//print_r($products[2]['title']);


$human = [
    'Test',
    'name' => 'Tomas',
    'gender' => 'male',
    'age' => 34,
    'has kidds' => true,
    'kids' => [
        'Katya',
        'Anton',
        'Petya',
    ]
    ];

    print_r($human);


    function my_function()
    {
        echo '<hr>';
        echo 'Hello from function <br>';
        print_r([
            'qwerty', 'vvbnnn',
        ]);
    }
    my_function();
    my_function();
    my_function();




    
?>
</pre>