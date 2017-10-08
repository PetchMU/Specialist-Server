<?php
include "header.php";
?>
<h1>Sign Up</h1>
<div class="collection">
    
    <a href="#!" class="collection-item red darken-1"><span class="new badge">4</span>Alan</a>
    
  </div>
<div class="row">
    <form class="col s12"> 
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">

            <div class="input-field col s6">
                <input id="password" type="text" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="input-field col s6">
                <input id="confirmpassword" type="text" class="validate">
                <label for="confirmpassword">Confirm Password</label>
            </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn-large"><i class="material-icons left">cloud</i>Sign up</button>


    </form>
</div>


<?php
include "footer.php";
?>