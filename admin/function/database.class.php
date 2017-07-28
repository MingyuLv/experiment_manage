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
		$sql = "SELECT * FROM `{$this->tablePrefix}_course_{$this->tb_name}` WHERE `ifShow`=0 ORDER BY `group_num`" ;
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
		$sql = "SELECT `course_id` FROM `{$this->tablePrefix}_status` WHERE `name`='{$course_name}'";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		$sql = "UPDATE `{$this->tablePrefix}_user` SET `cur_course`={$result['course_id']}";
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
			$sql = "INSERT INTO `{$this->tablePrefix}_data_oscillograph` (
				   `teacher_id`,`exp_name`,`time`,`stu_num`,`stu_name`,`grade`,`help_times`,`fail_times`,`v_std`,`f_std`,`v_up`,`E_v`,`f_up`,`E_f`,
				   `V_DIV`,`Dy`,`TIME_DIV`,`n`,`Dx`,`T`,`Nx1`,`Ny1`,`fy1`,`Nx2`,`Ny2`,`fy2`,`Nx3`,`Ny3`,`fy3`,`Nx4`,`Ny4`,`fy4` ) VALUES (
				   '$user_id','示波器与李萨如图形','$time','{$result['stu_num']}','{$result['stu_name']}','{$result['grade']}','{$result['help_times']}',
				   '{$result['fail_times']}','{$result['v_std']}','{$result['f_std']}','{$result['v_up']}','{$result['E_v']}','{$result['f_up']}','{$result['E_f']}',
				   '{$result['V_DIV']}','{$result['Dy']}','{$result['TIME_DIV']}','{$result['n']}','{$result['Dx']}','{$result['T']}','{$result['Nx1']}','{$result['Ny1']}',
				   '{$result['fy1']}','{$result['Nx2']}','{$result['Ny2']}','{$result['fy2']}','{$result['Nx3']}','{$result['Ny3']}','{$result['fy3']}','{$result['Nx4']}',
				   '{$result['Ny4']}','{$result['fy4']}'  )"; 
			$re = $this->db->query($sql);
				//echo('here');
			//var_dump('here');
			if(!$re) return 0;	
			$re = $this->db->query("INSERT INTO `{$this->tablePrefix}_historicaldata_student` (`stu_num`,`stu_name`,`exp_name_ch`,`exp_name_en`,`help_times`,`fail_times`,`grade`,`time`) VALUES ('{$result['stu_num']}','{$result['stu_name']}','示波器与李萨如图形','oscillograph','{$result['help_times']}','{$result['fail_times']}','{$result['grade']}','$time')");
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
}