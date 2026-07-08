-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Tem 2026, 19:23:51
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `okul_mbp_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE `ogrenciler` (
  `id` int(11) NOT NULL,
  `okul_no` varchar(20) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `ders_adi` varchar(100) NOT NULL,
  `vize` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `odev` int(11) NOT NULL,
  `proje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`id`, `okul_no`, `ad_soyad`, `ders_adi`, `vize`, `final`, `odev`, `proje`) VALUES
(1, '25001', 'Ali Yılmaz', 'Web Programlama', 70, 80, 90, 85),
(2, '25002', 'Ayşe Demir', 'Web Programlama', 45, 50, 60, 70),
(3, '25003', 'Mehmet Kaya', 'Web Programlama', 30, 40, 55, 50),
(4, '25004', 'Zeynep Arslan', 'Web Programlama', 90, 95, 85, 100),
(5, '25005', 'Can Kaya', 'Web Programlama', 55, 45, 60, 50);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
