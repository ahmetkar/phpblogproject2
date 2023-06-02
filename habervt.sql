-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Eyl 2015, 14:14:25
-- Sunucu sürümü: 5.6.26
-- PHP Sürümü: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `habervt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anketcevap`
--

CREATE TABLE IF NOT EXISTS `anketcevap` (
  `id` int(11) NOT NULL,
  `secilencevap` varchar(200) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `anketid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `anketcevap`
--

INSERT INTO `anketcevap` (`id`, `secilencevap`, `ip`, `anketid`) VALUES
(4, 'besiktas', '::1', 2),
(6, 'saadet-partisi', '::1', 3),
(7, 'iyi', '::1', 1),
(8, 'fenerbahce', '::1', 2),
(9, 'besiktas', '::1', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anketler`
--

CREATE TABLE IF NOT EXISTS `anketler` (
  `id` int(11) NOT NULL,
  `soru` varchar(200) NOT NULL,
  `cevap1` varchar(230) NOT NULL,
  `cevap2` varchar(230) NOT NULL,
  `cevap3` varchar(230) DEFAULT NULL,
  `cevap4` varchar(230) DEFAULT NULL,
  `cevap5` varchar(230) DEFAULT NULL,
  `cevap6` varchar(230) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `anketler`
--

INSERT INTO `anketler` (`id`, `soru`, `cevap1`, `cevap2`, `cevap3`, `cevap4`, `cevap5`, `cevap6`) VALUES
(1, 'Sitemizi nasıl buldunuz ?', 'İyi', 'İdare eder', 'Kötü', '0', '0', '0'),
(2, 'Hangi takımlısınız ?', 'Beşiktaş', 'Fenerbahçe', 'Galatasaray', 'Trabzonspor', 'Osmanlıspor', 'Diğer'),
(3, 'Yarın seçim olsa hangi partiye oy verirdiniz ?', 'MHP', 'Saadet partisi', 'Akparti', 'CHP', 'BBP', 'Diğer'),
(4, 'Sosyal medyayı neden kullanırsınız ?', 'Canım sıkıldığı için', 'Öylesine', 'Fikrimi yaymak için', 'İletişim için', 'Öylesine', 'Vakit geçirmek için');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galerieleman`
--

CREATE TABLE IF NOT EXISTS `galerieleman` (
  `id` int(11) NOT NULL,
  `galeriid` int(11) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `resimurl` varchar(150) NOT NULL,
  `etiketler` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `galerieleman`
--

INSERT INTO `galerieleman` (`id`, `galeriid`, `aciklama`, `resimurl`, `etiketler`) VALUES
(1, 1, 'Deneme  eleman 1', '/pro/assets/resim/hd1.jpg', 'deneme,resim'),
(2, 1, 'Deneme  eleman 2', '/pro/assets/resim/hd1.jpg', 'deneme,resim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelenmesajlar`
--

CREATE TABLE IF NOT EXISTS `gelenmesajlar` (
  `id` int(11) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `tarih` varchar(250) NOT NULL,
  `adsoyad` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mesaj` varchar(250) NOT NULL,
  `katagori` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gelenmesajlar`
--

INSERT INTO `gelenmesajlar` (`id`, `ip`, `tarih`, `adsoyad`, `email`, `mesaj`, `katagori`) VALUES
(1, '::1', '12.09.2015', 'Ahmet kar', 'mg_ahmetkar@hotmail.com', 'Merhaba bu bir denemedir ', 'Bağzı şeyler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberislem`
--

CREATE TABLE IF NOT EXISTS `haberislem` (
  `id` int(11) NOT NULL,
  `haberid` int(11) NOT NULL,
  `iyi` int(11) NOT NULL,
  `kotu` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `haberislem`
--

INSERT INTO `haberislem` (`id`, `haberid`, `iyi`, `kotu`, `ip`) VALUES
(1, 1, 1, 0, '::1'),
(2, 6, 0, 1, '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE IF NOT EXISTS `haberler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(225) NOT NULL,
  `metin` text NOT NULL,
  `aciklama` varchar(180) NOT NULL,
  `tik` int(11) NOT NULL DEFAULT '0',
  `etiketler` varchar(220) NOT NULL,
  `tarih` varchar(180) NOT NULL,
  `resimurl` varchar(225) NOT NULL,
  `katagoriid` int(11) NOT NULL,
  `perma` varchar(180) NOT NULL,
  `slider` int(11) NOT NULL DEFAULT '0',
  `ust` int(11) NOT NULL DEFAULT '0',
  `katagoriperma` varchar(140) NOT NULL,
  `hedef` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `baslik`, `metin`, `aciklama`, `tik`, `etiketler`, `tarih`, `resimurl`, `katagoriid`, `perma`, `slider`, `ust`, `katagoriperma`, `hedef`) VALUES
(1, 'Deneme haber', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 2, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 1, 'denemehaber', 1, 2, '', 'http://localhost/pro/denemehaber_1.html'),
(2, 'Deneme haber 2', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 1, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 2, 'deneme-haber-2', 1, 2, '', 'http://localhost/pro/deneme-haber-2_2.html'),
(3, 'Deneme haber 3', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 3, 'deneme-haber-3', 0, 1, '', 'http://localhost/pro/deneme-haber-3_3.html'),
(4, 'Deneme haber 4', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 4, 'deneme-haber-4', 0, 1, '', 'http://localhost/pro/deneme-haber-4_4.html'),
(5, 'Haberdir bu bir 5', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik', '09.10.2015', '/pro/assets/resim/hd1.jpg', 5, 'deneme-haber-5', 0, 2, '', 'http://localhost/pro/deneme-haber-5_5.html'),
(6, 'Deneme haber işte 6', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 6, 'deneme-haber-6', 0, 2, '', 'http://localhost/pro/deneme-haber-6_6.html'),
(7, 'Deneme haber işte 7', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 1, 'deneme-haber-7', 0, 3, '', 'http://localhost/pro/deneme-haber-7_7.html'),
(8, 'Deneme haber işte 8', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 1, 'deneme-haber-8', 0, 3, '', 'http://localhost/pro/deneme-haber-8_8.html'),
(9, 'Deneme haber işte 9', 'Deneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haberDeneme haber', 'B bir deneme haberdir deneme içerik', 0, 'deneme,haber,içerik,bu bir denemedir', '09.10.2015', '/pro/assets/resim/hd1.jpg', 1, 'deneme-haber-9', 0, 3, '', 'http://localhost/pro/deneme-haber-9_9.html');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberyorum`
--

CREATE TABLE IF NOT EXISTS `haberyorum` (
  `id` int(11) NOT NULL,
  `haberid` int(11) NOT NULL,
  `adsoyad` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `yorum` varchar(350) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `onay` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `haberyorum`
--

INSERT INTO `haberyorum` (`id`, `haberid`, `adsoyad`, `email`, `yorum`, `ip`, `onay`, `ses`) VALUES
(2, 1, 'Deneme kişi', 'mg_ahmet@hotmail.com', 'Bu bir deneme yorumdur.', '::1', 1, 0),
(3, 3, 'Deneme kişi', 'mgdeneme@gmail.com', 'bu bir deneme yorumdur ', '::1', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katagoriler`
--

CREATE TABLE IF NOT EXISTS `katagoriler` (
  `id` int(11) NOT NULL,
  `katagoriad` varchar(180) NOT NULL,
  `altkatagori` int(11) NOT NULL DEFAULT '0',
  `altkatagoriid` int(11) NOT NULL,
  `perma` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `katagoriler`
--

INSERT INTO `katagoriler` (`id`, `katagoriad`, `altkatagori`, `altkatagoriid`, `perma`) VALUES
(1, 'Gündem', 0, 0, 'gundem'),
(2, 'Spor', 0, 0, 'spor'),
(3, 'Siyaset', 0, 0, 'siyaset'),
(4, 'Ekonomi', 0, 0, 'ekonomi'),
(5, 'Dünya', 0, 0, 'dunya'),
(6, 'Teknoloji', 0, 0, 'teknoloji'),
(7, 'Kültür sanat', 0, 0, 'kultur-sanat\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimgaleri`
--

CREATE TABLE IF NOT EXISTS `resimgaleri` (
  `id` int(11) NOT NULL,
  `baslik` varchar(150) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `perma` varchar(180) NOT NULL,
  `etiketler` varchar(250) NOT NULL,
  `tik` int(11) NOT NULL DEFAULT '0',
  `tarih` varchar(150) NOT NULL,
  `resimurl` varchar(225) NOT NULL,
  `hedef` varchar(125) NOT NULL,
  `ust` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `resimgaleri`
--

INSERT INTO `resimgaleri` (`id`, `baslik`, `aciklama`, `perma`, `etiketler`, `tik`, `tarih`, `resimurl`, `hedef`, `ust`) VALUES
(1, 'Deneme Resim galeri 1', 'Yeni bir resim galeri aciklaması deneme ', 'resim-galeri-1', 'resim,galeri,deneme', 0, '09.10.2015', '/pro/assets/resim/hd1.jpg', 'http://localhost/pro/galeri/1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rgislem`
--

CREATE TABLE IF NOT EXISTS `rgislem` (
  `id` int(11) NOT NULL,
  `galeriid` int(11) NOT NULL,
  `iyi` int(11) NOT NULL,
  `kotu` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rgislem`
--

INSERT INTO `rgislem` (`id`, `galeriid`, `iyi`, `kotu`, `ip`) VALUES
(3, 1, 1, 0, '::1'),
(4, 1, 1, 0, '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rgyorum`
--

CREATE TABLE IF NOT EXISTS `rgyorum` (
  `id` int(11) NOT NULL,
  `rgaleriid` int(11) NOT NULL,
  `adsoyad` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `yorum` varchar(350) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `onay` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rgyorum`
--

INSERT INTO `rgyorum` (`id`, `rgaleriid`, `adsoyad`, `email`, `yorum`, `ip`, `onay`, `ses`) VALUES
(1, 1, 'deneme', 'deneme@gmail.com', '>Yorum yapmak güzeldir.<', '::1', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL,
  `kadi` varchar(150) NOT NULL,
  `sifre` varchar(150) NOT NULL,
  `yasadigiyer` varchar(150) NOT NULL,
  `egitim` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `adsoyad` varchar(150) NOT NULL,
  `resimurl` varchar(200) NOT NULL,
  `tarih` varchar(150) NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kadi`, `sifre`, `yasadigiyer`, `egitim`, `email`, `adsoyad`, `resimurl`, `tarih`, `online`) VALUES
(2, 'ahmetkar', 'katilx027/x', 'Gaziantep', 'Lise', 'mg_ahmet@hotmail.com', 'Ahmet kar', '/pro/assets/resim/hd1.jpg', '05.09.2015', 1),
(3, 'guest', 'katil12345', '', '', 'guest_arda@hotmail.com', 'Guest kişi', '', '05.09.2015', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vgislem`
--

CREATE TABLE IF NOT EXISTS `vgislem` (
  `id` int(11) NOT NULL,
  `galeriid` int(11) NOT NULL,
  `iyi` int(11) NOT NULL,
  `kotu` int(11) NOT NULL,
  `ip` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `vgislem`
--

INSERT INTO `vgislem` (`id`, `galeriid`, `iyi`, `kotu`, `ip`) VALUES
(1, 1, 1, 0, '::1'),
(2, 1, 1, 0, '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vgyorum`
--

CREATE TABLE IF NOT EXISTS `vgyorum` (
  `id` int(11) NOT NULL,
  `vgaleriid` int(11) NOT NULL,
  `adsoyad` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `yorum` varchar(350) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `onay` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `vgyorum`
--

INSERT INTO `vgyorum` (`id`, `vgaleriid`, `adsoyad`, `email`, `yorum`, `ip`, `onay`, `ses`) VALUES
(1, 1, 'Ahmet kar', 'mg_ahmetkar@hotmail.com', 'Merhaba dostlar<', '::1', 1, 0),
(2, 1, 'Ahmet kar', 'mg_ahmet@hotmail.com', 'deneme yorum', '2', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videogaleri`
--

CREATE TABLE IF NOT EXISTS `videogaleri` (
  `id` int(11) NOT NULL,
  `baslik` varchar(200) NOT NULL,
  `aciklama` varchar(180) NOT NULL,
  `videourl` varchar(250) NOT NULL,
  `etiketler` varchar(250) NOT NULL,
  `resimurl` varchar(250) NOT NULL,
  `perma` varchar(150) NOT NULL,
  `tik` int(11) NOT NULL DEFAULT '0',
  `tarih` varchar(150) NOT NULL,
  `hedef` varchar(125) NOT NULL,
  `ust` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `videogaleri`
--

INSERT INTO `videogaleri` (`id`, `baslik`, `aciklama`, `videourl`, `etiketler`, `resimurl`, `perma`, `tik`, `tarih`, `hedef`, `ust`) VALUES
(1, 'Video eleman 1', 'Yeni bir video', 'http://youtube.com/embed/A11S12D1', 'yeni,video,işte,deneme', '/pro/assets/resim/hd1.jpg', 'video-eleman-1', 0, '09.10.2015', 'http://localhost/pro/video/1', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anketcevap`
--
ALTER TABLE `anketcevap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `anketler`
--
ALTER TABLE `anketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galerieleman`
--
ALTER TABLE `galerieleman`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelenmesajlar`
--
ALTER TABLE `gelenmesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberislem`
--
ALTER TABLE `haberislem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberyorum`
--
ALTER TABLE `haberyorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `katagoriler`
--
ALTER TABLE `katagoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimgaleri`
--
ALTER TABLE `resimgaleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rgislem`
--
ALTER TABLE `rgislem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rgyorum`
--
ALTER TABLE `rgyorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `vgislem`
--
ALTER TABLE `vgislem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `vgyorum`
--
ALTER TABLE `vgyorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `videogaleri`
--
ALTER TABLE `videogaleri`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anketcevap`
--
ALTER TABLE `anketcevap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `anketler`
--
ALTER TABLE `anketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `galerieleman`
--
ALTER TABLE `galerieleman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `gelenmesajlar`
--
ALTER TABLE `gelenmesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `haberislem`
--
ALTER TABLE `haberislem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `haberyorum`
--
ALTER TABLE `haberyorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `katagoriler`
--
ALTER TABLE `katagoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `resimgaleri`
--
ALTER TABLE `resimgaleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `rgislem`
--
ALTER TABLE `rgislem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `rgyorum`
--
ALTER TABLE `rgyorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `vgislem`
--
ALTER TABLE `vgislem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `vgyorum`
--
ALTER TABLE `vgyorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `videogaleri`
--
ALTER TABLE `videogaleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
