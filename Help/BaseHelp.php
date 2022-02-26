<?php
/**
 * 公共的帮助类
 */


namespace app\Help;

use app\common\BaseCommon;

require_once IA_ROOT . '/addons/jy_lbsh/common/BaseCommon.php';

class BaseHelp
{
    protected $common;

    /**
     * BaseHelp constructor.
     */
    public function __construct()
    {
        $this->common = $this->common();
    }

    /**
     * 返回公共方法
     * @return BaseCommon
     */
    public function common()
    {
        $common = new BaseCommon();
        return $common;
    }
}