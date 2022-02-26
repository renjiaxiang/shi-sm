<?php
/**
 * 红包相关的帮助类
 */

namespace app\Help\Red;


use app\Help\BaseHelp;

require_once IA_ROOT . '/addons/jy_lbsh/Help/BaseHelp.php';

class RedHelp extends BaseHelp
{
    /**
     * 检查安慰奖，是否微信打款到零钱
     * @param $money
     * @return bool
     */
    public function checkAnweiWxPay($money)
    {
        $pingset = $this->common->getPingsetCache();
        if ($pingset['red_give_mode'] == 2 && $money >= $pingset['red_min_money']) {
            return true;
        }
        return false;
    }
}