<?php
	session_start();
	//作为防止恶意调用公共文件的标记
	define('exp',true);

	require dirname(__FILE__).'/function/common.php';
	require dirname(__FILE__).'/function/global.func.php';


	if( isset($_GET['action']) && $_GET['action']=='login'){
		$result = check_login($_POST['user_name'],$_POST['password']);
		if( !empty($result)){
			//验证通过
			$_SESSION['level'] = $result['level'];
			$_SESSION['user_name'] = $result['name'];
			_location(null,'./templates/default/index.php');

		}else{
			_alert_back('用户名或密码错误，忘记密码可联系管理员');
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>物理实验室管理--登录</title>
	<style type="text/css">
		.login{
			position: relative;
			margin:0 auto;
			margin-top:200px;
			width:400px;
			height: 300px;
			background: #e2ece1;
			border: 1px solid #fff;
			border-radius: 5px;
		}
		.login_board{
			display: block;
			margin:0 auto;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class='login'>
		<form action='./login.php?action=login' method='POST' class='login_board'>
			用户名：<input type='text' name='user_name'><br>
			密 码： <input type='password' name='password'><br>
			<input type='submit' value='提交' >
		</form>
	</div>
</body>
</html>