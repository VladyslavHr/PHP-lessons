<link rel="stylesheet" href="hljs/styles/tomorrow-night-bright.min.css">
<script src="hljs/highlight.min.js"></script>

<h1>JQuery rules</h1>

<?php ?>


<div class="jquery-rules-list">

<?php 
include 'data/jquery-rules.php';
foreach($jquery_rules as $block): ?>
    <div class="block">
        <div class="title"><?= $block['title'] ?></div>
        <div class="description"><?= $block['description'] ?></div>
        <pre class="example"><code><?= $block['example'] ?></code></pre>
    </div>
    <?php endforeach ?>
</div>


<script>
  document.querySelectorAll('pre code').forEach((el) => {
    hljs.highlightElement(el);
});
</script>