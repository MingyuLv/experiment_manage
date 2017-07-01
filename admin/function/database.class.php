<?php

class database{
	protected $db;
	protected $tablePrefix = 'physics';
	private $pwdSalt = 'my first project';		//提高加密水平

	function __construct(){
		require_once dirname(__FILE__).'/../config/database.php';
		$this->db = new mysqli(HOSTNAME,HOSTUSER,HOSTPWD,HOSTDB);
		$this->db->query('set names utf8');		//防止查询数据库乱码
	}


	function check_login($user_name, $password){
		$password = md5($this->db->real_escape_string($password).$this->pwdSalt);
		$sql = "SELECT `name`,`level`  FROM `{$this->tablePrefix}_user` WHERE `number`='{$user_name}' AND `password`='{$password}'";
		$result = $this->db->query($sql);
		$result = $result->fetch_assoc();
		if($result){
			return $result;
		}else 
			return false;
	}
	function new_info(){
	//实时更新老师的管理页面，根据字段`ifShow`
		$sql = "SELECT * FROM `physics_course_oscillograph` WHERE `ifShow`=0";
		$result = $this->db->query($sql);
		//$this->db->query("UPDATE `physics_course_oscillograph` SET `ifShow`=1 WHERE `ifShow`=0");
		return $result;
	}

	function evaluating_info(){
	//请求等待评测的数据
		$sql = "SELECT `group_num` FROM `physics_course_oscillograph` WHERE `evaluation`=1";
		$result = $this->db->query($sql);
		return $result;
	}

	function help_info(){
	//向后台请求学生求助的信息
		$sql = "SELECT `group_num` FROM `physics_course_oscillograph` WHERE `seek_help`=1";
		$result = $this->db->query($sql);
		return $result;
	}

	function detail_data($group_num){
		$sql = "SELECT * FROM `physics_course_oscillograph` WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
		return $result;
	}

	function pass($option,$group_num){
		$sql = "UPDATE `physics_course_oscillograph` SET `status_{$option}`=1,`evaluation`=0 WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return 0;
	}

	function fail($option,$group_num){
		$sql = "SELECT `fail_times` FROM `physics_course_oscillograph` WHERE `group_num`={$group_num}";
		$fail_times = $this->db->query($sql);
		$fail_times = (int)($fail_times->fetch_assoc()) + 1;
		$sql = "UPDATE `physics_course_oscillograph` SET `status_{$option}`=1,`fail_times`={$fail_times} WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
		if($result) return 1;
		else return  0;
	}

	function solve_help($group_num){
		$sql = "UPDATE `physics_course_oscillograph` SET `seek_help`=0 WHERE `group_num`={$group_num}";
		$result = $this->db->query($sql);
	}

}