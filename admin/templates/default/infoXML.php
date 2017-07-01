<?php
	
	//如果数据量比较大的话xml比较合适，数据量小的话用json即可
	
	if(!isset($_GET['exp'])) exit();
	//防止恶意调用
	
	header('Content-Type:text/xml');

	require '../../function/database.class.php';

	$obj = new database;
	$result = $obj->new_info();		//新提交的条目
	$wait_eval = $obj->evaluating_info();	//等待评测的条目
	$wait_help = $obj->help_info();		//求助的条目
	
	//生成xml文档
	$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";	
	$xml .= "<info>\n";
	while ($row = $result->fetch_assoc()){
		$xml .= "<student>\n";
		$xml .= "<stunum>".$row['stu_num']."</stunum>\n";
		$xml .= "<name>".$row['stu_name']."</name>\n";

		if($row['status_1'] === '1'){
			$status_1 = "通过<span class='icon_ok'><i class='fa fa-check'></i></span>";
		}else if($row['status_1'] === '0') {
			$status_1 = '未通过'; 
		}else if($row['status_1'] === '2'){
			$status_1 = '待评测'; 
		}else {$status_1 = "";}

		if($row['status_2'] === '1'){
			$status_2 = "通过<span class='icon_ok'><i class='fa fa-check'></i></span>";	
		}else if($row['status_2'] === '0') {
			$status_2 = '未通过';
		}else if($row['status_2'] === '2'){
			$status_2 = '待评测'; 
		}else {$status_2 = "";}

		$xml .= "<status1>".$status_1."</status1>\n";
		$xml .= "<status2>".$status_2."</status2>\n";
		$xml .= "<helptimes>".$row['help_times']."</helptimes>\n";
		$xml .= "<failtimes>".$row['fail_times']."</failtimes>\n";
		$xml .= "</student>\n";
	}
	//返回等待评测的组号
	while( $result = $wait_eval->fetch_assoc()){
		$xml .= "<evaluating>".$result['group_num']."</evaluating>\n";
	}
	//返回求助的组号
	while( $result = $wait_help->fetch_assoc()){
		$xml .= "<help>".$result['group_num']."</help>\n";
	}

	$xml .= "</info>";

	echo($xml);	
?>	