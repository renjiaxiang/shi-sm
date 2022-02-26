<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$sql = "select a.*,b.name as gname,c.user_name from " . tablename('lbsh_feedback') . " a left join " . tablename('lbsh_gg') . " b on a.ggid=b.id left join " . tablename('lbsh_ggusers') . " c on a.ggzid=c.id where a.uniacid=" . $_W['uniacid'] . "  order by a.created_time desc ";
$list = pdo_fetchall($sql);
if ($_GPC['op'] == 'delete') {
    $res = pdo_delete('lbsh_feedback', array('id' => $_GPC['id']));
    if ($res) {
        message('删除成功！', $this->createWebUrl('feedbacks'), 'success');
    } else {
        message('删除失败！', '', 'error');
    }
} elseif ($_GPC['op'] == 'kq') {
    $haha = pdo_update('lbsh_feedback', array('state' => $_GPC['state']), array('id' => $_GPC['id']));
    if ($haha) {
        message('成功！', $this->createWebUrl('feedbacks'), 'success');
    } else {
        message('失败！', '', 'error');
    }
}
if ($_GPC['status']) {
    $data['status'] = $_GPC['status'];
    $res = pdo_update('lbsh_feedback', $data, array('id' => $_GPC['id']));
    if ($res) {
        message('编辑成功！', $this->createWebUrl('feedbacks'), 'success');
    } else {
        message('编辑失败！', '', 'error');
    }
}
include $this->template('web/feedbacks');
