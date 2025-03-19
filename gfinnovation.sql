-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/03/2025 às 14:02
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gfinnovation`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `Nome` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `Nome`) VALUES
(32, 'Ação'),
(33, 'Fundo'),
(34, 'Título');

-- --------------------------------------------------------

--
-- Estrutura para tabela `investimentos`
--

CREATE TABLE `investimentos` (
  `Id` int(11) NOT NULL,
  `Numero` varchar(50) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `preco` varchar(150) NOT NULL,
  `Categoria` varchar(100) DEFAULT NULL,
  `deletado` char(1) DEFAULT NULL,
  `id_reg_delet` int(5) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `data_investimento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `investimentos`
--

INSERT INTO `investimentos` (`Id`, `Numero`, `Nome`, `preco`, `Categoria`, `deletado`, `id_reg_delet`, `data_cadastro`, `data_investimento`) VALUES
(74, '120', 'Teste excluir', '15.99', 'teste', 'S', 2, '2025-03-19 09:12:32', NULL),
(72, '121', 'João pedro', '400.50', 'Fundo', 'n', NULL, '2025-03-19 09:12:32', '2025-03-18'),
(75, 'teste data', 'teste data', '30.50', 'Ação', 'S', 2, '2025-03-19 13:13:54', '2025-03-19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id_info` int(5) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id_info`, `senha`, `email`) VALUES
(1, '123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `idSetor` int(5) NOT NULL,
  `NomeSetor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`idSetor`, `NomeSetor`) VALUES
(2, 'Desenvolvimento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Sobrenome` varchar(90) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(256) NOT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `telefoneUsuario` varchar(20) NOT NULL,
  `cpfUsuario` varchar(15) NOT NULL,
  `Setor` varchar(70) DEFAULT NULL,
  `Online` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nome`, `Sobrenome`, `Email`, `Senha`, `NivelUsuario`, `Status`, `telefoneUsuario`, `cpfUsuario`, `Setor`, `Online`) VALUES
(2, 'João', 'Pedro', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'Ativo', '+55 (35) 8468-7649', '199.557.350-00', 'Desenvolvimento', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Índices de tabela `investimentos`
--
ALTER TABLE `investimentos`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_info`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`idSetor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `investimentos`
--
ALTER TABLE `investimentos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_info` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `idSetor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
