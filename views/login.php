<?php
include "header.php";
?>

<div class="row">
    <form class="col s12">
        
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