-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 29 Şub 2020, 23:45:50
-- Sunucu sürümü: 10.1.42-MariaDB
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ucretsizblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '$2y$10$RDA9iBWTWiQn4dsEiQzmNOd7X8fNOItxvYPrPPPEyAk0yokrSQhLC');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gorsel` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `ozet` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci,
  `anahtar_kelimeler` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aktiflik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `adi`, `link`, `gorsel`, `kategori`, `ozet`, `icerik`, `tarih`, `aciklama`, `anahtar_kelimeler`, `aktiflik`) VALUES
(29, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'lorem-ipsum.webp', '6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<h2><strong>What is Lorem Ipsum?</strong></h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Why do we use it?</strong></h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '29-02-2020 18:16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum, Lipsum, Lorem, Ipsum, Text, Generate, Generator, Facts, Information, What, Why, Where, Dummy Text, Typesetting, Printing, de Finibus, Bonorum et Malorum, de Finibus Bonorum et Malorum, Extremes of Good and Evil, Cicero, Latin, Garbled, Scramb', 1),
(30, 'Bootstrap Nedir?', 'bootstrap-nedir', 'bootstrap.jpg', '6', 'Ücretsiz bir CSS framework’u olan Bootstrap, açık kaynak kodlu bir tasarım aracıdır.', '<h1><strong>bootstrap nedir?</strong></h1>\r\n\r\n<p>Ücretsiz bir CSS framework’u olan Bootstrap, açık kaynak kodlu bir tasarım aracıdır. Telefon, tablet ve masaüstü bilgisayarlar için farklı ve cihazınızın büyüklüğüyle orantılı şekilde sitenizin görünmesini sağlayan tema ve tasarımları kolaylıkla yapabilirsiniz. Bir site için gerekli olan bütün unsurları içerisinde barındıran Bootstrap ile tasarım yaparken bu hazır unsurları kullanarak tüm cihazlara uygun tasarımlar yapmanızı sağlar. Bu da demek oluyor ki, her şeyi hazır olan kodlarla yeni bir tasarım yaratmak oldukça kolay ve pratiktir. Stiller, imajlar ve JavaScript&#39;ler daha öncesinden Bootstrap&#39;in içine monte edilmiştir. Yapmanız gereken tek şey bunları çağırmanızdır.</p>\r\n', '29-02-2020 18:51', 'Ücretsiz bir CSS framework’u olan Bootstrap, açık kaynak kodlu bir tasarım aracıdır.', 'bootstrap, bootstrap nedir', 1),
(31, 'REST API Nedir?', 'rest-api-nedir', 'rest-api.png', '1', 'REST API Nedir?', '<h1><strong>REST API Nedir?</strong></h1>\r\n\r\n<p><strong>REST API</strong>, geliştiricilerin HTTP protokolünü kullanarak GET ve POST gibi isteklerde bulunup, bu isteklere çeşitli formatlarda yanıt aldığı bir dağıtık sistemdir. REST (REpresentational State Transfer), Temsili Durum Aktarımı olarak Türkçede de kullanılır. REST’in tüm prensiplerini yerine getiren API’ler ise RESTful olarak nitelendirilir. REST API ilk defa 2000 yılında Roy Fielding tarafından doktora tezinin bir bölümü olarak geliştirilmiş ve ardından geliştiricilerce kabul görmüştür. REST API, web mimarisi kısmında çalışsın veya çalışmasın her geliştiricinin birgün ihtiyaç duyabileceği popüler bir API’dir.</p>\r\n\r\n<p>REST API, gelişticilerin hakim olduğu SOAP ve WSDL tabanlı web servislerine benzer ancak daha basite indirgenerek geliştirilmiştir. REST API kullanılırken web tarayıcılarının sayfa transfer sürecini bir parçası olan HTTP fiilleri kullanılarak haberleşilir. Dolayısıyla geliştirici olarak size tanıdık gelen GET, POST, PUT DELETE vb. filler REST API ile haberleşmede oldukça yaygın kullanılır. HTTP protokolünü kullanıyor olması nedeniyle REST API’i pratik olarak herhangi bir programlama dilinde kullanabilir. REST API’yi yazılımlarınızda kullanarak yazılımınızın uzun ömürlü olmasını sağlayabilir ve gelişimini pozitif yönde destekleyebilirsiniz.</p>\r\n', '29-02-2020 18:56', 'REST API Nedir?', 'rest api, rest api nedir?', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `isim_soyisim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `isim_soyisim`, `mail`, `mesaj`, `tarih`, `ip`) VALUES
(9, 'Alişahan yalçın', 'alisahanyalcin4@gmail.com', 'advaddv', '29.02.2020 17:50', '::1'),
(10, 'alisahanyalcin', 'alisahanyalcin4@gmail.com', 'deneme iletişim mesajı', '29.02.2020 20:30', 'yok');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anahtar_kelimeler` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aktiflik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `adi`, `link`, `aciklama`, `anahtar_kelimeler`, `aktiflik`) VALUES
(1, 'PHP', 'php', 'php kategorisi', 'php, php kategorisi', 1),
(6, 'HTML', 'html', 'Html', 'ozet, ozet', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `sira` int(11) NOT NULL,
  `yazi` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aktiflik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`id`, `sira`, `yazi`, `link`, `aktiflik`) VALUES
(1, 1, 'Anasayfa', 'https://demo.alisahanyalcin.com/ucretsizblog/', 1),
(2, 2, 'Hakkımızda', 'https://demo.alisahanyalcin.com/ucretsizblog/sayfa/hakkimizda', 1),
(4, 3, 'İletişim', 'https://demo.alisahanyalcin.com/ucretsizblog/iletisim', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anahtar_kelimeler` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `adi`, `link`, `anahtar_kelimeler`, `aciklama`, `icerik`) VALUES
(6, 'İletişim', 'iletisim', 'iletisim', 'iletisim sayfası', ''),
(7, 'Hakkımızda', 'hakkimizda', 'Hakkımızda, Hakkımızda sayfası', 'Hakkımızda sayfası', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sistem_ayarlari`
--

CREATE TABLE `sistem_ayarlari` (
  `id` int(11) NOT NULL,
  `site_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `site_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `site_anahtar_kelimeler` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_oto_onay` int(11) NOT NULL,
  `sayfa_basi_blog` int(11) NOT NULL,
  `random_sayfa_basi_blog` int(11) NOT NULL,
  `site_name_mobil` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `logomu_site_adimi` int(11) NOT NULL,
  `site_fav` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sistem_ayarlari`
--

INSERT INTO `sistem_ayarlari` (`id`, `site_adi`, `site_baslik`, `site_aciklama`, `site_anahtar_kelimeler`, `yorum_oto_onay`, `sayfa_basi_blog`, `random_sayfa_basi_blog`, `site_name_mobil`, `logomu_site_adimi`, `site_fav`, `site_logo`) VALUES
(1, 'Blog Bootstrap', 'CI Blog Bootstrap', 'Blog Bootstrap, Bootstrap Blog', 'site anahtar kelimeler, kelime1, kelime2', 1, 5, 15, 'BB', 1, 'logo.png', 'logo1.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `tarih` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `blog_id`, `profil`, `ad`, `mail`, `yorum`, `durum`, `tarih`, `ip`) VALUES
(3, 31, '1.png', 'Ali Şahan Yalçın', 'alisahanyalcin4@gmail.com', 'deneme yorum', 1, '29.02.2020 20:24', 'yok'),
(4, 31, '9.png', 'Yorumcu', 'yorumcu@mail.com', 'Deneme yorum 2', 1, '29.02.2020 20:28', 'yok');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`user_name`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sistem_ayarlari`
--
ALTER TABLE `sistem_ayarlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `sistem_ayarlari`
--
ALTER TABLE `sistem_ayarlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
