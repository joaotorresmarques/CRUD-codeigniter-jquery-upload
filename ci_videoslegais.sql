-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Ago-2018 às 11:40
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_videoslegais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nome` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nome`) VALUES
(1, 'Animais'),
(2, 'Acidentes'),
(3, 'Classicos'),
(4, 'Divertidos'),
(5, 'Bebados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_email` varchar(100) DEFAULT NULL,
  `usu_nome` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `usu_senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_email`, `usu_nome`, `usu_senha`) VALUES
(1, 'joaomarcos1@outlook.com', 'Joao Torres', '123'),
(2, 'Reginaldo@rossi.com', 'Reginaldo Rossi', 'barbarbar'),
(3, 'bandaaloba@banda.com', 'Banda ', '123465789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT,
  `vid_titulo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `vid_descricao` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `vid_data` datetime DEFAULT NULL,
  `vid_autor` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `vid_video` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`vid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`vid_id`, `vid_titulo`, `vid_descricao`, `vid_data`, `vid_autor`, `vid_video`) VALUES
(15, 'Prédio é descolado de outro', 'Um prédio situado na cidade de veneza na italia caiu devido as fortes chuvas no local', '2018-08-21 22:48:18', '1', '22481821-08-18predio-descolou-do-outro.mp4'),
(16, 'Rato tomando banho bomba no whatsapp', 'Um video de um rato está bombando no whats. Segundo biologos, o video passa a ser maus tratos.', '2018-08-21 22:49:06', '1', '22490621-08-18rato-tomando-banho.mp4'),
(18, 'Alimentador de cobras, você teria coragem?!', 'Um video circulando na internet está deixando os internautas de cabelo em pé. Voce teria coragem de aceitar o emprego para alimentar cobras? ', '2018-08-22 20:24:53', '1', '20245322-08-18o-emprego-que-ninguem-quer.mp4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
