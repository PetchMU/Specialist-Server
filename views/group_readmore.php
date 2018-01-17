<?php
include "header.php";
?>

<div class="container">
    
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
                <?php foreach ($chats as $chat): ?>
                    <li class="collection-item avatar">
                        <a href="/user/<?= $chat['uid'] ?>"><img src="<?= $chat['picture'] ?>" alt="" class="circle"></a>
                        <div><a href="/user/<?= $chat['uid'] ?>"><?= $chat['fname'] . " " . $chat['lname'] ?></a> | <?= $chat['chat_datetime'] ?></div>
                        <span class="title"><?= $chat['topic'] ?></span>
                        <p><?= $chat['message'] ?></p>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <br/>
</div>
<?php
include "footer.php";
?>