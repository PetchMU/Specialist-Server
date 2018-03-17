<?php
include "header.php";
?>

<div class="container">
    
    <p>
        <?=$flash_message?>
    </p>

    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <?php include 'admin_console/send_msg.php';?>
        </li>
        
        
        
        
        
        <!---->
        
        <li>
            <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    </ul>


</div>    
<?php
include "footer.php";
?>