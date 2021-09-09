-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 May 2020, 15:14:05
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arabalar`
--

CREATE TABLE `arabalar` (
  `a_id` int(10) NOT NULL,
  `resim` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `plaka` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aciklama` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `marka` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `seri` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `vitestipi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yakittipi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `km` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `renk` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gunluk` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `haftalik` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aylik` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'musait',
  `a_sira` int(10) NOT NULL DEFAULT 0,
  `silindimi` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `arabalar`
--

INSERT INTO `arabalar` (`a_id`, `resim`, `plaka`, `aciklama`, `marka`, `seri`, `model`, `vitestipi`, `yakittipi`, `km`, `renk`, `gunluk`, `haftalik`, `aylik`, `durum`, `a_sira`, `silindimi`) VALUES
(1, 'aracresim/22834308532098131908car.jpg', '06ank199', 'araba', 'audi', 'q4', '2000', 'Otomatik', 'Dizel', '5000', 'mavi', '120', '130', '140', 'Musait', 0, 0),
(2, 'aracresim/24241299762440121906tfs.jpg', '35ist122', 'tofaş', 'tofaş', 'tfs3', '1999', 'Manuel', 'Benzin', '100000', 'beyaz', '60', '50', '40', 'Kirada', 1, 0),
(3, 'aracresim/23295221012385727268about-img.jpg', '21312asd', 'asdsad', 'asdsa', 'asdsa', '21321', 'Otomatik', 'Dizel', '1111', 'adsa', '11', '1', '1', 'musait', 34, 0),
(4, '', '05PK331', '', 'GOLF', 'MF3', '2019', 'Manuel', 'Dizel', '5000', 'Mavi', '120', '110', '100', 'musait', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(10) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda` varchar(5000) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_telefon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keyword` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_face` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_footer` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `ayar_logo`, `hakkimizda`, `ayar_telefon`, `ayar_title`, `ayar_aciklama`, `ayar_keyword`, `ayar_face`, `ayar_twitter`, `ayar_footer`, `ayar_adres`, `ayar_mail`) VALUES
(1, 'uploads/28570270242518027315logo.png', '<p>Ara&ccedil; Kiralama Yapıyoruz</p>\r\n', '0850 433 22 11333', 'Araç Kiralama', 'Araç Kiramala Web Sitesi Yapımı', 'tamirci, php, web', 'https://www.facebook.com/', 'https://twitter.com', 'Haklarımız Saklıdır', 'Ankara/Çankaya', 'info@sirketadi.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favoriler`
--

