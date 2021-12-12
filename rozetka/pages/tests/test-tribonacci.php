<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
<p>
Well met with Fibonacci bigger brother, AKA Tribonacci. <br><br>

As the name may already reveal, it works basically like a Fibonacci, but summing the last 3 (instead of 2) numbers of the sequence to generate the next. And, worse part of it, regrettably I won't get to hear non-native Italian speakers trying to pronounce it :(<br><br>

So, if we are to start our Tribonacci sequence with [1, 1, 1] as a starting input (AKA signature), we have this sequence:<br><br>

[1, 1 ,1, 3, 5, 9, 17, 31, ...]<br>
But what if we started with [0, 0, 1] as a signature? As starting with [0, 1] instead of [1, 1] basically shifts the common Fibonacci sequence by once place, you may be tempted to think that we would get the same sequence shifted by 2 places, but that is not the case and we would get:<br><br>

[0, 0, 1, 1, 2, 4, 7, 13, 24, ...]<br>
Well, you may have guessed it by now, but to be clear: you need to create a fibonacci function that given a signature array/list, returns the first n elements - signature included of the so seeded sequence.<br><br>

Signature will always contain 3 numbers; n will always be a non-negative number; if n == 0, then return an empty array (except in C return NULL) and be ready for anything else which is not clearly specified ;)
</p>
<?php 


function tribonacci($signature, $n) {


	for ($i = 0; count($signature) < $n; $i++) {
		$signature[] = $signature[$i] + $signature[$i+1] + $signature[$i+2];
	}



	// for ($i=0; $i < $n ; $i++) { 
	// 	$new = $signature + $signature;
	// 	$signature = $signature;
	// 	$signature = $new;
	// }


	// foreach ($signature as $value) {
	// 	if (isset($signature)) {
	// 		$signature = '';
	// 		return 0;
	// 	}else {
	// 		$n = 1;
	// 		return $signature [];
	// 	}
	// }

	// for ($i=0; $i < $n ; $i++) { 
	// 	$result = $signature[1] + $signature [2];
	// 	pa($result);
	// 	$new_result = array_push($signature, $result);
	// 	pa($new_result);
	// }


	return array_slice($signature, 0, $n);
}


__ss([1,1,1,3,5,9,17,31,57,105], tribonacci([1,1,1],10));
__ss([0,0,1,1,2,4,7,13,24,44], tribonacci([0,0,1],10));
__ss([0,1,1,2,4,7,13,24,44,81], tribonacci([0,1,1],10));
__ss([1,0,0,1,1,2,4,7,13,24], tribonacci([1,0,0],10));
__ss([0,0,0,0,0,0,0,0,0,0], tribonacci([0,0,0],10));
__ss([1,2,3,6,11,20,37,68,125,230], tribonacci([1,2,3],10));
__ss([3,2,1,6,9,16,31,56,103,190], tribonacci([3,2,1],10));
__ss([1], tribonacci([1,1,1],1));
__ss([], tribonacci([300,200,100],0));
__ss([0.5,0.5,0.5,1.5,2.5,4.5,8.5,15.5,28.5,52.5,96.5,177.5,326.5,600.5,1104.5,2031.5,3736.5,6872.5,12640.5,23249.5,42762.5,78652.5,144664.5,266079.5,489396.5,900140.5,1655616.5,3045153.5,5600910.5,10301680.5], tribonacci([0.5,0.5,0.5],30));

function tribonacci_2($signature, $n) {


	// for ($i = 0; count($signature) < $n; $i++) {
	// 	$signature[] = $signature[$i] + $signature[$i+1] + $signature[$i+2];
	// }



	// for ($i=0; $i <= $n ; $i++) { 
	// 	pa($n);
	// 	pa($i);
	// 	$signature[] = $signature[$i] + $signature[$i+1] + $signature[$i+2];
		// $signature = $signature;
		// $signature = $new;
	// }


	// foreach ($signature as $value) {
	// 	if (isset($signature)) {
	// 		$signature = '';
	// 		return 0;
	// 	}else {
	// 		$n = 1;
	// 		return $signature [];
	// 	}
	// }

	for ($i=0; $i < $n ; $i++) { 
		$result = $signature[$i] + $signature[$i+1] + $signature [$i+2];
		$new_result = array_push($signature, $result);
		
	}
	$new_result = array_slice($signature , 0, $n);

	return $new_result;
}


