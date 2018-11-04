-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 23, 2017 at 12:45 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `manage`
--
-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(30) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `class` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `password`, `phone`, `class`) VALUES
(1, 'Hamza', '123456789', 1007353273, 1),
(2, 'Saied', '987654321', 1007353273, 6),
(3, 'tech1', '123456', 1007353273, 2),
(4, 'tech2', '123456', 1007353273, 3),
(5, 'tech3', '123456', 1007353273, 4),
(6, 'tech4', '123456', 1007353273, 5),
(7, 'Tamer', '123456', 1007353273, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(30) NOT NULL,
  `member_id` int(1) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `assignto` varchar(30) NOT NULL,
  `assignfrom` varchar(30) NOT NULL,
  `reason` varchar(30) NOT NULL,
  `closedate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `createdate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `member_id`, `subject`, `description`, `status`, `assignto`, `assignfrom`, `reason`, `closedate`, `createdate`) VALUES
(1, 2, 'test1', 'test1', 'resolved', 'voice', '', '', '2017-09-22 21:12:46.930292', '2017-09-22 21:12:46.930292'),
(2, 2, 'test2', 'test2', 'resolved', 'Helpdesk', '', ' ', '2017-09-22 22:43:07.375677', '2017-09-22 22:43:07.375677'),
(3, 2, 'testAhmed', 'testAhmed', 'resolved', 'noc', '', '', '2017-09-22 22:36:05.357843', '2017-09-22 22:36:05.357843'),
(4, 2, 'testAhmed', 'testAhmed', 'resolved', 'Helpdesk', '', '                        \r\n    ', '2017-09-22 22:41:52.384444', '2017-09-22 22:41:52.384444'),
(5, 2, 'testHamza', 'testHamza', 'resolved', 'Helpdesk', '', '                        \r\n    ', '2017-09-22 22:41:56.798217', '2017-09-22 22:41:56.798217'),
(6, 7, 'testTamer', 'testTamer', 'resolved', 'noc', '', '', '2017-09-22 22:36:15.934777', '2017-09-22 22:36:15.934777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
