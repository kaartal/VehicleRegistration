-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 06:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrv`
--

-- --------------------------------------------------------

--
-- Table structure for table `osoba`
--

CREATE TABLE `osoba` (
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `jmbg` varchar(13) NOT NULL,
  `mjesto_stanovanja` varchar(100) DEFAULT NULL,
  `mjesto_rodjenja` varchar(100) DEFAULT NULL,
  `datum_rodjenja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osoba`
--

INSERT INTO `osoba` (`ime`, `prezime`, `jmbg`, `mjesto_stanovanja`, `mjesto_rodjenja`, `datum_rodjenja`) VALUES
('Jusuf', 'Salkanović', '3839839294857', 'Tuzla', 'Tuzla', '2003-07-05'),
('Muamer', 'Rakman', '432087504838', 'Tešanj', 'Tešanj', '2003-12-23'),
('Halid', 'Kartal', '432324324', 'Tuzla', 'Tuzla', '2000-04-02'),
('Dženan', 'Bristrić', '432354645', 'Tuzla', 'Tuzla', '2003-03-04'),
('Muamer', 'Rakman', '4382743284320', 'Tešanj', 'Tešanj', '2003-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(11) NOT NULL,
  `datum_registracije` date NOT NULL,
  `datum_isteka_registracije` date NOT NULL,
  `status_registracije` enum('aktivan','istekao','otkazan') NOT NULL,
  `vozilo_broj_sasije` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `datum_registracije`, `datum_isteka_registracije`, `status_registracije`, `vozilo_broj_sasije`) VALUES
(21, '2024-06-05', '2025-06-05', 'aktivan', '472G838JSOEO'),
(23, '2024-07-05', '2025-07-05', 'aktivan', '2198321321'),
(24, '2024-07-05', '2025-07-05', 'aktivan', '2194432'),
(25, '2024-07-05', '2025-07-05', 'aktivan', 'ISDAPIPSADJ');

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `broj_sasije` varchar(20) NOT NULL,
  `marka` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `godina_proizvodnje` int(11) DEFAULT NULL,
  `registarske_oznake` varchar(20) DEFAULT NULL,
  `cijena_registracije` decimal(10,2) DEFAULT NULL,
  `ime_vlasnika` varchar(100) DEFAULT NULL,
  `jmbg_vlasnika` varchar(13) DEFAULT NULL,
  `prezime_vlasnika` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`broj_sasije`, `marka`, `model`, `godina_proizvodnje`, `registarske_oznake`, `cijena_registracije`, `ime_vlasnika`, `jmbg_vlasnika`, `prezime_vlasnika`) VALUES
('2194432', 'Peugeot', '307', 2002, 'R46-F-G7O', 472.00, 'Halid', '432324324', 'Kartal'),
('2198321321', 'Volkswagen', 'Golf', 2012, 'R46-F-G7O', 472.00, 'Dženan', '432354645', 'Bristrić'),
('472G838JSOEO', 'Seat', 'Leon', 2008, 'EL7-M-M3L', 432.00, 'Jusuf', '3839839294857', 'Salkanović'),
('ISDAPIPSADJ', 'Volkswagen', 'Pasat', 2012, 'E75-G-S39', 432.00, 'Muamer', '4382743284320', 'Rakman');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_vozila`
--

CREATE TABLE `vrsta_vozila` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vrsta_vozila`
--

INSERT INTO `vrsta_vozila` (`id`, `naziv`, `opis`) VALUES
(20, 'Putnicki', 'Dobar'),
(21, 'Putnicki', 'Crveni'),
(22, 'Putnicki', 'Sivi'),
(23, 'Putnicki', 'Lav'),
(24, 'Putnicki', 'Crveni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`jmbg`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registracija_ibfk_1` (`vozilo_broj_sasije`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`broj_sasije`),
  ADD KEY `vozilo_ibfk_1` (`jmbg_vlasnika`);

--
-- Indexes for table `vrsta_vozila`
--
ALTER TABLE `vrsta_vozila`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vrsta_vozila`
--
ALTER TABLE `vrsta_vozila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registracija`
--
ALTER TABLE `registracija`
  ADD CONSTRAINT `registracija_ibfk_1` FOREIGN KEY (`vozilo_broj_sasije`) REFERENCES `vozilo` (`broj_sasije`) ON DELETE CASCADE;

--
-- Constraints for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD CONSTRAINT `novi_vozilo_ibfk` FOREIGN KEY (`jmbg_vlasnika`) REFERENCES `osoba` (`jmbg`) ON DELETE CASCADE,
  ADD CONSTRAINT `vozilo_ibfk_1` FOREIGN KEY (`jmbg_vlasnika`) REFERENCES `osoba` (`jmbg`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
