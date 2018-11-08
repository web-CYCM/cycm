<?php 
	$type = $_REQUEST['type'];
	$str = '';
	if ($type == 'strategyList') {  //战略合作
		$str = file_get_contents('cooperate.json');
	}elseif ($type == 'homeMore') {//首页上拉加载
		$pageIndex = $_REQUEST['pageIndex'];//页数，从1开始
		$str = file_get_contents('http://api.shangtianapp.com/api/v1/homelist?page='.$pageIndex);
	}elseif ($type == "planeClass") {	//主页产品和服务：视频类
		$str = file_get_contents('planeClass.json');
	}elseif ($type == 'setList') {//获取一套-产品列表
		$occasion_id = $_REQUEST['occasion_id'];//菜单id，参照A_set_menu中的值
		$pageIndex = $_REQUEST['pageIndex'];//页数，从1开始
		$str = file_get_contents('http://api.shangtianapp.com/api/v1/Topic/getHomeList?occasion_id='.$occasion_id.'&page='.$pageIndex);
	}elseif ($type == 'getCode') {//获取验证码
		$mobile = $_REQUEST['mobile'];
		$opts = array (
			'http' => array (
			'method' => 'POST',
			'header'=> "Content-type: application/x-www-form-urlencoded"
			)
		);
		@$context = stream_context_create($opts);
		$str = file_get_contents('http://api.shangtianapp.com/api/v1/user/request_smg_code?mobile='.$mobile, false, $context);
	}elseif ($type == 'regist') {//注册
		$mobile = $_REQUEST['mobile'];
		$smg_code = $_REQUEST['smg_code'];//短信验证码
		$pwd = $_REQUEST['pwd'];
		$opts = array (
			'http' => array (
			'method' => 'POST',
			'header'=> "Content-type: application/x-www-form-urlencoded"
			)
		);
		@$context = stream_context_create($opts);
		$str = file_get_contents('http://api.shangtianapp.com/api/v1/user/register?mobile='.$mobile.'&smg_code='.$smg_code.'&user_pass='.$pwd, false, $context);
	}elseif ($type == 'login') {
		$mobile = $_REQUEST['mobile'];
		$pwd = $_REQUEST['pwd'];
		$opts = array (
			'http' => array (
			'method' => 'POST',
			'header'=> "Content-type: application/x-www-form-urlencoded"
			)
		);
		@$context = stream_context_create($opts);
		$str = file_get_contents('http://api.shangtianapp.com/api/v1/user/login?mobile='.$mobile.'&user_pass='.$pwd, false, $context);
	}
	echo "$str";
?>