__ss([1,1,1,3,5,9,17,31,57,105], tribonacci_2([1,1,1],10));
__ss([0,0,1,1,2,4,7,13,24,44], tribonacci_2([0,0,1],10));
__ss([0,1,1,2,4,7,13,24,44,81], tribonacci_2([0,1,1],10));
__ss([1,0,0,1,1,2,4,7,13,24], tribonacci_2([1,0,0],10));
__ss([0,0,0,0,0,0,0,0,0,0], tribonacci_2([0,0,0],10));
__ss([1,2,3,6,11,20,37,68,125,230], tribonacci_2([1,2,3],10));
__ss([3,2,1,6,9,16,31,56,103,190], tribonacci_2([3,2,1],10));
__ss([1], tribonacci_2([1,1,1],1));
__ss([], tribonacci_2([300,200,100],0));
__ss([0.5,0.5,0.5,1.5,2.5,4.5,8.5,15.5,28.5,52.5,96.5,177.5,326.5,600.5,1104.5,2031.5,3736.5,6872.5,12640.5,23249.5,42762.5,78652.5,144664.5,266079.5,489396.5,900140.5,1655616.5,3045153.5,5600910.5,10301680.5], tribonacci([0.5,0.5,0.5],30));



function tribonacci_3($signature, $n) {


	// for ($i = 0; count($signature) < $n; $i++) {
	// 	$signature[] = $signature[$i] + $signature[$i+1] + $signature[$i+2];
	// }



	// for ($i=0; $i <= $n ; $i++) { 
	// 	pa($n);
	// 	pa($i);
	// 	$signature[] = $signature[$i] + $signature[$i+1] + $signature[$i+2];
		// $signature = $signature;
		// $signature = $new;
	// }


	foreach ($signature as $value) {
		if (isset($signature)) {
			$signature = '';
			echo 0;
		}elseif (isset($signature)) {
			$n = 1;
			echo $signature[0];
		} else{
			$signature = $signature[$i] + $signature[$i+1] + $signature[$i+2];
		}
		
		
	}

	// for ($i=0; $i < $n ; $i++) { 
	// 	$result = $signature[$i] + $signature[$i+1] + $signature [$i+2];
	// 	pa($result);
	// 	$new_result = array_push($signature, $result);
	// 	pa($new_result);
	// 	$new_result = array_slice($signature , 0, $n);
	// }


	return $signature;
}


__ss([1,1,1,3,5,9,17,31,57,105], tribonacci_3([1,1,1],10));
__ss([0,0,1,1,2,4,7,13,24,44], tribonacci_3([0,0,1],10));
__ss([0,1,1,2,4,7,13,24,44,81], tribonacci_3([0,1,1],10));
__ss([1,0,0,1,1,2,4,7,13,24], tribonacci_3([1,0,0],10));
__ss([0,0,0,0,0,0,0,0,0,0], tribonacci_3([0,0,0],10));
__ss([1,2,3,6,11,20,37,68,125,230], tribonacci_3([1,2,3],10));
__ss([3,2,1,6,9,16,31,56,103,190], tribonacci_3([3,2,1],10));
__ss([1], tribonacci_3([1,1,1],1));
__ss([], tribonacci_3([300,200,100],0));
__ss([0.5,0.5,0.5,1.5,2.5,4.5,8.5,15.5,28.5,52.5,96.5,177.5,326.5,600.5,1104.5,2031.5,3736.5,6872.5,12640.5,23249.5,42762.5,78652.5,144664.5,266079.5,489396.5,900140.5,1655616.5,3045153.5,5600910.5,10301680.5], tribonacci([0.5,0.5,0.5],30));


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