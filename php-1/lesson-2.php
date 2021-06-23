<pre>
<?php


$num = 12;




function do_action($num = 4, $chislo2 = 5)
{
  echo '<hr>';
    $result =  $num + 4 + $chislo2;
    return $result;
}


$res1 = do_action($num,);

$num2 = 15;
$res2 = do_action($num, $num2);

$num = 20;
$res3 = do_action();



echo $res1;
echo '<hr>';
echo $res2;
echo '<hr>';
echo $res3;













?>
</pre>