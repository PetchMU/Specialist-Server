
<div class="row brown lighten-1" style="min-height: 40px; margin-bottom: 0; position: fixed; z-index: 100; width: 100%">
    <div class="col s1" style="position: absolute">
        <?php if (!$show_back): ?>
            <a href="#" data-activates="slide-out" class="button-collapse">
                <i id="js-open-side-bar" class="material-icons brown white-text" style="margin-top: 10px;">dehaze</i>
            </a>
        <?php else: ?>
            <a href="javascript:history.back()" data-activates="slide-out" class="button-collapse-b">
                <i id="js-open-side-bar" class="material-icons brown white-text" style="margin-top: 10px;">arrow_back</i>
            </a>
        <?php endif; ?>
    </div>
    <?php if (isLogin()): ?>
        <div class="col s1" style="position: absolute; right:15px; top: 5px;">
            <a href="/user/<?= $user_info['uid'] ?>">
                <img src="<?= $user_info['thumbnail'] ?>" style="width: 32px;height: 32px; border: 2px solid #fff;"/>
            </a>
        </div>
    <?php endif; ?>
    <div class="col s12 white-text" style="font-size: 32px; text-align: center">
        <?= $title ?>
    </div>
</div>

<div class="row" style="margin-bottom: 50px">
    <div class="col s12  m12">
        <?php if (isLogin()): ?>
            <ul id="slide-out" class="side-nav">
                <li>
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <a href="/user/<?= $user_info['uid'] ?>">
                                <img src="<?= $user_info['thumbnail'] ?>" alt="" class="circle">
                                <h5 style="margin: 0"><?= userInfo('fname') . ' ' . userInfo('lname') ?></h5>
                                <p>@<?= userInfo('username') ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="/group">My group</a></li>
                <?php if(isAdmin()):?>
                <li><a href="/admin/console">Admin</a></li>
                <?php endif;?>
                <li><a href="/logout">Logout</a></li>
            </ul>
        <?php else: ?>
            <ul id="slide-out" class="side-nav">
                <li><a href="/singup">Sing up</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
        <?php endif; ?>
    </div>
</div>


<script>
    $(function () {
        $(".button-collapse").sideNav({
            menuWidth: 300
        })
    })
</script>