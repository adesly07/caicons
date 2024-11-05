-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 03:29 PM
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
  `contact_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `reg_num`, `pwd`, `p_decr`, `w_amt`, `surname`, `first_name`, `middle_name`, `email`, `phone_number`, `nationality`, `sch_session`, `invoice_number`, `course_id`, `p_status`, `a_date`, `dob`, `sex`, `marital_status`, `hometown`, `a_address`, `state_of_origin`, `contact_address`) VALUES
(1, 'CAICON/PF/24/0001', '$2y$10$HibGOLiU99hd/BC0G8rLAOoxgpewzrbbBVhry9azA1VLe91Dtn/Wm', '004D96ED', '0', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000001', 1, 'CONFIRMED', '2024-11-04 11:25:28', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', 'Egbeda'),
(2, '', '', '', '', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000002', 1, 'NOT CONFIRMED', '2024-11-04 11:25:28', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', 'Egbeda'),
(3, 'CAICON/PF/24/0002', '$2y$10$l9tXPtNoysdMLsLU0I7A3eGVY7ASFUY9CjGH.vhEmdXE0QXADRiP2', '23C8B3D2', '0', 'Adedigba', 'Mary', 'Yewande', 'mary@gmail.com', '08059605896', 'Nigerian', '2025/2026', 'INV-0000003', 2, 'CONFIRMED', '2024-11-04 11:29:45', '1999-07-25', 'female', 'single', 'Oro', 'Egbeda', 'Kwara', 'Egbeda'),
(4, 'CAICON/PF/24/0003', '$2y$10$k.rsOQ9CeWGgSGVrJzj7POXKbqY/RTmmmIdvzVWuLCorZ/RO/DkS.', '35E3E984', '22000', 'Adedigba', 'Anthony', 'Folahan', 'thonyclaret@gmail.com', '08137428365', 'Nigerian', '2025/2026', 'INV-0000004', 1, 'CONFIRMED', '2024-11-04 11:25:28', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', 'Egbeda'),
(5, 'CAICON/PF/24/0001', '$2y$10$HibGOLiU99hd/BC0G8rLAOoxgpewzrbbBVhry9azA1VLe91Dtn/Wm', '004D96ED', '0', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000001', 1, 'CONFIRMED', '2024-11-04 11:25:28', '1990-07-25', 'female', 'single', 'Lagos', 'Egbeda', 'Oyo', 'Egbeda');

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
(1, 'CAICON/PF/24/0002', '../a_uploads/emma3.pdf', '../a_uploads/emma2.pdf', '../a_uploads/emma1.pdf', '../a_uploads/emma3.pdf', '../a_uploads/-8p2syo.jpg', '2024-11-04 14:37:19');

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
(1, 'CAICON/PF/24/0002', 'WAEC', '{\"Mathematics\":\"A1\",\"English Language\":\"B2\"}', 'WAEC', '{\"Mathematics\":\"B3\",\"English Language\":\"B3\"}', '2024-11-04 13:29:08');

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
(1, 'Nursing', '20000', '2000', '100000', '2000'),
(2, 'Public Health', '25000', '2000', '100000', '2000'),
(4, 'Mid-wifery', '20000', '3000', '100000', '4000'),
(5, 'Medical Lab', '20000', '2500', '120000', '3000');

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
(1, 'Staylite', 'First', '2024/2025'),
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
(1, 'CAICON/PF/24/0002', 'Yes', 'Typhoid', 'None for now');

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
(2, 'Application Form', 'CAICON/PF/24/0002', 2, 'INV-0000003', '0000002', 25000, 2000, 27000, '2025/2026', 'PAID', '2024-11-04 09:12:29');

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
(2, 'CAICON/PF/24/0002', 'Mother', 'Adedigba Christiana', 'Ibadan', '08083737832', NULL);

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
(2, 'CAICON/PF/24/0002', 'Adeola Secondary', 'Ibadan', 2011, 2016, 'SSCE');

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
(1, '2024/2025'),
(2, '2025/2026');

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
(1, 'Seun', 'admin', '$2y$10$P.PTejEEAGaLbq7XNfo5N.oTwLzUkiZ3fb.vHHc3OG1X/fydfEiPy', 'Accounts', '2024-10-21 10:36:53');

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_results`
--
ALTER TABLE `applicant_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `current`
--
ALTER TABLE `current`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `health_info`
--
ALTER TABLE `health_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools_attended`
--
ALTER TABLE `schools_attended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
