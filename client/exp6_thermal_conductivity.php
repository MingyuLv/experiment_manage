<?php
	//客户端接口

	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);

	$result = $db->query("SELECT `status` FROM `physics_status` WHERE `name`='thermal_conductivity'");
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
		$sql = "UPDATE `physics_course_thermal_conductivity` SET `stu_num`='{$stu_num}', `stu_name`='{$stu_name}' WHERE `group_num`='{$group_num}'";	
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

	
	}else if( isset($_GET['action']) && $_GET['action']=='submit_1'){
	//接收上传的实验数据
		$group_num = $_GET['group_num'];
		$result = $db -> query("SELECT * FROM `physics_course_thermal_conductivity` WHERE `group_num`={$group_num}");		//获取老师输入的实验预期值
		$data = $result -> fetch_assoc();
		

		$result = $db -> query("UPDATE `physics_course_thermal_conductivity` SET `evaluation`=1,`status_1`=2,`T_1`='{$_GET['T_1']}',`T_2`='{$_GET['T_2']}',`t1`='{$_GET['t1']}',`t2`='{$_GET['t2']}',`t3`='{$_GET['t3']}',`t4`='{$_GET['t4']}',`t5`='{$_GET['t5']}',`t6`='{$_GET['t6']}',`t7`='{$_GET['t7']}',`t8`='{$_GET['t8']}',`t9`='{$_GET['t9']}',`t10`='{$_GET['t10']}',`te1`='{$_GET['te1']}',`te2`='{$_GET['te2']}',`te3`='{$_GET['te3']}',`te4`='{$_GET['te4']}',`te5`='{$_GET['te5']}',`te6`='{$_GET['te6']}',`te7`='{$_GET['te7']}',`te8`='{$_GET['te8']}',`te9`='{$_GET['te9']}',`te10`='{$_GET['te10']}',`change_rate`='{$_GET['change_rate']}',`remark`=''  WHERE `group_num`={$group_num}");
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

		$result = $db -> query("UPDATE `physics_course_thermal_conductivity` SET `evaluation`=1,`status_2`='2',`hb1`='{$_GET['hb1']}',`hb2`='{$_GET['hb2']}',`hb3`='{$_GET['hb3']}',`hb4`='{$_GET['hb4']}',`hb5`='{$_GET['hb5']}',`hb6`='{$_GET['hb6']}',`hb_ave`='{$_GET['hb_ave']}',,`db`='{$_GET['db']}',`hc1`='{$_GET['hc1']}',`hc2`='{$_GET['hc2']}',`hc3`='{$_GET['hc3']}',`hc4`='{$_GET['hc4']}',`hc5`='{$_GET['hc5']}',`hc6`='{$_GET['hc6']}',`hc_ave`='{$_GET['hc_ave']}',`dc`='{$_GET['dc']}',`m`='{$_GET['m']}'  WHERE `group_num`={$group_num}");
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
		$result = $db -> query("SELECT `status_1` FROM `physics_course_thermal_conductivity` WHERE `group_num`={$group_num}");
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
		$result = $db -> query("SELECT `status_2` FROM `physics_course_thermal_conductivity` WHERE `group_num`={$group_num}");
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
