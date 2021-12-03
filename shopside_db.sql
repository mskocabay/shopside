-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Ara 2021, 20:25:00
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `shopside_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `price` float NOT NULL,
  `is_discount` tinyint(1) NOT NULL,
  `on_sale` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `product_title`, `product_description`, `price`, `is_discount`, `on_sale`) VALUES
(1, 'test', 'test ürünü', 125, 1, 1),
(2, 'test2', 'test2desc', 345, 1, 1),
(3, 'dsfsdf', 'fsdfs', 444, 1, 1),
(4, 'sdsa', 'dasda', 333, 1, 1),
(5, 'esdfdsf', 'dsfsdf', 444, 1, 1),
(6, 'sdsad', 'dasd', 444, 1, 1),
(7, 'dfds', 'fdsf', 4444, 1, 1),
(8, 'dfdsd', 'fdsf', 4444, 1, 1),
(9, 'dfdsdhhhh', 'fdsf', 4444, 1, 1),
(10, 'eee', 'eee', 555, 1, 1),
(11, 'dfdfdfd', 'dfdfdfdf', 44, 1, 1),
(12, 'ccc', 'ccc', 4444, 1, 1),
(13, 'nnn', 'nnn', 444, 1, 1),
(14, 'rrr', 'rrr', 555, 1, 1),
(15, 'aaaa', 'aaaa', 44444, 1, 1),
(16, 'bbvbvbv', 'bvbv', 444, 1, 1),
(17, 'bbbbbbbbbbbbbb', 'bbbbbbbbbbbbbbbb', 555, 1, 1),
(18, 'bbbbbbbbbbbbbbcccc', 'bbbbbbbbbbbbbbbb', 555, 1, 1),
(19, 'ccccccc', 'cccccccccccc', 444, 1, 1),
(20, 'qqqq', 'qqq', 333, 1, 0),
(21, 'mmmmmm', 'mmmmmmmmm', 34555, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `email`, `password`) VALUES
(1, 'admin@shopside.io', '827ccb0eea8a706c4c34a16891f84e7b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
