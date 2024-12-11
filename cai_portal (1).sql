-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 10:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cai_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `a_status` varchar(15) NOT NULL,
  `reg_num` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `p_decr` varchar(255) NOT NULL,
  `w_amt` varchar(20) NOT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `sch_session` varchar(10) DEFAULT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `course_id` int(10) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `a_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dob` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `a_address` text NOT NULL,
  `state_of_origin` varchar(100) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `contact_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `a_status`, `reg_num`, `pwd`, `p_decr`, `w_amt`, `surname`, `first_name`, `middle_name`, `email`, `phone_number`, `nationality`, `sch_session`, `invoice_number`, `course_id`, `p_status`, `a_date`, `dob`, `sex`, `marital_status`, `hometown`, `a_address`, `state_of_origin`, `lga`, `contact_address`) VALUES
(1, 'NOT ADMITTED', 'CAICON/PF/24/0001', '$2y$10$HibGOLiU99hd/BC0G8rLAOoxgpewzrbbBVhry9azA1VLe91Dtn/Wm', '004D96ED', '0', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000001', 1, 'CONFIRMED', '2024-11-13 10:40:56', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', '', 'Egbeda'),
(2, 'PENDING', '', '', '', '', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000002', 1, 'NOT CONFIRMED', '2024-11-13 09:32:31', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', '', 'Egbeda'),
(3, 'ADMITTED', 'CAICON/PF/24/0002', '$2y$10$l9tXPtNoysdMLsLU0I7A3eGVY7ASFUY9CjGH.vhEmdXE0QXADRiP2', '23C8B3D2', '114900', 'Adedigba', 'Mary', 'Yewande', 'mary@gmail.com', '08059605896', 'Nigerian', '2025/2026', 'INV-0000003', 2, 'CONFIRMED', '2024-12-04 09:19:03', '1999-07-25', 'female', 'single', 'Oro', 'Egbeda', 'Kwara', '', 'Egbeda'),
(4, 'PENDING', 'CAICON/PF/24/0003', '$2y$10$k.rsOQ9CeWGgSGVrJzj7POXKbqY/RTmmmIdvzVWuLCorZ/RO/DkS.', '35E3E984', '22000', 'Adedigba', 'Anthony', 'Folahan', 'thonyclaret@gmail.com', '08137428365', 'Nigerian', '2025/2026', 'INV-0000004', 1, 'CONFIRMED', '2024-11-27 14:38:11', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', '', 'Egbeda'),
(6, 'ADMITTED', 'CAICON/PF/23/0001', '$2y$10$sT3VbiuRtfMPcZSxSuII7.4NpboRNFpigwcnbt8K43gUjWje1ZQY.', '9E169D1D', '0', 'Sly', 'Seun', 'Yemi', 'seunsly@gmail.com', '08064405936', 'Nigerian', '2023/2024', '-', 1, 'CONFIRMED', '2024-12-04 08:09:18', '2000-08-09', 'male', 'single', 'Lagos', 'Lagos', 'Oyo', 'Ibadan South West', 'Ibadan'),
(7, 'ADMITTED', 'CAICON/PF/23/0002', '$2y$10$68ApIhyRaCeU1yCMA6dZD.f7eIFaAUO7ckLqW0h9LgKepKc4DsrEC', 'A92EC022', '0', 'Ayoola', 'Adebayo', 'Olufem', 'ayo@gmail.com', '08064405936', 'Nigerian', '2024/2025', '-', 1, 'CONFIRMED', '2024-12-05 09:23:41', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_documents`
--

CREATE TABLE `applicant_documents` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(255) DEFAULT NULL,
  `o_level_first_sitting` varchar(255) DEFAULT NULL,
  `o_level_second_sitting` varchar(255) DEFAULT NULL,
  `birth_certificate` varchar(255) DEFAULT NULL,
  `marriage_certificate` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_documents`
--

INSERT INTO `applicant_documents` (`id`, `reg_num`, `o_level_first_sitting`, `o_level_second_sitting`, `birth_certificate`, `marriage_certificate`, `passport`, `upload_date`) VALUES
(1, 'CAICON/PF/24/0002', '../a_uploads/emma3.pdf', '../a_uploads/emma2.pdf', '../a_uploads/emma1.pdf', '../a_uploads/emma3.pdf', '../a_uploads/-8p2syo.jpg', '2024-11-04 14:37:19'),
(2, 'CAICON/PF/23/0001', '../a_uploads/IMG-20241119-WA0005.jpg', NULL, '../a_uploads/IMG-20241119-WA0003.jpg', NULL, '../a_uploads/Adesola.png', '2024-12-04 08:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_results`
--

