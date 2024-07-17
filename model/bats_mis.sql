-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 03:20 PM
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
-- Database: `bats_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` enum('present','absent','on_leave') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `user_id`, `date`, `time_in`, `time_out`, `status`) VALUES
(1, 1, '2024-07-13', '08:12:02', '15:12:02', 'present'),
(2, 3, '2024-07-13', '03:21:21', '03:21:21', 'on_leave');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `employee_id` int(11) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_password` varchar(250) NOT NULL,
  `employment_type` enum('permanent','casual','job_order') NOT NULL,
  `pds_file` varchar(255) DEFAULT NULL,
  `saln_file` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `e_status` enum('Active','Deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`employee_id`, `user_name`, `user_password`, `employment_type`, `pds_file`, `saln_file`, `first_name`, `last_name`, `date_of_birth`, `email`, `phone_number`, `e_status`) VALUES
(1, 'john_doe', 'password123', 'permanent', 'pds1.pdf', 'saln1.pdf', 'John', 'Doe', '1980-01-15', 'john.doe@example.com', '123-456-7890', 'Active'),
(2, 'jane_smith', 'password123', 'casual', 'pds2.pdf', 'saln2.pdf', 'Jane', 'Smith', '1985-02-20', 'jane.smith@example.com', '234-567-8901', 'Active'),
(3, 'alice_jones', 'password123', 'job_order', 'pds3.pdf', 'saln3.pdf', 'Alice', 'Jones', '1990-03-25', 'alice.jones@example.com', '345-678-9012', 'Active'),
(4, 'bob_brown', 'password123', 'permanent', 'pds4.pdf', 'saln4.pdf', 'Bob', 'Brown', '1975-04-30', 'bob.brown@example.com', '456-789-0123', 'Active'),
(5, 'carol_white', 'password123', 'casual', 'pds5.pdf', 'saln5.pdf', 'Carol', 'White', '1988-05-15', 'carol.white@example.com', '567-890-1234', 'Active'),
(6, 'dave_clark', 'password123', 'job_order', 'pds6.pdf', 'saln6.pdf', 'Dave', 'Clark', '1992-06-20', 'dave.clark@example.com', '678-901-2345', 'Active'),
(7, 'eve_hall', 'password123', 'permanent', 'pds7.pdf', 'saln7.pdf', 'Eve', 'Hall', '1983-07-25', 'eve.hall@example.com', '789-012-3456', 'Active'),
(8, 'frank_wright', 'password123', 'casual', 'pds8.pdf', 'saln8.pdf', 'Frank', 'Wright', '1977-08-30', 'frank.wright@example.com', '890-123-4567', 'Active'),
(9, 'grace_king', 'password123', 'job_order', 'pds9.pdf', 'saln9.pdf', 'Grace', 'King', '1981-09-15', 'grace.king@example.com', '901-234-5678', 'Active'),
(10, 'henry_lee', 'password123', 'permanent', 'pds10.pdf', 'saln10.pdf', 'Henry', 'Lee', '1995-10-20', 'henry.lee@example.com', '012-345-6789', 'Active'),
(11, 'irene_scott', 'password123', 'casual', 'pds11.pdf', 'saln11.pdf', 'Irene', 'Scott', '1986-11-25', 'irene.scott@example.com', '123-456-7891', 'Active'),
(12, 'jack_king', 'password123', 'job_order', 'pds12.pdf', 'saln12.pdf', 'Jack', 'King', '1984-12-30', 'jack.king@example.com', '234-567-8902', 'Active'),
(13, 'kate_turner', 'password123', 'permanent', 'pds13.pdf', 'saln13.pdf', 'Kate', 'Turner', '1991-01-10', 'kate.turner@example.com', '345-678-9013', 'Active'),
(14, 'larry_walker', 'password123', 'casual', 'pds14.pdf', 'saln14.pdf', 'Larry', 'Walker', '1979-02-15', 'larry.walker@example.com', '456-789-0124', 'Active'),
(15, 'mary_adams', 'password123', 'job_order', 'pds15.pdf', 'saln15.pdf', 'Mary', 'Adams', '1987-03-20', 'mary.adams@example.com', '567-890-1235', 'Active'),
(16, 'nick_baker', 'password123', 'permanent', 'pds16.pdf', 'saln16.pdf', 'Nick', 'Baker', '1982-04-25', 'nick.baker@example.com', '678-901-2346', 'Active'),
(17, 'olivia_taylor', 'password123', 'casual', 'pds17.pdf', 'saln17.pdf', 'Olivia', 'Taylor', '1978-05-30', 'olivia.taylor@example.com', '789-012-3457', 'Active'),
(18, 'paul_carter', 'password123', 'job_order', 'pds18.pdf', 'saln18.pdf', 'Paul', 'Carter', '1993-06-10', 'paul.carter@example.com', '890-123-4568', 'Active'),
(19, 'quincy_martin', 'password123', 'permanent', 'pds19.pdf', 'saln19.pdf', 'Quincy', 'Martin', '1989-07-15', 'quincy.martin@example.com', '901-234-5679', 'Active'),
(20, 'rachel_gonzalez', 'password123', 'casual', 'pds20.pdf', 'saln20.pdf', 'Rachel', 'Gonzalez', '1985-08-20', 'rachel.gonzalez@example.com', '012-345-6780', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` enum('employee','admin') NOT NULL,
  `file_type` enum('pds','saln','other') NOT NULL,
  `file_description` varchar(250) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `f_status` enum('Saved','Deleted') NOT NULL DEFAULT 'Saved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `user_id`, `user_type`, `file_type`, `file_description`, `file_path`, `uploaded_at`, `f_status`) VALUES
