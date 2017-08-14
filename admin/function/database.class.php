<?php

class database{
	private $db;
	private $tb_name;			//要操作的数据表名
	private $tablePrefix = 'physics';		//表前缀
	private $pwdSalt = 'my first project';		//提高加密水平

	function __construct($name=null){
		require_once dirname(__FILE__).'/../config/database.php';
		$this->tb_name = $name;
		$this->db = new mysqli(HOSTNAME,HOSTUSER,HOSTPWD,HOSTDB);
		$this->db->query('set names utf8');		//防止查询数据库乱码
	}


	function check_login($user_name, $password){
		$password = md5($this->db->real_escape_string($password).$this->pwdSalt);
		$sql = "SELECT `name`,`level`,`uid`  FROM `{$this->tablePrefix}_user` WHERE `number`='{$user_name}' AND `password`='{$password}'";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		if($result){
			return $result;
		}else 
			return false;
	}
	function new_info(){
	//实时更新老师的管理页面，根据字段`ifShow`
		$sql = "SELECT * FROM `{$this->tablePrefix}_course_{$this->tb_name}` ORDER BY `group_num`" ;
		$result = $this->db->query($sql);
		//$this->db->query("UPDATE `{$this->tablePrefix}_course_{$this->tb_name}` SET `ifShow`=1 WHERE `ifShow`=0");
		return $result;
	}

	function evaluating_info(){
	//请求等待评测的数据
		$sql = "SELECT `group_num` FROM `{$this->tablePrefix}_course_{$this->tb_name}` WHERE `evaluation`=1";
		$result = $this->db->query($sql);
		return $result;
	}

	function help_info(){	
	//向后台请求学生求助的信息
		$sql = "SELECT `group_num` FROM `{$this->tablePrefix}_course_{$this->tb_name}` WHERE `seek_help`=1";
		$result = $this->db->query($sql);
		return $result;
	}

	function detail_data($group_num){
		$sql = "SELECT * FROM `{$this->tablePrefix}_course_{$this->tb_name}` WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
		return $result;
	}

	function pass($option,$group_num){
		$sql = "UPDATE `{$this->tablePrefix}_course_{$this->tb_name}` SET `status_{$option}`=1,`evaluation`=0 WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return 0;
	}

	function fail($option,$group_num){
		$sql = "SELECT `fail_times` FROM `{$this->tablePrefix}_course_{$this->tb_name}` WHERE `group_num`={$group_num}";
		$fail_times = $this->db->query($sql);
		$fail_times = $fail_times->fetch_assoc();
		$fail_times = (int)($fail_times['fail_times']) + 1;
		$sql = "UPDATE `{$this->tablePrefix}_course_{$this->tb_name}` SET `status_{$option}`=0,`fail_times`={$fail_times},`evaluation`=0 WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return  0;
	}

	function solve_help($group_num){
		$sql = "UPDATE `{$this->tablePrefix}_course_{$this->tb_name}` SET `seek_help`=0 WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
	}

	function course_status_start($course_id,$user_id){
		$sql = "UPDATE `{$this->tablePrefix}_status` SET `status`=1,`user_id`={$user_id} WHERE `course_id`={$course_id}";
		$result = $this->db->query($sql);
	}

	function if_cur_course($user_id){
		$sql = "SELECT `cur_course` FROM `{$this->tablePrefix}_user` WHERE `uid`={$user_id}";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		if( $result['cur_course']!= null){
			return 1;
		}else return 0;
	}

	function cur_course_name($user_id){
		$sql = "SELECT `name` FROM `{$this->tablePrefix}_status` WHERE `user_id`={$user_id}";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		return $result['name'];
	}

	function start_course($user_id, $course_name, $classNum){
		$sql = "UPDATE `{$this->tablePrefix}_status` SET `status`=1,`user_id`={$user_id},`class_num`={$classNum} WHERE `name`='{$course_name}'";
		$result = $this->db->query($sql);
		if( $result) return 1;
	}

	function close_course($user_id, $course_name){
		$sql = "UPDATE `{$this->tablePrefix}_status` SET `status`=0,`user_id`=null,`class_num`=null WHERE `name`='{$course_name}'";
		$result = $this->db->query($sql);
		$sql = "UPDATE `{$this->tablePrefix}_user` SET `cur_course`=null WHERE `uid`='{$user_id}'";
		$result1 = $this->db->query($sql);
		if($result && $result1) return 1;
		else 
			return 0;
	}