CREATE TABLE `applicant_results` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `exam_type_first_sitting` varchar(10) DEFAULT NULL,
  `subject_first_sitting` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`subject_first_sitting`)),
  `exam_type_second_sitting` varchar(10) DEFAULT NULL,
  `subject_second_sitting` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`subject_second_sitting`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_results`
--

INSERT INTO `applicant_results` (`id`, `reg_num`, `exam_type_first_sitting`, `subject_first_sitting`, `exam_type_second_sitting`, `subject_second_sitting`, `created_at`) VALUES
(1, 'CAICON/PF/24/0002', 'WAEC', '{\"Mathematics\":\"A1\",\"English Language\":\"B2\"}', 'WAEC', '{\"Mathematics\":\"B3\",\"English Language\":\"B3\"}', '2024-11-04 13:29:08'),
(2, 'CAICON/PF/23/0001', 'WAEC', '{\"Mathematics\":\"C4\",\"English Language\":\"C5\",\"Physics\":\"C6\",\"Chemistry\":\"C6\",\"Biology\":\"C5\"}', '', '{\"\":\"A1\"}', '2024-12-04 08:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `item_names` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `sch_session` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `item_names`, `category`, `sch_session`, `level`, `amount`) VALUES
(1, 'School Fees', 'Tuition', '2024/2025', 'Year 1', 500000),
(2, 'School Fees', 'Library', '2024/2025', 'Year 1', 15000),
(3, 'School Fees', 'Accommodation', '2024/2025', 'Year 1', 200000),
(4, 'School Fees', 'Computer Training', '2024/2025', 'Year 1', 20000),
(5, 'School Fees', 'Examination fees and materials', '2024/2025', 'Year 1', 80000),
(6, 'School Fees', 'Caping Ceremony', '2024/2025', 'Year 1', 5000),
(7, 'School Fees', 'Accreditation fee', '2024/2025', 'Year 1', 15000),
(8, 'School Fees', 'Uniform (2 sets) & 2 sets of Scrub', '2024/2025', 'Year 1', 80000),
(9, 'School Fees', 'Procedure Manual / School Curriculum', '2024/2025', 'Year 1', 40000),
(10, 'School Fees', 'Florence Nightingale', '2024/2025', 'Year 1', 10000),
(11, 'School Fees', 'Bench fee', '2024/2025', 'Year 1', 20000),
(12, 'School Fees', 'Stationeries', '2024/2025', 'Year 1', 10000),
(13, 'School Fees', 'Sports', '2024/2025', 'Year 1', 5000),
(14, 'School Fees', 'ID card / Name tag', '2024/2025', 'Year 1', 5000),
(15, 'School Fees', 'Verification of one result', '2024/2025', 'Year 1', 5000),
(16, 'School Fees', 'Caution fees', '2024/2025', 'Year 1', 10000),
(17, 'School Fees', 'Record book of instruction', '2024/2025', 'Year 1', 5000),
(18, 'School Fees', 'Utilities', '2024/2025', 'Year 1', 20000),
(19, 'School Fees', 'NHIS', '2024/2025', 'Year 1', 15000),
(20, 'School Fees', 'Medical test', '2024/2025', 'Year 1', 40000),
(22, 'Acceptance Fee', 'Acceptance Fee', '2024/2025', 'Year 1', 50000),
(23, 'School Fees', 'Development', '2024/2025', 'Year 1', 100000),
(24, 'Online Rectification', 'Online Rectification', '2024/2025', 'Year 1', 1000),
(26, 'Acceptance Fee', 'Acceptance Fee', '2023/2024', 'Year 1', 20000),
(27, 'School Fees', 'Tuition', '2023/2024', 'Year 1', 300000),
(28, 'School Fees', 'Library', '2023/2024', 'Year 1', 20000),
(29, 'School Fees', 'Accommodation', '2023/2024', 'Year 1', 100000),
(30, 'School Fees', 'Development', '2023/2024', 'Year 1', 25000),
(31, 'School Fees', 'Computer Training', '2023/2024', 'Year 1', 20000),
(32, 'School Fees', 'Examination fees and materials', '2023/2024', 'Year 1', 80000),
(33, 'School Fees', 'Caping Ceremony', '2023/2024', 'Year 1', 5000),
(34, 'School Fees', 'Accreditation fee', '2023/2024', 'Year 1', 15000),
(35, 'School Fees', 'Uniform (2 sets)', '2023/2024', 'Year 1', 40000),
(36, 'School Fees', 'Indexing', '2023/2024', 'Year 1', 10000),
(37, 'School Fees', 'Procedure Manual / School Curriculum', '2023/2024', 'Year 1', 40000),
(38, 'School Fees', 'Florence Nightingale', '2023/2024', 'Year 1', 10000),
(39, 'School Fees', 'Bench fee', '2023/2024', 'Year 1', 20000),
(40, 'School Fees', 'Stationeries', '2023/2024', 'Year 1', 10000),
(41, 'School Fees', 'Sports', '2023/2024', 'Year 1', 5000),
(42, 'School Fees', 'ID card / Name tag', '2023/2024', 'Year 1', 5000),
(43, 'School Fees', 'Verification of one result', '2023/2024', 'Year 1', 5000),
(44, 'School Fees', 'Caution fees', '2023/2024', 'Year 1', 10000),
(45, 'School Fees', 'Record book of instruction', '2023/2024', 'Year 1', 5000),
(46, 'School Fees', 'Utilities', '2023/2024', 'Year 1', 20000),
(47, 'School Fees', 'NHIS', '2023/2024', 'Year 1', 15000),
(48, 'School Fees', 'Medical test', '2023/2024', 'Year 1', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `phone_number`, `email_address`, `address`) VALUES
(1, '+2349165950229, 08120250356', 'info@caicons.edu.ng', 'Oluyoro, Oke-Ofa, Ibadan, Oyo State, Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(4) NOT NULL,
  `course` varchar(255) NOT NULL,
  `f_amount` varchar(20) NOT NULL,
  `t_fee` varchar(20) NOT NULL,
  `acceptance_fee` varchar(20) NOT NULL,
  `accp_tran_fee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `f_amount`, `t_fee`, `acceptance_fee`, `accp_tran_fee`) VALUES
