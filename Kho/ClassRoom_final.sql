-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2020 at 05:40 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ClassRoom_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id_class` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `description` varchar(500) NOT NULL,
  `id_account_teacher` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_class`, `name`, `code`, `description`, `id_account_teacher`) VALUES
(1, 'Lap trinh Web', '21wqe', 'lop hoc lap trinh web co ban ', 1),
(2, 'Cong nghe phan mem', 'wezds', 'Khoa hoc quy trinh san xuat phan mem', 2),
(3, 'Tri tue nhan tao', '445rt', 'Lop hoc nhap mon tri tue nhan tao co ban', 1),
(4, 'Phan tich thiet ke giai thuat', 'tkgt', 'Lop hoc ve giai thuat chuyen sau', 1),
(5, 'Machine Learning', 'mcln', 'Lop hoc machine learning nang cao', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_work`
--

CREATE TABLE `class_work` (
  `id_work` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cate` varchar(10) DEFAULT NULL,
  `date_create` datetime(6) DEFAULT current_timestamp(6),
  `file` varchar(100) DEFAULT NULL,
  `id_class` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_work`
--

INSERT INTO `class_work` (`id_work`, `title`, `description`, `cate`, `date_create`, `file`, `id_class`) VALUES
(1, 'Qiuzz mon Web', 'trac nghiem mon web', '1', '2020-11-30 00:03:18.000000', 'null', 1),
(2, 'Thong bao V/v trinh bay do an cuoi ky', 'Thoi gian ca 4 thu 5 ngay 19/11/2020\r\nDia diem F302', NULL, '2020-12-02 01:16:49.547042', NULL, 1),
(3, 'Thong bao V/v trinh bay do an cuoi ky', 'Trinh bay do an cuoi ky mon tri tue nhan tao tai phong F701', NULL, '2020-12-02 01:17:54.973624', NULL, 3),
(4, 'Thong bao doi phong thuyet trinh', 'Doi phong tu F701 sang F705', NULL, '2020-12-02 02:55:38.242103', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_work` int(5) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_comment` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_work`, `comment`, `name`, `id_comment`) VALUES
(1, 'Thay oi trong luc kiem tra em gap su co he thong nen co duoc lam quizz lai khong a?', 'Student 4', 1),
(1, 'Loi he thong nen cac em duoc lam lai quizz nhe!', 'Teacher 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id_class` int(5) NOT NULL,
  `id_student_account` int(5) NOT NULL,
  `student_name` varchar(300) NOT NULL,
  `id_account_teacher` int(5) NOT NULL,
  `valid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id_class`, `id_student_account`, `student_name`, `id_account_teacher`, `valid`) VALUES
(3, 4, 'Student 4', 1, 1),
(3, 5, 'Student 5', 1, 1),
(3, 6, 'Student 6', 1, 1),
(1, 4, 'Student 4', 1, 1),
(3, 1, 'Student 1', 1, 1),
(3, 2, 'Student 2', 1, 1),
(5, 3, 'Student 3', 1, 1),
(4, 4, 'Student 4', 1, 1),
(5, 4, 'Student 4', 1, 1),
(1, 1, 'Student 1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `id_account` int(5) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`id_account`, `user`, `pass`, `name`) VALUES
(1, 'student', '123456', 'Student 1'),
(2, 'student2', '123456', 'student2'),
(3, 'student3', '123456', 'Student 3'),
(4, 'studen4', '123456', 'Student 4'),
(5, 'student5', '123456', 'Student 5'),
(6, 'student6', '123456', 'Student 6'),
(7, 'student7', '123456', 'Student 7'),
(8, 'student8', '123456', 'Student 8');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_account`
--

CREATE TABLE `teacher_account` (
  `id_account` int(5) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_account`
--

INSERT INTO `teacher_account` (`id_account`, `user`, `pass`, `name`) VALUES
(1, 'teacher', '123456', 'giang vien Phuc'),
(2, 'teacher2', '123456', 'Teacher 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `id_account_teacher` (`id_account_teacher`);

--
-- Indexes for table `class_work`
--
ALTER TABLE `class_work`
  ADD PRIMARY KEY (`id_work`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_work` (`id_work`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_student_account` (`id_student_account`),
  ADD KEY `nav_ibfk_3` (`id_account_teacher`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `teacher_account`
--
ALTER TABLE `teacher_account`
  ADD PRIMARY KEY (`id_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_work`
--
ALTER TABLE `class_work`
  MODIFY `id_work` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id_account` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_account`
--
ALTER TABLE `teacher_account`
  MODIFY `id_account` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_account_teacher`) REFERENCES `teacher_account` (`id_account`);

--
-- Constraints for table `class_work`
--
ALTER TABLE `class_work`
  ADD CONSTRAINT `class_work_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_work`) REFERENCES `class_work` (`id_work`);

--
-- Constraints for table `nav`
--
ALTER TABLE `nav`
  ADD CONSTRAINT `nav_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `nav_ibfk_2` FOREIGN KEY (`id_student_account`) REFERENCES `student_account` (`id_account`),
  ADD CONSTRAINT `nav_ibfk_3` FOREIGN KEY (`id_account_teacher`) REFERENCES `class` (`id_account_teacher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
