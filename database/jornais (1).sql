-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Out-2019 às 06:35
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jornais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicao`
--

CREATE TABLE `edicao` (
  `id_edicao` int(11) NOT NULL,
  `titulo_edicao` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `numero_de_paginas` int(11) NOT NULL,
  `id_jornal` int(11) NOT NULL,
  `data_insercao` datetime DEFAULT NULL,
  `data_publicacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `edicao`
--

INSERT INTO `edicao` (`id_edicao`, `titulo_edicao`, `numero_de_paginas`, `id_jornal`, `data_insercao`, `data_publicacao`) VALUES
(6, 'primeira edicao do Jornal 2', 0, 2, '2019-03-29 23:14:25', '2019-03-04'),
(8, 'segunda edicao do jornal 2', 0, 2, '2019-03-29 23:58:07', '2019-03-19'),
(11, 'terceira edicao do jornal 2', 0, 2, '2019-04-07 12:02:25', '2019-04-09'),
(13, 'first fucking edition', 0, 8, '2019-05-04 17:02:21', '2019-05-28'),
(14, 'first fucking edition', 0, 1, '2019-09-13 10:38:28', '2019-10-14'),
(15, 'segunda edicao', 0, 1, '2019-09-13 10:40:16', '2019-06-12'),
(16, 'primeira edicao', 0, 1, '2019-09-14 15:58:55', '2019-09-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jornal`
--

CREATE TABLE `jornal` (
  `id_jornal` int(11) NOT NULL,
  `nome_jornal` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `data_criacao` datetime NOT NULL,
  `descricao_jornal` varchar(500) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `jornal`
--

INSERT INTO `jornal` (`id_jornal`, `nome_jornal`, `data_criacao`, `descricao_jornal`) VALUES
(1, 'Jonral1', '2019-03-29 14:09:47', 'premero jornal'),
(2, 'Jornal 2', '2019-03-29 14:09:56', 'segundo jornal'),
(3, 'Jornal 3', '2019-03-29 14:10:07', 'terceiro jornal'),
(4, 'Jornal 4', '2019-03-29 14:10:16', 'quarto jornal'),
(8, 'Jornal 9', '2019-05-04 17:02:09', 'nono jornal'),
(10, 'Jornal 10', '2019-05-07 10:25:25', 'decimo jornal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `numero_da_pagina` int(11) NOT NULL,
  `id_edicao` int(11) NOT NULL,
  `nome_imagem` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `numero_da_pagina`, `id_edicao`, `nome_imagem`) VALUES
(1, 8, 14, 'eu.jpg'),
(2, 9, 14, 'eu.jpg'),
(3, 9, 14, 'horario.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavras_chave`
--

CREATE TABLE `palavras_chave` (
  `id_palavra_chave` int(11) NOT NULL,
  `palavra_chave` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `checada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao_pagina_palavra`
--

CREATE TABLE `relacao_pagina_palavra` (
  `id_relacao` int(11) NOT NULL,
  `id_pagina_fk` int(11) NOT NULL,
  `id_palavra_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `edicao`
--
ALTER TABLE `edicao`
  ADD PRIMARY KEY (`id_edicao`),
  ADD KEY `id_jornal_fk` (`id_jornal`);

--
-- Indexes for table `jornal`
--
ALTER TABLE `jornal`
  ADD PRIMARY KEY (`id_jornal`),
  ADD KEY `id_jornal_fk` (`id_jornal`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`),
  ADD KEY `id_edicao_fk` (`id_edicao`);

--
-- Indexes for table `palavras_chave`
--
ALTER TABLE `palavras_chave`
  ADD PRIMARY KEY (`id_palavra_chave`);

--
-- Indexes for table `relacao_pagina_palavra`
--
ALTER TABLE `relacao_pagina_palavra`
  ADD PRIMARY KEY (`id_relacao`),
  ADD KEY `fk_palavra` (`id_palavra_fk`),
  ADD KEY `fk_pagina` (`id_pagina_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `edicao`
--
ALTER TABLE `edicao`
  MODIFY `id_edicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jornal`
--
ALTER TABLE `jornal`
  MODIFY `id_jornal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `palavras_chave`
--
ALTER TABLE `palavras_chave`
  MODIFY `id_palavra_chave` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relacao_pagina_palavra`
--
ALTER TABLE `relacao_pagina_palavra`
  MODIFY `id_relacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `edicao`
--
ALTER TABLE `edicao`
  ADD CONSTRAINT `id_jornal` FOREIGN KEY (`id_jornal`) REFERENCES `jornal` (`id_jornal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `id_edicao_fk` FOREIGN KEY (`id_edicao`) REFERENCES `edicao` (`id_edicao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `relacao_pagina_palavra`
--
ALTER TABLE `relacao_pagina_palavra`
  ADD CONSTRAINT `fk_pagina` FOREIGN KEY (`id_pagina_fk`) REFERENCES `pagina` (`id_pagina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_palavra` FOREIGN KEY (`id_palavra_fk`) REFERENCES `palavras_chave` (`id_palavra_chave`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
