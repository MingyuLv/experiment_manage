<?php
	session_start();
	
	if(!isset($_POST['classNum'])) exit();
	//防止通过url恶意调用

	define('templates',true);
	//调用前端组件的你标记
	define('exp',true);
	//调用后台函数文件的标记

	require '../../function/global.func.php';
	require '../../function/database.class.php';
	require '../../function/common.php';
	
	if(!isset($_SESSION['user_name'])){
		_location('请先登录','../../login.php');
	}


	include './include/header.php';
	include './include/cur_info.php';
	include './include/footer.php';
	
?>