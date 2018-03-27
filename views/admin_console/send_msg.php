

<!--post to every group-->

<div class="collapsible-header"><i class="material-icons">message</i>Send message to all group</div>
<div class="collapsible-body">
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <form method="post" action="/admin/console/add_notice_to_all_group">
        <div class="row">
            <div class="col s12 m8">
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
            </div>
            <div class="col s12 m4">

                <h4>Group Lists</h4>
                <button id="select_all">Select All</button>
                <button id="discard_all">Discard All</button>
                <hr>
                <?php 
                    function renderAllGroup($all_group){
                        echo '<ol>';
                        foreach($all_group as $group){
                            echo '<li>';
                            echo '<input type="checkbox" class="filled-in check_group" id="g-'.$group['gid'].'" checked="checked" name="selected_group[]" value="'.$group[gid].'"/>';
                            echo '<label for="g-'.$group['gid'].'">'.$group['name'].'</label>';
                            if(!empty($group['sub'])){
                                renderAllGroup($group['sub']);
                            }
                            echo '</li>';
                        }
                        echo '</ol>';
                    }
                    
                    renderAllGroup($all_group);
                ?>
                
                <script>
                    $('.check_group').click(function(){
                        var root = $(this)
                        var c= root.prop('checked')
                        root.siblings('ol').find('input.check_group').prop('checked',c)
                    })
                    $('#select_all').click(function(e){
                        e.preventDefault()
                        $('.check_group').prop('checked',true)
                    })
                    $('#discard_all').click(function(e){
                        e.preventDefault()
                        $('.check_group').prop('checked',false)
                    })
                </script>
                <style>
                    ol{
                        list-style: none;
                    }
                </style>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
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