-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2024 lúc 10:24 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sp_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `ban_id` int(10) UNSIGNED NOT NULL,
  `ban_name` varchar(255) DEFAULT NULL,
  `ban_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`ban_id`, `ban_name`, `ban_image`, `created_at`, `updated_at`) VALUES
(1, 'dh', '65b3d2d6f0b4c_88f38fe568f7e51006156c253e98138f.jpg', '2024-01-26 08:42:14', '2024-01-26 08:42:14'),
(2, 'hj', '65b3d2e094aab_1520153250066.jpg', '2024-01-26 08:42:24', '2024-01-26 08:42:24'),
(3, 'banner', '65b3d90099b9b_T7015-1_(9).jpg', '2024-01-26 09:08:32', '2024-01-26 09:08:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_desc` text DEFAULT NULL,
  `cate_logo` text DEFAULT NULL,
  `cate_image` text DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_desc`, `cate_logo`, `cate_image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Đồng hồ nam', NULL, '65b3d3658be0c_T7015-1_(7).jpg', '65b3d3658cb2a_T7015-1_(13).jpg', NULL, '2024-01-26 08:44:37', '2024-01-26 08:44:37'),
(2, 'Đồng hồ nữ', NULL, '65b3d3783bfd8_T7015-1_(9).jpg', '65b3d3783c2df_88f38fe568f7e51006156c253e98138f.jpg', NULL, '2024-01-26 08:44:56', '2024-01-26 08:44:56'),
(3, 'Đồng hồ đôi', NULL, '65b3d3cdf05b7_1520153250066.jpg', '65b3d3cdf07ee_T7015-1_(7).jpg', NULL, '2024-01-26 08:46:21', '2024-01-26 08:46:21'),
(4, 'Đồng hồ thông minh', NULL, '65b3d91eed6d0_nen-mua-dong-ho-thong-minh-hay-vong-deo-tay-the-thao.jpg', '65b3d91eedaed_nen-mua-dong-ho-thong-minh-hay-vong-deo-tay-the-thao.jpg', NULL, '2024-01-26 09:09:02', '2024-01-26 09:09:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkouts`
--

CREATE TABLE `checkouts` (
  `check_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `checkouts`
--

INSERT INTO `checkouts` (`check_id`, `order_id`, `pro_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 11111122, '2024-01-26 09:10:48', '2024-01-26 09:10:48'),
(2, 2, 10, 2, 300000, '2024-01-26 09:13:26', '2024-01-26 09:13:26'),
(3, 3, 8, 2, 44444444, '2024-01-26 09:15:20', '2024-01-26 09:15:20'),
(4, 3, 5, 1, 11111122, '2024-01-26 09:15:20', '2024-01-26 09:15:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deal_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_19_071429_create_categories_table', 1),
(5, '2020_10_24_072329_create_products_table', 1),
(6, '2020_10_24_073218_create_reviews_table', 1),
(7, '2020_10_24_074109_create_wishlists_table', 1),
(8, '2020_10_24_074822_create_orders_table', 1),
(9, '2020_10_24_075159_create_checkouts_table', 1),
(10, '2020_10_24_100334_create_banners_table', 1),
(11, '2020_11_04_093055_create_deals_table', 1),
(12, '2020_11_28_162941_create_pro_chill_images_table', 1),
(13, '2020_12_02_031402_create_notifications_table', 1),
(14, '2020_12_02_134011_create_jobs_table', 1),
(15, '2022_12_06_023848_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('829197d4-7812-4bda-970c-3e7bfa95e827', 'App\\Notifications\\OrderSend', 'App\\User', 1, '{\"title\":\"B\\u1ea1n c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi #3\",\"content\":\"Xem ngay\"}', NULL, '2024-01-26 09:15:23', '2024-01-26 09:15:23'),
('f3ef8dad-8570-47c2-84af-b2ffc66f74a9', 'App\\Notifications\\OrderSend', 'App\\User', 1, '{\"title\":\"B\\u1ea1n c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi #1\",\"content\":\"Xem ngay\"}', NULL, '2024-01-26 09:10:58', '2024-01-26 09:10:58'),
('fc95ecd5-33f8-48dc-9aae-40c4aef59e82', 'App\\Notifications\\OrderSend', 'App\\User', 1, '{\"title\":\"B\\u1ea1n c\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi #2\",\"content\":\"Xem ngay\"}', NULL, '2024-01-26 09:13:28', '2024-01-26 09:13:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_phone` varchar(255) NOT NULL,
  `order_city` varchar(255) NOT NULL,
  `order_district` varchar(255) NOT NULL,
  `order_ward` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `ship_method` tinyint(4) NOT NULL,
  `pay_method` tinyint(4) NOT NULL,
  `bill_image` text DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_name`, `order_phone`, `order_city`, `order_district`, `order_ward`, `order_address`, `order_total`, `order_qty`, `ship_method`, `pay_method`, `bill_image`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'LÊ QUANG ANH QUÂN', '099543434', 'Bắc Kạn', 'Huyện Ba Bể', 'anh minh', 'huy hoan', '11111122', 1, 1, 1, NULL, 3, '2024-01-26 09:10:48', '2024-01-26 09:12:37'),
(2, 1, 'LÊ QUANG ANH QUÂN', '0987878', 'Bắc Kạn', 'Huyện Ba Bể', 'Triệu Sơn', 'Mỹ Phương', '300000', 2, 1, 1, NULL, 4, '2024-01-26 09:13:26', '2024-01-26 09:14:00'),
(3, 2, 'Quan', '023232323', 'Bắc Kạn', 'Huyện Ba Bể', 'Nam Lai', 'Mỹ Phương', '55555566', 3, 1, 1, NULL, 4, '2024-01-26 09:15:20', '2024-01-26 09:15:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_image` varchar(255) DEFAULT NULL,
  `pro_desc` text DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `pro_old_price` int(11) DEFAULT NULL,
  `pro_new_price` int(11) DEFAULT NULL,
  `pro_sale` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `cate_id`, `pro_name`, `pro_image`, `pro_desc`, `view`, `quantity`, `pro_old_price`, `pro_new_price`, `pro_sale`, `created_at`, `updated_at`) VALUES
(5, 1, 'Đồng hồ nam chính hãng Teintop T7015-1', '65b3d76b6fe18_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '<p>&nbsp;</p><div aria-expanded=\"false\" id=\"mttContainer\" style=\"transform: translate(94px, 162px);\">&nbsp;</div>', 8, 0, 22222211, 11111122, 1, '2024-01-26 08:54:50', '2024-01-26 09:15:20'),
(6, 3, 'Đồng hồ đôi chính hãng IW CARNIVAL IW626G-3 (Máy siêu mỏng)', '65b3d6e67980f_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '<p>&nbsp;</p><div aria-expanded=\"false\" id=\"mttContainer\" style=\"transform: translate(70px, 195px);\">&nbsp;</div>', 4, 2, 111, 11, 0, '2024-01-26 08:55:30', '2024-01-26 08:59:34'),
(7, 2, 'Đồng hồ nữ chính hãng IW CARNIVAL IW696L-1', '65b3d618441af_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '<p>&nbsp;</p>\r\n\r\n<div aria-expanded=\"false\" id=\"mttContainer\" style=\"transform: translate(184px, 180px);\">&nbsp;</div>', 1, 2, 70000, 70000, 0, '2024-01-26 08:56:08', '2024-01-26 08:56:13'),
(8, 1, 'Đồng hồ nam', '65b3d8b447192_BE9183-03L.jpg', '<p>&nbsp;</p><div aria-expanded=\"false\" id=\"mttContainer\" style=\"transform: translate(184px, 184px);\">&nbsp;</div>', 5, 1, 33333333, 22222222, 1, '2024-01-26 09:03:45', '2024-07-11 07:20:08'),
(9, 3, 'Đồng hồ đôi', '65b3d87753d4e_nen-mua-dong-ho-thong-minh-hay-vong-deo-tay-the-thao.jpg', NULL, 1, 3, 3333333, 22222222, 0, '2024-01-26 09:04:32', '2024-01-26 09:06:15'),
(10, 4, 'Đồng hồ thông minh', '65b3d9442baf0_nen-mua-dong-ho-thong-minh-hay-vong-deo-tay-the-thao.jpg', '<p>Đồng hồ th&ocirc;ng minh</p>\r\n\r\n<div aria-expanded=\"false\" id=\"mttContainer\" style=\"transform: translate(89px, 195px);\">&nbsp;</div>', 0, 998, 200000, 150000, 1, '2024-01-26 09:09:40', '2024-01-26 09:13:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_chill_images`
--

CREATE TABLE `pro_chill_images` (
  `chill_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `chill_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_chill_images`
--

INSERT INTO `pro_chill_images` (`chill_id`, `pro_id`, `chill_image`, `created_at`, `updated_at`) VALUES
(10, 5, '65b3d5cabccc6_T7015-1_(9).jpg', '2024-01-26 08:54:50', '2024-01-26 08:54:50'),
(11, 6, '65b3d5f220122_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '2024-01-26 08:55:30', '2024-01-26 08:55:30'),
(12, 7, '65b3d6184564c_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '2024-01-26 08:56:08', '2024-01-26 08:56:08'),
(13, 5, '65b3d64bc1b63_đồng_hồ_carnival_iw763g_(1).jpg', '2024-01-26 08:56:59', '2024-01-26 08:56:59'),
(14, 5, '65b3d66ab9cca_đồng_hồ_carnival_iw763g_(2).jpg', '2024-01-26 08:57:30', '2024-01-26 08:57:30'),
(15, 5, '65b3d688b9d70_đồng_hồ_carnival_iw779g_thụy_sỹ_(36) (1).jpg', '2024-01-26 08:58:00', '2024-01-26 08:58:00'),
(16, 6, '65b3d6e67adc1_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '2024-01-26 08:59:34', '2024-01-26 08:59:34'),
(17, 5, '65b3d6fb62b1b_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '2024-01-26 08:59:55', '2024-01-26 08:59:55'),
(18, 5, '65b3d76b719de_Dong-ho-nu-IW-Carnival-696L1-chinh-hang-5.jpg', '2024-01-26 09:01:47', '2024-01-26 09:01:47'),
(19, 8, '65b3d7e159b8e_tải xuống (1).jpg', '2024-01-26 09:03:45', '2024-01-26 09:03:45'),
(20, 9, '65b3d8104d6fd_dong-ho-stuhrling(1).jpg', '2024-01-26 09:04:32', '2024-01-26 09:04:32'),
(21, 9, '65b3d87756302_nen-mua-dong-ho-thong-minh-hay-vong-deo-tay-the-thao.jpg', '2024-01-26 09:06:15', '2024-01-26 09:06:15'),
(22, 8, '65b3d8907535d_BE9183-03L.jpg', '2024-01-26 09:06:40', '2024-01-26 09:06:40'),
(23, 8, '65b3d8b449589_BE9183-03L.jpg', '2024-01-26 09:07:16', '2024-01-26 09:07:16'),
(24, 10, '65b3d9442d34e_nen-mua-dong-ho-thong-minh-hay-vong-deo-tay-the-thao.jpg', '2024-01-26 09:09:40', '2024-01-26 09:09:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `rev_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rate` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`rev_id`, `user_id`, `pro_id`, `comment`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'sp tốt', 5, '2024-01-26 09:11:26', '2024-01-26 09:11:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `email_verified_at`, `password`, `name`, `provider`, `provider_id`, `avatar`, `phone`, `birthday`, `gender`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'quanlqa.21it@vku.udn.vn', NULL, NULL, 'LÊ QUANG ANH QUÂN', 'google', '107290842553881352584', NULL, NULL, NULL, NULL, 1, NULL, '2024-01-26 08:40:36', '2024-01-26 08:40:36'),
(2, 'anhquanle', 'quanle03032003@gmail.com', NULL, '$2y$10$UqWKa1UfdZgYj8OkJhHIw.waSbCRaCUPuSFWrrFn84WoSy6woWupu', 'Quan', NULL, NULL, NULL, NULL, '2004-03-12', 1, 0, NULL, '2024-01-26 09:14:40', '2024-01-26 09:14:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `wish_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`wish_id`, `user_id`, `pro_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2024-01-26 09:11:09', '2024-01-26 09:11:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`ban_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`check_id`),
  ADD KEY `checkouts_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `pro_chill_images`
--
ALTER TABLE `pro_chill_images`
  ADD PRIMARY KEY (`chill_id`),
  ADD KEY `pro_chill_images_pro_id_foreign` (`pro_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_pro_id_foreign` (`pro_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_pro_id_foreign` (`pro_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `ban_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `check_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `pro_chill_images`
--
ALTER TABLE `pro_chill_images`
  MODIFY `chill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rev_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wish_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `pro_chill_images`
--
ALTER TABLE `pro_chill_images`
  ADD CONSTRAINT `pro_chill_images_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
