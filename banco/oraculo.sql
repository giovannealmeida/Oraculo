-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2014 às 16:02
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oraculo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
`id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `materia_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
`id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `creditos` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `professor_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`id`, `nome`, `creditos`, `info`, `professor_id`, `usuario_id`) VALUES
(11, 'Teoria', '4', '', 5, 1),
(12, 'Compiladores', '3', '', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
`id` int(11) NOT NULL,
  `numero_credito` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `nota` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `numero_credito`, `materia_id`, `nota`) VALUES
(1, 1, 11, 1),
(2, 2, 11, 3),
(3, 3, 11, 2),
(4, 4, 11, 4),
(5, 1, 12, 3),
(6, 2, 12, 2),
(7, 3, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
`id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lattes` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `info` text COLLATE utf8_bin,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `lattes`, `telefone`, `info`, `usuario_id`) VALUES
(4, 'Dany Sanches', 'dany@email.com.br', 'http://lattes.cnpq.br/', '73-99990998', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4),
(5, 'Cesar Bravo', 'bravo@email.com', 'http://localhost.com.br', '11-11111111', 'asdasdasd', 1),
(6, 'Paulo Costa', 'paulo@gmail.com', '', '', 'Teste', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE IF NOT EXISTS `provas` (
`id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `data_prova` date DEFAULT NULL,
  `assuntos` text COLLATE utf8_bin,
  `materia_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `img_nome` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `nome`, `img_nome`) VALUES
(1, 'admin@localhost.com', '123123', 'Administrador', 'usuarioH.jpg'),
(2, 'hugo@email.com', '123', 'Hugo', 'usuarioM.jpg'),
(4, 'caiquemart.cs@gmail.com', 'dasgtsshionmu', 'Caíque', 'IMG-20141112-WA0047.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
 ADD PRIMARY KEY (`id`), ADD KEY `atividades_ibfk_1` (`materia_id`), ADD KEY `atividades_ibfk_2` (`usuario_id`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
 ADD PRIMARY KEY (`id`), ADD KEY `materias_ibfk_1` (`usuario_id`), ADD KEY `materias_ibfk_2` (`professor_id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
 ADD PRIMARY KEY (`id`), ADD KEY `materia_id` (`materia_id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
 ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `provas`
--
ALTER TABLE `provas`
 ADD PRIMARY KEY (`id`), ADD KEY `provas_ibfk_1` (`materia_id`), ADD KEY `provas_ibfk_2` (`usuario_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `provas`
--
ALTER TABLE `provas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
ADD CONSTRAINT `atividades_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `atividades_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `materias`
--
ALTER TABLE `materias`
ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `provas`
--
ALTER TABLE `provas`
ADD CONSTRAINT `provas_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `provas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
