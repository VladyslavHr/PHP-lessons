<?php

$files = scandir('pages/tests');

pa($files);

?>

<ul class="tests-list">
    <?php for ($i=2; $i < count($files); $i++): 
        $file = str_replace('.php', '', $files[$i] );
        ?>
        <li><a href="?action=tests/<?= $file ?>"><?= $file ?></a></li>
    <?php endfor ?>
</ul>