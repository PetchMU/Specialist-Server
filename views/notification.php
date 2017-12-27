<?php
include "header.php";
?>

<style>
    img.my-icon{
        border-radius: 0;
        border:1px solid #eee;
        top: 11px;
        height: 60px !important;
        width: 60px !important;
        left: 7px !important;
    }
    .unseen{
        background: #e1f5fe !important;
    }
</style>
<?php

function getNotiIcon($icon) {
    if ($icon == 1)
        return "/res/images/icon/group_noti.png";
    if ($icon == 2)
        return "/res/images/icon/friend_message.png";
    if ($icon == 3)
        return "/res/images/icon/event_gift.jpg";
    if ($icon == 4)
        return "/res/images/icon/friend_request.png";
}

function getNotiLink($noti) {
    $base = '/notification/' . $noti['nid'] . '/read?next=';
    if ($noti['relate_type'] == 1 && $noti['icon'] == 2)
        return $base . '/user/' . $noti['relate_id'] . '/message';
    if ($noti['relate_type'] == 1)
        return $base . '/user/' . $noti['relate_id'];
    if ($noti['relate_type'] == 2)
        return $base . '/group/' . $noti['relate_id'];
}
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
                <?php foreach ($noti_list as $noti): ?>
                    <?php if ($noti['status'] == 2): ?>
                        <li class="collection-item avatar">
                            <a href="<?= getNotiLink($noti) ?>">
                                <img src="<?= getNotiIcon($noti['icon']) ?>" alt="" class="my-icon circle">
                                <span class="title"><?= $noti['title'] ?></span>
                                <p>
                                    <?= $noti['description'] ?>
                                </p>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="collection-item avatar unseen">
                            <a href="<?= getNotiLink($noti) ?>">
                                <img src="<?= getNotiIcon($noti['icon']) ?>" alt="" class="my-icon circle">
                                <span class="title"><?= $noti['title'] ?></span>
                                <p>
                                    <?= $noti['description'] ?>
                                </p>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>