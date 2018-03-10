<?php
include "header.php";
?>

<div class="container">
    
    <p>
        <?=$flash_message?>
    </p>

    <ul class="collapsible" data-collapsible="accordion">
        <li>
            
            <!--post to every group-->
            
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Send message to all group</div>
            <div class="collapsible-body">
                <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
                <form method="post" action="/admin/console/add_notice_to_all_group">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input name='topic' value="" id="first_name2" type="text" class="validate">
                                <label class="active" for="first_name2">topic</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12">
                                <textarea name='message' id="content"></textarea>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div> 
                </form>


                <script>
                    CKEDITOR.replace('content');
                    for (var i in CKEDITOR.instances) {

                        CKEDITOR.instances[i].on('change', function () {
                            CKEDITOR.instances[i].updateElement()
                        });

                    }
                </script>
            </div>
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