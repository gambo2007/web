-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2020 at 04:35 PM
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
(5, 'Machine Learning', 'mcln', 'Lop hoc machine learning nang cao', 1),
(6, 'Phat trien ung dung di dong', 'uddd', 'Lap trinh app android va ios tren mobile', 2);

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
  `id_class` int(5) NOT NULL,
  `files` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_work`
--

INSERT INTO `class_work` (`id_work`, `title`, `description`, `cate`, `date_create`, `file`, `id_class`, `files`) VALUES
(17, 'Thong bao V/v trinh bay do an cuoi ky', 'Thu 6 tuan nay', NULL, '2020-12-21 21:48:28.081787', NULL, 3, NULL);

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
(17, 'Do dich benh Covid nen co duoc doi lich lai khong a?', 'Huu Tai', 30),
(17, 'Do dich benh Covid nen co duoc doi lich lai khong a?', 'Huu Phuc', 31),
(17, 'Thu 6 trinh bay do an cuoi ky', 'Dang Minh Thang', 32);

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
(2, 1, 'Huu Phuc', 2, 1),
(2, 3, 'Huu Tai', 2, 1),
(1, 3, 'Huu Tai', 1, 1),
(3, 1, 'Huu Phuc', 1, 1),
(3, 3, 'Huu Tai', 1, 1),
(3, 2, 'Minh Hieu', 1, 1),
(5, 1, 'Huu Phuc', 1, 1),
(6, 1, 'Huu Phuc', 2, 1);

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
(1, 'student', '123456', 'Huu Phuc'),
(2, 'student2', '123456', 'Minh Hieu'),
(3, 'student3', '123456', 'Huu Tai'),
(4, 'student4', '123456', 'Van Anh'),
(5, 'student5', '123456', 'Ha Nguyen'),
(6, 'student6', '123456', 'Hoai Son'),
(7, 'student7', '123456', 'Hoang Minh'),
(8, 'student8', '123456', 'Phuong Nam'),
(9, 'student9', '123456', 'Minh Hoang'),
(10, 'ngoctrinh', '123456', 'Ngoc Trinh');

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
(1, 'teacher', '123456', 'Dang Minh Thang'),
(2, 'teacher2', '123456', 'Mai Van Manh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `class_ibfk_1` (`id_account_teacher`);

--
-- Indexes for table `class_work`
--
ALTER TABLE `class_work`
  ADD PRIMARY KEY (`id_work`),
  ADD KEY `class_work_ibfk_1` (`id_class`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comment_ibfk_1` (`id_work`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD KEY `nav_ibfk_1` (`id_class`),
  ADD KEY `nav_ibfk_2` (`id_student_account`),
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
  MODIFY `id_class` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_work`
--
ALTER TABLE `class_work`
  MODIFY `id_work` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id_account` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_account_teacher`) REFERENCES `teacher_account` (`id_account`) ON DELETE CASCADE;

--
-- Constraints for table `class_work`
--
ALTER TABLE `class_work`
  ADD CONSTRAINT `class_work_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_work`) REFERENCES `class_work` (`id_work`) ON DELETE CASCADE;

--
-- Constraints for table `nav`
--
ALTER TABLE `nav`
  ADD CONSTRAINT `nav_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`) ON DELETE CASCADE,
  ADD CONSTRAINT `nav_ibfk_2` FOREIGN KEY (`id_student_account`) REFERENCES `student_account` (`id_account`) ON DELETE CASCADE,
  ADD CONSTRAINT `nav_ibfk_3` FOREIGN KEY (`id_account_teacher`) REFERENCES `class` (`id_account_teacher`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
