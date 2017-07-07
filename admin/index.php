<?php
	session_start();

	if( !$_SESSION['user_name']){

		header('Location:./login.php');
		
	}else{
		if(isset($_GET['exp_name'])){
			include './templates/default/experiment.php';
		}else{
			include './templates/default/index.php';
		}
	}