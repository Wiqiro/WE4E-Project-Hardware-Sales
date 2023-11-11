-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2023 at 04:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IMBERT-CHANSON`
--
CREATE DATABASE IF NOT EXISTS `IMBERT-CHANSON` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `IMBERT-CHANSON`;

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `nom`) VALUES
(7, 'Alimentation'),
(2, 'Carte graphique'),
(3, 'Carte mère'),
(4, 'Mémoire RAM'),
(1, 'Processeur'),
(8, 'Refroidissement'),
(6, 'Stockage HDD'),
(5, 'Stockage SSD');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `prix_total` decimal(10,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `prix_total`, `date`, `id_utilisateur`) VALUES
(1, 212.25, '2023-01-15', 1),
(2, 1178.55, '2023-02-20', 1),
(3, 2256.03, '2023-03-10', 1),
(4, 1944.47, '2023-04-05', 2),
(5, 2754.26, '2023-05-18', 2),
(6, 2137.91, '2023-06-22', 2),
(7, 2226.77, '2023-07-08', 3),
(8, 1720.12, '2023-08-30', 3),
(9, 1720.28, '2023-09-12', 4),
(10, 441.05, '2023-10-03', 4),
(11, 2444.39, '2023-11-25', 5),
(12, 2298.79, '2023-11-14', 5),
(13, 1160.80, '2023-01-05', 6),
(14, 1507.64, '2023-02-10', 6),
(15, 1055.77, '2023-03-22', 7),
(16, 555.94, '2023-04-08', 8),
(17, 2212.41, '2023-05-20', 9),
(18, 794.24, '2023-06-15', 10),
(19, 2733.94, '2023-10-03', 10),
(20, 2687.01, '2023-11-25', 11),
(21, 2233.22, '2023-11-14', 12),
(22, 2905.05, '2023-01-05', 13),
(23, 2025.59, '2023-02-10', 14),
(24, 1212.82, '2023-03-22', 15),
(25, 2587.31, '2023-04-08', 16),
(26, 698.11, '2023-05-20', 17),
(27, 1128.61, '2023-06-15', 18);

-- --------------------------------------------------------

--
-- Table structure for table `contenu_commande`
--

CREATE TABLE `contenu_commande` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contenu_commande`
--

