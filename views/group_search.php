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

    function hilight($str, $hilight_word) {
        return preg_replace('/(' . preg_quote($hilight_word) . ')/i', "<span class=\"search-hilight\">$1</span>", $str);
    }
    ?>
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
<?php if (empty($group_list) && $keyword): ?>
                    <blockquote>
                        <b>"<?= $keyword ?>"</b> not match with any user account 
                    </blockquote>
                <?php endif; ?>
<?php foreach ($group_list as $group): ?>
                    <li class="collection-item avatar">
                        <a href="/group/<?= $group['gid'] ?>">
                            <img src="<?= $group['picture'] ?>" alt="" class="circle">
                            <span class="title"><?= hilight($group['name'], $keyword) ?></span>

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