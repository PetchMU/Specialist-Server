<?php
include "header.php";
?>
<?php if ($err_user_password_wrong): ?>
    <div class="collection-item red lighten-3" style="color:#fff">Username or Password wrong</div>
<?php endif; ?>

<div class="row">
    <form class="col s12" method="post">
        <div class="row">
            <img src="/res/images/thumbnail/1.png" style="width: 100%"/>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn-large"><i class="material-icons left">cloud</i>Login</button>
    </form>
</div>

<?php
include "footer.php";
?>