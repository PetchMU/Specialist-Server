<?php
include "header.php";
?>
<h1>Sign Up</h1>
<div class="collection">
    
    <?php if($err_email_exist):?>
    <div class="collection-item red lighten-3" style="color:#fff">This e-mail is already exist</div>
    <?php endif; ?>
    
    <?php if ($err_pass_miss_match) :?>
    <div class="collection-item red lighten-3" style="color:#fff">Password miss match</div>
    <?php endif; ?>
    
  </div>
<div class="row">
    <form class="col s12" method="post"> 
        <div class="row">
            <div class="input-field col s12">
                <input name="email" id="email" type="email" class="validate"  value = "<?=$email?>">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">

            <div class="input-field col s6">
                <input name="password" id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="input-field col s6">
                <input name="confirmpassword" id="confirmpassword" type="password" class="validate">
                <label for="confirmpassword">Confirm Password</label>
            </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn-large"><i class="material-icons left">cloud</i>Sign up</button>


    </form>
</div>


<?php
include "footer.php";
?>