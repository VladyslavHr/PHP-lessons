<?php

if ($_POST) $_SESSION['post'] = $_POST;
if ($_GET) $_SESSION['get'] = $_GET;

if($_GET['action'] !== 'users-add' && !isset($_SESSION['user'])){
    $_SESSION['flash_message'] = 'Pleas authorise!';
    redirect('admin.php?action=users-add');
}

if (isset($_POST['users-add'])) {
  if (empty($_POST['last_name'])){
    $message = 'Please enter your Last Name!';
    flash_set($message);
    redirect('admin.php?action=users-add');
  }
  if (empty($_POST['name'])){
    $message = 'Please enter your Name!';
    flash_set($message);
    redirect('admin.php?action=users-add');
  }

  if (empty($_POST['email'])){
    $message = 'Please enter your Email!';
    flash_set($message);
    redirect('admin.php?action=users-add');
  }

  if (empty($_POST['password'])){
    $message = 'Please enter your Password!';
    flash_set($message);
    redirect('admin.php?action=users-add');
  }

}
// Create
if(isset($_POST['new_user'])){
    $name = db_escape($_POST['name']);
    $last_name = db_escape($_POST['last_name']);
    $email = db_escape($_POST['email']);
    $age = db_escape($_POST['age']);
    $gender = db_escape($_POST['gender']);
    $password = db_escape(password_hash($_POST['password'], PASSWORD_DEFAULT)); //Экранирует строку для использования в mysql_query
    db_query("INSERT INTO users SET
      `name` = '$name',
      last_name = '$last_name',
      email = '$email',
      age = '$age',
      gender = '$gender',
      `password` = '$password'");
    redirect('admin.php?action=users');

}


?>


<h2>Add User</h2>
<form action="?action=users-add" method="Post">
<div class="text-center text-danger">
    <?= flash_get() ?>
  </div>
<div class="row my-3">
  <div class="col">
  <label class="form-label">Name</label>
    <input name="name" value="<?= session_take_post('name')?>" type="text" class="form-control" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
  <label class="form-label">Last name</label>
    <input name="last_name" value="<?= session_take_post('last_name')?>" type="text" class="form-control" placeholder="Last name" aria-label="Last name">
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Email</label>
    <input name="email" value="<?= session_take_post('email')?>" type="text" class="form-control" placeholder="Email" aria-label="First name">
  </div>
  <div class="col">
  <label class="form-label">Password</label>
    <input name="password" value="<?= session_take_post('password')?>" type="password" class="form-control" placeholder="Password" aria-label="Last name">
  </div>
</div>

<div class="row my-3">
  <div class="col">
  <label class="form-label">Age</label>
    <input name="age" type="number" min="1" max="150" class="form-control" placeholder="Age" aria-label="First name">
  </div>
  <div class="col">
  <label class="form-label">Gender</label>
    <select name="gender" class="form-select">
    <option value="male">male</option>
    <option value="female">female</option>
    </select>
  </div>
</div>

<button name="new_user" type="submit" class="btn btn-primary">Save</button>


</form>