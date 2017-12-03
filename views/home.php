<?php
include "header.php";
?>

<ul class="collection">
    <li class="collection-item avatar">
        <img src="<?= userInfo('picture') ?>" alt="" class="circle">
        <h5><?= userInfo('fname') . ' ' . userInfo('lname') ?></h5>
        <p>@<?= userInfo('username') ?></p>
    </li>
</ul>


<div class="row center">
    <p>
        คุณยังไม่มีเพื่อนเลย ต้องการค้นหาเพื่อนไหม
    </p>
    <a href="/user/search" class="waves-effect waves-light btn-large">Search</a>
</div>





<ul class="collection">
    <?php foreach ($friend_list as $friend): ?>
        <li class="collection-item avatar">
            <a href="/user/<?= $friend['uid']?>">
                <img src="<?=$friend['picture']?>" alt="" class="circle">
                <span class="title"><?=$friend['fname']?> <?=$friend['name']?></span>
                <p>
                    <?=$friend['phone']?>
                </p>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php
include "footer.php";
?>