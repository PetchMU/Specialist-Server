<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
                <?php foreach ($user_list as $user): ?>
                    <li class="collection-item avatar">
                        <a href="/user/<?= $user['uid'] ?>">
                            <img src="<?= $user['picture'] ?>" alt="" class="circle">
                            <span class="title"><?= $user['fname'] ?> <?= $user['name'] ?></span>
                            <p>
                                <?= $user['phone'] ?>
                            </p>
                        </a>
                        <?php if( ! isset($status_list[$user['uid']])): ?>
                        <a href="/user/<?=$user['uid']?>/add" class="secondary-content"><i class="material-icons">control_point</i></a>
                        <?php elseif($status_list[$user['uid']] == 2): ?>
                        <span class="secondary-content"><i class="material-icons">check_circle</i></span>
                        <?php else: ?>
                        <span class="secondary-content">waiting</span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>