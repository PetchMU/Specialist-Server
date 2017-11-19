<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">

            <div class="card">
                <div class="card-image">
                    <img src="<?=$userInfo['picture']?>">
                </div>
                <div class="card-content">
                    <h3><?=$userInfo['fname'] . ' ' . $userInfo['lname']?></h3>
                    <h5>Birthdate</h5>
                    <?=date('j M Y', strtotime($userInfo['dob']))?>
                    <h5>Tel.</h5>
                    <a href="tel:<?=$userInfo['phone']?>"><?=$userInfo['phone']?></a>
                    <h5>Email</h5>
                    <a href="mailto:<?=$userInfo['email']?>"><?=$userInfo['email']?></a>
                </div>
                <div class="card-action">
                    <a href="/user/<?=$userInfo['uid']?>/message">Private Massage</a>
                </div>
            </div>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>