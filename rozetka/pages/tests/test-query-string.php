<pre>
 <?php 
 print_r($_SERVER['QUERY_STRING']);
 
 parse_str($_SERVER['QUERY_STRING'], $result);

 print_r($result);

 echo '<hr>';

 $new_query = http_build_query([
     'test' => 123,
     'qwerty' => 'asd',
 ]);

 print_r($new_query);
 
 echo '<hr>';
 $new_query_arr = array_merge($_GET, [
     'test3' => 33333,
 ]);
 $new_query = http_build_query($new_query_arr );
 print_r($new_query);
 ?>
</pre>