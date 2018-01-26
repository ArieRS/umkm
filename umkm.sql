-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2018 at 07:08 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--
CREATE DATABASE IF NOT EXISTS `umkm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `umkm`;

-- --------------------------------------------------------

--
-- Table structure for table `active_pages`
--

CREATE TABLE `active_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `active_pages`
--

INSERT INTO `active_pages` (`id`, `name`, `enabled`) VALUES
(1, 'blog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `bic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `name`, `iban`, `bank`, `bic`) VALUES
(1, 'Ecommerce Polinema', '144', 'Bank Mandiri', '658');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `confirm_links`
--

CREATE TABLE `confirm_links` (
  `id` int(11) NOT NULL,
  `link` char(32) NOT NULL,
  `for_order` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confirm_links`
--

INSERT INTO `confirm_links` (`id`, `link`, `for_order`) VALUES
(1, '46cf659f7e35824ef4b09ef33b7ce076', 1234),
(2, '757bb8928f70f6cfe8601f3c45d3cbad', 1235),
(3, 'aecd30e6c31b7886b598c64cbeb8aab0', 1239),
(4, 'b21a542dd70ffc4e0baf7e58a674e786', 1240),
(5, '5f754ccd76b9dc6f009347bce529fcbc', 1241),
(6, '2d04fe3ae042574e25eff1c5b1b3473f', 1242),
(7, 'e3bf05ee16d6770504e1e1036c763550', 1243),
(8, '8db1d095f4a7677fd46d556ffcf5356f', 1244),
(9, '3bdebfd825aabc4dae4b67a77d7ffa23', 1234),
(10, '307f03f27721878578a7b15fce6571ce', 1235),
(11, 'f2afbe9bc89fff5ce7ac65cbb7c84a22', 1236),
(12, '7a5d90b2f26176ce2622131aafecf6c2', 1237),
(13, 'a55409cd9679037b67405158154dbf3a', 1238),
(14, 'db8aaec40ae491cc99f466b5df2f1b6b', 1239),
(15, '1e7c5f5f2d7cde9a0a74d7e5d78637a6', 1240),
(16, 'c010195c8d0ef43c658ccbc18dbeaf05', 1241),
(17, '0ba2e07778fb53091858fe9b782908f4', 1242),
(18, '333d100a90dfa805ea6b03cbd566d233', 1243);

-- --------------------------------------------------------

--
-- Table structure for table `cookie_law`
--

CREATE TABLE `cookie_law` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cookie_law`
--

INSERT INTO `cookie_law` (`id`, `link`, `theme`, `visibility`) VALUES
(1, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cookie_law_translations`
--

CREATE TABLE `cookie_law_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `button_text` varchar(50) NOT NULL,
  `learn_more` varchar(50) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cookie_law_translations`
--

INSERT INTO `cookie_law_translations` (`id`, `message`, `button_text`, `learn_more`, `abbr`, `for_id`) VALUES
(1, '', '', '', 'id', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `valid_from_date` int(10) UNSIGNED NOT NULL,
  `valid_to_date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-enabled, 0-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currencyKey` varchar(5) NOT NULL,
  `flag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `abbr`, `name`, `currency`, `currencyKey`, `flag`) VALUES
(4, 'id', 'indonesian', 'IDR', 'IDR', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `clean_referrer` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `paypal_status` varchar(10) DEFAULT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'viewed status is change when change processed status',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `discount_code` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `products`, `date`, `referrer`, `clean_referrer`, `payment_type`, `paypal_status`, `processed`, `viewed`, `confirmed`, `discount_code`) VALUES
(19, 1241, 'a:1:{i:3;s:1:\"1\";}', 1514426282, 'http://localhost/umkm/checkout/successbank', 'localhost', 'Bank', NULL, 0, 0, 0, ''),
(18, 1240, 'a:1:{i:12;s:1:\"2\";}', 1514418831, 'http://localhost/umkm/checkout/successbank', 'localhost', 'Bank', NULL, 0, 0, 0, ''),
(17, 1239, 'a:1:{i:3;s:1:\"1\";}', 1514348399, 'Direct', 'Direct', 'Bank', NULL, 0, 0, 0, ''),
(16, 1238, 'a:1:{i:3;s:1:\"1\";}', 1514348385, 'Direct', 'Direct', 'cashOnDelivery', NULL, 0, 0, 0, ''),
(15, 1237, 'a:1:{i:3;s:1:\"1\";}', 1514347622, 'Direct', 'Direct', 'Bank', NULL, 0, 0, 0, ''),
(14, 1236, 'a:1:{i:13;s:1:\"1\";}', 1514347435, 'Direct', 'Direct', 'cashOnDelivery', NULL, 0, 0, 0, ''),
(13, 1235, 'a:1:{i:12;s:1:\"1\";}', 1514317178, 'http://localhost/umkm/TV_LED_Samsung_H_Garansi_Resmi_3', 'localhost', 'cashOnDelivery', NULL, 0, 1, 0, ''),
(12, 1234, 'a:1:{i:12;s:1:\"5\";}', 1514283976, 'Direct', 'Direct', 'cashOnDelivery', NULL, 2, 1, 0, ''),
(20, 1242, 'a:1:{i:3;s:1:\"1\";}', 1514426319, 'http://localhost/umkm/checkout/successbank', 'localhost', 'cashOnDelivery', NULL, 0, 0, 0, ''),
(21, 1243, 'a:1:{i:15;s:1:\"2\";}', 1514431527, 'Direct', 'Direct', 'Bank', NULL, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_clients`
--

CREATE TABLE `orders_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `notes` text NOT NULL,
  `for_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_clients`
--

INSERT INTO `orders_clients` (`id`, `name`, `email`, `phone`, `address`, `city`, `post_code`, `notes`, `for_id`) VALUES
(10, 'Sinar Agung Elektronik', 'zgztnyuj@eelmail.com', '081615770004', 'Menteng - Jakarta Pusat', 'malang', '65', '', 12),
(11, 'Sinar Agung Elektronik', 'zgztnyuj@eelmail.com', '081615770004', 'Menteng - Jakarta Pusat', 'malang', '65', '', 13),
(12, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 14),
(13, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 15),
(14, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 16),
(15, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 17),
(16, 'Sinar Agung Elektronik', 'zgztnyuj@eelmail.com', '081615770004', 'Menteng - Jakarta Pusat', 'malang', '65', '', 18),
(17, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 19),
(18, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 20),
(19, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 21);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `folder` int(10) UNSIGNED DEFAULT NULL COMMENT 'folder with images',
  `image` varchar(255) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL COMMENT 'time created',
  `time_update` int(10) UNSIGNED NOT NULL COMMENT 'time updated',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `shop_categorie` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `procurement` int(10) UNSIGNED NOT NULL,
  `in_slider` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `virtual_products` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `publish` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `folder`, `image`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `virtual_products`, `brand_id`, `position`, `vendor_id`, `publish`) VALUES
(1, 1512992281, '697301e114.png', 1512992472, 0, 1, 1, 1, 0, 0, 'Snack_1', NULL, 0, 0, 1, '0'),
(3, 1513038488, 'in_UA24H4003ARLXL_006_Front_black.jpg', 1513039847, 1513040021, 1, 10, 10, 0, 1, 'TV_LED_Samsung_H_Garansi_Resmi_3', NULL, 0, 1, 2, '0'),
(4, 1513060627, 'Haier_G7_King_1:16GB.jpg', 1513061037, 1513061320, 1, 2, 2, 0, 0, 'Haier_G_King_GB_4', NULL, 0, 1, 3, '0'),
(5, 1513061040, 'Samsung_Galaxy_J2_Prime_-_Garansi_Resmi_Samsung_Indonesia_SM-G532_G52.jpg', 1513061098, 0, 1, 2, 2, 0, 0, 'Samsung_Galaxy_J_Prime_Garansi_Resmi_Samsung_Indonesia_SMG_G_5', NULL, 0, 0, 3, '0'),
(6, 1513061360, 'Samsung_Galaxy_J2_Prime_-_Garansi_Resmi_Samsung_Indonesia_SM-G532_G521.jpg', 1513061407, 1513061469, 1, 2, 2, 0, 0, 'Samsung_Galaxy_J_Prime_Garansi_Resmi_Samsung_Indonesia_SMG_G_6', NULL, 0, 1, 3, '0'),
(7, 1513061487, 'Samsung_Galaxy_J2_Prime_-_Garansi_Resmi_Samsung_Indonesia_SM-G532_G522.jpg', 1513061519, 0, 1, 2, 2, 0, 0, '_7', NULL, 0, 1, 3, '0'),
(8, 1513061770, '', 1513061848, 0, 1, 2, 2, 0, 0, 'Samsung_Galaxy_J_Prime_8', NULL, 0, 1, 3, '0'),
(9, 1513061968, 'Samsung_Galaxy_J2_Prime_-_Garansi_Resmi_Samsung_Indonesia_SM-G532_G523.jpg', 1513062049, 0, 1, 2, 2, 0, 0, 'Samsung_Galaxy_J_Prime_9', NULL, 0, 1, 2, '0'),
(10, 1513063240, 'Samsung_Galaxy_J2_Prime_-_Garansi_Resmi_Samsung_Indonesia_SM-G532_G524.jpg', 1513063290, 0, 1, 2, 2, 0, 0, 'Samsung_Galaxy_J_Prime_10', NULL, 0, 1, 3, '0'),
(11, 1513063396, '', 1513063413, 0, 1, 2, 1, 0, 0, 'polinema_11', NULL, 0, 1, 2, '0'),
(12, 1513064165, 'Samsung_Galaxy_J2_Prime_-_Garansi_Resmi_Samsung_Indonesia_SM-G532_G525.jpg', 1513064299, 1514429267, 1, 2, 2, 0, 0, 'Samsung_Galaxy_J_Prime_12', NULL, 0, 1, 3, '0'),
(13, 1513064627, 'Haier_G7_King_1:16GB1.jpg', 1513064657, 1516988123, 1, 2, 2, 0, 1, 'Haier_G_King_GB_13', NULL, 0, 0, 2, '0'),
(14, 1514339748, 'favicon.ico', 1514339906, 1514339938, 1, 2, 12, 0, 0, 'dalepo_14', NULL, 0, 1, 14, '0'),
(15, 1514426839, 'kripik_sanan1.jpg', 1514427022, 1514427724, 1, 13, 100, 0, 1, 'Keripik_Tempe_Cihuy_15', NULL, 0, 0, 15, '1'),
(16, 1514431651, 'Topeng_Malang.jpeg', 1514431734, 0, 1, 14, 10, 0, 0, 'Topeng_Malang_16', NULL, 0, 1, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `products_translations`
--

CREATE TABLE `products_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `basic_description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `old_price` varchar(20) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_translations`
--

INSERT INTO `products_translations` (`id`, `title`, `description`, `basic_description`, `price`, `old_price`, `abbr`, `for_id`) VALUES
(5, 'TV LED Samsung 24\' 24H4150 Garansi Resmi', '<ul>\r\n	<li>Resolusi Layar : 1366 x 768</li>\r\n	<li>Input / Output : USB Copy Movie Speaker : 3W x 2</li>\r\n	<li>Speaker Type : Down Firing + Full Range</li>\r\n	<li>Audio : Dolby Digital Plus / Dolby AAC</li>\r\n	<li>DTS Studio Sound</li>\r\n	<li>DTS Premium Sound / DTS Premium Sound 5.1: DTS 2.0</li>\r\n	<li>Picture Engine : HyperReal Engine</li>\r\n	<li>Clear Motion Rate: 100</li>\r\n	<li>Wide Color Enhancer (Plus)</li>\r\n	<li>Film Mode</li>\r\n	<li>Konsumsi Daya : Power Consumption (Max): 33 W</li>\r\n	<li>Power Consumption (Stand-by): 0.5 W</li>\r\n	<li>Power Consumption (Energy Saving Mode): 25 W</li>\r\n	<li>Voltase : AC100-240V 50/60Hz</li>\r\n	<li>Dimensi : 958 x 600 x 170 mm</li>\r\n	<li>Package Size : 743 x 407 x 114 mm (WxHxD)</li>\r\n	<li>Set with Stand : 561.8 x 391.2 x 140.8 mm (WxHxD)</li>\r\n	<li>Set without Stand: 561.8 x 349.1 x 65.2 mm (WxHxD)</li>\r\n	<li>Lain-lain : Football mode, Screen capture, Triple Protector</li>\r\n</ul>\r\n\r\n<p>stok ready jika barang tidak sesuai pesanan uang kembali 100 % terima kasih....</p>\r\n', '', '2308000', '2308000', 'id', 3),
(14, 'Samsung Galaxy J2 Prime', '<ul>\r\n	<li>Brand New - Segel - Garansi Resmi - WAJIB ASURANSI</li>\r\n	<li>&nbsp;</li>\r\n	<li>Stok per 29 Agustus:</li>\r\n	<li>- 2 Gold</li>\r\n	<li>&nbsp;</li>\r\n	<li>Hanya kirim via Gojek ke Jakarta dan sekitarnya</li>\r\n	<li>&nbsp;</li>\r\n	<li>Transaksi lewat aplikasi Tokopedia, gratis ongkir hingga Rp 40000</li>\r\n	<li>Gunakan kode GRATISONGKIR Periode 21 - 31 Agustus 2017</li>\r\n	<li>Gunakan Instant Courrier jika ongkir &lt; Rp 30000</li>\r\n	<li>&nbsp;</li>\r\n	<li>Gunakan metode pembayaran realtime karena order yang masuk duluan yang akan</li>\r\n	<li>diproses.</li>\r\n	<li>Pilh varian warna atau tulis warna di Keterangan. Jika tidak ada keterangan akan</li>\r\n	<li>dikirim Random tergantung stock yang ada</li>\r\n	<li>&nbsp;</li>\r\n	<li>Untuk pengiriman dengan Gosend maksimum 6 unit dalam 1 order karena asuransi</li>\r\n	<li>Gosend max Rp 10jt</li>\r\n	<li>&nbsp;</li>\r\n	<li>Tidak ada bon. Claim garansi bisa pakai invoice Tokopedia.&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n	<li>============================================================</li>\r\n	<li>Prosesor</li>\r\n	<li>CPU Speed 1.4GHz Quad-core</li>\r\n	<li>&nbsp;</li>\r\n	<li>Display</li>\r\n	<li>Ukuran (Main Display) 5.0\" (126.4mm)</li>\r\n	<li>Resolusi (Main Display) 540 x 960 (qHD)</li>\r\n	<li>Kedalaman Warna (Main Display) 16M</li>\r\n	<li>&nbsp;</li>\r\n	<li>Kamera</li>\r\n	<li>Resolusi Rekaman Video HD (1280 x 720) @30fps</li>\r\n	<li>Main Camera - Resolution CMOS 8.0 MP</li>\r\n	<li>Main Camera - f Number f/2.2</li>\r\n	<li>Front Camera - Resolution CMOS 5.0 MP</li>\r\n	<li>Front Camera - f Number f/2.2</li>\r\n	<li>Main Camera - Flash Yes</li>\r\n	<li>Main Camera - Auto Focus Yes</li>\r\n	<li>&nbsp;</li>\r\n	<li>Memori</li>\r\n	<li>RAM Size (GB) 1.5 GB</li>\r\n	<li>ROM Size (GB) 8 GB</li>\r\n	<li>Available Memory (GB) 3.3 GB</li>\r\n	<li>Dukungan Memori Eksternal MicroSD (Up to 256GB)</li>\r\n	<li>&nbsp;</li>\r\n	<li>Jaringan</li>\r\n	<li>Multi-SIM Dual-SIM - Micro Sim</li>\r\n	<li>Infra 2G GSM, 3G WCDMA, 4G LTE FDD, 4G LTE TDD</li>\r\n	<li>2G GSM GSM850, GSM900, DCS1800, PCS1900</li>\r\n	<li>3G UMTS B1(2100), B2(1900), B5(850), B8(900)</li>\r\n	<li>4G FDD LTE B1(2100), B3(1800), B5(850), B7(2600), B8(900), B28(700)</li>\r\n	<li>4G TDD LTE B38(2600), B40(2300)</li>\r\n	<li>&nbsp;</li>\r\n	<li>Teknologi: USB 2.0, Lokasi GPS, Glonass</li>\r\n	<li>Earjack 3.5mm Stereo</li>\r\n	<li>Wi-Fi 802.11 b/g/n 2.4GHz</li>\r\n	<li>Wi-Fi Direct Ya</li>\r\n	<li>Bluetooth Version Bluetooth v4.2</li>\r\n	<li>Dimension (HxWxD, mm) 144.8 x 72.1 x 8.9</li>\r\n	<li>Weight (g) 160</li>\r\n</ul>\r\n', '', '1660485', '1660485', 'id', 12),
(15, 'Haier G7 King 1/16GB', '', '', '1000000', '1000000', 'id', 13),
(17, 'Keripik Tempe Cihuy', '<p>Keripik tempe ter-renyah se-kota Malang</p>\r\n', '', '25000', '25000', 'id', 15),
(18, 'Topeng Malang', '<p>Topeng khas malang dijamin asli 100%</p>\r\n', '', '50000', '', 'id', 16);

-- --------------------------------------------------------

--
-- Table structure for table `seo_pages`
--

CREATE TABLE `seo_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seo_pages`
--

INSERT INTO `seo_pages` (`id`, `name`) VALUES
(1, 'home'),
(2, 'checkout'),
(3, 'contacts'),
(4, 'blog');

-- --------------------------------------------------------

--
-- Table structure for table `seo_pages_translations`
--

CREATE TABLE `seo_pages_translations` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `page_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `article_id` int(11) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_for` int(11) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `sub_for`, `position`) VALUES
(1, 0, 0),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 4, 0),
(6, 4, 0),
(7, 4, 0),
(8, 3, 0),
(9, 3, 0),
(10, 3, 0),
(11, 2, 0),
(12, 2, 0),
(13, 0, 0),
(14, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories_translations`
--

CREATE TABLE `shop_categories_translations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_categories_translations`
--

INSERT INTO `shop_categories_translations` (`id`, `name`, `abbr`, `for_id`) VALUES
(4, 'Handphone & Aksesoris', 'id', 2),
(5, 'Elektronik', 'id', 3),
(6, 'Bayi & Anak', 'id', 4),
(7, 'Pakaian Bayi', 'id', 5),
(8, 'Mainan Bayi & Anak', 'id', 6),
(9, 'Perlengkapan Makan Bayi', 'id', 7),
(10, 'Perangkat Rumah', 'id', 8),
(11, 'Pendingin', 'id', 9),
(12, 'Audio & Video', 'id', 10),
(13, 'Memory card', 'id', 11),
(14, 'Kabel & Charger', 'id', 12),
(15, 'Makanan', 'id', 13),
(16, 'Kerajinan', 'id', 14);

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE `subscribed` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `textual_pages_tanslations`
--

CREATE TABLE `textual_pages_tanslations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `for_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'notifications by email',
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `oauth_provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `notify`, `last_login`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `gender`, `locale`, `picture_url`, `profile_url`, `created`, `modified`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'your@email.com', 0, 1516986827, '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `value_store`
--

CREATE TABLE `value_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `thekey` varchar(50) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `value_store`
--

INSERT INTO `value_store` (`id`, `thekey`, `value`) VALUES
(1, 'sitelogo', 'logo1.png'),
(2, 'navitext', ''),
(3, 'footercopyright', 'Powered by JTI Polinema © All right reserved. '),
(4, 'contactspage', 'Hello dear client'),
(5, 'footerContactAddr', '-7.983908, 112.621391'),
(6, 'footerContactEmail', 'arie.rachmad.s@polinema.ac.id'),
(7, 'footerContactPhone', '081615770004'),
(8, 'googleMaps', '-7.983908, 112.621391'),
(9, 'footerAboutUs', 'Ecommerce POLINEMA merupakan sebuah marketplace untuk UKM di seluruh Indonesia. Dengan adanya marketplace ini diharapkan dapat memajukan UKM di Indonesia'),
(10, 'footerSocialFacebook', 'http://facebook.com/ukmkita'),
(11, 'footerSocialTwitter', 'http://twitter.com/ukmkita'),
(12, 'footerSocialGooglePlus', 'http://plus.google.com/ukmkita'),
(13, 'footerSocialPinterest', ''),
(14, 'footerSocialYoutube', 'http://youtube.com/ukmkita'),
(16, 'contactsEmailTo', 'contacts@shop.dev'),
(17, 'shippingOrder', '100000'),
(18, 'addJs', ''),
(19, 'publicQuantity', '0'),
(20, 'paypal_email', ''),
(21, 'paypal_sandbox', '0'),
(22, 'paypal_currency', 'EUR'),
(23, 'publicDateAdded', '0'),
(24, 'googleApi', ''),
(25, 'template', 'redlabel'),
(26, 'cashondelivery_visibility', '1'),
(27, 'showBrands', '0'),
(28, 'showInSlider', '1'),
(29, 'codeDiscounts', '1'),
(30, 'virtualProducts', '0'),
(31, 'multiVendor', '1'),
(32, 'newStyle', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `post_code` varchar(30) DEFAULT NULL,
  `oauth_provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `email`, `password`, `updated_at`, `created_at`, `phone`, `city`, `post_code`, `oauth_provider`, `oauth_uid`, `gender`, `locale`, `picture_url`) VALUES
(1, 'kunang', 'malang', 'kunangilalang@gmail.com', '$2y$10$ALUzXoPmjDi3g3P.ckB7MeCR/awC1fpZ8dObvi5o5QV/lS6EtXlpy', '2017-12-11 11:37:53', '2017-12-11 11:37:53', '', '', '', '', '', '', '', ''),
(2, 'Sinar Agung Elektronik', 'Menteng - Jakarta Pusat', 'zgztnyuj@eelmail.com', '$2y$10$rUS7boZigwf.jg79p2bRoenp0QMPhQM9JxH16k0ZMrHXYPiO5mUte', '2017-12-12 00:13:44', '2017-12-12 00:13:44', '081615770004', 'malang', '65', '', '', '', '', ''),
(3, 'Arie', 'jalan', 'arie.rachmad.s@gmail.com', '$2y$10$MiYOo4wUhOjVFugHfrqmhuhTxvS.FFAoIEdMaOygemthzxvnavZU.', '2017-12-12 06:36:55', '2017-12-12 06:36:55', '081615770004', 'Malang', '65125', '', '', '', '', ''),
(4, '', '', 'arie.rachmad@gmail.com', '$2y$10$T3K9D90cvnDOU2Eqry2eSO.OUNIjRQqduj60gMZzrWY5uDE6vIUPS', '2017-12-21 18:01:49', '2017-12-21 18:01:49', '', '', '', '', '', '', '', ''),
(11, 'aaa', 'aaa', 'arie@gmail.com', '$2y$10$fvo2a1hgizAofxAYkKI0fOf6HdlrTSX158h92bHybLXRbmRt2W0UO', '2017-12-25 11:49:29', '2017-12-25 11:49:29', '12', 'aa', '11', NULL, NULL, NULL, NULL, NULL),
(12, 'andi noya', 'jl. cengkeh', 'andi@yahoo.com', '$2y$10$9VbdJHPThtuazRDWWp1yv.9WfJpdZlsJxmihXI6tUIPo3Gr93k3WS', '2017-12-25 13:21:47', '2017-12-25 13:21:47', '086754598723', 'malang', '65123', NULL, NULL, NULL, NULL, NULL),
(13, 'natan', 'jl. jalan 23', 'natan@gmail.com', '$2y$10$E5zG/NByDMzHnw4.JWSDee7DqimyqiBkxkA8/FHyybE6pJaKFAFHO', '2017-12-25 13:29:17', '2017-12-25 13:29:17', '08567348970', 'jember', '65785', NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, 'usman332119@gmail.com', '$2y$10$NF8gq6d9qk6HixPegr6WP.v80/1943aoUOyfTYhOuv.fS4Jg42pkO', '2017-12-27 01:53:45', '2017-12-27 01:53:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, 'yoga@yoga.com', '$2y$10$05vAc6v8TdEp9OmXg3kVZ.Rg5PWYw0Nm1LE6ml4ATRVp6arjmc1Py', '2017-12-28 02:07:10', '2017-12-28 02:07:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_orders`
--

CREATE TABLE `vendors_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `clean_referrer` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `paypal_status` varchar(10) DEFAULT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `discount_code` varchar(20) NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors_orders`
--

INSERT INTO `vendors_orders` (`id`, `order_id`, `products`, `date`, `referrer`, `clean_referrer`, `payment_type`, `paypal_status`, `processed`, `viewed`, `confirmed`, `discount_code`, `vendor_id`) VALUES
(17, 1240, 'a:1:{i:12;s:1:\"2\";}', 1514418831, 'http://localhost/umkm/checkout/successbank', 'localhost', 'Bank', NULL, 0, 0, 0, '', 3),
(16, 1239, 'a:1:{i:3;s:1:\"1\";}', 1514348399, 'Direct', 'Direct', 'Bank', NULL, 0, 0, 0, '', 2),
(15, 1238, 'a:1:{i:3;s:1:\"1\";}', 1514348385, 'Direct', 'Direct', 'cashOnDelivery', NULL, 0, 0, 0, '', 2),
(14, 1237, 'a:1:{i:3;s:1:\"1\";}', 1514347622, 'Direct', 'Direct', 'Bank', NULL, 0, 0, 0, '', 2),
(13, 1236, 'a:1:{i:13;s:1:\"1\";}', 1514347435, 'Direct', 'Direct', 'cashOnDelivery', NULL, 0, 0, 0, '', 2),
(12, 1235, 'a:1:{i:12;s:1:\"1\";}', 1514317178, 'http://localhost/umkm/TV_LED_Samsung_H_Garansi_Resmi_3', 'localhost', 'cashOnDelivery', NULL, 0, 0, 1, '', 3),
(11, 1234, 'a:1:{i:12;s:1:\"5\";}', 1514283976, 'Direct', 'Direct', 'cashOnDelivery', NULL, 1, 1, 0, '', 3),
(18, 1241, 'a:1:{i:3;s:1:\"1\";}', 1514426282, 'http://localhost/umkm/checkout/successbank', 'localhost', 'Bank', NULL, 0, 0, 0, '', 2),
(19, 1242, 'a:1:{i:3;s:1:\"1\";}', 1514426319, 'http://localhost/umkm/checkout/successbank', 'localhost', 'cashOnDelivery', NULL, 0, 0, 0, '', 2),
(20, 1243, 'a:1:{i:15;s:1:\"2\";}', 1514431527, 'Direct', 'Direct', 'Bank', NULL, 0, 0, 0, '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_orders_clients`
--

CREATE TABLE `vendors_orders_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `notes` text NOT NULL,
  `for_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors_orders_clients`
--

INSERT INTO `vendors_orders_clients` (`id`, `name`, `email`, `phone`, `address`, `city`, `post_code`, `notes`, `for_id`) VALUES
(10, 'Sinar Agung Elektronik', 'zgztnyuj@eelmail.com', '081615770004', 'Menteng - Jakarta Pusat', 'malang', '65', '', 11),
(11, 'Sinar Agung Elektronik', 'zgztnyuj@eelmail.com', '081615770004', 'Menteng - Jakarta Pusat', 'malang', '65', '', 12),
(12, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 13),
(13, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 14),
(14, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 15),
(15, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 16),
(16, 'Sinar Agung Elektronik', 'zgztnyuj@eelmail.com', '081615770004', 'Menteng - Jakarta Pusat', 'malang', '65', '', 17),
(17, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 18),
(18, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 19),
(19, 'Arie', 'arie.rachmad.s@gmail.com', '081615770004', 'jalan', 'Malang', '65125', '', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_pages`
--
ALTER TABLE `active_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_links`
--
ALTER TABLE `confirm_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_law`
--
ALTER TABLE `cookie_law`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_law_translations`
--
ALTER TABLE `cookie_law_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`abbr`,`for_id`) USING BTREE;

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_clients`
--
ALTER TABLE `orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_translations`
--
ALTER TABLE `products_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_pages`
--
ALTER TABLE `seo_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_pages_translations`
--
ALTER TABLE `seo_pages_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_categories_translations`
--
ALTER TABLE `shop_categories_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textual_pages_tanslations`
--
ALTER TABLE `textual_pages_tanslations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `value_store`
--
ALTER TABLE `value_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`thekey`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `vendors_orders`
--
ALTER TABLE `vendors_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_orders_clients`
--
ALTER TABLE `vendors_orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_pages`
--
ALTER TABLE `active_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confirm_links`
--
ALTER TABLE `confirm_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cookie_law`
--
ALTER TABLE `cookie_law`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cookie_law_translations`
--
ALTER TABLE `cookie_law_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders_clients`
--
ALTER TABLE `orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seo_pages_translations`
--
ALTER TABLE `seo_pages_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop_categories_translations`
--
ALTER TABLE `shop_categories_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subscribed`
--
ALTER TABLE `subscribed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `textual_pages_tanslations`
--
ALTER TABLE `textual_pages_tanslations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `value_store`
--
ALTER TABLE `value_store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vendors_orders`
--
ALTER TABLE `vendors_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendors_orders_clients`
--
ALTER TABLE `vendors_orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
