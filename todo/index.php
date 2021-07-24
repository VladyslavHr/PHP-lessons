<?php include 'functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<pre>
<?php 
// print_r($_POST);
if(!empty($_POST['new_task'])){
    $task = strip_tags($_POST['new_task']);
    $task = substr($task, 0, 400);
$task = db_escape($task);
db_query("INSERT INTO todo_list SET task = '$task' ");
header('Location: index.php');
}
$tasks = db_query("SELECT * FROM todo_list");
// print_r($tasks);
?>
</pre>

        <div class="container" style="max-width: 600px;">
        <h1 class="text-center my-3">Todo List</h1>
        <form class="input-group mb-3" method="POST">
  <input autofocus name="new_task" type="text" class="form-control" placeholder="Enter task" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add</button>
</form>
<ul class="list-group">
  <!-- <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li> -->
  <?php foreach($tasks as $row): ?>
  <li class="list-group-item">
  <?= $row['id']?>:
  <?= $row['task']?>
  </li>
  <?php endforeach ?>
</ul>
        </div>



</body>
</html>