-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 11 Şub 2018, 14:28:33
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kordinat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hkordinat`
--

DROP TABLE IF EXISTS `hkordinat`;
CREATE TABLE IF NOT EXISTS `hkordinat` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `x` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `y` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(11) NOT NULL,
  `onay` int(11) NOT NULL,
  `aciklama` varchar(140) COLLATE utf8_turkish_ci NOT NULL,
  `gonderenkul` int(11) NOT NULL,
  `yapi` int(11) NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hkordinat`
--

INSERT INTO `hkordinat` (`sira`, `x`, `y`, `menu_sira`, `onay`, `aciklama`, `gonderenkul`, `yapi`) VALUES
(49, '-6.664607562172573', '12.656250000000002', 21, 1, '', 1, 2),
(50, '23.07973176244989', '46.58203125000001', 22, 1, '', 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `kul_adi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `kul_sifre` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `ad` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `mails` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`sira`, `kul_adi`, `kul_sifre`, `yetki`, `ad`, `soyad`, `mails`) VALUES
(1, 'yazar', '1234', 3, 'Asım', 'Atasert', 'asim@gmail.com'),
(2, 'mod', '123', 2, 'Abdulziraatbankası', 'cimcime', 'c41@gmail.com'),
(3, 'admin', '123', 1, 'kingosmanh2o', 'kralhadesselena', 'c412@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `map_group`
--

DROP TABLE IF EXISTS `map_group`;
CREATE TABLE IF NOT EXISTS `map_group` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `resim_url` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `map_group`
--

INSERT INTO `map_group` (`sira`, `resim_url`) VALUES
(1, 'images/layers.png'),
(2, 'images/layers.png'),
(3, 'images/layers.png'),
(4, 'images/layers.png'),
(5, 'images/layers.png'),
(6, 'images/layers.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `map_menu`
--

DROP TABLE IF EXISTS `map_menu`;
CREATE TABLE IF NOT EXISTS `map_menu` (
  `sira` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`sira`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `map_menu`
--

INSERT INTO `map_menu` (`sira`, `adi`, `groupid`) VALUES
(22, 'Reed Stem', 3),
(21, 'Wild Mint', 3),
(20, 'Melon', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
