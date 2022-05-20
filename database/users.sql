-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Oca 2022, 02:15:44
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `users`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `carname` varchar(1000) NOT NULL,
  `year` int(4) NOT NULL,
  `color` varchar(1000) NOT NULL,
  `price` int(15) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `fueltype` varchar(50) NOT NULL,
  `engine` varchar(50) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `carphoto` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cars`
--

INSERT INTO `cars` (`car_id`, `user_id`, `model`, `carname`, `year`, `color`, `price`, `distance`, `fueltype`, `engine`, `transmission`, `carphoto`) VALUES
(51, 51, 'Renault', 'Renault Clio', 2019, 'White', 40000, '42000', 'Gasoline', '0.9 + Turbo', 'Manuel', 'clio.jpg'),
(52, 51, 'Bugatti', 'Bugatti Chiron', 2021, 'Blue', 8500000, '50', 'Gasoline', '8.0', 'Automatic', 'indir.jpg'),
(53, 52, 'Volkswagen', 'Volkswagen Golf', 2016, 'Tungsten Gray', 30000, '50000', 'Gasoline', '1.4 TSI 125 HP', 'Manuel', 'Snapchat1349205380.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `car_id`, `firstName`, `comment`) VALUES
(62, 51, 51, 'kutay', 'Arabada önceki sahibinden 1000 tl lik hasar kaydı bulunmaktadır. Araç temiz kullanılmıştır, şimdiden'),
(63, 51, 51, 'kutay', 'Perfect car\r\n'),
(64, 52, 51, 'deniz', 'yeni sahibine hayırlı olsun'),
(65, 52, 52, 'deniz', 'Dünyada daha iyi bir araba yok');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `user_id`, `car_id`) VALUES
(117, 52, 51),
(118, 52, 52);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `photos`
--

CREATE TABLE `photos` (
  `user_id` int(11) NOT NULL,
  `photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `photos`
--

INSERT INTO `photos` (`user_id`, `photo`) VALUES
(51, 'crop.jpg'),
(52, 'golf.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `registration`
--

CREATE TABLE `registration` (
  `user_id` int(6) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `number` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `registration`
--

INSERT INTO `registration` (`user_id`, `firstName`, `lastName`, `email`, `password`, `number`) VALUES
(51, 'kutay', 'Bilgiç', 'kutaybilgic_fb@hotmail.com', '123', 5302680572),
(52, 'deniz', 'koç', 'denizkocme@gmail.com', '12345', 839210382913);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`);

--
-- Tablo için indeksler `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Tablo için AUTO_INCREMENT değeri `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Tablo için AUTO_INCREMENT değeri `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
