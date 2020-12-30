-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Dez-2020 às 00:57
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `project`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `specialty_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `datehour` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `education` text NOT NULL,
  `residency` text NOT NULL,
  `fellowship` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(252) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `education`, `residency`, `fellowship`, `image`, `phone`, `email`) VALUES
(2, 'Allison Cowl, MD', '<p>BA, Cornell University, 1993</p>\r\n\r\n<p>MD, University of Vermont College of Medicine, 1998</p>', '<p>Cardiology, University of Massachusetts, 1998-2001</p>', '<p>Pediatric Cardiology, Massachusetts General Hospital, 2001-2005</p>', 'doc3.jpg', '+351913334455', 'allison.cowl@clinic.pt'),
(3, 'Richard Young, MD, MPH', '<p>BA, Stanford University, 1967</p>\r\n<p>MPH, Yale University, 1971</p>\r\n<p>MD, Yale School of Medicine, 1971</p>', '<p>Pediatrics, University of Washington, 1971-1972</p>\r\n                                    <p>Pediatrics, Massachusetts General Hospital, Pediatrics, 1974-1975</p>', '<p>Neurology, Massachusetts General Hospital, 1975-1978</p>', 'doc1.jpg', '+351912223344', 'aaddd@clinic.pt'),
(4, 'Katherine R. Baldwin, MD', '<p>BA, Cornell University, 2003</p>\r\n<p>MD, University of Massachusetts, 2008</p>', ' <p>Internal Medicine-Pediatrics, University of Massachusetts, 2008-2012</p>', '<p>Pediatric Gastroenterology, Massachusetts General Hospital for Children, 2012-2015</p>', 'doc2.jpg', '+351911111111', 'aaaaa@clinic.pt'),
(5, 'W. Blaine Lapin, MD', '<p>BA, George Washington University, 2006</p>\r\n<p>MD, Saint George’s University, 2011</p>', '<p>Rheumatology, University at Buffalo, Women and Children’s Hospital of Buffalo, 2011-2014</p>', '<p>Rheumatology, Baylor College of Medicine, Texas Children’s Hospital, 2014-2017</p>', 'doc4.jpg', '+351910000001', 'aaaaaa@clinic.pt'),
(6, 'Craig Schramm, MD', '<p>BA, Carleton College, 1974</p>\r\n<p>MD, University of Chicago Pritzker School of Medicine, 1978</p>', '<p>Pulmonary Medicine, University of Colorado, 1978-1981</p>', '<p>Pulmonary Medicine, University of Colorado, 1982-1985</p>', 'doc5.jpg', '+351919999998', 'aaa@clinic.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(252) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `citizencard_number` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(64) NOT NULL,
  `postal_code` varchar(32) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `citizencard_number`, `address`, `city`, `postal_code`, `birth_date`, `gender`) VALUES
(9, 'admin', 'admin', 'admin@email.pt', '$2y$10$C4QMgrhh4hafrimNOA4qW.CBOGVoWMdZHDW1tj/2CEZuDQDZ5buPi', '91000080', '1234567850', 'rdfg', 'Lisbon', '2300', '2015-03-21', 'male'),
(21, 'maria', 'maria', 'mm@email.pt', '$2y$10$.Bt3O5.qClJ7s9P4AqO22.4uEwpK1.jGzfOZ6Fx.WIoQpV7ZebqjK', '911111111', '11111111111', 'rua lai', 'lisboa', '1700', '2020-12-08', 'Male'),
(22, 'baas', 'asdsadd', 'ba@email.pt', '$2y$10$2mtHLb1fSgSmUbw8anPYcuuFb0zmBwARK7cxX5lNE4C5v4Jb0HJ3q', '911111111', '11111111111', 'rua ca', 'Lisbon', '2700', '2020-12-15', 'Male'),
(23, 'dsafa', 'afadf', 'ae@email.pt', '$2y$10$OR07Jf8YEnocy6pzQBIRVODsEpEYzJ2VCON1cDhPQtpd2hWcY20Q2', '911111111', '11111111111', 'rua s', 'Lisbon', '2700', '2020-12-08', 'Male');

-- --------------------------------------------------------

--
-- Estrutura da tabela `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `name`) VALUES
(8, 'Cardiology'),
(9, 'Pediatric Cardiology'),
(10, 'Neurology'),
(11, 'Gastroenterology'),
(12, 'Rheumatology'),
(13, 'Pulmonary Medicine'),
(14, 'Pediatric');

-- --------------------------------------------------------

--
-- Estrutura da tabela `specialties_doctors`
--

CREATE TABLE `specialties_doctors` (
  `specialty_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `specialties_doctors`
--

INSERT INTO `specialties_doctors` (`specialty_id`, `doctor_id`) VALUES
(8, 2),
(9, 2),
(10, 3),
(11, 4),
(12, 5),
(13, 6),
(14, 2),
(14, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`,`specialty_id`,`doctor_id`,`datehour`);

--
-- Índices para tabela `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Índices para tabela `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Índices para tabela `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- Índices para tabela `specialties_doctors`
--
ALTER TABLE `specialties_doctors`
  ADD PRIMARY KEY (`specialty_id`,`doctor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT de tabela `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
