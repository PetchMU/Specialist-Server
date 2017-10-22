<ul id="slide-out" class="side-nav">
    <li><div class="user-view">
            <div class="background">
                <img src="images/office.jpg">
            </div>
            <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
            <a href="#!name"><span class="white-text name">John Doe</span></a>
            <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>

<div class="row green darken-1" style="min-height: 40px;">
    <div class="col s1">
        <i id="js-open-side-bar" class="material-icons white" style="margin-top: 10px;">dehaze</i>
    </div>
    <div class="col s11 white-text" style="font-size: 32px;">
        <?= $title ?>
    </div>
</div>
<script>
    $(function(){
        $("#js-open-side-bar").sideNav()
    })
    </script>