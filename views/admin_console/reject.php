<div class="collapsible-header"><i class="material-icons">sms_failed</i>rejection</div>
<div class="collapsible-body">

    <table>
        <thead>
            <tr>
                <th>คนส่งเรื่อง</th>
                <th>คนถูกไล่</th>
                <th>กลุ่มไหน</th>
                <th>เวลาา</th>
                <th>เหตุผล</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($waitinglist as $req): ?>
                <?php
                $rejector = $user_model->getUserInfoById($req['uid_rejector']);
                $rejected = $user_model->getUserInfoById($req['uid_rejected']);
                $group = $group_model->get($req['gid']);
                ?>
                <tr>
                    <td><a href="/user/<?= $rejector['uid'] ?>"><?= $rejector['fname'] . ' ' . $rejector['lname'] ?></a></td>
                    <td><a href="/user/<?= $rejected['uid'] ?>"><?= $rejected['fname'] . ' ' . $rejected['lname'] ?></a></td>
                    <td><a href="/group/<?= $group['gid'] ?>"><?= $group['name'] ?></a></td>
                    <td><?= $req['request_datetime'] ?></td>
                    <td><?= $req['reason'] ?></td>
                    <td>
                        <form method="POST" action="/admin/console/submit_reject">
                            <input type="submit" style="background: #F66" value="reject">
                            <input type="hidden" name="rid" value="<?=$req['rid']?>"/>
                            <input type="hidden" name="reject" value="1"/>
                        </form>
                        <form method="POST" action="/admin/console/submit_reject">
                            <input type="submit" style="background: #fff" value="Not Reject">
                            <input type="hidden" name="rid" value="<?=$req['rid']?>"/>
                            <input type="hidden" name="reject" value="0"/>
                        </form>
                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
