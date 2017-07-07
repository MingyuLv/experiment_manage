<?php
	//客户端接口

	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);

	$result = $db->query("SELECT `status` FROM `physics_status` WHERE `name`='oscillograph'");
	$result = $result->fetch_assoc();
	if( $result['status']==0){
		$arr = array(
			'status' => '0',
			'msg' => '课堂未开放或者已终止'
		);
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) );
    	exit; 
	}

	if( isset($_GET['action']) && $_GET['action']=='connect'){
	//测试连接
		$arr = array(
			'status' => '1',
			'msg' => '连接成功'
		);
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 

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
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 

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
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 

	}else if( isset($_GET['action']) && $_GET['action']=='submit_1'){
	//接收上传的实验数据
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT `v_std`,`f_std` FROM `physics_course_oscillograph` WHERE `group_num`={$group_num}");		//获取老师输入的实验预期值
		$data = $result -> fetch_assoc();
		//var_dump($data);
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

		$result = $db -> query("UPDATE `physics_course_oscillograph` SET `evaluation`=1,`status_1`=2,`v_up`='$v_up',`f_up`='$f_up',`E_v`='$E_v',`E_f`='$E_f',`V_DIV`='$V_DIV',`Dy`='$Dy',`TIME_DIV`='$TIME_DIV',`n`='$n',`Dx`='$Dx',`T`='$T'  WHERE `group_num`={$group_num}");
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
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 
	}else if( isset($_GET['action']) && $_GET['action']=='submit_2'){

		$group_num = $_GET['group_num'];

		$Nx1 = $_GET['Nx1'];
		$Nx2 = $_GET['Nx2'];
		$Nx3 = $_GET['Nx3'];
		$Nx4 = $_GET['Nx4'];
		$Ny1 = $_GET['Ny1'];
		$Ny2 = $_GET['Ny2'];
		$Ny3 = $_GET['Ny3'];
		$Ny4 = $_GET['Ny4'];
		$fy1 = $_GET['fy1'];
		$fy2 = $_GET['fy2'];
		$fy3 = $_GET['fy3'];
		$fy4 = $_GET['fy4'];

		$result = $db -> query("UPDATE `physics_course_oscillograph` SET `evaluation`=1,`status_2`='2',`Nx1`='$Nx1',`Nx2`='$Nx2',`Nx3`='$Nx3',`Nx4`='$Nx4',`Ny1`='$Ny1',`Ny2`='$Ny2',`Ny3`='$Ny3',`Ny4`='$Ny4',`fy1`='$fy1',`fy2`='$fy2',`fy3`='$fy3',`fy4`='$fy4'  WHERE `group_num`={$group_num}");
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
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 

	}else if( isset($_GET['action']) && $_GET['action']=='check_info_1'){
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT `status_1` FROM `physics_course_oscillograph` WHERE `group_num`={$group_num}");
		$result = $result->fetch_assoc();
		if($result['status_1']=='1'){
			$arr = array(
				'status' => '1',
				'msg' => '审核通过'
			);
		}else if($result['status_1']=='2'){
			$arr = array(
				'status' => '0',
				'msg' => '审核中'
			);
		}else{
			$arr = array(
				'status' => '0',
				'msg' => '未通过'
			);
		}
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 

	}else if( isset($_GET['action']) && $_GET['action']=='check_info_2'){
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT `status_2` FROM `physics_course_oscillograph` WHERE `group_num`={$group_num}");
		$result = $result->fetch_assoc();
		if($result['status_2']=='1'){
			$arr = array(
				'status' => '1',
				'msg' => '审核通过'
			);
		}else if($result['status_2']=='2'){
			$arr = array(
				'status' => '0',
				'msg' => '审核中'
			);
		}else{
			$arr = array(
				'status' => '0',
				'msg' => '未通过'
			);
		}
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 
	}
