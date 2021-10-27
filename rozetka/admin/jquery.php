



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
    <!-- <input type="text" class="jquery-rules-input" id="jquery_rules_input"> -->
    <form class="admin-search" action="admin.php">
        <input type="hidden" name="action" value="ad-search">
        <input id="jq_search" name="query" value="<?= @$_GET['query'] ?>" type="text" placeholder="<?= langs('look for', 'Я ищу...') ?>" />
        <button type="submit"><?= langs('btn.search', 'Найти') ?></button>
    </form>
</h1>



<?php 

$offset = $_GET['offset'] ?? 0;
$limit = $_GET['limit'] ?? 5;

$total_count = db_query("SELECT count(*) FROM jq_rules");
$total_count = $total_count ? $total_count[0]['count(*)'] : 0;

$jquery_rules = db_query("SELECT * FROM jq_rules LIMIT $limit OFFSET $offset ");

?>





<h2 class="d-flex">
    <a href="?action=jquery-add" class="btn btn-primary mx-1">Add rule</a>
    <a href="?action=jquery-export" class="btn btn-primary mx-1" id="jquery_export">Export</a>
    <form class="d-flex mx-1" action="<?= query_add(['jquery_import' => 1]) ?>" style="width:400px" method="POST" enctype='multipart/form-data'>
        <input name="import_file" class="form-control" type="file">
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</h2>
<?php include 'blocks/admin-page-top.php';?> 
<div class="jquery-rules-list">

    <?php 
    foreach($jquery_rules as $block): ?>
    <div class="block">
        <div class="title"><?= $block['title'] ?>
        <a class="mx-auto text-danger" onclick="if(!confirm('Are you sure?')) return false" href="?action=jquery&delete=<?= $block['id']?>" >
        <span class="rule-delete"><?= bi('trash') ?></span></a>
            <div class="badge <?= $block['type'] ?> " title="<?= $block['type'] ?>">
                <?= $block['type'] ?> 
            </div>
        </div>
        <div class="description"><?= $block['description'] ?></div>
        <pre class="example"><code><?= $block['example'] ?></code></pre>
    </div>
    <?php endforeach ?>
</div>

<a href="data/jquery_export.json" id="someID" target="_blank" download="filename.json"></a>

<script>
    var log = console.log
    $('#jquery_export').on('click', function(event)
    {
        event.preventDefault()
        $.post(location.href, 
        {generate_jquery_export: 1},
        function (data)
        {
            $('#someID')[0].click()
        },'json')
        
    })



    // var blocks = $('.jquery-rules-list .block')
    // $('#result_count').html(blocks.length)
    // $('#jquery_rules_input').keyup(function(){
    //     var input_value = this.value.toLowerCase()
    //         var result = blocks.filter(function(){
    //             return $(this).find('.title').text().toLowerCase().indexOf(input_value) !== -1 
    //         })
    //         $('.jquery-rules-list').html(result)
    //         $('#result_count').html(result.length)
    // }) 


//   document.querySelectorAll('pre code').forEach((el) => {
//     hljs.highlightElement(el);
// });
</script>