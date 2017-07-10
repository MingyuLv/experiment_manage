<?php
	//公共函数

	//防止恶意调用
	if(!defined('exp')){
		exit('Acess denied!');
	}
	
	include_once dirname(__FILE__).'/database.class.php';
	
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


	function check_login($user_name, $password){
		$obj = new database;
		$result = $obj->check_login($user_name, $password);
		return $result;
 	}

	/*计算课程所属的时间段，因学校而异，最早提交半小时开启课堂*/
 	function course_time(){
 		date_default_timezone_set('Asia/Shanghai');
		$cur_time = getdate();
		$hours = $cur_time['hours'];
		$minutes = $cur_time['minutes'];
		//$hours = 9; $minutes = 44;		//测试使用
		$compare = $hours*60 + $minutes;				
		if( $compare>=450 && $compare<=584){
			$time = '8:00--9:45';
		}else if( $compare>=585 && $compare<=719){
			$time = '10:15--12:00';
		}else if( $compare>=810 && $compare<=944){
			$time = '14:00--15:45';
		}else if( $compare>=945 && $compare<=1079){
			$time = '16:15--18:00';
		}else if( $compare>=1110 && $compare<=1229){
			$time = '18:45--20:30';
		}
	
		if(isset($time)) echo($time);
		else echo "wrong time!";		
 	}

 	function ymd_date(){
 		date_default_timezone_set('Asia/Shanghai');
 		return date('Y/m/d');
 	}


 	function detail_data($exp_name,$group_num){
 		$obj = new database($exp_name);
		$result = $obj->detail_data($group_num);
		return $result;
 	}


	function pass($exp_name,$option,$group_num){
 		$obj = new database($exp_name);
 		$result = $obj->pass($option,$group_num);
 		return $result;
 	}

 	function fail($exp_name,$option,$group_num){
 		$obj = new database($exp_name);
 		$result = $obj->fail($option,$group_num);
 		return $result;
 	}

 	function solve_help($exp_name,$group_num){
 		$obj = new database($exp_name);
 		$obj->solve_help($group_num);
 	}

 	function course_status($course_id,$user_id){
 		$obj = new database();
 		$obj->course_status_start($course_id,$user_id);
 	}

 	function if_cur_course($user_id){
 		//查询当前教师是否有正在进行的课程
 		$obj = new database();
 		$result = $obj->if_cur_course($user_id);
 		//var_dump($result);
 		return $result;
 	}

 	function cur_course_name($user_id){
 		$obj = new database();
 		$result = $obj->cur_course_name($user_id);
 		return $result;
 	}

 	function start_course($user_id, $course_name, $classNum){
 		$obj = new database();
 		$result = $obj->start_course($user_id,$course_name,$classNum);
 		return $result;
 	}

	function close_course($user_id,$course_name){
		$obj = new database();
 		$result = $obj->close_course($user_id,$course_name);
 		return $result;
	}

 	function init_info_oscillograph(){
 		//非公共函数
 		$out = "";
 		for( $i = 1; $i<=40; $i++){		
			$out .="
				<tr>
					<td>".$i."</td>
					<td style='width:90px'></td>
					<td style='width:90px'></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><button onclick='show_detail_table(this,2)' class='button-detail'>详 情</button></td>
				</tr>";
		}
		echo $out;
 	}
 
 	function init_help(){
 		//初始化求助栏
 		$out = "";
 		$out .= "
			<h4 class='title'>有<span class='count_help'>0</span>条求助信息:</h4>
 			<ul class='group_list' name='0'>
 			</ul>";
		echo $out;
 		
 	}


 	function init_evaluating(){
 		//初始化待评测栏
 		$out = "";
 		$out .= "
 			<h4 class='title'>有<span class='count_evaluating'>0</span>条待评测（按提交顺序）:</h4>
 			<ul class='group_list' name='0'></ul>";
		echo $out;
 	}

?>