	function save_data($course_name,$time,$user_id){
		//保存当堂的实验数据，无法做到对不同实验统一函数处理方法
		$result = 0;
		// echo('here');
		// echo("\ncourse_name:".$course_name);
		switch($course_name){
			case 'oscillograph':
				$result = $this->save_data_oscillograph($time, $user_id);
				break;
			case 'potentioneter':
				$result = $this->save_data_potentioneter($time, $user_id);
				break;
			case 'thermal_conductivity':
				$result = $this->save_data_thermal_conductivity($time, $user_id);
				break;
			case 'newton':
				$result = $this->save_data_newton($time, $user_id);
				break;
			default:
				break;
		}
		return $result;
	}

	function save_data_oscillograph($time, $user_id){
		$data = $this->db->query("SELECT * FROM `{$this->tablePrefix}_course_oscillograph`");
		while($result = $data->fetch_assoc()){
			//var_dump($result['stu_num']);
			if($result['stu_num']==null) continue;
			// var_dump($result['remark']);
			$sql = "INSERT INTO `{$this->tablePrefix}_data_oscillograph` (
				   `teacher_id`,`exp_name`,`time`,`stu_num`,`stu_name`,`grade`,`help_times`,`fail_times`,`v_std`,`f_std`,`v_up`,`E_v`,`f_up`,`E_f`,
				   `V_DIV`,`Dy`,`TIME_DIV`,`n`,`Dx`,`T`,`Nx1`,`Ny1`,`fy1`,`Nx2`,`Ny2`,`fy2`,`Nx3`,`Ny3`,`fy3`,`Nx4`,`Ny4`,`fy4`,`remark` ) VALUES (
				   '$user_id','示波器与李萨如图形','$time','{$result['stu_num']}','{$result['stu_name']}','{$result['grade']}','{$result['help_times']}',
				   '{$result['fail_times']}','{$result['v_std']}','{$result['f_std']}','{$result['v_up']}','{$result['E_v']}','{$result['f_up']}','{$result['E_f']}',
				   '{$result['V_DIV']}','{$result['Dy']}','{$result['TIME_DIV']}','{$result['n']}','{$result['Dx']}','{$result['T']}','{$result['Nx1']}','{$result['Ny1']}',
				   '{$result['fy1']}','{$result['Nx2']}','{$result['Ny2']}','{$result['fy2']}','{$result['Nx3']}','{$result['Ny3']}','{$result['fy3']}','{$result['Nx4']}',
				   '{$result['Ny4']}','{$result['fy4']}','{$result['remark']}' 
				)"; 
			$re = $this->db->query($sql);
			// echo('here1');
			//var_dump('here');
			if(!$re) return 0;
			//添加学生的data	
			$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_student` (`stu_num`,`stu_name`,`exp_name_ch`,`exp_name_en`,`help_times`,`fail_times`,`grade`,`time`) VALUES ('{$result['stu_num']}','{$result['stu_name']}','示波器与李萨如图形','oscillograph','{$result['help_times']}','{$result['fail_times']}','{$result['grade']}','$time')");
			// echo('here2');
			if(!$re) return 0;

		}
		//找到teacher的名字
		$teacher = $this->db->query("SELECT `name` FROM `{$this->tablePrefix}_user` WHERE `uid`='$user_id'");
		$teacher = $teacher->fetch_assoc();
		$teacher = $teacher['name'];
		//插入一条课堂记录
		$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_course` (`exp_name`,`time`,`teacher`,`exp_name_en`)VALUES ('示波器与李萨如图形','$time','$teacher','oscillograph')");
		if(!$re) return 0;

		return 1;
	}

