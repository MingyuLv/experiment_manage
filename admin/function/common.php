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
				 		$out .= "<div class='search-stu-info'>";
				 		$out .= "学号：<span class='flag_stu_num'>".$stu_num."</span>";
				 		$out .= "姓名：".$name."\n";
				 		$out .= "</div>";
				 		$flag = 0;
	 				}
	 				$out .= "<tr name='".$data['order']."'>";	
		 				$out .= "<td>".$data['time']."</td>";
		 				//$out .= "<td>".$data['stu_name']."</td>"; 
		 				$out .= "<td class='exp_name' name='".$data['exp_name_en']."'>".$data['exp_name_ch']."</td>";
		 				$out .= "<td>".$data['help_times']."</td>";
		 				$out .= "<td>".$data['fail_times']."</td>";
		 				$out .= "<td>".$data['grade']."</td>";
		 				$out .= "<td><button onclick='detail_via_stu_num(this)' class='button-detail'>查看</button></td>";
	 				$out .= "</tr>";
	 			}
	 		
	 	}
 		return $out;

 	}

 	function search_info_date($date,$user_name){
 		if($date==''){
 			$date1 = '全部显示';
 		}else{
 			$date1 = $date;
 		}
 		$out = "";
 		$obj = new database();
 		$result = $obj->search_info_date($date,$user_name);
 		if($result){
	 			$flag = 1;		
	 			while($data = $result->fetch_assoc()){
	 				if($flag == 1){
	 					$out .= "<div class='search-stu-info' style='padding-left: 310px'>";
	 					$out .= "查询日期：&nbsp;&nbsp;&nbsp;".$date1."</div>";
	 					$flag += 1;
	 				}
	 				$out .= "<tr name='".$data['order']."'>";	
	 					$time = substr($data['time'],11,12);
	 					$out .= "<td class='exp_time' name='".$data['time']."'>".$time."</td>";
		 				$out .= "<td class='exp_name' name='".$data['exp_name_en']."'>".$data['exp_name']."</td>";
		 				$out .= "<td>".$data['teacher']."</td>";
		 				$out .= "<td><button onclick='detail_via_date(this)' class='button-detail'>查看</button></td>";
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
					<td></td>
					<td></td>
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
					<td></td>
					<td></td>
				</tr>";
		}
		echo $out;
 	}

 	function init_info_thermal_conductivity(){
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
					<td></td>
					<td></td>
				</tr>";
		}
		echo $out;
 	}

 	function init_info_newton(){
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
					<td></td>
				</tr>";
		}
		echo $out;
 	}
 
 	function init_info_moment_inertia(){
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
					<td></td>
				</tr>";
		}
		echo $out;
 	}

 	function init_info_spectrometer(){
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
					<td></td>
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
						 <button class='detail-close' onclick='search_close_popup()'><span aria-hidden='true'>×</span></button>

				 		 <div class='table_titile' style='margin-top: 80px; margin-bottom: 35px'>一、测量正弦波</div>
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
	
						<div class='table_titile'>二、李萨如图形</div>
				        
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
			case 'potentioneter':
	 			$result = $result->fetch_assoc();
	 			$out .= "
					<div class='popup-bg' id='popup-bg' style='display: block'>
						 <div class='popup-detail' >
						 <button class='detail-close' onclick='search_close_popup()'><span aria-hidden='true'>×</span></button>

				 		 <div class='table_titile' style='margin-top: 80px; margin-bottom: 35px'>一、定标</div>
				         <table class='tb-content'>
							<thead>
					            <tr>
					                <th>U_ab</th>
					                <th>U_0</th>
					                <th>I_s</th>
					                <th>Rab</th>
					                <th>Is</th>
					                <th>U0</th>
					                <th>Uab</th>
					                <th>E(误差)</th>
					            </tr>
				            </thead>
				            <tbody>
					            <tr>
					                <td>".$result['U_ab']."</td>
					                <td>".$result['U_0']."</td>
					                <td>".$result['I_s']."</td>
					                <td>".$result['Rab']."</td>
					                <td>".$result['Is']."</td>
					                <td>".$result['U0']."</td>
					                <td>".$result['Uab']."</td>
					                <td>".$result['E_e']."</td>	
				            	</tr>
				            </tbody>
				        </table>
	
						<div class='table_titile'>二、测量电动势</div>
				        
				        <table class='tb-content' style='width:400px'>
				            <tr>
				                <th>次数n</th>
				                <th>1</th>
				                <th>2</th>
				                <th>3</th>
				                <th>4</th>
				                <th>5</th>
				                <th>6</th>
				                <th>平均值lx</th>
					        </tr>
							<tr>
								<td></td>
				                <td>".$result['Lx1']."</td>
				                <td>".$result['Lx2']."</td>
				                <td>".$result['Lx3']."</td>
				                <td>".$result['Lx4']."</td>
				                <td>".$result['Lx5']."</td>
				                <td>".$result['Lx6']."</td>
				                <td>".$result['Lx_ave']."</td>
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
 		//var_dump($result);

		switch($exp_name){
 			case 'oscillograph':
 				$out .= "
					<div class='search-popup-bg' id='search-popup-bg' style='display: block; '>
						 <div class='search-detail-top'></div>
						 <div class='search-popup-detail'>
						 <a class='search-detail-close' onclick='close_popup_result()'><span aria-hidden='true' style='margin-right: 125px'><i class='fa fa-reply' style='margin-right: 20px'></i>返回</span></a>
						
						<table class='search_detail'>
							<thead>
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
							</tr>
							</thead>";
				$out .= "<tbody>";
	 			while( $data = $result->fetch_assoc()){
	 				//echo ($data['stu_num'].' '.$exp_time.' '.$exp_name);
	 				$data = $obj->return_from_exp_data($data['stu_num'],$exp_time);
	 				$data = $data->fetch_assoc();
	 			
	 				if($data == null) continue;		//这句话很重要
	 				
	 				$out .= "
	 					<tr>
		 					<td>".$data['stu_num']."</td>
							<td>".$data['stu_name']."</td>
							<td>".$data['grade']."</td>
							<td>".$data['help_times']."</td>
							<td>".$data['fail_times']."</td>
						    <td>".$data['v_std']."</td>
			                <td>".$data['f_std']."</td>
			                <td>".$data['V_DIV']."</td>
			                <td>".$data['Dy']."</td>
			                <td>".$data['v_up']."</td>
			                <td>".$data['E_v']."</td>
			                <td>".$data['TIME_DIV']."</td>
			                <td>".$data['n']."</td>
			                <td>".$data['Dx']."</td>
			                <td>".$data['T']."</td>
			                <td>".$data['f_up']."</td>
			                <td>".$data['E_f']."</td>
			                <td>".$data['Nx1']."</td>
			                <td>".$data['Ny1']."</td>
			                <td>".$data['fy1']."</td>
			                <td>".$data['Nx2']."</td>
			                <td>".$data['Ny2']."</td>
			                <td>".$data['fy2']."</td>
			                <td>".$data['Nx3']."</td>
			                <td>".$data['Ny3']."</td>
			                <td>".$data['fy3']."</td>
			                <td>".$data['Nx4']."</td>
			                <td>".$data['Ny4']."</td>
			                <td>".$data['fy4']."</td>
		                </tr>";
	 			}
				   $out .= " 
				   	   </tbody> 
				       </table>
				    </div>
				</div>";
 				
	 			break;

	 		case 'potentioneter':
	 			$out  .= "
		 			<div class='search-popup-bg' id='search-popup-bg' style='display: block; '>
							 <div class='search-detail-top'></div>
							 <div class='search-popup-detail'>
							 <a class='search-detail-close' onclick='close_popup_result()'><span aria-hidden='true' style='margin-right: 125px'><i class='fa fa-reply' style='margin-right: 20px'></i>返回</span></a>
							
							<table class='search_detail'>
								<thead>
								<tr> 
									<th>学号</th>
									<th>姓名</th>
									<th>分数</th>
									<th>求助次数</th>
									<th>失败次数</th>
								    <th>E</th>
					                <th>E真实值</th>
					                <th>E误差</th>
					                <th>U_ab</th>
					                <th>U_0</th>
					                <th>I_s</th>
					                <th>U0</th>
					                <th>Uab</th>
					                <th>Lx1</th>
					                <th>Lx2</th>
					                <th>Lx3</th>
					                <th>Lx4</th>
					                <th>Lx5</th>
					                <th>Lx6</th>
					                <th>Lx_ave</th>
								</tr>
								</thead>";
					$out .= "<tbody>";
		 			while( $data = $result->fetch_assoc()){
		 				//echo ($data['stu_num'].' '.$exp_time.' '.$exp_name);
		 				
		 				$data = $obj->return_from_exp_data($data['stu_num'],$exp_time);
		 				$data = $data->fetch_assoc();
		 			
		 				if($data == null) continue;
		 				
		 				$out .= "
		 					<tr>
			 					<td>".$data['stu_num']."</td>
								<td>".$data['stu_name']."</td>
								<td>".$data['grade']."</td>
								<td>".$data['help_times']."</td>
								<td>".$data['fail_times']."</td>
							    <td>".$data['E']."</td>
				                <td>".$data['E_std']."</td>
				                <td>".$data['E_e']."</td>
				                <td>".$data['U_ab']."</td>
				                <td>".$data['U_0']."</td>
				                <td>".$data['I_s']."</td>
				                <td>".$data['U0']."</td>
				                <td>".$data['Uab']."</td>
				                <td>".$data['Lx1']."</td>
				                <td>".$data['Lx2']."</td>
				                <td>".$data['Lx3']."</td>
				                <td>".$data['Lx4']."</td>
				                <td>".$data['Lx5']."</td>
				                <td>".$data['Lx6']."</td>
				                <td>".$data['Lx_ave']."</td>
			                </tr>";
						          
		 			}
					   $out .= " 
					   	   </tbody> 
					       </table>
					    </div>
					</div>";
	 				
		 			break;

	 		default: break;
 		}
 		return $out;
 	}

 	function user_manage(){
 		$obj = new database();
 		$result = $obj->user_manage();
 		$out = "";
 		while( $data = $result->fetch_assoc()){
 			if($data['level']=='2') $level = '普通用户';
 			else if($data['level']=='1') $level = '管理员';
	 		$out .= "
				<tr>
					<td>".$data['number']."</td>
					<td id='user_name'>".$data['name']."</td>
					<td>".$data['pwd']."</td>
					<td>".$level."</td>";
					
			if($data['level']=='1'){
				 $out .= "
			    	<td>
						<a href='javascript:void(0)'  onclick='add_user()' style='margin-left: 56px'>添加用户</a>				
					</td>";
			}else if($data['level']=='2'){
			    $out .= "
			    	<td>
						<a href='javascript:void(0)'  onclick='admin_delete_user(this)'>删除</a>
						&nbsp;&nbsp;&nbsp;
						<a href='javascript:void(0)' onclick='admin_change_pwd(this)'>修改密码</a>
					</td>";
			}
			$out .= "</tr>";
		}
		return $out;
 	}

 	function admin_change_pwd($new_pwd, $number){
 		$obj = new database();
 		$result = $obj->admin_change_pwd($new_pwd, $number);
 		return $result;
 	}

 	function admin_delete_user($number){
 		$obj = new database();
 		$result = $obj->admin_delete_user($number);
 		return $result;
 	}

 	function add_user($number, $user_name, $pwd){
 		$obj = new database();
 		$result = $obj->add_user($number, $user_name, $pwd);
 		return $result;
 	}

 	function remark_submit($exp_name, $group_num, $remark, $grade_modified){
 		$obj = new database($exp_name);
 		$result = $obj->remark_submit($group_num, $remark, $grade_modified);
 		return $result;
 	}

 	function set_parameter($exp_name){
 		$obj = new database($exp_name);
 		$result = $obj->set_parameter($exp_name);
 		$out = "";
 		switch($exp_name){
 			case 'oscillograph':
		 		while( $data = $result->fetch_assoc()){
		 			$out .= "
		 				<tr>
		 					<td>".$data['group_num']."</td>
		 					<td>".$data['v_std']."</td>
		 					<td>".$data['f_std']."</td>
		 					<td><button onclick='change_parameter(this)' class='button-detail'>修改</button></td>
		 				</tr>";
		 		}
		 		return $out;
		 		break;
		 	case 'potentioneter':
		 		while( $data = $result->fetch_assoc()){
		 			$out .= "
		 				<tr>
		 					<td>".$data['group_num']."</td>
		 					<td>".$data['E_std']."</td>
		 					<td><button onclick='change_parameter(this)' class='button-detail'>修改</button></td>
		 				</tr>";
		 		}
		 		return $out;
		 		break;
		 	case 'newton':
		 		if(($result = has_para_newton()) != null){
		 			for( $i = 1; $i<=40; $i++){
		 				$data = $result->fetch_assoc();
		 				$out .= "
							<tr>
								<td>".$i."</td>
								<td style='position: relative'><input type='text' class='newton-input' value='".$data['radius']."'></td>
							</tr>
			 			";
	 				}
		 		}else{
		 			for( $i = 1; $i<=40; $i++){
			 			$out .= "
							<tr>
								<td>".$i."</td>
								<td style='position: relative'><input type='text' placeholder='点击设置参数' class='newton-input'></td>
							</tr>
			 			";
		 			}
		 		}
		 		return $out;
		 		break;
		 	case 'spectrometer':
		 		if(($result = has_para_spectrometer()) != null){
		 			for( $i = 1; $i<=40; $i++){
		 				$data = $result->fetch_assoc();
		 				$out .= "
							<tr>
								<td>".$i."</td>
								<td style='position: relative'><input type='text' class='newton-input' value='".$data['constant']."'></td>
							</tr>
			 			";
	 				}
		 		}else{
		 			for( $i = 1; $i<=40; $i++){
			 			$out .= "
							<tr>
								<td>".$i."</td>
								<td style='position: relative'><input type='text' placeholder='点击设置参数' class='newton-input'></td>
							</tr>
			 			";
		 			}
		 		}
		 		return $out;
		 		break;
	 	}
 	}

 	function has_para_newton(){
 		$obj = new database();
 		return $obj->has_para_newton();
 	}

 	function has_para_spectrometer(){
 		$obj = new database();
 		return $obj->has_para_spectrometer();
 	}

 	function query_parameter($exp_name){
 		$obj = new database($exp_name);
 		$out = "";
	 	switch($exp_name){
	 		case 'oscillograph':
 				$result = $obj->query_parameter_oscillograph($exp_name);
		 		while( $data = $result->fetch_assoc()){
		 			$out .= "
		 				<tr>
		 					<td>".$data['group_num']."</td>
		 					<td>".$data['v_std']."</td>
		 					<td>".$data['f_std']."</td>
		 					<td><button onclick='change_parameter(this)' class='button-detail'>修改</button></td>
		 				</tr>";
		 		}
		 		break;
		 	case 'potentioneter':
		 		$result = $obj->query_parameter_potentioneter($exp_name);
		 		while( $data = $result->fetch_assoc()){
		 			$out .= "
		 				<tr>
		 					<td>".$data['group_num']."</td>
		 					<td>".$data['E_std']."</td>
		 					<td><button onclick='change_parameter(this)' class='button-detail'>修改</button></td>
		 				</tr>";
		 		}
		 		break;
		 	default: break;

	 	}
	 	return $out;
 	}

 	function change_parameter_oscillograph($group_num, $v_std, $f_std){
 		$obj = new database();
 		$result = $obj->change_parameter_oscillograph($group_num, $v_std, $f_std);
 		return $result;
 	}

 	function change_parameter_potentioneter($group_num, $E_std){
 		$obj = new database();
 		$result = $obj->change_parameter_potentioneter($group_num, $E_std);
 		return $result;
 	}

 	function modified_course_status($exp_name, $user_id){
 		$obj = new database();
 		return  ($obj->modified_course_status($exp_name, $user_id));
 	}

 	function modified_course_status_newton($user_id, $para){
 		$obj = new database();
 		return  $obj->modified_course_status_newton($user_id, $para);
 	}

 	function modified_course_status_spectrometer($user_id, $para){
 		$obj = new database();
 		return  $obj->modified_course_status_spectrometer($user_id, $para);
 	}

 	function sepctrometer_lambda(){
 		$out = "";
 		if( ($result = has_para_lambda()) != null){
 			$result = $result->fetch_assoc();
 			$out .= "
 				<div class='sepctrometer_lambda'>
					<span>&#955;<sub>黄绿</sub> = <input id='lambda_1' value='".$result['lambda_1']."'></span>
					<span>&#955;<sub>黄内</sub> = <input id='lambda_2' value='".$result['lambda_2']."'></span>
					<span>&#955;<sub>黄外</sub> = <input id='lambda_3' value='".$result['lambda_3']."'></span>
 				</div>
 			";
 		}else{
 			$out .= "
 				<div class='sepctrometer_lambda'>
					<span>&#955;<sub>黄绿</sub> = <input id='lambda_1' placeholder='点击输入'></span>
					<span>&#955;<sub>黄内</sub> = <input id='lambda_2' placeholder='点击输入'></span>
					<span>&#955;<sub>黄外</sub> = <input id='lambda_3' placeholder='点击输入'></span>
 				</div>
 			";
 		}
 		return $out;
 	}

 	function has_para_lambda(){
 		$obj = new database();
 		return  $obj->has_para_lambda();
 	}



?>



