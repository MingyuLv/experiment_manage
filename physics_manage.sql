-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-03 02:05:58
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `physics_manage`
--

-- --------------------------------------------------------

--
-- 表的结构 `physics_course_oscillograph`
--

CREATE TABLE `physics_course_oscillograph` (
  `group_num` int(3) NOT NULL,
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `grade` int(3) DEFAULT NULL,
  `help_times` int(3) DEFAULT '0',
  `fail_times` int(3) DEFAULT '0',
  `evaluation` int(3) DEFAULT '0',
  `v_std` float NOT NULL DEFAULT '-1',
  `f_std` float NOT NULL DEFAULT '-1',
  `v_up` varchar(10) DEFAULT NULL,
  `E_v` varchar(10) DEFAULT NULL,
  `f_up` varchar(10) DEFAULT NULL,
  `E_f` varchar(10) DEFAULT NULL,
  `V_DIV` varchar(10) DEFAULT NULL,
  `Dy` varchar(10) DEFAULT NULL,
  `TIME_DIV` varchar(10) DEFAULT NULL,
  `n` varchar(10) DEFAULT NULL,
  `Dx` varchar(10) DEFAULT NULL,
  `T` varchar(10) DEFAULT NULL,
  `status_1` int(1) DEFAULT NULL COMMENT '试验(1)的状态，0为未提交，1为通过，2为待评测',
  `Nx1` varchar(3) DEFAULT NULL,
  `Ny1` varchar(3) DEFAULT NULL,
  `fy1` varchar(5) DEFAULT NULL,
  `Nx2` varchar(3) DEFAULT NULL,
  `Ny2` varchar(3) DEFAULT NULL,
  `fy2` varchar(5) DEFAULT NULL,
  `Nx3` varchar(3) DEFAULT NULL,
  `Ny3` varchar(3) DEFAULT NULL,
  `fy3` varchar(5) DEFAULT NULL,
  `Nx4` varchar(3) DEFAULT NULL,
  `Ny4` varchar(3) DEFAULT NULL,
  `fy4` varchar(5) DEFAULT NULL,
  `status_2` int(1) DEFAULT NULL,
  `seek_help` int(1) NOT NULL DEFAULT '0' COMMENT '求助信息',
  `remark` varchar(1000) NOT NULL DEFAULT '无'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_oscillograph`
--

INSERT INTO `physics_course_oscillograph` (`group_num`, `stu_num`, `stu_name`, `grade`, `help_times`, `fail_times`, `evaluation`, `v_std`, `f_std`, `v_up`, `E_v`, `f_up`, `E_f`, `V_DIV`, `Dy`, `TIME_DIV`, `n`, `Dx`, `T`, `status_1`, `Nx1`, `Ny1`, `fy1`, `Nx2`, `Ny2`, `fy2`, `Nx3`, `Ny3`, `fy3`, `Nx4`, `Ny4`, `fy4`, `status_2`, `seek_help`, `remark`) VALUES
(3, '081510126', 'Lvmingyu', 100, 3, 2, 0, 2, 200, '1.2', '1.0%', '3000', '3.0%', '6', '5.1', '10', '1', '1', '1', 0, '2', '4', '250', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(1, '081510127', '山下', 22, 1, 2, 0, 2, 200, '2.5', '25%', '199', '0.5%', '3', '200', '3', '90', '2', '3', 1, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 2, 0, '无'),
(4, '081510113', 'Zhenxing', 100, 0, 2, 1, 2, 200, '1.1', '1.1%', '2900', '0.8%', '4', '3.7', '13', '1', '7', '3', 2, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(5, '081510105', 'Irving', 59, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '该生上课不认真'),
(6, '081510106', 'McGrady', 100, 0, 3, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(7, '081510107', 'James', 100, 0, 2, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(8, '081510108', 'Paul', 100, 0, 1, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(9, '081510109', 'George', 22, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 1, '无'),
(10, '081510110', 'Pierce', 100, 0, 2, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(11, '081510111', 'Iverson', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(12, '081510112', 'Lillard', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(13, '081510113', 'Jordan', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(14, '081510114', 'Michael', 100, 0, 0, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 2, 1, '无'),
(15, '081510115', 'Kay', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(16, '081510116', 'Jimmy', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(17, '081510117', 'YaoMing', 100, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(18, '081510118', 'Curry', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(19, '081510119', 'Johnson', 100, 0, 1, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(20, '081510120', 'Park', 100, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(21, '081510121', 'Duncan', 100, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(22, '081510122', 'Ray', 100, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(23, '081510123', 'Wade', 100, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, '无'),
(24, '081510124', 'Love', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, '无'),
(25, '081510125', 'Manu', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(26, '081510126', 'Pippen', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(27, '081510188', 'McCollum', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(28, '081510128', 'Durant', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(29, '081510129', 'Westbrook', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(30, '081510130', 'Harden', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(31, '081510131', 'Gordon', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(32, '081510132', 'Garnett', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(33, '081510133', 'Ben', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(34, '081510134', 'Bryant', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(35, '081510135', 'Miller', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(36, '081510136', 'Wall', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(37, '081510137', 'Simmons', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(38, '081510138', 'Thompson', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(39, '081510139', 'Thomas', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(40, '081510140', 'Embiid', 100, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '无'),
(2, NULL, NULL, NULL, NULL, NULL, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '无');

-- --------------------------------------------------------

--
-- 表的结构 `physics_course_potentioneter`
--

CREATE TABLE `physics_course_potentioneter` (
  `group_num` int(3) NOT NULL,
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `help_times` int(3) DEFAULT '0',
  `fail_times` int(3) DEFAULT '0',
  `grade` int(3) DEFAULT NULL,
  `seek_help` int(1) NOT NULL DEFAULT '0' COMMENT '求助信息',
  `evaluation` int(3) NOT NULL DEFAULT '0',
  `E` varchar(10) DEFAULT NULL,
  `E_std` float DEFAULT NULL,
  `E_e` varchar(10) DEFAULT NULL,
  `U_ab` float DEFAULT NULL,
  `U_0` varchar(10) DEFAULT NULL,
  `I_s` varchar(10) DEFAULT NULL,
  `Rab` varchar(10) DEFAULT NULL,
  `Is` varchar(10) DEFAULT NULL,
  `U0` varchar(10) DEFAULT NULL,
  `Uab` float DEFAULT NULL,
  `status_1` int(1) DEFAULT NULL COMMENT '试验(1)的状态，0为未提交，1为通过，2为待评测',
  `Lx1` varchar(20) DEFAULT NULL,
  `Lx2` varchar(20) DEFAULT NULL,
  `Lx3` varchar(20) DEFAULT NULL,
  `Lx4` varchar(20) DEFAULT NULL,
  `Lx5` varchar(20) DEFAULT NULL,
  `Lx6` varchar(20) DEFAULT NULL,
  `Lx_ave` varchar(20) DEFAULT NULL,
  `status_2` int(1) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_potentioneter`
--

INSERT INTO `physics_course_potentioneter` (`group_num`, `stu_num`, `stu_name`, `help_times`, `fail_times`, `grade`, `seek_help`, `evaluation`, `E`, `E_std`, `E_e`, `U_ab`, `U_0`, `I_s`, `Rab`, `Is`, `U0`, `Uab`, `status_1`, `Lx1`, `Lx2`, `Lx3`, `Lx4`, `Lx5`, `Lx6`, `Lx_ave`, `status_2`, `remark`) VALUES
(1, '081510227', 'shanxia', 0, 1, 22, 1, 1, '2', 3, '33.33%', 2, '2', '0.1234', '2', '2', '1.2345', 0.23451, 0, '2', '2', '2', '2', '2', '2', '2', 2, 'e'),
(2, '081510211', 'Jake', 0, 0, 0, 1, 1, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, 1, '2', '2', '2', '2', '2', '2', '2', 2, ''),
(3, '081510212', 'Mike', 0, 1, 100, 0, 1, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, 0, '2', '2', '2', '2', '2', '2', '2', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `physics_course_thermal_conductivity`
--

CREATE TABLE `physics_course_thermal_conductivity` (
  `group_num` int(3) NOT NULL,
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `grade` int(3) DEFAULT NULL,
  `help_times` int(3) NOT NULL DEFAULT '0',
  `fail_times` int(3) NOT NULL DEFAULT '0',
  `evaluation` int(3) NOT NULL DEFAULT '0',
  `T_1` varchar(8) DEFAULT NULL,
  `T_2` varchar(8) DEFAULT NULL,
  `t1` varchar(5) DEFAULT NULL,
  `t2` varchar(5) DEFAULT NULL,
  `t3` varchar(5) DEFAULT NULL,
  `t4` varchar(5) DEFAULT NULL,
  `t5` varchar(5) DEFAULT NULL,
  `t6` varchar(5) DEFAULT NULL,
  `t7` varchar(5) DEFAULT NULL,
  `t8` varchar(5) DEFAULT NULL,
  `t9` varchar(5) DEFAULT NULL,
  `t10` varchar(5) DEFAULT NULL,
  `te1` varchar(8) DEFAULT NULL,
  `te2` varchar(8) DEFAULT NULL,
  `te3` varchar(8) DEFAULT NULL,
  `te4` varchar(8) DEFAULT NULL,
  `te5` varchar(8) DEFAULT NULL,
  `te6` varchar(8) DEFAULT NULL,
  `te7` varchar(8) DEFAULT NULL,
  `te8` varchar(8) DEFAULT NULL,
  `te9` varchar(8) DEFAULT NULL,
  `te10` varchar(8) DEFAULT NULL,
  `change_rate` varchar(8) DEFAULT NULL,
  `hb1` varchar(8) DEFAULT NULL,
  `hb2` varchar(8) DEFAULT NULL,
  `hb3` varchar(8) DEFAULT NULL,
  `hb4` varchar(8) DEFAULT NULL,
  `hb5` varchar(8) DEFAULT NULL,
  `hb6` varchar(8) DEFAULT NULL,
  `hb_ave` varchar(8) DEFAULT NULL,
  `db` varchar(8) DEFAULT NULL,
  `status_1` int(1) DEFAULT NULL,
  `hc1` varchar(8) DEFAULT NULL,
  `hc2` varchar(8) DEFAULT NULL,
  `h3` varchar(8) DEFAULT NULL,
  `h4` varchar(8) DEFAULT NULL,
  `h5` varchar(8) DEFAULT NULL,
  `h6` varchar(8) DEFAULT NULL,
  `h7` varchar(8) DEFAULT NULL,
  `dc` varchar(8) DEFAULT NULL,
  `m` varchar(8) DEFAULT NULL,
  `status_2` int(1) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_thermal_conductivity`
--

INSERT INTO `physics_course_thermal_conductivity` (`group_num`, `stu_num`, `stu_name`, `grade`, `help_times`, `fail_times`, `evaluation`, `T_1`, `T_2`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `t7`, `t8`, `t9`, `t10`, `te1`, `te2`, `te3`, `te4`, `te5`, `te6`, `te7`, `te8`, `te9`, `te10`, `change_rate`, `hb1`, `hb2`, `hb3`, `hb4`, `hb5`, `hb6`, `hb_ave`, `db`, `status_1`, `hc1`, `hc2`, `h3`, `h4`, `h5`, `h6`, `h7`, `dc`, `m`, `status_2`, `remark`) VALUES
(1, '081111111', 'test', 100, 0, 0, 0, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1%', '1', '1', '1', '1', '11', '11', '1', '1', 0, '1', '1', '1', '1', '1', '1', '1', '1', '1', 0, ''),
(2, '061510231', 'Jake', 89, 0, 0, 0, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '222', '22', '2', '2', '2', '2', 0, '2', '2', '2', '2', '2', '2', '2', '2', '22', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `physics_data_oscillograph`
--

CREATE TABLE `physics_data_oscillograph` (
  `order` int(10) NOT NULL,
  `teacher_id` int(2) NOT NULL,
  `exp_name` varchar(30) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `help_times` int(3) DEFAULT '0',
  `fail_times` int(3) DEFAULT '0',
  `grade` int(3) DEFAULT NULL,
  `v_std` float NOT NULL DEFAULT '-1',
  `f_std` float NOT NULL DEFAULT '-1',
  `v_up` varchar(10) DEFAULT NULL,
  `E_v` varchar(10) DEFAULT NULL,
  `f_up` varchar(10) DEFAULT NULL,
  `E_f` varchar(10) DEFAULT NULL,
  `V_DIV` varchar(10) DEFAULT NULL,
  `Dy` varchar(10) DEFAULT NULL,
  `TIME_DIV` varchar(10) DEFAULT NULL,
  `n` varchar(10) DEFAULT NULL,
  `Dx` varchar(10) DEFAULT NULL,
  `T` varchar(10) DEFAULT NULL,
  `Nx1` varchar(3) DEFAULT NULL,
  `Ny1` varchar(3) DEFAULT NULL,
  `fy1` varchar(5) DEFAULT NULL,
  `Nx2` varchar(3) DEFAULT NULL,
  `Ny2` varchar(3) DEFAULT NULL,
  `fy2` varchar(5) DEFAULT NULL,
  `Nx3` varchar(3) DEFAULT NULL,
  `Ny3` varchar(3) DEFAULT NULL,
  `fy3` varchar(5) DEFAULT NULL,
  `Nx4` varchar(3) DEFAULT NULL,
  `Ny4` varchar(3) DEFAULT NULL,
  `fy4` varchar(5) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_data_oscillograph`
--

INSERT INTO `physics_data_oscillograph` (`order`, `teacher_id`, `exp_name`, `time`, `stu_num`, `stu_name`, `help_times`, `fail_times`, `grade`, `v_std`, `f_std`, `v_up`, `E_v`, `f_up`, `E_f`, `V_DIV`, `Dy`, `TIME_DIV`, `n`, `Dx`, `T`, `Nx1`, `Ny1`, `fy1`, `Nx2`, `Ny2`, `fy2`, `Nx3`, `Ny3`, `fy3`, `Nx4`, `Ny4`, `fy4`, `remark`) VALUES
(2, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510126', 'Lvmingyu', 3, 2, 100, 2, 200, '1.2', '1.0%', '3000', '3.0%', '6', '5.1', '10', '1', '1', '1', '2', '4', '250', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(3, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510127', '山下', 1, 2, 22, 2, 200, '2.5', '25%', '199', '0.5%', '3', '200', '3', '90', '2', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '无'),
(4, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510113', 'Zhenxing', 0, 2, 100, 2, 200, '1.1', '1.1%', '2900', '0.8%', '4', '3.7', '13', '1', '7', '3', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(5, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510105', 'Irving', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(6, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510106', 'McGrady', 0, 3, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(7, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510107', 'James', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(8, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510108', 'Paul', 0, 1, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(9, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510109', 'George', 0, 0, 22, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(10, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510110', 'Pierce', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(11, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510111', 'Iverson', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(12, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510112', 'Lillard', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(13, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510113', 'Jordan', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(14, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510114', 'Michael', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(15, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510115', 'Kay', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(16, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510116', 'Jimmy', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(17, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510117', 'YaoMing', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(18, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510118', 'Curry', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(19, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510119', 'Johnson', 0, 1, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(20, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510120', 'Park', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(21, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510121', 'Duncan', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(22, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510122', 'Ray', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(23, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510123', 'Wade', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(24, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510124', 'Love', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(25, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510125', 'Manu', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(26, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510126', 'Pippen', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(27, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510188', 'McCollum', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(28, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510128', 'Durant', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(29, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510129', 'Westbrook', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(30, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510130', 'Harden', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(31, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510131', 'Gordon', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(32, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510132', 'Garnett', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(33, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510133', 'Ben', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(34, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510134', 'Bryant', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(35, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510135', 'Miller', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(36, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510136', 'Wall', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(37, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510137', 'Simmons', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(38, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510138', 'Thompson', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(39, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510139', 'Thomas', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(40, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510140', 'Embiid', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(41, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510126', 'Lvmingyu', 3, 2, 100, 2, 200, '1.2', '1.0%', '3000', '3.0%', '6', '5.1', '10', '1', '1', '1', '2', '4', '250', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(42, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510127', '山下', 1, 2, 22, 2, 200, '2.5', '25%', '199', '0.5%', '3', '200', '3', '90', '2', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '无'),
(43, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510113', 'Zhenxing', 0, 2, 100, 2, 200, '1.1', '1.1%', '2900', '0.8%', '4', '3.7', '13', '1', '7', '3', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(44, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510105', 'Irving', 0, 2, 59, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '该生上课不认真'),
(45, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510106', 'McGrady', 0, 3, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(46, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510107', 'James', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(47, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510108', 'Paul', 0, 1, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(48, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510109', 'George', 0, 0, 22, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(49, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510110', 'Pierce', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(50, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510111', 'Iverson', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(51, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510112', 'Lillard', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(52, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510113', 'Jordan', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(53, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510114', 'Michael', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(54, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510115', 'Kay', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(55, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510116', 'Jimmy', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(56, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510117', 'YaoMing', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(57, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510118', 'Curry', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(58, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510119', 'Johnson', 0, 1, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(59, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510120', 'Park', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(60, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510121', 'Duncan', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(61, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510122', 'Ray', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(62, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510123', 'Wade', 0, 2, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(63, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510124', 'Love', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', '无'),
(64, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510125', 'Manu', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(65, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510126', 'Pippen', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(66, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510188', 'McCollum', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(67, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510128', 'Durant', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(68, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510129', 'Westbrook', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(69, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510130', 'Harden', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(70, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510131', 'Gordon', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(71, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510132', 'Garnett', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(72, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510133', 'Ben', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(73, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510134', 'Bryant', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(74, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510135', 'Miller', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(75, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510136', 'Wall', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(76, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510137', 'Simmons', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(77, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510138', 'Thompson', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(78, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510139', 'Thomas', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无'),
(79, 2, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '081510140', 'Embiid', 0, 0, 100, 2, 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '无');

-- --------------------------------------------------------

--
-- 表的结构 `physics_data_potentioneter`
--

CREATE TABLE `physics_data_potentioneter` (
  `teacher_id` int(2) NOT NULL DEFAULT '0',
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `exp_name` varchar(30) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `help_times` int(3) NOT NULL DEFAULT '0',
  `fail_times` int(3) NOT NULL DEFAULT '0',
  `grade` int(3) DEFAULT NULL,
  `E` varchar(10) DEFAULT NULL,
  `E_std` float DEFAULT NULL,
  `E_e` varchar(10) DEFAULT NULL,
  `U_ab` float DEFAULT NULL,
  `U_0` varchar(10) DEFAULT NULL,
  `I_s` varchar(10) DEFAULT NULL,
  `Rab` varchar(10) DEFAULT NULL,
  `Is` varchar(10) DEFAULT NULL,
  `U0` varchar(10) DEFAULT NULL,
  `Uab` float DEFAULT NULL,
  `Lx1` varchar(3) DEFAULT NULL,
  `Lx2` varchar(3) DEFAULT NULL,
  `Lx3` varchar(5) DEFAULT NULL,
  `Lx4` varchar(3) DEFAULT NULL,
  `Lx5` varchar(3) DEFAULT NULL,
  `Lx6` varchar(5) DEFAULT NULL,
  `Lx_ave` varchar(3) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_data_potentioneter`
--

INSERT INTO `physics_data_potentioneter` (`teacher_id`, `stu_num`, `stu_name`, `exp_name`, `time`, `help_times`, `fail_times`, `grade`, `E`, `E_std`, `E_e`, `U_ab`, `U_0`, `I_s`, `Rab`, `Is`, `U0`, `Uab`, `Lx1`, `Lx2`, `Lx3`, `Lx4`, `Lx5`, `Lx6`, `Lx_ave`, `remark`) VALUES
(2, '081510227', 'shanxia', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 22, '2', 3, '33.33%', 2, '2', '0.1234', '2', '2', '1.2345', 0.23451, '2', '2', '2', '2', '2', '2', '2', 'e'),
(2, '081510227', 'shanxia', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 22, '2', 3, '33.33%', 2, '2', '0.1234', '2', '2', '1.2345', 0.23451, '2', '2', '2', '2', '2', '2', '2', 'e'),
(2, '081510211', 'Jake', '电位差计', '2017/08/03 8:00--9:45', 0, 0, 0, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', ''),
(2, '081510212', 'Mike', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 100, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', ''),
(2, '081510227', 'shanxia', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 22, '2', 3, '33.33%', 2, '2', '0.1234', '2', '2', '1.2345', 0.23451, '2', '2', '2', '2', '2', '2', '2', 'e'),
(2, '081510211', 'Jake', '电位差计', '2017/08/03 8:00--9:45', 0, 0, 0, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', ''),
(2, '081510212', 'Mike', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 100, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', ''),
(2, '081510227', 'shanxia', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 22, '2', 3, '33.33%', 2, '2', '0.1234', '2', '2', '1.2345', 0.23451, '2', '2', '2', '2', '2', '2', '2', 'e'),
(2, '081510211', 'Jake', '电位差计', '2017/08/03 8:00--9:45', 0, 0, 0, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', ''),
(2, '081510212', 'Mike', '电位差计', '2017/08/03 8:00--9:45', 0, 1, 100, '2', 2, '2', 2, '2', '2', '2', '2', '2', 2, '2', '2', '2', '2', '2', '2', '2', ''),
(1, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `physics_data_thermal_conductivity`
--

CREATE TABLE `physics_data_thermal_conductivity` (
  `teacher_id` int(2) NOT NULL DEFAULT '0',
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `exp_name` varchar(30) DEFAULT NULL,
  `grade` int(3) DEFAULT NULL,
  `help_times` int(3) NOT NULL DEFAULT '0',
  `fail_times` int(3) NOT NULL DEFAULT '0',
  `time` varchar(30) DEFAULT NULL,
  `T_1` varchar(8) DEFAULT NULL,
  `T_2` varchar(8) DEFAULT NULL,
  `t1` varchar(5) DEFAULT NULL,
  `t2` varchar(5) DEFAULT NULL,
  `t3` varchar(5) DEFAULT NULL,
  `t4` varchar(5) DEFAULT NULL,
  `t5` varchar(5) DEFAULT NULL,
  `t6` varchar(5) DEFAULT NULL,
  `t7` varchar(5) DEFAULT NULL,
  `t8` varchar(5) DEFAULT NULL,
  `t9` varchar(5) DEFAULT NULL,
  `t10` varchar(5) DEFAULT NULL,
  `te1` varchar(8) DEFAULT NULL,
  `te2` varchar(8) DEFAULT NULL,
  `te3` varchar(8) DEFAULT NULL,
  `te4` varchar(8) DEFAULT NULL,
  `te5` varchar(8) DEFAULT NULL,
  `te6` varchar(8) DEFAULT NULL,
  `te7` varchar(8) DEFAULT NULL,
  `te8` varchar(8) DEFAULT NULL,
  `te9` varchar(8) DEFAULT NULL,
  `te10` varchar(8) DEFAULT NULL,
  `change_rate` varchar(8) DEFAULT NULL,
  `hb1` varchar(8) DEFAULT NULL,
  `hb2` varchar(8) DEFAULT NULL,
  `hb3` varchar(8) DEFAULT NULL,
  `hb4` varchar(8) DEFAULT NULL,
  `hb5` varchar(8) DEFAULT NULL,
  `hb6` varchar(8) DEFAULT NULL,
  `hb_ave` varchar(8) DEFAULT NULL,
  `db` varchar(8) DEFAULT NULL,
  `hc1` varchar(8) DEFAULT NULL,
  `hc2` varchar(8) DEFAULT NULL,
  `h3` varchar(8) DEFAULT NULL,
  `h4` varchar(8) DEFAULT NULL,
  `h5` varchar(8) DEFAULT NULL,
  `h6` varchar(8) DEFAULT NULL,
  `h7` varchar(8) DEFAULT NULL,
  `dc` varchar(8) DEFAULT NULL,
  `m` varchar(8) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `physics_historicaldata_course`
--

CREATE TABLE `physics_historicaldata_course` (
  `order` int(10) NOT NULL,
  `exp_name` varchar(50) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `teacher` varchar(20) DEFAULT NULL,
  `exp_name_en` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_historicaldata_course`
--

INSERT INTO `physics_historicaldata_course` (`order`, `exp_name`, `time`, `teacher`, `exp_name_en`) VALUES
(1, '示波器与李萨如图形', '2017/07/29 16:15--18:00', '徐涛涛', 'oscillograph'),
(2, '示波器与李萨如图形', '2017/07/29 16:15--18:00', '徐涛涛', 'oscillograph'),
(3, '电位差计', '2017/07/29 16:15--18:00', '徐涛涛', 'potentioneter'),
(4, '电位差计', '2017/07/29 16:15--18:00', '徐涛涛', 'potentioneter'),
(5, '电位差计', '2017/08/01 16:15--18:00', '徐涛涛', 'potentioneter'),
(6, '电位差计', '2017/08/02 8:00--9:45', '徐涛涛', 'potentioneter'),
(7, '示波器与李萨如图形', '2017/08/02 8:00--9:45', '徐涛涛', 'oscillograph'),
(8, '示波器与李萨如图形', '2017/08/02 8:00--9:45', '徐涛涛', 'oscillograph'),
(9, '电位差计', '2017/08/02 8:00--9:45', '徐涛涛', 'potentioneter'),
(10, '示波器与李萨如图形', '2017/08/02 8:00--9:45', '徐涛涛', 'oscillograph'),
(11, '示波器与李萨如图形', '2017/08/03 wrong time!', '徐涛涛', 'oscillograph'),
(12, '电位差计', '2017/08/03 8:00--9:45', '徐涛涛', 'potentioneter'),
(13, '电位差计', '2017/08/03 8:00--9:45', '徐涛涛', 'potentioneter'),
(14, '电位差计', '2017/08/03 8:00--9:45', '徐涛涛', 'potentioneter'),
(15, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '徐涛涛', 'oscillograph'),
(16, '示波器与李萨如图形', '2017/08/03 10:15--12:00', '徐涛涛', 'oscillograph');

-- --------------------------------------------------------

--
-- 表的结构 `physics_historicaldata_student`
--

CREATE TABLE `physics_historicaldata_student` (
  `order` int(10) NOT NULL,
  `stu_num` varchar(20) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `exp_name_en` varchar(50) NOT NULL,
  `exp_name_ch` varchar(30) NOT NULL,
  `help_times` int(3) NOT NULL,
  `fail_times` int(3) NOT NULL,
  `grade` int(3) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_historicaldata_student`
--

INSERT INTO `physics_historicaldata_student` (`order`, `stu_num`, `stu_name`, `exp_name_en`, `exp_name_ch`, `help_times`, `fail_times`, `grade`, `time`) VALUES
(1, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 100, '2017/07/29 16:15--18:00'),
(2, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 100, '2017/07/29 16:15--18:00'),
(3, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/07/29 16:15--18:00'),
(4, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/01 16:15--18:00'),
(5, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 100, '2017/08/01 16:15--18:00'),
(6, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/01 16:15--18:00'),
(7, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/02 8:00--9:45'),
(8, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 100, '2017/08/02 8:00--9:45'),
(9, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/02 8:00--9:45'),
(10, '081510126', 'Lvmingyu', 'oscillograph', '示波器与李萨如图形', 3, 2, 100, '2017/08/02 8:00--9:45'),
(11, '081510127', '山下', 'oscillograph', '示波器与李萨如图形', 1, 2, 100, '2017/08/02 8:00--9:45'),
(12, '081510113', 'Zhenxing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(13, '081510105', 'Irving', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(14, '081510106', 'McGrady', 'oscillograph', '示波器与李萨如图形', 0, 3, 100, '2017/08/02 8:00--9:45'),
(15, '081510107', 'James', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(16, '081510108', 'Paul', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/02 8:00--9:45'),
(17, '081510109', 'George', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(18, '081510110', 'Pierce', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(19, '081510111', 'Iverson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(20, '081510112', 'Lillard', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(21, '081510113', 'Jordan', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(22, '081510114', 'Michael', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(23, '081510115', 'Kay', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(24, '081510116', 'Jimmy', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(25, '081510117', 'YaoMing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(26, '081510118', 'Curry', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(27, '081510119', 'Johnson', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/02 8:00--9:45'),
(28, '081510120', 'Park', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(29, '081510121', 'Duncan', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(30, '081510122', 'Ray', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(31, '081510123', 'Wade', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(32, '081510124', 'Love', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(33, '081510125', 'Manu', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(34, '081510126', 'Pippen', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(35, '081510188', 'McCollum', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(36, '081510128', 'Durant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(37, '081510129', 'Westbrook', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(38, '081510130', 'Harden', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(39, '081510131', 'Gordon', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(40, '081510132', 'Garnett', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(41, '081510133', 'Ben', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(42, '081510134', 'Bryant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(43, '081510135', 'Miller', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(44, '081510136', 'Wall', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(45, '081510137', 'Simmons', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(46, '081510138', 'Thompson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(47, '081510139', 'Thomas', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(48, '081510140', 'Embiid', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(49, '081510126', 'Lvmingyu', 'oscillograph', '示波器与李萨如图形', 3, 2, 100, '2017/08/02 8:00--9:45'),
(50, '081510127', '山下', 'oscillograph', '示波器与李萨如图形', 1, 2, 100, '2017/08/02 8:00--9:45'),
(51, '081510113', 'Zhenxing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(52, '081510105', 'Irving', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(53, '081510106', 'McGrady', 'oscillograph', '示波器与李萨如图形', 0, 3, 100, '2017/08/02 8:00--9:45'),
(54, '081510107', 'James', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(55, '081510108', 'Paul', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/02 8:00--9:45'),
(56, '081510109', 'George', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(57, '081510110', 'Pierce', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(58, '081510111', 'Iverson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(59, '081510112', 'Lillard', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(60, '081510113', 'Jordan', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(61, '081510114', 'Michael', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(62, '081510115', 'Kay', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(63, '081510116', 'Jimmy', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(64, '081510117', 'YaoMing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(65, '081510118', 'Curry', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(66, '081510119', 'Johnson', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/02 8:00--9:45'),
(67, '081510120', 'Park', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(68, '081510121', 'Duncan', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(69, '081510122', 'Ray', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(70, '081510123', 'Wade', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(71, '081510124', 'Love', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(72, '081510125', 'Manu', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(73, '081510126', 'Pippen', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(74, '081510188', 'McCollum', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(75, '081510128', 'Durant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(76, '081510129', 'Westbrook', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(77, '081510130', 'Harden', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(78, '081510131', 'Gordon', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(79, '081510132', 'Garnett', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(80, '081510133', 'Ben', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(81, '081510134', 'Bryant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(82, '081510135', 'Miller', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(83, '081510136', 'Wall', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(84, '081510137', 'Simmons', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(85, '081510138', 'Thompson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(86, '081510139', 'Thomas', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(87, '081510140', 'Embiid', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(88, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/02 8:00--9:45'),
(89, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 100, '2017/08/02 8:00--9:45'),
(90, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/02 8:00--9:45'),
(91, '081510126', 'Lvmingyu', 'oscillograph', '示波器与李萨如图形', 3, 2, 100, '2017/08/02 8:00--9:45'),
(92, '081510127', '山下', 'oscillograph', '示波器与李萨如图形', 1, 2, 100, '2017/08/02 8:00--9:45'),
(93, '081510113', 'Zhenxing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(94, '081510105', 'Irving', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(95, '081510106', 'McGrady', 'oscillograph', '示波器与李萨如图形', 0, 3, 100, '2017/08/02 8:00--9:45'),
(96, '081510107', 'James', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(97, '081510108', 'Paul', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/02 8:00--9:45'),
(98, '081510109', 'George', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(99, '081510110', 'Pierce', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(100, '081510111', 'Iverson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(101, '081510112', 'Lillard', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(102, '081510113', 'Jordan', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(103, '081510114', 'Michael', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(104, '081510115', 'Kay', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(105, '081510116', 'Jimmy', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(106, '081510117', 'YaoMing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(107, '081510118', 'Curry', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(108, '081510119', 'Johnson', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/02 8:00--9:45'),
(109, '081510120', 'Park', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(110, '081510121', 'Duncan', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(111, '081510122', 'Ray', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(112, '081510123', 'Wade', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/02 8:00--9:45'),
(113, '081510124', 'Love', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(114, '081510125', 'Manu', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(115, '081510126', 'Pippen', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(116, '081510188', 'McCollum', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(117, '081510128', 'Durant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(118, '081510129', 'Westbrook', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(119, '081510130', 'Harden', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(120, '081510131', 'Gordon', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(121, '081510132', 'Garnett', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(122, '081510133', 'Ben', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(123, '081510134', 'Bryant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(124, '081510135', 'Miller', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(125, '081510136', 'Wall', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(126, '081510137', 'Simmons', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(127, '081510138', 'Thompson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(128, '081510139', 'Thomas', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(129, '081510140', 'Embiid', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/02 8:00--9:45'),
(130, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/02 wrong time!'),
(131, '081510126', 'Lvmingyu', 'oscillograph', '示波器与李萨如图形', 3, 2, 100, '2017/08/03 wrong time!'),
(132, '081510127', '山下', 'oscillograph', '示波器与李萨如图形', 1, 2, 100, '2017/08/03 wrong time!'),
(133, '081510113', 'Zhenxing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(134, '081510105', 'Irving', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(135, '081510106', 'McGrady', 'oscillograph', '示波器与李萨如图形', 0, 3, 100, '2017/08/03 wrong time!'),
(136, '081510107', 'James', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(137, '081510108', 'Paul', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/03 wrong time!'),
(138, '081510109', 'George', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(139, '081510110', 'Pierce', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(140, '081510111', 'Iverson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(141, '081510112', 'Lillard', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(142, '081510113', 'Jordan', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(143, '081510114', 'Michael', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(144, '081510115', 'Kay', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(145, '081510116', 'Jimmy', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(146, '081510117', 'YaoMing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(147, '081510118', 'Curry', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(148, '081510119', 'Johnson', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/03 wrong time!'),
(149, '081510120', 'Park', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(150, '081510121', 'Duncan', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(151, '081510122', 'Ray', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(152, '081510123', 'Wade', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 wrong time!'),
(153, '081510124', 'Love', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(154, '081510125', 'Manu', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(155, '081510126', 'Pippen', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(156, '081510188', 'McCollum', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(157, '081510128', 'Durant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(158, '081510129', 'Westbrook', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(159, '081510130', 'Harden', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(160, '081510131', 'Gordon', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(161, '081510132', 'Garnett', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(162, '081510133', 'Ben', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(163, '081510134', 'Bryant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(164, '081510135', 'Miller', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(165, '081510136', 'Wall', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(166, '081510137', 'Simmons', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(167, '081510138', 'Thompson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(168, '081510139', 'Thomas', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(169, '081510140', 'Embiid', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 wrong time!'),
(170, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(171, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(172, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(173, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(174, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(175, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(176, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(177, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(178, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(179, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 0, '2017/08/03 8:00--9:45'),
(180, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/03 8:00--9:45'),
(181, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(182, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 0, '2017/08/03 8:00--9:45'),
(183, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/03 8:00--9:45'),
(184, '081510227', 'shanxia', 'potentioneter', '电位差计', 0, 1, 22, '2017/08/03 8:00--9:45'),
(185, '081510211', 'Jake', 'potentioneter', '电位差计', 0, 0, 0, '2017/08/03 8:00--9:45'),
(186, '081510212', 'Mike', 'potentioneter', '电位差计', 0, 1, 100, '2017/08/03 8:00--9:45'),
(187, '081510126', 'Lvmingyu', 'oscillograph', '示波器与李萨如图形', 3, 2, 100, '2017/08/03 10:15--12:00'),
(188, '081510127', '山下', 'oscillograph', '示波器与李萨如图形', 1, 2, 22, '2017/08/03 10:15--12:00'),
(189, '081510113', 'Zhenxing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(190, '081510105', 'Irving', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(191, '081510106', 'McGrady', 'oscillograph', '示波器与李萨如图形', 0, 3, 100, '2017/08/03 10:15--12:00'),
(192, '081510107', 'James', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(193, '081510108', 'Paul', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/03 10:15--12:00'),
(194, '081510109', 'George', 'oscillograph', '示波器与李萨如图形', 0, 0, 22, '2017/08/03 10:15--12:00'),
(195, '081510110', 'Pierce', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(196, '081510111', 'Iverson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(197, '081510112', 'Lillard', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(198, '081510113', 'Jordan', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(199, '081510114', 'Michael', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(200, '081510115', 'Kay', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(201, '081510116', 'Jimmy', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(202, '081510117', 'YaoMing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(203, '081510118', 'Curry', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(204, '081510119', 'Johnson', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/03 10:15--12:00'),
(205, '081510120', 'Park', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(206, '081510121', 'Duncan', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(207, '081510122', 'Ray', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(208, '081510123', 'Wade', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(209, '081510124', 'Love', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(210, '081510125', 'Manu', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(211, '081510126', 'Pippen', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(212, '081510188', 'McCollum', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(213, '081510128', 'Durant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(214, '081510129', 'Westbrook', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(215, '081510130', 'Harden', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(216, '081510131', 'Gordon', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(217, '081510132', 'Garnett', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(218, '081510133', 'Ben', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(219, '081510134', 'Bryant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(220, '081510135', 'Miller', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(221, '081510136', 'Wall', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(222, '081510137', 'Simmons', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(223, '081510138', 'Thompson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(224, '081510139', 'Thomas', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(225, '081510140', 'Embiid', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(226, '081510126', 'Lvmingyu', 'oscillograph', '示波器与李萨如图形', 3, 2, 100, '2017/08/03 10:15--12:00'),
(227, '081510127', '山下', 'oscillograph', '示波器与李萨如图形', 1, 2, 22, '2017/08/03 10:15--12:00'),
(228, '081510113', 'Zhenxing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(229, '081510105', 'Irving', 'oscillograph', '示波器与李萨如图形', 0, 2, 59, '2017/08/03 10:15--12:00'),
(230, '081510106', 'McGrady', 'oscillograph', '示波器与李萨如图形', 0, 3, 100, '2017/08/03 10:15--12:00'),
(231, '081510107', 'James', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(232, '081510108', 'Paul', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/03 10:15--12:00'),
(233, '081510109', 'George', 'oscillograph', '示波器与李萨如图形', 0, 0, 22, '2017/08/03 10:15--12:00'),
(234, '081510110', 'Pierce', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(235, '081510111', 'Iverson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(236, '081510112', 'Lillard', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(237, '081510113', 'Jordan', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(238, '081510114', 'Michael', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(239, '081510115', 'Kay', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(240, '081510116', 'Jimmy', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(241, '081510117', 'YaoMing', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(242, '081510118', 'Curry', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(243, '081510119', 'Johnson', 'oscillograph', '示波器与李萨如图形', 0, 1, 100, '2017/08/03 10:15--12:00'),
(244, '081510120', 'Park', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(245, '081510121', 'Duncan', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(246, '081510122', 'Ray', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(247, '081510123', 'Wade', 'oscillograph', '示波器与李萨如图形', 0, 2, 100, '2017/08/03 10:15--12:00'),
(248, '081510124', 'Love', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(249, '081510125', 'Manu', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(250, '081510126', 'Pippen', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(251, '081510188', 'McCollum', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(252, '081510128', 'Durant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(253, '081510129', 'Westbrook', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(254, '081510130', 'Harden', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(255, '081510131', 'Gordon', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(256, '081510132', 'Garnett', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(257, '081510133', 'Ben', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(258, '081510134', 'Bryant', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(259, '081510135', 'Miller', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(260, '081510136', 'Wall', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(261, '081510137', 'Simmons', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(262, '081510138', 'Thompson', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(263, '081510139', 'Thomas', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00'),
(264, '081510140', 'Embiid', 'oscillograph', '示波器与李萨如图形', 0, 0, 100, '2017/08/03 10:15--12:00');

-- --------------------------------------------------------

--
-- 表的结构 `physics_status`
--

CREATE TABLE `physics_status` (
  `course_id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `class_num` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_status`
--

INSERT INTO `physics_status` (`course_id`, `name`, `status`, `user_id`, `class_num`) VALUES
(1, 'oscillograph', 0, NULL, NULL),
(2, 'potentioneter', 1, 2, NULL),
(6, 'thermal_conductivity', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `physics_user`
--

CREATE TABLE `physics_user` (
  `uid` int(10) NOT NULL,
  `level` char(1) CHARACTER SET utf8 NOT NULL,
  `number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `cur_course` int(2) DEFAULT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `physics_user`
--

INSERT INTO `physics_user` (`uid`, `level`, `number`, `name`, `password`, `cur_course`, `pwd`) VALUES
(1, '1', '081510123', 'admin', '7089d87fe52c3f948b2e0fdc6262ac9c', 2, '12580'),
(2, '2', '081510127', '徐涛涛', '7089d87fe52c3f948b2e0fdc6262ac9c', 2, '12580'),
(3, '2', '081510111', 'shanxia', '7089d87fe52c3f948b2e0fdc6262ac9c', 2, '12580'),
(4, '2', '1', '1', '1577a2e80c688f625cf9b680801c9a78', 2, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `physics_course_oscillograph`
--
ALTER TABLE `physics_course_oscillograph`
  ADD PRIMARY KEY (`group_num`);

--
-- Indexes for table `physics_course_potentioneter`
--
ALTER TABLE `physics_course_potentioneter`
  ADD PRIMARY KEY (`group_num`);

--
-- Indexes for table `physics_course_thermal_conductivity`
--
ALTER TABLE `physics_course_thermal_conductivity`
  ADD PRIMARY KEY (`group_num`);

--
-- Indexes for table `physics_data_oscillograph`
--
ALTER TABLE `physics_data_oscillograph`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `physics_historicaldata_course`
--
ALTER TABLE `physics_historicaldata_course`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `physics_historicaldata_student`
--
ALTER TABLE `physics_historicaldata_student`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `physics_status`
--
ALTER TABLE `physics_status`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `physics_user`
--
ALTER TABLE `physics_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `physics_data_oscillograph`
--
ALTER TABLE `physics_data_oscillograph`
  MODIFY `order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- 使用表AUTO_INCREMENT `physics_historicaldata_course`
--
ALTER TABLE `physics_historicaldata_course`
  MODIFY `order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `physics_historicaldata_student`
--
ALTER TABLE `physics_historicaldata_student`
  MODIFY `order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
--
-- 使用表AUTO_INCREMENT `physics_user`
--
ALTER TABLE `physics_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
