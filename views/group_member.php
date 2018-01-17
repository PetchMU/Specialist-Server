<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="collection">
                <div class="collection-item"><span class="badge"><?=$total?></span>All member in this group</div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($members as $member): ?>
            <div class="col s4 m3">
                <a href="/user/<?= $member['uid'] ?>">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $member['picture'] ?>">
                        </div>
                        <div class="card-content">
                            <span title="<?= $member['fname'] . " " . $member['lname'] ?>"><?= $member['fname'] ?></span>

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