<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 center">
            <a href="/group/create?parent_gid=<?=$parent_gid?>" class="waves-effect waves-light btn"><i class="material-icons left">account_box</i>Create Group</a>
            <a href="/group/search" class="waves-effect waves-light btn"><i class="material-icons left">search</i>Search</a>
        </div>
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