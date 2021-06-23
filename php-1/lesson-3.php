<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input name="query" type="text">
        <input name="query2" type="text">
        <button type = "submit" >Search</button>

    </form>

    <pre>
        <?php
            print_r($_POST);

        ?>
    </pre>

</body>
</html>