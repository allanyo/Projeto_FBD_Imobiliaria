-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2019 às 03:27
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `codigo_cliente` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `enderecoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `codigo_cliente`, `nome`, `rg`, `cpf`, `telefone`, `celular`, `email`, `enderecoId`) VALUES
(6, '                                  codigo_cliente', '                                  aparecida', '                                  rg', '                                   cpf', '                                    telefone', '                                   celular', '                                  email', 1),
(7, '                                  codigo_cliente', 'allanyo ', '                                rg', '                                  cpf', '                                  telefone', '                                  celular', '                                  email', 25),
(8, '                 002', '                ana maria', '                11111', '                 111111', '                 1111', '                 11111', '                 1111', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `endereco_id` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`endereco_id`, `rua`, `bairro`, `numero`, `cep`, `cidade`, `estado`, `pais`) VALUES
(1, '             campinhos', '              222', '             2222', '          222', '             222', '                         222', '              222'),
(2, 'campinhos', 'prado', '122', '56000000', 'salgueiro', 'PE', 'brasil'),
(3, '                 engenheiro valmir', '                 prado', '                 111', '                 5600000', '                 salgueiro', '                 pe', '                 brasil'),
(4, '222', '2222', '2222', '222', '222', '2222', '2222'),
(5, '                                  xxxxxxxxx', '                                  xxxxxxxxxxxxx', '                                  xxxxxxxxxxxx', '                                  xxxxxxxxxxxxx', '                                  xxxxxxxxxxxxx', '                                  xxxxxxxxxx', '                                  xxxxxxxxxxxxxx'),
(6, 'qqqqqqqqqqq', 'qqqqqqq', 'qqqqqqqqqq', 'qqqqqqqqqq', 'qqqqqqqqqqq', 'qqqqqqqqqqq', 'qqqqqqqqqqq'),
(7, 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(8, 'q', 'q', 'q', 'q', 'q', 'q', 'q'),
(9, '3', '3', '3', '3', '3', '3', '3'),
(10, 'q', 'q', 'q', 'q', 'q', 'q', 'q'),
(11, 'q', 'q', 'q', 'q', 'q', 'q', 'q'),
(12, 'q', 'a', 'a', 'a', 'a', 'a', 'a'),
(13, 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(14, 'w', 'w', 'w', 'w', 'w', 'w', 'w');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

CREATE TABLE `imovel` (
  `imovel_id` int(11) NOT NULL,
  `codigo_imovel` varchar(200) NOT NULL,
  `codigo_proprietario` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `valor` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `informacoes` varchar(200) NOT NULL,
  `enderecoimoID` int(11) DEFAULT NULL,
  `codigoP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`imovel_id`, `codigo_imovel`, `codigo_proprietario`, `tipo`, `area`, `valor`, `status`, `informacoes`, `enderecoimoID`, `codigoP`) VALUES
(14, '1111', '                                                  01', 'casa', '122', 9000, 'Vendido', '', 4, '002'),
(23, '003', '                02', 'www', 'www', 4000, 'Vendido', '', 14, '001');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcela`
--

CREATE TABLE `parcela` (
  `parcela_id` int(11) NOT NULL,
  `codigo_parcelas` varchar(255) NOT NULL,
  `cod_cliente` varchar(255) NOT NULL,
  `quantidade_parcelas` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parcela`
--

INSERT INTO `parcela` (`parcela_id`, `codigo_parcelas`, `cod_cliente`, `quantidade_parcelas`, `status`, `valor`) VALUES
(92, '002', '002', 9, '', 1000),
(93, '002', '002', 9, '', 1000),
(94, '002', '002', 9, '', 1000),
(95, '002', '002', 9, '', 1000),
(96, '002', '002', 9, '', 1000),
(97, '002', '002', 9, '', 1000),
(98, '002', '002', 9, '', 1000),
(99, '002', '002', 9, '', 1000),
(100, '002', '002', 9, '', 1000),
(101, '001', '001', 2, '', 2000),
(102, '001', '001', 2, '', 2000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `proprietario_id` int(11) NOT NULL,
  `codigo_proprietario` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `enderecoPId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`proprietario_id`, `codigo_proprietario`, `nome`, `rg`, `cpf`, `telefone`, `celular`, `email`, `enderecoPId`) VALUES
(2, '                                  01', '                                aparecida01', '                                1111', '                                  1111', '                                  111', '                                  111', '                                  111', 1),
(3, '                                  02', '                                allanyo', '                                teste', '                                  teste', '                                  xxxxxxxxxxxxxxxx', '                                  xxxxxxxxxxxxxxxx', '                                  xxxxxxxxxxxxxxxx', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `sobrenome`, `email`, `login`, `senha`) VALUES
(5, 'eldon', 'jose', 'aaaa', 'eldon', '202cb962ac59075b964b07152d234b70'),
(4, 'aparecida', 'rocha', 'aparecidalevy@gmail.com', 'aparecida', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `venda_id` int(11) NOT NULL,
  `parcelas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`venda_id`, `parcelas`) VALUES
(1, '2'),
(2, '4');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `cliente_ibfk_1` (`enderecoId`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`endereco_id`);

--
-- Índices para tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`imovel_id`),
  ADD KEY `enderecoimoID` (`enderecoimoID`);

--
-- Índices para tabela `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`parcela_id`);

--
-- Índices para tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`proprietario_id`),
  ADD KEY `enderecoPId` (`enderecoPId`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`venda_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `imovel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `parcela`
--
ALTER TABLE `parcela`
  MODIFY `parcela_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de tabela `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `proprietario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `venda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
