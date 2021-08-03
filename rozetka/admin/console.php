<?php
$user = $_SESSION['user'];
?>
<h1>Admin Console</h1>
<p>
    HEllo <?= $user['name'] ?> <?= $user['last_name'] ?> (<?= $user['email'] ?>)
</p>