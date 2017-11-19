<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <ul>
                <?php foreach ($chatInfo as $line): ?>
                    <li><?=$line['message']?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>    
<?php
include "footer.php";
?>