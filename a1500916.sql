-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16.12.2018 klo 19:09
-- Palvelimen versio: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a1500916`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `ilmoitus`
--
create database a1500916;
use a1500916;


CREATE TABLE `ilmoitus` (
  `id` int(10) UNSIGNED NOT NULL,
  `rekkari` varchar(7) NOT NULL,
  `aika` varchar(5) NOT NULL,
  `paivamaara` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kommentti` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `ilmoitus`
--

INSERT INTO `ilmoitus` (`id`, `rekkari`, `aika`, `paivamaara`, `email`, `kommentti`) VALUES
(4, 'ATI-864', '10:30', '15.01.2019', 'kalle.maenpaa@gmail.com', 'Öljyletku vuotaa'),
(5, 'ABC-123', '08:30', '31.12.2018', 'pekka.kujala@gmail.com', 'Mulla on autonvanne hajonnut'),
(27, 'Khg-767', '12:00', '30.12.2018', 'janne.peltonen@gmail.com', 'Moikka! Iskarit Menny Autosta Hajalle Ja Tarvisin Uudet Tilalle.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ilmoitus`
--
ALTER TABLE `ilmoitus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ilmoitus`
--
ALTER TABLE `ilmoitus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