	function save_data_potentioneter($time, $user_id){
		$data = $this->db->query("SELECT * FROM `{$this->tablePrefix}_course_potentioneter`");
		while($result = $data->fetch_assoc()){
			//var_dump($result['stu_num']);
			if($result['stu_num']==null) continue;
			$sql = "INSERT INTO `{$this->tablePrefix}_data_potentioneter` (
			 `teacher_id`,`exp_name`,`time`,`stu_num`,`stu_name`,`grade`,`help_times`,`fail_times`,`E`,`E_std`,`E_e`,`U_ab`,`U_0`,`I_s`,`Rab`,`Is`,`U0`,`Uab`,`Lx1`,`Lx2`,`Lx3`,`Lx4`,`Lx5`,`Lx6`,`Lx_ave`,`remark`
			) VALUES (
				'$user_id','电位差计','$time','{$result['stu_num']}','{$result['stu_name']}','{$result['grade']}','{$result['help_times']}','{$result['fail_times']}','{$result['E']}','{$result['E_std']}','{$result['E_e']}','{$result['U_ab']}','{$result['U_0']}','{$result['I_s']}','{$result['Rab']}','{$result['Is']}','{$result['U0']}','{$result['Uab']}','{$result['Lx1']}','{$result['Lx2']}','{$result['Lx3']}','{$result['Lx4']}','{$result['Lx5']}','{$result['Lx6']}','{$result['Lx_ave']}','{$result['remark']}'
			)"; 
			$re = $this->db->query($sql);
			if(!$re) return 0;	
			// echo('here1');
			$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_student` (`stu_num`,`stu_name`,`exp_name_ch`,`exp_name_en`,`help_times`,`fail_times`,`grade`,`time`) VALUES ('{$result['stu_num']}','{$result['stu_name']}','电位差计','potentioneter','{$result['help_times']}','{$result['fail_times']}','{$result['grade']}','$time' )");
			if(!$re) return 0;
			//echo('here2');

		}
		//找到teacher的名字
		$teacher = $this->db->query("SELECT `name` FROM `{$this->tablePrefix}_user` WHERE `uid`='$user_id'");
		$teacher = $teacher->fetch_assoc();
		$teacher = $teacher['name'];
		//插入一条课堂记录
		$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_course` (`exp_name`,`time`,`teacher`,`exp_name_en`)VALUES ('电位差计','$time','$teacher','potentioneter')");
		if(!$re) return 0;

		return 1;
	}

	function save_data_thermal_conductivity($time, $user_id){
		$data = $this->db->query("SELECT * FROM `{$this->tablePrefix}_course_thermal_conductivity`");
		while($result = $data->fetch_assoc()){
			//var_dump($result['stu_num']);
			if($result['stu_num']==null) continue;
			$sql = "INSERT INTO `{$this->tablePrefix}_data_thermal_conductivity` (
			 `teacher_id`,`exp_name`,`time`,`stu_num`,`stu_name`,`grade`,`help_times`,`fail_times`,`T_1`,`T_2`,`t1`,`t2`,`t3`,`t4`,`t5`,`t6`,`t7`,`t8`,`t9`,`t10`,`te1`,`te2`,`te3`,`te4`,`te5`,`te6`,`te7`,`te8`,`te9`,`te10`,`change_rate`,`hb1`,`hb2`,`hb3`,`hb4`,`hb5`,`hb6`,`hb_ave`,`db`,`hc1`,`hc2`,`hc3`,`hc4`,`hc5`,`hc6`,`hc_ave`,`dc`,`m`,`remark`
			) VALUES (
				'$user_id','稳态法测量物体的导热系数','$time','{$result['stu_num']}','{$result['stu_name']}','{$result['grade']}','{$result['help_times']}','{$result['fail_times']}','{$result['T_1']}','{$result['T_2']}','{$result['t1']}','{$result['t2']}','{$result['t3']}','{$result['t4']}','{$result['t5']}','{$result['t6']}','{$result['t7']}','{$result['t8']}','{$result['t9']}','{$result['t10']}','{$result['te1']}','{$result['te2']}','{$result['te3']}','{$result['te4']}','{$result['te5']}','{$result['te6']}','{$result['te7']}','{$result['te8']}','{$result['te9']}','{$result['te10']}','{$result['change_rate']}','{$result['hb1']}','{$result['hb2']}','{$result['hb3']}','{$result['hb4']}','{$result['hb5']}','{$result['hb6']}','{$result['hb_ave']}','{$result['db']}','{$result['hc1']}','{$result['hc2']}','{$result['hc3']}','{$result['hc4']}','{$result['hc5']}','{$result['hc6']}','{$result['hc_ave']}','{$result['dc']}','{$result['m']}','{$result['remark']}'
			)"; 
			$re = $this->db->query($sql);
			if(!$re) return 0;	
			// echo('here1');
			$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_student` (`stu_num`,`stu_name`,`exp_name_ch`,`exp_name_en`,`help_times`,`fail_times`,`grade`,`time`) VALUES ('{$result['stu_num']}','{$result['stu_name']}','稳态法测量物体的导热系数','thermal_conductivity','{$result['help_times']}','{$result['fail_times']}','{$result['grade']}','$time' )");
			if(!$re) return 0;
			// echo('here2');

		}
		//找到teacher的名字
		$teacher = $this->db->query("SELECT `name` FROM `{$this->tablePrefix}_user` WHERE `uid`='$user_id'");
		$teacher = $teacher->fetch_assoc();
		$teacher = $teacher['name'];
		//插入一条课堂记录
		$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_course` (`exp_name`,`time`,`teacher`,`exp_name_en`)VALUES ('稳态法测量物体的导热系数','$time','$teacher','thermal_conductivity')");
		if(!$re) return 0;

		return 1;
	}

