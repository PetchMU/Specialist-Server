<?php

include "header.php";
?>
<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<form method="post" action="/group/<?=$gid?>/addnotice">
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
        <button class="btn waves-effect waves-light brown lighten-1" type="submit" name="action">Submit
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
<?php

include "footer.php";
?>