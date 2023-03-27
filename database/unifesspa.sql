-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27-Mar-2023 às 04:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `unifesspa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Admins`
--

CREATE TABLE `Admins` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Admins`
--

INSERT INTO `Admins` (`id`, `login`, `senha`) VALUES
(1, 'mariaeduarda', '1234'),
(2, 'elton', 'calvo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Alunos`
--

CREATE TABLE `Alunos` (
  `nome` varchar(100) NOT NULL,
  `nome_social` varchar(100) DEFAULT NULL,
  `curso` varchar(100) NOT NULL,
  `unidade` varchar(1) NOT NULL,
  `matricula` varchar(12) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Alunos`
--

INSERT INTO `Alunos` (`nome`, `nome_social`, `curso`, `unidade`, `matricula`, `cpf`, `email`, `telefone`, `data_nasc`, `sexo`) VALUES
('José Silva', '', 'Psicologia', '1', '202100030310', '33344455566', 'jose.silva@gmail.com', '3344556677', '2001-03-30', 'M'),
('João da Silva', 'Joana da Silva', 'Engenharia Mecânica', '2', '202200010101', '11122233344', 'joana.silva@gmail.com', '1122334455', '2000-01-01', 'M'),
('Ana Lima', '', 'Ciências Contábeis', '1', '202200050508', '55566677788', 'ana.lima@gmail.com', '5566778899', '2002-05-20', 'F'),
('Maria Santos', '', 'Administração', '1', '202300020206', '22233344455', 'maria.santos@gmail.com', '2233445566', '1999-02-14', 'F'),
('Pedro Alves', '', 'Biologia', '3', '202300040402', '44455566677', 'pedro.alves@gmail.com', '4455667788', '1998-04-05', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SolicitacoesEvasao`
--

CREATE TABLE `SolicitacoesEvasao` (
  `nome` varchar(100) NOT NULL,
  `nome_social` varchar(100) DEFAULT NULL,
  `curso` varchar(100) NOT NULL,
  `unidade` varchar(1) NOT NULL,
  `matricula` varchar(12) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `idade` bigint(2) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `motivo_evasao` varchar(500) DEFAULT NULL,
  `outros_motivos` varchar(500) DEFAULT NULL,
  `data_evasao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `SolicitacoesEvasao`
--

INSERT INTO `SolicitacoesEvasao` (`nome`, `nome_social`, `curso`, `unidade`, `matricula`, `cpf`, `email`, `telefone`, `idade`, `sexo`, `motivo_evasao`, `outros_motivos`, `data_evasao`) VALUES
('José Silva', '', 'Psicologia', '1', '202100030310', '33344455566', 'jose.silva@gmail.com', '3344556677', 22, 'M', 'Muitas despesas para se manter na universidade', NULL, '2023-03-25');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Alunos`
--
ALTER TABLE `Alunos`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
