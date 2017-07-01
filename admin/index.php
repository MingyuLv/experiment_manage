<?php

	if( !$_SESSION['user_name']){

		header('Location:./admin/login.php');
		
	}else{

		include './templates/default/index.php';
		
	}