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
	
		if(isset($time)) return ($time);
		else return "wrong time!";		
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

	function save_data($course_name, $user_id){
		$obj = new database();
		$time = ymd_date().' '.course_time();
		$result = $obj->save_data($course_name,$time,$user_id);
		return $result;
	}

	function change_pwd($user_id,$old_pwd,$new_pwd){
		$obj = new database();
 		$result = $obj->change_pwd($user_id,$old_pwd,$new_pwd);
 		return $result;
	}

	function cur_course_name_close($user_id){	
		$obj = new database();
 		$result = $obj->cur_course_name_close($user_id);
 		$result = $result->fetch_assoc();
 		$name = $result['name']; 
 		//echo("\n$name:".$name);
 		return $name;
	}

 	function search_info_num($stu_num){
 		$obj = new database();
 		$result = $obj->search_info_num($stu_num);
 		$out = "";
 		if($result){	

 				$flag = 1;
	 			while($data = $result->fetch_assoc()){
	 				if($flag==1){
	 					
				 		$name = $data['stu_name'];
				 		$out .= "学号：<span class='flag_stu_num'>".$stu_num."</span>&nbsp;";
				 		$out .= "姓名：".$name."\n";
				 		$flag = 0;
	 				}
	 				$out .= "<tr name='".$data['order']."'>";	
		 				$out .= "<td>".$data['time']."</td>";
		 				//$out .= "<td>".$data['stu_name']."</td>"; 
		 				$out .= "<td class='exp_name' name='".$data['exp_name_en']."'>".$data['exp_name_ch']."</td>";
		 				$out .= "<td>".$data['help_times']."</td>";
		 				$out .= "<td>".$data['fail_times']."</td>";
		 				$out .= "<td>".$data['grade']."</td>";
		 				$out .= "<td><button onclick='detail_via_stu_num(this)'>查看</button></td>";
	 				$out .= "</tr>";
	 			}
	 		
	 	}
 		return $out;

 	}

 	function search_info_date($date){
 		$out = "";
 		$obj = new database();
 		$result = $obj->search_info_date($date);
 		if($result){
	 					
	 			while($data = $result->fetch_assoc()){
	 				$out .= "<tr name='".$data['order']."'>";	
	 					$time = substr($data['time'],11,12);
	 					$out .= "<td class='exp_time' name='".$data['time']."'>".$time."</td>";
		 				$out .= "<td class='exp_name' name='".$data['exp_name_en']."'>".$data['exp_name']."</td>";
		 				$out .= "<td>".$data['teacher']."</td>";
		 				$out .= "<td><button onclick='detail_via_date(this)'>查看</button></td>";
	 				$out .= "</tr>";
	 			}
	 	
	 	}
 		return $out;
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

 	function init_info_potentioneter(){
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

 	function show_detail_via_stu_num($stu_num,$exp_name){
 		$obj = new database($exp_name);
 		$result = $obj->show_detail_via_stu_num($stu_num);
 		$out = "";

 		switch($exp_name){
 			case 'oscillograph':
	 			$result = $result->fetch_assoc();
	 			$out .= "
					<div class='popup-bg' id='popup-bg' style='display: block'>
						 <div class='popup-detail' >
						 <button class='detail-close' onclick='close_popup_result()'><span aria-hidden='true'>×</span></button>

				 
				        <table class='tb-content'>
				            <thead>
					            <tr>
					                <th>Vp-p（标准）</th>
					                <th>f（标准）</th>
					                <th>V/DIV</th>
					                <th>Dy</th>
					                <th>V'p-p</th>
					                <th>Ev</th>
					                <th>TIME/DIV</th>
					                <th>n</th>
					                <th>Dx</th>
					                <th>T'</th>
					                <th>f'</th>
					                <th>Ef</th>
					            </tr>
				            </thead>
				            <tbody>
					            <tr>
					                <td>".$result['v_std']."</td>
					                <td>".$result['f_std']."</td>
					                <td>".$result['V_DIV']."</td>
					                <td>".$result['Dy']."</td>
					                <td>".$result['v_up']."</td>
					                <td>".$result['E_v']."</td>
					                <td>".$result['TIME_DIV']."</td>
					                <td>".$result['n']."</td>
					                <td>".$result['Dx']."</td>
					                <td>".$result['T']."</td>
					                <td>".$result['f_up']."</td>
					                <td>".$result['E_f']."</td>
				            </tr>
				            </tbody>
				        </table>

				        <table class='tb-content' style='width:400px'>
				            <tr>
				                <th>Nx</th>
				                <td>".$result['Nx1']."</td>
				                <td>".$result['Nx2']."</td>
				                <td>".$result['Nx3']."</td>
				                <td>".$result['Nx4']."</td>
				            </tr>
				            <tr>
				                <th>Ny</th>
				                <td>".$result['Ny1']."</td>
				                <td>".$result['Ny2']."</td>
				                <td>".$result['Ny3']."</td>
				                <td>".$result['Ny4']."</td>
				            </tr>
				            <tr>
				                <th>fy（hz）</th>
				                <td>".$result['fy1']."</td>
				                <td>".$result['fy2']."</td>
				                <td>".$result['fy3']."</td>
				                <td>".$result['fy4']."</td>
				            </tr>
				        </table>		 

				    </div>
				</div>";
				break;
			default: 
				break;
 		}
 		return $out;
 	}


 	function show_detail_via_date($exp_time,$exp_name){
 		$obj = new database($exp_name);
 		$result = $obj->show_detail_via_date($exp_time);
 		$out = "";

		switch($exp_name){
 			case 'oscillograph':
 				$out .= "
					<div class='popup-bg' id='popup-bg' style='display: block; '>
						 <div class='popup-detail' style='width: 100%; height: 100%' >
						 <button class='detail-close' onclick='close_popup_result()'><span aria-hidden='true'>×</span></button>
						
						<table style='overflow:scroll'>
						<tr> 
							<th>学号</th>
							<th>姓名</th>
							<th>分数</th>
							<th>求助次数</th>
							<th>失败次数</th>
						    <th>Vp-p（标准）</th>
			                <th>f（标准）</th>
			                <th>V/DIV</th>
			                <th>Dy</th>
			                <th>V'p-p</th>
			                <th>Ev</th>
			                <th>TIME/DIV</th>
			                <th>n</th>
			                <th>Dx</th>
			                <th>T'</th>
			                <th>f'</th>
			                <th>Ef</th>
			                <th>Nx1</th>
			                <th>Ny1</th>
			                <th>fy1</th>
			                <th>Nx2</th>
			                <th>Ny2</th>
			                <th>fy2</th>
			                <th>Nx3</th>
			                <th>Ny3</th>
			                <th>fy3</th>
			                <th>Nx4</th>
			                <th>Ny4</th>
			                <th>fy4</th>
						</tr>";


	 			while( $date = $result->fetch_assoc()){
	 				//echo ($date['stu_num'].' '.$exp_time.' '.$exp_name);
	 				$date = $obj->return_from_exp_data($date['stu_num'],$exp_time);
	 				$date = $date->fetch_assoc();
	 				
	 				$out .= "
	 					<tr>
		 					<th>".$date['stu_num']."</th>
							<th>".$date['stu_name']."</th>
							<th>".$date['grade']."</th>
							<th>".$date['help_times']."</th>
							<th>".$date['fail_times']."</th>
						    <th>".$date['v_std']."</th>
			                <th>".$date['f_std']."</th>
			                <th".$date['V_DIV']."</th>
			                <th>".$date['Dy']."</th>
			                <th>".$date['v_up']."</th>
			                <th>".$date['E_v']."</th>
			                <th>".$date['TIME_DIV']."</th>
			                <th>".$date['n']."</th>
			                <th>".$date['Dx']."</th>
			                <th>".$date['T']."</th>
			                <th>".$date['f_up']."</th>
			                <th>".$date['E_f']."</th>
			                <th>".$date['Nx1']."</th>
			                <th>".$date['Ny1']."</th>
			                <th>".$date['fy1']."</th>
			                <th>".$date['Nx2']."</th>
			                <th>".$date['Ny2']."</th>
			                <th>".$date['fy2']."</th>
			                <th>".$date['Nx3']."</th>
			                <th>".$date['Ny3']."</th>
			                <th>".$date['fy3']."</th>
			                <th>".$date['Nx4']."</th>
			                <th>".$date['Ny4']."</th>
			                <th>".$date['fy4']."</th>
		                </tr>";
	 			}

				   $out .= "  
				       </table>
				    </div>
				</div>";
 				
	 		break;

	 		default: break;
 		}
 		return $out;
 	}



?>



