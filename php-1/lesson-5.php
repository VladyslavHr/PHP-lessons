<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form{
            width:600px;
        margin: auto;
            }
        .submit-btn{
            display: block;
            width: 100%;
            margin: 20px 0;
            font-size: 50px;
            border-radius: 7px;
        }
        .input-text,
        .output-text{
            width: 100%;
            border-radius: 7px;
            box-sizing: border-box;
            padding: 10px;
        }
      
    </style>
</head>
<body>
    <?php
    $text = @$_POST['text'];
    $lower = strtolower($text);
    $strlen = strlen($text); // подсчет колличества символов  в строке
    $arr = explode('a', $lower); // разбивает строку на массив
    $count = count($arr); // получаем длинну масива
    // $output = [];
    // for ($i=$count - 1; $i >= 0; $i--) { 
    //     $output[] = $arr[$i];
    // }
    // $output = implode(' ', $output);
    // $output = $text[$strlen - 1];

    if($strlen >= 3){
    $last_3_chars = $text[$strlen - 3] . $text[$strlen - 2] . $text[$strlen - 1];
    if($last_3_chars === '!!!'){
        $output = 'YES';

    }else{
        $output = 'NO';
    }
    
} else {
    $output = 'ENTER AT LEAST 3 CHARACTERS! (' . $strlen . ' entered)';
}
$output = $count - 1;
$output = count_letters($text, ['a','s','D','/']);
// $output = strtolower($text);
// $output = $last_3_chars;
?>

    <form action="" class="form" method="POST">
        <input type="hidden" name="time" value="<?= date('H:i:s') ?>">
<textarea class="input-text" name="text" id="" cols="30" rows="10"><?= $text ?></textarea>
<button type="submit" class="submit-btn">Send</button>
<textarea class="output-text" name="" id="" cols="30" rows="10" readonly><?= $output ?></textarea>
        
    </form>
    <pre>
    
     <!-- <?php  @print_r ($arr)   ?>    -->
  
  
    </pre>

</body>
</html>

<?php
    function count_letters($text, $letters)
    {
        $result = 0;
        foreach($letters as $letter){
            $arr = explode($letter, $text);
            $result = $result + count($arr) - 1;
        }

        return $result;
    }
    $text = 'asiiioooo DD//lllll ';
    $letters_count = count_letters($text, ['a','s','D','/']);
    echo '<hr>';
    echo $letters_count;


    
?>