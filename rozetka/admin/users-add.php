<?php
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
    header('Location: admin.php?action=users');

}


?>


<h2>Add User</h2>
<form action="?action=users-add" method="Post">

<div class="row my-3">
  <div class="col">
    <input name="name" type="text" class="form-control" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
    <input name="last_name" type="text" class="form-control" placeholder="Last name" aria-label="Last name">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="email" type="text" class="form-control" placeholder="Email" aria-label="First name">
  </div>
  <div class="col">
    <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Last name">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="age" type="number" min="1" max="150" class="form-control" placeholder="Age" aria-label="First name">
  </div>
  <div class="col">
    <select name="gender" class="form-control">
    <option value="male">male</option>
    <option value="female">female</option>
    </select>
  </div>
</div>

<button name="new_user" type="submit" class="btn btn-primary">Save</button>

</form>