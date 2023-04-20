-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 20, 2023 alle 15:00
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `data_nascita` date NOT NULL,
  `sesso` varchar(10) NOT NULL,
  `luogo_nascita` varchar(255) NOT NULL,
  `cod_fiscale` varchar(16) NOT NULL,
  `residenza` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `nr_documento` varchar(50) NOT NULL,
  `emissione` date NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `nome`, `cognome`, `data_nascita`, `sesso`, `luogo_nascita`, `cod_fiscale`, `residenza`, `citta`, `documento`, `nr_documento`, `emissione`, `telefono`, `email`) VALUES
(1, 'Pino', 'Di Luzio', '1989-03-04', 'Male', 'Pescara', 'dlzfnc89c04g482i', 'via celestino v 21', 'Pescara', 'carta identità', 'aa304554xx', '2010-03-31', '2223334455', 'pino@goge.it'),
(2, 'Alessio', 'Rossi', '1989-10-20', 'Male', 'Pescara', 'rsiale89C04G482I', 'via fasulla v 5', 'Pescara', 'Carta di identità', 'ac66588xx', '2010-08-15', '3335554422', ''),
(3, 'Mariacristina', 'Luciani', '1989-05-28', 'Female', 'Pescara', 'mrcluc89e28g482i', 'via celestino v 21', 'Pescara', 'carta identità', 'av00445xx', '2017-05-24', '333555466', 'mary@goog.it'),
(4, 'Andrea', 'Verdi', '1980-10-22', 'Male', 'Cieti', 'frett45f80lagiii', 'via pescara 12', 'chieti', 'patente', 'ch1254p777', '1999-01-10', '3354455667', 'andrea.verdi@gmoail.com'),
(5, 'Paola', 'Fazio', '1957-09-04', 'Female', 'Pescara', 'fzapla57f55e77as', 'via neto 19', 'Pescara', 'patente', 'PE1124887955', '2013-03-30', '3335588777', 'paolalu@googe.it'),
(8, 'Veronica', 'Rosa', '1995-03-01', 'Female', 'chieti', 'asdasd1312asdasd', 'via chieti 20', 'chieti', 'patente', 'aa304554xx', '2010-03-31', '2223334455', 'pink@goge.it'),
(15, 'Francesca', 'Gialli', '1990-10-18', 'Female', 'Milano', 'frglifjemwkfks88', 'Milano', 'via dei caduti 20', 'patente', 'mi21155887', '2019-01-05', '3295587963', 'f.gialli@googe.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `oggetti`
--

CREATE TABLE `oggetti` (
  `codice` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo` double NOT NULL,
  `prezzo_esposto` double NOT NULL,
  `data_arrivo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `oggetti`
--

INSERT INTO `oggetti` (`codice`, `id_cliente`, `descrizione`, `quantita`, `prezzo`, `prezzo_esposto`, `data_arrivo`) VALUES
(1, 1, 'Poltrona', 9, 50, 55.5, '2023-03-15'),
(2, 1, 'piatto antico', 1, 50, 55.5, '2023-03-15'),
(5, 4, 'Armadio', 1, 120, 133.2, '2023-03-15'),
(6, 1, 'camera completa', 1, 200, 222, '2023-03-17'),
(8, 1, 'lampada da tavolo', 1, 503, 558.33, '2023-03-17'),
(13, 2, 'lampadario 3 luci', 3, 5, 5.55, '2023-03-18'),
(15, 2, 'fontana', 1, 400, 444, '2023-03-18'),
(20, 2, 'lampadario 4 luci', 2, 60, 66.6, '2023-03-18'),
(23, 2, 'fontana', 1, 500, 555, '2023-03-18'),
(27, 2, 'fontana', 1, 400, 444, '2023-03-18'),
(39, 4, 'tavolo quadrato', 1, 30, 33.3, '2023-03-18'),
(41, 4, 'sedia ', 3, 50, 55.5, '2023-03-18'),
(43, 1, 'lavatrice', 1, 60, 66.6, '2023-03-19'),
(46, 3, 'pianoforte', 1, 400, 444, '2023-03-19'),
(47, 3, 'lampadario', 1, 90, 99.9, '2023-03-19'),
(48, 3, 'poltroncina da camera', 3, 30, 33.3, '2023-03-19'),
(49, 3, 'servizio piatti da 12', 1, 60, 66.6, '2023-03-19'),
(53, 1, 'vaso', 3, 10, 11.1, '2023-03-22'),
(54, 1, 'clessidra', 1, 20, 22.2, '2023-03-22'),
(55, 1, 'compressore', 1, 100, 111, '2023-03-22'),
(57, 1, 'servizio piatti', 1, 60, 66.6, '2023-03-22'),
(59, 3, 'lanterna', 1, 30, 33.3, '2023-03-24'),
(60, 3, 'sedia', 2, 10, 11.1, '2023-03-25'),
(61, 3, 'albero natalizio', 1, 10, 11.1, '2023-03-25'),
(62, 4, 'tavolo con sedie', 1, 100, 111, '2023-03-25'),
(63, 4, 'sala completa', 1, 500, 555, '2023-03-25'),
(65, 1, 'albero natalizio', 2, 30, 33.3, '2023-04-02'),
(66, 1, 'modellino aereo', 1, 30, 33.3, '2023-04-10'),
(67, 2, 'sacco boxe', 1, 40, 44.4, '2023-04-10'),
(68, 2, 'set pentole ceramica', 3, 50, 55.5, '2023-04-10'),
(69, 2, 'set posate acciaio', 1, 20, 22.2, '2023-04-10'),
(70, 2, 'posate plastica', 1, 5, 5.55, '2023-04-10'),
(71, 1, 'poltrona da camera', 1, 40, 44.4, '2023-04-10'),
(72, 1, 'aspirapolvere', 1, 40, 44.4, '2023-04-10'),
(73, 1, 'piattino dorato', 30, 2, 2.22, '2023-04-11'),
(74, 1, 'servizio piatti', 1, 50, 55.5, '2023-04-11'),
(75, 1, 'armadio 6 ante', 1, 230, 255.3, '2023-04-11'),
(76, 1, 'letto matrimoniale', 1, 50, 55.5, '2023-04-12'),
(77, 1, 'lampadario design', 1, 1500, 1665, '2023-04-12'),
(78, 15, 'piatti richard ginori', 1, 60, 66.6, '2023-04-13'),
(79, 15, 'servizio bicchieri cristallo', 1, 40, 44.4, '2023-04-13'),
(80, 15, 'Fontana cemento', 1, 320, 355.2, '2023-04-13'),
(81, 15, 'vaso vetro', 2, 20, 22.2, '2023-04-13');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `username`, `pwd`) VALUES
(1, 'Pino', 'pin', 'Francesco89'),
(2, 'Paolo', 'pao', 'Paolo89');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `oggetti`
--
ALTER TABLE `oggetti`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `oggetti`
--
ALTER TABLE `oggetti`
  MODIFY `codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `oggetti`
--
ALTER TABLE `oggetti`
  ADD CONSTRAINT `oggetti_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clienti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
