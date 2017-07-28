<?php
	session_start();

	if( !$_SESSION['user_name']){

		header('Location:./login.php');
		
	}else{
		if(isset($_GET['exp_name'])){
			include './templates/default/experiment.php';
		}else if(isset($_GET['search'])){
			include './templates/default/search.php';
		}else if(isset($_GET['user_manage']) && $_GET['user_manage']=='true'){
			include './templates/default/user_manage.php';
		}else{
			include './templates/default/index.php';
		}
	}