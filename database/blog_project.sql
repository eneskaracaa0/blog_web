-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Haz 2023, 14:53:30
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog_project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `explanation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `explanation`) VALUES
(1, 'backend', 'arka yüz geliştirici.'),
(2, 'frontend', 'ön yüz geliştirici diller.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `low_category`
--

CREATE TABLE `low_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `explanation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `low_category`
--

INSERT INTO `low_category` (`id`, `category_id`, `name`, `explanation`) VALUES
(1, 1, 'php', 'sunucu taraflı proje geliştirmek için kullanılan script dil.'),
(2, 2, 'javascript', 'kullanıcı tarafında etkileşimli web sayfaları oluşturmak için kullanılan dildir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'enes', 'karaca', 'eneskaraca18@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'ahmet', 'karaca', 'ahmet@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'ali', 'aslan', 'ali@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'ali', 'aslan', 'ali@hotmail.com', '123'),
(5, 'ali', 'aslan', 'ali@hotmail.com', '123'),
(6, 'ali', 'aslan', 'ali@hotmail.com', '123'),
(7, 'ali', 'aslan', 'ali@hotmail.com', '123'),
(8, 'ali', 'karaca', 'aslan@hotmail.com', '123'),
(9, 'ali', 'karaca', 'aslan@hotmail.com', '123'),
(10, 'ali', 'karaca', 'aslan@hotmail.com', '123'),
(11, 'ali', 'karaca', 'aslan@hotmail.com', '123'),
(12, 'ali', 'karaca', 'aslan@hotmail.com', '123'),
(13, 'ali', 'karaca', 'aslan@hotmail.com', '123'),
(14, 'deneme', 'deneme', 'deneme@gmail.com', '123'),
(15, 'deneme', 'deneme', 'deneme@gmail.com', '123'),
(16, 'deneme', 'deneme', 'deneme@gmail.com', '123'),
(17, 'deneme', 'deneme', 'deneme@gmail.com', '123'),
(18, 'ayşe', 'çakmak', 'ayse@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'üye');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_auth`
--

CREATE TABLE `role_auth` (
  `member_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `role_auth`
--

INSERT INTO `role_auth` (`member_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(13, 1),
(17, 1),
(18, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `contents` text NOT NULL,
  `text_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `text`
--

INSERT INTO `text` (`id`, `title`, `contents`, `text_date`, `image`, `category_id`) VALUES
(2, 'Backend Programlama Dilleri', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est fugiat repellendus rem minus, nisi nihil facere aut fuga itaque assumenda mollitia dolore, quam rerum magni iure. Aliquid dolor fugiat voluptas.', '2023-06-15 21:43:50', 'phpp.png', 1),
(3, 'Frontend Dilleri', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate tempora laborum reiciendis quis omnis, suscipit repellendus illum odio aliquam quam, iure nemo ratione provident? Corporis dolores ipsa illo qui quibusdam.', '2023-06-15 21:50:52', 'js.png', 2),
(4, 'Angular\'ı yakından Tanıyalım mı?', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate tempora laborum reiciendis quis omnis, suscipit repellendus illum odio aliquam quam, iure nemo ratione provident? Corporis dolores ipsa illo qui quibusdam.', '2023-06-15 22:17:02', 'angular.png', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `low_category`
--
ALTER TABLE `low_category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Tablo için indeksler `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `low_category`
--
ALTER TABLE `low_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
