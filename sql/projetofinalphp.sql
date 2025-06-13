-- phpMyAdmin SQL Dump
-- Versão: 5.2.1
-- Site: https://www.phpmyadmin.net/

-- Configurações iniciais
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Banco de dados: `projetofinalphp`
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `projetofinalphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projetofinalphp`;

-- --------------------------------------------------------
-- Tabela: `musicas`
-- --------------------------------------------------------
CREATE TABLE `musicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` int(11) NOT NULL,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`),
  `nome` varchar(50) NOT NULL,
  `artista` varchar(50) NOT NULL,
  `album` varchar(50) NOT NULL,
  `duracao` time NOT NULL,
  `genero` varchar(20) NOT NULL,
  `data_criacao` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabela de musicas';

-- --------------------------------------------------------
-- Tabela: `usuarios`
-- --------------------------------------------------------
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login` varchar(50) NOT NULL UNIQUE,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabela de usuarios';

-- --------------------------------------------------------
-- Finalização
-- --------------------------------------------------------
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;