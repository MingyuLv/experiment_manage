-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-08 06:25:08
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
  `help_times` int(3) DEFAULT '0',
  `fail_times` int(3) DEFAULT '0',
  `evaluation` int(3) DEFAULT '0',
  `v_std` float NOT NULL DEFAULT '-1',
  `f_std` float NOT NULL DEFAULT '-1',
  `v_up` float DEFAULT NULL,
  `E_v` varchar(10) DEFAULT NULL,
  `f_up` float DEFAULT NULL,
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
  `ifShow` int(1) NOT NULL DEFAULT '0',
  `seek_help` int(1) NOT NULL DEFAULT '0' COMMENT '求助信息'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_oscillograph`
--

INSERT INTO `physics_course_oscillograph` (`group_num`, `stu_num`, `stu_name`, `help_times`, `fail_times`, `evaluation`, `v_std`, `f_std`, `v_up`, `E_v`, `f_up`, `E_f`, `V_DIV`, `Dy`, `TIME_DIV`, `n`, `Dx`, `T`, `status_1`, `Nx1`, `Ny1`, `fy1`, `Nx2`, `Ny2`, `fy2`, `Nx3`, `Ny3`, `fy3`, `Nx4`, `Ny4`, `fy4`, `status_2`, `ifShow`, `seek_help`) VALUES
(3, '081510126', 'Lvmingyu', 3, 2, 0, 2, 200, 1.2, '1.0%', 3000, '3.0%', '6', '5.1', '10', '1', '1', '1', 0, '2', '4', '250', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(1, '081510127', 'Weige', 1, 2, 1, 2, 200, 2.5, '25%', 199, '0.5%', '3', '200', '3', '90', '2', '3', 2, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 2, 0, 0),
(4, '081510113', 'Zhenxing', 0, 2, 0, 2, 200, 1.1, '1.1%', 2900, '0.8%', '4', '3.7', '13', '1', '7', '3', 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(5, '081510105', 'Irving', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(6, '081510106', 'McGrady', 0, 3, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(7, '081510107', 'James', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(8, '081510108', 'Paul', 0, 1, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(9, '081510109', 'George', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 1),
(10, '081510110', 'Pierce', 0, 2, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(11, '081510111', 'Iverson', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(12, '081510112', 'Lillard', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(13, '081510113', 'Jordan', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(14, '081510114', 'Michael', 0, 0, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 2, 0, 1),
(15, '081510115', 'Kay', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(16, '081510116', 'Jimmy', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(17, '081510117', 'YaoMing', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(18, '081510118', 'Curry', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(19, '081510119', 'Johnson', 0, 1, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(20, '081510120', 'Park', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(21, '081510121', 'Duncan', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(22, '081510122', 'Ray', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(23, '081510123', 'Wade', 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0),
(24, '081510124', 'Love', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0),
(25, '081510125', 'Manu', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(26, '081510126', 'Pippen', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(27, '081510127', 'McCollum', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(28, '081510128', 'Durant', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(29, '081510129', 'Westbrook', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(30, '081510130', 'Harden', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(31, '081510131', 'Gordon', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(32, '081510132', 'Garnett', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(33, '081510133', 'Ben', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(34, '081510134', 'Bryant', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(35, '081510135', 'Miller', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(36, '081510136', 'Wall', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(37, '081510137', 'Simmons', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(38, '081510138', 'Thompson', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(39, '081510139', 'Thomas', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(40, '081510140', 'Embiid', 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
(2, '081510199', 'huge', NULL, NULL, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

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
  `Lx1` varchar(3) DEFAULT NULL,
  `Lx2` varchar(3) DEFAULT NULL,
  `Lx3` varchar(5) DEFAULT NULL,
  `Lx4` varchar(3) DEFAULT NULL,
  `Lx5` varchar(3) DEFAULT NULL,
  `Lx6` varchar(5) DEFAULT NULL,
  `Lx_ave` varchar(3) DEFAULT NULL,
  `status_2` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_potentioneter`
--

INSERT INTO `physics_course_potentioneter` (`group_num`, `stu_num`, `stu_name`, `help_times`, `fail_times`, `seek_help`, `evaluation`, `E`, `E_std`, `E_e`, `U_ab`, `U_0`, `I_s`, `Rab`, `Is`, `U0`, `Uab`, `status_1`, `Lx1`, `Lx2`, `Lx3`, `Lx4`, `Lx5`, `Lx6`, `Lx_ave`, `status_2`) VALUES
(1, '081510127', 'shanxia', 0, 0, 0, 1, '2', 3, '33.33%', 2, '2', '2', '2', '2', '2', 2, 2, '2', '2', '2', '2', '2', '2', '2', 2);

-- --------------------------------------------------------

--
-- 表的结构 `physics_data_oscillograph`
--

CREATE TABLE `physics_data_oscillograph` (
  `stu_num` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `physics_data_potentioneter`
--

CREATE TABLE `physics_data_potentioneter` (
  `group_num` int(3) NOT NULL,
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `teacher_id` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `physics_status`
--

CREATE TABLE `physics_status` (
  `course_id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_status`
--

INSERT INTO `physics_status` (`course_id`, `name`, `status`, `user_id`) VALUES
(1, 'oscillograph', 1, 2),
(2, 'potentioneter', 1, 2);

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
  `cur_course` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `physics_user`
--

INSERT INTO `physics_user` (`uid`, `level`, `number`, `name`, `password`, `cur_course`) VALUES
(1, '1', '081510123', 'admin', '332f1f6f5edd81b06023a432e9bad07f', NULL),
(2, '2', '081510127', '徐涛涛', '7089d87fe52c3f948b2e0fdc6262ac9c', 1);

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
-- Indexes for table `physics_data_potentioneter`
--
ALTER TABLE `physics_data_potentioneter`
  ADD PRIMARY KEY (`group_num`);

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
-- 使用表AUTO_INCREMENT `physics_user`
--
ALTER TABLE `physics_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
