<?php
	define('exp',true);
	//防止函数库被误调用
	session_start();

	require_once "../../function/global.func.php";
	if( !isset($_SESSION['user_name'])) _location("请先登录","../../login.php");

	define('templates',true);
	//防止模板文件被恶意调用
	
	include './include/header.php';
	include './include/body.php';
	include './include/footer.php';
?>