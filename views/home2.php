<?php
include "header.php";
?>
<style>
    .home-menu{
        border: 1px solid #eee;
        background: #fafafa;
        padding: 0px 0 !important;
        text-align: center;
        
    }
    .home-menu img{
        width: 100%;
    }
    .home-menu h3{
        color: black !important;
        font-size: 16px;
    }
</style>

<div class="container" style="width:92%">
    <div class="collection" style="width: 100% ; border: none">

        <div class="collection-item avatar">
            <a href="/user/<?= $user['uid'] ?>">
                <img src="<?= $user['picture'] ?>" alt="" class="circle">
                <p>
                    Hello
                </p>
                <span class="title"><?= ($user['fname'] . ' ' . $user['lname']) ?></span>

            </a>

        </div>

    </div>
<div class="row">
        <a href="/user/<?= $user['uid'] ?>" class="col s4 m4 home-menu">
            <img src="/res/images/icon/user_profile.png"/>
            <!--<h3>Profile</h3>-->
        </a>
        <a href="/user/list" class="col s4 m4 home-menu">
            <img src="/res/images/icon/contact.jpg"/>
            <!--<h3>Contact</h3>-->
        </a>
        <a href="/group" class="col s4 m4 home-menu">
            <img src="/res/images/icon/group.jpg"/>
            <!--<h3>Group</h3>-->
        </a>
        <a href="/notification" class="col s4 m4 home-menu">
            <img src="/res/images/icon/notification.png"/>
            <!--<h3>notification</h3>-->
        </a>
        <a href="/user/search" class="col s4 m4 home-menu">
            <img src="/res/images/icon/search_friend.jpg"/>
            <!--<h3>Search friend</h3>-->
        </a>
        <a href="/group/search" class="col s4 m4 home-menu">
            <img src="/res/images/icon/search_group.jpg"/>
           <!--<h3>Search Group</h3>-->
        </a>
        <a href="/event" class="col s4 m4 home-menu">
            <img src="/res/images/icon/event.png"/>
            <!--<h3>Event</h3>-->
        </a>
        <a href="#" class="col s4 m4 home-menu">
            <img src="/res/images/icon/reminder.png"/>
            <!--<h3>Reminder</h3>-->
        </a>

    </div>
</div>    
<?php
include "footer.php";
?>