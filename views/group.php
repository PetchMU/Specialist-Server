<?php
include "header.php";
?>

<div class="container">
    <div class="row">
      <div class="col s6">1</div>
      <div class="col s6">2</div>
    </div>
    <div class="row">
        <?php foreach ($groups as $group): ?>
            <div class="col s6 m4">
                <a href="/group/<?=$group['gid']?>">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?=$group['picture']?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?=$group['name']?></span>

                        </div>

                    </div>
                </a>

            </div>
        <?php endforeach; ?>
    </div>
</div>  



<?php
include "footer.php";
?>