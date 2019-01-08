-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2018 at 01:05 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_management_tb`
--

CREATE TABLE `project_management_tb` (
  `Student_name` varchar(50) NOT NULL,
  `Student_Regno` varchar(20) NOT NULL,
  `Project_title` varchar(50) NOT NULL,
  `Case_study` varchar(100) NOT NULL,
  `Student_Phone_no` varchar(20) NOT NULL,
  `Academic_session` varchar(20) NOT NULL,
  `Project_supervisor` varchar(50) NOT NULL,
  `Type_of_project` varchar(20) NOT NULL,
  `Nature_of_project` varchar(20) NOT NULL,
  `Date_of_submission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_management_tb`
--

INSERT INTO `project_management_tb` (`Student_name`, `Student_Regno`, `Project_title`, `Case_study`, `Student_Phone_no`, `Academic_session`, `Project_supervisor`, `Type_of_project`, `Nature_of_project`, `Date_of_submission`) VALUES
('John Okoro', 'NAU/2015/001', 'Design an implementation of an online system', 'Pliagarism', '07039506644', '2017-2018', 'Dr. Anibogu', 'single', 'Other Project Type', '2018-07-23'),
('Jessica Okoye', 'NAU/2015/003', 'Design an implementation of a computerised system', 'Ministry of health', '08035969432', '2017-2018', 'Dr. Anibogu', 'Group', 'Health', '2018-07-16'),
('Alex Uzoh', 'NAU/2014/005', 'Design an implementation of an online tax system', 'Anambra state tax office', '0803495042', '2017-2018', 'Dr. Anibogu', 'single', 'Political science', '2018-07-17'),
('Ikenna Umeh', 'NAU/2015/005', 'Design an implementation of an online voting syste', 'INEC Anambra state', '07038595966', '2017-2018', 'Dr. Anibogu', 'single', 'Other Project Type', '2018-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `project_upload`
--

CREATE TABLE `project_upload` (
  `Student_name` varchar(50) NOT NULL,
  `Project_topic` varchar(50) NOT NULL,
  `Reg_number` varchar(20) NOT NULL,
  `Supervisor_name` varchar(50) NOT NULL,
  `Project_type` varchar(50) NOT NULL,
  `Academic_session` varchar(20) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_upload`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_registration_tb`
--

CREATE TABLE `student_registration_tb` (
  `Student_First_name` varchar(20) NOT NULL,
  `Student_Last_name` varchar(20) NOT NULL,
  `Student_Registration_number` varchar(20) NOT NULL,
  `Academic_Session` varchar(20) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Date_of_birth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration_tb`
--

INSERT INTO `student_registration_tb` (`Student_First_name`, `Student_Last_name`, `Student_Registration_number`, `Academic_Session`, `Phone_number`, `Date_of_birth`) VALUES
('Obinna', 'Okere', 'NAU/2014/001', '2017-2018', '0804955566', '19-04-1990'),
('Jerry', 'Okere', 'NAU/2015/002', '2017-2018', '0703489334', '24-04-2018'),
('Amaka', 'Okere', 'NAU\\2016\\013', '2017-2018', '04903940003', '19-04-1994');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `password`) VALUES
('Admin', 'PROject2018'),
('Staff', 'proJECT@2018'),
('Administrator', 'Password');
