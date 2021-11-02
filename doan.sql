-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 29, 2021 lúc 01:57 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_10_21_103711_create_articles_table', 1),
(9, '2021_10_21_103810_create_categories_table', 1),
(10, '2021_10_21_103907_create_comments_table', 1),
(11, '2021_10_21_104006_create_orders_table', 1),
(12, '2021_10_21_104023_create_order_details_table', 1),
(13, '2021_10_21_104102_create_portfolios_table', 1),
(14, '2021_10_21_104351_create_products_table', 1),
(15, '2021_10_21_104402_create_promotions_table', 1),
(16, '2021_10_21_130615_reset_password', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('cc2dd6af02946b3065e4341a5c0a2e97fc3ca5eef46eff21c43b82890aeabb618cdc33e960503d19', 1, 1, 'Personal Access Token', '[]', 1, '2021-10-21 10:59:42', '2021-10-21 10:59:42', '2022-10-21 17:59:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'K1bL7NUyl77opiayc62XEYCaIofxSTHB9zbQvoNk', NULL, 'http://localhost', 1, 0, 0, '2021-10-21 07:17:06', '2021-10-21 07:17:06'),
(2, NULL, 'Laravel Password Grant Client', 'hkTQfQQGsr1FRGVu8hjBgS7PLNoJ30mn9FUzMxpY', 'users', 'http://localhost', 0, 1, 0, '2021-10-21 07:17:06', '2021-10-21 07:17:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-21 07:17:06', '2021-10-21 07:17:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_article`
--

DROP TABLE IF EXISTS `tpl_article`;
CREATE TABLE IF NOT EXISTS `tpl_article` (
  `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_keyword` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `view` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_article`
--

INSERT INTO `tpl_article` (`article_id`, `user_id`, `article_name`, `article_img`, `article_description`, `article_detail`, `article_keyword`, `created_at`, `updated_at`, `deleted_at`, `status`, `view`) VALUES
(1, 1, 'Tiết lộ hành động ăn mừng của Greenwood', '20210830125843.jpg', 'Sau khi ghi bàn thắng giúp Man United vươn lên dẫn trước, tiền đạo Mason Greenwood đã có hành động bắt chéo tay để ăn mừng.', '<h2>Greenwood tri &acirc;n Black Panther</h2>\r\n\r\n<p>Trong trận đấu tại v&ograve;ng 3 Premier League, Quỷ đỏ đ&atilde; tho&aacute;t khỏi hiểm địa Molineaux với một chiến thắng. Mason Greenwood l&agrave; cầu thủ ghi b&agrave;n duy nhất ở ph&uacute;t 80 gi&uacute;p Man United gi&agrave;nh trọn 3 điểm.</p>\r\n\r\n<p>Sau c&uacute; s&uacute;t tr&aacute;i ph&aacute; đ&aacute;nh bại thủ th&agrave;nh Wolves, tiền đạo sinh năm 2001 đ&atilde; chạy ra g&oacute;c s&acirc;n ăn mừng với h&agrave;nh động bắt ch&eacute;o tay trước ngực. Đ&acirc;y l&agrave; h&igrave;nh ảnh đ&atilde; từng xuất hiện nhiều lần tr&ecirc;n s&acirc;n cỏ, với &yacute; nghĩa &lsquo;Wakanda Forever&rsquo; &ndash; một khẩu hiệu của quốc gia giả tưởng trong vũ trụ điện ảnh Marvel.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/182251254/Ureka_Supply_bongda24h.vn_Outstream_1x1_050521_0\" name=\"google_ads_iframe_/182251254/Ureka_Supply_bongda24h.vn_Outstream_1x1_050521_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"1\"></iframe></p>\r\n\r\n<p><img alt=\"Greenwood tri ân Black Panther\" src=\"https://static.bongda24h.vn/medias/original/2021/8/30/img_2767.jpg\" style=\"height:837px; width:695px\" title=\"Greenwood tri ân Black Panther\" /></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mason Greenwood tri &acirc;n Black Panther sau khi ghi b&agrave;n</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>H&igrave;nh ảnh ăn mừng n&agrave;y từng được Aubameyang v&agrave; Jesse Lingard thực hiện tr&ecirc;n s&acirc;n cỏ Premier League. Tiền đạo Mason Greenwood cũng đăng tải bức ảnh n&agrave;y tr&ecirc;n mạng x&atilde; hội v&agrave; m&ocirc; tả bằng một biểu tượng &ldquo;infinite&rdquo; (vĩnh hẵng).</p>\r\n\r\n<p>Bởi ng&agrave;y 28/8/2020 l&agrave; ng&agrave;y mất của nam t&agrave;i tử Chadwick Boseman &ndash; người thủ vai Black Panther, v&igrave; căn bện ung thư. H&agrave;nh động đẹp của Greenwood nhằm tri &acirc;n diễn vi&ecirc;n sinh năm 1976, đ&atilde; nhận được những lời kh&iacute;ch lệ từ người h&acirc;m mộ.</p>\r\n\r\n<p>Về ph&iacute;a Mason Greenwood, anh trở th&agrave;nh cầu thủ tuổi teen (dưới 20 tuổi) thứ 4 trong lịch sử Premier League c&aacute;n mốc 20 b&agrave;n thắng, sau Michael Owen, Robbie Fowler v&agrave; Wayne Rooney. Sao trẻ sinh năm 2001 đang c&oacute; 3 b&agrave;n thắng sau 3 v&ograve;ng đấu đầu ti&ecirc;n v&agrave; chắc suất trong đội h&igrave;nh Man United.</p>', '#manu', '2021-08-29 22:58:43', '2021-10-27 21:12:26', NULL, 1, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_category`
--

DROP TABLE IF EXISTS `tpl_category`;
CREATE TABLE IF NOT EXISTS `tpl_category` (
  `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cate_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `view` int(11) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_category`
--

INSERT INTO `tpl_category` (`cate_id`, `user_id`, `cate_name`, `cate_img`, `cate_description`, `created_at`, `updated_at`, `deleted_at`, `status`, `view`) VALUES
(1, 1, 'Quà Tặng', '20210819173836.jpg', '<p>Một năm c&oacute; nhiều dịp tặng qu&agrave; cho&nbsp;<strong>kh&aacute;ch h&agrave;ng</strong>, đối t&aacute;c, sếp, bạn b&egrave; người th&acirc;n. V&igrave; vậy c&oacute; nhiều khi c&oacute; những m&oacute;n qu&agrave; qu&aacute; phổ biến l&agrave;m cho người nhận nh&agrave;m ch&aacute;n. Bởi vậy đ&ocirc;i khi v&agrave;o những dịp đặc biệt bạn n&ecirc;n chọn những dịp m&oacute;n qu&agrave; tặng s&aacute;ng tạo đ&ecirc; l&agrave;m người nhận th&iacute;ch th&uacute; v&agrave; bất ngờ....</p>', '2021-08-19 03:38:36', '2021-10-28 00:31:10', '2021-10-28 00:31:10', 1, NULL),
(2, 1, 'Trang Trí Nội Thất', '20210819174006.jpg', '<p><strong>Trang tr&iacute; nội thất</strong>&nbsp;l&agrave; lĩnh vực kh&ocirc;ng thể thiếu trong mỗi kh&ocirc;ng gian sống hiện nay.</p>', '2021-08-19 03:40:06', '2021-08-19 03:40:06', NULL, 1, NULL),
(3, 1, 'Đồ Chơi Trẻ Em', '20210819174244.jpg', '<p>Mỗi ng&agrave;y b&eacute; lại học th&ecirc;m nhiều điều mới, đ&ocirc;i tay b&eacute; dần trở n&ecirc;n cứng c&aacute;p v&agrave; muốn cầm nắm đồ chơi, đ&ocirc;i ch&acirc;n b&eacute; vững v&agrave;ng hơn để tham gia c&aacute;c hoạt động, c&aacute;c kỹ năng vận động của b&eacute; li&ecirc;n tục được cải thiện. B&eacute; cũng ph&aacute;t triển về mặt x&atilde; hội, tham gia nhiều tr&ograve; chơi cần tr&iacute; tưởng tượng v&agrave; thể hiện nhiều loại cảm x&uacute;c hơn. Cha mẹ n&ecirc;n t&igrave;m kiếm những đồ chơi gi&uacute;p con ph&aacute;t triển c&aacute;c kỹ năng n&agrave;y.</p>', '2021-08-19 03:42:44', '2021-08-19 03:42:44', NULL, 1, NULL),
(4, 1, 'Nội Trợ', '20210819174450.jpg', '<p>L&agrave;m nội trợ điều m&agrave; c&aacute;c mẹ lu&ocirc;n mong muốn l&agrave; mọi thứ phải thật nhanh gọn. C&ocirc;ng việc nội trợ kh&ocirc;ng hề đơn giản m&agrave; xen v&agrave;o đ&oacute; l&agrave; những &aacute;p lực v&ocirc; h&igrave;nh. Hiện nay, x&atilde; hội ph&aacute;t triển k&egrave;m theo đ&oacute; l&agrave; những sản phẩm tiện lợi cũng ra đời. Để phụ trợ trong việc nội trợ, hiện nay thị trường c&oacute; rất nhiều loại đồ gia dụng nhỏ tiện &iacute;ch đ&aacute;ng kể. Gi&uacute;p c&aacute;c b&agrave; nội trợ l&agrave;m việc đơn giản v&agrave; dễ d&agrave;ng hơn, tiết kiệm được khối thời gian.</p>', '2021-08-19 03:44:50', '2021-08-19 03:44:50', NULL, 1, NULL),
(5, 1, 'Dệt và May', '20210819174802.jpg', '<p>Dệt, may&nbsp;l&agrave;&nbsp;sản phẩm may mặc tới người ti&ecirc;u d&ugrave;ng. Leart cung cấp cho bạn những vật dụng cần thiết trong c&ocirc;ng việc n&agrave;y .</p>', '2021-08-19 03:48:02', '2021-09-11 04:12:30', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_comment`
--

DROP TABLE IF EXISTS `tpl_comment`;
CREATE TABLE IF NOT EXISTS `tpl_comment` (
  `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `comment_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_comment`
--

INSERT INTO `tpl_comment` (`comment_id`, `user_id`, `product_id`, `article_id`, `rate`, `role`, `comment_description`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, NULL, 1, 0, 0, 'Good', '2021-10-23 02:09:44', '2021-10-23 02:09:44', NULL, 1),
(2, 1, 2, NULL, 3, 1, 'ac', '2021-10-23 02:22:48', '2021-10-23 02:22:48', NULL, 1),
(3, 1, 2, NULL, 5, 1, 'deo', '2021-10-23 02:23:23', '2021-10-23 02:23:23', NULL, 1),
(4, 1, 2, NULL, 5, 1, 'dep', '2021-10-23 02:24:51', '2021-10-23 02:24:51', NULL, 1),
(5, 1, 2, NULL, 4, 1, 'sp dep', '2021-10-23 02:26:36', '2021-10-23 02:26:36', NULL, 1),
(6, 1, 2, NULL, 5, 1, 'sp tot', '2021-10-23 02:27:56', '2021-10-23 02:27:56', NULL, 1),
(7, 1, 2, NULL, 4, 1, 'San Pham On', '2021-10-27 20:48:51', '2021-10-27 20:48:51', NULL, 1),
(8, 1, NULL, 1, 0, 0, 'bv hay', '2021-10-27 21:09:34', '2021-10-27 21:09:34', NULL, 1),
(9, 1, NULL, 1, 0, 0, 'a', '2021-10-27 21:11:43', '2021-10-27 21:11:43', NULL, 1),
(10, 1, NULL, 1, 0, 0, 'bai viet hay', '2021-10-27 21:12:21', '2021-10-27 21:12:21', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_order`
--

DROP TABLE IF EXISTS `tpl_order`;
CREATE TABLE IF NOT EXISTS `tpl_order` (
  `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_order`
--

INSERT INTO `tpl_order` (`order_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `status`, `note`, `address`, `phone`) VALUES
(1, 1, '2021-10-24 06:47:19', '2021-10-24 06:47:19', NULL, 1, NULL, 'D3/33, khu phố 4 thị trấn Tân Túc, Bình Chánh, TP HCM', '0911022242'),
(2, 1, '2021-10-24 06:50:30', '2021-10-24 06:50:30', NULL, 1, NULL, 'D3/33, khu phố 4 thị trấn Tân Túc, Bình Chánh, TP HCM', '0911022242'),
(8, 1, '2021-10-25 01:22:51', '2021-10-25 01:22:51', NULL, 1, NULL, 'D3/33, khu phố 4 thị trấn Tân Túc, Bình Chánh, TP HCM', '0911022242'),
(7, 1, '2021-10-25 01:16:47', '2021-10-25 01:16:47', NULL, 1, NULL, 'D3/33, khu phố 4 thị trấn Tân Túc, Bình Chánh, TP HCM', '0911022242'),
(9, 1, '2021-10-25 06:30:47', '2021-10-25 06:30:47', NULL, 1, NULL, 'D3/33, khu phố 4 thị trấn Tân Túc, Bình Chánh, TP HCM', '0911022242'),
(10, 4, '2021-10-25 10:56:33', '2021-10-25 10:56:33', NULL, 1, NULL, 'HCM', '0911022242'),
(11, 4, '2021-10-25 10:59:05', '2021-10-25 10:59:05', NULL, 1, NULL, 'HCM', '0911022242'),
(12, 4, '2021-10-25 11:00:28', '2021-10-25 11:00:28', NULL, 1, NULL, 'HCM', '0911022242'),
(13, 4, '2021-10-25 11:18:05', '2021-10-25 11:18:05', NULL, 1, NULL, 'HCM', '0911022242'),
(14, 4, '2021-10-25 11:20:18', '2021-10-25 11:20:18', NULL, 1, NULL, 'HCM', '0911022242'),
(15, 4, '2021-10-25 11:21:32', '2021-10-25 11:21:32', NULL, 1, NULL, 'HCM', '0911022242'),
(16, 4, '2021-10-26 01:18:18', '2021-10-26 01:18:18', NULL, 1, NULL, 'HCM', '0911022242'),
(17, 4, '2021-10-26 01:22:45', '2021-10-26 01:22:45', NULL, 1, NULL, 'HCM', '0911022242');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_order_dt`
--

DROP TABLE IF EXISTS `tpl_order_dt`;
CREATE TABLE IF NOT EXISTS `tpl_order_dt` (
  `order_dt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`order_dt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_order_dt`
--

INSERT INTO `tpl_order_dt` (`order_dt_id`, `order_id`, `product_id`, `price`, `quantity`, `amount`) VALUES
(1, 1, 5, 90000, 2, 180000),
(2, 2, 5, 90000, 2, 180000),
(3, 3, 8, 50000, 1, 50000),
(4, 3, 7, 55000, 1, 55000),
(5, 4, 8, 50000, 1, 50000),
(6, 4, 7, 55000, 1, 55000),
(7, 5, 8, 50000, 1, 50000),
(8, 5, 7, 55000, 1, 55000),
(9, 6, 8, 50000, 1, 50000),
(10, 6, 7, 55000, 1, 55000),
(11, 7, 8, 50000, 1, 50000),
(12, 7, 7, 55000, 1, 55000),
(13, 8, 10, 10000, 1, 10000),
(14, 9, 8, 50000, 1, 50000),
(15, 10, 9, 150000, 1, 150000),
(16, 11, 9, 150000, 1, 150000),
(17, 11, 10, 10000, 1, 10000),
(18, 12, 8, 50000, 1, 50000),
(19, 13, 7, 55000, 1, 55000),
(20, 14, 7, 55000, 1, 55000),
(21, 15, 10, 10000, 1, 10000),
(22, 16, 7, 55000, 1, 55000),
(23, 16, 8, 50000, 1, 50000),
(24, 17, 8, 50000, 1, 50000),
(25, 17, 7, 110000, 2, 220000),
(26, 17, 9, 300000, 2, 600000),
(27, 17, 10, 10000, 1, 10000),
(28, 17, 6, 150000, 1, 150000),
(29, 17, 2, 150000, 1, 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_portfolio`
--

DROP TABLE IF EXISTS `tpl_portfolio`;
CREATE TABLE IF NOT EXISTS `tpl_portfolio` (
  `port_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `port_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`port_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_portfolio`
--

INSERT INTO `tpl_portfolio` (`port_id`, `user_id`, `port_name`, `port_origin`, `port_avatar`, `port_img`, `port_description`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 'Alexander', 'Mỹ', '20210819175234.png', '20210819175234.jpg', '<p>Nhập khẩu &amp; ph&acirc;n phối độc quyền qu&agrave; tặng thương hiệu, qu&agrave; tặng phong thủy, qu&agrave; tặng pha l&ecirc;, qu&agrave; tặng để b&agrave;n, qu&agrave; tặng vật liệu da,..</p>', '2021-08-19 03:52:34', '2021-09-11 04:49:05', NULL, 1),
(2, 1, 'Carmella William', 'Việt Nam', '20210819175531.png', '20210819175531.jpg', '<p><strong>Đại l&yacute; ph&acirc;n phối đ&egrave;n trang tr&iacute; nội thất </strong>ch&uacute;ng t&ocirc;i&nbsp;lu&ocirc;n mong muốn t&igrave;m kiếm thị trường ti&ecirc;u thụ đ&egrave;n trang tr&iacute; c&aacute;c loại với mục đ&iacute;ch hợp t&aacute;c v&agrave; ph&acirc;n phối&nbsp;sản phẩm đến mọi nh&agrave;.</p>', '2021-08-19 03:55:31', '2021-08-19 03:55:31', NULL, 1),
(3, 1, 'Darielle', 'Việt Nam', '20210819175730.png', '20210819175730.jpg', '<p><em>Với nhiều năm kinh nghiệm thiết kế, gia c&ocirc;ng, sản xuất đồ nội trợ, vật dụng thiết kế&nbsp;cao cấp. Phương ch&acirc;m uy t&iacute;n đặt l&ecirc;n h&agrave;ng đầu.</em></p>', '2021-08-19 03:57:30', '2021-08-19 03:57:30', NULL, 1),
(4, 1, 'Diana-Day', 'Hàn Quốc', '20210819175843.png', '20210819175843.jpg', '<p>Đi c&ugrave;ng với người phụ nữ mọi nh&agrave;</p>', '2021-08-19 03:58:43', '2021-08-19 03:58:43', NULL, 1),
(5, 1, 'Emilla', 'Nhật Bản', '20210819175948.png', '20210819175948.jpg', '<p>C&ocirc;ng nghệ dệt may số 1 tại Nhật Bản</p>', '2021-08-19 03:59:48', '2021-08-19 03:59:48', NULL, 1),
(6, 1, 'Jasmine', 'Anh', '20210819180121.png', '20210819180121.jpg', '<p>Qu&agrave; tặng cho một m&ugrave;a gi&aacute;ng sinh &yacute; nghĩa cũng l&agrave; ti&ecirc;u ch&iacute; của ch&uacute;ng t&ocirc;i.</p>', '2021-08-19 04:01:21', '2021-08-19 04:01:21', NULL, 1),
(7, 1, 'Jach-Ella', 'Mỹ', '20210819180351.png', '20210819181009.png', '<p>Qu&agrave; tặng cho những cặp đ&ocirc;i t&igrave;nh nh&acirc;n</p>', '2021-08-19 04:03:51', '2021-08-19 04:10:09', NULL, 1),
(8, 1, 'Juliette', 'Trung Quốc', '20210819180551.png', '20210819180551.png', '<p>Đồ chơi nội địa được sản xuất v&agrave; kiểm định kỹ c&agrave;ng. Chất lượng l&agrave; ti&ecirc;u ch&iacute; số 1 của ch&uacute;ng t&ocirc;i</p>', '2021-08-19 04:05:51', '2021-08-19 04:05:51', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_product`
--

DROP TABLE IF EXISTS `tpl_product`;
CREATE TABLE IF NOT EXISTS `tpl_product` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `port_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img_hover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_keyword` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpl_product`
--

INSERT INTO `tpl_product` (`product_id`, `cate_id`, `user_id`, `port_id`, `product_name`, `product_img`, `product_img_hover`, `product_price`, `product_color`, `product_description`, `product_quantity`, `product_keyword`, `status`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 3, 'Ly Thủy Tinh Vui Vẻ', '20210819181949.jpg', '20210819181949.jpg', 75000, 'Đen, Xám, Cam, Trắng', '<p>Chiếc ly xinh xắn sẽ l&agrave;m kh&ocirc;ng gian nh&agrave; bếp bạn tr&ocirc;ng dễ thương hơn</p>', 100, '#noitro', 1, NULL, '2021-08-19 04:19:49', '2021-09-11 17:16:32', '2021-09-11 17:16:32'),
(2, 3, 1, 6, 'Mô Tô Đồ Chơi', '20210819182206.jpg', '20210819182206.jpg', 150000, NULL, '<p>Qu&agrave; tặng d&agrave;nh cho b&eacute;, chiếc m&ocirc; t&ocirc; nhỏ nhắn v&agrave; độc đ&aacute;o</p>', 100, '#dochoi', 0, NULL, '2021-08-19 04:22:06', '2021-10-28 00:32:12', NULL),
(3, 4, 1, 4, 'Thớt Đen Đa Dụng', '20210819182504.jpg', '20210819182504.jpg', 70000, NULL, '<p>Thiết kế tối m&agrave;u gi&uacute;p chống bẩn, kiểu d&aacute;n d&agrave;i gi&uacute;p bạn dễ d&agrave;ng chặt, cắt c&aacute;c vật tươi sống c&oacute; k&iacute;ch thước lớn.</p>', 100, '#noitro', 0, NULL, '2021-08-19 04:25:04', '2021-09-11 03:53:06', NULL),
(4, 4, 1, 4, 'Thớt Trắng Tròn', '20210819182618.jpg', '20210819182618.jpg', 50000, NULL, '<p>Thiết kế sang trọng, g&ograve;n g&agrave;n v&agrave; nh&igrave;n đẹp mắt</p>', 100, '#noitro', 1, NULL, '2021-08-19 04:26:18', '2021-09-11 03:57:06', NULL),
(5, 2, 1, 2, 'Lọ Cắm Hoa Tròn', '20210819182848.jpg', '20210819182848.jpg', 45000, 'Xanh, Xám', '<p>Lọ cắm hoa tr&ograve;n với k&iacute;ch thước nhỏ gọn nhưng kh&ocirc;ng k&eacute;m phần đẹp mắt</p>', 96, '#trangtri', 1, NULL, '2021-08-19 04:28:48', '2021-10-24 06:50:30', NULL),
(6, 4, 1, 4, 'Ấm Trà Trong Suốt', '20210819183208.jpg', '20210819183208.jpg', 150000, 'Trắng Trong Suốt', '<p>Ấm tr&agrave; trong suốt với dung t&iacute;ch kh&aacute; lớn v&agrave; khả năng giữ nhiệt v&ocirc; c&ugrave;ng l&acirc;u. Thiết kế mới lạ v&agrave; đẹp mắt gi&uacute;p giang bếp bạn sẽ trong hiện đại hơn</p>', 99, '#noitro', 1, NULL, '2021-08-19 04:32:08', '2021-10-26 01:22:45', NULL),
(7, 1, 1, 1, 'Voi Điêu Khắc', '20210819183500.jpg', '20210819183500.jpg', 55000, 'Nâu Gỗ', '<p>Ch&uacute; voi được đi&ecirc;u khắc tinh tế từ c&aacute;c bộ phận chi tiết nhỏ nhất. M&oacute;n qu&agrave; kh&aacute; độc đ&aacute;o cho bạn b&egrave; v&agrave; đồng nghiệp</p>', 99990, '#quatang', 1, NULL, '2021-08-19 04:35:00', '2021-10-26 01:22:45', NULL),
(8, 1, 1, 6, 'Gấu Bông Cáo Đỏ', '20210820115730.jpg', '20210820115730.jpg', 50000, 'Đỏ', '<p>Ch&uacute; c&aacute;o m&agrave;u đỏ thể hiện một t&igrave;nh y&ecirc;u ấm &aacute;p</p>', 91, '#quatang', 1, NULL, '2021-08-19 21:57:30', '2021-10-26 01:22:45', NULL),
(9, 4, 1, 4, 'Tấm Thớt và Tộ Đựng Thức Ăn', '20210820120007.jpg', '20210820120007.jpg', 150000, 'Xám Gỗ', '<p>Với dung t&iacute;ch đựng thức ăn lớn, gi&uacute;p cho bữa cơm gia đ&igrave;nh th&ecirc;m phần truyền thống với m&agrave;u sắc nh&igrave;n cổ k&iacute;n</p>', 96, '#noitro', 1, NULL, '2021-08-19 22:00:07', '2021-10-26 01:22:45', NULL),
(10, 3, 1, 8, 'Cá Gỗ', '20210820120220.jpg', '20210820120220.jpg', 10000, 'Xám Gỗ', '<p>Đươc thiết kế bằng gỗ đảm bảo sức khỏe cho b&eacute;, ngo&agrave;i ra cũng c&oacute; thể trang tr&iacute; nh&agrave; cửa bằng c&aacute;ch d&aacute;n tường nh&igrave;n độc đ&aacute;o hơn</p>', 9996, '#dochoi', 1, NULL, '2021-08-19 22:02:20', '2021-10-26 01:22:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_promotion`
--

DROP TABLE IF EXISTS `tpl_promotion`;
CREATE TABLE IF NOT EXISTS `tpl_promotion` (
  `promotion_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promotion_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_key` int(11) DEFAULT NULL,
  `promotion_money` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `end_at` datetime NOT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpl_reset_password`
--

DROP TABLE IF EXISTS `tpl_reset_password`;
CREATE TABLE IF NOT EXISTS `tpl_reset_password` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `lastName`, `firstName`, `username`, `avatar`, `gender`, `phone`, `address`, `email`, `password`, `level`, `remember_token`, `birthday`, `created_at`, `updated_at`, `deleted_at`, `status`, `code`) VALUES
(1, 'Bình', 'Huỳnh Lê Thanh', 'binhadmin', NULL, NULL, '0911022242', NULL, 'thanhbinh0606.hcm@gmail.com', '$2y$10$CNEYwm3n3WsvVBRe2Jz0aOmUs5s2rmOxUMsiodpvS0ZJhTuPVvy3a', 1, NULL, NULL, '2021-10-21 10:50:12', '2021-10-27 21:15:14', NULL, 1, NULL),
(4, 'Amo', 'Tee', 'binhcute', NULL, 1, '0911022242', 'HCM', 'thanhbinhadmin@yopmail.com', '$2y$10$tRismR8b0zCNG4kGhx8RjuiNh9PysTlixeByo71ZZkGOIW1OvniFC', 0, NULL, NULL, '2021-10-21 11:10:32', '2021-10-21 11:10:45', NULL, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
