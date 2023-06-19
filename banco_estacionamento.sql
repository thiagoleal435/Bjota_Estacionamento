-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Dez-2022 às 19:53
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Senha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Telefone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Veiculo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Placa` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`ID`, `Nome`, `CPF`, `Usuario`, `Senha`, `Telefone`, `Veiculo`, `Placa`) VALUES
(12, 'teste1', '12345678900', 'teste@gmail.com', 'teste', '00912345678', 'Carro', 'abc1a23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_vagas`
--

CREATE TABLE `historico_vagas` (
  `ID_registro` int(11) NOT NULL,
  `Vaga` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Hora_inicial` time NOT NULL,
  `Hora_final` time NOT NULL,
  `Cliente` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `Num_vaga` int(11) NOT NULL,
  `Estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Cliente` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`Num_vaga`, `Estado`, `Cliente`) VALUES
(1, 'D', ''),
(2, 'D', ''),
(3, 'D', ''),
(4, 'D', ''),
(5, 'D', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`ID`,`CPF`);

--
-- Índices para tabela `historico_vagas`
--
ALTER TABLE `historico_vagas`
  ADD PRIMARY KEY (`ID_registro`);

--
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`Num_vaga`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `historico_vagas`
--
ALTER TABLE `historico_vagas`
  MODIFY `ID_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
