-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/01/2021 às 20:14
-- Versão do servidor: 10.4.14-MariaDB
-- Versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `Sistema_cadastro_clientes_paginacao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(2000) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cliente`, `endereco`, `bairro`, `cidade`, `cep`, `fone`, `email`, `cpf`) VALUES
(1, 'Geraldo', 'Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '96676444', 'geraldo@email.com', '00000000000'),
(2, 'Terezinha', ' Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '000000000', 'terezinha@email.com', '00000000000'),
(3, 'Gislene Dias', 'Rua das Garças', 'Loteamento', 'Matipó', '35367000', '0000000', 'gislene@email.com', '00000000'),
(4, 'Jean Monteiro', 'Rua Joaquim Bilin Quintão', 'Zona da Mata', 'Beo Honte', '3535353', '0000000', 'jean@email.email', '1366315931'),
(5, 'Josimar', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '67900000', 'josimarAbreCampo@Josimar.net', '13663159361'),
(6, 'Icaro Pereira ', 'Rua Z 1053', 'Loteamento do Celinho ', 'Raul ', '0000000', '000000000', 'icara@icaro.com.br.mg.mtp.lotcel.rl.125.2and', '00000000'),
(7, ' Mateus', 'Rua l 125', 'Loteamento celinho', 'Matipó', '35367000', '3131311', 'jefferson@gmail.com', '00000000000'),
(8, ' Souza', 'Rua l 125', 'Loteamento do celinho', 'Matipó', '35367000', '999999999', 'elizabeth@email.com', '00000000000'),
(9, 'Geraldo', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '96676444', 'geraldo@email.com', '00000000000'),
(10, 'Lopes', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '000000000', 'terezinha@email.com', '00000000000'),
(11, 'Dias', 'Rua das Garças', 'Loteamento', 'Matipó', '35367000', '0000000', '@email.com', '00000000'),
(12, 'Monteiro', 'Rua Joaquim Bilin Quintão', 'Zona da Mata', 'Beo Honte', '3535353', '0000000', 'jean@email.email', '1366315931'),
(13, 'Silva Dias', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '67900000', 'josimarAbreCampo@Josimar.net', '13663159361'),
(14, 'Pereira ', 'Rua l 125', 'Loteamento do Celinho ', 'Raul ', '0000000', '000000000', 'icara@icaro.com.br.mg.mtp.lotcel.rl.125.2and', '00000000'),
(15, 'Geraldo Dias', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '96676444', 'geraldo@email.com', '00000000000'),
(16, 'Terezinha Lopes', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '000000000', 'terezinha@email.com', '00000000000'),
(17, 'Gislene Dias', 'Rua das Garças', 'Loteamento', 'Matipó', '35367000', '0000000', 'gislene@email.com', '00000000'),
(18, 'Monteiro', 'Rua Joaquim Bilin Quintão', 'Zona da Mata', 'Beo Honte', '3535353', '0000000', 'jean@email.email', '1366315931'),
(19, 'Icaro Pereira ', 'Rua ', 'Loteamento do Celinho ', 'Raul ', '0000000', '000000000', 'icara@icaro.com.br.mg.mtp.lotcel.rl.125.2and', '00000000'),
(20, ' Mateus', 'Rua G 125', 'Loteamento celinho', 'Matipó', '35367000', '3131311', 'jefferson@gmail.com', '00000000000'),
(21, ' Souza', 'Rua l ', 'Loteamento do celinho', 'Matipó', '35367000', '999999999', 'elizabeth@email.com', '00000000000'),
(22, 'Geraldo', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '96676444', 'geraldo@email.com', '00000000000'),
(23, 'Lopes', 'Corrego das Palmeiras', 'Zona Rural', 'Abre-Campo', '35365000', '000000000', 'terezinha@email.com', '00000000000');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
COMMIT;

