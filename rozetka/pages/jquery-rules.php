<link rel="stylesheet" href="hljs/styles/tomorrow-night-bright.min.css">
<script src="hljs/highlight.min.js"></script>

<h1 class="d-flex">
    <span>JQuery rules</span> 
    <span id="result_count"></span>
    <input type="text" class="jquery-rules-input" id="jquery_rules_input">
</h1>

<?php ?>


<div class="jquery-rules-list">

<?php 
include 'data/jquery-rules.php';
foreach($jquery_rules as $block): ?>
    <div class="block">
        <div class="title"><?= $block['title'] ?>
            <div class="badge <?= $block['type'] ?? 'jQuery' ?>"><?= $block['type'] ?? 'jQuery' ?></div>
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