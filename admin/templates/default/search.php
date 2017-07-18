<?php 
	
	define('templates',true);
	//调用前端组件的标记
	define('exp',true);
	//调用后台函数文件的标记

	require dirname(__FILE__).'/../../function/database.class.php';
	require dirname(__FILE__).'/../../function/common.php';


	if(!isset($_SESSION['user_name'])){
		_location('请先登录','../../login.php');
	}

	include dirname(__FILE__).'/include/header.php';
	include dirname(__FILE__).'/include/module_search.php';
	include dirname(__FILE__).'/include/footer.php';

?>
