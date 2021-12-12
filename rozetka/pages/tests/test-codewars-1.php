<p>
1. Дана строка, замените каждую букву ее позицией в алфавите(a = 1, b = 2, ..., z = 26).
Если что-то в тексте не является буквой, игнорируйте это и не возвращайте.
</p>
<?php 
echo '<hr>';

// $a = array('a', 'b', 'c', 'Q', 'W', 'E', 'R', 'T', 'Y', 'Z');

// $c = array_merge($a, $b);


// $c = array_combine($a, $b);
// pa($c);





// $e= [];
// $new_c = str_replace($a, $b, '');
// pa($new_c);
// pa($a);
// echo '<hr>';
// pa($b);
// echo '<hr>';
// pa($c);
// echo '<hr>';

// $d = [];
// foreach ($c as $a => $b) {
// 	$d[] = [$a, $b];
// }

// pa($d);
// pa($c);

// $search  = array('A', 'B', 'C', 'D', 'E');
// $replace = array('B', 'C', 'D', 'E', 'F');
// $subject = 'A';
// echo str_replace($search, $replace, $subject);




$numbers = '1 2 3 17 23 5 18 20 25 26';




// pa($lenght_string);

// $a = array('a', 'b', 'c', '#', '$', '%', '^', '&', '*', 'Q', 'W', 'E', 'R', 'T', 'Y', 'Z');
// $b = ['1', '2', '3', '17', '23', '5', '18', '20', '25', '26'];

// echo '<hr>';
// echo ('1 2 3 17 23 5 18 20 25 26');

function alphabet_position(string $string): string
{
	$lenght_string = strlen($string);
	$l2n = 
[
	'a' => 1,
	'b' => 2,
	'c' => 3,
	'd' => 4,
	'e' => 5,
	'f' => 6,
	'g' => 7,
	'h' => 8,
	'i' => 9,
	'j' => 10,
	'k' => 11,
	'l' => 12,
	'm' => 13,
	'n' => 14,
	'o' => 15,
	'p' => 16,
	'q' => 17,
	'r' => 18,
	's' => 19,
	't' => 20,
	'u' => 21,
	'v' => 22,
	'w' => 23,
	'x' => 24,
	'y' => 25,
	'z' => 26
];
	$result = '';
	for ($i=0; $i < $lenght_string; $i++) { 
		$letter = strtolower($string[$i]);
		if(isset($l2n[ $letter])){
			$result = $result . $l2n[ $letter ] . ' ';
		}
		 
	}
	$result = trim($result);
	return $result;
}



$string = 'abc#$%^&*QWERTYZ';

$result = alphabet_position($string); // '1 2 3 17 23 5 18 20 25 26'

pa($result);

echo '<hr>';

$string = ' ';

$result = alphabet_position($string); // ''

var_dump($result);





// $l2n = 
// array(
// 		'a'=>'1',
// 		'b'=>'2',
// 		'c'=>'3',
// 		'd'=>'4',
// 		'e'=>'5',
// 		'f'=>6,
// 		'g'=>7,
// 		'h'=>8,
// 		'i'=>9,
// 		'j'=>10,
// 		'k'=>11,
// 		'l'=>12,
// 		'm'=>13,
// 		'n'=>14,
// 		'o'=>15,
// 		'p'=>16,
// 		'q'=>17,
// 		'r'=>18,
// 		's'=>19,
// 		't'=>20,
// 		'u'=>21,
// 		'v'=>22,
// 		'w'=>23,
// 		'x'=>24,
// 		'y'=>25,
// 		'z'=>16
// 		);





// 			$keys = array_keys($l2n);
// 			$values = array_values($l2n);
			
// 			$yourstring = 'Hello world!';
			
// 			echo str_replace($keys, $values, $yourstring);




