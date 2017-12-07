<?php
include "header.php";
?>

<style>
    .search-hilight{
        background: #fff59d;
        border-radius: 8px;
        border: 1px solid #ffcc80 ;
    }
</style>
<div class="container">
    <form method="get">


        <div class="row">

            <div class="input-field col s12">
                <input placeholder="Find your friend" id="k" type="text" name="k" class="validate" value="<?= $keyword ?>">
                <label for="k">Search</label>
            </div>
            <div class="col s12">
                <button class="btn waves-effect waves-light" type="submit">Submit
                    <i class="material-icons right">send</i>
                </button>

            </div>
        </div>
    </form>

<?php 
function hilight($str,$hilight_word){
    return preg_replace('/('. preg_quote($hilight_word) . ')/i', "<span class=\"search-hilight\">$1</span>", $str);
}
?>
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
                <?php if (empty($user_list)): ?>
                    <blockquote>
                        <b>"<?=$keyword?>"</b> not match with any user account 
                    </blockquote>
                <?php endif; ?>
                <?php foreach ($user_list as $user): ?>
                    <li class="collection-item avatar">
                        <a href="/user/<?= $user['uid'] ?>">
                            <img src="<?= $user['picture'] ?>" alt="" class="circle">
                            <span class="title"><?= hilight($user['fname'] . ' ' . $user['lname'],$keyword) ?></span>
                            <p>
                                <?= $user['phone'] ?>
                            </p>
                        </a>
                        <?php if (!isset($status_list[$user['uid']])): ?>
                            <a href="/user/<?= $user['uid'] ?>/add" class="secondary-content"><i class="material-icons">control_point</i></a>
                        <?php elseif ($status_list[$user['uid']] == 2): ?>
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