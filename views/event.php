<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <h4>Birthday of you friend will coming</h4>
            <ul class="collection">
                <?php foreach ($friend_list as $friend): ?>
                    <li class="collection-item avatar">
                        <a href="/user/<?= $friend['uid'] ?>">
                            <img src="<?= $friend['picture'] ?>" alt="" class="circle">
                            <span class="title"><?= $friend['fname'] ?> <?= $friend['name'] ?></span>
                        </a>
                        <p>
                            <?= $friend['dob'] ?>
                            <?php if (date('z') == date('z', strtotime($friend['dob']))): ?>
                                <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                            <?php endif; ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>