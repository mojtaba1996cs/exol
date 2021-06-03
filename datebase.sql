--
-- MySQL 5.5.5
-- Sat, 30 May 2020 21:57:46 +0000
--

CREATE TABLE `answer` (
   `ans_id` int(200) not null auto_increment,
   `Que_id` varchar(200) not null,
   `Std_name` varchar(20) not null,
   `ans_Std` varchar(200) not null,
   `ans_Std1` varchar(200),
   `ans_Std2` varchar(200),
   `ans_Std3` varchar(200),
   `Set` varchar(60),
   `test_id` int(200) not null,
   `ans_case` int(5) not null,
   `deg_qu` double,
   PRIMARY KEY (`ans_id`),
   KEY `Que_id` (`Que_id`),
   KEY `Set` (`test_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=37;


CREATE TABLE `degree` (
   `id` int(200) unsigned not null auto_increment,
   `test_id` int(200) not null,
   `test_name` varchar(30),
   `Std_set` varchar(50) not null,
   `Std_name` varchar(50) not null,
   `Std_deg` varchar(20),
   `Std_Tak` varchar(30),
   `schyear` varchar(30),
   `class` varchar(30),
   UNIQUE KEY (`id`),
   KEY `Test_id` (`test_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7;


CREATE TABLE `material` (
   `Ms_id` int(10) not null auto_increment,
   `Ms_name` varchar(20) not null,
   `Class` varchar(20) not null,
   `Tea_name` varchar(20) not null,
   `Tea_id` int(5) not null,
   `Specialty` varchar(20) not null,
   `Time_test` int(5) not null,
   `case` varchar(10),
   PRIMARY KEY (`Ms_id`),
   KEY `Tea_id` (`Tea_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=24;


CREATE TABLE `questions` (
   `Qu_id` int(200) not null auto_increment,
   `test_id` int(200) not null,
   `test_name` varchar(40),
   `Specialty` varchar(20),
   `Qu` varchar(200) not null,
   `ans1` varchar(200) not null,
   `ans2` varchar(200) not null,
   `ans3` varchar(200) not null,
   `ans4` varchar(200) not null,
   `type_Qu` varchar(200) not null,
   `deg_qu` int(20) not null,
   `Bestans` varchar(200),
   `Bestans2` varchar(200),
   `Bestans3` varchar(200),
   `Bestans4` varchar(200),
   `t` varchar(20),
   `image` varchar(200),
   UNIQUE KEY (`Qu_id`),
   KEY `test_id` (`test_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=29;


CREATE TABLE `students` (
   `Std_id` int(200) not null auto_increment,
   `Std_name` varchar(50) not null,
   `Std_level` varchar(20) not null,
   `Std_class` varchar(20) not null,
   `Std_dv` varchar(10),
   `Std_set` varchar(200) not null,
   `Std_specialty` varchar(20),
   `Std_status` varchar(10),
   `Std_session` varchar(100),
   PRIMARY KEY (`Std_set`,`Std_class`),
   UNIQUE KEY (`Std_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=23;


CREATE TABLE `teachers` (
   `T_id` int(5) not null auto_increment,
   `T_name` varchar(20) not null,
   `T_level` varchar(20) not null,
   `T_pass` varchar(20) not null,
   PRIMARY KEY (`T_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11;


CREATE TABLE `tests` (
   `Tes_id` int(200) not null auto_increment,
   `Tes_name` varchar(20) not null,
   `Tes_DATE` date not null,
   `Class` varchar(20) not null,
   `Specialty` varchar(20) not null,
   `T_name` varchar(60) not null,
   `Time_test` varchar(20),
   `time` varchar(40),
   `time2` varchar(50),
   `time3` varchar(50),
   `case_test` int(5),
   `schyear` varchar(50),
   PRIMARY KEY (`Tes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=20;