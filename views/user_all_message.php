<?php
include "header.php";
?>

<div class="container">
    <?php if ($messagesend): ?>
        <div class="collection-item green lighten-3" style="color:#fff">Message was sent</div>
    <?php endif; ?>
    <form class="row" method="POST">
        <div class="col s12">
            <div class="row">
                <div class="input-field col m8 s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="message" id="icon_prefix2" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Message</label>
                </div>
                <div class="col m2 s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-top: 20px">Submit<i class="material-icons right"></i></button>
                </div>
            </div>



        </div>

        <div class="col s12 m12">

            <p>
                you have <?= $total ?> friends
            </p>
            <ul class="collection">
                <?php foreach ($friend_list as $friend): ?>
                    <li class="collection-item avatar">
                        <div class="right-align"  style="position: absolute; right: 0">
                            <input name="uids[]" value="<?= $friend['uid'] ?>" type="checkbox" class="filled-in" id="filled-in-box<?= $friend['uid'] ?>" checked="checked" />
                            <label for="filled-in-box<?= $friend['uid'] ?>"></label>
                        </div>
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
    </form>
</div>    
<?php
include "footer.php";
?>