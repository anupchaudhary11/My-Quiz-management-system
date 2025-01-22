-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 06:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `leaderboard` ()  NO SQL BEGIN
    SELECT 
        q.quizname,
        s.score,
        s.totalscore,
        st.name,
        s.mail
    FROM 
        score s
    JOIN 
        student st ON s.mail = st.mail
    JOIN 
        quiz q ON q.quizid = s.quizid
    ORDER BY 
        s.score DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`) VALUES
(1, 'BCA'),
(2, '+2'),
(3, 'Bsc.CSIT'),
(4, 'BBM');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qs` varchar(200) NOT NULL,
  `op1` varchar(30) NOT NULL,
  `op2` varchar(30) NOT NULL,
  `op3` varchar(30) NOT NULL,
  `op4` varchar(30) NOT NULL,
  `answer` varchar(30) NOT NULL,
  `quizid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qs`, `op1`, `op2`, `op3`, `op4`, `answer`, `quizid`) VALUES
('What is the Digital Nepal Framework initiative?', 'A government plan to build IT ', 'A strategy to drive socioecono', ' A framework to improve Nepal’', 'A project to digitize all scho', 'A strategy to drive socioecono', 18),
('What is the domain extension for Nepal?', '.np', '.ne', '.nl', '.na', '.np', 18),
('What is the full form of IT?', 'Internet Technology', 'Information Technology', 'Innovative Technology', 'Integrated Technology', 'Information Technology', 18),
('What is the name of the first Nepali satellite launched into space?', 'EverestSat-1', ' NepalSat-1', 'NepaliSat-1', 'HimSat-1', 'NepaliSat-1', 18),
('What is the primary programming language used for Android app development?', 'C++', 'Java', 'Python', 'Kotlin', 'Java', 18),
('When is the Nepali government planning to achieve a fully digitized economy?', '2025', '2030', '2040', '2050', '2030', 18),
('When was Nepal connected to the internet for the first time?', '1990', '1992', '1995', '1998', '1995', 18),
('Which e-commerce platform operates under Alibaba Group in Nepal?', 'SastoDeal', 'Daraz', 'HamroBazar', 'SmartDoko', 'Daraz', 18),
('Which is the first IT park in Nepal?', 'Pokhara IT Park', 'Banepa IT Park', 'Kathmandu Tech Zone', 'Biratnagar IT Hub', ' Banepa IT Park', 18),
('Which is the first Nepali ride-sharing app?', 'Tootle', 'Pathao', 'Uber', 'IN Drive', 'Tootle', 18),
('Which is the most popular mobile network operator in Nepal?', 'Ncell', 'Smart Telecom', 'Nepal Telecom', 'Hello Nepal', 'Nepal Telecom', 18),
('Which IT organization in Nepal promotes ICT development and organizes CAN Infotech annually?', 'ICT Federation of Nepal', 'CAN Federation', 'Nepal Tech Association', 'Digital Nepal Alliance', 'CAN Federation', 18),
('Which Nepali e-payment system is regulated by Nepal Rastra Bank?', 'Khalti', 'eSewa', 'ConnectIPS', ' IME Pay', 'ConnectIPS', 18),
('Which organization regulates IT and telecommunications in Nepal?', 'Nepal IT Authority', 'Nepal Telecommunications Autho', 'Ministry of Technology', 'Digital Nepal Initiative', 'Nepal Telecommunications Autho', 18);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int(11) NOT NULL,
  `quizname` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `mail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `date_created`, `mail`) VALUES
(18, 'it', '2025-01-14 17:17:26', 'abcd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `slno` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `quizid` int(11) NOT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `totalscore` int(11) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `score`
--
DELIMITER $$
CREATE TRIGGER `remarks` BEFORE INSERT ON `score` FOR EACH ROW SET NEW.remark = IF(NEW.score = 0, 'bad', 'good')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `pw` varchar(200) NOT NULL,
  `dept` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `name`, `mail`, `phno`, `gender`, `DOB`, `pw`, `dept`) VALUES
('1233', 'abcd', 'abcd@gmail.com', '12345678', 'M', '2024-12-03', 'raXcYYIAyKgmc', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `pw` varchar(200) NOT NULL,
  `dept` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `mail`, `phno`, `gender`, `DOB`, `pw`, `dept`) VALUES
('abc', 'abc', 'abc@gmail.com', '1213213213', 'M', '2024-12-24', 'raXcYYIAyKgmc', 'BCA'),
('abcd', 'abcd', 'abcd@gmail.com', '1321321', 'M', '2005-10-14', 'ra25OsSVqqWMo', 'Sch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `qs` (`qs`),
  ADD KEY `quizid` (`quizid`),
  ADD KEY `quizid_2` (`quizid`),
  ADD KEY `quizid_3` (`quizid`),
  ADD KEY `quizid_4` (`quizid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`),
  ADD KEY `mail` (`mail`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `quizid` (`quizid`),
  ADD KEY `mail` (`mail`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`mail`),
  ADD UNIQUE KEY `mail` (`mail`,`phno`),
  ADD UNIQUE KEY `staffid` (`staffid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`mail`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phno` (`phno`),
  ADD UNIQUE KEY `usn` (`usn`),
  ADD KEY `dept` (`dept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `staff` (`mail`) ON DELETE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`) ON DELETE CASCADE,
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`mail`) REFERENCES `student` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
