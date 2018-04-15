<?php
include "header.php";

function dateFormat($datetime) {
    $today = date("Y-m-d");
    if (date("Y-m-d", strtotime($datetime)) == $today) {
        return date("H:i", strtotime($datetime));
    }
    return date("d/m/Y H:i", strtotime($datetime));
}

function daydiff($a, $b = null) {
    if ($b == null) {
        $b = date("Y-m-d");
    }
    return intval((strtotime($a) - strtotime($b)) / 86400);
}

function dateCountdown($datetime) {
    $now = time();
    $to = strtotime($datetime);
    $diff = $to - $now;
    $diff_day = intval($diff / 86400);
    if ($diff < 0) {
        return '';
    }
    if ($diff_day > 1 && $diff_day <= 7) {
        return $diff_day . ' days';
    }
    if ($diff_day == 1) {
        return $diff_day . ' day';
    }
    if ($diff_day == 0) {
        return 'in ' . intval($diff / 3600) . ' hours';
    }
    return '';
}
?>

<style>
    .remind_item{
        border-left: 5px solid #fff;
    }
    .remind_item.coming{
        border-left: 5px solid #ffc107;
    }
    .remind_item.pass{
        border-left: 5px solid #ff5722;
    }
</style>

<div class="container">

    <div class="row">
        <form method="POST" action="/user/<?=$uid?>/reminder/add">
            <div class="input-field col s12"> 
                <input placeholder="ex. Meeting" id="in1" type="text" class="validate" name="topic">
                <label for="in1">Topic</label>
            </div>
            <div class="input-field col s12">
                <input placeholder="ex. Meet with John" id="in2" type="text" class="validate" name="desc">
                <label for="in2">Descriptions</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="datepicker" value="<?= date("Y-m-d") ?>" name="date">
                <label for="date">date</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="timepicker" value="<?= date("H:i:s") ?>" name="time">
                <label for="time">time</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>

    </div>

    <div class="row">
        <div class="col s12 m12">
            <?php if ($reminders) : ?>
                <div class="collection">
                    <?php foreach ($reminders as $reminder) : ?>
                        <div class="collection-item remind_item <?php
                        $d = daydiff($reminder['remind_at']);
                        if ($d < 0)
                            echo 'pass';
                        elseif ($d <= 7)
                            echo 'coming';
                        ?>">
                            <span class="right right-align" style="margin-top: 10px">
                                <a href="/user/<?=$uid?>/reminder/clear/<?=$reminder['reid']?>" onclick="return confirm('Are you sure')"><i class="material-icons grey-text text-lighten-2">delete_forever</i></a>
                            </span>
                            <h5>
                                <span class="blue-text text-darken-1"><?= $reminder['topic'] ?></span> 
                                at
                                <span class="grey-text text-lighten-2"><?= dateFormat($reminder['remind_at']) ?></span>
                            </h5>
                            <span><?= $reminder['description'] ?></span>

                            <span class="right right-align"><?= dateCountdown($reminder['remind_at']) ?></span>
                        </div>
                    <?php endforeach; ?>


                </div>
            <?php else : ?>
                <blockquote>No reminder</blockquote>
            <?php endif; ?>

        </div>
    </div>
</div>    
<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        container: 'body', // ex. 'body' will append picker to body
    });

    $('.timepicker').pickatime({
        default: 'now', // Set default time: 'now', '1:30AM', '16:30'
        fromnow: 0, // set default time to * milliseconds from now (using with default = 'now')
        twelvehour: false, // Use AM/PM or 24-hour format
        donetext: 'OK', // text for done-button
        cleartext: 'Clear', // text for clear-button
        canceltext: 'Cancel', // Text for cancel-button,
        container: 'body', // ex. 'body' will append picker to body
        autoclose: false, // automatic close timepicker
        ampmclickable: true, // make AM PM clickable
        aftershow: function () {} //Function for after opening timepicker
    });
</script>
<?php
include "footer.php";
?>