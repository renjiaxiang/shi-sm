<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
if (strpos($_W['siteroot'], 'jiyongstore.com') !== false) {
//if (strpos($_W['siteroot'], 'jywq.cc') !== false) {
    //包含官网的域名都无法删除
    message('官网数据，无法清除数据', '', 'error');
}
if (checksubmit('clear')) {
    try {
        delDataBase($_W);
        message('删除成功', $this->createWebUrl('clear', array()), 'success');
    } catch (Exception $exception) {
        message('删除失败', '', 'error');
    }
} elseif (checksubmit('allclear')) {
    try {
        delDataAll($_W);
        message('删除成功', $this->createWebUrl('clear', array()), 'success');
    } catch (Exception $exception) {
        message('删除失败', '', 'error');
    }
}
/**
 * 删除基本数据
 * @param $_W
 * Created on 2020/10/12 17:49
 * Created by mr.wang
 */
function delDataBase($_W)
{
    $result = pdo_delete('lbsh_anwei', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_distribution', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_djgglist', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_dyj', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_earnings', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_express', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_feedback', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_formids', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_fxuser', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_gg', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_ggusers', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_gzuser', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_gzuser_views', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_gzwxapp', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_hangye', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_help', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_notice', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_hexiao', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_homeblock', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_homenav', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_lunbo', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_menu', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_mykgoods', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_mykmx', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_mykorder', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pingaddress', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pingdings', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pingorder', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pingorder_info', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pingordergoods', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_qbmx', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_redlog', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_tx', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_hexiao', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_user_fxuser', array('uniacid' => $_W['uniacid']));
}

/**
 * 删除高级数据
 * @param $_W
 * Created on 2020/10/12 17:49
 * Created by mr.wang
 */
function delDataAll($_W)
{
    delDataBase($_W);
    $result = pdo_delete('lbsh_pinggoods', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pinggoods_info', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pinggoodstype', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_pingspec', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_store', array('uniacid' => $_W['uniacid']));
    $result = pdo_delete('lbsh_user', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_gzredset', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_pingset', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_sms', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_redset', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_system', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_fxset', array('uniacid' => $_W['uniacid']));
//    $result = pdo_delete('lbsh_user_fxset', array('uniacid' => $_W['uniacid']));
}

include $this->template('web/clear');
