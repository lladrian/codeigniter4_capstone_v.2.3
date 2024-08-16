-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 01:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_ci_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `role_id` int(10) NOT NULL,
  `is_admin` int(10) NOT NULL,
  `is_super_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `password`, `username`, `OTP`, `role_id`, `is_admin`, `is_super_admin`) VALUES
(2, 'adrian manatad', 'asd', 'asd', 'asd', 'asd', 2, 0, 0),
(4, 'dsa', 'asd@gmail.com', '', '', '', 0, 0, 0),
(5, 'real2', '', '', '', '', 0, 0, 0),
(6, 'black', 'black@gmail.com', '', '', '', 0, 0, 0),
(7, 'red', 'red@gmail.com', '', '', '', 0, 0, 0),
(8, '', 'asd@gmail.com', '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashiers`
--

CREATE TABLE `cashiers` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `is_head` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `head_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashiers`
--

INSERT INTO `cashiers` (`id`, `fullname`, `email`, `password`, `username`, `OTP`, `is_head`, `status`, `role_id`, `head_id`, `department_id`) VALUES
(1, '', 'adrian1@gmail.com', '', '', '', 0, 0, 1, 0, 1),
(2, '', 'adrian@gmail.com', '', '', '', 0, 0, 2, 0, 2),
(3, '', 'cashier@gmail.com', '', '', '', 0, 0, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_abbreviation` varchar(255) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_abbreviation`, `department_id`) VALUES
(1, 'Bachelor of Science in Information Technology', 'BSIT', 2),
(2, 'Bachelor of Science in Hospitality Management', 'BSHM', 1),
(3, 'Bachelor of Science in Civil Engineering', 'BSCE', 3),
(4, 'Bachelor of Science in Electrical Engineering', 'BSEE', 3),
(5, 'Bachelor of Science in Mechanical Engineering', 'BSME', 3),
(6, 'Bachelor of Science in Industrial Technology major in Culinary Arts', 'BSIT (CUL)', 4),
(7, 'Bachelor of Science in Industrial Technology major in Electronics', 'BSIT (ET)', 4),
(8, 'Bachelor of Elementary Education', 'BEED', 5),
(9, 'Bachelor of Physical Education', 'BPEd', 5),
(10, 'Bachelor of Secondary Education major in Mathematics', 'BSEd (Mathematics)', 5),
(11, 'Bachelor of Secondary Education major in Science', 'BSEd (Science)', 5),
(12, 'Bachelor of Secondary Education major in Technology and Livelihood Education', 'BSEd (TLE)', 5),
(13, 'Bachelor of Technical-Vocational Teacher Education major in Food & Service Management', 'BTVTEd (FSM)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(255) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(1, 'Business and Management Department'),
(2, 'Computer Studies Department'),
(3, 'Engineering Department'),
(4, 'Industrial Technology Department'),
(5, 'Teacher Education Department');

-- --------------------------------------------------------

--
-- Table structure for table `head_departments`
--

CREATE TABLE `head_departments` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `head_departments`
--

INSERT INTO `head_departments` (`id`, `fullname`, `email`, `password`, `username`, `OTP`, `status`, `role_id`, `department_id`) VALUES
(1, 'd', '', '', '', '', 0, 1, 2),
(2, 'd', '', '', '', '', 0, 1, 2),
(3, '', 'head_department@gmail.com', '', '', '', 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `fullname`, `email`, `password`, `username`, `OTP`, `status`, `role_id`, `department_id`) VALUES
(1, 'a', '', '', '', '', 0, 1, 1),
(2, 'a', '', '', '', '', 0, 1, 1),
(3, '', 'instructor@gmail.com', '', '', '', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registrars`
--

CREATE TABLE `registrars` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `is_head` int(10) NOT NULL,
  `head_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrars`
--

INSERT INTO `registrars` (`id`, `fullname`, `email`, `password`, `username`, `OTP`, `is_head`, `head_id`, `status`, `role_id`, `department_id`) VALUES
(1, '', 'registrar@gmail.com', '', '', '', 0, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_inc_forms`
--

CREATE TABLE `request_inc_forms` (
  `id` int(255) NOT NULL,
  `inc_unique_number` varchar(255) NOT NULL,
  `cashier_unique_number` varchar(255) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `instructor_id` int(10) NOT NULL,
  `head_department_id` int(10) NOT NULL,
  `cashier_id` int(10) NOT NULL,
  `registrar_id` int(10) NOT NULL,
  `comment_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `form_status` varchar(255) NOT NULL,
  `head_department_status` int(10) NOT NULL,
  `cashier_status` int(10) NOT NULL,
  `instructor_status` int(10) NOT NULL,
  `registrar_status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_inc_forms`
--

INSERT INTO `request_inc_forms` (`id`, `inc_unique_number`, `cashier_unique_number`, `student_id`, `subject_id`, `instructor_id`, `head_department_id`, `cashier_id`, `registrar_id`, `comment_id`, `amount`, `payment_method`, `payment_status`, `form_status`, `head_department_status`, `cashier_status`, `instructor_status`, `registrar_status`, `created_date`) VALUES
(1, 'asdawqdq', '', 1, 1, 1, 1, 1, 1, 0, 0, '', '', '', 0, 0, 0, 0, '2024-08-05 06:41:50'),
(2, '', '', 3, 1, 1, 1, 1, 1, 0, 0, '', '', '', 0, 0, 0, 0, '2024-08-05 06:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Instructor'),
(3, 'Cashier'),
(4, 'Head Department'),
(5, 'Registrar'),
(6, 'Registrar Head'),
(7, 'Cashier Head');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_id_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `role_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `email`, `student_id_number`, `password`, `username`, `OTP`, `role_id`, `department_id`, `course_id`) VALUES
(1, 'sdada', 'red', '', '', '', '', 1, 1, 0),
(2, 'sdada', '', '', '', '', '', 1, 1, 0),
(3, '123', 'red@gmail.com', '2020', '', '', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_units` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `student_year` varchar(255) NOT NULL,
  `department_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_units`, `description`, `semester`, `student_year`, `department_id`, `course_id`) VALUES
(1, 'IT 113', '3', 'Introduction to Computing (*)', 'first semester', '1st Year', 2, 1),
(2, 'IT 134', '4', 'Computer Programming 1 (*)', 'first semester', '1st Year', 2, 1),
(3, 'GEN. ED. 001', '3', 'Purposive Communication', 'first semester', '1st Year', 2, 1),
(4, 'GEN. ED. 002', '3', 'Understanding the Self', 'first semester', '1st Year', 2, 1),
(5, 'GEN. ED. 004', '3', 'Mathematics in the Modern World', 'first semester', '1st Year', 2, 1),
(6, 'FIL 001', '3', 'Akademiko sa Wikang Filipino', 'first semester', '1st Year', 2, 1),
(7, 'DRR 113', '3', 'Disaster Risk Reduction and Education in Emergencies', 'first semester', '1st Year', 2, 1),
(8, 'MATH ENHANCE 1', '3', 'College Algebra & Trigonometry', 'first semester', '1st Year', 2, 1),
(9, 'PATHFIT 112', '2', 'Movement Competency Training', 'first semester', '1st Year', 2, 1),
(10, 'NSTP 113', '3', 'CWTS, LTS, MTS(Naval or Air Force)', 'first semester', '1st Year', 2, 1),
(11, 'IT 123', '3', 'Introduction to Human Computer Interaction', 'second semester', '1st Year', 2, 1),
(12, 'IT 143', '3', 'Discrete Mathematics', 'second semester', '1st Year', 2, 1),
(13, 'IT 163', '3', 'Computer Programming 2 (*)', 'second semester', '1st Year', 2, 1),
(14, 'GEN. ED. 003', '3', 'Readings in Philippine History', 'second semester', '1st Year', 2, 1),
(15, 'GEN. ED. 006', '3', 'Ethics', 'second semester', '1st Year', 2, 1),
(16, 'GEN. ED. 007', '3', 'The Contemporary World', 'second semester', '1st Year', 2, 1),
(17, 'FIL 002', '3', 'Pagbasa at Pagsulat sa Iba\'t-Ibang Disiplina', 'second semester', '1st Year', 2, 1),
(18, 'PATHFIT 122', '2', 'Fitness Training', 'second semester', '1st Year', 2, 1),
(19, 'NSTP 123', '3', 'CWTS, LTS, MTS(Naval or Air Force)', 'second semester', '1st Year', 2, 1),
(20, 'IT 213', '3', 'Data Structures and Algorithms (*)', 'first semester', '2nd Year', 2, 1),
(21, 'IT 233', '3', 'Object Oriented Programming (*)', 'first semester', '2nd Year', 2, 1),
(22, 'IT 253', '3', 'Platform Technologies (*)', 'first semester', '2nd Year', 2, 1),
(23, 'IT 273', '3', 'Web Systems and Technologies 1 (*)', 'first semester', '2nd Year', 2, 1),
(24, 'IT 293', '3', 'Statistics and Probability', 'first semester', '2nd Year', 2, 1),
(25, 'CCNA 213', '3', 'Introduction to Networks (*)', 'first semester', '2nd Year', 2, 1),
(26, 'RIZAL 001', '3', 'Rizal\'s Life and Works', 'first semester', '2nd Year', 2, 1),
(27, 'PATHFIT 212', '2', 'Dance, Sport, Group Exercise, Outdoor and Adventure Activities', 'first semester', '2nd Year', 2, 1),
(28, 'IT 223', '3', 'Information Management (*)', 'second semester', '2nd Year', 2, 1),
(29, 'IT 243', '3', 'Quantitative Methods', 'second semester', '2nd Year', 2, 1),
(30, 'IT 263', '3', 'Integrative Programming and Technologies 1 (*)', 'second semester', '2nd Year', 2, 1),
(31, 'CCNA 223', '3', 'Routing and Switching Essentials (*)', 'second semester', '2nd Year', 2, 1),
(32, 'GEN. ED. 005', '3', 'Art Appreciation', 'second semester', '2nd Year', 2, 1),
(33, 'GEN. ED. 008', '3', 'Science, Technology and Society', 'second semester', '2nd Year', 2, 1),
(34, 'LIT 001', '3', 'Panitikang Filipino', 'second semester', '2nd Year', 2, 1),
(35, 'PATHFIT 222', '2', 'Dance, Sports, Group Exercise, Outdoor and Adventure Activities', 'second semester', '2nd Year', 2, 1),
(36, 'IT 313', '3', 'Advanced Database Systems (*)', 'first semester', '3rd Year', 2, 1),
(37, 'IT 333', '3', 'Systems Analysis and Design (*)', 'first semester', '3rd Year', 2, 1),
(38, 'IT 353', '3', 'Data Mining and Analytics', 'first semester', '3rd Year', 2, 1),
(39, 'IT 353A', '3', 'Systems Integration and Architecture 1 (*)', 'first semester', '3rd Year', 2, 1),
(40, 'IT 373', '3', 'Web Systems and Technology 2 (*)', 'first semester', '3rd Year', 2, 1),
(41, 'IT 373A', '3', 'Event-Driven Programming (*)', 'first semester', '3rd Year', 2, 1),
(42, 'IT 393', '3', 'Social and Professional Issues', 'first semester', '3rd Year', 2, 1),
(43, 'CCNA 313', '3', 'Scaling Networks (*)', 'first semester', '3rd Year', 2, 1),
(44, 'IT 323', '3', 'Software Engineering', 'second semester', '3rd Year', 2, 1),
(45, 'IT 343', '3', 'Multimedia Systems (*)', 'second semester', '3rd Year', 2, 1),
(46, 'IT 343A', '3', 'IT Electives', 'second semester', '3rd Year', 2, 1),
(47, 'IT 363', '3', 'Information Assurance and Security 1 (*)', 'second semester', '3rd Year', 2, 1),
(48, 'IT 363A', '3', 'Application Development and Emerging Tech.', 'second semester', '3rd Year', 2, 1),
(49, 'CCNA 323', '3', 'Connecting Networks (*)', 'second semester', '3rd Year', 2, 1),
(50, 'IT 383', '3', 'Integrative Programming and Tech. 2', 'second semester', '3rd Year', 2, 1),
(51, 'IT 383A', '3', 'Systems Integration and Architecture 2 (*)', 'second semester', '3rd Year', 2, 1),
(52, 'IT 303', '3', 'Information Assurance and Security 2 (*)', 'summer', '3rd Year', 2, 1),
(53, 'IT 303A', '3', 'Capstone Project and Research 1 (*)', 'summer', '3rd Year', 2, 1),
(54, 'IT 413', '3', 'System Administration and Maintenance (*)', 'first semester', '4th Year', 2, 1),
(55, 'IT 433', '3', 'Capstone Project and Research 2 (*)', 'first semester', '4th Year', 2, 1),
(56, 'IT 429', '9', 'Practicum (min. 486 hrs)', 'second semester', '4th Year', 2, 1),
(57, 'GEN. ED. 001', '3', 'Purposive Communication', 'first semester', '1st Year', 1, 2),
(58, 'GEN. ED. 002', '3', 'Understanding the Self', 'first semester', '1st Year', 1, 2),
(59, 'GEN. ED. 007', '3', 'Contemporary World', 'first semester', '1st Year', 1, 2),
(60, 'GEN. El 001', '3', 'Elective (Entrepreneurial Mind)', 'first semester', '1st Year', 1, 2),
(61, 'THC 113', '3', 'Macro Perspective of Tourism and Hospitality', 'first semester', '1st Year', 1, 2),
(62, 'THC 133', '3', 'Risk Management as Applied to Safety, Security, and Sanitation', 'first semester', '1st Year', 1, 2),
(63, 'BME 113', '3', 'Accounting and Finance in Tourism and Hospitality', 'first semester', '1st Year', 1, 2),
(64, 'PATH-FIT 1', '2', 'Movement and Competency Training', 'first semester', '1st Year', 1, 2),
(65, 'NSTP 1', '3', 'Nation Service Training Program 1', 'first semester', '1st Year', 1, 2),
(66, 'GEN. El 002', '3', 'Elective (Living in IT Era)', 'second semester', '1st Year', 1, 2),
(67, 'THC 123', '3', 'Quality Service Management in Tourism and Hospitality', 'second semester', '1st Year', 1, 2),
(68, 'THC 143', '3', 'Philippine Tourism, Geography, and Culture', 'second semester', '1st Year', 1, 2),
(69, 'THC 163', '3', 'Micro Perspective of Tourism and Hospitality', 'second semester', '1st Year', 1, 2),
(70, 'HPC 123', '3', 'Kitchen Essentials and Basic Food Preparation', 'second semester', '1st Year', 1, 2),
(71, 'HPC 143', '3', 'Fundamentals in Lodging Operations', 'second semester', '1st Year', 1, 2),
(72, 'PATH-FIT 2', '2', 'Fitness Training', 'second semester', '1st Year', 1, 2),
(73, 'NSTP 2', '3', 'National Service Training Program 2', 'second semester', '1st Year', 1, 2),
(74, 'GEN. ED. 004', '3', 'Mathematics in the Modern World', 'first semester', '2nd Year', 1, 2),
(75, 'GEN. ED. 003', '3', 'Readings in Philippine History', 'first semester', '2nd Year', 1, 2),
(76, 'LIT 001', '3', 'Philippine Literature', 'first semester', '2nd Year', 1, 2),
(77, 'GEN. El 003', '3', 'Elective (Front Office Operations)', 'first semester', '2nd Year', 1, 2),
(78, 'BME 213', '3', 'Business Organization and Management', 'first semester', '2nd Year', 1, 2),
(79, 'HPC 213', '3', 'Applied Business Tools and Technologies (PMS) with Lab', 'first semester', '2nd Year', 1, 2),
(80, 'HPC 223', '3', 'Supply Chain Management in Hospitality Industry with Applied Economics', 'first semester', '2nd Year', 1, 2),
(81, 'HPC 5', '3', 'Foreign Language 1', 'first semester', '2nd Year', 1, 2),
(82, 'PATH-FIT 3', '2', 'Dance, Sports, Group Exercise, Outdoor, and Adventure Activities', 'first semester', '2nd Year', 1, 2),
(83, 'GEN. ED. 005', '3', 'Arts Appreciation', 'second semester', '2nd Year', 1, 2),
(84, 'GEN. ED 006', '3', 'Ethics', 'second semester', '2nd Year', 1, 2),
(85, 'LIT 002', '3', 'Contemporary Literature', 'second semester', '2nd Year', 1, 2),
(86, 'DRR 113', '3', 'Disaster Risk Reduction and Education in Emergencies', 'second semester', '2nd Year', 1, 2),
(87, 'HPC 223', '3', 'Fundamentals in Food Service Operations', 'second semester', '2nd Year', 1, 2),
(88, 'HPC 243', '3', 'Introduction to Meetings, Incentives, Conference, and Events, Management (MICE)', 'second semester', '2nd Year', 1, 2),
(89, 'HMPE 223', '3', 'Elective Course (Quick Food Service Operation)', 'second semester', '2nd Year', 1, 2),
(90, 'HPC 263', '3', 'Foreign Language 2', 'second semester', '2nd Year', 1, 2),
(91, 'PATH-FIT 4', '2', 'Basic Swimming', 'second semester', '2nd Year', 1, 2),
(92, 'HPC 202', '2', 'Educational Tour/ Field Trip', 'summer', '2nd Year', 1, 2),
(93, 'RIZAL 001', '3', 'Rizal’s Life and Work', 'first semester', '3rd Year', 1, 2),
(94, 'GEN. ED. 008', '3', 'Science, Technology, and Society', 'first semester', '3rd Year', 1, 2),
(95, 'HMPE 313', '3', 'Elective Course (Menu Design and Revenue Management)', 'first semester', '3rd Year', 1, 2),
(96, 'HMPE 333', '3', 'Elective Course (Trends and Issues in the Hospitality)', 'first semester', '3rd Year', 1, 2),
(97, 'BME 313', '3', 'Operations Management in Tourism and Hospitality Industry', 'first semester', '3rd Year', 1, 2),
(98, 'HPC 313', '3', 'Ergonomics and Facilities Planning for the Hospitality Industry', 'first semester', '3rd Year', 1, 2),
(99, 'HPC 333', '3', 'Research in Hospitality 1', 'first semester', '3rd Year', 1, 2),
(100, 'THC 333', '3', 'Professional Development and Applied Ethics', 'first semester', '3rd Year', 1, 2),
(101, 'HMPE 323', '3', 'Elective (Bar and Beverage Mgt)', 'second semester', '3rd Year', 1, 2),
(102, 'HMPE 345', '3', 'Elective (FOOD AND BEVERAGE COST CONTROL)', 'second semester', '3rd Year', 1, 2),
(103, 'BME 323', '3', 'Strategic Management in Tourism and Hospitality', 'second semester', '3rd Year', 1, 2),
(104, 'THC 323', '3', 'Tourism and Hospitality Marketing', 'second semester', '3rd Year', 1, 2),
(105, 'THC 343', '3', 'Legal Aspects in Tourism and Hospitality', 'second semester', '3rd Year', 1, 2),
(106, 'THC 363', '3', 'Multicultural Diversity in Workplace for the Tourism Professional', 'second semester', '3rd Year', 1, 2),
(107, 'THC 383', '3', 'Entrepreneurship in Tourism and Hospitality', 'second semester', '3rd Year', 1, 2),
(108, 'HPC 323', '3', 'Research in Hospitality 2', 'second semester', '3rd Year', 1, 2),
(109, 'HM 417', '7', 'Procticum-700 Hours', 'first semester', '4th Year', 1, 2),
(110, 'HM 427', '7', 'Procticum-700 Hours', 'second semester', '4th Year', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashiers`
--
ALTER TABLE `cashiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_departments`
--
ALTER TABLE `head_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrars`
--
ALTER TABLE `registrars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_inc_forms`
--
ALTER TABLE `request_inc_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cashiers`
--
ALTER TABLE `cashiers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `head_departments`
--
ALTER TABLE `head_departments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrars`
--
ALTER TABLE `registrars`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_inc_forms`
--
ALTER TABLE `request_inc_forms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
