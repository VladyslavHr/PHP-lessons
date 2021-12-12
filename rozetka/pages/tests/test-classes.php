<?php


class Human 
{
    public $human_name;

    public $human_age;


    function __construct($name, $age)
    {
        pa('I am constructor');
        $this->human_name = $name;
        $this->human_age = $age;
    }
    // public , private, protection

    public function sayHello()
    {
        echo "Hello! My name is " . $this->human_name;
    }
}


class Programmer extends Human 
{
    public $skills;

    function __construct($name, $age, $skills)
    {
        parent::__construct($name, $age);
        $this->skills = $skills;
    }


}



class Driver extends Human 
{
    public $licens;

    function __construct($name, $age, $licens)
    {
        parent::__construct($name, $age);
        $this->licens = $licens;
    }
}



$human1 = new Programmer('Dima', 25, 'HTML, CSS, PHP, MySQL');
$human2 = new Programmer('Anya', 16, 'beautifull');
$human3 = new Driver ('Tolik', 44, 'A, B, C');

pa($human1);
pa($human2);
pa($human3);

pa($human1->sayHello());

$human1->human_name = 'Alex';

pa($human1->sayHello());


// class Product 
// {
//     private $title;
//     private $price;
//     private $brand_name;

//     function __construct($title, $price, $brand_name)   
//     {
//         $this->title = $title;
//         $this->price = $price;
//         $this->brand_name = $brand_name;
//     }

//     public function display_price()
//     {
//         return ('Price is ' . $this->price . 'UAH');
//     }

//     public function setTitle($title)
//     {
//         $title = strip_tags($title);
//         $this->title = $title;
//     }

//     public function getTitle()
//     {
//         return $this->title;
//     }
// }

// $product1 = new Product('phone', 654, 'Apple');

// $product1->setTitle('Mobile phone <b> Apple </b>');

// pa($product1->getTitle());

// $products = db_query("SELECT title, price, brand_name FROM products LIMIT 100");

// // pa($products);

// $products_objects = [];

// foreach ($products as $product) {
//     $products_objects[] = new Product($product['title'], $product['price'], $product['brand_name']);
// }

// // pa($products_objects);

// foreach ($products_objects as $key => $product_obj) {
//     pa($product_obj->getTitle);
// }