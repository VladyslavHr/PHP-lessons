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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
<body>
<pre>
<?php 
// print_r($_POST);
// Create
if(!empty($_POST['new_task'])){
    $task = strip_tags($_POST['new_task']); //strip_tags — Удаляет теги HTML и PHP из строки
    $task = substr($task, 0, 400); //substr — Возвращает подстроку строки string, начинающейся с offset символа по счету и длиной length символов.
    $task = db_escape($task); //Экранирует строку для использования в mysql_query
if(!empty($_POST['edit'])){ //Update
  $task_id = (int)$_POST['edit'];
  db_query("UPDATE todo_list SET task = '$task' WHERE id = '$task_id' "); // db_query Переключается на указанную базу данных и посылает запрос
}else{
  db_query("INSERT INTO todo_list SET task = '$task' ");
}
header('Location: index.php');

}

if(isset($_POST['save'])){
  $task = strip_tags($_POST['task_text']);
  $task = substr($task, 0, 400);
  $task = db_escape($task);
  $task_id = (int)$_POST['save'];
  db_query("UPDATE todo_list SET task = '$task' WHERE id = '$task_id' ");
  header('Location: index.php');
}
// Delete
if(!empty($_GET['delete'])){
  $task_id = (int)$_GET['delete'];
  db_query("DELETE FROM todo_list WHERE id = '$task_id'");
  header('Location: index.php');

}

// Edit
$input_value = '';
$edit_task_id = '';
if(!empty($_GET['edit'])){
  $edit_task_id = (int)$_GET['edit'];
  $task = db_query("SELECT * FROM todo_list WHERE id = '$edit_task_id'");
  $input_value = $task[0]['task'];
  // print_r($task);
}

// Read
$tasks = db_query("SELECT * FROM todo_list");
// print_r($tasks);
?>
</pre>

        <div class="container" style="max-width: 600px;">
        <h1 class="text-center my-3"> <a href="index.php"> Todo List</a></h1>
        <form class="input-group mb-3" method="POST">
          <input type="hidden" name="edit" value="<?=$edit_task_id?>">
  <input autofocus name="new_task" value="<?= $input_value ?>" type="text" class="form-control" placeholder="Enter task" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add</button>
</form>
<ul class="list-group">
  <!-- <li class="list-group-item">An item</li>
  <li class="list-group-item">A second item</li>
  <li class="list-group-item">A third item</li>
  <li class="list-group-item">A fourth item</li>
  <li class="list-group-item">And a fifth one</li> -->
  <?php foreach($tasks as $row): ?>
  <li class="list-group-item d-flex align-items-center">
  <?= $row['id']?>:&nbsp;
  <form class="d-flex" method="POST" style="width: 100%;">
  <input type="text" name="task_text" value="<?= $row['task']?>" style="border: 0;">
  <button name="save" value="<?= $row['id']?>" type="submit" class="btn ms-auto me-1 text-info"><i class="bi bi-save"></i></button>
  </form>
  <a href="?edit=<?= $row['id']?>" class="me-3 text-sucsess"><i class="bi bi-pencil"></i></a>
  <a onclick="if(!confirm('Are you sure?')) return false" href="?delete=<?= $row['id']?>" ><i class="bi bi-trash ms-auto text-danger"></i></a>
  </li>
  <?php endforeach ?>
</ul>
        </div>



</body>
</html>