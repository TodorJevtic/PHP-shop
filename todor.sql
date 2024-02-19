-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Sep 01, 2022 at 03:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todor`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_registracije` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `username`, `email`, `password`, `datum_registracije`) VALUES
(25, '', 'todor159', 'todorjevtic@gmail.com', 'fbabbb7384d880991d5ae96550fd2c3c', '2022-08-18 14:10:32'),
(26, '', 'todor', 'todorjevtic@gmail.com', '81c8d84022fcb2b140d57e49e18e7bc6', '2022-09-01 02:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `korpa_id` int(255) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(255) NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`korpa_id`, `naziv`, `cena`, `slika`, `quantity`) VALUES
(22, 'Demon Motorna testera 3ks', 9990, '1.png', 2),
(23, 'Villager bušilica', 4999, '2.png', 1),
(24, 'Stona lampa Clarke', 3499, '11.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbenica`
--

CREATE TABLE `porudzbenica` (
  `porudzbenica_id` int(255) NOT NULL,
  `ime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` int(15) NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opstina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacin_placanja` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukupno_proizvoda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukupna_cena` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porudzbenica`
--

INSERT INTO `porudzbenica` (`porudzbenica_id`, `ime`, `prezime`, `email`, `telefon`, `adresa`, `opstina`, `grad`, `nacin_placanja`, `ukupno_proizvoda`, `ukupna_cena`) VALUES
(23, '23', '123', 'todorjevtic@gmail.com', 645306268, 'Nemanjina 68', 'Koceljeva', 'Beograd', 'visa', 'Demon Motorna testera 3ks (2) , Villager bušilica (1) , Stona lampa Clarke (1) ', 28478),
(24, '51', '65561', 'todorjevtic@gmail.com', 95295189, '8747878', 'Koceljeva', 'Beograd', 'visa', 'Demon Motorna testera 3ks (2) , Villager bušilica (1) , Stona lampa Clarke (1) ', 28478),
(25, 'Todor', 'Jevtic', 'todorjevtic@gmail.com', 645306268, 'Nemanjina 68', 'Koceljeva', 'Beograd', 'visa', 'Demon Motorna testera 3ks (2) , Villager bušilica (1) , Stona lampa Clarke (1) ', 28478),
(26, 'Todor', 'Jevtic', 'todorjevtic@gmail.com', 645306268, 'Nemanjina 68', 'Koceljeva', 'Beograd', 'visa', 'Demon Motorna testera 3ks (2) , Villager bušilica (1) , Stona lampa Clarke (1) ', 28478),
(27, 'Todor', 'Jevtic', 'todorjevtic@gmail.com', 645306268, 'Nemanjina 68', 'Koceljeva', 'Koceljeva', 'visa', 'Demon Motorna testera 3ks (2) , Villager bušilica (1) , Stona lampa Clarke (1) ', 28478);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `proizvod_id` int(255) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(255) NOT NULL,
  `vrsta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvod_id`, `naziv`, `cena`, `vrsta`, `slika`) VALUES
(81, 'Demon Motorna testera 3ks', 9990, 'alati', '1.png'),
(82, 'Villager bušilica', 4999, 'alati', '2.png'),
(83, 'RIPPER set alata Gedora', 5490, 'alati', '3.png'),
(84, 'ProLineTech Kolica za alat', 14390, 'alati', '4.png'),
(85, 'Udarna bušilica Einhell', 5399, 'alati', '5.png'),
(86, 'Ugaona brusilica 125mm', 4000, 'alati', '6.png'),
(89, 'Stona lampa Clarke', 3499, 'rasveta', '11.png'),
(90, 'Plafonjera Sarini', 10999, 'rasveta', '12.png'),
(91, 'Zidna lampa Tris', 2499, 'rasveta', '13.png'),
(92, 'Sijalica LED 10W', 299, 'rasveta', '14.png'),
(93, 'SET Sijalica LED 6W', 599, 'rasveta', '15.png'),
(94, 'Sijalica LED 4W', 199, 'rasveta', '16.png'),
(95, 'VULCANO WC DASKA', 4950, 'sanitarija', '21.png'),
(96, 'VULCANO KONZ. BIDE', 9730, 'sanitarija', '22.png'),
(97, 'LAVABO JULIJA NOVA', 3595, 'sanitarija', '23.png'),
(98, 'SILVA SOLJA ZA MONOBLOK', 15950, 'sanitarija', '24.png'),
(99, 'WC SOLJA SEVA DUO', 4790, 'sanitarija', '25.png'),
(100, 'LAVABO SUBWAY', 20395, 'sanitarija', '26.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`korpa_id`);

--
-- Indexes for table `porudzbenica`
--
ALTER TABLE `porudzbenica`
  ADD PRIMARY KEY (`porudzbenica_id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `korpa_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `porudzbenica`
--
ALTER TABLE `porudzbenica`
  MODIFY `porudzbenica_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvod_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
