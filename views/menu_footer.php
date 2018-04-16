<style>
    .my-footer{
        position: fixed; 
        bottom: 0px;
        background: #fafafa;
        border-top: 1px solid #eee;
        z-index: 100;
    }
    .my-footer td{
        padding: 0px;
        text-align: center;
        position: relative;
        border-left: 1px solid #fff;
        border-right: 1px solid #eee;
        width: 30%;
    }
    .my-footer .menu-text{
        font-size: 8px;
        margin-top: -10px;
    }
    .my-footer a{
        display: block;
    }
</style>
<table class="my-footer">
    <tbody>
        <tr>
            <td> 
                <a href="/home">
                    <i class="small material-icons indigo-text brown-text">home</i>
                    <div class="menu-text indigo-text brown-text">Home</div>
                </a>
            </td>
            <td>
                <a href="/group">
                    <i class="small material-icons  indigo-text brown-text">group</i>
                    <div class="menu-text indigo-text brown-text">Group</div>
                </a>
            </td>
            <td> 
                <a href="/notification">
                    <?php if ($has_notify): ?>
                        <i class="small material-icons red-text">notifications_active</i>
                        <div class="menu-text red-text">Notification(<?=$notify_count?>)</div>
                    <?php else: ?>
                        <i class="small material-icons indigo-text brown-text">notifications</i>
                        <div class="menu-text indigo-text brown-text">Notification</div>
                    <?php endif; ?>
                </a>
            </td>
        </tr>
    </tbody>
</table>