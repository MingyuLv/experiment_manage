<?php 
	//js请求的目标php文件
	//通过action关键字确定此文件应该调用哪一个函数

	header("Content-Type:text/plain");
	if(!isset($_GET['action'])) exit();
	//防止恶意调用

	define('exp',true);
	//调用后台函数文件的标记

	require '../../function/common.php';

	//调用与action对应的函数
	if( $_GET['action']=='detail_data'){
		if(isset($_GET['group_num'])) {
			$result = detail_data($_GET['group_num']);
			$result = $result->fetch_assoc();
			// var_dump($result);
			echo json_encode($result);
		}
	}else if( $_GET['action']=='pass'){
		    if( isset($_GET['group_num']) && isset($_GET['option'])){
			$result =  pass($_GET['option'],$_GET['group_num']);
			$arr = array(
				'status'=>$result
				);
			echo json_encode($arr);
		 }
	}else if( $_GET['action']=='fail'){
		if( isset($_GET['group_num']) && isset($_GET['option'])){
			$result = fail($_GET['option'],$_GET['group_num']);
			$arr = array(
				'status'=>$result
				);
			echo json_encode($arr);
		}
	}else if( $_GET['action']=='solve_help'){
		if(isset($_GET['group_num'])){
			solve_help($_GET['group_num']);
		}
	}
?>


