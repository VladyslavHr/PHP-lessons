<?php 
define('ROOT',__DIR__)
?>

<?php include 'blocks/header.php' ?>
<style>
    .test-form{
        margin: 50px;

    }
</style>

<form class="test-form" method="POST">
<input name="email" type="text">
<input name="password" type="password">
<button type="submit">login</button>
</form>

<pre>
    <?php 
    if (auth_check()){
        echo 'Hello ' . $_SESSION['user']['name'];
    }
    // print_r($_GET);
    // print_r($_POST);
    ?>
</pre>




<?php include 'blocks/footer.php'; ?>