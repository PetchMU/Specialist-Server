<?php
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="collection">
                <div class="collection-item"><span class="badge"><?= $total ?></span>All member in this group</div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($members as $member): ?>
            <div class="col s4 m3">
                <a href="/user/<?= $member['uid'] ?>">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $member['picture'] ?>">
                        </div>
                        <div class="card-content">
                            <span title="<?= $member['fname'] . " " . $member['lname'] ?>"><?= $member['fname'] ?></span>
                            <a href="#u-<?= $member['uid'] ?>" class='modal-trigger'><button>x</button></a>
                        </div>
                        <form>
                            <div id="u-<?= $member['uid'] ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Reject Member</h4>
                                    <p>Add reason to reject member <?= $member['fname'] . " " . $member['lname'] ?></p>
                                    <div class="input-field">
                                        <input type="text" name="reason" class="validate">
                                        <label data-error="wrong" data-success="right">Reason</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="/group/<?=$gid?>/member/<?=$member['uid']?>/reject" class="modal-action modal-close waves-effect waves-green btn-flat">close</a>
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </a>

            </div>
        <?php endforeach; ?>
    </div>
</div>  

<script>
    $(document).ready(function () {
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });
</script>


<?php
include "footer.php";
?>