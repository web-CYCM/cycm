<?php 
	// header("Access-Control-Allow-Origin:*")
	$type = $_REQUEST['type'];
	$str = '';
	if ($type == 'strategyList') {  			//战略合作企业列表
		$str = file_get_contents('cooperate.json');
	}elseif ($type == 'newsList') {				//宸熠资讯列表页数据
		$pageIndex = $_REQUEST['pageIndex'];	//页数，从1开始
		$pageSize = $_REQUEST['pageSize'];		//一页展示多少条，
		$str = file_get_contents('newsList.json?pageIndex='.$pageIndex.'&pageSize='.$pageSize);
	}elseif ($type == 'setList') {
		$occasion_id = $_REQUEST['occasion_id'];	//菜单id，参照A_set_menu中的值
		$pageIndex = $_REQUEST['pageIndex'];		//页数，从1开始
		$str = file_get_contents('http://api.shangtianapp.com/api/v1/Topic/getHomeList?occasion_id='.$occasion_id.'&page='.$pageIndex);
	}elseif ($type == 'getCode') {		//获取验证码
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