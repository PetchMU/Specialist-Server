<?php
include "header.php";
?>
<style>
    .chat-box .box{
        display:inline-block;
        border-radius: 15px;
        max-width: 75%;
        padding: 5px 8px;
        margin: 5px 0 ;
    }
    .chat-box .time{
        font-size: 8px;
        color: #ccc;
        font-style: italic;
    }
    .chat-box-me{
        text-align: right;
    }
    .chat-box-me .box{
        color: #fff;
        border: 1px solid #1879ce;
        background: #1879ce;
    }
    .chat-box-friend{
        text-align: left;
    }
    .chat-box-friend .box{
        border: 1px solid #eee;
        background: #eee;
    }
    .chat-box-input{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        margin: 0;
        padding: 10px 10px 0;
        background: #fff;
        box-shadow: 0 0 30px #aaa;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col s12">
            <span style="font-size: 20px; display: block; text-align: center;">hello</span>
        </div>
    </div>
    <div class="row" style="padding-bottom: 200px;">
        <div class="col s12">
            <ul>
                <?php foreach ($chatInfo as $line): ?>
                    <li class="chat-box <?= userInfo('uid') == $line['uid'] ? 'chat-box-me' : 'chat-box-friend' ?>">
                        <div class="box">
                            <?= $line['message'] ?>
                        </div>
                        <div class="time">
                            <?= date("j M y, H:i:s", strtotime($line['chat_datetime'])) ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <form method="POST">
        <div class="chat-box-input">
            <div class="row" style="margin-bottom: 0;">
                <div class="col s9">
                    <div class="input-field">
                        <input placeholder="say something!" id="first_name" type="text" class="validate" name="new_message">
                        <label for="first_name">Message</label>
                    </div>
                </div>
                <div class="col s3">
                    <button type="submit" class="waves-effect waves-light btn-large brown lighten-1" style="width:82px;"><i class="material-icons right">send</i></button>
                </div>
            </div>
        </div>
    </form>

</div>    
<script>
    $(function () {
        $("html, body").scrollTop($(document).height());
    });
</script>
<?php
include "footer.php";
?>