-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 09:50 AM
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
-- Database: `cai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">HISTORICAL BACKGROUND</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Catholic Archdiocese of Ibadan (CAI) College of Nursing, Oluyoro began as School of Midwifery in 1957 to meet the existing need for well trained nurses and midwives. The school was officially recognized by the midwives board of England in 1967 and has trained several hundreds of midwives in both Basic and Post Basic programs.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">In 2014, the School was put on hold such that new applicants cannot be admitted/trained and most of the academic staff had to leave while the ones willing to stay were deployed to hospital to handle old students&rsquo; requests for Certificates, Testimonials, Transcripts, etc.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The school is now seeking for reopening and upgrading to the status of college after putting in place all the necessary requirement needed.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">LOCATION OF THE SCHOOL</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">CAI College of Nursing is located within the O.L.A. Catholic Hospital, Oluyoro premises along Agodi Gate-Agugu/Oremeji route.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">COLLEGE ADDRESS</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">CAI College of Nursing</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">P.O.BOX7044 Secretariat,</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Ibadan-Nigeria</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">VISION OF THE SCHOOL</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">To produce competent Nurses that will provide comprehensive and quality health services to humanity with the fear of God, passion and integrity.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">MISSION OF THE SCHOOL</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">To advance the profession of nursing by imparting sound knowledge and skills to produce efficient Nurse called to reveal the healing love of Jesus to those in need.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">MOTTO OF THE SCHOOL</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Caring Heart: for the present and the future.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">OBJECTIVES OF THE SCHOOL</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">At the end of the 3-year general nursing education program, the students should be able to:</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">1. Apply knowledge of basic, social and nursing sciences in the implementation of nursing process in providing holistic nursing care.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">2. Apply nursing process as a systematic problem solving approach to provide effective and quality care to culturally diverse individuals, families, and groups.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">3. Modify care in consideration of the client&rsquo;s values, customs, culture, religion and/or beliefs.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">4. Communicate effectively using interpersonal skills and information technology in the provision of care.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">5. Safely perform and prioritize appropriate nursing care skills.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">6. Utilize professional values and standards as a basis for ethical nursing practice and demonstrate understanding of boundaries and the legal scope of professional practice as a registered nurse.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">7. Collaborate with the interdisciplinary health care team in planning comprehensive care.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">STRATEGIES FOR ACHIEVING STATED GOALS AND OBJECTIVES</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">1. Teach different basic, social and nursing science courses using different teaching strategies to bring about evidence based changes in the nursing students</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">2. Practical teaching and demonstrations of nursing care procedures in the simulation and nursing laboratories.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">3. Clinical posting of students to the clinical areas of necessary specialties</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">4. Excursions to areas applicable to nursing practice</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">5. Supervising and writing of patient care study and research projects</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` int(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `content`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">ACADEMIC SUPPORT UNITS/LABORATORY</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">NURSING SKILL LABORATORY</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">This is available containing Equipment, Model, Manikins and Simulators with 50 sitting capacity.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">MIDWIFERY SKILL LABORATORY</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">This is available containing Equipment, Model, Manikins and Simulators with 50 sitting capacity.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">SCIENCE LAB</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">This is available containing all the necessary apparatus for sciences.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">CLASSROOMS</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">There are 3 classrooms with 50 sitting capacity</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">AUDITORIUM </span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">250 sitting capacity auditorium is available</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">CAFETERIA</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">This is operative in the school premises. </span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">RECREATIONAL CENTRE</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Pending the time the recreational center of the college would be constructed, the students will be utilizing the nearby recreational center of the Sisters&rsquo; institution.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `content`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%; tab-stops: 251.6pt;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">THE ADMINISTRATIVE STRUCTURE OF THE COLLEGE<span style=\"mso-tab-count: 1;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></strong></p>\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-bottom: 0in; mso-add-space: auto; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">THE PRINCIPAL OFFICERS:</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">1.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Provost</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">2.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Deputy Provost</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">3.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Registrar</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">4.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Bursar</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">5.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">College Librarian</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">6.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Director of Works</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">7.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">THE PRINCIPAL OFFICERS OF THE COLLEGE</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">8.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Provost</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Provost is the Chief Executive of the College and is responsible for the day-to-day administrative and academic activities of the college.</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">9.<span style=\"font: 7.0pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp; </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Deputy Provost</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">He is the Academic officer of the college. He/She is responsible to the Provost and also acts for him in his absence.</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">10.<span style=\"font: 7.0pt \'Times New Roman\';\"> </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Registrar</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Registrar heads the Administration Department of the college. He/She is the Secretary of the college and he/ she is directly responsible to the Provost for all the day-to-day administrative matters of the College. </span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">11.<span style=\"font: 7.0pt \'Times New Roman\';\"> </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Bursar</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The Bursar is the head of the Bursary Department. He/ She is directly responsible to the Provost.</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">12.<span style=\"font: 7.0pt \'Times New Roman\';\"> </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The College Librarian</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The college librarian is responsible to the provost for the day-to-day management of the college library and documentation department.</span></p>\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"mso-add-space: auto; text-align: justify; text-indent: -.25in; line-height: 150%; mso-list: l0 level1 lfo1; margin: 0in 0in 0in .75in;\"><!-- [if !supportLists]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif; mso-fareast-font-family: \'Times New Roman\';\"><span style=\"mso-list: Ignore;\">13.<span style=\"font: 7.0pt \'Times New Roman\';\"> </span></span></span></strong><!--[endif]--><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Director of Works</span></strong></p>\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"mso-add-space: auto; text-align: justify; line-height: 150%; margin: 0in 0in 0in .75in;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">He/ She is responsible to the provost for the general maintenance of the college buildings and services.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `content`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">ADMISSION REQUIREMENTS</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Candidate must possess 5 credits at O&rsquo;level (WASSCE/GCE or NECO) which includes: English Language, Mathematics, Physics, Chemistry, and Biology at not more than 2 sittings from the same examination body.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">1. Original copy of admission letter</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">2. Receipts of payment of the prescribed fees</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">3. Originals and photocopies of certificate/result slips</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">4. Medical certificate of fitness (signed by Medical Officer of a recognized Government Hospital)</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">5. Original Birth certificate or sworn declaration of age</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">6. Registration form (in quadruplicate)</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">7. Screening form (in duplicate)</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><!-- [if !supportLists]--><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">8. Four copies of recent passport size photographs.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">DURATION OF PROGRAM</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The duration of nursing program is 5 years. The first three years for General Nursing and the other 2 years for Midwifery and Public Health Nursing.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">GENERAL ACADEMIC REGULATIONS</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Students without minimum entry qualifications at the time of registration will be required to withdraw from the college.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Students who paid the prescribed fees per session will be allowed to register as students of the college,</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">A student is not regarded as a member of the college community until he/she has been duly registered and matriculated</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">All students must use the portal hall warden system available in each hostel to indicate when they left the college. This is a general requirement in case of emergency.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">No dangerous weapons (including air guns, crossbows, catapults, dagger, and ammunition of fireworks of any description) should be brought into the college premises by students or their guest.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">APPROVED SCORING AND GRADING SYSTEM</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">A 60 minute Objective Structured Clinical Examination (OSCE) shall be conducted in designated and accredited OSCE centers.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><strong style=\"mso-bidi-font-weight: normal;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">REQUIREMENTS FOR STUDENTS TRANSFER, WITHDRAWAL, PROBATION AND DEFERMENT</span></strong></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">A student may be permitted to change his or her institution under the following conditions:</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">The student must have completed at least two semesters in the college.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Such transfer must be approved by the Academic Board.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Any candidate with good and acceptable reasons can only apply for and be granted deferment of admission by the Academic Board of the College, provided such an applicant has fulfilled at his financial obligations to the College in full and has also matriculated.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">All applications for deferment of admission should be routed through the relevant Head of Department to the Registrar.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `applicatn`
--

CREATE TABLE `applicatn` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicatn`
--

INSERT INTO `applicatn` (`id`, `content`) VALUES
(1, '<p>2024/2025 applications are now open for candidates. We don&rsquo;t just give students an education and experiences that set them up for success in a career, we help them succeed in their career to discover a field they&rsquo;re passionate about and dare to lead it.&nbsp;</p>\r\n<p>We always for you</p>');

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
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`) VALUES
(1, 'About Us');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(50) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `descriptn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_url`, `descriptn`) VALUES
(1, '6718d36699374.jpg', '<p>Pix One</p>'),
(3, '6718f8958afd9.jpg', 'Pix two'),
(4, '6718f8a23f5a3.jpg', 'pix 3');

