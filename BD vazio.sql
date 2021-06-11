-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/03/2015 às 14:05
-- Versão do servidor: 5.6.16
-- Versão do PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `ff_giovane`
--
CREATE DATABASE IF NOT EXISTS `ff_giovane` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ff_giovane`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bandas`
--

CREATE TABLE IF NOT EXISTS `bandas` (
  `id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id das bandas.',
  `datas_id` tinyint(2) unsigned zerofill NOT NULL,
  `nome` varchar(45) NOT NULL COMMENT 'Irá armazenar o nome da banda.',
  `url_imagem` text NOT NULL COMMENT 'Irá armazenar a url da imagem da banda.',
  `descricao` text NOT NULL COMMENT 'Irá armazenar uma breve descrição da banda.',
  PRIMARY KEY (`id`),
  KEY `fk_bandas_datas1` (`datas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `canceladas`
--

CREATE TABLE IF NOT EXISTS `canceladas` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id das reservas canceladas.',
  `motivo` char(1) NOT NULL COMMENT 'Irá armazenar o motivo do cancelamento da reserva.',
  `permissao_usuario` char(1) NOT NULL COMMENT 'Permissão para o cancelamento da reserva.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id do cliente.',
  `usuarios_id` int(10) unsigned zerofill NOT NULL,
  `nome` varchar(45) NOT NULL COMMENT 'Irá armazenar o nome completo.',
  `nascimento` date NOT NULL COMMENT 'Irá armazenar a data de nascimento.',
  `tipo_doc` char(1) NOT NULL COMMENT 'Irá armazenar o tipo de documento.',
  `num_doc` varchar(15) NOT NULL COMMENT 'Irá armazenar  número do documento.',
  `telefone` bigint(19) unsigned NOT NULL COMMENT 'Irá armazenar o telefone(s) para contato.',
  `email` varchar(45) NOT NULL COMMENT 'Irá armazenar o e-mail.',
  PRIMARY KEY (`id`),
  KEY `fk_clientes_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `datas`
--

CREATE TABLE IF NOT EXISTS `datas` (
  `id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id da data..',
  `descricao` text NOT NULL COMMENT 'Irá armazenar uma descrição sobre o dia do evento.',
  `dia` date NOT NULL COMMENT 'Irá armazenar os dias do evento.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingressosdisponiveis`
--

CREATE TABLE IF NOT EXISTS `ingressosdisponiveis` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id de cada ingresso.',
  `datas_id` tinyint(2) unsigned zerofill NOT NULL,
  `qtde_normal` int(5) NOT NULL COMMENT 'Irá armazenar a quantidade ose ingressos normais.',
  `valor_normal` decimal(10,2) NOT NULL COMMENT 'Irá armazenar o valor dos ingressos vip.',
  `qtde_vip` int(5) NOT NULL COMMENT 'Irá armazenar a quantidade de ingressos vip.',
  `valor_vip` decimal(10,2) NOT NULL COMMENT 'Irá armazenar o valor dos ingressos vip.',
  PRIMARY KEY (`id`),
  KEY `fk_ingressosdisponiveis_datas1` (`datas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `patrocinadores`
--

CREATE TABLE IF NOT EXISTS `patrocinadores` (
  `id` tinyint(2) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id do patrocinador.',
  `nome` varchar(45) NOT NULL COMMENT 'Irá armazenar o nome do patrocinador.',
  `url_logo` text NOT NULL COMMENT 'Irá armazenar a logo do patrocinador.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `codigo` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o código da reserva.',
  `clientes_id` int(6) unsigned zerofill NOT NULL,
  `ingressosdisponiveis_id` int(5) unsigned zerofill NOT NULL,
  `qtde_normal` int(1) unsigned NOT NULL COMMENT 'Irá armazenar a quantidade de ingressos normais.',
  `qtde_vip` int(1) unsigned NOT NULL COMMENT 'Irá armazenar a quantidade de ingressos vip.',
  PRIMARY KEY (`codigo`),
  KEY `fk_reservas_clientes1` (`clientes_id`),
  KEY `fk_reservas_ingressosdisponiveis1` (`ingressosdisponiveis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Irá armazenar o id do usuario.',
  `login` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Irá armazenar o nome de usuario',
  `senha` char(45) NOT NULL COMMENT 'Irá armazenar a senha.',
  `permissao` char(1) NOT NULL COMMENT 'Irá atribuir a permissão de cliente ou administrador ao login.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `bandas`
--
ALTER TABLE `bandas`
  ADD CONSTRAINT `fk_bandas_datas1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `ingressosdisponiveis`
--
ALTER TABLE `ingressosdisponiveis`
  ADD CONSTRAINT `fk_ingressosdisponiveis_datas1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reservas_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservas_ingressosdisponiveis1` FOREIGN KEY (`ingressosdisponiveis_id`) REFERENCES `ingressosdisponiveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
