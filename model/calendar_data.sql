-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 05:54 AM
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
-- Structure for view `calendar_data`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calendar_data`  AS SELECT `dates`.`date` AS `date`, ifnull(sum(case when `a`.`status` = 'present' or `a`.`status` = 'on_leave' then 1 else 0 end),0) AS `present_count`, `total_emp`.`total`- ifnull(sum(case when `a`.`status` = 'present' or `a`.`status` = 'on_leave' then 1 else 0 end),0) AS `absents` FROM (((select '2024-01-01' + interval `seq_0_to_365`.`seq` day AS `date` from `seq_0_to_365`) `dates` left join `attendance` `a` on(`dates`.`date` = `a`.`date`)) join (select `total_emp`.`total` AS `total` from `total_emp`) `total_emp`) GROUP BY `dates`.`date`, `total_emp`.`total` ORDER BY `dates`.`date` ASC ;

--
-- VIEW `calendar_data`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
