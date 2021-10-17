<?php




$arr1 = [1, 2, 3];
$arr2 = ['a', 'b', 'c'];

$mixed_arr = mix_arrays($arr1, $arr2);

echo '<div style="display: flex">';
pa($arr1);
pa($arr2);
echo '</div>';
pa($mixed_arr);

$arr1 = random_int_arr(20, 99 );
$arr2 = random_letter_arr(20);

echo "<hr>";
echo '<div style="display: flex">';
pa($arr1);
pa($arr2);
echo '</div>';


$mixed_arr = mix_arrays($arr1, $arr2);
pa($mixed_arr);

function random_int_arr($arr_length, $num_max = 99 )
{
    $arr = [];
    for ($i = 0; $i < $arr_length; $i ++) {
        $arr[] = random_int(1, $num_max);
    }
    return $arr;
}


function random_letter_arr($arr_length)
{
    $alpabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $alpabet = strtolower($alpabet) . $alpabet;
    $alpabet_arr = str_split($alpabet);
    $arr = [];
    for ($i = 0; $i < $arr_length; $i ++) {
        $arr[] = $alpabet_arr[random_int(0, count($alpabet_arr) - 1)];
    }
    return $arr;
}



function mix_arrays($arr1, $arr2)
{
    $mixed_arr = [];
    foreach ($arr1 as $key => $value){
        $mixed_arr[] = $arr1[$key];
        $mixed_arr[] = $arr2[$key];
    }
    return $mixed_arr;
}


class User 
{
    private $name = 'Ivan';
    public $age = 42;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function hello()
    {
        pa("Hello! My name is {$this->name}. I am {$this->age}. ");
    }

    private function name()
    {
        return "My name is {$this->name}.";
    }

    public function setName($new_name)
    {
        $this->name = $new_name;
    }

    public function show_your_name()
    {
        return $this->name();
    }
}


$object1 = new User('Kirill', 40);
$object2 = new User('Oksana', 10);

pa($object1);
$object1->age = 50;
$object1->setName("Vasya");
pa($object1);
pa($object2);


pa($object1->show_your_name());
pa($object2->show_your_name());

$object1->hello();
$object2->hello();








class ArraysWork
{
    private $arr1;
    private $arr2;

    function __construct()
    {
        $this->arr1 = $this->random_int_arr(20);
        $this->arr2 = $this->random_letter_arr(20);
    }

        private function random_int_arr($arr_length, $num_max = 99 )
    {
        $arr = [];
        for ($i = 0; $i < $arr_length; $i ++) {
            $arr[] = random_int(1, $num_max);
        }
        return $arr;
    }

        private function random_letter_arr($arr_length)
    {
        $alpabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alpabet = strtolower($alpabet) . $alpabet;
        $alpabet_arr = str_split($alpabet);
        $arr = [];
        for ($i = 0; $i < $arr_length; $i ++) {
            $arr[] = $alpabet_arr[random_int(0, count($alpabet_arr) - 1)];
        }
        return $arr;
    }

       public function mix_arrays()
    {
        $mixed_arr = [];
        foreach ($this->arr1 as $key => $value){
            $mixed_arr[] = $this->arr1[$key];
            $mixed_arr[] = $this->arr2[$key];
        }
        return $mixed_arr;
    }

    public function getArr1()
    {
        return $this->arr1;
    }

    public function getArr2()
    {
        return $this->arr2;
    }
}



$arrays_work = new ArraysWork();


echo '<hr>';
pa($arrays_work->getArr1());
pa($arrays_work->getArr2());
pa($arrays_work->mix_arrays());



?>