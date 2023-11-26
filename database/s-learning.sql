-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 05:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_email`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text DEFAULT NULL,
  `course_author` text DEFAULT NULL,
  `course_image` text DEFAULT NULL,
  `course_duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_image`, `course_duration`) VALUES
(8, 'javaScript', 'introduction of javascript', 'rana mudassar rasool', 'courseimages/js.jpg', 10),
(9, 'PHP', 'Tell about the php', 'rana mudassar rasool', 'courseimages/phhp.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `id`) VALUES
(2, 'It is great content or leacture', 1),
(3, 'It is great opportunities to learn the different subjects ', 3),
(4, 'It is great to teach us', 4),
(5, 'It is great to teach us', 4),
(6, 'It is most helpfull student', 2),
(7, 'good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leason`
--

CREATE TABLE `leason` (
  `leason_id` int(11) NOT NULL,
  `leason_name` varchar(255) NOT NULL,
  `leason_desc` text DEFAULT NULL,
  `leason_ved` varchar(255) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leason`
--

INSERT INTO `leason` (`leason_id`, `leason_name`, `leason_desc`, `leason_ved`, `course_id`, `course_name`) VALUES
(1, 'Introduction to JavaScript + Setup', 'Introduction to JavaScript + Setup', 'leasonvideos/Introduction to JavaScript.mp4', 8, 'java'),
(20, 'Variables in JavaScript', 'Variables in JavaScript ', 'leasonvideos/Variables in JavaScript.mp4', 8, 'javaScript'),
(21, 'Introduction to PHP', 'Php basics', 'leasonvideos/PHP Introduction Tutorial in Hindi _ Urdu.mp4', 9, 'PHP'),
(22, 'xamp Installation', 'How to install the xamp', 'leasonvideos/PHP Installing Xampp Server in Hindi  Urdu_720p.mp4', 9, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `studentreg`
--

CREATE TABLE `studentreg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `occ` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `studentreg`
--

INSERT INTO `studentreg` (`id`, `name`, `email`, `password`, `occ`, `img`) VALUES
(1, 'Shahrooz Faheem', 'shahroozfaheem2022@gmail.com', 'Ss4494', 'Computer Science', 'pic.jpg'),
(2, 'Muhammad Umar', 'umar@gmail.com', '123456', 'Computer Science', 'umar1.jpg'),
(3, 'Ahsan Ismail', 'ahasan@gmail.com', '123456', 'Computer Science', 'ahsan1.jpg'),
(4, 'Saad Javed', 'saad@gmail.com', '1234567', 'Computer Science', 'saad1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `leason`
--
ALTER TABLE `leason`
  ADD PRIMARY KEY (`leason_id`);

--
-- Indexes for table `studentreg`
--
ALTER TABLE `studentreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leason`
--
ALTER TABLE `leason`
  MODIFY `leason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `studentreg`
--
ALTER TABLE `studentreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
