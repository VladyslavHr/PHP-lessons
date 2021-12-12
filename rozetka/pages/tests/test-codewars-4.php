<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
<style>
	.smile{
	background-image: url('img/smiles.jpg');
	display: inline-block;
	width: 20px;
	height: 20px;
	/* outline: 1px solid; */
	background-size: 83px 67px;
	}
	.smile-1{
		background-position: 0 0;
	}
	.smile-2{
		background-position: -21px 0;
	}
	.smile-3{
		background-position: -42px 0;
	}
	.smile-4{
		background-position: -63px 0;
	}
	.smile-5{
		background-position: 0 -21px;
	}
	.smile-6{
		background-position: -21px -21px;
	}
	.smile-7{
		background-position: -42px -21px;
	}
	.smile-8{
		background-position: -63px -21px;
	}
	.smile-9{
		background-position: 0 -41px;
	}
	.smile-10{
		background-position: -21px -41px;
	}
	.smile-11{
		background-position: -42px -41px;
	}
	.smile-12{
		background-position: -63px -41px;
	}
</style>
<?php

$article = file_get_contents('data/article.html');

// $article = preg_replace('/[:;][-~]?[)D]/', '<smile>$0</smile>', $article);

// preg_match_all('/[:;][-~]?[)D]/', $article, $matches);



$valid_smiles = [
	':)'  => '<span class="smile smile-1"></span>',
	';)'  => '<span class="smile smile-2"></span>',
	':D'  => '<span class="smile smile-3"></span>',
	';D'  => '<span class="smile smile-4"></span>',
	':-)' => '<span class="smile smile-5"></span>',
	';-)' => '<span class="smile smile-6"></span>',
	':-D' => '<span class="smile smile-7"></span>',
	';-D' => '<span class="smile smile-8"></span>',
	':~)' => '<span class="smile smile-9"></span>',
	';~)' => '<span class="smile smile-10"></span>',
	':~D' => '<span class="smile smile-11"></span>',
	';~D' => '<span class="smile smile-12"></span>',
];

$article = str_replace(array_keys($valid_smiles), $valid_smiles, $article);
echo $article;


// function count_smileys_2(array $arr): int {
// 	$counter = 0;
// 	foreach ($arr as $key => $smailik) {
// 		$arr = preg_replace_callback_array(
// 			[
// 				'/:\)+/i' => function ($match) use(&$counter) {
// 					$counter++;
// 					// echo strlen($match[0]), ' совпадений ":)"<br>';
// 				},
// 				'/:D/i' => function ($match) use(&$counter) {
// 					$counter++;
// 					// echo strlen($match[0]), ' совпадений ":D"<br>';
// 				},
// 				'/[;-D]+/i' => function ($match) use(&$counter) {
// 					$counter++;
// 					// echo strlen($match[0]), ' совпадений ";-D"<br>';
// 				},
// 				'/[:~)]+/i' => function ($match) use(&$counter) {
// 					$counter++;
// 					// echo  strlen($match[0]), ' совпадений ":~"<br>';
// 				},
// 			],
// 			$smailik
// 		);
// 	}
	

// 	return $counter;
// }




// __ss(0, count_smileys_2([]));
// __ss(4, count_smileys_2([':D',':~)',';~D',':)']));
// __ss(2, count_smileys_2([':)',':(',':D',':O',':;']));
// __ss(1, count_smileys_2([';]', ':[', ';*', ':$', ';-D']));



// function count_smileys_6(array $arr): int {
// 	$string = implode(',', $arr);
// 	$result = preg_match_all('/[:;][-~]?[)D]/', $string, $matches);
// 	return $result;
// }


// __ss(0, count_smileys_6([]));
// __ss(4, count_smileys_6([':D',':~)',';~D',':)']));
// __ss(2, count_smileys_6([':)',':(',':D',':O',':;']));
// __ss(1, count_smileys_6([';]', ':[', ';*', ':$', ';-D']));


// function count_smileys(array $arr): int {
// 	// pa($arr);
// 	// $arr = [];
// 	// for ($i=0; $i < $arr ; $i++) { 
// 	// 	if (empty($arr)){
// 	// 		return 0;
// 	// 	}elseif(isset($arr)){
// 	// 		$arr =':)';
// 	// 	}elseif(isset($arr)){
// 	// 		$arr =':D';
// 	// 	}elseif(isset($arr)){
// 	// 		$arr =';-D';
// 	// 	}endif(isset($arr)){
// 	// 		$arr =':~)'
// 	// 	}
// 	// }
	

// 	return 555;
// }




// __ss(0, count_smileys([]));
// __ss(4, count_smileys([':D',':~)',';~D',':)']));
// __ss(2, count_smileys([':)',':(',':D',':O',':;']));
// __ss(1, count_smileys([';]', ':[', ';*', ':$', ';-D']));


// function count_smileys_3(array $arr): int {

	// $arr = "':D',':~)',';~D',':)',':)',':(',':D',':O',':;',';]', ':[', ';*', ':$', ';-D'";
	// $arr = preg_replace('/ /')
	// '/^([^_]+)_(.+)\.([^\.]+)$/U'
// 	$new_arr = preg_grep('/[:;][-~]?[)D]/', $arr);

// 	return count($new_arr);
// }




// __ss(0, count_smileys_3([]));
// __ss(4, count_smileys_3([':D',':~)',';~D',':)']));
// __ss(2, count_smileys_3([':)',':(',':D',':O',':;']));
// __ss(1, count_smileys_3([';]', ':[', ';*', ':$', ';-D']));


function __ss($aaa, $bbb)
{
	echo '<div class="row">';
		echo '<div class="col-sm-2">';
			echo '<pre>';
			print_r($aaa);
			echo '</pre>';
		echo '</div>';
		echo '<div class="col-sm-2">';
			echo '<pre>';
			print_r($bbb);
			echo '</pre>';
		echo '</div>';
		echo "<hr>";
	echo '</div';
}


?>
</div>




