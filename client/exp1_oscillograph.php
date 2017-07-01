<?php
	//客户端接口

	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);

	if( isset($_GET['action']) && $_GET['action']=='connect'){
	//测试连接
		$arr = array(
			'status' => '0',
			'msg' => '连接成功'
		);
		echo(json_encode($arr));
	}else if( isset($_GET['action']) && $_GET['action']=='login'){
	//接收学生信息	
		$group_num = $_GET['group_num'];
		$stu_num =  $_GET['stu_num'];
		$stu_name = $_GET['stu_name'];
		$sql = "UPDATE `physics_course_oscillograph` SET `stu_num`={$stu_num}, `stu_name`={$stu_name} WHERE `group_num`={$group_num}";
		$result = $db->query($sql);
		if(!$result) {
			$arr = array( 
				'status'=>'0',
				'msg'=>'登陆失败'
			);
		}else{
			$arr = array( 
				'status'=>'1',
				'msg'=>'登陆成功'
			);
		}
		echo (json_encode($arr));

	}else if( isset($_GET['action']) && $_GET['action']=='require_data'){	
	//根据组号返回请求的实验设备预设值

		//获取老师输入的实验预期值
		$group_num = $_GET['group_num'];
		$result = $db->query("SELECT `v_std` , `f_std` FROM `physics_course_oscillograph` WHERE `group_num`={$group_num}" );
		if( !$result){
			$arr = array(
				'status' => 0,
				'msg' => "未查询到数据"	
			);
		}else{
			$result = $result -> fetch_assoc();
			$arr = array(	
				'status' => 1,					
				'v_std' => $result['v_std'],
				'f_std' => $result['f_std']
			);
		}
		echo(json_encode($arr));
	}else if( isset($_GET['action']) && $_GET['action']=='submit'){
	//接收上传的实验数据
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT `v_std`,`f_std` FROM `physics_course_oscillograph` `group_num`={$group_num}");		//获取老师输入的实验预期值
		$data = $result -> fetch_assoc();
		$E_v = abs(($_GET['v'] - $data['v_std'])) / $data['v_std'];	//计算实验误差
		$E_f = abs(($_GET['f'] - $data['f_std'])) / $data['f_std'];

		$E_v = (string)($E_v*100).'%';	//数据库中必须为字符串形式
		$E_f = (string)($E_f*100).'%';
		$v_up = $_GET['v'];
		$f_up = $_GET['f'];
		$V_DIV = $_GET['V_DIV'];
		$Dy = $_GET['Dy'];
		$TIME_DIV = $_GET['TIME_DIV'];
		$n = $_GET['n'];
		$Dx = $_GET['Dx'];
		$T = $_GET['T'];

		$result = $db -> query("UPDATE `physics_course_oscillograph` SET `v_up`='$v_up',`f_up`='$f_up',`E_v`='$E_v',`E_f`='$E_f',`V_DIV`='$V_DIV',`Dy`='$dy',`TIME_DIV`='$TIME_DIV',`n`='$n',`Dx`='$Dx',`T`='$T'  WHERE `group_num`={$group_num}");
		if( !$result){
			$arr = array(
				'status' => '0',
				'msg' => '提交失败'
			);
		}else{
			$arr = array(
				'status' => '1',
				'msg' => '提交成功'
			);
		}
		echo (json_encode($arr));
	}
