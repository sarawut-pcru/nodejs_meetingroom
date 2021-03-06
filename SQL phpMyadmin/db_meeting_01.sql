-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 08:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acces`
--

CREATE TABLE `tbl_acces` (
  `ev_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_acces`
--

INSERT INTO `tbl_acces` (`ev_id`, `to_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(3, 1),
(3, 5),
(3, 7),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 10),
(6, 11),
(6, 16),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 10),
(7, 11),
(7, 16),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(9, 4),
(9, 5),
(10, 4),
(10, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 11),
(25, 12),
(25, 13),
(25, 14),
(25, 15),
(25, 16),
(25, 17),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(29, 6),
(29, 12),
(29, 13),
(30, 6),
(30, 12),
(30, 13),
(31, 6),
(31, 12),
(31, 13),
(34, 13),
(34, 14),
(34, 15),
(34, 16),
(35, 13),
(35, 14),
(35, 15),
(35, 16),
(36, 14),
(36, 15),
(36, 16),
(36, 17),
(37, 14),
(37, 15),
(37, 16),
(37, 17),
(38, 13),
(38, 14),
(38, 15),
(38, 16),
(42, 13),
(42, 14),
(42, 15),
(42, 16),
(42, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `de_id` int(10) NOT NULL,
  `de_name` varchar(50) NOT NULL COMMENT 'ชื่อแผนก',
  `de_phone` varchar(10) NOT NULL COMMENT 'เบอร์ติดต่อแผนก'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแผนก';

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`de_id`, `de_name`, `de_phone`) VALUES
(1, 'ศูนย์คอมพิวเตอร์', '4589'),
(2, 'งานธุรการ', '5967'),
(3, 'งานคลังพัสดุ', '1705'),
(4, 'งานวัสดุการแพทย์', '1502'),
(7, 'งานเวชระเบียน', '9658'),
(8, 'งานโสตทัศนศีกษา', '4563'),
(9, 'งานประชาสัมพันธ์', '8745');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `ev_id` int(11) NOT NULL,
  `ev_title` varchar(256) NOT NULL COMMENT 'ชื่อโครงการ/อีเว้นท์',
  `ev_startdate` date NOT NULL,
  `ev_enddate` date NOT NULL,
  `ev_starttime` time NOT NULL,
  `ev_endtime` time NOT NULL,
  `ev_color` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `ev_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ev_people` int(5) NOT NULL COMMENT 'จำนวนคนเข้าประชุม',
  `ev_status` int(1) NOT NULL,
  `ev_url` varchar(300) NOT NULL,
  `ev_bgcolor` varchar(15) NOT NULL DEFAULT '#FFFFFF',
  `ev_repeatday` varchar(20) NOT NULL COMMENT 'การจองซ้ำ',
  `event_id` varchar(15) NOT NULL COMMENT 'Ex.64040000x',
  `st_id` int(10) NOT NULL COMMENT 'id_style',
  `id` int(10) NOT NULL COMMENT 'id_user',
  `ro_id` int(5) NOT NULL COMMENT 'id_rooms'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`ev_id`, `ev_title`, `ev_startdate`, `ev_enddate`, `ev_starttime`, `ev_endtime`, `ev_color`, `ev_createdate`, `ev_people`, `ev_status`, `ev_url`, `ev_bgcolor`, `ev_repeatday`, `event_id`, `st_id`, `id`, `ro_id`) VALUES
