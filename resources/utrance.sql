-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb-24780-db.mariadb-24780:24780
-- Generation Time: Apr 15, 2021 at 04:28 AM
-- Server version: 10.3.25-MariaDB-1:10.3.25+maria~bionic
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utrance`
--

-- --------------------------------------------------------

--
-- Table structure for table `freight_price`
--

CREATE TABLE `freight_price` (
  `route_id` int(11) NOT NULL,
  `metal` int(11) NOT NULL,
  `agricultural_products` int(11) NOT NULL,
  `textile_products` int(11) NOT NULL,
  `timber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freight_price`
--

INSERT INTO `freight_price` (`route_id`, `metal`, `agricultural_products`, `textile_products`, `timber`) VALUES
(1, 500, 400, 300, 600),
(2, 500, 400, 300, 600),
(3, 250, 150, 200, 300),
(4, 550, 430, 375, 650);

-- --------------------------------------------------------

--
-- Table structure for table `give_details`
--

CREATE TABLE `give_details` (
  `details_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `details_type` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `readMessage` tinyint(1) NOT NULL,
  `receivedTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `give_details`
--

INSERT INTO `give_details` (`details_id`, `first_name`, `email_id`, `details_type`, `detail`, `readMessage`, `receivedTime`) VALUES
(3, 'Sugath', 'gihan123@example.com', 'other', 'This is a test message about the other news like weather changes in Kandy and Colombo. Please check the news24 channel weather report for additional information.\r\n', 0, '2021-01-02'),
(5, 'Diyara', 'gihan123@example.com', 'train_schedule', ' In the Northern line, there is a schedule change due to the work going on in the railway tracks. All the trains will have to face a delay of 30 minutes.', 1, '2021-01-02'),
(6, 'Diyara', 'gihan123@example.com', 'ticket_price', 'Hi there.', 0, '2021-01-04'),
(7, 'Diya', 'gihan123@example.com', 'ticket_price', ' Hi there, about the message I sent you earlier, please refer the newspapers. I\'ll try to send you more information about this issue soon. ', 1, '2021-01-04'),
(8, 'Rishi', 'gihan123@example.com', 'other', ' This is to check the function', 0, '2021-01-07'),
(9, 'Diyara', 'da@gmail.com', 'ticket_price', ' Hi there, new message', 0, '2021-02-06'),
(10, 'Yashodha', 'sugath@example.com', 'ticket_price', 'Hello', 0, '2021-03-25'),
(11, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'fdvfdvds', 1, '2021-03-30'),
(12, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'fdvfdvds', 1, '2021-03-30'),
(13, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'dvds', 1, '2021-03-30'),
(14, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'dvds', 1, '2021-03-30'),
(15, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'dvds', 1, '2021-03-30'),
(16, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'dvds', 1, '2021-03-30'),
(17, 'Cdvfddx', 'gihan123@example.com', 'train_schedule', 'v fdb d', 1, '2021-03-30'),
(18, 'Cdvfddx', 'sampath@example.com', 'ticket_price', 'gbreb', 1, '2021-03-30'),
(19, 'Cdvfddx', 'sampath@example.com', 'train_schedule', 'Hellovev', 1, '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `News_id` int(11) NOT NULL,
  `News_type` varchar(100) NOT NULL,
  `Headline` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `NewsImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`News_id`, `News_type`, `Headline`, `Content`, `NewsImage`) VALUES
