<?php 
// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
echo '<hr>';
// 'Vince Sporer'
echo $faker->email();
echo '<hr>';
// 'walter.sophia@hotmail.com'
echo $faker->text();
echo '<hr>';
// 'Numquam ut mollitia at consequuntur inventore dolorem.'


for ($i = 0; $i < 30; $i++) {
    echo $faker->country() . "\n";
    echo '<br>';
}

?>