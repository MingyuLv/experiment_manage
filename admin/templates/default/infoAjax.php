<?php 
	//js请求的目标php文件
	//通过action关键字确定此文件应该调用哪一个函数

	header("Content-Type:text/plain");
	if(!isset($_GET['action'])) exit();
	//防止恶意调用

	define('exp',true);
	//调用后台函数文件的标记

	require dirname(__FILE__).'/../../function/common.php';

	$exp_name = $_GET['exp_name'];
	//调用与action对应的函数
	if( $_GET['action']=='detail_data'){
		if(isset($_GET['group_num'])) {
			$result = detail_data($exp_name,$_GET['group_num']);
			$result = $result->fetch_assoc();
			// var_dump($result);
			echo json_encode($result);
		}
	}else if( $_GET['action']=='pass'){
		    if( isset($_GET['group_num']) && isset($_GET['option'])){
			$result =  pass($exp_name,$_GET['option'],$_GET['group_num']);
			$arr = array(
				'status'=>$result
				);
			echo json_encode($arr);
		 }
	}else if( $_GET['action']=='fail'){
		if( isset($_GET['group_num']) && isset($_GET['option'])){
			$result = fail($exp_name,$_GET['option'],$_GET['group_num']);
			$arr = array(
				'status'=>$result
				);
			echo json_encode($arr);
		}
	}else if( $_GET['action']=='solve_help'){
		if(isset($_GET['group_num'])){
			solve_help($exp_name,$_GET['group_num']);
		}
	}else if( $_GET['action']=='course_status'){
		if( isset($_GET['course_id']) && isset($_GET['user_id']))
		course_status($_GET['course_id'],$_GET['user_id']);
	}
?>


