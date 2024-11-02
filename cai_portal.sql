-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 02:49 PM
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
  `a_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `reg_num`, `pwd`, `p_decr`, `w_amt`, `surname`, `first_name`, `middle_name`, `email`, `phone_number`, `nationality`, `sch_session`, `invoice_number`, `course_id`, `p_status`, `a_date`) VALUES
(1, 'CAICON/PF/24/0001', '$2y$10$HibGOLiU99hd/BC0G8rLAOoxgpewzrbbBVhry9azA1VLe91Dtn/Wm', '004D96ED', '22000', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000001', 1, 'CONFIRMED', '2024-11-01 13:55:42'),
(2, '', '', '', '', 'Adedigba', 'Sylvester', 'Seun', 'adesly07@gmail.com', '08064405936', 'Nigerian', '2025/2026', 'INV-0000002', 1, 'NOT CONFIRMED', '2024-11-01 12:50:56'),
(3, 'CAICON/PF/24/0002', '$2y$10$l9tXPtNoysdMLsLU0I7A3eGVY7ASFUY9CjGH.vhEmdXE0QXADRiP2', '23C8B3D2', '27000', 'Adedigba', 'Mary', 'Yewande', 'mary@gmail.com', '08059605896', 'Nigerian', '2025/2026', 'INV-0000003', 2, 'CONFIRMED', '2024-11-01 14:00:11'),
(4, 'CAICON/PF/24/0003', '$2y$10$k.rsOQ9CeWGgSGVrJzj7POXKbqY/RTmmmIdvzVWuLCorZ/RO/DkS.', '35E3E984', '22000', 'Adedigba', 'Anthony', 'Folahan', 'thonyclaret@gmail.com', '08137428365', 'Nigerian', '2025/2026', 'INV-0000004', 1, 'CONFIRMED', '2024-11-01 14:00:40');

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
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
