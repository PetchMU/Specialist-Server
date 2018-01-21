<?php
include "header.php";
?>

<div class="container">
    <?php if($waiting_people>0) :?>
    <div class="row">
        <div class="col s12 m12">
            <div class="collection">
                <a href="/group/<?=$gid?>/allow" class="collection-item"><span class="badge"><?=$waiting_people?></span>Some people want to join this group</a>
            </div>
        </div>
    </div>
    <?php endif ;?>
    <div class="row">
        <div class="col s12 m12">
            <div class="fixed-action-btn">
                <a href="/group/<?=$gid?>/addnotice" class="btn-floating btn-large red">
                    <i class="large material-icons">mode_edit</i>
                </a>
                <!--                <ul>
                                    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                                    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                                    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                                    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                                </ul>-->
            </div> 
        </div>

    </div>
    <div class="row">
        <div class="col s12 m12">
            <ul class="collection">
               <?php $i=1;?>
                <?php foreach ($chats as $chat): ?>
                    <li style="max-height: 105px;" class="collection-item avatar">
                        <a href="/user/<?= $chat['uid'] ?>"><img src="<?= $chat['picture'] ?>" alt="" class="circle"></a>
                        <div><a href="/user/<?= $chat['uid'] ?>"><?= $chat['fname'] . " " . $chat['lname'] ?></a> | <?= $chat['chat_datetime'] ?></div>
                        <div class="modal-trigger" data-target="modal<?=$i?>">
                            <span class="title"><?= $chat['topic'] ?></span>
                            <p><?= $chat['message'] ?></p>
                        </div>
                        <div id="modal<?=$i?>" class="modal">
                            <div class="modal-content">
                                <h4><?=$chat['topic']?></h4>
                                <p><?=$chat['message']?></p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                            </div>
                        </div>

                    </li>
                    
                <?php $i++; endforeach; ?>
            </ul>
        </div>
    </div>
    <script>
         $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    
    $('.modal-trigger').click(function(){
        //alert(123)
    })
  });
    </script>
    <?php if ($read_more): ?>
        <div class="row">
            <div class="col s12 m12">
                <a href="/group/<?= $gid ?>/readmore" class="waves-effect waves-light btn">read more...</a>
                <a href="/group/<?= $gid ?>/member" class="waves-effect waves-light btn">member</a>
            </div>
        </div> 
    <?php endif; ?>  
    <br/>
</div>
<?php
include "footer.php";
?>