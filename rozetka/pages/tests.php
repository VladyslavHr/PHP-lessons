<?php


$files = scandir('pages/tests');


// pa($files);

$first_letter = $files [2][0];

// foreach ($files as $key => $file){
//     for ($i=2; $i < count($files); $i++) { 
//         $file = str_replace('.php', '', $files[$i] );
//     }for ($i=2; $i < count($files); $i++) { 
//         $file = str_replace('test-', '', $files[$i] );
//     }
    
//     pa($file);
// }

?>

<style>
    .tests-first-letter{
        font-size: 35px;
        font-family: times;
        color: #3177aa;
        text-transform: uppercase;
    }
</style>

<div class="tests-block">
    <!-- <div class="tests-first-letter"></div> -->
    <ul class="tests-list">
        <?php for ($i=2; $i < count($files); $i++): 
            $file = str_replace(['test-' , '.php'], '', $files[$i] );
            if($file === $files[$i]) continue;

            if($first_letter !== $file[0]):
                $first_letter = $file[0];
                  ?>
                </ul>
            </div>

            <div class="tests-block">
                <div class="tests-first-letter"><?= $first_letter ?></div>
                <ul class="tests-list">
            <?php endif ?>
            <li><a href="?action=tests/test-<?= $file ?>"><?= $file ?></a></li>
        <?php endfor ?>
    </ul>
</div>

