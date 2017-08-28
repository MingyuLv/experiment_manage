<?php
	//客户端接口

	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);
	$db->query('set names utf8');		//防止查询数据库乱码

	$result = $db->query("SELECT `status` FROM `physics_status` WHERE `name`='spectrometer'");
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
		$sql = "UPDATE `physics_course_spectrometer` SET `stu_num`='{$stu_num}', `stu_name`='{$stu_name}' WHERE `group_num`='{$group_num}'";	
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
		$result = $db -> query("SELECT * FROM `physics_course_spectrometer` WHERE `group_num`={$group_num}");
		$result = $result->fetch_assoc();

		$E_yellow_inside = sprintf("%.2f",abs( ($_GET['lambda_yellow_inside']-$result['lambda_2'])/$result['lambda_2']*100))."%";
		$E_yellow_outside = sprintf("%.2f",abs( ($_GET['lambda_yellow_outside']-$result['lambda_3'])/$result['lambda_3']*100))."%";
		$D_color_theoretical = ($result['yellow_outside_angle'] - $result['yellow_inside_angle'])/( $result['lambda_3'] - $result['lambda_2']);

		$result = $db -> query("UPDATE `physics_course_spectrometer` SET `evaluation`=1,`status_1`=2,`green_1`='{$_GET['green_1']}',`green_2`='{$_GET['green_2']}',`green_3`='{$_GET['green_3']}',`green_4`='{$_GET['green_4']}',`green_angle`='{$_GET['green_angle']}',`yellow_inside_1`='{$_GET['yellow_inside_1']}',`yellow_inside_2`='{$_GET['yellow_inside_2']}',`yellow_inside_3`='{$_GET['yellow_inside_3']}',`yellow_inside_4`='{$_GET['yellow_inside_4']}',`yellow_inside_angle`='{$_GET['yellow_inside_angle']}',`yellow_outside_1`='{$_GET['yellow_outside_1']}',`yellow_outside_2`='{$_GET['yellow_outside_2']}',`yellow_outside_3`='{$_GET['yellow_outside_3']}',`yellow_outside_4`='{$_GET['yellow_outside_4']}',`yellow_outside_angle`='{$_GET['yellow_outside_angle']}',`d`='{$_GET['d']}',`lambda_yellow_inside`='{$_GET['lambda_yellow_inside']}',`E_yellow_inside`='$E_yellow_inside',`E_yellow_outside`='$E_yellow_outside',`lambda_yellow_outside`='{$_GET['lambda_yellow_outside']}',`D_color`='{$_GET['D_color']}',`D_color_theoretical`='$D_color_theoretical',`remark`=''  WHERE `group_num`={$group_num}");
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
		$result = $db -> query("SELECT `status_1` FROM `physics_course_spectrometer` WHERE `group_num`={$group_num}");
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
