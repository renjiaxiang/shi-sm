<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list = pdo_getall('lbsh_express', array('uniacid' => $_W['uniacid']), array(), '', 'sort ASC');
if ($_GPC['id']) {
    $res = pdo_delete('lbsh_express', array('id' => $_GPC['id']));
    if ($res) {
        $keys = 'express' . $_W['uniacid'] . 'all';
        $key_arr = array('uniacid' => $_W['uniacid']);
        if ($key_arr) {
            $keys = $keys . md5(json_encode($key_arr)) . md5(json_encode(array('sort asc')));
        }
        cache_delete($keys);
        message('删除成功', $this->createWebUrl('express', array()), 'success');
    } else {
        message('删除失败', '', 'error');
    }
}
include $this->template('web/express');
