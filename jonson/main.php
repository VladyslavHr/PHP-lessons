<!-- Авторизация
ID аптеки ??
1. Аптекка ??
2. Категория
3. Продукт 
4. Оценка -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="welcome-user">
        <h3>Welcome user</h3>
    </div>
    <div class="container">
        <div class="title row">
            <h1>Enter an ID</h1>
        </div>
        <form class="id-search ">
            <input type="hidden" name="action" value="search">
            <input class="col-sm-4" type="text">
            <button type="submit">Submit</button>
            <ul class="result-list">
                <li><a href="">a</a></li>
                <li><a href="">b</a></li>
                <li><a href="">c</a></li>
                <li><a href="">d</a></li>
                <li><a href="">e</a></li>
            </ul>
        </form>
    </div>

    <div class="links">
        <ul>
            <li><a href="#">Category</a></li>
            <li><a href="#">Product</a></li>
        </ul>
    </div>
    
</body>
</html>