	function save_data_newton($time, $user_id){
		$data = $this->db->query("SELECT * FROM `{$this->tablePrefix}_course_newton`");
		while($result = $data->fetch_assoc()){
			//var_dump($result['stu_num']);
			if($result['stu_num']==null) continue;
			$sql = "INSERT INTO `{$this->tablePrefix}_data_newton` (
			 `teacher_id`,`exp_name`,`time`,`stu_num`,`stu_name`,`grade`,`help_times`,`fail_times`,`radius`,`L6`,`L7`,`L8`,`L9`,`L10`,`L11`,`L12`,`L13`,`L14`,`L15`,`R6`,`R7`,`R8`,`R9`,`R10`,`R11`,`R12`,`R13`,`R14`,`R15`,`d6`,`d7`,`d8`,`d9`,`d10`,`d11`,`d12`,`d13`,`d14`,`d15`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`q13`,`q14`,`q15`,`remark`
			) VALUES (
				'$user_id','光的干涉--牛顿环','$time','{$result['stu_num']}','{$result['stu_name']}','{$result['grade']}','{$result['help_times']}','{$result['fail_times']}','{$result['radius']}','{$result['L6']}','{$result['L7']}','{$result['L8']}','{$result['L9']}','{$result['L10']}','{$result['L11']}','{$result['L12']}','{$result['L13']}','{$result['L14']}','{$result['L15']}','{$result['R6']}','{$result['R7']}','{$result['R8']}','{$result['R9']}','{$result['R10']}','{$result['R11']}','{$result['R12']}','{$result['R13']}','{$result['R14']}','{$result['R15']}','{$result['d6']}','{$result['d7']}','{$result['d8']}','{$result['d9']}','{$result['d10']}','{$result['d11']}','{$result['d12']}','{$result['d13']}','{$result['d14']}','{$result['d15']}','{$result['q6']}','{$result['q7']}','{$result['q8']}','{$result['q9']}','{$result['q10']}','{$result['q11']}','{$result['q12']}','{$result['q13']}','{$result['q14']}','{$result['q15']}','{$result['remark']}'
			)"; 
			$re = $this->db->query($sql);
			if(!$re) return 0;	
			 // echo('here1');
			$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_student` (`stu_num`,`stu_name`,`exp_name_ch`,`exp_name_en`,`help_times`,`fail_times`,`grade`,`time`) VALUES ('{$result['stu_num']}','{$result['stu_name']}','光的干涉--牛顿环','newton','{$result['help_times']}','{$result['fail_times']}','{$result['grade']}','$time' )");
			if(!$re) return 0;
			 // echo('here2');

		}
		//找到teacher的名字
		$teacher = $this->db->query("SELECT `name` FROM `{$this->tablePrefix}_user` WHERE `uid`='$user_id'");
		$teacher = $teacher->fetch_assoc();
		$teacher = $teacher['name'];
		//插入一条课堂记录
		$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_course` (`exp_name`,`time`,`teacher`,`exp_name_en`)VALUES ('光的干涉--牛顿环','$time','$teacher','newton')");
		if(!$re) return 0;

		return 1;
	}