INSERT INTO `contenu_commande` (`id_commande`, `id_produit`, `quantite`) VALUES
(1, 13, 3),
(1, 18, 1),
(1, 19, 1),
(1, 20, 2),
(1, 26, 3),
(1, 28, 1),
(1, 29, 1),
(1, 36, 2),
(1, 47, 2),
(1, 61, 2),
(2, 1, 3),
(2, 25, 2),
(2, 28, 3),
(2, 35, 2),
(2, 39, 3),
(2, 49, 2),
(2, 52, 2),
(2, 55, 3),
(3, 13, 3),
(3, 14, 3),
(3, 18, 3),
(3, 21, 1),
(3, 34, 1),
(3, 35, 1),
(3, 41, 3),
(3, 59, 1),
(4, 12, 2),
(4, 17, 3),
(4, 22, 1),
(4, 24, 1),
(4, 38, 2),
(4, 64, 2),
(5, 17, 3),
(5, 46, 3),
(5, 52, 2),
(5, 54, 2),
(5, 59, 3),
(5, 64, 1),
(6, 30, 2),
(6, 32, 3),
(6, 37, 1),
(6, 40, 1),
(6, 47, 3),
(6, 50, 1),
(6, 65, 1),
(7, 2, 2),
(7, 18, 2),
(7, 19, 3),
(7, 23, 3),
(7, 25, 1),
(7, 30, 2),
(7, 39, 1),
(7, 44, 2),
(7, 45, 2),
(7, 56, 2),
(7, 65, 1),
(8, 1, 1),
(8, 2, 1),
(8, 45, 2),
(8, 47, 2),
(8, 51, 3),
(8, 56, 1),
(8, 61, 3),
(9, 15, 1),
(9, 39, 3),
(9, 50, 3),
(9, 55, 1),
(9, 66, 3),
(10, 1, 1),
(10, 3, 1),
(10, 6, 2),
(10, 8, 2),
(10, 9, 2),
(10, 16, 1),
(10, 30, 1),
(10, 33, 2),
(11, 1, 3),
(11, 12, 3),
(11, 16, 1),
(11, 31, 1),
(11, 32, 1),
(11, 39, 3),
(11, 44, 1),
(11, 64, 2),
(12, 2, 3),
(12, 7, 1),
(12, 17, 3),
(12, 35, 1),
(12, 61, 1),
(12, 64, 2),
(12, 66, 2),
(12, 67, 3),
(13, 1, 2),
(13, 10, 2),
(13, 25, 2),
(13, 30, 3),
(13, 32, 3),
(13, 53, 2),
(13, 54, 2),
(13, 55, 2),
(13, 64, 2),
(14, 11, 1),
(14, 14, 2),
(14, 17, 3),
(14, 20, 3),
(14, 66, 2),
(15, 9, 1),
(15, 15, 2),
(15, 18, 3),
(15, 42, 2),
(15, 43, 2),
(15, 46, 3),
(15, 63, 1),
(15, 64, 1),
(16, 2, 1),
(16, 3, 2),
(16, 9, 3),
(16, 19, 3),
(16, 27, 1),
(16, 31, 2),
(16, 41, 2),
(16, 44, 2),
(16, 47, 3),
(16, 56, 2),
(16, 62, 3),
(17, 1, 1),
(17, 2, 1),
(17, 5, 2),
(17, 27, 1),
(17, 33, 2),
(17, 41, 1),
(17, 53, 1),
(17, 63, 3),
(17, 65, 3),
(18, 5, 2),
(18, 6, 2),
(18, 27, 1),
(18, 41, 1),
(18, 61, 2),
(19, 2, 3),
(19, 6, 1),
(19, 16, 1),
(19, 24, 2),
(19, 26, 3),
(19, 40, 3),
(19, 48, 2),
(19, 66, 3),
(20, 3, 3),
(20, 35, 2),
(20, 41, 3),
(20, 50, 2),
(20, 63, 2),
(21, 20, 1),
(21, 22, 1),
(21, 24, 2),
(21, 30, 3),
(21, 36, 2),
(21, 42, 3),
(21, 43, 3),
(21, 45, 1),
(21, 52, 2),
(21, 53, 2),
(21, 58, 3),
(21, 66, 2),
(22, 10, 1),
(22, 11, 2),
(22, 15, 2),
(22, 22, 1),
(22, 39, 2),
(22, 59, 1),
(22, 60, 1),
(22, 67, 2),
(23, 11, 1),
(23, 14, 2),
(23, 16, 2),
(23, 34, 3),
(23, 54, 2),
(23, 56, 3),
(24, 10, 1),
(24, 18, 3),
(24, 21, 3),
(24, 29, 2),
(24, 50, 1),
(25, 11, 1),
(25, 19, 3),
(25, 26, 1),
(25, 29, 2),
(25, 32, 2),
(25, 36, 3),
(25, 51, 1),
(25, 67, 1),
(26, 10, 3),
(26, 12, 1),
(26, 25, 3),
(26, 27, 1),
(26, 30, 2),
(26, 40, 1),
(26, 44, 2),
(26, 61, 2),
(26, 67, 1),
(27, 10, 3),
(27, 12, 3),
(27, 23, 3),
(27, 26, 1),
(27, 31, 2),
(27, 41, 1),
(27, 45, 2),
(27, 56, 1),
(27, 58, 2),
(27, 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `id_catalogue` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `id_catalogue`, `image`) VALUES
(1, 'Intel Core i9-11900K', 'Processeur puissant pour gaming', 499.99, 1, NULL),
(2, 'AMD Ryzen 9 5950X', 'Processeur haute performance avec 16 cœurs', 699.99, 1, NULL),
(3, 'Intel Core i7-11700K', 'Processeur gaming de 11e génération', 399.99, 1, NULL),
(4, 'AMD Ryzen 5 5600X', 'Processeur milieu de gamme pour gaming', 299.99, 1, '../uploads/.//18_111023155201.jpg'),
(5, 'Intel Core i5-11600K', 'Processeur gaming abordable', 279.99, 1, NULL),
(6, 'NVIDIA GeForce RTX 3080', 'Carte graphique pour gaming de nouvelle génération', 799.99, 2, NULL),
(7, 'AMD Radeon RX 6800 XT', 'Carte graphique avec ray tracing', 649.99, 2, NULL),
(8, 'NVIDIA GeForce RTX 3060', 'Carte graphique abordable pour gaming', 299.99, 2, '../uploads/.//18_111023154644.jpg'),
(9, 'AMD Radeon RX 6700 XT', 'Carte graphique de milieu de gamme', 499.99, 2, NULL),
(10, 'NVIDIA GeForce GTX 1660 Super', 'Carte graphique pour gaming budget', 229.99, 2, NULL),
(11, 'ASUS ROG Strix Z590-E', 'Carte mère gaming haut de gamme', 349.99, 3, '../uploads/.//18_111023154809.png'),
(12, 'MSI MPG B550 Gaming Edge WiFi', 'Carte mère abordable pour gaming', 169.99, 3, NULL),
(13, 'GIGABYTE B450 AORUS Elite', 'Carte mère de milieu de gamme', 129.99, 3, NULL),
(14, 'ASRock B550M Pro4', 'Carte mère micro ATX abordable', 89.99, 3, NULL),
(15, 'ASUS Prime B460M-A', 'Carte mère micro ATX budget', 79.99, 3, NULL),
(16, 'Corsair Vengeance LPX 16GB DDR4', 'Mémoire RAM rapide pour gaming', 89.99, 4, '../uploads/.//18_111023155012.jpeg'),
(17, 'G.SKILL Trident Z RGB 32GB DDR4', 'Mémoire RAM avec éclairage RGB', 149.99, 4, NULL),
(18, 'Crucial Ballistix 64GB DDR4', 'Mémoire RAM grande capacité pour multitâche', 199.99, 4, NULL),
(19, 'HyperX Fury 8GB DDR4', 'Mémoire RAM économique pour gaming', 49.99, 4, NULL),
(20, 'Team T-Force Vulcan Z 16GB DDR4', 'Mémoire RAM DDR4 abordable', 69.99, 4, NULL),
(21, 'Samsung 970 EVO Plus 1TB NVMe', 'SSD NVMe rapide pour stockage', 169.99, 5, NULL),
(22, 'WD Black SN750 500GB NVMe', 'SSD NVMe avec haute performance', 99.99, 5, NULL),
(23, 'Crucial MX500 2TB SATA', 'SSD SATA grande capacité', 229.99, 5, '../uploads/.//18_111023155751.jpg'),
(24, 'Adata XPG SX8200 Pro 256GB NVMe', 'SSD NVMe économique pour le système', 59.99, 5, NULL),
(25, 'Kingston A2000 1TB NVMe', 'SSD NVMe abordable', 119.99, 5, NULL),
(26, 'Seagate Barracuda 2TB HDD', 'Disque dur grande capacité pour stockage', 79.99, 6, '../uploads/.//18_111023155550.jpg'),
(27, 'WD Blue 1TB HDD', 'Disque dur fiable pour stockage général', 49.99, 6, NULL),
(28, 'Toshiba P300 3TB HDD', 'Disque dur économique avec grande capacité', 89.99, 6, NULL),
(29, 'Seagate FireCuda 2TB SSHD', 'SSHD avec stockage hybride', 99.99, 6, NULL),
(30, 'Hitachi Ultrastar 4TB HDD', 'Disque dur haute capacité pour stockage', 129.99, 6, NULL),
(31, 'EVGA SuperNOVA 750 G3', 'Alimentation modulaire 80 PLUS Gold', 129.99, 7, './'),
(32, 'Corsair RM850x', 'Alimentation silencieuse 80 PLUS Gold', 149.99, 7, '../uploads/.//18_111023154349.jpg'),
(33, 'Seasonic Focus GX-650', 'Alimentation haut rendement 80 PLUS Gold', 119.99, 7, NULL),
(34, 'Cooler Master MWE 650W', 'Alimentation semi-modulaire 80 PLUS Gold', 89.99, 7, NULL),
(35, 'Thermaltake Toughpower GF1 750W', 'Alimentation 80 PLUS Gold avec ventilateur silencieux', 109.99, 7, NULL),
(36, 'NZXT Kraken X63', 'Refroidissement liquide avec éclairage RGB', 159.99, 8, NULL),
(37, 'Noctua NH-D15', 'Refroidissement à air haut de gamme', 89.99, 8, NULL),
(38, 'Corsair H100i RGB Platinum', 'Refroidissement liquide RGB performant', 129.99, 8, NULL),
(39, 'Cooler Master Hyper 212 RGB', 'Refroidissement à air avec éclairage RGB', 49.99, 8, '../uploads/.//18_111023155310.jpg'),
(40, 'Arctic Freezer 34 eSports Duo', 'Refroidissement abordable avec ventilateurs doubles', 39.99, 8, NULL),
(41, 'AMD Ryzen 7 5800X', 'Processeur gaming de milieu de gamme', 349.99, 1, NULL),
(42, 'Intel Core i5-11400', 'Processeur abordable pour gaming', 199.99, 1, NULL),
(43, 'AMD Ryzen 3 3300X', 'Processeur économique pour gaming', 129.99, 1, NULL),
(44, 'Intel Core i9-10900K', 'Processeur haut de gamme pour gaming', 529.99, 1, NULL),
(45, 'AMD Ryzen 5 3600', 'Processeur polyvalent pour multitâche', 229.99, 1, NULL),
(46, 'Intel Core i3-10100', 'Processeur d entrée de gamme pour usage quotidien', 119.99, 1, NULL),
(47, 'AMD Ryzen 9 5900X', 'Processeur haute performance avec 12 cœurs', 649.99, 1, NULL),
(48, 'Intel Core i7-10700K', 'Processeur gaming de 10e génération', 379.99, 1, NULL),
(49, 'AMD Ryzen 5 5600G', 'Processeur avec graphiques intégrés', 199.99, 1, '../uploads/.//18_111023155211.jpg'),
(50, 'Intel Core i9-10850K', 'Processeur haut de gamme avec 10 cœurs', 499.99, 1, NULL),
(51, 'AMD Ryzen 7 3700X', 'Processeur de milieu de gamme pour multitâche', 299.99, 1, NULL),
(52, 'Intel Core i5-10600K', 'Processeur gaming abordable avec overclocking', 269.99, 1, NULL),
(53, 'AMD Ryzen 5 3400G', 'Processeur avec graphiques Radeon Vega intégrés', 169.99, 1, NULL),
(54, 'Intel Core i7-11700F', 'Processeur gaming sans graphiques intégrés', 349.99, 1, NULL),
(55, 'AMD Ryzen 3 3100', 'Processeur économique pour usage quotidien', 99.99, 1, NULL),
(56, 'Intel Core i9-9900K', 'Processeur gaming de 9e génération', 499.99, 1, NULL),
(57, 'AMD Ryzen 9 3900X', 'Processeur haute performance avec 12 cœurs', 449.99, 1, NULL),
(58, 'Intel Core i7-9700K', 'Processeur gaming de 9e génération', 379.99, 1, NULL),
(59, 'AMD Ryzen 5 2600', 'Processeur polyvalent pour multitâche', 159.99, 1, NULL),
(60, 'Intel Core i3-9100F', 'Processeur d entrée de gamme pour usage quotidien', 89.99, 1, NULL),
(61, 'NVIDIA GeForce RTX 3070', 'Carte graphique gaming de milieu de gamme', 599.99, 2, NULL),
(62, 'NVIDIA GeForce GTX 1650 Super', 'Carte graphique abordable pour gaming', 179.99, 2, NULL),
(63, 'AMD Radeon RX 5500 XT', 'Carte graphique avec 8 Go de GDDR6', 229.99, 2, NULL),
(64, 'NVIDIA GeForce GTX 1660 Ti', 'Carte graphique pour gaming en 1080p', 279.99, 2, NULL),
(65, 'AMD Radeon RX 5600 XT', 'Carte graphique pour gaming en haute résolution', 319.99, 2, NULL),
(66, 'NVIDIA Quadro P5000', 'Carte graphique professionnelle avec 16 Go de GDDR5X', 799.99, 2, NULL),
(67, 'AMD Radeon Pro WX 7100', 'Carte graphique professionnelle pour station de travail', 599.99, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `valeur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`id`, `id_produit`, `nom`, `valeur`) VALUES
(1, 1, 'Fréquence de base', '3.5 GHz'),
(2, 1, 'Fréquence maximale', '5.3 GHz'),
(3, 1, 'Nombre de cœurs', '8'),
(4, 2, 'Fréquence de base', '3.4 GHz'),
(5, 2, 'Fréquence maximale', '4.9 GHz'),
(6, 2, 'Nombre de cœurs', '16'),
(7, 3, 'Fréquence de base', '3.6 GHz'),
(8, 3, 'Fréquence maximale', '5.0 GHz'),
(9, 3, 'Nombre de cœurs', '8'),
(13, 5, 'Fréquence de base', '3.9 GHz'),
(14, 5, 'Fréquence maximale', '4.9 GHz'),
(15, 5, 'Nombre de cœurs', '6'),
(16, 40, 'Fréquence de base', '3.8 GHz'),
(17, 40, 'Fréquence maximale', '4.7 GHz'),
(18, 40, 'Nombre de cœurs', '8'),
(19, 41, 'Fréquence de base', '2.6 GHz'),
(20, 41, 'Fréquence maximale', '4.7 GHz'),
(21, 41, 'Nombre de cœurs', '6'),
(22, 42, 'Fréquence de base', '3.0 GHz'),
(23, 42, 'Fréquence maximale', '4.3 GHz'),
(24, 42, 'Nombre de cœurs', '4'),
(25, 43, 'Fréquence de base', '3.7 GHz'),
(26, 43, 'Fréquence maximale', '5.1 GHz'),
(27, 43, 'Nombre de cœurs', '10'),
(28, 44, 'Fréquence de base', '3.2 GHz'),
(29, 44, 'Fréquence maximale', '4.4 GHz'),
(30, 44, 'Nombre de cœurs', '6'),
(31, 45, 'Fréquence de base', '3.6 GHz'),
(32, 45, 'Fréquence maximale', '4.4 GHz'),
(33, 45, 'Nombre de cœurs', '6'),
(34, 46, 'Fréquence de base', '3.8 GHz'),
(35, 46, 'Fréquence maximale', '4.9 GHz'),
(36, 46, 'Nombre de cœurs', '12'),
(37, 47, 'Fréquence de base', '3.8 GHz'),
(38, 47, 'Fréquence maximale', '5.1 GHz'),
(39, 47, 'Nombre de cœurs', '8'),
(40, 48, 'Fréquence de base', '3.9 GHz'),
(41, 48, 'Fréquence maximale', '4.9 GHz'),
(42, 48, 'Nombre de cœurs', '6'),
(46, 50, 'Fréquence de base', '3.5 GHz'),
(47, 50, 'Fréquence maximale', '4.7 GHz'),
(48, 50, 'Nombre de cœurs', '6'),
(49, 51, 'Fréquence de base', '3.7 GHz'),
(50, 51, 'Fréquence maximale', '4.6 GHz'),
(51, 51, 'Nombre de cœurs', '4'),
(52, 52, 'Fréquence de base', '3.6 GHz'),
(53, 52, 'Fréquence maximale', '5.0 GHz'),
(54, 52, 'Nombre de cœurs', '6'),
(55, 53, 'Fréquence de base', '3.5 GHz'),
(56, 53, 'Fréquence maximale', '4.9 GHz'),
(57, 53, 'Nombre de cœurs', '4'),
(58, 54, 'Fréquence de base', '3.6 GHz'),
(59, 54, 'Fréquence maximale', '5.0 GHz'),
(60, 54, 'Nombre de cœurs', '8'),
(61, 55, 'Fréquence de base', '3.7 GHz'),
(62, 55, 'Fréquence maximale', '5.1 GHz'),
(63, 55, 'Nombre de cœurs', '6'),
(64, 56, 'Fréquence de base', '3.8 GHz'),
(65, 56, 'Fréquence maximale', '4.7 GHz'),
(66, 56, 'Nombre de cœurs', '6'),
(67, 57, 'Fréquence de base', '3.9 GHz'),
(68, 57, 'Fréquence maximale', '5.0 GHz'),
(69, 57, 'Nombre de cœurs', '8'),
(70, 58, 'Fréquence de base', '3.5 GHz'),
(71, 58, 'Fréquence maximale', '4.9 GHz'),
(72, 58, 'Nombre de cœurs', '10'),
(73, 59, 'Fréquence de base', '3.2 GHz'),
(74, 59, 'Fréquence maximale', '4.4 GHz'),
(75, 59, 'Nombre de cœurs', '4'),
(76, 60, 'Fréquence de base', '3.6 GHz'),
(77, 60, 'Fréquence maximale', '4.4 GHz'),
(78, 60, 'Nombre de cœurs', '6'),
(79, 6, 'Architecture GPU', 'Ampere'),
(80, 6, 'VRAM', '10 Go GDDR6X'),
(81, 6, 'Interface mémoire', '320-bit'),
(82, 7, 'Architecture GPU', 'RDNA 2'),
(83, 7, 'VRAM', '12 Go GDDR6'),
(84, 7, 'Ray Tracing', 'Oui'),
(88, 9, 'Architecture GPU', 'RDNA'),
(89, 9, 'VRAM', '8 Go GDDR6'),
(90, 9, 'Clock Boost', '1845 MHz'),
(91, 10, 'Architecture GPU', 'Turing'),
(92, 10, 'VRAM', '6 Go GDDR6'),
(93, 10, 'CUDA Cores', '1536'),
(94, 61, 'Architecture GPU', 'Ampere'),
(95, 61, 'VRAM', '8 Go GDDR6X'),
(96, 61, 'Interface mémoire', '256-bit'),
(97, 62, 'Architecture GPU', 'RDNA 2'),
(98, 62, 'VRAM', '12 Go GDDR6'),
(99, 62, 'Ray Tracing', 'Oui'),
(100, 63, 'Architecture GPU', 'Turing'),
(101, 63, 'VRAM', '4 Go GDDR5'),
(102, 63, 'CUDA Cores', '896'),
(103, 64, 'Architecture GPU', 'RDNA'),
(104, 64, 'VRAM', '4 Go GDDR5'),
(105, 64, 'Clock Boost', '1750 MHz'),
(106, 65, 'Architecture GPU', 'Turing'),
(107, 65, 'VRAM', '6 Go GDDR5'),
(108, 65, 'CUDA Cores', '1408'),
(109, 66, 'Architecture GPU', 'RDNA'),
(110, 66, 'VRAM', '6 Go GDDR6'),
(111, 66, 'Ray Tracing', 'Non'),
(112, 67, 'Architecture GPU', 'Pascal'),
(113, 67, 'VRAM', '16 Go GDDR5X'),
(114, 67, 'CUDA Cores', '2560'),
(118, 12, 'Socket CPU', 'AM4'),
(119, 12, 'Chipset', 'AMD B550'),
(120, 12, 'Format', 'ATX'),
(121, 13, 'Socket CPU', 'AM4'),
(122, 13, 'Chipset', 'AMD B450'),
(123, 13, 'Format', 'ATX'),
(124, 14, 'Socket CPU', 'AM4'),
(125, 14, 'Chipset', 'AMD B550'),
(126, 14, 'Format', 'Micro ATX'),
(127, 15, 'Socket CPU', 'LGA 1200'),
(128, 15, 'Chipset', 'Intel B460'),
(129, 15, 'Format', 'Micro ATX'),
(133, 17, 'Capacité', '32GB'),
(134, 17, 'Type de mémoire', 'DDR4'),
(135, 17, 'Vitesse', '3600MHz'),
(136, 18, 'Capacité', '64GB'),
(137, 18, 'Type de mémoire', 'DDR4'),
(138, 18, 'Vitesse', '3200MHz'),
(139, 19, 'Capacité', '8GB'),
(140, 19, 'Type de mémoire', 'DDR4'),
(141, 19, 'Vitesse', '2666MHz'),
(142, 20, 'Capacité', '16GB'),
(143, 20, 'Type de mémoire', 'DDR4'),
(144, 20, 'Vitesse', '3000MHz'),
(145, 21, 'Capacité', '1TB'),
(146, 21, 'Interface', 'NVMe'),
(147, 21, 'Vitesse de lecture', '3500 MB/s'),
(148, 22, 'Capacité', '500GB'),
(149, 22, 'Interface', 'NVMe'),
(150, 22, 'Vitesse de lecture', '3400 MB/s'),
(154, 24, 'Capacité', '256GB'),
(155, 24, 'Interface', 'NVMe'),
(156, 24, 'Vitesse de lecture', '3500 MB/s'),
(157, 25, 'Capacité', '1TB'),
(158, 25, 'Interface', 'NVMe'),
(159, 25, 'Vitesse de lecture', '2000 MB/s'),
(163, 27, 'Capacité de stockage', '1TB'),
(164, 27, 'Interface', 'SATA 6Gb/s'),
(165, 27, 'Vitesse de rotation', '7200 RPM'),
(166, 28, 'Capacité de stockage', '3TB'),
(167, 28, 'Interface', 'SATA 6Gb/s'),
(168, 28, 'Vitesse de rotation', '7200 RPM'),
(169, 29, 'Capacité de stockage', '2TB'),
(170, 29, 'Interface', 'SATA 6Gb/s'),
(171, 29, 'Vitesse de rotation', '5400 RPM'),
(172, 30, 'Capacité de stockage', '4TB'),
(173, 30, 'Interface', 'SATA 6Gb/s'),
(174, 30, 'Vitesse de rotation', '7200 RPM'),
(181, 33, 'Puissance', '650W'),
(182, 33, 'Certification', '80 PLUS Gold'),
(183, 33, 'Modularité', 'Modulaire'),
(184, 34, 'Puissance', '650W'),
(185, 34, 'Certification', '80 PLUS Gold'),
(186, 34, 'Modularité', 'Semi-modulaire'),
(187, 35, 'Puissance', '750W'),
(188, 35, 'Certification', '80 PLUS Gold'),
(189, 35, 'Modularité', 'Modulaire'),
(190, 36, 'Type', 'Refroidissement liquide'),
(191, 36, 'Éclairage', 'RGB'),
(192, 36, 'Taille du radiateur', '280mm'),
(193, 37, 'Type', 'Refroidissement à air'),
(194, 37, 'Nombre de ventilateurs', '2'),
(195, 37, 'Taille du ventilateur', '140mm'),
(196, 38, 'Type', 'Refroidissement liquide'),
(197, 38, 'Éclairage', 'RGB'),
(198, 38, 'Taille du radiateur', '240mm'),
(202, 40, 'Type', 'Refroidissement à air'),
(203, 40, 'Nombre de ventilateurs', '2'),
(204, 40, 'Taille du ventilateur', '120mm'),
(232, 32, 'Puissance', '850W'),
(233, 32, 'Certification', '80 PLUS Gold'),
(234, 32, 'Modularité', 'Modulaire'),
(235, 31, 'Puissance', '750W'),
(236, 31, 'Certification', '80 PLUS Gold'),
(237, 31, 'Modularité', 'Modulaire'),
(238, 8, 'Architecture GPU', 'Turing'),
(239, 8, 'VRAM', '6 Go GDDR5'),
(240, 8, 'CUDA Cores', '1280'),
(241, 11, 'Socket CPU', 'LGA 1200'),
(242, 11, 'Chipset', 'Intel Z590'),
(243, 11, 'Format', 'ATX'),
(244, 16, 'Capacité', '16GB'),
(245, 16, 'Type de mémoire', 'DDR4'),
(246, 16, 'Vitesse', '3200MHz'),
(247, 4, 'Fréquence de base', '3.7 GHz'),
(248, 4, 'Fréquence maximale', '4.6 GHz'),
(249, 4, 'Nombre de cœurs', '6'),
(250, 49, 'Fréquence de base', '3.6 GHz'),
(251, 49, 'Fréquence maximale', '4.9 GHz'),
(252, 49, 'Nombre de cœurs', '8'),
(253, 39, 'Type', 'Refroidissement à air'),
(254, 39, 'Éclairage', 'RGB'),
(255, 39, 'Taille du ventilateur', '120mm'),
(256, 26, 'Capacité de stockage', '2TB'),
(257, 26, 'Interface', 'SATA 6Gb/s'),
(258, 26, 'Vitesse de rotation', '7200 RPM'),
(259, 23, 'Capacité', '2TB'),
(260, 23, 'Interface', 'SATA'),
(261, 23, 'Vitesse de lecture', '560 MB/s');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `pseudo` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `mot_de_passe` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `email`, `date_naissance`, `adresse`, `mot_de_passe`, `admin`) VALUES
(1, 'Doe', 'John', 'john_doe', 'john.doe@email.com', '1990-05-15', '123 Main St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Smith', 'Alice', 'alice_smith', 'alice.smith@email.com', '1985-08-22', '456 Oak St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Johnson', 'Bob', 'bob_johnson', 'bob.johnson@email.com', '1982-12-10', '789 Pine St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'Williams', 'Emma', 'emma_williams', 'emma.williams@email.com', '1995-03-28', '101 Elm St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'Jones', 'Charlie', 'charlie_jones', 'charlie.jones@email.com', '1988-06-05', '202 Maple St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, 'Brown', 'Olivia', 'olivia_brown', 'olivia.brown@email.com', '1992-09-17', '303 Birch St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, 'Miller', 'Daniel', 'daniel_miller', 'daniel.miller@email.com', '1980-02-14', '404 Cedar St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'Davis', 'Sophia', 'sophia_davis', 'sophia.davis@email.com', '1987-07-31', '505 Walnut St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, 'Garcia', 'Ethan', 'ethan_garcia', 'ethan.garcia@email.com', '1998-01-08', '606 Pine St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(10, 'Rodriguez', 'Mia', 'mia_rodriguez', 'mia.rodriguez@email.com', '1993-04-25', '707 Oak St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(11, 'Martinez', 'Liam', 'liam_martinez', 'liam.martinez@email.com', '1984-11-12', '808 Maple St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, 'Hernandez', 'Ava', 'ava_hernandez', 'ava.hernandez@email.com', '1996-06-30', '909 Birch St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(13, 'Lopez', 'Noah', 'noah_lopez', 'noah.lopez@email.com', '1983-09-19', '1010 Cedar St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(14, 'Gonzalez', 'Isabella', 'isabella_gonzalez', 'isabella.gonzalez@email.com', '1994-02-05', '1111 Walnut St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(15, 'Wilson', 'Logan', 'logan_wilson', 'logan.wilson@email.com', '1986-05-22', '1212 Pine St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(16, 'Anderson', 'Ella', 'ella_anderson', 'ella.anderson@email.com', '1997-10-10', '1313 Oak St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(17, 'Thomas', 'James', 'james_thomas', 'james.thomas@email.com', '1981-03-18', '1414 Maple St', 'e10adc3949ba59abbe56e057f20f883e', 0),
(18, 'William', 'Imbert', 'wiqiro', 'wiqiro@email.com', '1999-08-08', '1515 Birch St', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `contenu_commande`
--
ALTER TABLE `contenu_commande`
  ADD PRIMARY KEY (`id_commande`,`id_produit`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `id_catalogue` (`id_catalogue`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contenu_commande`
--
ALTER TABLE `contenu_commande`
  ADD CONSTRAINT `contenu_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenu_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_catalogue`) REFERENCES `catalogue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specification`
--
ALTER TABLE `specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
