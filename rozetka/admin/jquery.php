<?php

if(!empty($_GET['delete'])){
    $rule_id = (int)$_GET['delete'];
    db_query("DELETE FROM jq_rules WHERE id = '$rule_id'");
    header('Location: ?action=jquery');
  
  }



?>


<link rel="stylesheet" href="hljs/styles/tomorrow-night-bright.min.css">
<script src="hljs/highlight.min.js"></script>

<h1 class="d-flex">
    <span>JQuery rules</span> 
    <span id="result_count"></span>
    <input type="text" class="jquery-rules-input" id="jquery_rules_input">
</h1>

<?php 

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 5;

$total_count = db_query("SELECT count(*) FROM jq_rules");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;

$jquery_rules = db_query("SELECT * FROM jq_rules LIMIT $limit OFFSET $offset ");

?>

<h2><a href="?action=jquery-add" class="btn btn-primary">Add rule</a></h2>
<?php include 'blocks/admin-page-top.php';?> 
<div class="jquery-rules-list">

    <?php 
    foreach($jquery_rules as $block): ?>
    <div class="block">
        <div class="title"><?= $block['title'] ?>
        <a class="mx-auto text-danger" onclick="if(!confirm('Are you sure?')) return false" href="?action=jquery&delete=<?= $block['id']?>" >
        <span class="rule-delete"><?= bi('trash') ?></span></a>
            <?php if ($block['type'] === 'j_query'): ?>
            <div class="badge" title="j_query">
                jQuery
            </div>
          <?php elseif ($block['type'] === 'java_script'): ?>
            <div class="badge" title="java_script">
                JavaScript
            </div>
            <?php endif ?>
        </div>
        <div class="description"><?= $block['description'] ?></div>
        <pre class="example"><code><?= $block['example'] ?></code></pre>
    </div>
    <?php endforeach ?>
</div>


<script>
    var blocks = $('.jquery-rules-list .block')
    $('#result_count').html(blocks.length)
    $('#jquery_rules_input').keyup(function(){
        var input_value = this.value.toLowerCase()
            var result = blocks.filter(function(){
                return $(this).find('.title').text().toLowerCase().indexOf(input_value) !== -1 
            })
            $('.jquery-rules-list').html(result)
            $('#result_count').html(result.length)
    }) 


  document.querySelectorAll('pre code').forEach((el) => {
    hljs.highlightElement(el);
});
</script>