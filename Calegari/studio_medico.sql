-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 29, 2025 alle 09:50
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studio medico`
--
CREATE DATABASE IF NOT EXISTS `studio medico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `studio medico`;

-- --------------------------------------------------------

--
-- Struttura della tabella `dottore`
--

DROP TABLE IF EXISTS `dottore`;
CREATE TABLE `dottore` (
  `ID_dottore` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Pwd` varchar(50) NOT NULL,
  `Specializzazione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `dottore`
--

INSERT INTO `dottore` (`ID_dottore`, `Nome`, `Cognome`, `Pwd`, `Specializzazione`) VALUES
(2, 'Armando', 'Maradona', 'Napoli', 'Fisioterapista');

-- --------------------------------------------------------

--
-- Struttura della tabella `paziente`
--

DROP TABLE IF EXISTS `paziente`;
CREATE TABLE `paziente` (
  `ID_paziente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `paziente`
--

INSERT INTO `paziente` (`ID_paziente`, `Nome`, `Cognome`, `Pwd`) VALUES
(5, 'Mattia', 'Radaelli', 'Dastery190'),
(6, 'Mirko', 'Colombo', 'Password'),
(7, 'Alex', 'DAmato', 'Schemi'),
(8, 'Alessio', 'Stroppa', 'PokemonGo06'),
(9, 'Alessio', 'Stroppa', 'PokemonGo06'),
(10, 'Alessandro', 'Rota', 'Almenno');

-- --------------------------------------------------------

--
-- Struttura della tabella `referto`
--

DROP TABLE IF EXISTS `referto`;
CREATE TABLE `referto` (
  `ID_referto` int(11) NOT NULL,
  `ID_paziente` int(11) NOT NULL,
  `ID_dottore` int(11) NOT NULL,
  `Data_ref` date NOT NULL,
  `Descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `referto`
--

INSERT INTO `referto` (`ID_referto`, `ID_paziente`, `ID_dottore`, `Data_ref`, `Descrizione`) VALUES
(1, 5, 2, '2025-01-15', 'Mano esplosa da petardo.'),
(2, 7, 2, '2025-01-28', 'ADHD, DSA, Schemi per interrogazione, PC per le verifiche.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dottore`
--
ALTER TABLE `dottore`
  ADD PRIMARY KEY (`ID_dottore`);

--
-- Indici per le tabelle `paziente`
--
ALTER TABLE `paziente`
  ADD PRIMARY KEY (`ID_paziente`);

--
-- Indici per le tabelle `referto`
--
ALTER TABLE `referto`
  ADD PRIMARY KEY (`ID_referto`),
  ADD KEY `ID_paziente` (`ID_paziente`),
  ADD KEY `ID_dottore` (`ID_dottore`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dottore`
--
ALTER TABLE `dottore`
  MODIFY `ID_dottore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `paziente`
--
ALTER TABLE `paziente`
  MODIFY `ID_paziente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `referto`
--
ALTER TABLE `referto`
  MODIFY `ID_referto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `referto`
--
ALTER TABLE `referto`
  ADD CONSTRAINT `referto_ibfk_1` FOREIGN KEY (`ID_paziente`) REFERENCES `paziente` (`ID_paziente`),
  ADD CONSTRAINT `referto_ibfk_2` FOREIGN KEY (`ID_dottore`) REFERENCES `dottore` (`ID_dottore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
