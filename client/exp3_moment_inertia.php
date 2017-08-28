<?php
	//客户端接口

	if(!isset($_GET['client']))exit;
	//防止恶意调用

	require "../admin/config/database.php";
	$db = new mysqli(HOSTNAME, HOSTUSER, HOSTPWD, HOSTDB);
	$db->query('set names utf8');		//防止查询数据库乱码

	$result = $db->query("SELECT `status` FROM `physics_status` WHERE `name`='moment_inertia'");
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
		$sql = "UPDATE `physics_course_moment_inertia` SET `stu_num`='{$stu_num}', `stu_name`='{$stu_name}' WHERE `group_num`='{$group_num}'";	
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
		$result = $db -> query("SELECT `v_std`,`f_std` FROM `physics_course_moment_inertia` WHERE `group_num`={$group_num}");		

		$d_ave = sprintf("%3.f",($_GET['d1']+$_GET['d2']+$_GET['d3']+$_GET['d4']+$_GET['d5']+$_GET['d6'])/6 );
		$dn_ave = sprintf("%3.f", ($_GET['dn_1']+$_GET['dn_2']+$_GET['dn_3']+$_GET['dn_4']+$_GET['dn_5']+$_GET['dn_6'])/6 );
		$dw_ave = sprintf("%3.f",($_GET['dw_1']+$_GET['dw_2']+$_GET['dw_3']+$_GET['dw_4']+$_GET['dw_5']+$_GET['dw_6'])/6 );
		$x_theoretical = sprintf("%f",$d_ave/2.0+6);

		$result = $db -> query("UPDATE `physics_course_spectrometer` SET `evaluation`=1,`status_1`=2,`t0_1`='{$_GET['t0_1']}',`t0_2`='{$_GET['t0_2']}',`t0_3`='{$_GET['t0_3']}',`t0_4`='{$_GET['t0_4']}',`t0_5`='{$_GET['t0_5']}',`t0_1`='{$_GET['t0_6']}',`t0_ave`='{$_GET['t0_ave']}',`t1_1`='{$_GET['t1_1']}',`t1_2`='{$_GET['t1_2']}',,`t1_3`='{$_GET['t1_3']}',`t1_4`='{$_GET['t1_4']}',`t1_5`='{$_GET['t1_5']}',`t1_6`='{$_GET['t1_6']}',`t1_ave`='{$_GET['t1_ave']}',`t2_1`='{$_GET['t2_1']}',`t2_2`='{$_GET['t2_2']}',`t2_3`='{$_GET['t2_3']}',`t2_4`='{$_GET['t2_4']}',`t2_5`='{$_GET['t2_5']}',`t2_6`='{$_GET['t2_6']}',`t2_ave`='{$_GET['t2_ave']}',`t3_1`='{$_GET['t3_1']}',`t3_2`='{$_GET['t3_2']}',`t3_3`='{$_GET['t3_3']}',`t3_4`='{$_GET['t3_4']}',`t3_5`='{$_GET['t3_5']}',`t3_6`='{$_GET['t3_6']}',`t3_ave`='{$_GET['t3_ave']}',`d1`='{$_GET['d1']}',`d2`='{$_GET['d2']}',`d3`='{$_GET['d3']}',`d4`='{$_GET['d4']}',`d5`='{$_GET['d5']}',`d6`='{$_GET['d6']}',`d_ave`='{$_GET['d_ave']}',`x`='{$_GET['x']}',`x_theoretical`='$x_theoretical',`dn_1`='{$_GET['dn_1']}',`dn_2`='{$_GET['dn_2']}',`dn_3`='{$_GET['dn_3']}',`dn_4`='{$_GET['dn_4']}',`dn_5`='{$_GET['dn_5']}',`dn_6`='{$_GET['dn_6']}',`dn_ave`='{$_GET['dn_ave']}',`dw_1`='{$_GET['dw_1']}',`dw_2`='{$_GET['dw_2']}',`dw_3`='{$_GET['dw_3']}',`dw_4`='{$_GET['dw_4']}',`dw_5`='{$_GET['dw_5']}',`dw_6`='{$_GET['dw_6']}',`dw_ave`='{$_GET['dw_ave']}',`m1`='{$_GET['m1']}',`m2`='{$_GET['m2']}',`remark`=''  WHERE `group_num`={$group_num}");
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
		$result = $db -> query("SELECT `status_1` FROM `physics_course_moment_inertia` WHERE `group_num`={$group_num}");
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
