<?php
	//一些供全局调用函数

	if(!defined('exp')){
		exit('Acess denied!');
	}

	
	function _alert($msg){
		echo "<script>alert('$msg');</script>";
	}

	function _alert_back($msg){
		echo"<script>alert('$msg');history.back();</script>";
	}

	function _location($info,$url){
		if(!empty($info)){
			echo "<script>alert('$info');location.href='$url';</script>";
			exit();
		}else{
			header('Location:'.$url);
		}
	}
?>