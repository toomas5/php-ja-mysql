-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 07:04 PM
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
-- Database: `soogikoht`
--

-- --------------------------------------------------------

--
-- Table structure for table `hinnangud`
--

CREATE TABLE `hinnangud` (
  `id` int(6) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `hinnang` int(3) NOT NULL,
  `kommentar` varchar(255) NOT NULL,
  `koht_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinnangud`
--

INSERT INTO `hinnangud` (`id`, `nimi`, `hinnang`, `kommentar`, `koht_id`) VALUES
(1, 'Albert', 3, 'libero rutrum ac lobortis vel dapibus at diam nam tristique tortor eu', 11),
(2, 'Agnes', 3, 'blandit ultrices enim lorem ipsum dolor sit amet consectetuer', 14),
(3, 'Urmas', 9, 'maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem', 84),
(4, 'Andres', 4, 'at nulla suspendisse potenti', 23),
(5, 'Ruti', 3, 'libero ut massa volutpat convallis morbi odio odio elementum eu', 51),
(6, 'Liisbet', 9, 'nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis', 52),
(7, 'Liina', 6, 'in tempus sit amet sem fusce consequat nulla nisl nunc', 1),
(8, 'Reet', 6, 'pede libero quis orci nullam molestie nibh', 17),
(9, 'Kristi', 5, 'posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis', 100),
(10, 'Urmas', 4, 'leo odio porttitor', 67),
(11, 'Liana', 10, 'at ipsum ac tellus semper interdum mauris ullamcorper purus', 78),
(12, 'Karoliina', 10, 'id nisl venenatis lacinia aenean sit amet', 98),
(13, 'Liana', 10, 'ullamcorper augue a suscipit nulla elit ac', 7),
(14, 'Agnes', 2, 'convallis eget eleifend luctus ultricies eu nibh quisque id justo', 92),
(15, 'Ingrid', 10, 'in lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper', 43),
(16, 'Mikk', 4, 'elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget semper', 82),
(17, 'Kaja', 4, 'luctus nec molestie sed justo pellentesque', 53),
(18, 'Raivo', 6, 'aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper', 70),
(19, 'Karoliina', 1, 'cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac', 76),
(20, 'Kadi', 7, 'tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer', 7),
(21, 'Vallo', 5, 'in est risus auctor sed', 68),
(22, 'Erik', 1, 'venenatis non sodales sed tincidunt', 16),
(23, 'Aidi', 1, 'tortor duis mattis egestas', 45),
(24, 'Anu', 7, 'orci pede venenatis non sodales sed tincidunt eu', 46),
(25, 'Sigrid', 2, 'nulla nunc purus', 72),
(26, 'Anu', 2, 'eget orci vehicula condimentum curabitur in', 9),
(27, 'Villem', 10, 'pede ac diam cras pellentesque volutpat dui maecenas tristique est et', 71),
(28, 'Jaan', 9, 'fusce lacus purus', 18),
(29, 'Sille', 2, 'in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl', 14),
(30, 'Karoliina', 1, 'pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien', 80),
(31, 'Evelin', 9, 'posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices', 35),
(32, 'Sigrid', 4, 'nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend', 67),
(33, 'Toivo', 3, 'hendrerit at vulputate', 56),
(34, 'Elmar', 9, 'lobortis sapien sapien non mi integer', 77),
(35, 'Anna', 6, 'mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel', 53),
(36, 'Ott', 10, 'montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis', 56),
(37, 'Kaja', 6, 'pellentesque at nulla suspendisse', 71),
(38, 'Reet', 8, 'sed nisl nunc', 94),
(39, 'Liis', 8, 'in felis donec semper', 87),
(40, 'Mari', 3, 'sed magna at nunc commodo', 98),
(41, 'Karoliina', 1, 'vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris', 86),
(42, 'Eloise', 4, 'neque aenean auctor gravida sem', 26),
(43, 'Karel', 5, 'vestibulum vestibulum ante ipsum primis in faucibus', 44),
(44, 'Markus', 4, 'laoreet ut rhoncus aliquet pulvinar sed nisl', 32),
(45, 'Vallo', 1, 'hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis', 88),
(46, 'Ott', 8, 'erat vestibulum sed magna at nunc commodo placerat praesent blandit', 100),
(47, 'Ingrid', 3, 'nullam porttitor lacus at turpis donec posuere', 60),
(48, 'Eloise', 10, 'nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer', 86),
(49, 'Argo', 7, 'dapibus duis at velit eu est congue', 92),
(50, 'Rainer', 9, 'nunc donec quis orci eget orci vehicula condimentum', 13),
(51, 'Anna', 1, 'odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac', 92),
(52, 'Erik', 6, 'phasellus in felis donec semper sapien a libero nam', 40),
(53, 'Kertu', 9, 'vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci', 84),
(54, 'Markus', 9, 'placerat praesent blandit nam nulla integer', 81),
(55, 'Liisbet', 10, 'etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam', 84),
(56, 'Mari', 6, 'erat vestibulum sed magna at nunc commodo placerat praesent blandit', 42),
(57, 'Aime', 2, 'aliquam augue quam sollicitudin vitae consectetuer eget rutrum', 29),
(58, 'Kaia', 7, 'condimentum neque sapien placerat ante nulla justo aliquam', 8),
(59, 'Marko', 7, 'adipiscing lorem vitae mattis', 76),
(60, 'Kaia', 1, 'id nisl venenatis lacinia aenean', 23),
(61, 'Väino', 6, 'metus arcu adipiscing molestie', 21),
(62, 'Mari', 5, 'pulvinar lobortis est', 43),
(63, 'Eike', 10, 'mauris enim leo rhoncus sed vestibulum sit', 16),
(64, 'Tarmo', 6, 'vel dapibus at diam nam', 66),
(65, 'Sander', 3, 'nisl ut volutpat sapien arcu sed augue', 36),
(66, 'Liina', 10, 'tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac', 53),
(67, 'Heleri', 7, 'duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede', 12),
(68, 'Agnes', 10, 'arcu sed augue aliquam erat volutpat in congue etiam justo', 42),
(69, 'Laura', 10, 'dui nec nisi volutpat eleifend donec', 76),
(70, 'Anneliis', 4, 'cursus id turpis integer aliquet massa id lobortis convallis tortor risus', 45),
(71, 'Annika', 2, 'aliquet at feugiat non pretium quis lectus', 75),
(72, 'Kristi', 10, 'donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper', 52),
(73, 'Väino', 1, 'est risus auctor sed tristique in tempus sit amet sem fusce', 74),
(74, 'Markus', 1, 'ut massa volutpat convallis morbi odio odio elementum eu', 82),
(75, 'Priit', 2, 'amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis', 14),
(76, 'Einar', 9, 'suspendisse potenti cras', 6),
(77, 'Tanel', 4, 'nulla neque libero convallis eget eleifend luctus', 75),
(78, 'Martti', 1, 'suscipit a feugiat', 25),
(79, 'Peeter', 1, 'faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend', 100),
(80, 'Vallo', 1, 'primis in faucibus orci luctus et ultrices posuere cubilia curae', 25),
(81, 'Allan', 7, 'montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor', 52),
(82, 'Helmi', 5, 'amet justo morbi ut odio cras mi', 22),
(83, 'Riin', 2, 'volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac', 44),
(84, 'Merle', 4, 'vestibulum velit id pretium', 85),
(85, 'Ülle', 5, 'nullam orci pede venenatis non sodales sed tincidunt eu felis', 53),
(86, 'Argo', 10, 'vulputate nonummy maecenas tincidunt lacus at velit', 49),
(87, 'Tarmo', 5, 'proin at turpis a pede posuere nonummy integer non velit donec diam', 82),
(88, 'Liana', 8, 'dapibus dolor vel est donec odio justo sollicitudin ut suscipit', 33),
(89, 'Markus', 3, 'sed vel enim sit', 8),
(90, 'Liina', 1, 'vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget', 34),
(91, 'Madis', 8, 'sed vestibulum sit', 83),
(92, 'Rainer', 9, 'dui nec nisi volutpat eleifend donec ut', 14),
(93, 'Ülle', 1, 'erat quisque erat eros viverra', 4),
(94, 'Kaja', 1, 'amet eleifend pede libero quis orci nullam molestie nibh in lectus', 20),
(95, 'Nele', 6, 'odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue', 81),
(96, 'Albert', 7, 'curabitur at ipsum', 43),
(97, 'Aidi', 3, 'suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas', 9),
(98, 'Asta', 8, 'nibh ligula nec sem duis aliquam convallis nunc proin at turpis', 37),
(99, 'Mari', 5, 'nec molestie sed', 18),
(100, 'Ilona', 2, 'aenean sit amet justo morbi ut odio', 25);

-- --------------------------------------------------------

--
-- Table structure for table `kasutajad`
--

CREATE TABLE `kasutajad` (
  `id` int(6) NOT NULL,
  `kasutaja` varchar(255) NOT NULL,
  `parool` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasutajad`
--

INSERT INTO `kasutajad` (`id`, `kasutaja`, `parool`) VALUES
(1, 'admin', 'taFhmPMvTTbIM'),
(2, 'toomas', 'parool');

-- --------------------------------------------------------

--
-- Table structure for table `kohad`
--

CREATE TABLE `kohad` (
  `id` int(255) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `asukoht` varchar(255) NOT NULL,
  `hinnekesk` float NOT NULL,
  `hinnearv` int(255) NOT NULL,
  `tyyp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kohad`
--

INSERT INTO `kohad` (`id`, `nimi`, `asukoht`, `hinnekesk`, `hinnearv`, `tyyp`) VALUES
(1, 'Thule', 'Viljandi', 6, 1, 'hotell'),
(2, 'Tallinna Restoran', 'Kärdla', 0, 0, 'pood'),
(3, 'Kaks Kokka', 'Kunda', 0, 0, 'soogikoht'),
(4, 'Taimi', 'Haapsalu', 1, 1, 'motell'),
(5, 'Chopsticks', 'Räpina', 0, 0, 'soogikoht'),
(6, 'F-Hoone', 'Paide', 9, 1, 'motell'),
(7, 'Thule', 'Tamsalu', 8.5, 2, 'pood'),
(8, 'El Toro', 'Narva', 5, 2, 'pood'),
(9, 'Tallinna Restoran', 'Kohtla-Järve', 2.5, 2, 'soogikoht'),
(10, 'Von Krahl', 'Haapsalu', 0, 0, 'soogikoht'),
(11, 'Paju', 'Haapsalu', 3, 1, 'hotell'),
(12, 'Nop', 'Kiviõli', 7, 1, 'hostel'),
(13, 'Vanaema Juures', 'Kohtla-Järve', 9, 1, 'pood'),
(14, 'Illegaard', 'Jõgeva', 4, 4, 'soogikoht'),
(15, 'Lendav Taldrik', 'Kiviõli', 0, 0, 'pood'),
(16, 'Hõlm', 'Elva', 5.5, 2, 'motell'),
(17, 'Hõlm', 'Lihula', 6, 1, 'hostel'),
(18, 'Hermes', 'Tamsalu', 7, 2, 'motell'),
(19, 'Hesburger', 'Põlva', 0, 0, 'soogikoht'),
(20, 'Thule', 'Võhma', 1, 1, 'motell'),
(21, 'Montalcino', 'Paide', 6, 1, 'motell'),
(22, 'Hermann.', 'Võru', 5, 1, 'hotell'),
(23, 'Illegaard', 'Viljandi', 2.5, 2, 'pood'),
(24, 'Hesburger', 'Maardu', 0, 0, 'pood'),
(25, 'Chopsticks', 'Loksa', 1.3, 3, 'motell'),
(26, 'Kaks Kokka', 'Mõisaküla', 4, 1, 'pood'),
(27, 'Hõlm', 'Türi', 0, 0, 'hostel'),
(28, 'Tallinna Restoran', 'Narva', 0, 0, 'hotell'),
(29, 'Paju', 'Kehra', 2, 1, 'hostel'),
(30, 'Manna La Roosa', 'Tartu', 0, 0, 'soogikoht'),
(31, 'Taimi', 'Kallaste', 0, 0, 'motell'),
(32, 'McDonalds', 'Sindi', 4, 1, 'hostel'),
(33, 'Kaks Kokka', 'Paide', 8, 1, 'soogikoht'),
(34, 'Tervise Paradiis', 'Paide', 1, 1, 'hotell'),
(35, 'Illegaard', 'Kallaste', 9, 1, 'hostel'),
(36, 'Lendav Taldrik', 'Suure-Jaani', 3, 1, 'hotell'),
(37, 'Tallinna Restoran', 'Viljandi', 8, 1, 'hostel'),
(38, 'R13', 'Võru', 0, 0, 'soogikoht'),
(39, 'Montalcino', 'Kunda', 0, 0, 'pood'),
(40, 'Rimi Restaurant', 'Mõisaküla', 6, 1, 'soogikoht'),
(41, 'Tuljak', 'Mõisaküla', 0, 0, 'soogikoht'),
(42, 'Senso', 'Rakvere', 8, 2, 'hotell'),
(43, 'Nop', 'Pärnu', 7.3, 3, 'motell'),
(44, 'Von Krahl', 'Loksa', 3.5, 2, 'motell'),
(45, 'Sandro', 'Tallinn', 2.5, 2, 'pood'),
(46, 'Peppersack', 'Saue', 7, 1, 'hostel'),
(47, 'Hõlm', 'Mõisaküla', 0, 0, 'soogikoht'),
(48, 'McDonalds', 'Viljandi', 0, 0, 'hotell'),
(49, 'Chedi', 'Püssi', 10, 1, 'hostel'),
(50, 'Hesburger', 'Kiviõli', 0, 0, 'hotell'),
(51, 'Kuldse Kaur', 'Antsla', 3, 1, 'hotell'),
(52, 'Kaks Kokka', 'Kehra', 8.7, 3, 'motell'),
(53, 'Thule', 'Pärnu', 6.3, 4, 'hotell'),
(54, 'Tuljak', 'Lihula', 0, 0, 'hostel'),
(55, 'Hõlm', 'Rakvere', 0, 0, 'hotell'),
(56, 'Vanaema Juures', 'Mõisaküla', 6.5, 2, 'motell'),
(57, 'McDonalds', 'Püssi', 0, 0, 'hotell'),
(58, 'Hermann.', 'Paldiski', 0, 0, 'hotell'),
(59, 'Tuljak', 'Türi', 0, 0, 'pood'),
(60, 'Manna La Roosa', 'Paldiski', 3, 1, 'hostel'),
(61, 'El Toro', 'Elva', 0, 0, 'hostel'),
(62, 'Sandro', 'Haapsalu', 0, 0, 'hostel'),
(63, 'Tuljak', 'Mõisaküla', 0, 0, 'hostel'),
(64, 'Paju', 'Kallaste', 0, 0, 'hotell'),
(65, 'Montalcino', 'Kohtla-Järve', 0, 0, 'pood'),
(66, 'Rimi Restaurant', 'Kilingi-Nõmme', 6, 1, 'pood'),
(67, 'Chopsticks', 'Karksi-Nuia', 4, 2, 'motell'),
(68, 'Hermes', 'Sillamäe', 5, 1, 'soogikoht'),
(69, 'F-Hoone', 'Tartu', 0, 0, 'hostel'),
(70, 'Nop', 'Sillamäe', 6, 1, 'hotell'),
(71, 'Von Krahl', 'Haapsalu', 8, 2, 'pood'),
(72, 'Tuljak', 'Võhma', 2, 1, 'soogikoht'),
(73, 'Nop', 'Põltsamaa', 0, 0, 'pood'),
(74, 'Tuljak', 'Tartu', 1, 1, 'pood'),
(75, 'Tallinna Restoran', 'Valga', 3, 2, 'hotell'),
(76, 'Chopsticks', 'Kallaste', 6, 3, 'hotell'),
(77, 'Lendav Taldrik', 'Otepää', 9, 1, 'hostel'),
(78, 'Hermes', 'Valga', 10, 1, 'hostel'),
(79, 'Thule', 'Haapsalu', 0, 0, 'motell'),
(80, 'Senso', 'Elva', 1, 1, 'pood'),
(81, 'Taimi', 'Kuressaare', 7.5, 2, 'hotell'),
(82, 'Hesburger', 'Tamsalu', 3.3, 3, 'soogikoht'),
(83, 'Hermann.', 'Tapa', 8, 1, 'pood'),
(84, 'Chopsticks', 'Suure-Jaani', 9.3, 3, 'hotell'),
(85, 'Senso', 'Tamsalu', 4, 1, 'motell'),
(86, 'Sandro', 'Püssi', 5.5, 2, 'soogikoht'),
(87, 'Hermann.', 'Tõrva', 8, 1, 'soogikoht'),
(88, 'Montalcino', 'Tapa', 1, 1, 'soogikoht'),
(89, 'Lendav Taldrik', 'Pärnu', 0, 0, 'hotell'),
(90, 'R13', 'Sindi', 0, 0, 'hotell'),
(91, 'Tervise Paradiis', 'Antsla', 0, 0, 'motell'),
(92, 'Manna La Roosa', 'Valga', 3.3, 3, 'hostel'),
(93, 'Nop', 'Mõisaküla', 0, 0, 'hostel'),
(94, 'Hesburger', 'Elva', 8, 1, 'pood'),
(95, 'R13', 'Tamsalu', 0, 0, 'hostel'),
(96, 'Kaks Kokka', 'Narva', 0, 0, 'pood'),
(97, 'Ihaste', 'Jõhvi', 0, 0, 'hostel'),
(98, 'Ihaste', 'Haapsalu', 6.5, 2, 'pood'),
(99, 'F-Hoone', 'Tallinn', 0, 0, 'hotell'),
(100, 'Sandro', 'Narva', 4.7, 3, 'hotell');

-- --------------------------------------------------------

--
-- Table structure for table `tyybid`
--

CREATE TABLE `tyybid` (
  `id` int(6) NOT NULL,
  `tyyp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tyybid`
--

INSERT INTO `tyybid` (`id`, `tyyp`) VALUES
(1, 'soogikoht'),
(2, 'pood'),
(3, 'motell'),
(4, 'hotell'),
(5, 'hostel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hinnangud`
--
ALTER TABLE `hinnangud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasutajad`
--
ALTER TABLE `kasutajad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kohad`
--
ALTER TABLE `kohad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyybid`
--
ALTER TABLE `tyybid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hinnangud`
--
ALTER TABLE `hinnangud`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `kasutajad`
--
ALTER TABLE `kasutajad`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kohad`
--
ALTER TABLE `kohad`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tyybid`
--
ALTER TABLE `tyybid`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
