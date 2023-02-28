-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 10:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_driver`
--

CREATE TABLE `assigned_driver` (
  `ass_id` int(11) NOT NULL,
  `bus_id` varchar(56) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `date_assigned` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_driver`
--

INSERT INTO `assigned_driver` (`ass_id`, `bus_id`, `user_id`, `date_assigned`, `status`) VALUES
(5, '1', '5', '2023-02-16', 0),
(6, '2', '6', '2023-02-16', 0),
(7, '3', '7', '2023-02-16', 0),
(8, '4', '9', '2023-02-17', 0),
(9, '5', '10', '2023-02-17', 0),
(10, '2', '6', '2023-02-22', 0),
(11, '', '', '2023-02-25', 0),
(12, '2', '6', '2023-02-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bus_tbl`
--

CREATE TABLE `bus_tbl` (
  `bus_id` int(11) NOT NULL,
  `platenumber` varchar(56) NOT NULL,
  `status` int(23) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `busname` varchar(65) NOT NULL,
  `assignstatus` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_tbl`
--

INSERT INTO `bus_tbl` (`bus_id`, `platenumber`, `status`, `date_created`, `user_id`, `busname`, `assignstatus`) VALUES
(1, 'RAC509 B', 0, '2023-02-15 21:17:55', 0, 'Quaster ', 'YES'),
(2, 'RAA 707 C', 0, '2023-02-15 21:19:14', 0, 'Mini Bus', 'YES'),
(3, 'RAC107 A', 0, '2023-02-16 17:20:27', 0, 'quaster', 'YES'),
(4, 'RAG 901 B', 0, '2023-02-17 09:38:57', 0, 'Quaster', 'YES'),
(5, 'RAD 609 B', 0, '2023-02-17 09:51:11', 0, 'Quaster', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notify_tbl`
--

CREATE TABLE `notify_tbl` (
  `not_id` int(11) NOT NULL,
  `user_id` varchar(56) NOT NULL,
  `bus_id` varchar(45) NOT NULL,
  `destination` varchar(34) NOT NULL,
  `dipaturetime` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(65) NOT NULL,
  `date_notified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notify_tbl`
--

INSERT INTO `notify_tbl` (`not_id`, `user_id`, `bus_id`, `destination`, `dipaturetime`, `status`, `comment`, `date_notified`) VALUES
(1, '', '', '', '', 0, 'Sending success', '2023-02-17'),
(2, '6', '2', 'FROM-KICUKIRO-TO-NYABUGOGO', '00:22', 0, 'Sending success', '2023-02-17'),
(3, '6', '2', 'FROM-KICUKIRO-TO-NYABUGOGO', '01:25', 0, 'Sending success', '2023-02-17'),
(4, '6', '2', 'FROM-KICUKIRO-TO-DOWNTOWN', '02:31', 0, 'Sending success', '2023-02-17'),
(5, '6', '2', 'FROM-NYABUGOGO-TO-KICUKIRO', '03:32', 0, 'Sending success', '2023-02-17'),
(6, '9', '4', 'FROM-DOWNTOWN-TO-KICUKIRO', '05:45', 0, 'Sending success', '2023-02-17'),
(7, '10', '5', 'FROM-NYABUGOGO-TO-KICUKIRO', '14:55', 0, 'Sending success', '2023-02-17'),
(8, '6', '2', 'FROM-NYABUGOGO-TO-KICUKIRO', '02:58', 0, 'Sending success', '2023-02-17'),
(9, '6', '2', 'FROM-NYABUGOGO-TO-KICUKIRO', '16:10', 0, 'Sending success', '2023-02-17'),
(10, '10', '5', 'FROM-DOWNTOWN-TO-KICUKIRO', '17:14', 0, 'Sending success', '2023-02-17'),
(11, '9', '4', 'FROM-KICUKIRO-TO-NYABUGOGO', '05:15', 0, 'Sending success', '2023-02-17'),
(12, '9', '4', 'FROM-NYABUGOGO-TO-KICUKIRO', '16:15', 0, 'Sending success', '2023-02-17'),
(13, '9', '4', 'FROM-NYABUGOGO-TO-KICUKIRO', '08:08', 0, 'Sending success', '2023-02-22'),
(14, '7', '3', 'FROM-KICUKIRO-TO-DOWNTOWN', '19:08', 0, 'Sending success', '2023-02-22'),
(15, '9', '4', 'FROM-DOWNTOWN-TO-KICUKIRO', '03:38', 0, 'Sending success', '2023-02-23'),
(16, '9', '4', 'FROM-NYABUGOGO-TO-KICUKIRO', '04:44', 0, 'Sending success', '2023-02-23'),
(17, '6', '2', 'FROM-KICUKIRO-TO-DOWNTOWN', '13:34', 0, 'Sending success', '2023-02-25'),
(18, '5', '1', 'FROM-NYABUGOGO-TO-KICUKIRO', '13:47', 0, 'Sending success', '2023-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `problemdriver_tbl`
--

CREATE TABLE `problemdriver_tbl` (
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problemdriver_tbl`
--

INSERT INTO `problemdriver_tbl` (`pro_id`, `user_id`, `message`, `status`, `date_send`) VALUES
(1, 9, 'imdoko yanjye igonze ikiraro nimumfashe', 0, '2023-02-17 15:22:58'),
(5, 10, 'imodoka yanze kugenda naringeze kimironko', 1, '2023-02-18 07:05:08'),
(6, 4, 'very busy car', 0, '2023-02-23 09:57:48'),
(7, 9, 'byabaye bibi cyne', 0, '2023-02-25 09:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `reassigned_driver`
--

CREATE TABLE `reassigned_driver` (
  `re_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reassigned_driver`
--

INSERT INTO `reassigned_driver` (`re_id`, `bus_id`, `user_id`) VALUES
(1, 1, 5),
(2, 2, 6),
(5, 2, 6),
(6, 5, 10),
(7, 2, 6),
(8, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(56) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(34) NOT NULL,
  `phonenumber` varchar(33) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(65) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `status1` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `status`, `role`, `created_on`, `status1`) VALUES
(2, 'ndikumana', 'eric', 'eric@gmail.com', '0782185749', '$2y$10$yEnpjKm3ptatAeqWRQ7M2.J7QjnVkJWx8FnUPgDJkj7mxGPl5UySW', 0, 'admin', '2023-02-15', NULL),
(3, 'uzamukunda', 'alliane', 'aliane@gmail.com', '0781990654', '$2y$10$.hMrzUf2XOR7v7VajUSjwuRv.5wH6gkDymT3PYB2eZGX5R3ZcSpX6', 1, 'admin', '2023-02-15', NULL),
(4, 'uzamukunda', 'alliane', 'ndikumanaeric001@gmail.com', '0781990787', '$2y$10$yEnpjKm3ptatAeqWRQ7M2.J7QjnVkJWx8FnUPgDJkj7mxGPl5UySW', 0, 'driver', '2023-02-15', 'YES'),
(5, 'Byamungu', 'lewis', 'byamungu@gmail.com', '0781990765', '$2y$10$e5H07LsZ06s1nxchNBN.JuLrae0qmFW6XpAbrk7SJgqPDGUjma5kS', 0, 'admin', '2023-02-15', 'YES'),
(6, 'umuhoza', 'alliane', 'musanze@gmail.com', '078218578', '$2y$10$42Qi1Fhvh5FfnLQxMuY/7eg6r/0qib.BgLAasYb2Gr0gIH4xNQjl6', 0, 'driver', '2023-02-15', 'YES'),
(7, 'Byamungu', 'alliane', 'erics@gmail.com', '0782185747', '$2y$10$r4XrxfBnm3P5srjuROXLw.8BZ/66F5HutOwiiCAQrkxcJpuU7SxzK', 0, 'driver', '2023-02-15', 'YES'),
(8, 'sebyenda', 'wellaris', 'ndikumaeric001@gmail.com', '0781990711', '$2y$10$cdUsWfTXSa3U7g1iJN7jfekpMwDhyx0ES.QF9nwt6O0AFR1Ajph8e', 0, 'driver', '2023-02-16', NULL),
(9, 'NDAYAMBAJE', 'Elie', 'erie@gmail.com', '0782185745', '$2y$10$kbLPoFxm0jAFrE1ixKtgCu3Lmc0YC5QV/N/2Kci4NUgIGt5LFL.tS', 0, 'driver', '2023-02-17', 'YES'),
(10, 'mukezambuga Elise', 'ISHIMWE', 'ishimwe@gmail.com', '0788348818', '$2y$10$N99I8dwTqaLOxdAvWmetZum3zrKpUz/vrO79IVbRxituY1gWZyin6', 0, 'driver', '2023-02-17', NULL),
(11, 'NADIA', 'NDIKUBWIMANA', 'ndikubwimananadia003@gmail.com', '0784656502', '$2y$10$eq7URGx/VlcG2ptErk8YgO6.oXSWWbD7cP2jtequHk5uwX.LaJR.O', 0, 'driver', '2023-02-20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_driver`
--
ALTER TABLE `assigned_driver`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `bus_tbl`
--
ALTER TABLE `bus_tbl`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `notify_tbl`
--
ALTER TABLE `notify_tbl`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `problemdriver_tbl`
--
ALTER TABLE `problemdriver_tbl`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `reassigned_driver`
--
ALTER TABLE `reassigned_driver`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_driver`
--
ALTER TABLE `assigned_driver`
  MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bus_tbl`
--
ALTER TABLE `bus_tbl`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notify_tbl`
--
ALTER TABLE `notify_tbl`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `problemdriver_tbl`
--
ALTER TABLE `problemdriver_tbl`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reassigned_driver`
--
ALTER TABLE `reassigned_driver`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
