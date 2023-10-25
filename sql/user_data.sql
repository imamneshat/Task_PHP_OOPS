-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2019 at 08:17 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `web_user`
--

CREATE TABLE `web_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(60) NOT NULL,
  `u_mobile` int(15) NOT NULL,
  `u_dob` date NOT NULL,
  `u_sex` varchar(10) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_user`
--

INSERT INTO `web_user` (`u_id`, `u_name`, `u_email`, `u_mobile`, `u_dob`, `u_sex`, `created_date`, `modified_date`, `status`) VALUES
(11, 'Halla Russell', 'wame@mailinator.com', 91, '2017-02-23', 'male', '2019-09-28', '0000-00-00', 0),
(14, 'Deacon Oneill', 'nowamib@mailinator.net', 2147483647, '2010-02-05', 'male', '2019-09-28', '0000-00-00', 0),
(15, 'Ashely Ramsey', 'kyjisivo@mailinator.com', 2147483647, '1981-02-21', 'female', '2019-09-28', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `web_user`
--
ALTER TABLE `web_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `web_user`
--
ALTER TABLE `web_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
