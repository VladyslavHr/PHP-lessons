<?php

namespace Human_EN;



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
