<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <form method="POST" class="col s12 m12">
            <div class="input-field col s12">
                <input placeholder="My Group" id="group_name" name="group_name" type="text" class="validate" value="<?=$group['name']?>">
                <label for="group_name">Group Name</label>

            </div>
            <div class="input-field col s12">
                <input placeholder="Description" id="group_name" name="Description" type="text" class="validate" value="<?=$group['description']?>">
                <label for="Description">Description</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">
                save
                <i class="material-icons left">account_box</i>
            </button>
        </form>
    </div>
</div>    
<?php
include "footer.php";
?>