	function change_pwd($user_id,$old_pwd,$new_pwd){
		$sql = "SELECT `password` FROM `{$this->tablePrefix}_user` WHERE `uid`='$user_id' ";
		$pwd_db = $this->db->query($sql);
		$pwd_db = $pwd_db->fetch_assoc();
		$old_pwd = md5($this->db->real_escape_string($old_pwd).$this->pwdSalt);
		$result = null;
		// echo($old_pwd."\n");
		// echo($pwd_db['password']);
		if( $old_pwd === $pwd_db['password']){
			$new_pwd = md5($this->db->real_escape_string($new_pwd).$this->pwdSalt);
			$sql = "UPDATE `{$this->tablePrefix}_user` SET `password`='$new_pwd'";
			$result =  $this->db->query($sql);
		}
		if( !$result) return 0;
		else 
			return 1;
	}

	function search_info_num($stu_num){
		$sql = "SELECT * FROM `{$this->tablePrefix}_historicaldata_student` WHERE `stu_num`='$stu_num'";
		$result = $this->db->query($sql);
		return $result;
	}

	function search_info_date($date){
		$year = substr($date,0,4);
		$month = substr($date,5,2);
		$day = substr($date,8,2);	
		$date_db = $year."/".$month."/".$day;
		$sql = "SELECT * FROM `{$this->tablePrefix}_historicaldata_course` WHERE `time` REGEXP '{$date_db}'";
		$result = $this->db->query($sql);
		return $result;	
	}

	function cur_course_name_close($user_id){
		//echo($user_id);
		$sql = "SELECT `name` FROM `{$this->tablePrefix}_status` WHERE `user_id`='$user_id' ";
		$result = $this->db->query($sql);
		return $result;
	}

	function show_detail_via_stu_num($stu_num){
		$sql = "SELECT * FROM `{$this->tablePrefix}_data_{$this->tb_name}` WHERE `stu_num`={$stu_num}";
		$result = $this->db->query($sql);
		return  $result;
	}

	function show_detail_via_date($exp_time){
		$sql = "SELECT * FROM `{$this->tablePrefix}_historicaldata_student` WHERE `time`='{$exp_time}'";
		$result = $this->db->query($sql);
		return  $result;
	}
	function return_from_exp_data($stu_num, $time){
		$sql = "SELECT * FROM `{$this->tablePrefix}_data_{$this->tb_name}` WHERE `stu_num`='{$stu_num}' AND `time`='{$time}'";
		$result = $this->db->query($sql);
		return  $result;
	}

	function user_manage(){
		$sql = "SELECT * FROM `{$this->tablePrefix}_user`";
		$result = $this->db->query($sql);
		return  $result;
	}

	function admin_change_pwd($new_pwd, $number){
		// echo $new_pwd;
		// echo $number;
		$pwd_hash = md5($this->db->real_escape_string($new_pwd).$this->pwdSalt);
		$sql = "UPDATE `{$this->tablePrefix}_user` SET `password`='$pwd_hash', `pwd`='$new_pwd' WHERE `number`='$number'";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return 0;
	}
	function admin_delete_user($number){
		$sql = "DELETE FROM `{$this->tablePrefix}_user` WHERE `number`='$number'";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return 0;
	}

	function add_user($number, $user_name, $pwd){
		$pwd_hash = md5($this->db->real_escape_string($pwd).$this->pwdSalt);
		$sql = "INSERT INTO `{$this->tablePrefix}_user` (`level`,`number`,`name`,`password`,`pwd`) VALUES ('2','$number','$user_name','$pwd_hash','$pwd')";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return 0;
	}

	function remark_submit($group_num, $remark, $grade_modified){
		// echo($remark);
		// var_dump($grade_modified);
		if($remark != ''){
			// echo"here1";
			$re1 = $this->db->query("UPDATE `{$this->tablePrefix}_course_{$this->tb_name}` SET `remark`='$remark' WHERE `group_num`='$group_num'");
			if(!$re1) return 0;
		}
		if($grade_modified != ''){
			// echo("here2");
			$re2 = $this->db->query("UPDATE `{$this->tablePrefix}_course_{$this->tb_name}` SET `grade`='$grade_modified' WHERE `group_num`='$group_num'");
			if(!$re2) return 0;
		}
		
		return 1;
	}

