<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">

            <div class="card">
                <?php if ($owner): ?>
                    <div class="card-action">
                        <a href="/user/<?= $userInfo['uid'] ?>/edit" class="right">Edit Profile</a>
                    </div>
                <?php endif; ?>
                <?php if (!$owner): ?>
                    <?php if ($can_add_friend): ?>
                        <div style="text-align: center;">
                            <a href="/user/<?= $userInfo['uid'] ?>/add" class="waves-effect waves-light btn">add friend</a>
                        </div>
                    <?php endif; ?>

                    <?php if ($can_accept_or_deny): ?>
                        <div style="text-align: center;">
                            <a href="/user/<?= $userInfo['uid'] ?>/add" class="waves-effect waves-light btn">accept</a>
                            <a href="/user/<?= $userInfo['uid'] ?>/deny" class="waves-effect waves-light btn">deny</a>
                        </div>
                    <?php endif; ?>

                    <?php if ($waiting_for_accept): ?>
                        <div style="text-align: center;">
                            'waiting for accept'
                        </div>
                    <?php endif; ?> 
                <?php endif; ?>

                <div class="card-image">
                    <img src="<?= $userInfo['picture'] ?>">
                </div>
                <div class="card-content">
                    <h3><?= $userInfo['fname'] . ' ' . $userInfo['lname'] ?></h3>
                    <?php if($has_authorize) :?>
                    <h5>Birthdate</h5>
                    <?= date('j M Y', strtotime($userInfo['dob'])) ?>
                    <h5>Tel.</h5>
                    <a href="tel:<?= $userInfo['phone'] ?>"><?= $userInfo['phone'] ?></a>
                    <h5>Email</h5>
                    <a href="mailto:<?= $userInfo['email'] ?>"><?= $userInfo['email'] ?></a>
                    <?php endif;?>
                </div>
                <?php if (!$owner && $has_authorize): ?>
                    <div class="card-action">
                        <a href="/user/<?= $userInfo['uid'] ?>/message">Private Massage</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>