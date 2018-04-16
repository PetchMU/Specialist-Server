<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
                <?php if(empty($user)) : ?>
                <blockquote>
                    Not found user
                </blockquote>
                <?php endif; ?>
                <?php foreach ($users as $user) :?>
                <li class="collection-item avatar">
                    <img src="<?=$user['picture']?>" alt="" class="circle">
                    <p class="title"><?=$user['fname']." ".$user['lname']?></p>
                    <a href="/group/<?=$gid?>/allow?allow=accept&uid=<?=$user['uid']?>" class="waves-effect waves-light btn brown lighten-1"><i class="material-icons ">check</i></a>
                    <a href="/group/<?=$gid?>/allow?allow=deny&uid=<?=$user['uid']?>" class="waves-effect waves-light blue-grey lighten-5 blue-grey-text text-lighten-4 btn"><i class="material-icons ">clear</i></a>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>