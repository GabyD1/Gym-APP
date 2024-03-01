-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:11 PM
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
-- Database: `salafitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajat`
--

CREATE TABLE `angajat` (
  `angajatid` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `telefon` int(10) NOT NULL,
  `titlu` varchar(20) NOT NULL,
  `adresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angajat`
--

INSERT INTO `angajat` (`angajatid`, `nume`, `prenume`, `telefon`, `titlu`, `adresa`) VALUES
(1, 'Cristian', 'Marin', 745542322, 'Casier', 'Veteranilor'),
(2, 'Mircea', 'Ionut', 745222323, 'AngajatOrdine', 'Veteranilor'),
(3, 'Ionela', 'Maria', 71237216, 'Casier', 'Mihalache'),
(4, 'George', 'Ionascu', 8382732, 'AngajatOrdine', 'MirceaVoda'),
(5, 'George', 'Matei', 83721837, 'Antrenor', 'Virtutii'),
(6, 'Enache', 'Cristian', 745542322, 'Antrenor', 'Tineretului'),
(7, 'Maria', 'Georgiana', 56178567, 'Antrenor', 'Pedunctului'),
(8, 'Claudiu', 'Valentin', 762467, 'AngajatOrdine', 'Ionascu'),
(9, 'David', 'Ioan', 123672781, 'AngajatOrdine', 'Mosilor'),
(10, 'Mircea', 'Matei', 8382732, 'AngajatOrdine', 'MirceaVoda'),
(11, 'Andreea', 'Marin', 2382134, 'AngajatOrdine', 'Mihalache');

-- --------------------------------------------------------

--
-- Table structure for table `angajatteritorii`
--

CREATE TABLE `angajatteritorii` (
  `angajatid` int(11) DEFAULT NULL,
  `teritoriiid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angajatteritorii`
--

INSERT INTO `angajatteritorii` (`angajatid`, `teritoriiid`) VALUES
(1, 1),
(1, 9),
(2, 2),
(3, 9),
(4, 5),
(5, 4),
(6, 6),
(7, 3),
(8, 3),
(9, 7),
(10, 4),
(11, 6),
(3, 9),
(6, 4),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `categorieID` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `descriere` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`categorieID`, `nume`, `descriere`) VALUES
(1, 'Creatina', 'Buna pentru intarirea articulatiilor'),
(2, 'Proteine', 'Foarte bun pentru a pune masa musculara'),
(3, 'Aminoacizi', 'Ajuta la vindecarea si stabilizarea muschilor'),
(4, 'Articole sportive', 'Imbracaminte'),
(5, 'Greutati', 'Greutati de la 0-50 kg.'),
(6, 'Sup', 'AA'),
(7, 'X', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) DEFAULT NULL,
  `telefon` int(10) DEFAULT NULL,
  `adresa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `nume`, `prenume`, `telefon`, `adresa`) VALUES
(1, 'Ionel', 'Andrei', 756910270, 'Ion Roata'),
(2, 'Cosmin', 'Matie', 74322198, 'Politehnica'),
(3, 'Mircea', 'Andrei', 756888189, 'Tineretului63'),
(4, 'Tanase', 'Denis', 756910270, 'Poli'),
(5, 'Alex', 'Maimascu', 123123, 'Cuza2'),
(6, 'Mihai', 'Enache', 7655123, 'Ionroata'),
(19, 'Cristina', 'Ivone', 378216732, 'Adresa');

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

CREATE TABLE `comanda` (
  `comandaid` int(11) NOT NULL,
  `clientid` int(11) DEFAULT NULL,
  `angajatid` int(11) DEFAULT NULL,
  `dataa` date DEFAULT NULL,
  `adresa` varchar(20) DEFAULT NULL,
  `pret` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comanda`
--

INSERT INTO `comanda` (`comandaid`, `clientid`, `angajatid`, `dataa`, `adresa`, `pret`) VALUES
(1, 1, 1, '2023-10-12', 'Virtutii', 199),
(2, 5, 11, '2024-01-19', 'Virtutii', 500),
(3, 3, 4, '2024-03-22', 'MirceaVoda', 188),
(4, 4, 10, '2023-11-14', 'Mosilor', 1888),
(5, 6, 6, '2023-10-12', 'Mihalache', 233),
(6, 4, 4, '2023-10-12', 'Mosilor', 199),
(7, 5, 4, '2023-10-12', 'Tineretului', 95);

-- --------------------------------------------------------

--
-- Table structure for table `c_detalii`
--

CREATE TABLE `c_detalii` (
  `produsid` int(11) DEFAULT NULL,
  `comandaid` int(11) DEFAULT NULL,
  `pret` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL,
  `reducere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_detalii`
--

INSERT INTO `c_detalii` (`produsid`, `comandaid`, `pret`, `cantitate`, `reducere`) VALUES
(6, 4, 223, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `distribuitor`
--

CREATE TABLE `distribuitor` (
  `distribuitorID` int(11) NOT NULL,
  `companie` varchar(20) NOT NULL,
  `nume_contact` varchar(20) NOT NULL,
  `nr_tel` int(10) NOT NULL,
  `oras` varchar(20) NOT NULL,
  `adresa` varchar(20) NOT NULL,
  `cod_postal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distribuitor`
--

INSERT INTO `distribuitor` (`distribuitorID`, `companie`, `nume_contact`, `nr_tel`, `oras`, `adresa`, `cod_postal`) VALUES
(1, 'GymBeam', 'IonAndrei', 756910277, 'Timisoara', 'Virtutii', 321312),
(2, 'OptimumNutrition', 'MariusMircea', 76922277, 'Galati', 'Mosilor', 22123),
(3, 'Shark', 'MihaiAndrei', 7562399, 'Bucuresti', 'Cuza2', 77123),
(4, 'GymRAT', 'AndreiMircea', 7457899, 'iasi', 'Virtutii', 21323),
(5, 'X', 'X', 0, 'X', 'X', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `produsID` int(11) NOT NULL,
  `distribuitorID` int(11) DEFAULT NULL,
  `categorieID` int(11) DEFAULT NULL,
  `nume_prod` varchar(20) NOT NULL,
  `nr_bucati` varchar(20) NOT NULL,
  `pret` int(5) NOT NULL,
  `BucatiInStoc` int(3) NOT NULL,
  `BucatiComandate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`produsID`, `distribuitorID`, `categorieID`, `nume_prod`, `nr_bucati`, `pret`, `BucatiInStoc`, `BucatiComandate`) VALUES
(1, 1, 1, 'CreatinaOmogenizata', '32', 95, 22, 10),
(2, 1, 1, 'Creatina++', '122', 81, 99, 23),
(3, 1, 2, 'Power+', '52', 183, 20, 32),
(4, 2, 2, 'ProteinaOptimum', '64', 233, 10, 54),
(5, 2, 2, 'Opti+', '200', 199, 180, 19),
(6, 2, 3, 'AminoEssentials', '50', 55, 30, 20),
(7, 1, 4, 'GeacaSport', '16', 300, 16, 0),
(8, 1, 5, 'Discuri5kg', '100', 67, 55, 45),
(9, 2, 4, 'PantofiAlergat', '30', 259, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teritorii`
--

CREATE TABLE `teritorii` (
  `teritoriiid` int(11) NOT NULL,
  `descriere` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teritorii`
--

INSERT INTO `teritorii` (`teritoriiid`, `descriere`) VALUES
(1, 'Receptie'),
(2, 'Vestiar'),
(3, 'Yoga'),
(4, 'PowerLift'),
(5, 'Sauna'),
(6, 'Karate'),
(7, 'Box'),
(9, 'Casierie'),
(10, 'Depozit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'gabriel', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajat`
--
ALTER TABLE `angajat`
  ADD PRIMARY KEY (`angajatid`);

--
-- Indexes for table `angajatteritorii`
--
ALTER TABLE `angajatteritorii`
  ADD KEY `angajatid` (`angajatid`),
  ADD KEY `teritoriiid` (`teritoriiid`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorieID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`comandaid`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `angajatid` (`angajatid`);

--
-- Indexes for table `c_detalii`
--
ALTER TABLE `c_detalii`
  ADD KEY `produsid` (`produsid`),
  ADD KEY `comandaid` (`comandaid`);

--
-- Indexes for table `distribuitor`
--
ALTER TABLE `distribuitor`
  ADD PRIMARY KEY (`distribuitorID`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`produsID`),
  ADD KEY `distribuitorID` (`distribuitorID`),
  ADD KEY `produse_ibfk_2` (`categorieID`);

--
-- Indexes for table `teritorii`
--
ALTER TABLE `teritorii`
  ADD PRIMARY KEY (`teritoriiid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angajat`
--
ALTER TABLE `angajat`
  MODIFY `angajatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `comandaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distribuitor`
--
ALTER TABLE `distribuitor`
  MODIFY `distribuitorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `produsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teritorii`
--
ALTER TABLE `teritorii`
  MODIFY `teritoriiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angajatteritorii`
--
ALTER TABLE `angajatteritorii`
  ADD CONSTRAINT `angajatteritorii_ibfk_1` FOREIGN KEY (`angajatid`) REFERENCES `angajat` (`angajatid`),
  ADD CONSTRAINT `angajatteritorii_ibfk_2` FOREIGN KEY (`teritoriiid`) REFERENCES `teritorii` (`teritoriiid`);

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`),
  ADD CONSTRAINT `comanda_ibfk_2` FOREIGN KEY (`angajatid`) REFERENCES `angajat` (`angajatid`);

--
-- Constraints for table `c_detalii`
--
ALTER TABLE `c_detalii`
  ADD CONSTRAINT `c_detalii_ibfk_1` FOREIGN KEY (`produsid`) REFERENCES `produse` (`produsID`),
  ADD CONSTRAINT `c_detalii_ibfk_2` FOREIGN KEY (`comandaid`) REFERENCES `comanda` (`comandaid`);

--
-- Constraints for table `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `produse_ibfk_1` FOREIGN KEY (`distribuitorID`) REFERENCES `distribuitor` (`distribuitorID`),
  ADD CONSTRAINT `produse_ibfk_2` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`categorieid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
