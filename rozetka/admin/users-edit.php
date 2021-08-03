<?php
// Create
if(isset($_POST['edit_user'])){
    $user_id = (int)$_POST['edit_user'];
    $name = db_escape($_POST['name']);
    $last_name = db_escape($_POST['last_name']);
    $email = db_escape($_POST['email']);
    $age = db_escape($_POST['age']);
    $gender = db_escape($_POST['gender']);
    // $password = db_escape(password_hash($_POST['password'], PASSWORD_DEFAULT)); //Экранирует строку для использования в mysql_query
    db_query("UPDATE users SET
      name = '$name',
      last_name = '$last_name',
      email = '$email',
      age = '$age',
      gender = '$gender'
      WHERE id = '$user_id'");
    header('Location: admin.php?action=users');

}
$user_id = (int)$_GET['user_id'];
$user = db_query("SELECT * FROM users WHERE id = '$user_id' ");
$user = $user[0];


?>


<h2>Edit User <?= $user['name'] ?> <?= $user['last_name'] ?> (<?= $user['email'] ?>)</h2>
<form action="admin.php?action=users-edit" method="Post">

<div class="row my-3">
  <div class="col">
    <input name="name" value="<?= $user['name'] ?>" type="text" class="form-control" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
    <input name="last_name" value="<?= $user['last_name'] ?>" type="text" class="form-control" placeholder="Last name" aria-label="Last name">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="email" value="<?= $user['email'] ?>" type="text" class="form-control" placeholder="Email" aria-label="First name">
  </div>
  <div class="col">
    <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Last name">
  </div>
</div>

<div class="row my-3">
  <div class="col">
    <input name="age" value="<?= $user['age'] ?>" type="number" min="1" max="150" class="form-control" placeholder="Age" aria-label="First name">
  </div>
  <div class="col">
    <select name="gender" class="form-control">
    <option <?= if_selected($user['gender'], 'male') ?> value="male">male</option>
    <option <?= if_selected($user['gender'], 'female') ?> value="female">female</option>
    </select>
  </div>
</div>

<button name="edit_user" value="<?= $user['id'] ?>" type="submit" class="btn btn-primary">Save</button>

</form>
