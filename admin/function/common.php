<?php
	//公共函数

	//防止恶意调用
	if(!defined('exp')){
		exit('Acess denied!');
	}
	
	include_once dirname(__FILE__).'/database.class.php';


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

 	function load_info(){
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
					<td><button onclick='show_detail_table(this)' class='button-detail'>详 情</button></td>
				</tr>";
		}
		echo $out;
 	}

 	function evaluating($flag = 0){
 		//初始状态下带评测栏的显示情况
 		$out = "";
 		$out .= "
 			<h4 class='title'>有<span class='count_evaluating'>0</span>条待评测（按提交顺序）:</h4>
 			<ul class='group_list'></ul>";
		echo $out;
 	}

 	function seek_help(){
 		$out = "";
 		$out .= "
			<h4 class='title'>有<span class='count_help'>0</span>条求助信息:</h4>
 			<ul class='group_list'>";
		$out .= "<li><a href='javascript:void(0)' onclick='eval_spread()' title='展开'>>></a></li></ul>";
		echo $out;
 		
 	}

 	function detail_data($group_num){
 		$obj = new database;
		$result = $obj->detail_data($group_num);
		return $result;
 	}


	function pass($option,$group_num){
 		$obj = new database;
 		$result = $obj->pass($option,$group_num);
 		return $result;
 	}

 	function fail($option,$group_num){
 		$obj = new database;
 		$result = $obj->fail($option,$group_num);
 		return $result;
 	}

 	function solve_help($group_num){
 		$obj = new database;
 		$obj->solve_help($group_num);
 	}
?>



