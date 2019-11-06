-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Jul-2019 às 10:16
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_cliente` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `enderecoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  KEY `cliente_ibfk_1` (`enderecoId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `codigo_cliente`, `nome`, `rg`, `cpf`, `telefone`, `celular`, `email`, `enderecoId`) VALUES
(6, '                 codigo_cliente', '                  aparecida', '                  rg', '                  cpf', '                   telefone', '                  celular', '                 email', 1),
(7, '                                  codigo_cliente', 'allanyo ', '                                rg', '                                  cpf', '                                  telefone', '                                  celular', '                                  email', 25),
(8, '                 002', '                ana maria', '                11111', '                 111111', '                 1111', '                 11111', '                 1111', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `endereco_id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  PRIMARY KEY (`endereco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`endereco_id`, `rua`, `bairro`, `numero`, `cep`, `cidade`, `estado`, `pais`) VALUES
(1, '                                                   campinhos', '                                                   222', '                                                   2222', '                                                   222', '                                                   222', '                                                   222', '                                                   222'),
(2, 'campinhos', 'prado', '122', '56000000', 'salgueiro', 'PE', 'brasil'),
(3, '                 engenheiro valmir', '                 prado', '                 111', '                 5600000', '                 salgueiro', '                 pe', '                 brasil'),
(4, '222', '2222', '2222', '222', '222', '2222', '2222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

DROP TABLE IF EXISTS `imovel`;
CREATE TABLE IF NOT EXISTS `imovel` (
  `imovel_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_imovel` varchar(200) NOT NULL,
  `codigo_proprietario` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `informacoes` varchar(200) NOT NULL,
  `enderecoimoID` int(11) DEFAULT NULL,
  PRIMARY KEY (`imovel_id`),
  KEY `enderecoimoID` (`enderecoimoID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`imovel_id`, `codigo_imovel`, `codigo_proprietario`, `tipo`, `area`, `valor`, `status`, `informacoes`, `enderecoimoID`) VALUES
(14, '1111', '                                                  01', 'casa', '122', '122222', 'vender', '33333', 4),
(13, '011', '                01', 'casa', '122m', '120000', 'para vender', '4 quartos', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

DROP TABLE IF EXISTS `proprietario`;
CREATE TABLE IF NOT EXISTS `proprietario` (
  `proprietario_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_proprietario` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `enderecoPId` int(11) DEFAULT NULL,
  PRIMARY KEY (`proprietario_id`),
  KEY `enderecoPId` (`enderecoPId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`proprietario_id`, `codigo_proprietario`, `nome`, `rg`, `cpf`, `telefone`, `celular`, `email`, `enderecoPId`) VALUES
(2, '                                  01', '                                aparecida01', '                                1111', '                                  1111', '                                  111', '                                  111', '                                  111', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `sobrenome`, `email`, `login`, `senha`) VALUES
(5, 'eldon', 'jose', 'aaaa', 'eldon', '202cb962ac59075b964b07152d234b70'),
(4, 'aparecida', 'rocha', 'aparecidalevy@gmail.com', 'aparecida', '202cb962ac59075b964b07152d234b70');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`enderecoId`) REFERENCES `endereco` (`endereco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
