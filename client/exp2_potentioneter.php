<?php
	//客户端接口
	//电位差计
	header("Content-Type:text/html; Charset=utf-8");
	
	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);

	
	$result = $db->query("SELECT `status` FROM `physics_status` WHERE `name`='potentioneter'");
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
		$sql = "UPDATE `physics_course_potentioneter` SET `stu_num`='{$stu_num}', `stu_name`='{$stu_name}' WHERE `group_num`='{$group_num}'";
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
		foreach ( $arr as $key => $value ) {  		//防止中文乱码
        	$arr[$key] = urlencode ( $value );  
    	}  
    	echo urldecode ( json_encode ($arr) ); 
	}else if( isset($_GET['action']) && $_GET['action']=='submit_1'){
	//接收上传的实验数据
		$group_num = $_GET['group_num'];

		$result = $db -> query("SELECT `E_std` FROM `physics_course_potentioneter` WHERE `group_num`={$group_num}");		//获取老师输入的实验预期值
		$data = $result -> fetch_assoc();
		//var_dump($data['E_std']);
		$E_e = abs(($_GET['E']-$data['E_std'])) / $data['E_std'];		//计算实验误差
		$E_e = ($E_e*100);	//数据库中必须为字符串形式
		$E_e = sprintf("%.2f",$E_e).'%';
		//var_dump($E_e);

		//第一次提交
		$U_ab = $_GET['U_ab'];
		$U_0 = $_GET['U_0'];
		$I_s = $_GET['I_s'];
		$Rab = $_GET['Rab'];
		$Is = $_GET['Is'];
		$U0 = $_GET['U0'];
		$Uab = $_GET['Uab'];
		$E = $_GET['E'];

		$result = $db->query("UPDATE `physics_course_potentioneter` SET `evaluation`=1,`status_1`=2,`E_e`='$E_e',`U_ab`='$U_ab',`U_0`='$U_0',`I_s`='$I_s',`Rab`='$Rab',`Is`='$Is',`U0`='$U0',`Uab`='$Uab',`E`='$E' WHERE `group_num`={$group_num}");

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
		//第二次提交
		$Lx1 = $_GET['Lx1'];
		$Lx2 = $_GET['Lx2'];
		$Lx3 = $_GET['Lx3'];
		$Lx4 = $_GET['Lx4'];
		$Lx5 = $_GET['Lx5'];
		$Lx6 = $_GET['Lx6'];
		$Lx_ave = $_GET['Lx_ave'];

		$result = $db->query("UPDATE `physics_course_potentioneter` SET `evaluation`=1,`status_2`=2,`Lx1`='$Lx1',`Lx2`='$Lx2',`Lx3`='$Lx3',`Lx4`='$Lx4',`Lx5`='$Lx5',`Lx6`='$Lx6',`Lx_ave`='$Lx_ave' WHERE `group_num`={$group_num}");

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
	}
