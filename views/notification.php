<?php
include "header.php";
?>

<style>
    img.my-icon{
        border-radius: 0;
        border:1px solid #eee;
        top: 11px;
        height: 60px !important;
        width: 60px !important;
        left: 7px !important;
    }
    .unseen{
        background: #e1f5fe !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
                <li class="collection-item avatar">
                    <img src="/res/images/icon/friend_request.png" alt="" class="my-icon circle">
                    <span class="title">Title</span>
                    <p>
                        Second Line
                    </p>
                </li>
                <li class="collection-item avatar unseen">
                    <img src="/res/images/icon/friend_request.png" alt="" class="my-icon circle">
                    <span class="title">Title</span>
                    <p>
                        Second Line
                    </p>
                </li>
            </ul>

        </div>
    </div>
</div>    
<?php
include "footer.php";
?>