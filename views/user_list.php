<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <p>
                you have <?=$total?> friends | <a href="/user/sendallmessage"> Send message to friends </a>
            </p>
            <ul class="collection">
                <?php foreach ($friend_list as $friend): ?>
                    <li class="collection-item avatar">
                        <a href="/user/<?= $friend['uid'] ?>">
                            <img src="<?= $friend['picture'] ?>" alt="" class="circle">
                            <span class="title"><?= $friend['fname'] ?> <?= $friend['name'] ?></span>
                            <p>
                                <?= $friend['phone'] ?>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>