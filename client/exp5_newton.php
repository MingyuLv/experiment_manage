<?php
	//客户端接口

	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);
	$db->query('set names utf8');		//防止查询数据库乱码

	$result = $db->query("SELECT `status` FROM `physics_status` WHERE `name`='newton'");
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
		// var_dump($group_num);
		// var_dump($stu_num);
		// var_dump($stu_name);
		$sql = "UPDATE `physics_course_newton` SET `stu_num`='{$stu_num}', `stu_name`='{$stu_name}' WHERE `group_num`='{$group_num}'";	
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

	}else if( isset($_GET['action']) && $_GET['action']=='submit'){
	//接收上传的实验数据
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT * FROM `physics_course_newton` WHERE `group_num`={$group_num}");
		$result = $result->fetch_assoc();

		$E_R = sprintf("%.2f",abs($_GET['radius_commit']-$result['radius'])/$result['radius']*100)."%";


		$result = $db -> query("UPDATE `physics_course_newton` SET `evaluation`=1,`status_1`=2,`radius_commit`='{$_GET['radius_commit']}',`E_R`='$E_R',`L6`='{$_GET['L6']}',`L7`='{$_GET['L7']}',`L8`='{$_GET['L8']}',`L9`='{$_GET['L9']}',`L10`='{$_GET['L10']}',`L11`='{$_GET['L11']}',`L12`='{$_GET['L12']}',`L13`='{$_GET['L13']}',`L14`='{$_GET['L14']}',`L15`='{$_GET['L15']}',`R6`='{$_GET['R6']}',`R7`='{$_GET['R7']}',`R8`='{$_GET['R8']}',`R9`='{$_GET['R9']}',`R10`='{$_GET['R10']}',`R11`='{$_GET['R11']}',`R12`='{$_GET['R12']}',`R13`='{$_GET['R13']}',`R14`='{$_GET['R14']}',`R15`='{$_GET['R15']}',`d6`='{$_GET['d6']}',`d7`='{$_GET['d7']}',`d8`='{$_GET['d8']}',`d9`='{$_GET['d9']}',`d10`='{$_GET['d10']}',`d11`='{$_GET['d11']}',`d12`='{$_GET['d12']}',`d13`='{$_GET['d13']}',`d14`='{$_GET['d14']}',`d15`='{$_GET['d15']}',`q6`='{$_GET['q6']}',`q7`='{$_GET['q7']}',`q8`='{$_GET['q8']}',`q9`='{$_GET['q9']}',`q10`='{$_GET['q10']}',`q11`='{$_GET['q11']}',`q12`='{$_GET['q12']}',`q13`='{$_GET['q13']}',`q14`='{$_GET['q14']}',`q15`='{$_GET['q15']}',`remark`=''  WHERE `group_num`={$group_num}");
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

	}else if( isset($_GET['action']) && $_GET['action']=='check_info'){
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT `status_1` FROM `physics_course_newton` WHERE `group_num`={$group_num}");
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

	}