(1, 1, 'employee', 'pds', 'try', '../files/employee/pds/sample.xls', '2024-07-15 23:53:11', 'Saved'),
(2, 1, 'admin', 'pds', 'try', '../files/employee/pds/sample.xls', '2024-07-15 23:53:11', 'Saved');

-- --------------------------------------------------------

--
-- Table structure for table `leavemanagement`
--

CREATE TABLE `leavemanagement` (
  `leave_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` enum('employee','admin') NOT NULL,
  `more_info` varchar(400) NOT NULL,
  `leave_type` enum('sick','vacation','emergency') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('pending','approved','declined') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavemanagement`
--

INSERT INTO `leavemanagement` (`leave_id`, `user_id`, `user_type`, `more_info`, `leave_type`, `start_date`, `end_date`, `status`, `created_at`) VALUES
(1, 1, 'employee', 'try', 'sick', '2024-07-16', '2024-07-16', 'pending', '2024-07-15 10:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Sub-admin','Head') NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `name`, `email`, `contact_number`, `address`, `created_at`) VALUES
(1, 'jdoe', 'password123', 'Admin', 'John Mayer', 'jdoe@example.com', '0967554322', 'Batangas', '2024-07-13 04:00:00'),
(2, 'asmith', 'securepass', '', 'John Mayer', 'asmith@example.com', '0987654321', 'Cuenca', '2024-07-13 04:01:00'),
(3, 'bking', 'mypassword', '', 'Bob King', 'bking@example.com', '1112223333', 'Lipa', '2024-07-13 04:02:00'),
(4, 'cjones', 'password456', 'Admin', 'Charlie Jones', 'cjones@example.com', '4445556666', 'Lemery', '2024-07-13 04:03:00'),
(5, 'djohnson', 'pass789', '', 'Dana Johnson', 'djohnson@example.com', '7778889999', 'Lipa', '2024-07-13 04:04:00'),
(6, 'emiller', 'secure456', '', 'Eve Miller', 'emiller@example.com', '1231231234', 'Tanauan', '2024-07-13 04:05:00'),
(7, 'fwhite', 'mypassword789', 'Admin', 'Frank White', 'fwhite@example.com', '3213214321', 'Sto Tomas', '2024-07-13 04:06:00'),
(8, 'ggreen', 'password789', '', 'Grace Green', 'ggreen@example.com', '6546549876', 'Cuenca', '2024-07-13 04:07:00'),
(9, 'hblack', 'secure789', '', 'Hannah Black', 'hblack@example.com', '7897896543', 'Sta Teresita', '2024-07-13 04:08:00'),
(10, 'iwood', 'pass123', 'Admin', 'Ian Wood', 'iwood@example.com', '9876543210', 'San Nicolas', '2024-07-13 04:09:00'),
(378989, 'asd', 'asdas', '', 'asd', 'dasda', 'asda', 'sdas', '2024-07-14 10:55:11'),
(438886, 'weqw', 'qweqwee', 'Admin', 'qweq', 'qeqweqw', 'qweqwe', 'qweqw', '2024-07-14 10:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `leavemanagement`
--
ALTER TABLE `leavemanagement`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leavemanagement`
--
ALTER TABLE `leavemanagement`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=973204;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employeedetails` (`employee_id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
