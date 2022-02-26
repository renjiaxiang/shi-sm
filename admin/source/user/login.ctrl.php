<?php
/*
ini_set('display_errors',1);            //错误信息  
ini_set('display_startup_errors',1);    //php启动错误信息  
error_reporting(-1);                    //打印出所有的 错误信息  
*/
defined('IN_IA') or exit('Access Denied');
define('IN_GW', true);
if(checksubmit() || $_W['isajax']) {
	_login($_GPC['referer']);
}

$setting = $_W['setting'];
template('user/login');
die;
function _login($forward = '') {

	global $_GPC, $_W;
	load()->model('user');
	$member = array();
	$username = trim($_GPC['username']);
//	pdo_query('DELETE FROM'.tablename('users_failed_login'). ' WHERE lastupdate < :timestamp', array(':timestamp' => TIMESTAMP-300));
//	$failed = pdo_get('users_failed_login', array('username' => $username, 'ip' => CLIENT_IP));
//	if ($failed['count'] >= 5) {
//		message('输入密码错误次数超过5次，请在5分钟后再登录',referer(), 'info');
//	}
//	$verify = trim($_GPC['verify']);
//	if(empty($verify)) {
//		message('请输入验证码');
//	}
//	$result = checkcaptcha($verify);
//	if (empty($result)) {
//		message('输入验证码错误');
//	}
	if(empty($username)) {
		message('请输入要登录的用户名');
	}

	$account = pdo_fetch("SELECT * FROM " . tablename("lbsh_account") . " WHERE status=2 AND username=:username ORDER BY id DESC LIMIT 1", array(':username' => $username));
	if (!empty($account)) {
		$sign=$_GPC['password'].$account['salt'];
		// echo $sign;
		if(md5($sign)!=$account['password']){
			message('登录失败，请检查您的账号密码是否正确!');
		}
		$jystoreid = $account['storeid'];
		$_W['uniacid'] = $account['weid'];
	} else {
		message('您的账号正在审核或是已经被系统禁止，请联系网站管理员解决！');
	}

	$sysaccount=pdo_get('lbsh_account',array('storeid'=>0,'weid'=>$_W['uniacid']));
	if(!$sysaccount){
		message('“系统账号”还未设置！');
	}else{
		$member['username'] = $sysaccount['username'];
		$member['password'] = $sysaccount['password'];
		if(empty($member['password'])) {
			message('“系统账号”的密码未设置');
		}
	}
	$record = user_single($member);

	if(!empty($record)) {
		if($record['status'] == 1) {
			message('“系统账号”正在审核或是已经被系统禁止，请联系网站管理员解决！');
		}

		$founders = explode(',', $_W['config']['setting']['founder']);
		$_W['isfounder'] = in_array($record['uid'], $founders);
		if (empty($_W['isfounder'])) {
			if (!empty($record['endtime']) && $record['endtime'] < TIMESTAMP) {
				message('“系统账号”有效期限已过，请联系网站管理员解决！');
			}
		}
		if (!empty($_W['siteclose']) && empty($_W['isfounder'])) {
			message('站点已关闭，关闭原因：' . $_W['setting']['copyright']['reason']);
		}
		$cookie = array();
		$cookie['uid'] = $record['uid'];
		$cookie['lastvisit'] = $record['lastvisit'];
		$cookie['lastip'] = $record['lastip'];
		$cookie['hash'] = md5($record['password'] . $record['salt']);
		$session = base64_encode(json_encode($cookie));
		isetcookie('__session', $session, !empty($_GPC['rember']) ? 7 * 86400 : 0, true);
		$status = array();
		$status['uid'] = $record['uid'];
		$status['lastvisit'] = TIMESTAMP;
		$status['lastip'] = CLIENT_IP;
		user_update($status);

		$role = uni_permission($record['uid'], $_W['uniacid']);
		isetcookie('__jystoreid', $jystoreid, 7 * 86400);
		isetcookie('__uniacid', $_W['uniacid'], 7 * 86400);
		isetcookie('__uid', $record['uid'], 7 * 86400);
		isetcookie('__user_type','jystore');

		if($_W['role'] == 'clerk' || $role == 'clerk') {
//				message('登陆成功', url('activity/desk', array('uniacid' => $record['uniacid'])), 'success');
//			message("欢迎回来！，{$record['username']}！", url('site/entry/stores', array('m' => 'wpdc', 'jystoreid' => $jystoreid, 'do' => 'start')), 'success');
		}

//		if(empty($forward)) {
//			$forward = $_GPC['forward'];
//		}
//		if(empty($forward)) {
//			$forward = './index.php?c=account&a=display';
//		}
//		if ($record['uid'] != $_GPC['__uid']) {
//			isetcookie('__uniacid', '', -7 * 86400);
//			isetcookie('__uid', '', -7 * 86400);
//		}
//		pdo_delete('users_failed_login', array('id' => $failed['id']));
//		message("欢迎回来，{$record['username']}。", $forward);

		$data = array(
			'lastvisit' => TIMESTAMP,
			'lastip' => CLIENT_IP,
		);
		pdo_update("lbsh_account", $data, array('id' => $record['id']));

		message("欢迎回来，{$account['username']}！", url('site/entry/openlogin', array('m' => 'jy_lbsh', 'jystoreid' => $jystoreid)), 'success');
	} else {
		if (empty($failed)) {
			pdo_insert('users_failed_login', array('ip' => CLIENT_IP, 'username' => $username, 'count' => '1', 'lastupdate' => TIMESTAMP));
		} else {
			pdo_update('users_failed_login', array('count' => $failed['count'] + 1, 'lastupdate' => TIMESTAMP), array('id' => $failed['id']));
		}
		message('登录失败，“系统账号”还未设置！');
	}
}