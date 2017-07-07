-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-07 02:31:25
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
  `teacher_id` int(2) DEFAULT NULL,
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
  `seek_help` int(1) NOT NULL DEFAULT '0' COMMENT '求助信息',
  `course_status` int(1) NOT NULL DEFAULT '0' COMMENT '课堂当前是否开启'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_oscillograph`
--

INSERT INTO `physics_course_oscillograph` (`group_num`, `stu_num`, `stu_name`, `teacher_id`, `help_times`, `fail_times`, `evaluation`, `v_std`, `f_std`, `v_up`, `E_v`, `f_up`, `E_f`, `V_DIV`, `Dy`, `TIME_DIV`, `n`, `Dx`, `T`, `status_1`, `Nx1`, `Ny1`, `fy1`, `Nx2`, `Ny2`, `fy2`, `Nx3`, `Ny3`, `fy3`, `Nx4`, `Ny4`, `fy4`, `status_2`, `ifShow`, `seek_help`, `course_status`) VALUES
(3, '081510126', 'Lvmingyu', 2, 3, 2, 1, 2, 200, 1.2, '1.0%', 3000, '3.0%', '6', '5.1', '10', '1', '1', '1', 2, '2', '4', '250', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(1, '081510127', 'Weige', 2, 1, 2, 1, 2, 200, 2.5, '25%', 199, '0.5%', '3', '200', '3', '90', '2', '3', 2, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 2, 0, 0, 1),
(4, '081510113', 'Zhenxing', 2, 0, 2, 1, 2, 200, 1.1, '1.1%', 2900, '0.8%', '4', '3.7', '13', '1', '7', '3', 2, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(5, '081510105', 'Irving', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(6, '081510106', 'McGrady', 2, 0, 2, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(7, '081510107', 'James', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(8, '081510108', 'Paul', 2, 0, 1, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(9, '081510109', 'George', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 1, 1),
(10, '081510110', 'Pierce', 2, 0, 2, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(11, '081510111', 'Iverson', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(12, '081510112', 'Lillard', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(13, '081510113', 'Jordan', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(14, '081510114', 'Michael', 2, 0, 0, 1, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 2, 0, 1, 1),
(15, '081510115', 'Kay', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(16, '081510116', 'Jimmy', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(17, '081510117', 'YaoMing', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(18, '081510118', 'Curry', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(19, '081510119', 'Johnson', 2, 0, 1, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(20, '081510120', 'Park', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(21, '081510121', 'Duncan', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(22, '081510122', 'Ray', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(23, '081510123', 'Wade', 2, 0, 2, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 1, 0, 0, 1),
(24, '081510124', 'Love', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2', '4', '500', '2', '2', '500', '4', '2', '1000', '6', '2', '1500', 0, 0, 0, 1),
(25, '081510125', 'Manu', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(26, '081510126', 'Pippen', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(27, '081510127', 'McCollum', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(28, '081510128', 'Durant', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(29, '081510129', 'Westbrook', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(30, '081510130', 'Harden', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(31, '081510131', 'Gordon', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(32, '081510132', 'Garnett', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(33, '081510133', 'Ben', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(34, '081510134', 'Bryant', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(35, '081510135', 'Miller', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(36, '081510136', 'Wall', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(37, '081510137', 'Simmons', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(38, '081510138', 'Thompson', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(39, '081510139', 'Thomas', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(40, '081510140', 'Embiid', 2, 0, 0, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1),
(2, NULL, NULL, 2, NULL, NULL, 0, 2, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `physics_course_potentioneter`
--

CREATE TABLE `physics_course_potentioneter` (
  `group_num` int(3) NOT NULL,
  `stu_num` varchar(20) DEFAULT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `teacher_id` int(2) NOT NULL DEFAULT '0',
  `E_std` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `physics_course_potentioneter`
--

INSERT INTO `physics_course_potentioneter` (`group_num`, `stu_num`, `stu_name`, `teacher_id`, `E_std`) VALUES
(1, '081510127', 'shanxia', 0, '2.0'),
(2, NULL, NULL, 0, '2.0'),
(3, NULL, NULL, 0, '9.0'),
(4, NULL, NULL, 0, '9.0'),
(5, NULL, NULL, 0, '8.0'),
(6, NULL, NULL, 0, '7.0'),
(7, NULL, NULL, 0, '8.0'),
(8, NULL, NULL, 0, '8.0'),
(9, NULL, NULL, 0, '8.0'),
(10, NULL, NULL, 0, '8.9');

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
(2, 'potentioneter', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `physics_user`
--

CREATE TABLE `physics_user` (
  `uid` int(10) NOT NULL,
  `level` char(1) CHARACTER SET utf8 NOT NULL,
  `number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `physics_user`
--

INSERT INTO `physics_user` (`uid`, `level`, `number`, `name`, `password`) VALUES
(1, '1', '081510123', 'admin', '332f1f6f5edd81b06023a432e9bad07f'),
(2, '2', '081510127', '徐涛涛', '7089d87fe52c3f948b2e0fdc6262ac9c');

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
