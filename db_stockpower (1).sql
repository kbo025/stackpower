-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jan-2020 às 19:04
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_stockpower`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `base`
--

CREATE TABLE `base` (
  `id` int(11) NOT NULL,
  `base` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `base`
--

INSERT INTO `base` (`id`, `base`) VALUES
(1, 'TIJUCA'),
(2, 'SALGUEIRO'),
(3, 'BARRA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sarque`
--

CREATE TABLE `sarque` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `rgpm` varchar(200) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `mae` varchar(200) NOT NULL,
  `pai` varchar(200) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `base` int(11) NOT NULL,
  `situacao` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `baseconsultas` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `dtinicial` datetime NOT NULL,
  `dtfinal` datetime NOT NULL,
  `data_conduzir` date NOT NULL,
  `hora_conduzir` time NOT NULL,
  `telefonepm` varchar(50) NOT NULL,
  `numero_ro` varchar(100) NOT NULL,
  `rg_condutor` varchar(100) NOT NULL,
  `testemunha` varchar(100) NOT NULL,
  `dinamica` text NOT NULL,
  `delito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sarque`
--

INSERT INTO `sarque` (`id`, `nome`, `rg`, `rgpm`, `cpf`, `mae`, `pai`, `nascimento`, `endereco`, `telefone`, `base`, `situacao`, `motivo`, `obs`, `resposta`, `baseconsultas`, `status`, `dtinicial`, `dtfinal`, `data_conduzir`, `hora_conduzir`, `telefonepm`, `numero_ro`, `rg_condutor`, `testemunha`, `dinamica`, `delito`, `id_usuario`, `id_operador`, `placa`, `tipo`, `timestamp`) VALUES
(1, 'FERNANDO COLLOR', '232432523', '2838377', '232432523', 'MARIA COLLOR', 'CARLOS COLLOR', '1970-01-01', 'RUA GOIAS QD 1 LT 2', '2198756431', 1, 5, 2, 'NADA', 'RESPOSTA E ANEXO COM FOTO', '', 6, '2020-01-29 13:42:21', '2020-01-29 13:43:13', '2020-01-29', '14:43:00', '', '23423423', '23243242', '23423423', 'FOI PRESO COM SUCESSO', 10, 1, 1, 'SEM-PLACA', 1, '2020-01-29 16:43:51'),
(2, 'JOSE CARLOS', '3232423', '324234', '3232423', 'FERNANDA JOSE', 'JOSE CARLOS', '1970-01-01', 'RUA TESTE QD 12 LT2', '2198765422', 1, 5, 3, 'NDA CONSTA', 'ESSES DADOS AQUI', '', 6, '2020-01-29 14:52:08', '2020-01-29 14:52:42', '2020-01-29', '14:55:00', '', '9388494', '378387', '73637', 'TSTERRR  RRRR ', 4, 7, 3, 'SEM-PLACA', 1, '2020-01-29 17:55:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo_usuario`) VALUES
(1, 'Eliakin Cesar', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'Usuário', 'usuario@usuario.com', 'e10adc3949ba59abbe56e057f20f883e', 3),
(5, 'OPERADOR', 'operador@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(7, 'Eliakin Ceasr', 'etes@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(10, 'Geislaine Vitoria Oliveira Rodrigues', 'teste@ddd.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sarque`
--
ALTER TABLE `sarque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `base`
--
ALTER TABLE `base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sarque`
--
ALTER TABLE `sarque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
