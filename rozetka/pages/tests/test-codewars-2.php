<h3>Build Tower</h3>
<p>
Build Tower by the following given argument: <br>
number of floors (integer and always greater than 0).<br><br>

Tower block is represented as *<br><br>

returns an array;<br><br>
<pre>
[
  '  *  ', 
  ' *** ', 
  '*****'
]

[
  '     *     ', 
  '    ***    ', 
  '   *****   ', 
  '  *******  ', 
  ' ********* ', 
  '***********'
]
</pre>
Have fun!
</p>
<?php 

$mas = [];
for ($i=0; $i < 15 ; $i++) { 
  $new_mas = array_push($mas, '*',);
  foreach ($mas as $key => $value) {
    if(isset($mas [$value]))
    return $value[0]++;
  }
}

pa($mas);



// function tower_builder(int $n): array {
// $n = 0;
// $arr = [];
// for ($i=1; $i < 15 ; $i++) { 
//   $arr1 = array_push($arr, '*');
//   foreach ($arr as $value) {
//     if(isset($arr [$value] )) {
//       $arr = $value +1;
//     }
//   }
// }

// 	return $arr;
// }



function tower_builder(int $n): array {
  $arr = ['*']; 
    
    foreach ($arr as $value) {
      if(isset($arr [$value] )) {
        $arr = array_push($arr, '*');
        $arr = $value +1;
        
      }
    }
  
  
    return $arr;
  }


$tower1 = tower_builder(4);
pa($tower1);

$tower2 = tower_builder(10);
pa($tower2);

echo '<hr>';


// result.push(' '.repeat(n - i) + '*'.repeat(i * 2 - 1) + ' '.repeat(n - i));

// function tower_builder(n):
//     L=[]
//     for i in range(1,n+1):
//         L.append(' '*(n-i)+'*'*(i+(i-1))+' '*(n-i))
//     return L