-- --------------------------------------------------------

--
-- Table structure for table `g_council`
--

CREATE TABLE `g_council` (
  `id` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `g_council`
--

INSERT INTO `g_council` (`id`, `title`, `gname`, `bio`, `image_url`) VALUES
(1, 'The Proprietor', 'Most Rev. Gabriel Leke Abegunrin', '<p>Bishop Abegunrin holds Doctorate degree in Canon Law from Pontifical Urban University Rome,1988.</p>\r\n<p>Parish Priest St Ferdinands Catholic Church, Ogbomosho,1988- 1992.</p>\r\n<p>Cathedral Administrator, St. Benedicts Cathedral,Osogbo,1992-1995.Catholic Representative, Christian Association of Nigeria, Osun State,1992-1995.</p>\r\n<p>Chaplain, Political Awareness Committee,1993-1995.</p>\r\n<p>Appointed by the Federal Government of Nigeria as Chairman of Peace and Reconciliation committee for Ife - Modakeke crises on 24 March 2000.</p>\r\n<p>Appointed Chairman, Christian Association of Nigeria, 2000-2004.</p>\r\n<p>Former Chairman Lay Apostolate Organisations of Catholic Bishops Conference of Nigeria.</p>\r\n<p>Some of his Writings: Parish Organisation in Conciliar Documents and in the Code of Canon Law With Special Reference to Oyo Diocese of Nigeria,1988.</p>\r\n<p>Collaborative Ministry: A Challenge for Religious in the Third Millennium, 2001.The Pathway to an Authentic Peaceful Social Order in Nigeria, 2003.</p>\r\n<p>Canon Law and Leadership: Lessons and Implications for the Church in Nigeria, 2002.</p>\r\n<p>The Role of the Laity in Social Transformation, 2000 Upholding Christian Values in a Crises Ridden Society, 2002.</p>\r\n<p>His biography titled:</p>\r\n<p>A Shepherd in Service published by Book Merit Publishing and Editorial Consultants, Ibadan, 2005 was written by a priest in Osogbo diocese.</p>', '671b501d1176a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `content`) VALUES
(1, '<p>At the CAI College of Nursing Sciences, we are dedicated to empowering future nursing professionals with the knowledge, skills, and compassion needed to excel in the healthcare field. Our institution stands as a beacon of excellence in nursing education, blending rigorous academic instruction with hands-on clinical practice to prepare our students for the ever-evolving demands of the healthcare industry.</p>\r\n<p>&nbsp;</p>\r\n<p>Our curriculum is designed not only to provide a strong foundation in nursing theory and practical application but also to cultivate a holistic approach to patient care that emphasizes empathy, ethical responsibility, and respect for the dignity of every individual. Our faculty, comprised of experienced educators and healthcare professionals, are committed to guiding and mentoring students to reach their fullest potential.</p>\r\n<p>&nbsp;</p>\r\n<p>We are also proud to offer a dynamic learning environment that integrates state-of-the-art facilities, interactive training programs, and cutting-edge technology. Through this blend, we foster an educational experience that encourages innovation, critical thinking, and lifelong learning.</p>\r\n<p>&nbsp;</p>\r\n<p>We invite you to explore our programs, meet our exceptional staff, and discover the many opportunities that await you here. Whether you are a prospective student, current student, alumnus, or visitor, we warmly welcome you to CAI College of Nursing Sciences community.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Together, let&rsquo;s make a difference in healthcare.</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `ict_centre`
--

CREATE TABLE `ict_centre` (
  `id` int(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ict_centre`
--

INSERT INTO `ict_centre` (`id`, `content`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">Internet compliant and connected 18 functioning computers for students teaching and learning activities.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(4) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `content`) VALUES
(1, '<p class=\"MsoNormal\" style=\"margin-bottom: 0in; text-align: justify; line-height: 150%;\"><span style=\"font-size: 14.0pt; line-height: 150%; font-family: \'Times New Roman\',serif;\">This is situated in the College of Nursing, Catholic Hospital, Oluyoro, Oke-Ofa with a sitting capacity above 50. It is equipped with current nursing journals (National and International). Relevant Textbooks for instruction of students and research purposes, previous research projects of graduated students and other books on general knowledge. E-library materials covering all areas above.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(11) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  `man_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `picture_url`, `man_name`, `position`, `qualification`) VALUES
(1, 'pix.jpg', 'John Doe', 'The Provost', 'Qualification'),
(2, 'pix2.jpg', 'Jane Smith', 'The Deputy Provost (Administration)', 'Qualification'),
(3, 'pix3.jpg', 'Michael Brown', 'The Deputy Provost (Academics)', 'Qualification'),
(4, 'pix.jpg', 'Adesly Seun', 'The Registrar', 'Qualification');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `posted_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `thumbnail_url`, `posted_date`, `title`, `content`) VALUES
(1, 'sli1.jpg', '2024-10-20 14:30:00', 'Exciting News Update!', ''),
(2, 'sli2.jpg', '2024-10-19 09:15:00', 'New Features Released', '<p>This page is under construction</p>'),
(3, 'sli3.jpg', '2024-10-18 12:45:00', 'Community Event Recap', ''),
(4, '6717844b37e10.jpg', '2024-10-23 00:00:00', 'Welcome back', '<p>Page under construction</p>'),
(6, '671785cddbfb6.jpg', '2024-10-22 00:00:00', 'CAICONS is 10', '<p>Page under construction.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`) VALUES
(1, 'about', 'This is the About Us content...'),
(2, 'contact', '<p>This is the Contact Us content...dfdf</p>'),
(3, 'admission', 'This is the Admission content...'),
(4, 'management', 'This is the Management content...'),
(5, 'library', 'This is the Library content...');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `overlay_title` varchar(255) NOT NULL,
  `overlay_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_url`, `overlay_title`, `overlay_text`) VALUES
(1, 'sli1.jpg', '', ''),
(2, 'sli2.jpg', 'Our college is the best among the best', 'This is the second slider'),
(3, 'sli3.jpg', 'We produce the best of the best', 'This is the third slide'),
(4, 'sli4.jpg', 'Our core value is persistence', 'This is the fourth slide'),
(5, 'sli5.jpg', 'We produce the best for the service of humanity', 'This is the fifth slide');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `username`, `password`, `created_at`) VALUES
(1, 'Sylvester', 'admin', '$2y$10$P.PTejEEAGaLbq7XNfo5N.oTwLzUkiZ3fb.vHHc3OG1X/fydfEiPy', '2024-10-21 10:36:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicatn`
--
ALTER TABLE `applicatn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_council`
--
ALTER TABLE `g_council`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ict_centre`
--
ALTER TABLE `ict_centre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicatn`
--
ALTER TABLE `applicatn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `g_council`
--
ALTER TABLE `g_council`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ict_centre`
--
ALTER TABLE `ict_centre`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
