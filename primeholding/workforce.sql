-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 11:42 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workforce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com	', '123'),
(3, 'Boss', 'boss@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `user_type` enum('admin','employee') NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `full_name`, `email`, `phone_number`, `date_of_birth`, `monthly_salary`, `user_type`) VALUES
(1, 'Dragan', 'draganvujic29@gmail.com', '00387644441119', '1995-02-12', '3000.00', 'employee'),
(2, 'Nemanja', 'nemo94@gmail.com', '00387434533', '1334-01-02', '2000.00', 'employee'),
(3, 'Filip', 'fipa@123gmail.com', '038765324234', '1999-03-05', '2000.00', 'employee'),
(4, 'Dietrih Mayer', 'died@gmail.com', '051330901', '1993-02-03', '2000.00', 'employee'),
(5, 'Gianni', 'gianni@gmail.com', '002383843842', '1993-12-21', '2000.00', 'employee'),
(6, 'Mike', 'mikecrab@gmail.com', '00394856483', '1994-02-02', '2000.00', 'employee'),
(7, 'Corleone', 'godfather@gmail.com', '000333666999', '1976-12-03', '2000.00', 'employee'),
(12, 'Filip Lam', 'lam123@hotmail.com', '006324235', '2003-02-02', '1234.00', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `assigne` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_completed` tinyint(1) NOT NULL,
  `total_completed_tasks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `assigne`, `created_at`, `is_completed`, `total_completed_tasks`) VALUES
(1, 'CSS', 'Style it', 2, '1995-02-11 23:00:00', 1, ''),
(2, 'HTML', 'programing', 3, '2023-02-11 23:00:00', 1, ''),
(3, 'Tehnical issue', 'Check network', 1, '2023-02-11 23:00:00', 1, ''),
(4, 'MySqli', 'Create tables', 2, '2023-02-01 23:00:00', 1, ''),
(5, 'CSS', 'Change a style of index page', 1, '2023-03-01 23:00:00', 0, ''),
(6, 'Book', 'Read a book War and Peace', 2, '2023-07-01 22:00:00', 1, ''),
(7, 'PHP', 'Create a delete button for employees', 7, '2023-02-02 23:00:00', 1, ''),
(8, 'JS', 'Create Alerts when your are sussesfully reg', 6, '2023-02-21 23:00:00', 1, ''),
(9, 'JS', 'Create logout button for every page', 3, '2023-02-18 23:00:00', 0, ''),
(10, 'CSS', 'Make a responsive site', 6, '2023-02-22 23:00:00', 1, ''),
(11, 'Catch', 'Catch me if you can', 5, '2023-02-25 23:00:00', 0, ''),
(12, 'Bootstrap', 'Style bootstrap buttons', 5, '2023-02-01 23:00:00', 1, ''),
(13, 'Test', 'Test register page', 3, '2023-02-21 23:00:00', 0, ''),
(14, 'Test', 'Test a datebase tables', 4, '2023-02-09 23:00:00', 0, ''),
(15, 'Image', 'Find a properly images for site', 1, '2023-02-21 23:00:00', 1, ''),
(16, 'Client', 'Talk with a client and give him information', 3, '2023-02-16 23:00:00', 0, ''),
(17, 'Office', 'See what we need new in the office', 4, '2023-02-21 23:00:00', 0, ''),
(18, 'Javascript', 'addeventlistener change ', 4, '2023-02-10 23:00:00', 0, ''),
(19, 'Test', 'Chech css flexbox and make responsive site', 6, '2023-02-21 23:00:00', 1, ''),
(20, 'CSS', 'Translete code to tailwind', 4, '2023-02-03 23:00:00', 0, ''),
(21, 'New client', 'Talk with new client', 1, '2023-02-01 23:00:00', 0, ''),
(22, 'Course', 'Finish the javascript course', 4, '2023-02-02 23:00:00', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_employee` (`assigne`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_employee` FOREIGN KEY (`assigne`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
