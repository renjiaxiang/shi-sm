<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
if ($operation == 'display') {
    $list = pdo_getall('lbsh_dyj', array('uniacid' => $_W['uniacid']));
} elseif ($operation == 'post') {
    $list = pdo_get('lbsh_dyj', array('id' => $_GPC['id']));
    if (checksubmit('submit')) {
        $data['name'] = $_GPC['name'];
        $data['dyj_title'] = $_GPC['dyj_title'];
        $data['dyj_id'] = $_GPC['dyj_id'];
        $data['dyj_key'] = $_GPC['dyj_key'];
        $data['type'] = $_GPC['type'];
        $data['mid'] = $_GPC['mid'];
        $data['token'] = $_GPC['token2'];
        $data['api'] = $_GPC['api'];
        $data['uniacid'] = $_W['uniacid'];
        // $data['location']=$_GPC['location'];
        $data['state'] = $_GPC['state'];
        $data['yy_id'] = $_GPC['yy_id'];
        // $data['num']=$_GPC['num'];
        $data['store_id'] = $storeid;
        $data['fezh'] = $_GPC['fezh'];
        $data['fe_ukey'] = $_GPC['fe_ukey'];
        $data['fe_dycode'] = $_GPC['fe_dycode'];
        if (empty($_GPC['orderby'])) {
            $data['orderby'] = 99;
        }
        if ($_GPC['id'] == '') {
            $data['uniacid'] = $_W['uniacid'];
            $res = pdo_insert('lbsh_dyj', $data);
            if ($res) {
                message('添加成功', $this->createWebUrl('dyj', array()), 'success');
            } else {
                message('添加失败', '', 'error');
            }
        } else {
            // print_r($data);die;
            $res = pdo_update('lbsh_dyj', $data, array('id' => $_GPC['id']));
            if ($res) {
                message('编辑成功', $this->createWebUrl('dyj', array()), 'success');
            } else {
                message('编辑失败', '', 'error');
            }
        }
    }
} elseif ($operation == 'delete') {
    $id = $_GPC['id'];
    $result = pdo_delete('lbsh_dyj', array('id' => $id));
    if ($result) {
        message('删除成功', $this->createWebUrl('dyj', array()), 'success');
    } else {
        message('删除失败', '', 'error');
    }
} elseif ($operation == 'xuan') {
    $id = $_GPC['id'];
    $state = $_GPC['state'];
    $result = pdo_update('lbsh_dyj', array('state' => $state), array('id' => $id));
    if ($result) {
        message('成功', $this->createWebUrl('dyj', array()), 'success');
    } else {
        message('失败', '', 'error');
    }
} elseif ($operation == 'buxuan') {
    $id = $_GPC['id'];
    $state = $_GPC['state'];
    $result = pdo_update('lbsh_dyj', array('state' => $state), array('id' => $id));
    if ($result) {
        message('成功', $this->createWebUrl('dyj', array()), 'success');
    } else {
        message('失败', '', 'error');
    }
}
include $this->template('web/dyj');
