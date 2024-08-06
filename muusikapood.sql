-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 07:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muusikapood`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumid`
--

CREATE TABLE `albumid` (
  `id` int(11) NOT NULL,
  `artist` varchar(30) NOT NULL,
  `album` varchar(50) NOT NULL,
  `aasta` year(4) NOT NULL,
  `hind` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albumid`
--

INSERT INTO `albumid` (`id`, `artist`, `album`, `aasta`, `hind`) VALUES
(1, 'Diggi', 'Unexpected Arrival', '2013', 13.99),
(2, 'Chris Brown', 'Graffiti', '2009', 14.95),
(3, 'Alicia Keys', 'The Element of Freedom', '2009', 23.58),
(4, '50 Cent', 'Before I Self Destruct', '2009', 15.25),
(5, 'Jamelia', 'Collection', '2010', 7.99),
(6, 'Sodom', 'Epitome of Torture', '2013', 15.99),
(7, 'Bill Withers', 'Original Album Classics', '2013', 17.99),
(8, 'Coolio', 'Best of 2012', '2012', 6.99),
(9, 'Taio Cruz', 'Rokstar', '2010', 8.95),
(10, 'Cypress Hill', 'Rise Up', '2011', 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `arved`
--

CREATE TABLE `arved` (
  `id` int(11) NOT NULL,
  `arve_nr` int(6) NOT NULL,
  `albumid_id` int(3) NOT NULL,
  `kliendid_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arved`
--

INSERT INTO `arved` (`id`, `arve_nr`, `albumid_id`, `kliendid_id`) VALUES
(1, 123456, 1, 1),
(2, 654321, 2, 1),
(3, 234567, 3, 2),
(4, 985432, 7, 2),
(5, 745269, 125, 3),
(6, 651287, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kasutajad`
--

CREATE TABLE `kasutajad` (
  `id` int(6) NOT NULL,
  `kasutaja` varchar(16) NOT NULL,
  `parool` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasutajad`
--

INSERT INTO `kasutajad` (`id`, `kasutaja`, `parool`) VALUES
(1, 'admin', 'taFhmPMvTTbIM'),
(2, 'juku', 'taOsuIHa7NVow');

-- --------------------------------------------------------

--
-- Table structure for table `kliendid`
--

CREATE TABLE `kliendid` (
  `id` int(11) NOT NULL,
  `eesnimi` varchar(30) NOT NULL,
  `perenimi` varchar(30) NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kliendid`
--

INSERT INTO `kliendid` (`id`, `eesnimi`, `perenimi`, `telefon`) VALUES
(1, 'Isaac', 'Newton', 53482512),
(2, 'Werner', 'Ziegler', 53547988),
(3, 'Mihkel', 'Jordan', 53125662),
(4, 'Martin', 'Helmur', 51325335),
(5, 'Paul', 'Jalutaja', 53780321);

-- --------------------------------------------------------

--
-- Table structure for table `uudised`
--

CREATE TABLE `uudised` (
  `id` varchar(2) DEFAULT NULL,
  `tiitel` varchar(116) DEFAULT NULL,
  `uudis` varchar(277) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uudised`
--

INSERT INTO `uudised` (`id`, `tiitel`, `uudis`) VALUES
('1', 'Duis ac nibh.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.'),
('2', 'Donec posuere metus vitae ipsum.', 'Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci.'),
('3', 'In hac habitasse platea dictumst.', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.'),
('4', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.', 'Aliquam sit amet diam in magna bibendum imperdiet.'),
('5', 'Proin at turpis a pede posuere nonummy.', 'Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi.'),
('6', 'Vivamus in felis eu sapien cursus vestibulum.', 'Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.'),
('7', 'Donec ut mauris eget massa tempor convallis.', 'Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
('8', 'Etiam pretium iaculis justo.', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.'),
('9', 'Donec quis orci eget orci vehicula condimentum.', 'Fusce posuere felis sed lacus.'),
('10', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.'),
('11', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.'),
('12', 'In hac habitasse platea dictumst.', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.'),
('13', 'Nulla tellus.', 'Donec vitae nisi.'),
('14', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Nullam sit amet turpis elementum ligula vehicula consequat.'),
('15', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 'Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.'),
('16', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'Aliquam erat volutpat.'),
('17', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', 'Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi.'),
('18', 'Nulla facilisi.', 'Nulla tempus.'),
('19', 'Aenean fermentum.', 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.'),
('20', 'Nam tristique tortor eu pede.', 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.'),
('21', 'Mauris ullamcorper purus sit amet nulla.', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.'),
('22', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.'),
('23', 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.'),
('24', 'Pellentesque eget nunc.', 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.'),
('25', 'In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.'),
('26', 'Nulla ac enim.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend.'),
('27', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.'),
('28', 'Vestibulum rutrum rutrum neque.', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.'),
('29', 'Nam tristique tortor eu pede.', 'Maecenas pulvinar lobortis est.'),
('30', 'Aliquam quis turpis eget elit sodales scelerisque.', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumid`
--
ALTER TABLE `albumid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arved`
--
ALTER TABLE `arved`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `kasutajad`
--
ALTER TABLE `kasutajad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kliendid`
--
ALTER TABLE `kliendid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumid`
--
ALTER TABLE `albumid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `arved`
--
ALTER TABLE `arved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kasutajad`
--
ALTER TABLE `kasutajad`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kliendid`
--
ALTER TABLE `kliendid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
