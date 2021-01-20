-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 20, 2021 lúc 11:11 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `product_tab_app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `charge_id` bigint(20) NOT NULL,
  `test` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `capped_amount` decimal(8,2) DEFAULT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `billing_on` timestamp NULL DEFAULT NULL,
  `activated_on` timestamp NULL DEFAULT NULL,
  `trial_ends_on` timestamp NULL DEFAULT NULL,
  `cancelled_on` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_charge` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_07_07_171903_create_shops_table', 1),
(2, '2018_01_23_153809_add_billing_to_shops_table', 1),
(3, '2018_06_03_184733_add_soft_delete_to_shops_table', 1),
(4, '2018_06_03_185902_create_charges_table', 1),
(5, '2018_06_03_190233_remove_charge_id_from_shops_table', 1),
(6, '2018_08_16_123209_modify_charge_id_type', 1),
(7, '2018_08_30_114021_add_namespace_to_shops_table', 1),
(8, '2018_08_31_153154_create_plans_table', 1),
(9, '2018_08_31_154001_add_plan_to_shops_table_and_charges_table', 1),
(10, '2018_09_11_101333_add_usage_charge_support_to_charges_table', 1),
(11, '2018_09_12_101645_add_default_to_test_on_charges_table', 1),
(12, '2020_12_25_045233_create_cateogries_table', 1),
(13, '2020_12_25_045401_create_posts_table', 1),
(14, '2020_12_25_154502_add_freemium_flag_to_shops_table', 1),
(15, '2021_01_04_074843_create_settings_table', 1),
(16, '2021_01_07_024408_create_navbars_table', 1),
(17, '2021_01_08_065737_drop_and_add_column', 1),
(18, '2021_01_08_073559_drop_and_add_column_setting', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `navbars`
--

CREATE TABLE `navbars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `n_order` int(11) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_id`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `navbars`
--

INSERT INTO `navbars` (`id`, `name`, `icon`, `status`, `n_order`, `content`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'Description', 'fab fa-500px', 0, 3, '<p>\r\n<audio class=\"audio-for-speech\" src=\"\">&nbsp;</audio>\r\n</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"from\" src=\"\" /> <img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /> <img class=\"to\" src=\"\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"5990297141411\",\"5990297403555\",\"5990297600163\",\"5992750645411\",\"5992808415395\",\"5992750645411\",\"5992808218787\",\"5992808415395\",\"5992834826403\",\"5992834072739\",\"5992834891939\",\"5992793112739\",\"5992757559459\",\"5992834138275\",\"5992757526691\",\"5992757526691\",\"5992793112739\",\"5992757559459\",\"5992750645411\",\"5992808218787\",\"5992808415395\",\"5992834826403\",\"5992834072739\",\"5992834891939\",\"5992834138275\"]', '2021-01-11 18:51:07', '2021-01-20 02:36:06'),
(3, 'SIZE CHART', 'fab fa-accessible-icon', 0, 1, '<p>\r\n<audio class=\"audio-for-speech\" src=\"\">&nbsp;</audio>\r\n</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"from\" src=\"\" /> <img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /> <img class=\"to\" src=\"\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>CHEST</td>\r\n			<td>WAIST</td>\r\n			<td>HIP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>S</td>\r\n			<td>33</td>\r\n			<td>33</td>\r\n			<td>35</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M</td>\r\n			<td>40</td>\r\n			<td>34</td>\r\n			<td>36</td>\r\n		</tr>\r\n		<tr>\r\n			<td>L</td>\r\n			<td>40</td>\r\n			<td>35</td>\r\n			<td>33</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>This is a text block. You can use it to add text to your size chart.</p>', '[\"5990297469091\",\"5990297206947\",\"5990297403555\",\"5992757526691\"]', '2021-01-11 18:53:51', '2021-01-20 02:50:51'),
(4, 'REVIEWS', 'fab fa-accusoft', 0, 2, '<p>\r\n<audio class=\"audio-for-speech\" src=\"\">&nbsp;</audio>\r\n</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"from\" src=\"\" /> <img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /> <img class=\"to\" src=\"\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"5990297469091\",\"5990297206947\",\"5990297403555\",\"5992757526691\",\"5992757526691\",\"5992793112739\",\"5992757559459\",\"5992750645411\",\"5992808218787\",\"5992808415395\",\"5992834826403\",\"5992834072739\",\"5992834891939\",\"5992834138275\"]', '2021-01-11 18:55:02', '2021-01-20 02:51:28'),
(5, 'CUSTOM TAB', 'far fa-address-card', 1, 4, '<p>\r\n<audio class=\"audio-for-speech\" src=\"\">&nbsp;</audio>\r\n</p>\r\n\r\n<div class=\"hidden translate-tooltip-mtz\">\r\n<div class=\"header\">\r\n<div class=\"header-controls\">&nbsp;</div>\r\n\r\n<div class=\"translate-icons\"><img class=\"from\" src=\"\" /> <img class=\"arrow\" src=\"chrome-extension://hiidjliailpkjeigakikbfedlfijngih/images/right-arrow.png\" /> <img class=\"to\" src=\"\" /></div>\r\n</div>\r\n\r\n<div class=\"translated-text\">\r\n<div class=\"words\">&nbsp;</div>\r\n\r\n<div class=\"sentences\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '[\"5990297075875\",\"5990297206947\",\"5990297403555\",\"5992757526691\"]', '2021-01-11 18:55:32', '2021-01-20 02:52:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `capped_amount` decimal(8,2) DEFAULT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `test` tinyint(1) NOT NULL DEFAULT 0,
  `on_install` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `shopify_domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `font_site` int(11) DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_column` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_family` int(11) DEFAULT NULL,
  `background_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `shopify_domain`, `status`, `type`, `created_at`, `updated_at`, `font_site`, `background`, `max_column`, `color`, `font_family`, `background_title`, `color_title`) VALUES
(1, 'dth99store.myshopify.com', 1, 0, NULL, '2021-01-20 02:55:05', 12, '#efefef', 5, '#000000', 2, '#d38d8d', '#000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `shopify_domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grandfathered` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `freemium` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shops`
--

INSERT INTO `shops` (`id`, `shopify_domain`, `shopify_token`, `created_at`, `updated_at`, `grandfathered`, `deleted_at`, `namespace`, `plan_id`, `freemium`) VALUES
(1, 'dth99store.myshopify.com', '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', '2021-01-11 18:39:55', '2021-01-11 18:39:56', 0, NULL, NULL, NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charges_charge_id_unique` (`charge_id`),
  ADD KEY `charges_shop_id_foreign` (`shop_id`),
  ADD KEY `charges_plan_id_foreign` (`plan_id`),
  ADD KEY `charges_reference_charge_foreign` (`reference_charge`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_plan_id_foreign` (`plan_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `charges_reference_charge_foreign` FOREIGN KEY (`reference_charge`) REFERENCES `charges` (`charge_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `charges_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