	function set_parameter($exp_name){
		switch($exp_name){
			case 'oscillograph':
				for( $i = 1; $i <= 40; $i++){
					$v_std = rand(1,8)*0.5 + 1;
					$v_std = sprintf("%.1f",$v_std);   //Vp-p在1V到5V之间，间隔0.5V
					$f_std = rand(1,18)*50 + 100;	   //f在100hz到1000hz之间，间隔步进50hz。
					$this->db->query("UPDATE `{$this->tablePrefix}_course_oscillograph` SET `v_std`='$v_std',`f_std`='$f_std' WHERE `group_num`='$i'");
				}
				$result = $this->db->query("SELECT `group_num`,`v_std`,`f_std` FROM `{$this->tablePrefix}_course_{$this->tb_name}` ORDER BY 'group_num'");
				break;
			case 'potentioneter':
				for( $i = 1; $i <= 40; $i++){
					$E_std = rand(1,8)*0.5 + 1;
					$E_std = sprintf("%.1f",$E_std);   //Exs范围： 
					$this->db->query("UPDATE `{$this->tablePrefix}_course_oscillograph` SET `E_std`='$E_std' WHERE `group_num`='$i'");
				}
				$result = $this->db->query("SELECT `group_num`,`E_std` FROM `{$this->tablePrefix}_course_{$this->tb_name}` ORDER BY 'group_num'");
				break;
			default:
				$result = null; 
				break;
		}
		return $result;
	}

	function query_parameter_oscillograph(){
		$result = $this->db->query("SELECT `group_num`,`v_std`,`f_std` FROM `{$this->tablePrefix}_course_{$this->tb_name}` ORDER BY 'group_num'");
		return $result;
	}

	function query_parameter_potentioneter(){
		$result = $this->db->query("SELECT `group_num`,`E_std` FROM `{$this->tablePrefix}_course_{$this->tb_name}` ORDER BY 'group_num'");
		return $result;
	}

	function change_parameter_oscillograph($group_num, $v_std, $f_std){
		$result = $this->db->query("UPDATE `{$this->tablePrefix}_course_oscillograph` SET `v_std`='$v_std',`f_std`='$f_std' WHERE `group_num`='$group_num'");
		if( $result) return 1;
		else return 0;
	}

	function change_parameter_potentioneter($group_num, $E_std){
		$result = $this->db->query("UPDATE `{$this->tablePrefix}_course_potentioneter` SET `E_std`='$E_std' WHERE `group_num`='$group_num'");
		if( $result) return 1;
		else return 0;
	}

	function modified_course_status($exp_name, $user_id){
		$sql = "SELECT `course_id` FROM `{$this->tablePrefix}_status` WHERE `name`='{$exp_name}'";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		$sql = "UPDATE `{$this->tablePrefix}_user` SET `cur_course`={$result['course_id']}";
		$result = $this->db->query($sql);
		if($result)
			return 1;
		else return 0;
	}

	function modified_course_status_newton($user_id, $para){
		// vardump($para);
		$para = json_decode($para);

		// for($i = 4; $i<=40; $i++){
		// 	$this->db->query("INSERT INTO `physics_course_newton` (`group_num`, `stu_num`, `stu_name`, `grade`, `help_times`, `fail_times`, `evaluation`, `radius`, `L6`, `L7`, `L8`, `L9`, `L10`, `L11`, `L12`, `L13`, `L14`, `L15`, `R6`, `R7`, `R8`, `R9`, `R10`, `R11`, `R12`, `R13`, `R14`, `R15`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `status_1`, `remark`) VALUES ('$i', '081510311', '1212', '12', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '')");
		// }


		for($i = 1; $i<=40; $i++){
			$data = $para[$i-1];
			// echo $data;
			// sleep(1000);
			$result = $this->db->query("UPDATE `physics_course_newton` SET `radius`='$data' WHERE `group_num`='$i'");
			if(!$result) return 0;
		}

		//教师插入上课记录
		$sql = "SELECT `course_id` FROM `{$this->tablePrefix}_status` WHERE `name`='newton'";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		$sql = "UPDATE `{$this->tablePrefix}_user` SET `cur_course`={$result['course_id']}";
		$result = $this->db->query($sql);
	    // echo('gaga');
		if(!$result)
			return 0;
		return 1;
	}

	function has_para_newton(){
		$result = $this->db->query("SELECT `radius` FROM `{$this->tablePrefix}_course_newton` WHERE `radius`");
		// var_dump($result);
		if( ($result->num_rows) == 0) return null;
		else return $result;
	}
}