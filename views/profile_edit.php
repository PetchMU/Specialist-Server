<?php
include "header.php";
//print_r($user);
?>

<div class="container">
    <div class="row">
        <?php if($update_done) :?>
        <ul class="collection">
            <li class="collection-item light-green lighten-4" >update done</li>
        </ul>
        <?php endif; ?>
        <form method="post" class="col s12 m12">
            <h4>Edit Profile</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="ex. John" id="first_name" type="text" class="validate" name="fname" value="<?= $user['fname'] ?>">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="ex. Doe" id="last name" type="text" class="validate" name="lname" value="<?= $user['lname'] ?>">
                    <label for="last_name">Last Name</label>
                </div>
                <h6 style="margin-left: 10px">Birth Date</h6>
                <input type="text" class="datepicker" style="width: 200px ; border: 1px solid #666; border-radius: 4px; padding: 0 20 px; text-align: center" name="dob" value="<?= date('j F, Y', strtotime($user['dob'])) ?>">

                <div class="input-field col s12">
                    <input placeholder="ex. 081-234-5678" id="phone number" type="text" class="validate" name="phone" value="<?= $user['phone'] ?>">
                    <label for="phonne number">Phone Number</label>
                </div>
            </div>
            <button class="waves-effect waves-light btn"><i class="material-icons left">save</i>Save</button>
        </form>
    </div>
</div>    
<script>
    $(document).ready(function () {
        $('select').material_select();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

    });
</script>
<?php
include "footer.php";
?>