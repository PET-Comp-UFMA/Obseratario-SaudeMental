-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jun-2021 às 16:59
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `observatorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(300) DEFAULT NULL,
  `Journal` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Pages` varchar(20) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `article`
--

-- Artigo Verificado e Padronizado
INSERT INTO `article` (`idArticle`, `Title`, `Authors`, `Journal`, `Year`, `Volume`, `Number`, `Pages`, `Month`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, '\"Doidiça\" e Depressão: As Concepções dos Usuários da Rede de Atenção Integral à Saúde Mental de Sobral-CE', 'Costa, Maria Suely Alves', '', 2008, '', '', '', 'Jan', '01/01/2008', 'Expressão, Doidice, S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `book`
--

CREATE TABLE `book` (
  `idBook` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Series` varchar(45) DEFAULT NULL,
  `Edition` varchar(45) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `book`
--

-- Artigo Verificado e Padronizado
INSERT INTO `book` (`idBook`, `Title`, `Authors`, `Publisher`, `Year`, `Volume`, `Number`, `Series`, `Edition`, `Month`, `Note`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, 'Saúde Mental: Desafios da Prevenção, Diagnóstico, Tratamento e Cuidado na Sociedade Moderna','Freitas, Guilherme Barroso L. and Martins, Guilherme Augusto G', 'Paraná: Editora Pasteur', 2021, 'Volume 1', '', '', '1ª Edição', 'Jan', '', '01/01/2021', 'Cuidado, Saúde Mental, Saúde Pública.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inproceedings`
--

CREATE TABLE `inproceedings` (
  `idInproceedings` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `Booktitle` varchar(150) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Editor` varchar(100) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Series` varchar(45) DEFAULT NULL,
  `Pages` varchar(20) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mastersthesis`
--

CREATE TABLE `mastersthesis` (
  `idMastersThesis` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Authors` varchar(300) NOT NULL,
  `School` varchar(300) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Year` int(11) NOT NULL,
  `Data_Publicacao` varchar(30) NOT NULL,
  `Palavras_chave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mastersthesis`
--
-- Artigos padronizados, apenas o primeiro está Verificado
INSERT INTO `mastersthesis` (`idMastersThesis`, `Title`, `Authors`, `School`, `Address`, `Year`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, 'Tecnologia Educativa Digital para a Promoção da Saúde Mental de Adolescentes: Estudo de Validação por Especialistas', 'Farias, Quiteria Larissa Teodoro', 'Universidade Federal do Ceará, Sobral, CE, Brasil', '', 2021, '01/01/2021', 'Promoção da Saúde, Saúde do Adolescente, Saúde Mental'),
(2, 'Atenção a Saúde Mental no Município de Sobral - CE', 'Quinderé, Paulo Henrique Dias', ' Universidade Estadual do Ceará, Fortaleza, CE, Brasil', '', 2008, '01/01/2008', 'Assistência em Saúde Mental , Níveis de Atenção à Saúde , Prestação Integrada de Cuidados de Saúde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `misc`
--

CREATE TABLE `misc` (
  `idMisc` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Author` varchar(150) DEFAULT NULL,
  `Howpublished` varchar(100) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phdthesis`
--

CREATE TABLE `phdthesis` (
  `idPhdthesis` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `phdthesis`
--
-- Artigos Padronizados, apenas o primeiro foi Verificado
INSERT INTO `phdthesis` (`idPhdthesis`, `Title`, `Authors`, `School`, `Year`, `Type`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, 'Experiências das Famílias com Usuários Atendidos nos Dispositivos de Atenção Psicossocial', 'Barros, Márcia Maria Mont´Alverne', '', 2012, '', '09/12/2012', 'Família, Pesquisa Qualitativa, Saúde Mental'),
(2, 'Trabalho e Saúde Mental em Profissionais da Atenção Básica: A Experiência de Sobral, Ceará.', 'Farias, Mariana Ramalho', ' Universidade Estadual do Ceará, Fortaleza, CE, Brasil', 2015, '', '01/01/2015', 'Atenção Primária à Saúde, Saúde do Trabalhador, Saúde Mental');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idBook`);

--
-- Indexes for table `inproceedings`
--
ALTER TABLE `inproceedings`
  ADD PRIMARY KEY (`idInproceedings`);

--
-- Indexes for table `mastersthesis`
--
ALTER TABLE `mastersthesis`
  ADD PRIMARY KEY (`idMastersThesis`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`idMisc`);

--
-- Indexes for table `phdthesis`
--
ALTER TABLE `phdthesis`
  ADD PRIMARY KEY (`idPhdthesis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mastersthesis`
--
ALTER TABLE `mastersthesis`
  MODIFY `idMastersThesis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
