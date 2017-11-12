<?php
include "header.php";
?>

<ul class="collection">
    <li class="collection-item avatar">
        <img src="<?= userInfo('picture') ?>" alt="" class="circle">
        <h5><?= userInfo('fname') . ' ' . userInfo('lname') ?></h5>
        <p>@<?= userInfo('username') ?></p>
    </li>
</ul>


<div class="row center">
    <p>
        คุณยังไม่มีเพื่อนเลย ต้องการค้นหาเพื่อนไหม
    </p>
    <a href="/search" class="waves-effect waves-light btn-large">Search</a>
</div>





<ul class="collection">
    <li class="collection-item avatar">
        <img src="images/yuna.jpg" alt="" class="circle">
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
        <i class="material-icons circle">folder</i>
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
        <i class="material-icons circle green">insert_chart</i>
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    <li class="collection-item avatar">
        <i class="material-icons circle red">play_arrow</i>
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
</ul>
<?php
include "footer.php";
?>