(1, 'General Nursing', '20000', '2000', '100000', '2000'),
(2, 'Public Health', '25000', '2000', '100000', '2000'),
(4, 'Mid-wifery', '20000', '3000', '100000', '4000'),
(5, 'Medical Lab', '20000', '2500', '120000', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `courses_reg`
--

CREATE TABLE `courses_reg` (
  `id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `units` int(11) NOT NULL,
  `year` enum('Year 1','Year 2','Year 3','Year 4') NOT NULL,
  `semester` enum('Semester I','Semester II') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_reg`
--

INSERT INTO `courses_reg` (`id`, `course_code`, `course_title`, `units`, `year`, `semester`) VALUES
(1, 'GNS 110', 'Anatomy and Physiology', 4, 'Year 1', 'Semester I'),
(2, 'GNS 111', 'Foundation of Nursing I', 4, 'Year 1', 'Semester I'),
(3, 'GNS 112', 'Nutrition', 2, 'Year 1', 'Semester I'),
(4, 'GST 110', 'Use of English', 2, 'Year 1', 'Semester I'),
(5, 'GST 111', 'Applied Physics', 2, 'Year 1', 'Semester I'),
(6, 'GST 112', 'Applied Chemistry', 2, 'Year 1', 'Semester I'),
(7, 'GST 113', 'Sociology', 2, 'Year 1', 'Semester I'),
(8, 'GST 114', 'Introduction to Information Communication Technology', 2, 'Year 1', 'Semester I'),
(9, 'GNS 120', 'Anatomy and Physiology II', 4, 'Year 1', 'Semester II'),
(10, 'GNS 121', 'Foundation of Nursing II', 4, 'Year 1', 'Semester II'),
(11, 'GNS 122', 'Medical Surgical Nursing I', 3, 'Year 1', 'Semester II'),
(12, 'GNS 123', 'Primary Healthcare I', 3, 'Year 1', 'Semester II'),
(13, 'GNS 124', 'Microbiology', 3, 'Year 1', 'Semester II'),
(14, 'GNS 125', 'Pharmacology', 2, 'Year 1', 'Semester II'),
(15, 'GST 120', 'Psychology', 2, 'Year 1', 'Semester II'),
(16, 'GNS 126', 'Hospital Based Clinical Practice', 4, 'Year 1', 'Semester II');

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE `course_registration` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `sch_session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_registration`
--

INSERT INTO `course_registration` (`id`, `reg_num`, `level`, `course_code`, `course_title`, `unit`, `semester`, `sch_session`) VALUES
(1, 'CAICON/PF/24/0002', 'Year 1', 'GST 114', 'Introduction to Information Communication Technology', 2, 'Semester I', '2024/2025'),
(4, 'CAICON/PF/24/0002', 'Year 1', 'GNS 111', 'Foundation of Nursing I', 4, 'Semester I', '2024/2025'),
(5, 'CAICON/PF/24/0002', 'Year 1', 'GST 110', 'Use of English', 2, 'Semester I', '2024/2025'),
(6, 'CAICON/PF/24/0002', 'Year 1', 'GST 111', 'Applied Physics', 2, 'Semester I', '2024/2025'),
(7, 'CAICON/PF/24/0002', 'Year 1', 'GST 112', 'Applied Chemistry', 2, 'Semester I', '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `current`
--

CREATE TABLE `current` (
  `id` int(4) NOT NULL,
  `s_category` varchar(20) NOT NULL,
  `s_semester` varchar(10) NOT NULL,
  `s_session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current`
--

INSERT INTO `current` (`id`, `s_category`, `s_semester`, `s_session`) VALUES
(1, 'Staylite', 'First', '2023/2024'),
(2, 'Applicant', 'First', '2025/2026');

-- --------------------------------------------------------

--
-- Table structure for table `health_info`
--

CREATE TABLE `health_info` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `hasCondition` varchar(10) NOT NULL,
  `conditionDetails` varchar(255) DEFAULT NULL,
  `otherInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_info`
--

INSERT INTO `health_info` (`id`, `reg_num`, `hasCondition`, `conditionDetails`, `otherInfo`) VALUES
(1, 'CAICON/PF/24/0002', 'Yes', 'Typhoid', 'None for now'),
(2, 'CAICON/PF/24/0001', 'No', '', 'none'),
(3, 'CAICON/PF/23/0001', 'No', '', 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(4) NOT NULL,
  `level_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`) VALUES
(1, 'Year 1'),
(2, 'Year 2'),
(3, 'Year 3'),
(4, 'Year 4');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paid_for` varchar(50) NOT NULL,
  `reg_num` varchar(50) NOT NULL,
  `course_id` int(4) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `receipt_number` varchar(20) NOT NULL,
  `f_amount` int(10) NOT NULL,
  `t_fee` int(10) NOT NULL,
  `t_amount` int(10) NOT NULL,
  `sch_session` varchar(20) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `date_paid` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paid_for`, `reg_num`, `course_id`, `invoice_number`, `receipt_number`, `f_amount`, `t_fee`, `t_amount`, `sch_session`, `p_status`, `date_paid`) VALUES
(1, 'Application Form', 'CAICON/PF/24/0001', 1, 'INV-0000001', '0000001', 20000, 2000, 22000, '2025/2026', 'PAID', '2024-11-04 08:50:49'),
(2, 'Application Form', 'CAICON/PF/24/0002', 2, 'INV-0000003', '0000002', 25000, 2000, 27000, '2025/2026', 'PAID', '2024-11-04 09:12:29'),
(6, 'School Fees', 'CAICON/PF/24/0002', 2, 'INV-0000001', '0000001', 1200000, 2000, 1202000, '2024/2025', 'PAID', '2024-11-21 09:32:02'),
(7, 'Online Rectification', 'CAICON/PF/24/0002', 2, 'INV-0000001', '0000001', 1000, 100, 1100, '2024/2025', 'PAID', '2024-12-04 09:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `payment_items`
--

CREATE TABLE `payment_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `t_fee` int(10) NOT NULL,
  `s_session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_items`
--

INSERT INTO `payment_items` (`id`, `item_name`, `t_fee`, `s_session`) VALUES
(1, 'Application Form', 0, ''),
(2, 'Acceptance Fee', 0, ''),
(3, 'School Fees', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `id` int(11) NOT NULL,
  `sch_session` varchar(10) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `serial_number` varchar(10) NOT NULL,
  `status` enum('USED','UNUSED') DEFAULT 'UNUSED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`id`, `sch_session`, `pin`, `serial_number`, `status`) VALUES
(1, '2023/2024', '3271690845', '32279', 'UNUSED'),
(2, '2023/2024', '9260354871', '38477', 'UNUSED'),
(3, '2023/2024', '8251346709', '12956', 'UNUSED'),
(4, '2023/2024', '5380641297', '32041', 'UNUSED'),
(5, '2023/2024', '7634251890', '55028', 'UNUSED'),
(6, '2023/2024', '4390127658', '55920', 'UNUSED'),
(7, '2023/2024', '8512349067', '95508', 'UNUSED'),
(8, '2023/2024', '5613470982', '51540', 'UNUSED'),
(9, '2023/2024', '2067859314', '36973', 'UNUSED'),
(10, '2023/2024', '0472683951', '99043', 'UNUSED'),
(11, '2023/2024', '9380462157', '60695', 'UNUSED'),
(12, '2023/2024', '3045268791', '79153', 'UNUSED'),
(13, '2023/2024', '1453267809', '46804', 'UNUSED'),
(14, '2023/2024', '4712650398', '26436', 'UNUSED'),
(15, '2023/2024', '2895634170', '39282', 'UNUSED'),
(16, '2023/2024', '5360721498', '97891', 'UNUSED'),
(17, '2023/2024', '0618953724', '62191', 'UNUSED'),
(18, '2023/2024', '3514092678', '57515', 'UNUSED'),
(19, '2023/2024', '8912340576', '86586', 'UNUSED'),
(20, '2023/2024', '1396482075', '62871', 'UNUSED'),
(21, '2023/2024', '0826345179', '91762', 'UNUSED'),
(22, '2023/2024', '0587136942', '68371', 'UNUSED'),
(23, '2023/2024', '1534870629', '85650', 'UNUSED'),
(24, '2023/2024', '1832579046', '66498', 'UNUSED'),
(25, '2023/2024', '1349625780', '27401', 'UNUSED'),
(26, '2023/2024', '4986352170', '73147', 'UNUSED'),
(27, '2023/2024', '1324906785', '96726', 'UNUSED'),
(28, '2023/2024', '4801763259', '57369', 'UNUSED'),
(29, '2023/2024', '0642317589', '38355', 'UNUSED'),
(30, '2023/2024', '6240953718', '82281', 'UNUSED'),
(31, '2023/2024', '6178543092', '84785', 'UNUSED'),
(32, '2023/2024', '0789135426', '24043', 'UNUSED'),
(33, '2023/2024', '3620894175', '55167', 'UNUSED'),
(34, '2023/2024', '6405298731', '16604', 'UNUSED'),
(35, '2023/2024', '6927310854', '91258', 'UNUSED'),
(36, '2023/2024', '5906374281', '33394', 'UNUSED'),
(37, '2023/2024', '6197540832', '35533', 'UNUSED'),
(38, '2023/2024', '6439528071', '80587', 'UNUSED'),
(39, '2023/2024', '2349065178', '94495', 'UNUSED'),
(40, '2023/2024', '2479618305', '75112', 'UNUSED'),
(41, '2023/2024', '8243071596', '57298', 'UNUSED'),
(42, '2023/2024', '0389176425', '54427', 'UNUSED'),
(43, '2023/2024', '1079452836', '53120', 'UNUSED'),
(44, '2023/2024', '9764852130', '65525', 'UNUSED'),
(45, '2023/2024', '3709826415', '96470', 'UNUSED'),
(46, '2023/2024', '2516934078', '84540', 'UNUSED'),
(47, '2023/2024', '6194538270', '41465', 'UNUSED'),
(48, '2023/2024', '8561403729', '79754', 'UNUSED'),
(49, '2023/2024', '7829340615', '54921', 'UNUSED'),
(50, '2023/2024', '7643085912', '18617', 'UNUSED'),
(51, '2023/2024', '0568473912', '97286', 'UNUSED'),
(52, '2023/2024', '8312964570', '53842', 'UNUSED'),
(53, '2023/2024', '9264310857', '32139', 'UNUSED'),
(54, '2023/2024', '4790351628', '60263', 'UNUSED'),
(55, '2023/2024', '7206398541', '18089', 'UNUSED'),
(56, '2023/2024', '8704156923', '71256', 'UNUSED'),
(57, '2023/2024', '7942038156', '63457', 'UNUSED'),
(58, '2023/2024', '0589234176', '41815', 'UNUSED'),
(59, '2023/2024', '7250916843', '33839', 'UNUSED'),
(60, '2023/2024', '3409875126', '81336', 'UNUSED'),
(61, '2023/2024', '6823940751', '73471', 'UNUSED'),
(62, '2023/2024', '6281043975', '99944', 'UNUSED'),
(63, '2023/2024', '7918543062', '17895', 'UNUSED'),
(64, '2023/2024', '6287093541', '30709', 'UNUSED'),
(65, '2023/2024', '0561328479', '62541', 'UNUSED'),
(66, '2023/2024', '2960548137', '33868', 'UNUSED'),
(67, '2023/2024', '3241087569', '57989', 'UNUSED'),
(68, '2023/2024', '6935124807', '30749', 'UNUSED'),
(69, '2023/2024', '6803712459', '36010', 'UNUSED'),
(70, '2023/2024', '4805213697', '35534', 'UNUSED'),
(71, '2023/2024', '6430891527', '53573', 'UNUSED'),
(72, '2023/2024', '7586109342', '29718', 'UNUSED'),
(73, '2023/2024', '8634190572', '20044', 'UNUSED'),
(74, '2023/2024', '4519862307', '73448', 'UNUSED'),
(75, '2023/2024', '8072139654', '15145', 'UNUSED'),
(76, '2023/2024', '1487026395', '23995', 'UNUSED'),
(77, '2023/2024', '2437958160', '92210', 'UNUSED'),
(78, '2023/2024', '6340179582', '42524', 'UNUSED'),
(79, '2023/2024', '7965804213', '72659', 'UNUSED'),
(80, '2023/2024', '6178024539', '76715', 'UNUSED'),
(81, '2023/2024', '3842709156', '49430', 'UNUSED'),
(82, '2023/2024', '7826501943', '66083', 'UNUSED'),
(83, '2023/2024', '8752916043', '99086', 'UNUSED'),
(84, '2023/2024', '9205386471', '14811', 'UNUSED'),
(85, '2023/2024', '2891375064', '40383', 'UNUSED'),
(86, '2023/2024', '7912405368', '23886', 'UNUSED'),
(87, '2023/2024', '3564192708', '27474', 'UNUSED'),
(88, '2023/2024', '5172639048', '62485', 'UNUSED'),
(89, '2023/2024', '7435810269', '79015', 'UNUSED'),
(90, '2023/2024', '8746215093', '30831', 'UNUSED'),
(91, '2023/2024', '7534620981', '55826', 'UNUSED'),
(92, '2023/2024', '6574103892', '95273', 'UNUSED'),
(93, '2023/2024', '3459716802', '81843', 'UNUSED'),
(94, '2023/2024', '1049526378', '87899', 'UNUSED'),
(95, '2023/2024', '7158936402', '60706', 'UNUSED'),
(96, '2023/2024', '3085714629', '62432', 'UNUSED'),
(97, '2023/2024', '0456231789', '62531', 'UNUSED'),
(98, '2023/2024', '5491803762', '46192', 'UNUSED'),
(99, '2023/2024', '0948136572', '81713', 'UNUSED'),
(100, '2023/2024', '9046513728', '73431', 'UNUSED'),
(101, '2023/2024', '9582476301', '44987', 'UNUSED'),
(102, '2023/2024', '3978061524', '53622', 'UNUSED'),
(103, '2023/2024', '7806591432', '38242', 'UNUSED'),
(104, '2023/2024', '9385026741', '42792', 'UNUSED'),
(105, '2023/2024', '3274015986', '95751', 'UNUSED'),
(106, '2023/2024', '0592631847', '39418', 'UNUSED'),
(107, '2023/2024', '5873261049', '62321', 'UNUSED'),
(108, '2023/2024', '3076581429', '15597', 'UNUSED'),
(109, '2023/2024', '7508469132', '35279', 'UNUSED'),
(110, '2023/2024', '9684153027', '64672', 'UNUSED'),
(111, '2024/2025', '9412057683', '72709', 'UNUSED'),
(112, '2024/2025', '2308451697', '84445', 'UNUSED'),
(113, '2024/2025', '1639507284', '32415', 'UNUSED'),
(114, '2024/2025', '5139076284', '23667', 'UNUSED'),
(115, '2024/2025', '3760892145', '20159', 'UNUSED'),
(116, '2024/2025', '7635809142', '53561', 'UNUSED'),
(117, '2024/2025', '6132497580', '79617', 'UNUSED'),
(118, '2024/2025', '3725694801', '97283', 'UNUSED'),
(119, '2024/2025', '8752403916', '92217', 'UNUSED'),
(120, '2024/2025', '7582310496', '32661', 'UNUSED'),
(121, '2024/2025', '8564239107', '14733', 'UNUSED'),
(122, '2024/2025', '6735194820', '70649', 'UNUSED'),
(123, '2024/2025', '3789416025', '70536', 'UNUSED'),
(124, '2024/2025', '9170524836', '79615', 'UNUSED'),
(125, '2024/2025', '6102489735', '96724', 'UNUSED'),
(126, '2024/2025', '0173429568', '23242', 'UNUSED'),
(127, '2024/2025', '8594760123', '71983', 'UNUSED'),
(128, '2024/2025', '8537401296', '11761', 'UNUSED'),
(129, '2024/2025', '2104963758', '68589', 'UNUSED'),
(130, '2024/2025', '2604731589', '26404', 'UNUSED'),
(131, '2024/2025', '9875034261', '54265', 'UNUSED'),
(132, '2024/2025', '5176842930', '92112', 'UNUSED'),
(133, '2024/2025', '7406815329', '37126', 'UNUSED'),
(134, '2024/2025', '1276805439', '42131', 'UNUSED'),
(135, '2024/2025', '9740825316', '52859', 'UNUSED'),
(136, '2024/2025', '0963182457', '33404', 'UNUSED'),
(137, '2024/2025', '4850793162', '70461', 'UNUSED'),
(138, '2024/2025', '4012836597', '85359', 'UNUSED'),
(139, '2024/2025', '7409385216', '35939', 'UNUSED'),
(140, '2024/2025', '7309645218', '60069', 'UNUSED'),
(141, '2024/2025', '4792051368', '24725', 'UNUSED'),
(142, '2024/2025', '3709428516', '51137', 'UNUSED'),
(143, '2024/2025', '2817463095', '85745', 'UNUSED'),
(144, '2024/2025', '6497203851', '64433', 'UNUSED'),
(145, '2024/2025', '2879536410', '95726', 'UNUSED'),
(146, '2024/2025', '4079123685', '27449', 'UNUSED'),
(147, '2024/2025', '0839764512', '24534', 'UNUSED'),
(148, '2024/2025', '0345169287', '22062', 'UNUSED'),
(149, '2024/2025', '6817042395', '54870', 'UNUSED'),
(150, '2024/2025', '8416290753', '46182', 'UNUSED'),
(151, '2024/2025', '4280973165', '49068', 'UNUSED'),
(152, '2024/2025', '8049621357', '26166', 'UNUSED'),
(153, '2024/2025', '7024863915', '41177', 'UNUSED'),
(154, '2024/2025', '4132679850', '23279', 'UNUSED'),
(155, '2024/2025', '3981265074', '50233', 'UNUSED'),
(156, '2024/2025', '5617849302', '86001', 'UNUSED'),
(157, '2024/2025', '9423106875', '52400', 'UNUSED'),
(158, '2024/2025', '5293147806', '86868', 'UNUSED'),
(159, '2024/2025', '7820394615', '30042', 'UNUSED'),
(160, '2024/2025', '2769384051', '24133', 'UNUSED'),
(161, '2024/2025', '6938215704', '25517', 'UNUSED'),
(162, '2024/2025', '2590146837', '65610', 'UNUSED'),
(163, '2024/2025', '8174293065', '96888', 'UNUSED'),
(164, '2024/2025', '0617823945', '83676', 'UNUSED'),
(165, '2024/2025', '8095734261', '68187', 'UNUSED'),
(166, '2024/2025', '9035812746', '53383', 'UNUSED'),
(167, '2024/2025', '8591263074', '18189', 'UNUSED'),
(168, '2024/2025', '1893460275', '48603', 'UNUSED'),
(169, '2024/2025', '1248906357', '31592', 'UNUSED'),
(170, '2024/2025', '9780352614', '41733', 'UNUSED'),
(171, '2024/2025', '9085613247', '51003', 'UNUSED'),
(172, '2024/2025', '7230594816', '74780', 'UNUSED'),
(173, '2024/2025', '8745139062', '85516', 'UNUSED'),
(174, '2024/2025', '3476120895', '27805', 'UNUSED'),
(175, '2024/2025', '8103496527', '31479', 'UNUSED'),
(176, '2024/2025', '0529874136', '24675', 'UNUSED'),
(177, '2024/2025', '7085164329', '32099', 'UNUSED'),
(178, '2024/2025', '2973856410', '60699', 'UNUSED'),
(179, '2024/2025', '4650981723', '14654', 'UNUSED'),
(180, '2024/2025', '3407169825', '39080', 'UNUSED'),
(181, '2024/2025', '1206849753', '71532', 'UNUSED'),
(182, '2024/2025', '3780524691', '84547', 'UNUSED'),
(183, '2024/2025', '4763805192', '66304', 'UNUSED'),
(184, '2024/2025', '6243591087', '83608', 'UNUSED'),
(185, '2024/2025', '7689125304', '19411', 'UNUSED'),
(186, '2024/2025', '3728140695', '49010', 'UNUSED'),
(187, '2024/2025', '1256439807', '42314', 'UNUSED'),
(188, '2024/2025', '5643829170', '48112', 'UNUSED'),
(189, '2024/2025', '5160823479', '86505', 'UNUSED'),
(190, '2024/2025', '3084795162', '33249', 'UNUSED'),
(191, '2024/2025', '8392517640', '97981', 'UNUSED'),
(192, '2024/2025', '2301764859', '58275', 'UNUSED'),
(193, '2024/2025', '8761295340', '89802', 'UNUSED'),
(194, '2024/2025', '3604712589', '11957', 'UNUSED'),
(195, '2024/2025', '1476359820', '93377', 'UNUSED'),
(196, '2024/2025', '0698243571', '20554', 'UNUSED'),
(197, '2024/2025', '0683247195', '17792', 'UNUSED'),
(198, '2024/2025', '0658927143', '76468', 'UNUSED'),
(199, '2024/2025', '7024685319', '62931', 'UNUSED'),
(200, '2024/2025', '8705961342', '98427', 'UNUSED'),
(201, '2024/2025', '1750623849', '62097', 'UNUSED'),
(202, '2024/2025', '6801452793', '16395', 'UNUSED'),
(203, '2024/2025', '2083741956', '97602', 'UNUSED'),
(204, '2024/2025', '6253789410', '73693', 'UNUSED'),
(205, '2024/2025', '3460758129', '13972', 'UNUSED'),
(206, '2024/2025', '1692837405', '55715', 'UNUSED'),
(207, '2024/2025', '9073158426', '67959', 'UNUSED'),
(208, '2024/2025', '6941370825', '73478', 'UNUSED'),
(209, '2024/2025', '0183529674', '50617', 'UNUSED'),
(210, '2024/2025', '8540369127', '27756', 'UNUSED');

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `relative_type` varchar(20) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_phone` varchar(15) NOT NULL,
  `r_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `reg_num`, `relative_type`, `r_name`, `r_address`, `r_phone`, `r_email`) VALUES
(1, 'CAICON/PF/24/0002', 'Father', 'Adedigba Christopher', 'Ibadan', '08036764877', NULL),
(2, 'CAICON/PF/24/0002', 'Mother', 'Adedigba Christiana', 'Ibadan', '08083737832', NULL),
(3, 'CAICON/PF/24/0001', 'Father', 'Adedigba C.I', 'Igboora', '08064405936', NULL),
(4, 'CAICON/PF/24/0001', 'Mother', 'Adedigba C.A', 'Igboora', '07085362201', NULL),
(5, 'CAICON/PF/23/0001', 'Father', 'Mr Yemi', 'Ibadan', '08064405936', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools_attended`
--

CREATE TABLE `schools_attended` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(50) NOT NULL,
  `institution_name` varchar(100) NOT NULL,
  `place_country` varchar(100) NOT NULL,
  `from_year` year(4) NOT NULL,
  `to_year` year(4) NOT NULL,
  `qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools_attended`
--

INSERT INTO `schools_attended` (`id`, `reg_num`, `institution_name`, `place_country`, `from_year`, `to_year`, `qualification`) VALUES
(1, 'CAICON/PF/24/0002', 'Bee Nur/Pry School', 'Ibadan', 2023, 2010, 'FLCE'),
(2, 'CAICON/PF/24/0002', 'Adeola Secondary', 'Ibadan', 2011, 2016, 'SSCE'),
(3, 'CAICON/PF/24/0001', 'Adegoke N/P ', 'Igboora', 1996, 1998, 'FLCE'),
(4, 'CAICON/PF/24/0001', 'Igboora High School', 'Igboora', 1998, 2003, 'SSCE'),
(5, 'CAICON/PF/23/0001', 'Newspring Schools', 'Ibadan', 2005, 2011, 'FLCE'),
(6, 'CAICON/PF/23/0001', 'Newspring College', 'Ibadan', 2012, 2018, 'SSCE');

-- --------------------------------------------------------

--
-- Table structure for table `sch_session`
--

CREATE TABLE `sch_session` (
  `id` int(4) NOT NULL,
  `s_session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sch_session`
--

INSERT INTO `sch_session` (`id`, `s_session`) VALUES
(1, '2023/2024'),
(2, '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(4) NOT NULL,
  `s_semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `s_semester`) VALUES
(1, 'First'),
(2, 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `s_invoice`
--

CREATE TABLE `s_invoice` (
  `id` int(11) NOT NULL,
  `paid_for` varchar(50) NOT NULL,
  `reg_num` varchar(50) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `t_amount` int(10) NOT NULL,
  `t_fee` int(10) NOT NULL,
  `sch_session` varchar(20) NOT NULL,
  `g_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_invoice`
--

INSERT INTO `s_invoice` (`id`, `paid_for`, `reg_num`, `invoice_number`, `t_amount`, `t_fee`, `sch_session`, `g_date`) VALUES
(1, 'Acceptance Fee', 'CAICON/PF/24/0002', 'INV-0000001', 50000, 2000, '2024/2025', '2024-11-21 08:26:54'),
(2, 'School Fees', 'CAICON/PF/24/0002', 'INV-0000001', 1200000, 2000, '2024/2025', '2024-11-21 08:27:04'),
(7, 'Online Rectification', 'CAICON/PF/24/0002', 'INV-0000001', 1000, 100, '2024/2025', '2024-12-04 09:18:53'),
(8, 'Acceptance Fee', 'CAICON/PF/24/0002', 'INV-0000002', 50000, 2000, '2024/2025', '2024-12-04 10:17:53'),
(9, 'Acceptance Fee', 'CAICON/PF/24/0002', 'INV-0000003', 50000, 2000, '2024/2025', '2024-12-04 10:19:39'),
(10, 'School Fee', 'CAICON/PF/24/0002', 'INV-0000001', 0, 0, '2024/2025', '2024-12-06 09:15:05'),
(11, 'School Fee', 'CAICON/PF/24/0002', 'INV-0000002', 0, 0, '2023/2024', '2024-12-06 09:15:24'),
(12, 'School Fees', 'CAICON/PF/24/0002', 'INV-0000002', 1200000, 0, '2024/2025', '2024-12-06 09:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `username`, `password`, `department`, `created_at`) VALUES
(1, 'Seun', 'admin', '$2y$10$P.PTejEEAGaLbq7XNfo5N.oTwLzUkiZ3fb.vHHc3OG1X/fydfEiPy', 'Accounts', '2024-10-21 10:36:53'),
(3, 'Sly', 'sly', '$2y$10$P.PTejEEAGaLbq7XNfo5N.oTwLzUkiZ3fb.vHHc3OG1X/fydfEiPy', 'Exams and Records', '2024-11-22 09:09:49'),
(4, 'Sylvester', 'seun', '$2y$10$P.PTejEEAGaLbq7XNfo5N.oTwLzUkiZ3fb.vHHc3OG1X/fydfEiPy', 'ICT', '2024-12-05 09:38:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_results`
--
ALTER TABLE `applicant_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_reg`
--
ALTER TABLE `courses_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current`
--
ALTER TABLE `current`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_info`
--
ALTER TABLE `health_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_attended`
--
ALTER TABLE `schools_attended`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sch_session`
--
ALTER TABLE `sch_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_invoice`
--
ALTER TABLE `s_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_results`
--
ALTER TABLE `applicant_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses_reg`
--
ALTER TABLE `courses_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_registration`
--
ALTER TABLE `course_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `current`
--
ALTER TABLE `current`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_info`
--
ALTER TABLE `health_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_items`
--
ALTER TABLE `payment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools_attended`
--
ALTER TABLE `schools_attended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sch_session`
--
ALTER TABLE `sch_session`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `s_invoice`
--
ALTER TABLE `s_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
