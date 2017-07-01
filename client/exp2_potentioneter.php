<?php
	//客户端接口
	//电位差计
	header("Content-Type:text/html; Charset=utf-8");
	
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
		$sql = "UPDATE `physics_course_potentioneter` SET `stu_num`={$stu_num}, `stu_name`={$stu_name} WHERE `group_num`={$group_num}";
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
		$result = $db->query("SELECT `E_std` FROM `physics_course_potentioneter` WHERE `group_num`={$group_num}" );
		if( !$result){
			$arr = array(
				'status' => 0,
				'msg' => "未查询到数据"	
			);
		}else{
			$result = $result -> fetch_assoc();
			$arr = array(	
				'status' => 1,					
				'E_std' => $result['E_std'],
			);
		}
		echo(json_encode($arr));
	}else if( isset($_GET['action']) && $_GET['action']=='submit'){
	//接收上传的实验数据
		$group_num = $_GET['group_num'];

		//$result = $db -> query("SELECT `v_std`,`f_std` FROM `physics_course_potentioneter` `group_num`={$group_num}");		//获取老师输入的实验预期值
		//$data = $result -> fetch_assoc();

		//第一次提交
		$U_ab = $_GET['U_ab'];
		$U_0 = $_GET['U_0'];
		$I_s = $_GET['I_s'];
		$Rab = $_GET['Rab'];
		$Is = $_GET['Is'];
		$U0 = $_GET['U0'];
		$Uab = $_GET['Uab'];
		$E = $_GET['E'];

		//第二次提交
		$Lx1 = $_GET['Lx1'];
		$Lx2 = $_GET['Lx2'];
		$Lx3 = $_GET['Lx3'];
		$Lx4 = $_GET['Lx4'];
		$Lx5 = $_GET['Lx5'];
		$Lx6 = $_GET['Lx6'];
		$Lx_ave = $_GET['Lx_ave'];

		// $result = $db -> query("UPDATE `physics_course_oscillograph` SET `v_up`='$v_up',`f_up`='$f_up',`E_v`='$E_v',`E_f`='$E_f',`V_DIV`='$V_DIV',`Dy`='$dy',`TIME_DIV`='$TIME_DIV',`n`='$n',`Dx`='$Dx',`T`='$T'  WHERE `group_num`={$group_num}");

		$result = true;
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
