<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <form class="col s12 m12">
            <h4>Edit Profile</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="ex. John" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="ex. Doe" id="last name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
                <h6 style="margin-left: 10px">Birth Date</h6>
                <div class="input-field col s4">
                    <select id="Day">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <label for="Day">Date</label>
                </div>
                <div class="input-field col s4">
                    <select id="Month">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <label for="Month">Month</label>
                </div>
                <div class="input-field col s4">
                    <select id="Year">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <label for="Year">Year</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="ex. 081-234-5678" id="phone number" type="text" class="validate">
                    <label for="phonne number">Phone Number</label>
                </div>
            </div>
            <a class="waves-effect waves-light btn"><i class="material-icons left">save</i>Save</a>
        </form>
    </div>
</div>    
<script>
    $(document).ready(function () {
        $('select').material_select();
    });
</script>
<?php
include "footer.php";
?>