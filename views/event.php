<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <p>
                <?= isset($flash_message) ? $flash_message : '' ?>
            </p>
            <h4>Birthday of you friend will coming</h4>
            <ul class="collection">
                <?php foreach ($friend_list as $friend): ?>
                    <li class="collection-item avatar">
                        <a href="/user/<?= $friend['uid'] ?>">
                            <img src="<?= $friend['picture'] ?>" alt="" class="circle">
                            <span class="title"><?= $friend['fname'] ?> <?= $friend['name'] ?></span>
                        </a>
                        <form method="POST" action="/event/submit?type=birthday">
                            <?= $friend['dob'] ?>
                            <?php if (date('z') == date('z', strtotime($friend['dob']))): ?>
                                <input placeholder="Wish" id="first_name" type="text" class="validate" name="birthday_message">
                                <input type="hidden" name="uid" value="<?= $friend['uid'] ?>"/>
                                <button class="btn waves-effect waves-light" type="submit" name="action">Wish
                                    <i class="material-icons right">send</i>
                                </button>
                            <?php endif; ?>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>