(1, 'พัฒนาคุณภาพงาน', '2022-03-22', '2022-03-23', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-07 19:21:37', 50, 3, '', '#FFFFFF', '', '640400001', 1, 3, 2),
(2, 'พัฒนาคุณภาพงาน', '2022-03-23', '2022-03-23', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-07 19:21:37', 50, 3, '', '#FFFFFF', '', '640400001', 1, 3, 2),
(3, 'โครงการอบรมป้องกันโควิด-19', '2022-03-22', '2022-03-22', '08:30:00', '15:30:00', '#FFFFFF', '2021-04-07 19:23:54', 200, 3, '', '#FFFFFF', '', '640400002', 3, 3, 3),
(4, 'โครงการอบรมและพัฒนางาน', '2022-03-02', '2022-03-03', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-07 19:30:23', 20, 4, '', '#FFFFFF', '', '640400003', 3, 1, 4),
(5, 'โครงการอบรมและพัฒนางาน', '2022-03-03', '2022-03-03', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-07 19:30:23', 20, 4, '', '#FFFFFF', '', '640400003', 3, 1, 4),
(6, 'โครงการอบรมประจำปี พ.ศ. 2564', '2022-03-02', '2022-03-03', '10:00:00', '12:00:00', '#FFFFFF', '2021-04-07 19:36:06', 5, 3, '', '#FFFFFF', '', '640400004', 3, 2, 6),
(7, 'โครงการอบรมประจำปี พ.ศ. 2564', '2022-03-03', '2022-03-03', '10:00:00', '12:00:00', '#FFFFFF', '2021-04-07 19:36:06', 5, 3, '', '#FFFFFF', '', '640400004', 3, 2, 6),
(8, 'ประชุมวางแผนงาน', '2022-03-03', '2022-03-03', '09:00:00', '12:00:00', '#FFFFFF', '2021-04-07 19:37:02', 15, 3, '', '#FFFFFF', '', '640400005', 3, 4, 6),
(9, 'ประชุมด้านการแพทย์', '2022-03-05', '2022-03-06', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-07 19:38:12', 25, 3, '', '#FFFFFF', '', '640400006', 1, 1, 2),
(10, 'ประชุมด้านการแพทย์', '2022-03-06', '2022-03-06', '13:00:00', '16:00:00', '#FFFFFF', '2021-04-07 19:38:12', 25, 3, '', '#FFFFFF', '', '640400006', 1, 1, 2),
(42, 'ทดสอบ1 วัน', '2022-03-02', '2022-03-02', '09:00:00', '12:00:00', '#FFFFFF', '2022-03-02 02:00:42', 200, 3, '', '#FFFFFF', '', '650300001', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `lv_id` int(5) NOT NULL,
  `level` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ระดับผู้ใช้งาน';

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`lv_id`, `level`) VALUES
(1, 'Admin'),
(2, 'ผู้ปฏิบัติงาน'),
(4, 'หัวหน้าฝ่าย/หัวหน้าแผนก'),
(3, 'ธุรการ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `ro_id` int(5) NOT NULL,
  `ro_name` varchar(50) NOT NULL COMMENT 'ชื่อห้อง',
  `ro_people` int(4) NOT NULL COMMENT 'จำนวนคนที่รองรับ',
  `ro_color` varchar(20) NOT NULL COMMENT 'สี',
  `ro_detail` text NOT NULL COMMENT 'รายละเอียด'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลห้อง';

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`ro_id`, `ro_name`, `ro_people`, `ro_color`, `ro_detail`) VALUES
(1, 'ห้องประชุมแสงจันทร์', 350, '#00FFAA', 'ตึกผู้ป่วยนอก ชั้น 4'),
(2, 'ห้องประชุมแสงตะวัน', 50, '#3BD5E7', 'ห้องประชุม 0'),
(3, 'ห้องประชุมแสงดาว', 200, '#d84dff', 'ห้องประชุม1'),
(4, 'ห้องประชุม 2', 20, '#ece869', 'ห้องประชุม2'),
(5, 'ห้องประชุมดอกปีบ', 150, '#ff6b6b', 'ห้องประชุม3'),
(6, 'ห้องรับรอง', 15, '#C804A1', 'ห้องประชุม 4'),
(8, 'ห้องประชุมแสงเดือน', 2000, '#ff0000', 'อยู่ในหลืบ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setdevice`
--

CREATE TABLE `tbl_setdevice` (
  `dv_id` int(10) NOT NULL,
  `id` int(10) NOT NULL COMMENT 'id_user',
  `ev_id` int(11) NOT NULL COMMENT 'id_event',
  `dv_status` int(1) NOT NULL COMMENT 'สถานะอุปกรณ์'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแจ้งเตือนสถานะอุปกรณ์';

--
-- Dumping data for table `tbl_setdevice`
--

INSERT INTO `tbl_setdevice` (`dv_id`, `id`, `ev_id`, `dv_status`) VALUES
(1, 4, 1, 3),
(2, 4, 3, 3),
(3, 4, 6, 3),
(4, 4, 8, 3),
(5, 4, 9, 3),
(6, 4, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seting`
--

CREATE TABLE `tbl_seting` (
  `set_id` int(10) NOT NULL,
  `id` int(10) NOT NULL COMMENT 'id_member',
  `ev_id` int(11) NOT NULL COMMENT 'id_tools',
  `set_status` int(1) NOT NULL COMMENT 'สถานะการจอง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลแจ้งเตือนสถานะการจอง';

--
-- Dumping data for table `tbl_seting`
--

INSERT INTO `tbl_seting` (`set_id`, `id`, `ev_id`, `set_status`) VALUES
(1, 2, 6, 3),
(3, 2, 24, 3),
(4, 2, 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_style`
--

CREATE TABLE `tbl_style` (
  `st_id` int(10) NOT NULL,
  `st_name` varchar(100) NOT NULL COMMENT 'รูปแบบห้อง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_style`
--

INSERT INTO `tbl_style` (`st_id`, `st_name`) VALUES
(1, 'ประชุมทั่วไป'),
(2, 'ตัวยู เต็มห้อง'),
(3, 'ชั้นเรียน'),
(4, 'ประชุมสภา'),
(5, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tools`
--

CREATE TABLE `tbl_tools` (
  `to_id` int(3) NOT NULL,
  `to_name` varchar(250) NOT NULL COMMENT 'อุปกรณ์',
  `de_id` int(10) NOT NULL COMMENT 'แผนกที่รับผิดชอบ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลอุปกรณ์';

--
-- Dumping data for table `tbl_tools`
--

INSERT INTO `tbl_tools` (`to_id`, `to_name`, `de_id`) VALUES
(2, 'Projector', 8),
(3, 'Computer', 8),
(4, 'น้ำดื่ม/อาหารว่าง', 2),
(5, 'วีดีทัศน์ TV/VCD', 8),
(6, 'เครื่องฉายภาพ 3 มิติ', 7),
(7, 'ทีมลงทะเบียน', 8),
(8, 'ป้ายเวที/ป้ายชื่อวิทยากร', 7),
(16, 'ทีมต้อนรับ', 4),
(11, 'ประกาศเสียงตามสาย', 9),
(12, 'แจ้งนักข่าวภายนอก', 9),
(13, 'แจ้งทางวิทยุ', 9),
(14, 'แจ้งทางหนังสือพิมพ์', 9),
(15, 'แจ้งทางโทรทัศน์', 9),
(17, 'btest01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'username',
  `password` varchar(20) NOT NULL COMMENT 'password',
  `person_id` varchar(20) NOT NULL COMMENT 'National_ID',
  `prefix` varchar(10) NOT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL COMMENT 'ตำแหน่ง',
  `phone` varchar(10) NOT NULL,
  `de_id` int(10) NOT NULL COMMENT 'แผนก',
  `lv_id` int(5) NOT NULL COMMENT 'level'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ใช้งาน';

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `person_id`, `prefix`, `firstname`, `lastname`, `position`, `phone`, `de_id`, `lv_id`) VALUES
(1, 'sarawut', '123456', '1160400251823', 'นาย', 'ศราวุธ', 'อวดกล้า', 'Developer', '0979284920', 8, 1),
(2, 'user', '123456', '1160400251823', 'นาย', 'สหัสวรรษ', 'แซ่เตีย', 'Developer', '0882810577', 1, 2),
(3, 'manager', '123456', '1160400251823', 'นาย', 'เอกสิทธิ์', 'ต๊ะสิงห์', 'depveloper', '0889561523', 8, 4),
(4, 'staff', '123456', '1160400251822', 'นาย', 'ธนกร', 'เจริญรุกข์', 'Developer', '0979284920', 7, 3),
(5, 'user01', '123456', '1160400251822', 'นาย', 'userds', 'lastname', 'personal', '', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acces`
--
ALTER TABLE `tbl_acces`
  ADD PRIMARY KEY (`ev_id`,`to_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`lv_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`ro_id`);

--
-- Indexes for table `tbl_setdevice`
--
ALTER TABLE `tbl_setdevice`
  ADD PRIMARY KEY (`dv_id`);

--
-- Indexes for table `tbl_seting`
--
ALTER TABLE `tbl_seting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tbl_style`
--
ALTER TABLE `tbl_style`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  ADD PRIMARY KEY (`to_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `de_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `ev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `lv_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_setdevice`
--
ALTER TABLE `tbl_setdevice`
  MODIFY `dv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_seting`
--
ALTER TABLE `tbl_seting`
  MODIFY `set_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_style`
--
ALTER TABLE `tbl_style`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tools`
--
ALTER TABLE `tbl_tools`
  MODIFY `to_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
