<?php

if(!empty($_GET['delete'])){
    $rule_id = (int)$_GET['delete'];
    db_query("DELETE FROM jq_rules WHERE id = '$rule_id'");
    header('Location: ?action=jquery');
  
  }

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 5;


$query = db_escape($_GET['query']);
$result_arr = db_query("SELECT * FROM jq_rules WHERE title like '%$query%' ");


$total_count = db_query("SELECT count(*) FROM jq_rules");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous"></script>

<link rel="stylesheet" href="hljs/styles/tomorrow-night-bright.min.css">
<script src="hljs/highlight.min.js"></script>

<h1 class="d-flex">
    <span>JQuery rules</span> 
    <span id="result_count"></span>
    <!-- <input type="text" class="jquery-rules-input" id="jquery_rules_input"> -->
    <form class="admin-search" action="admin.php">
        <input type="hidden" name="action" value="ad-search">
        <input id="jq_search" name="query" value="<?= @$_GET['query'] ?>" type="text" placeholder="<?= langs('look for', 'Я ищу...') ?>" />
        <button type="submit"><?= langs('btn.search', 'Найти') ?></button>
    </form>
</h1>




<h2 class="d-flex">
    <a href="?action=jquery-add" class="btn btn-primary mx-1">Add rule</a>
    <a href="?action=jquery-export" class="btn btn-primary mx-1" id="jquery_export">Export</a>
    <form class="d-flex mx-1" action="<?= query_add(['jquery_import' => 1]) ?>" style="width:400px" method="POST" enctype='multipart/form-data'>
        <input name="import_file" class="form-control" type="file">
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</h2>

 

 <?php include 'blocks/admin-page-top.php'; ?>


<?php foreach ($result_arr as $rule):

?>

<div class="jquery-rules-list">

    <div class="block">
        <div class="title"><?= $rule['title'] ?>
        <a class="mx-auto text-danger" onclick="if(!confirm('Are you sure?')) return false" href="?action=jquery&delete=<?= $rule['id']?>" >
        <span class="rule-delete"><?= bi('trash') ?></span></a>
            <div class="badge <?= $rule['type'] ?> " title="<?= $rule['type'] ?>">
                <?= $rule['type'] ?> 
            </div>
        </div>
        <div class="description"><?= $rule['description'] ?></div>
        <pre class="example"><code><?= $rule['example'] ?></code></pre>
    </div>
    <?php endforeach ?>
</div>