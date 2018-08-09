-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 03:01 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scenery`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandara`
--

CREATE TABLE `bandara` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL,
  `fs9` text NOT NULL,
  `fsx` text NOT NULL,
  `p3d` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bandara`
--

INSERT INTO `bandara` (`id`, `nama`, `lat`, `lon`, `fs9`, `fsx`, `p3d`) VALUES
(1, 'Soekarno-Hatta Intl', '-6.127528', '106.653706', '<a href=\"#\">Download</a> | <a href=\"#\">Mirror</a> | <a href=\"#\">Mirror 2</a>', '<a href=\"#\">Download</a> | <a href=\"#\">Mirror</a> | <a href=\"#\">Mirror 2</a>', '<a href=\"#\">Download</a> | <a href=\"#\">Mirror</a> | <a href=\"#\">Mirror 2</a>'),
(2, 'Juanda Intl', '-7.378033800313758', '112.78780398413073', '<a href=\"ea\">Download</a> | <a href=\"#\">Mirror</a> | <a href=\"#\">Mirror 2</a>', '<a href=\"ea\">Download</a> | <a href=\"#\">Mirror</a> | <a href=\"#\">Mirror 2</a>', '<a href=\"ea\">Download</a> | <a href=\"#\">Mirror</a> | <a href=\"#\">Mirror 2</a>');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `surel` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `surel`, `password`) VALUES
(1, 'Rafi', 'admin@example.com', '$2y$10$eQtohKS.td8z6ETqxWbbUu.3KY0lZFQzzzfu6lsVjwrVZEIe7VF..');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandara`
--
ALTER TABLE `bandara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
