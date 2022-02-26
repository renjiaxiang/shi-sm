<?php


namespace app\Help\User;


use app\Help\BaseHelp;

require_once IA_ROOT . '/addons/jy_lbsh/Help/BaseHelp.php';

class UserHelp extends BaseHelp
{
    /**
     * 获取用户信息
     * @param $uid
     * @return bool
     */
    public function getInfo($uid)
    {
        $info = pdo_get('lbsh_user', array('id' => $uid, 'uniacid' => $this->common->getUniacid()));
        return $info;
    }
}