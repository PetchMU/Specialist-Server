
<div class="row blue darken-1" style="min-height: 40px;">
    <div class="col s1" style="position: absolute">
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i id="js-open-side-bar" class="material-icons blue darken-2 white-text" style="margin-top: 10px;">dehaze</i>
        </a>
    </div>
    <div class="col s1" style="position: absolute; right:15px; top: 5px;">
        <img src="<?= $thumbnail ?>" style="width: 32px;height: 32px; border: 2px solid #fff;"/>
    </div>
    <div class="col s12 white-text" style="font-size: 32px; text-align: center">
        <?= $title ?>
    </div>
</div>

<div class="row">
    <div class="col s12  m12">
        <ul id="slide-out" class="side-nav">
            <li><a href="#!">First Sidebar Link</a></li>
            <li><a href="#!">Second Sidebar Link</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#!">First</a></li>
                                <li><a href="#!">Second</a></li>
                                <li><a href="#!">Third</a></li>
                                <li><a href="#!">Fourth</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="#!">First Sidebar Link</a></li>
            <li><a href="#!">Second Sidebar Link</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
            </ul>
        </ul>

    </div>
</div>


<script>
    $(function () {
        $(".button-collapse").sideNav({
            menuWidth: 300
        })
    })
</script>