(135, 'train_schedule', 'About changes', 'The train schedules will face changes due to the current situation in the country. there is a chance for some train routes to stop functioning in particular areas. a few trains will not stop in all stations according to the railway department.', 'train1.jpg'),
(136, 'train_schedule', 'kandy train will not depart today', 'The train from colombo to kandy will  not depart from colombo today due to corona lockdown process in the western province. the ministry of health and the ministry of railway have decided to implement this throughout the weekend.', 'train2.jpg'),
(137, 'ticket_price', 'No change in other ticket prices', 'The ticket prices for the other classes and a/c trains won\'t be changed. the meeting results from the parliament is out. there may be further discussion on this in the upcoming meeting scheduled next month.', 'train03.jpg'),
(138, 'ticket_price', 'Change in the third class ticket prices', 'The ticket prices of the trains will be reduced for the third class and the other classes and air conditioned train tickets will remain the same. according to the decisions taken in the parliament after the meeting this change is decided to be implemented.', 'train3.jpg'),
(139, 'other', 'New train in eastern coast', 'A new train is going to be introduced in the eastern coastal line. this train is part of the new project, â€œadvanced trains in sri lankaâ€ implemented by the new government. this train will start itâ€™s journey in the coming march.', 'train04.jpg'),
(140, 'other', 'nothern line weather change', 'The passengers are required to concentrate on the weather in the northern region. there may be a heavy rainfall in the area so passengers are requested to take precautions. there is no change in the train schedule to the north except for the one to jaffna.', 'train4.jpg'),
(141, 'ticket_price', 'New train in northern coast', 'This train is part of the new project, â€œadvanced trains in sri lankaâ€ implemented by the new government. this train will start itâ€™s journey in the coming march', 'newtrain.jpeg'),
(142, 'ticket_price', 'Change in the first class ticket prices', 'The ticket prices of the trains will be reduced for the first class and the other classes and air conditioned train tickets will remain the same. according to the decisions taken in the parliament after the meeting this change is decided to be implemented.', 'train5.jpg'),
(143, 'other', 'Train will not depart the fort statio', 'The train schedules will face changes due to the current situation in the country. there is a chance for some train routes to stop functioning in particular areas. a few trains will not stop in all stations according to the railway department.', 'train05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `start_station_id` int(11) NOT NULL,
  `dest_station_id` int(11) NOT NULL,
  `total_time` time NOT NULL,
  `line` varchar(255) NOT NULL,
  `route_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `start_station_id`, `dest_station_id`, `total_time`, `line`, `route_status`) VALUES
(1, 1, 10, '02:44:00', 'Coastal', 1),
(2, 10, 1, '02:25:00', 'Coastal', 1),
(3, 4, 5, '01:23:00', 'Coastal', 1),
(4, 9, 70, '10:02:00', 'Main', 1),
(5, 4, 10, '02:53:00', 'Coastal', 1),
(6, 9, 36, '02:31:00', 'Main', 0),
(7, 1, 10, '04:09:00', 'Coastal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seat_availability`
--

CREATE TABLE `seat_availability` (
  `train_id` int(11) NOT NULL,
  `sa_date` date NOT NULL,
  `sa_first_class` int(11) DEFAULT NULL,
  `sa_second_class` int(11) DEFAULT NULL,
  `sa_observation_class` int(11) DEFAULT NULL,
  `sa_sleeping_births` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_availability`
--

INSERT INTO `seat_availability` (`train_id`, `sa_date`, `sa_first_class`, `sa_second_class`, `sa_observation_class`, `sa_sleeping_births`) VALUES
(1, '2021-03-24', 0, 0, 1, 10),
(1, '2021-03-25', 50, 30, 1, 20),
(1, '2021-03-26', 50, 28, 1, 20),
(1, '2021-03-29', 28, 14, 1, 20),
(1, '2021-03-30', 45, 12, 1, 20),
(1, '2021-03-31', 50, 28, 1, 20),
(1, '2021-04-05', 50, 30, 1, 20),
(1, '2021-04-06', 50, 30, 1, 20),
(1, '2021-04-07', 50, 30, 1, 20),
(1, '2021-04-12', 50, 30, 1, 20),
(1, '2021-04-13', 50, 30, 1, 20),
(1, '2021-04-14', 50, 30, 1, 20),
(1, '2021-04-19', 50, 30, 1, 20),
(1, '2021-04-20', 50, 30, 1, 20),
(1, '2021-04-26', 50, 30, 1, 20),
(1, '2021-04-27', 50, 29, 1, 20),
(1, '2021-04-28', 50, 22, 1, 20),
(1, '2021-05-03', 50, 30, 1, 20),
(1, '2021-05-04', 50, 30, 1, 20),
(1, '2021-05-05', 50, 30, 1, 20),
(1, '2021-05-10', 50, 30, 1, 20),
(1, '2021-05-11', 50, 30, 1, 20),
(1, '2021-05-12', 50, 30, 1, 20),
(1, '2021-05-17', 50, 30, 1, 20),
(1, '2021-05-18', 50, 30, 1, 20),
(1, '2021-05-19', 50, 30, 1, 20),
(1, '2021-05-24', 50, 30, 1, 20),
(1, '2021-05-25', 50, 30, 1, 20),
(1, '2021-05-26', 50, 30, 1, 20),
(1, '2021-05-31', 50, 30, 1, 20),
(1, '2021-06-01', 50, 30, 1, 20),
(1, '2021-06-02', 50, 30, 1, 20),
(1, '2021-06-07', 50, 30, 1, 20),
(1, '2021-06-08', 50, 30, 1, 20),
(1, '2021-06-09', 50, 30, 1, 20),
(1, '2021-06-14', 50, 30, 1, 20),
(1, '2021-06-15', 50, 30, 1, 20),
(1, '2021-06-16', 50, 30, 1, 20),
(1, '2021-06-21', 50, 30, 1, 20),
(1, '2021-06-22', 50, 30, 1, 20),
(1, '2021-06-23', 50, 30, 1, 20),
(1, '2021-06-28', 50, 30, 1, 20),
(1, '2021-06-29', 50, 30, 1, 20),
(1, '2021-06-30', 50, 30, 1, 20),
(2, '2021-03-25', 50, 30, 1, 20),
(2, '2021-03-26', 50, 30, 1, 20),
(2, '2021-03-27', 50, 30, 1, 20),
(2, '2021-03-28', 50, 30, 1, 20),
(2, '2021-03-29', 50, 19, 1, 20),
(2, '2021-03-30', 50, 28, 1, 20),
(2, '2021-03-31', 47, 30, 1, 20),
(2, '2021-04-01', 50, 30, 1, 20),
(2, '2021-04-02', 50, 30, 1, 20),
(2, '2021-04-03', 50, 30, 1, 20),
(2, '2021-04-04', 50, 30, 1, 20),
(2, '2021-04-05', 50, 30, 1, 20),
(2, '2021-04-06', 50, 30, 1, 20),
(2, '2021-04-07', 50, 30, 1, 20),
(2, '2021-04-08', 50, 30, 1, 20),
(2, '2021-04-09', 50, 30, 1, 20),
(2, '2021-04-10', 50, 30, 1, 20),
(2, '2021-04-11', 50, 30, 1, 20),
(2, '2021-04-12', 50, 30, 1, 20),
(2, '2021-04-13', 50, 30, 1, 20),
(2, '2021-04-14', 50, 30, 1, 20),
(2, '2021-04-15', 50, 30, 1, 20),
(2, '2021-04-16', 50, 30, 1, 20),
(2, '2021-04-17', 50, 30, 1, 20),
(2, '2021-04-18', 50, 30, 1, 20),
(2, '2021-04-19', 50, 30, 1, 20),
(2, '2021-04-20', 50, 30, 1, 20),
(2, '2021-04-21', 50, 30, 1, 20),
(2, '2021-04-22', 50, 30, 1, 20),
(2, '2021-04-23', 50, 30, 1, 20),
(2, '2021-04-24', 50, 30, 1, 20),
(2, '2021-04-25', 50, 30, 1, 20),
(2, '2021-04-26', 50, 30, 1, 20),
(2, '2021-04-27', 50, 30, 1, 20),
(2, '2021-04-28', 50, 30, 1, 20),
(2, '2021-04-29', 50, 30, 1, 20),
(2, '2021-04-30', 50, 30, 1, 20),
(2, '2021-05-01', 50, 30, 1, 20),
(2, '2021-05-02', 50, 30, 1, 20),
(2, '2021-05-03', 50, 30, 1, 20),
(2, '2021-05-04', 50, 30, 1, 20),
(2, '2021-05-05', 50, 30, 1, 20),
(2, '2021-05-06', 50, 30, 1, 20),
(2, '2021-05-07', 50, 30, 1, 20),
(2, '2021-05-08', 50, 30, 1, 20),
(2, '2021-05-09', 50, 30, 1, 20),
(2, '2021-05-10', 50, 30, 1, 20),
(2, '2021-05-11', 50, 30, 1, 20),
(2, '2021-05-12', 50, 30, 1, 20),
(2, '2021-05-13', 50, 30, 1, 20),
(2, '2021-05-14', 50, 30, 1, 20),
(2, '2021-05-15', 50, 30, 1, 20),
(2, '2021-05-16', 50, 30, 1, 20),
(2, '2021-05-17', 50, 30, 1, 20),
(2, '2021-05-18', 50, 30, 1, 20),
(2, '2021-05-19', 50, 30, 1, 20),
(2, '2021-05-20', 50, 30, 1, 20),
(2, '2021-05-21', 50, 30, 1, 20),
(2, '2021-05-22', 50, 30, 1, 20),
(2, '2021-05-23', 50, 30, 1, 20),
(2, '2021-05-24', 50, 30, 1, 20),
(2, '2021-05-25', 50, 30, 1, 20),
(2, '2021-05-26', 50, 30, 1, 20),
(2, '2021-05-27', 50, 30, 1, 20),
(2, '2021-05-28', 50, 30, 1, 20),
(2, '2021-05-29', 50, 30, 1, 20),
(2, '2021-05-30', 50, 30, 1, 20),
(2, '2021-05-31', 50, 30, 1, 20),
(2, '2021-06-01', 50, 30, 1, 20),
(2, '2021-06-02', 50, 30, 1, 20),
(2, '2021-06-03', 50, 30, 1, 20),
(2, '2021-06-04', 50, 30, 1, 20),
(2, '2021-06-05', 50, 30, 1, 20),
(2, '2021-06-06', 50, 30, 1, 20),
(2, '2021-06-07', 50, 30, 1, 20),
(2, '2021-06-08', 50, 30, 1, 20),
(2, '2021-06-09', 50, 30, 1, 20),
(2, '2021-06-10', 50, 30, 1, 20),
(2, '2021-06-11', 50, 30, 1, 20),
(2, '2021-06-12', 50, 30, 1, 20),
(2, '2021-06-13', 50, 30, 1, 20),
(2, '2021-06-14', 50, 30, 1, 20),
(2, '2021-06-15', 50, 30, 1, 20),
(2, '2021-06-16', 50, 30, 1, 20),
(2, '2021-06-17', 50, 30, 1, 20),
(2, '2021-06-18', 50, 30, 1, 20),
(2, '2021-06-19', 50, 30, 1, 20),
(2, '2021-06-20', 50, 30, 1, 20),
(2, '2021-06-21', 50, 30, 1, 20),
(2, '2021-06-22', 50, 30, 1, 20),
(2, '2021-06-23', 50, 30, 1, 20),
(2, '2021-06-24', 50, 30, 1, 20),
(2, '2021-06-25', 50, 30, 1, 20),
(2, '2021-06-26', 50, 30, 1, 20),
(2, '2021-06-27', 50, 30, 1, 20),
(2, '2021-06-28', 50, 30, 1, 20),
(2, '2021-06-29', 50, 30, 1, 20),
(2, '2021-06-30', 50, 30, 1, 20),
(3, '2021-03-25', 50, 30, 1, 20),
(3, '2021-03-26', 50, 30, 1, 20),
(3, '2021-03-29', 50, 30, 1, 20),
(3, '2021-03-30', 50, 30, 1, 20),
(3, '2021-03-31', 50, 30, 1, 20),
(3, '2021-04-01', 50, 30, 1, 20),
(3, '2021-04-02', 50, 30, 1, 20),
(3, '2021-04-05', 50, 30, 1, 20),
(3, '2021-04-06', 50, 30, 1, 20),
(3, '2021-04-07', 50, 30, 1, 20),
(3, '2021-04-08', 50, 30, 1, 20),
(3, '2021-04-09', 50, 30, 1, 20),
(3, '2021-04-12', 50, 30, 1, 20),
(3, '2021-04-13', 50, 30, 1, 20),
(3, '2021-04-14', 50, 30, 1, 20),
(3, '2021-04-15', 50, 30, 1, 20),
(3, '2021-04-16', 50, 30, 1, 20),
(3, '2021-04-19', 50, 30, 1, 20),
(3, '2021-04-20', 50, 30, 1, 20),
(3, '2021-04-21', 50, 30, 1, 20),
(3, '2021-04-22', 50, 30, 1, 20),
(3, '2021-04-23', 50, 30, 1, 20),
(3, '2021-04-26', 50, 30, 1, 20),
(3, '2021-04-27', 50, 30, 1, 20),
(3, '2021-04-28', 50, 30, 1, 20),
(3, '2021-04-29', 50, 30, 1, 20),
(3, '2021-04-30', 50, 30, 1, 20),
(3, '2021-05-03', 50, 30, 1, 20),
(3, '2021-05-04', 50, 30, 1, 20),
(3, '2021-05-05', 50, 30, 1, 20),
(3, '2021-05-06', 50, 30, 1, 20),
(3, '2021-05-07', 50, 30, 1, 20),
(3, '2021-05-10', 50, 30, 1, 20),
(3, '2021-05-11', 50, 30, 1, 20),
(3, '2021-05-12', 50, 30, 1, 20),
(3, '2021-05-13', 50, 30, 1, 20),
(3, '2021-05-14', 50, 30, 1, 20),
(3, '2021-05-17', 50, 30, 1, 20),
(3, '2021-05-18', 50, 30, 1, 20),
(3, '2021-05-19', 50, 30, 1, 20),
(3, '2021-05-20', 50, 30, 1, 20),
(3, '2021-05-21', 50, 30, 1, 20),
(3, '2021-05-24', 50, 30, 1, 20),
(3, '2021-05-25', 50, 30, 1, 20),
(3, '2021-05-26', 50, 30, 1, 20),
(3, '2021-05-27', 50, 30, 1, 20),
(3, '2021-05-28', 50, 30, 1, 20),
(3, '2021-05-31', 50, 30, 1, 20),
(3, '2021-06-01', 50, 30, 1, 20),
(3, '2021-06-02', 50, 30, 1, 20),
(3, '2021-06-03', 50, 30, 1, 20),
(3, '2021-06-04', 50, 30, 1, 20),
(3, '2021-06-07', 50, 30, 1, 20),
(3, '2021-06-08', 50, 30, 1, 20),
(3, '2021-06-09', 50, 30, 1, 20),
(3, '2021-06-10', 50, 30, 1, 20),
(3, '2021-06-11', 50, 30, 1, 20),
(3, '2021-06-14', 50, 30, 1, 20),
(3, '2021-06-15', 50, 30, 1, 20),
(3, '2021-06-16', 50, 30, 1, 20),
(3, '2021-06-17', 50, 30, 1, 20),
(3, '2021-06-18', 50, 30, 1, 20),
(3, '2021-06-21', 50, 30, 1, 20),
(3, '2021-06-22', 50, 30, 1, 20),
(3, '2021-06-23', 50, 30, 1, 20),
(3, '2021-06-24', 50, 30, 1, 20),
(3, '2021-06-25', 50, 30, 1, 20),
(3, '2021-06-28', 50, 30, 1, 20),
(3, '2021-06-29', 50, 30, 1, 20),
(3, '2021-06-30', 50, 30, 1, 20),
(4, '2021-03-24', 30, 0, 3, 1),
(4, '2021-03-25', 50, 40, 2, 30),
(4, '2021-03-26', 50, 37, 2, 30),
(4, '2021-03-27', 50, 40, 2, 30),
(4, '2021-03-28', 50, 40, 2, 30),
(4, '2021-03-29', 45, 26, 2, 30),
(4, '2021-03-30', 49, 37, 2, 30),
(4, '2021-03-31', 49, 39, 2, 30),
(4, '2021-04-01', 50, 40, 2, 30),
(4, '2021-04-02', 50, 40, 2, 30),
(4, '2021-04-03', 50, 40, 2, 30),
(4, '2021-04-04', 50, 40, 2, 30),
(4, '2021-04-05', 50, 40, 2, 30),
(4, '2021-04-06', 50, 40, 2, 30),
(4, '2021-04-07', 50, 40, 2, 30),
(4, '2021-04-08', 50, 40, 2, 30),
(4, '2021-04-09', 50, 40, 2, 30),
(4, '2021-04-10', 50, 40, 2, 30),
(4, '2021-04-11', 50, 40, 2, 30),
(4, '2021-04-12', 50, 40, 2, 30),
(4, '2021-04-13', 50, 40, 2, 30),
(4, '2021-04-14', 50, 40, 2, 30),
(4, '2021-04-15', 50, 40, 2, 30),
(4, '2021-04-16', 50, 40, 2, 30),
(4, '2021-04-17', 50, 40, 2, 30),
(4, '2021-04-18', 50, 40, 2, 30),
(4, '2021-04-19', 50, 40, 2, 30),
(4, '2021-04-20', 50, 40, 2, 30),
(4, '2021-04-21', 50, 40, 2, 30),
(4, '2021-04-22', 50, 40, 2, 30),
(4, '2021-04-23', 50, 40, 2, 30),
(4, '2021-04-24', 50, 40, 2, 30),
(4, '2021-04-25', 50, 40, 2, 30),
(4, '2021-04-26', 50, 40, 2, 30),
(4, '2021-04-27', 50, 39, 2, 30),
(4, '2021-04-28', 47, 34, 2, 30),
(4, '2021-04-29', 50, 40, 2, 30),
(4, '2021-04-30', 50, 40, 2, 30),
(4, '2021-05-01', 50, 40, 2, 30),
(4, '2021-05-02', 50, 40, 2, 30),
(4, '2021-05-03', 50, 40, 2, 30),
(4, '2021-05-04', 50, 40, 2, 30),
(4, '2021-05-05', 50, 40, 2, 30),
(4, '2021-05-06', 50, 40, 2, 30),
(4, '2021-05-07', 50, 40, 2, 30),
(4, '2021-05-08', 50, 40, 2, 30),
(4, '2021-05-09', 50, 40, 2, 30),
(4, '2021-05-10', 50, 40, 2, 30),
(4, '2021-05-11', 50, 40, 2, 30),
(4, '2021-05-12', 50, 40, 2, 30),
(4, '2021-05-13', 50, 40, 2, 30),
(4, '2021-05-14', 50, 40, 2, 30),
(4, '2021-05-15', 50, 40, 2, 30),
(4, '2021-05-16', 50, 40, 2, 30),
(4, '2021-05-17', 50, 40, 2, 30),
(4, '2021-05-18', 50, 40, 2, 30),
(4, '2021-05-19', 50, 40, 2, 30),
(4, '2021-05-20', 50, 40, 2, 30),
(4, '2021-05-21', 50, 40, 2, 30),
(4, '2021-05-22', 50, 40, 2, 30),
(4, '2021-05-23', 50, 40, 2, 30),
(4, '2021-05-24', 50, 40, 2, 30),
(4, '2021-05-25', 50, 40, 2, 30),
(4, '2021-05-26', 50, 40, 2, 30),
(4, '2021-05-27', 50, 40, 2, 30),
(4, '2021-05-28', 50, 40, 2, 30),
(4, '2021-05-29', 50, 40, 2, 30),
(4, '2021-05-30', 50, 40, 2, 30),
(4, '2021-05-31', 50, 40, 2, 30),
(4, '2021-06-01', 50, 40, 2, 30),
(4, '2021-06-02', 50, 40, 2, 30),
(4, '2021-06-03', 50, 40, 2, 30),
(4, '2021-06-04', 50, 40, 2, 30),
(4, '2021-06-05', 50, 40, 2, 30),
(4, '2021-06-06', 50, 40, 2, 30),
(4, '2021-06-07', 50, 40, 2, 30),
(4, '2021-06-08', 50, 40, 2, 30),
(4, '2021-06-09', 50, 40, 2, 30),
(4, '2021-06-10', 50, 40, 2, 30),
(4, '2021-06-11', 50, 40, 2, 30),
(4, '2021-06-12', 50, 40, 2, 30),
(4, '2021-06-13', 50, 40, 2, 30),
(4, '2021-06-14', 50, 40, 2, 30),
(4, '2021-06-15', 50, 40, 2, 30),
(4, '2021-06-16', 50, 40, 2, 30),
(4, '2021-06-17', 50, 40, 2, 30),
(4, '2021-06-18', 50, 40, 2, 30),
(4, '2021-06-19', 50, 40, 2, 30),
(4, '2021-06-20', 50, 40, 2, 30),
(4, '2021-06-21', 50, 40, 2, 30),
(4, '2021-06-22', 50, 40, 2, 30),
(4, '2021-06-23', 50, 40, 2, 30),
(4, '2021-06-24', 50, 40, 2, 30),
(4, '2021-06-25', 50, 40, 2, 30),
(4, '2021-06-26', 50, 40, 2, 30),
(4, '2021-06-27', 50, 40, 2, 30),
(4, '2021-06-28', 50, 40, 2, 30),
(4, '2021-06-29', 50, 40, 2, 30),
(4, '2021-06-30', 50, 40, 2, 30),
(5, '2021-03-25', 50, 40, 2, 30),
(5, '2021-03-26', 43, 36, 2, 30),
(5, '2021-03-27', 50, 36, 2, 30),
(5, '2021-03-28', 27, 0, 2, 30),
(5, '2021-03-29', 48, 38, 2, 30),
(5, '2021-03-30', 50, 38, 2, 30),
(5, '2021-03-31', 50, 37, 2, 30),
(5, '2021-04-01', 50, 40, 2, 30),
(5, '2021-04-02', 50, 40, 2, 30),
(5, '2021-04-03', 50, 40, 2, 30),
(5, '2021-04-04', 50, 40, 2, 30),
(5, '2021-04-05', 50, 40, 2, 30),
(5, '2021-04-06', 50, 40, 2, 30),
(5, '2021-04-07', 50, 40, 2, 30),
(5, '2021-04-08', 50, 40, 2, 30),
(5, '2021-04-09', 50, 40, 2, 30),
(5, '2021-04-10', 50, 40, 2, 30),
(5, '2021-04-11', 50, 40, 2, 30),
(5, '2021-04-12', 50, 40, 2, 30),
(5, '2021-04-13', 50, 40, 2, 30),
(5, '2021-04-14', 50, 40, 2, 30),
(5, '2021-04-15', 50, 40, 2, 30),
(5, '2021-04-16', 50, 40, 2, 30),
(5, '2021-04-17', 50, 40, 2, 30),
(5, '2021-04-18', 50, 40, 2, 30),
(5, '2021-04-19', 50, 40, 2, 30),
(5, '2021-04-20', 50, 40, 2, 30),
(5, '2021-04-21', 50, 40, 2, 30),
(5, '2021-04-22', 50, 40, 2, 30),
(5, '2021-04-23', 50, 40, 2, 30),
(5, '2021-04-24', 50, 40, 2, 30),
(5, '2021-04-25', 50, 40, 2, 30),
(5, '2021-04-26', 50, 40, 2, 30),
(5, '2021-04-27', 50, 40, 2, 30),
(5, '2021-04-28', 50, 40, 2, 30),
(5, '2021-04-29', 50, 40, 2, 30),
(5, '2021-04-30', 50, 40, 2, 30),
(5, '2021-05-01', 50, 40, 2, 30),
(5, '2021-05-02', 50, 40, 2, 30),
(5, '2021-05-03', 50, 40, 2, 30),
(5, '2021-05-04', 50, 40, 2, 30),
(5, '2021-05-05', 50, 40, 2, 30),
(5, '2021-05-06', 50, 40, 2, 30),
(5, '2021-05-07', 50, 40, 2, 30),
(5, '2021-05-08', 50, 40, 2, 30),
(5, '2021-05-09', 50, 40, 2, 30),
(5, '2021-05-10', 50, 40, 2, 30),
(5, '2021-05-11', 50, 40, 2, 30),
(5, '2021-05-12', 50, 40, 2, 30),
(5, '2021-05-13', 50, 40, 2, 30),
(5, '2021-05-14', 50, 40, 2, 30),
(5, '2021-05-15', 50, 40, 2, 30),
(5, '2021-05-16', 50, 40, 2, 30),
(5, '2021-05-17', 50, 40, 2, 30),
(5, '2021-05-18', 50, 40, 2, 30),
(5, '2021-05-19', 50, 40, 2, 30),
(5, '2021-05-20', 50, 40, 2, 30),
(5, '2021-05-21', 50, 40, 2, 30),
(5, '2021-05-22', 50, 40, 2, 30),
(5, '2021-05-23', 50, 40, 2, 30),
(5, '2021-05-24', 50, 40, 2, 30),
(5, '2021-05-25', 50, 40, 2, 30),
(5, '2021-05-26', 50, 40, 2, 30),
(5, '2021-05-27', 50, 40, 2, 30),
(5, '2021-05-28', 50, 40, 2, 30),
(5, '2021-05-29', 50, 40, 2, 30),
(5, '2021-05-30', 50, 40, 2, 30),
(5, '2021-05-31', 50, 40, 2, 30),
(5, '2021-06-01', 50, 40, 2, 30),
(5, '2021-06-02', 50, 40, 2, 30),
(5, '2021-06-03', 50, 40, 2, 30),
(5, '2021-06-04', 50, 40, 2, 30),
(5, '2021-06-05', 50, 40, 2, 30),
(5, '2021-06-06', 50, 40, 2, 30),
(5, '2021-06-07', 50, 40, 2, 30),
(5, '2021-06-08', 50, 40, 2, 30),
(5, '2021-06-09', 50, 40, 2, 30),
(5, '2021-06-10', 50, 40, 2, 30),
(5, '2021-06-11', 50, 40, 2, 30),
(5, '2021-06-12', 50, 40, 2, 30),
(5, '2021-06-13', 50, 40, 2, 30),
(5, '2021-06-14', 50, 40, 2, 30),
(5, '2021-06-15', 50, 40, 2, 30),
(5, '2021-06-16', 50, 40, 2, 30),
(5, '2021-06-17', 50, 40, 2, 30),
(5, '2021-06-18', 50, 40, 2, 30),
(5, '2021-06-19', 50, 40, 2, 30),
(5, '2021-06-20', 50, 40, 2, 30),
(5, '2021-06-21', 50, 40, 2, 30),
(5, '2021-06-22', 50, 40, 2, 30),
(5, '2021-06-23', 50, 40, 2, 30),
(5, '2021-06-24', 50, 40, 2, 30),
(5, '2021-06-25', 50, 40, 2, 30),
(5, '2021-06-26', 50, 40, 2, 30),
(5, '2021-06-27', 50, 40, 2, 30),
(5, '2021-06-28', 50, 40, 2, 30),
(5, '2021-06-29', 50, 40, 2, 30),
(5, '2021-06-30', 50, 40, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(255) NOT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`, `longitude`, `latitude`) VALUES
(1, 'Beliatta', 80.737253, 6.042276),
(2, 'Wewurukannala', 80.697137, 5.984366),
(3, 'Kekanadura', 80.613378, 5.964698),
(4, 'Matara', 80.54343, 5.95188),
(5, 'Galle', 80.21435, 6.033278),
(6, 'Hikkaduwa', 80.09999, 6.142344),
(7, 'Ambalangoda', 80.055667, 6.235418),
(8, 'Aluthgama', 80.000349, 6.433087),
(9, 'Colombo-Fort', 79.85, 6.9337),
(10, 'Maradana', 79.8585, 6.9237),
(11, 'Weligama', 80.4297, 5.9756),
(12, 'Walgama', 80.51407, 5.94544),
(13, 'Kamburugamuwa', 80.49573, 5.94359),
(14, 'Mirissa', 80.47339, 5.95677),
(15, 'Polwathumodara', 80.45743, 5.96429),
(16, 'Kumbalgama', 80.40967, 5.96368),
(17, 'Midigama', 80.39125, 5.96546),
(18, 'Ahangama', 80.36387, 5.9733),
(19, 'Kathaluwa', 80.33797, 5.98361),
(20, 'Koggala', 80.33162, 5.98603),
(21, 'Habaraduwa', 80.30737, 5.99425),
(22, 'Thalpe', 80.2802, 5.99861),
(23, 'Unawatuna', 80.2491, 6.0222),
(24, 'Katugoda', 80.24004, 6.03282),
(25, 'Ragama', 79.92148, 7.03018),
(26, 'Gampaha', 79.99382, 7.09382),
(27, 'Veyangoda', 80.05876, 7.15301),
(28, 'Mirigama', 80.12678, 7.24268),
(29, 'Polgahawela', 80.30094, 7.33119),
(30, 'Rambukkana', 80.39022, 7.32142),
(31, 'Kadigamuwa', 80.43368, 7.31814),
(32, 'Ihalakotte', 80.4693, 7.28887),
(33, 'Balana', 80.48955, 7.2669),
(34, 'Kadugannawa', 80.52071, 7.25794),
(35, 'Pilimathalawa', 80.55263, 7.2671),
(36, 'Kandy', 80.63253, 7.28977),
(37, 'Sarasaviuyana', 80.59643, 7.2602),
(38, 'Peradeniya', 80.59008, 7.25755),
(39, 'Gelioya', 80.59866, 7.21409),
(40, 'Gampola', 80.56693, 7.16219),
(41, 'Tembiligala', 80.55923, 7.13347),
(42, 'Ulapane', 80.55971, 7.10839),
(43, 'Nawalapitiya', 80.5349, 7.0575),
(44, 'Inguruoya', 80.54575, 7.01854),
(45, 'Galaboda', 80.52987, 6.98666),
(46, 'Watawala', 80.52601, 6.96207),
(47, 'Ihalawatawala', 80.53759, 6.94993),
(48, 'Rosella', 80.55892, 6.935),
(49, 'Hatton', 80.5975, 6.89341),
(50, 'Kotagala', 80.60871, 6.92856),
(51, 'Thalawakele', 80.66103, 6.94024),
(52, 'Watagoda', 80.65275, 6.96924),
(53, 'Great Western', 80.69134, 6.96962),
(54, 'Radella', 80.71624, 6.94604),
(55, 'Nanuoya', 80.74369, 6.94258),
(56, 'Parakumpura', 80.75239, 6.91955),
(57, 'Ambewela', 80.8146, 6.87718),
(58, 'Pattipola', 80.83122, 6.855),
(59, 'Ohiya', 80.84309, 6.81776),
(60, 'Idalgashinna', 80.89695, 6.77949),
(61, 'Haputale', 80.95739, 6.76858),
(62, 'Diyathalawa', 80.95869, 6.80175),
(63, 'Bandarawela', 80.98743, 6.82862),
(64, 'Kinigama', 81.00584, 6.82981),
(65, 'Heel Oya', 81.02565, 6.84443),
(66, 'Ella', 81.04719, 6.87589),
(67, 'Demodara', 81.06268, 6.90302),
(68, 'Uduwara', 81.04195, 6.93092),
(69, 'Haliela', 81.03353, 6.95423),
(70, 'Badulla', 81.05969, 6.98018),
(71, 'Kaluthara South', 79.95873, 6.58437),
(72, 'Kosgoda', 80.02928, 6.33863),
(73, 'Bambaranda', 80.66054, 5.97067),
(74, 'Weherahena', 80.57762, 5.95715),
(75, 'Ahungalle', 80.03766, 6.31279),
(76, 'Bentota', 79.99676, 6.42143),
(77, 'Panadura', 79.90458, 6.71271),
(78, 'Moratuwa', 79.88213, 6.77458),
(79, 'Mount Lavinia', 79.86283, 6.83172);

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `route_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `path_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`route_id`, `station_id`, `arrival_time`, `departure_time`, `path_id`) VALUES
(1, 1, '02:15:00', '02:15:00', 1),
(1, 2, '02:23:00', '02:24:00', 2),
(1, 3, '02:33:00', '02:34:00', 3),
(1, 4, '02:40:00', '02:42:00', 4),
(1, 5, '03:22:00', '03:30:00', 5),
(1, 6, '03:47:00', '03:48:00', 6),
(1, 7, '03:58:00', '03:59:00', 7),
(1, 8, '04:19:00', '04:20:00', 8),
(1, 9, '05:21:00', '05:22:00', 9),
(1, 10, '05:26:00', '00:00:00', 10),
(2, 1, '18:01:00', '00:00:00', 11),
(2, 2, '17:52:00', '17:53:00', 10),
(2, 3, '17:42:00', '17:43:00', 9),
(2, 4, '17:35:00', '17:36:00', 8),
(2, 5, '16:53:00', '16:58:00', 6),
(2, 6, '16:37:00', '16:38:00', 5),
(2, 7, '16:26:00', '16:27:00', 4),
(2, 8, '16:07:00', '16:08:00', 3),
(2, 9, '15:05:00', '15:10:00', 2),
(2, 10, '15:00:00', '15:00:00', 1),
(2, 11, '17:21:00', '17:22:00', 7),
(3, 4, '16:55:00', '16:55:00', 1),
(3, 5, '18:18:00', '00:00:00', 16),
(3, 11, '17:15:00', '17:35:00', 6),
(3, 12, '16:58:00', '16:59:00', 2),
(3, 13, '17:02:00', '17:03:00', 3),
(3, 14, '17:07:00', '17:08:00', 4),
(3, 15, '17:10:00', '17:11:00', 5),
(3, 16, '17:38:00', '17:39:00', 7),
(3, 17, '17:42:00', '17:43:00', 8),
(3, 18, '17:46:00', '17:47:00', 9),
(3, 19, '17:50:00', '17:51:00', 10),
(3, 20, '17:53:00', '17:56:00', 11),
(3, 21, '17:58:00', '17:59:00', 12),
(3, 22, '18:02:00', '18:03:00', 13),
(3, 23, '18:08:00', '18:09:00', 14),
(3, 24, '18:11:00', '18:12:00', 15),
(4, 9, '05:55:00', '05:55:00', 1),
(4, 25, '06:16:00', '06:18:00', 2),
(4, 26, '06:30:00', '06:31:00', 3),
(4, 27, '06:41:00', '06:43:00', 4),
(4, 28, '06:54:00', '06:55:00', 5),
(4, 29, '07:15:00', '07:17:00', 6),
(4, 30, '07:28:00', '07:31:00', 7),
(4, 31, '07:42:00', '07:43:00', 8),
(4, 32, '07:53:00', '07:54:00', 9),
(4, 33, '08:04:00', '08:05:00', 10),
(4, 34, '08:13:00', '08:14:00', 11),
(4, 35, '08:20:00', '08:25:00', 12),
(4, 36, '08:46:00', '08:55:00', 13),
(4, 37, '09:02:00', '09:03:00', 14),
(4, 38, '09:05:00', '09:07:00', 15),
(4, 39, '09:14:00', '09:15:00', 16),
(4, 40, '09:27:00', '09:39:00', 17),
(4, 41, '09:45:00', '09:46:00', 18),
(4, 42, '09:53:00', '09:54:00', 19),
(4, 43, '10:08:00', '10:12:00', 20),
(4, 44, '10:23:00', '10:24:00', 21),
(4, 45, '10:35:00', '10:36:00', 22),
(4, 46, '10:53:00', '10:54:00', 23),
(4, 47, '10:59:00', '11:00:00', 24),
(4, 48, '11:08:00', '11:09:00', 25),
(4, 49, '11:23:00', '11:25:00', 26),
(4, 50, '11:35:00', '11:36:00', 27),
(4, 51, '11:50:00', '11:52:00', 28),
(4, 52, '12:06:00', '12:07:00', 29),
(4, 53, '12:17:00', '12:22:00', 30),
(4, 54, '12:30:00', '12:31:00', 31),
(4, 55, '12:39:00', '12:45:00', 32),
(4, 56, '12:56:00', '12:57:00', 33),
(4, 57, '13:16:00', '13:17:00', 34),
(4, 58, '13:24:00', '13:25:00', 35),
(4, 59, '13:38:00', '13:39:00', 36),
(4, 60, '13:56:00', '14:07:00', 37),
(4, 61, '14:21:00', '14:22:00', 38),
(4, 62, '14:32:00', '14:34:00', 39),
(4, 63, '14:46:00', '14:48:00', 40),
(4, 64, '14:53:00', '14:54:00', 41),
(4, 65, '15:02:00', '15:03:00', 42),
(4, 66, '15:17:00', '15:19:00', 43),
(4, 67, '15:32:00', '15:33:00', 44),
(4, 68, '15:43:00', '15:44:00', 45),
(4, 69, '15:52:00', '15:53:00', 46),
(4, 70, '16:07:00', '00:00:00', 47),
(5, 4, '06:05:00', '06:05:00', 1),
(5, 5, '06:47:00', '06:55:00', 5),
(5, 6, '07:11:00', '07:12:00', 6),
(5, 7, '07:22:00', '07:23:00', 7),
(5, 8, '07:46:00', '07:47:00', 9),
(5, 9, '08:51:00', '08:53:00', 11),
(5, 10, '08:58:00', '08:58:00', 12),
(5, 11, '06:18:00', '06:19:00', 2),
(5, 18, '06:26:00', '06:27:00', 3),
(5, 21, '06:34:00', '06:35:00', 4),
(5, 71, '08:04:00', '08:05:00', 10),
(5, 72, '07:35:00', '07:36:00', 8),
(6, 9, '09:00:00', '09:00:00', 1),
(6, 26, '09:29:00', '09:30:00', 2),
(6, 36, '11:31:00', '11:31:00', 4),
(6, 38, '11:21:00', '11:22:00', 3),
(7, 1, '05:25:00', '05:25:00', 1),
(7, 2, '05:33:00', '05:34:00', 2),
(7, 3, '05:45:00', '05:46:00', 4),
(7, 4, '05:56:00', '06:12:00', 6),
(7, 5, '07:14:00', '07:25:00', 21),
(7, 6, '07:39:00', '07:43:00', 22),
(7, 7, '07:55:00', '07:56:00', 23),
(7, 8, '08:19:00', '08:20:00', 26),
(7, 9, '09:28:00', '09:29:00', 31),
(7, 10, '09:34:00', '09:34:00', 32),
(7, 11, '06:30:00', '06:31:00', 11),
(7, 12, '06:14:00', '06:15:00', 7),
(7, 13, '06:18:00', '06:19:00', 8),
(7, 14, '06:22:00', '06:23:00', 9),
(7, 15, '06:25:00', '06:26:00', 10),
(7, 16, '06:34:00', '06:35:00', 12),
(7, 17, '06:37:00', '06:38:00', 13),
(7, 18, '06:42:00', '06:43:00', 14),
(7, 19, '06:46:00', '06:48:00', 15),
(7, 20, '06:49:00', '06:59:00', 16),
(7, 21, '06:52:00', '06:53:00', 17),
(7, 22, '06:56:00', '06:57:00', 18),
(7, 23, '07:03:00', '07:04:00', 19),
(7, 24, '07:07:00', '07:08:00', 20),
(7, 71, '08:37:00', '08:38:00', 27),
(7, 73, '05:38:00', '05:39:00', 3),
(7, 74, '05:49:00', '05:50:00', 5),
(7, 75, '08:03:00', '08:04:00', 24),
(7, 76, '08:16:00', '08:17:00', 25),
(7, 77, '08:54:00', '08:55:00', 28),
(7, 78, '09:02:00', '09:03:00', 29),
(7, 79, '09:10:00', '09:11:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_booking`
--

CREATE TABLE `ticket_booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `train_date` date NOT NULL,
  `train_id` int(11) NOT NULL,
  `from_station` varchar(100) NOT NULL,
  `to_station` varchar(100) NOT NULL,
  `passengers` int(11) NOT NULL,
  `class` varchar(25) NOT NULL,
  `base_price` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `other_booking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_booking`
--

INSERT INTO `ticket_booking` (`id`, `customer_id`, `created_at`, `train_date`, `train_id`, `from_station`, `to_station`, `passengers`, `class`, `base_price`, `total_amount`, `other_booking`) VALUES
(1, 1, '2021-03-30 12:14:04', '2021-03-31', 2, 'Matara', 'Beliatta', 3, 'secondClass', 180, 180, '17983fbd6432faa1c53c4a8927c679e9'),
(2, 26, '2021-03-30 12:16:32', '2021-03-31', 1, 'Matara', 'Colombo-Fort', 3, 'secondClass', 870, 3620, '818fc76c4afa77b9602962f10ad99dd4'),
(3, 26, '2021-03-30 12:16:33', '2021-03-31', 4, 'Colombo-Fort', 'Kandy', 5, 'firstClass', 2750, 3620, '818fc76c4afa77b9602962f10ad99dd4'),
(4, 26, '2021-03-30 12:21:54', '2021-04-05', 1, 'Matara', 'Colombo-Fort', 3, 'secondClass', 870, 1970, 'b75ef7cb6f2730499909ac2b1cd1b3ed'),
(5, 26, '2021-03-30 12:21:54', '2021-04-05', 4, 'Colombo-Fort', 'Kandy', 2, 'firstClass', 1100, 1970, 'b75ef7cb6f2730499909ac2b1cd1b3ed'),
(6, 26, '2021-03-30 12:27:36', '2021-03-31', 1, 'Matara', 'Colombo-Fort', 3, 'secondClass', 870, 1970, '6e55d5edd2ff2e6b0ae343ac5d30482b'),
(7, 26, '2021-03-30 12:27:37', '2021-03-31', 4, 'Colombo-Fort', 'Kandy', 2, 'firstClass', 1100, 1970, '6e55d5edd2ff2e6b0ae343ac5d30482b'),
(8, 26, '2021-03-30 12:34:10', '2021-03-31', 2, 'Matara', 'Beliatta', 2, 'firstClass', 140, 140, 'b1a3e404236f4e8cd67ba39ed8ffa973'),
(9, 26, '2021-03-30 12:35:47', '2021-03-31', 2, 'Matara', 'Beliatta', 1, 'secondClass', 60, 60, 'd99c8860c7f32cca3bf7ff946115ab82'),
(10, 26, '2021-03-30 12:39:38', '2021-03-31', 2, 'Matara', 'Beliatta', 2, 'secondClass', 120, 120, '1fb40c9cab1c25b7531fc607bef453ec'),
(11, 26, '2021-03-30 12:44:30', '2021-03-31', 2, 'Matara', 'Beliatta', 3, 'firstClass', 210, 210, 'd2e3f4637535bccd4be3e8cce25feb95'),
(12, 1, '2021-04-03 19:58:03', '2021-04-28', 1, 'Matara', 'Colombo-Fort', 3, 'secondClass', 870, 2220, 'e955f2fcb283cc2d1ceb7b7b314ac0e3'),
(13, 1, '2021-04-03 19:58:03', '2021-04-28', 4, 'Colombo-Fort', 'Kandy', 3, 'secondClass', 1350, 2220, 'e955f2fcb283cc2d1ceb7b7b314ac0e3'),
(14, 26, '2021-04-03 20:02:55', '2021-04-28', 1, 'Matara', 'Colombo-Fort', 4, 'secondClass', 1160, 2810, 'ec227fdc74d072d92339d78368d228ef'),
(15, 26, '2021-04-03 20:02:55', '2021-04-28', 4, 'Colombo-Fort', 'Kandy', 3, 'firstClass', 1650, 2810, 'ec227fdc74d072d92339d78368d228ef'),
(16, 26, '2021-04-03 20:17:49', '2021-04-28', 1, 'Matara', 'Colombo-Fort', 1, 'secondClass', 290, 1640, '9ae65d963c481be731f73e9f9bd06f8b'),
(17, 26, '2021-04-03 20:17:49', '2021-04-28', 4, 'Colombo-Fort', 'Kandy', 3, 'secondClass', 1350, 1640, '9ae65d963c481be731f73e9f9bd06f8b');

--
-- Triggers `ticket_booking`
--
DELIMITER $$
CREATE TRIGGER `reduce_seats` AFTER INSERT ON `ticket_booking` FOR EACH ROW begin
        if (new.class = 'firstClass') then
            update seat_availability
                set sa_first_class = seat_availability.sa_first_class - new.passengers
            where train_id = new.train_id and sa_date = new.train_date;
        else if (new.class = 'secondClass') then
            update seat_availability
                set sa_second_class = seat_availability.sa_second_class - new.passengers
            where train_id = new.train_id and sa_date = new.train_date;
        end if ;
        end if;
    end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `ticket_id` int(11) NOT NULL,
  `fc_ticket_price` int(11) NOT NULL,
  `sc_ticket_price` int(11) NOT NULL,
  `tc_ticket_price` int(11) NOT NULL,
  `start_station_id` int(11) NOT NULL,
  `dest_station_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_price`
--

CREATE TABLE `ticket_price` (
  `station_id` int(50) NOT NULL,
  `station_name` varchar(100) NOT NULL,
  `availability_lines` varchar(255) NOT NULL,
  `first_class` varchar(255) NOT NULL,
  `second_class` varchar(255) NOT NULL,
  `third_class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_price`
--

INSERT INTO `ticket_price` (`station_id`, `station_name`, `availability_lines`, `first_class`, `second_class`, `third_class`) VALUES
(1, 'Beliatta', '1', '0', '0', '0'),
(2, 'Wewurukannala', '1', '40', '30', '20'),
(3, 'Kekanadura', '1', '50', '40', '30'),
(4, 'Matara', '1', '70', '60', '50'),
(9, 'Colombo-Fort', '1,2,3', '450,0,0', '350,0,0', '250,0,0'),
(10, 'Maradana', '2,3', '50,50', '40,40', '30,30'),
(36, 'Kandy', '2', '550', '450', '350');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `train_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `train_type` varchar(20) NOT NULL,
  `train_active_status` tinyint(1) NOT NULL,
  `train_travel_days` varchar(255) NOT NULL,
  `train_freights_allowed` tinyint(1) NOT NULL,
  `train_fc_seats` int(11) NOT NULL,
  `train_sc_seats` int(11) NOT NULL,
  `train_observation_seats` int(11) NOT NULL,
  `train_sleeping_berths` int(11) NOT NULL,
  `train_total_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`train_id`, `route_id`, `train_name`, `train_type`, `train_active_status`, `train_travel_days`, `train_freights_allowed`, `train_fc_seats`, `train_sc_seats`, `train_observation_seats`, `train_sleeping_berths`, `train_total_weight`) VALUES
(1, 1, 'Dakshina intercity', 'Intercity', 1, 'monday tuesday wednesday', 1, 50, 30, 1, 0, 70),
(2, 2, 'Dakshina Intercity', 'Intercity', 1, 'monday tuesday wednesday thursday friday saturday sunday', 0, 100, 30, 0, 0, 0),
(3, 3, 'Matara - Galle train', 'Slow', 1, 'monday tuesday wednesday thursday friday', 0, 0, 0, 0, 0, 0),
(4, 4, 'Podi Manike', 'Express', 1, 'monday tuesday wednesday tuesday friday saturday sunday', 1, 100, 50, 1, 30, 0),
(5, 5, 'Ruhunu Kumari', 'Express', 1, 'monday tuesday wednesday tuesday friday saturday sunday', 0, 0, 0, 0, 0, 0),
(13, 7, 'Sagarika', 'Express', 1, ' monday  tuesday  wednesday    ', 1, 0, 50, 0, 0, 45);

-- --------------------------------------------------------

--
-- Table structure for table `train_lines`
--

CREATE TABLE `train_lines` (
  `lines` int(11) NOT NULL,
  `line_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_lines`
--

INSERT INTO `train_lines` (`lines`, `line_name`) VALUES
(1, 'main line'),
(2, 'costal line');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `street_line1` varchar(255) NOT NULL,
  `street_line2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact_num` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_active_status` int(1) NOT NULL DEFAULT 1,
  `user_image` varchar(50) DEFAULT 'default',
  `ban_status` int(1) NOT NULL DEFAULT 0,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `password_reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `id`, `street_line1`, `street_line2`, `city`, `contact_num`, `email_id`, `user_password`, `user_role`, `user_active_status`, `user_image`, `ban_status`, `password_reset_token`, `password_reset_expires`) VALUES
('Gihan', 'Jayasuriya', 1, '1090 sri jayewardenepura road', 'Rajagiriya', 'Batticaloa', 778820019, 'gihan123@example.com', '$2y$10$ZX3Byb94KvGYO5l8fbmY3e07bYI.tyZDoHwOQAbGxJVPRO/VAMLbe', 'admin', 1, ' 606d30b4355aa3.54298835.jpg', 0, '4619e756dcf65c9b8802d9c02cbfca8040b3faf29be80c36ab4f49139f8ffdff', '2021-03-29 22:05:44'),
('Sugath', 'Weerarathna', 3, 'No.09', 'Devani rajasinghe mawatha', 'Gampaha', 782386161, 'ashikaabeysuriya@gmail.com', '$2y$10$XEZD/lwqMXddT2zxvN/NGuoR9wb.k80HMuxbpJRziuxA5gVR7qiD.', 'detailsProvider', 1, ' 60619ba2956ec9.53729037.jpg', 0, 'deebc67258fd8a8f192c5de71e18bd37f7a8ff15d74265a983df56d8a4870e7f', '2021-03-29 21:52:57'),
('Hasani', 'Nimeshikaaa', 4, '334 t b jayah mw', 'Colombo 10', 'Colombo', 718281767, 'hasani@example.com', '$2y$10$lLylYz2W8m66QNMwvgBQJuljWvrSQvH8b3epn1QambM0/KepXO0uK', 'user', 1, ' 60619bcd1f5887.64334356.jpg', 0, NULL, NULL),
('Yashodha', 'Madugalla', 5, '410/99, bullers rd', 'Matara', 'Matara', 782676285, 'yashodha@example.com', '$2y$10$Faxvj5zVIynxv6GwoIxO2uIhmBJGNExmnCL54p2gb8yUAgR7Kn.ka', 'detailsProvider', 1, ' 60621b2714fe76.84867553.jpg', 0, NULL, NULL),
('Maheshika', 'Bandaranaike', 6, 'No 53, moonamaldeniya', 'Kuliyapitiya', 'Kurunegala', 762291425, 'maheshika@example.com', '$2y$10$d2sjZh37Z/I9eqOcCUMcZuc1YM.OLEgbRpxt898OQp9HAXd2lqtFW', 'user', 1, ' 60619c247b4e72.29593592.jpg', 0, '768e79cd4b90779856d86e414685e5b36624af0fa2903d8cc99195dcc3c460ed', '2021-03-28 12:20:11'),
('Thakshala', 'Weerathunga', 7, '23, 5th floor', 'East low block,  wt colombo 01', 'Colombo', 782761010, 'thakshala@example.com', '$2y$10$D324yZKX7lGiL1bhSN6nLuhlP1uOG60XnpYYnSXyXzkUJ5ZcCfdum', 'user', 1, 'thakshala', 0, NULL, NULL),
('Dumindu', 'Walapala', 8, 'Boralassa road', 'Bandirippuwa, lunuwila', 'Monaragala', 774099697, 'dumindu@example.com', '$2y$10$p.RRy37gEtOVJ1w4/cU6qeLoExVfPevnFRFH1BPuYljsfZ.5rCAW2', 'user', 1, ' 60619c4d0eaee1.21978547.jpg', 0, NULL, NULL),
('Ashan', 'Shanaka', 9, '221/2, hendala road', 'Wattala', 'Colombo', 716634366, 'ashan@exmaple.com', '$2y$10$UXBg3HzybJBveJOIaeUK7uFhKXBuzaeqnL.mh1e40lrQNe0ncMZBC', 'user', 1, ' 60619c7c97ece7.34460404.jpg', 0, NULL, NULL),
('Melvin', 'Alexander', 10, '203/1, mathara road', 'Magalle', 'Galle', 755628000, 'melvin@exmaple.com', '$2y$10$553MKIUCU.5m/VheEMbPDOZT3VshyqGCq4XY0dwcc5ymuZV6.lEWm', 'admin', 1, ' 60619ca1ec7dd4.20711983.jpg', 0, NULL, NULL),
('Shanuka', 'Fernando', 11, '102/1a, dutugemunu street', 'Kohuwela', 'Colombo', 774303267, 'shanuka@example.com', '$2y$10$PLT7pXPSOjGOWCVJNeBAfOnZAL5tcsq3MqVx.9RfsvshnB4qbi8hy', 'detailsProvider', 1, 'shanuka', 0, NULL, NULL),
('Sampath', 'Kumara', 21, 'No 77, galwala para,', 'Kotahena', 'Ratnapura', 778178234, 'sampath@example.com', '$2y$10$byRwf7lkMdqLigYpuIcwyelOx7lj428/rf.Tt.8b8PCQEcexy31N.', 'admin', 1, 'default.jpg', 0, NULL, NULL),
('Steven', 'Smith', 22, '22/50,high level road', 'Nugegoda', 'Colombo', 719801732, 'stevensmith@example.com', '$2y$10$F1u6ZQm3ojOzDCxyO2.8uufoZFXNkU5IgfVsMBWgdMCOgDef99s9.', 'user', 1, 'default.jpg', 0, NULL, NULL),
('Sam', 'Samith', 24, '22/50, high level road', 'Nugegoda', 'Ampara', 718903456, 'samsamith@example.com', '$2y$10$VRNlLRbFlFhORwqaTC81ueZDT6gJ89MTXajugDnc7/3v8PXrjbcjm', 'user', 1, 'default.jpg', 0, NULL, NULL),
('Asindu', 'Chamika', 26, 'No 23,', 'Main street', 'Matara', 712389412, 'ashvg.dev@gmail.com', '$2y$10$TPlz63YxfN2O0dOa1G5vcOF0RayX20A7/4qfcXDwOTYCOj11ZWDu2', 'user', 1, 'default.jpg', 0, '9427e84d6a5f89abf554f1c0bd5794246264d6efe360ed4c0e90206cb83fe77c', '2021-03-30 00:47:09'),
('Ashika', 'Abeysuriya', 27, 'No 13 main road', 'Devinuwara', 'Ampara', 715634670, 'ashikaabeysuriya456@gmail.com', '$2y$10$Jsyx/cY3L/Ms0owYejS6UOt9zgXtR7T9u5/38vyCB5seOE8QFJuD.', 'user', 1, 'default.jpg', 0, NULL, NULL),
('Vfedr', 'Vfdv', 28, 'No 13, main road', 'Waththala', 'Ampara', 718281731, 'asdc456@example.com', '$2y$10$AosuKVv6pwxNBVuRORqAkey.Vi5AwQRsw7VItpeT8QDZzf5R2AQLm', 'user', 1, 'default.jpg', 0, NULL, NULL),
('Gvrev', 'Vreb', 29, 'Revwrfes', 'Evrfde', 'Ampara', 718902345, 'tvrebvtr456@gmail.com', '$2y$10$Yb1oBkGM8zUo0mplMug3S.8KeNsxJ.HnzMTvw9pOwf3UJQLif4uLO', 'user', 1, 'default.jpg', 0, NULL, NULL),
('Gvrev', 'Vreb', 30, 'Revwrfes', 'Evrfde', 'Ampara', 718902345, 'vdsv345@gmail.com', '$2y$10$W5YrXuJr0iIGgKJj.bJON.Xutnvi0RJrhSEifzqvMr4lQrhXNmt/e', 'user', 1, 'default.jpg', 0, NULL, NULL),
('Kasuni', 'Hatharasinghe', 31, 'No 13 namal road', 'Wariyapola', 'Kurunagala', 718902345, 'kasunihathrasinghe456@gmail.com', '$2y$10$cJivD2PHaAxKUksAzirOnO/JxWGb1Jku6fY/jzsXX36vLbG3N1PPS', 'admin', 1, 'default.jpg', 0, NULL, NULL),
('Cdvfddx', 'Vdsxvds', 32, 'No 12,chds bgfrb', 'Fd bfd fd', 'Matara', 718281731, 'ashik456@gmail.com', '$2y$10$i7hTXQQaKsz/2gKdLxBp2OUc3TzUlkI5A5mTVjFMdJ2UpeGDigPJG', 'detailsProvider', 1, 'default.jpg', 0, NULL, NULL),
('Dsv', 'Vdsfvds', 33, 'Fcewsv', 'Dvdvfdvfd', 'Ampara', 718281731, 'bgfb1321f@gmail.com', '$2y$10$CBffDBRSakG3U1aDjfVf8uQxkGTSpuavKklbe/Zgw91Iwc0gHEnt6', 'admin', 1, 'default.jpg', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `give_details`
--
ALTER TABLE `give_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`News_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `seat_availability`
--
ALTER TABLE `seat_availability`
  ADD PRIMARY KEY (`train_id`,`sa_date`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`route_id`,`station_id`);

--
-- Indexes for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `ticket_price`
--
ALTER TABLE `ticket_price`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`train_id`);

--
-- Indexes for table `train_lines`
--
ALTER TABLE `train_lines`
  ADD PRIMARY KEY (`lines`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `give_details`
--
ALTER TABLE `give_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `News_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `train_lines`
--
ALTER TABLE `train_lines`
  MODIFY `lines` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