CREATE TABLE `favoriler` (
  `f_id` int(11) NOT NULL,
  `f_k_id` int(11) NOT NULL,
  `f_a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `favoriler`
--

INSERT INTO `favoriler` (`f_id`, `f_k_id`, `f_a_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kiraarac`
--

CREATE TABLE `kiraarac` (
  `kira_id` int(10) NOT NULL,
  `k_adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `plaka` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `marka` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `seri` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `model` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kirasekli` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tutar` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `alistarihi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `teslimtarihi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ay` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `toplamgun` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `toplamtutar` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `teslim` int(2) NOT NULL DEFAULT 0,
  `silindimi` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kiraarac`
--

INSERT INTO `kiraarac` (`kira_id`, `k_adi`, `plaka`, `marka`, `seri`, `model`, `kirasekli`, `tutar`, `alistarihi`, `teslimtarihi`, `ay`, `toplamgun`, `toplamtutar`, `teslim`, `silindimi`) VALUES
(1, 'admin', '06ank199', 'audi', 'q4', '2000', 'Günlük', '120', '06/05/2020', '06/05/2020', '05', '0', '0', 0, 1),
(2, 'admin', '35ist122', 'tofaş', 'tfs3', '1999', 'Haftalık', '50', '06/05/2020', '26/05/2020', '', '20', '1000', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `k_id` int(10) NOT NULL,
  `k_adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `k_parola` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `k_yonetici_tip` int(10) NOT NULL DEFAULT 0,
  `silindimi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`k_id`, `k_adi`, `k_parola`, `k_yonetici_tip`, `silindimi`) VALUES
(1, 'admin', 'admin', 1, 0),
(2, 'galeri', '123', 2, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `m_id` int(10) NOT NULL,
  `m_adi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `m_yol` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `m_sira` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`m_id`, `m_adi`, `m_yol`, `m_sira`) VALUES
(1, 'Anasayfa', 'index.php', '0'),
(2, 'Hakkımızda', 'hakkimizda.php', '1'),
(3, 'Arabalar', 'arabalar.php', '2'),
(4, 'Servisler', 'servisler.php', '3'),
(5, 'İletişim', 'iletisim.php', '4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servisler`
--

CREATE TABLE `servisler` (
  `s_id` int(10) NOT NULL,
  `s_baslik` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `s_icerik` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL,
  `s_sira` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '0',
  `silindimi` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `servisler`
--

INSERT INTO `servisler` (`s_id`, `s_baslik`, `s_icerik`, `s_sira`, `silindimi`) VALUES
(1, 'Uzman Teknisyenler', '<p>Teknolojinin ve g&uuml;c&uuml;n hızla ilerlemesi nedeniyle internet kullanımı daha yaygın hale geliyor.</p>\r\n', '0', 0),
(2, 'Profesyonel servis', 'Teknolojinin ve gücün hızla ilerlemesi nedeniyle internet kullanımı daha yaygın hale geliyor.', '1', 0),
(3, 'Büyük destek', 'Teknolojinin ve gücün hızla ilerlemesi nedeniyle internet kullanımı daha yaygın hale geliyor.', '2', 0),
(4, 'Teknik beceriler', 'Teknolojinin ve gücün hızla ilerlemesi nedeniyle internet kullanımı daha yaygın hale geliyor.', '3', 0),
(5, 'Şiddetle Tavsiye Edilir', 'Teknolojinin ve gücün hızla ilerlemesi nedeniyle internet kullanımı daha yaygın hale geliyor.', '4', 0),
(6, 'Olumlu Yorumlar', 'Teknolojinin ve gücün hızla ilerlemesi nedeniyle internet kullanımı daha yaygın hale geliyor.', '5', 0),
(7, 'Araç', '<p>adsasada</p>\r\n', '7', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

CREATE TABLE `yetki` (
  `y_id` int(10) NOT NULL,
  `k_y_id` int(10) NOT NULL,
  `y_ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yetki`
--

INSERT INTO `yetki` (`y_id`, `k_y_id`, `y_ad`) VALUES
(1, 1, 'Genel Yetkili'),
(2, 2, 'moderator'),
(3, 3, 'galerici'),
(5, 4, 'paspascı'),
(6, 0, 'müsteri');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arabalar`
--
ALTER TABLE `arabalar`
  ADD PRIMARY KEY (`a_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `favoriler`
--
ALTER TABLE `favoriler`
  ADD PRIMARY KEY (`f_id`);

--
-- Tablo için indeksler `kiraarac`
--
ALTER TABLE `kiraarac`
  ADD PRIMARY KEY (`kira_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`k_id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`m_id`);

--
-- Tablo için indeksler `servisler`
--
ALTER TABLE `servisler`
  ADD PRIMARY KEY (`s_id`);

--
-- Tablo için indeksler `yetki`
--
ALTER TABLE `yetki`
  ADD PRIMARY KEY (`y_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arabalar`
--
ALTER TABLE `arabalar`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `ayar_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `favoriler`
--
ALTER TABLE `favoriler`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kiraarac`
--
ALTER TABLE `kiraarac`
  MODIFY `kira_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `k_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `servisler`
--
ALTER TABLE `servisler`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `yetki`
--
ALTER TABLE `yetki`
  MODIFY `y_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
