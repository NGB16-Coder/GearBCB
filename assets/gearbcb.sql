-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 22, 2025 lúc 05:20 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gearbcb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `bl_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `sp_id` int NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`bl_id`, `tk_id`, `sp_id`, `noi_dung`, `an_hien`, `ngay_tao`, `ngay_update`) VALUES
(1, 4, 12, 'ốp xịn, đẹp', b'1', '2025-04-21 22:59:14', '2025-04-21 22:59:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ctdh_id` int NOT NULL,
  `order_id` int NOT NULL,
  `sp_id` int NOT NULL,
  `gia_mua` int NOT NULL,
  `so_luong_mua` int NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `an_hien` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ctdh_id`, `order_id`, `sp_id`, `gia_mua`, `so_luong_mua`, `ngay_tao`, `ngay_update`, `an_hien`) VALUES
(3, 2, 13, 1000000, 1, '2025-04-17 22:09:23', '2025-04-17 22:09:23', b'1'),
(4, 3, 13, 1000000, 4, '2025-04-17 22:26:56', '2025-04-17 22:26:56', b'1'),
(5, 3, 18, 299000, 6, '2025-04-17 22:26:56', '2025-04-17 22:26:56', b'1'),
(6, 4, 15, 850000, 4, '2025-04-17 22:33:46', '2025-04-17 22:33:46', b'1'),
(7, 4, 13, 1000000, 4, '2025-04-17 22:33:46', '2025-04-17 22:33:46', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `dg_id` int NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `sp_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `order_id` int NOT NULL,
  `so_sao` int NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `dm_id` int NOT NULL,
  `ten_dm` varchar(255) NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`dm_id`, `ten_dm`, `an_hien`, `ngay_tao`, `ngay_update`) VALUES
(43, 'Ốp', b'1', '2025-04-16 12:26:26', '2025-04-16 12:26:26'),
(44, 'Sạc', b'1', '2025-04-17 16:18:41', '2025-04-17 16:18:41'),
(46, 'Gậy chụp ảnh', b'1', '2025-04-22 10:51:20', '2025-04-22 10:51:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `order_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `dia_chi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ten_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sdt_nhan` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ngay_dat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tong_so_luong` int NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1',
  `tong_tien` int NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`order_id`, `tk_id`, `dia_chi_nhan`, `ten_nhan`, `sdt_nhan`, `ngay_dat`, `tong_so_luong`, `trang_thai`, `tong_tien`, `an_hien`, `ngay_update`) VALUES
(2, 4, NULL, NULL, NULL, '2025-04-17 22:09:23', 1, 1, 1000000, b'1', '2025-04-22 10:01:33'),
(3, 4, NULL, NULL, NULL, '2025-04-17 22:26:56', 10, 4, 5794000, b'1', '2025-04-22 10:22:22'),
(4, 4, NULL, NULL, NULL, '2025-04-17 22:33:46', 8, 3, 7400000, b'1', '2025-04-22 10:17:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `sp_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `so_luong` int NOT NULL COMMENT 'số lượng',
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `sp_id`, `tk_id`, `so_luong`, `an_hien`, `ngay_tao`, `ngay_update`) VALUES
(10, 12, 4, 2, b'1', '2025-04-17 22:35:51', '2025-04-17 22:35:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_img`
--

CREATE TABLE `list_img` (
  `sp_id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `an_hien` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `sp_id` int NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `img_sp` varchar(255) NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `trang_thai` bit(1) NOT NULL DEFAULT b'1',
  `dm_id` int NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `an_hien` bit(1) DEFAULT b'1',
  `tong_dg` int DEFAULT NULL,
  `tong_so_sao` int DEFAULT NULL,
  `km_sp` int DEFAULT '0',
  `gia_sp` int NOT NULL DEFAULT '0',
  `so_luong` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`sp_id`, `ten_sp`, `img_sp`, `mo_ta`, `trang_thai`, `dm_id`, `ngay_tao`, `ngay_update`, `an_hien`, `tong_dg`, `tong_so_sao`, `km_sp`, `gia_sp`, `so_luong`) VALUES
(10, 'Ốp lưng iPhone 16 Pro Max', 'assets/img/product/1744781484_op-lung-iphone-16-pro-max-apple-silicone-magsafe_7_.jpg', 'Ốp lưng iPhone 16 Pro Max Apple MagSafe Clear nổi bật với màu sắc trong suốt, vừa bảo vệ tốt vừa giữ nguyên vẻ đẹp nguyên bản của iPhone 16 Pro Max. Ốp có kích thước mỏng, khối lượng nhẹ, vừa đảm bảo thẩm mỹ vừa đem đến trải nghiệm cầm nắm thoải mái. Sản phẩm ốp lưng Apple iPhone 16 Series hỗ trợ tính năng sạc không dây MagSafe, đồng thời ngăn trầy xước, hạn chế ố vàng hiệu quả. ', b'1', 43, '2025-04-16 12:31:24', '2025-04-16 12:31:24', b'1', NULL, NULL, 999000, 1250000, 123124),
(12, 'Ốp lưng iPhone 16 Pro Max Apple With Magsafe Clear', 'assets/img/product/1744882078_op-lung-iphone-16-pro-max-apple-magsafe-clear.png', 'Ốp lưng iPhone 16 Pro Max Apple MagSafe Clear nổi bật với màu sắc trong suốt, vừa bảo vệ tốt vừa giữ nguyên vẻ đẹp nguyên bản của iPhone 16 Pro Max. Ốp có kích thước mỏng, khối lượng nhẹ, vừa đảm bảo thẩm mỹ vừa đem đến trải nghiệm cầm nắm thoải mái. Sản phẩm ốp lưng Apple iPhone 16 Series hỗ trợ tính năng sạc không dây MagSafe, đồng thời ngăn trầy xước, hạn chế ố vàng hiệu quả. ', b'1', 43, '2025-04-17 16:27:58', '2025-04-17 16:27:58', b'1', NULL, NULL, 1200000, 1490000, 123566),
(13, 'Ốp lưng iPhone 16 Pro Max Spigen Ultra Hybrid With Magsafe Zero One', 'assets/img/product/1744882464_op-lung-iphone-16-pro-max-spigen-ultra-hybrid-magsafe-zero-one_8_.jpg', 'Ốp lưng iPhone 16 Pro Max Apple MagSafe Clear nổi bật với màu sắc trong suốt, vừa bảo vệ tốt vừa giữ nguyên vẻ đẹp nguyên bản của iPhone 16 Pro Max. Ốp có kích thước mỏng, khối lượng nhẹ, vừa đảm bảo thẩm mỹ vừa đem đến trải nghiệm cầm nắm thoải mái. Sản phẩm ốp lưng Apple iPhone 16 Series hỗ trợ tính năng sạc không dây MagSafe, đồng thời ngăn trầy xước, hạn chế ố vàng hiệu quả. ', b'1', 43, '2025-04-17 16:34:24', '2025-04-17 16:34:24', b'1', NULL, NULL, 1000000, 1400000, 55550),
(14, 'Ốp lưng iPhone 16 Pro Max', 'assets/img/product/1744882502_op-lung-iphone-16-pro-max-apple-silicone-magsafe_3_.jpg', 'Ốp lưng iPhone 16 Pro Max Apple MagSafe Clear nổi bật với màu sắc trong suốt, vừa bảo vệ tốt vừa giữ nguyên vẻ đẹp nguyên bản của iPhone 16 Pro Max. Ốp có kích thước mỏng, khối lượng nhẹ, vừa đảm bảo thẩm mỹ vừa đem đến trải nghiệm cầm nắm thoải mái. Sản phẩm ốp lưng Apple iPhone 16 Series hỗ trợ tính năng sạc không dây MagSafe, đồng thời ngăn trầy xước, hạn chế ố vàng hiệu quả. ', b'1', 43, '2025-04-17 16:35:02', '2025-04-17 16:35:02', b'1', NULL, NULL, 899000, 1200000, 2354),
(15, 'Củ sạc Samsung Type-C 45W kèm cáp C-C 5A 1.8M T4510', 'assets/img/product/1744882895_frame_41.jpg', 'Củ sạc Type C Samsung T4510 45W có kèm cáp là củ sạc được mong đợi nhất trong thời điểm hiện tại. Bởi đây chính là phiên bản sạc Samsung chính hãng dành cho mẫu điện thoại Samsung Galaxy S22 Ultra cực hot gần đây. Hãy xem điểm đặc biệt của củ sạc này là gì nhé!', b'1', 44, '2025-04-17 16:41:35', '2025-04-17 16:41:35', b'1', NULL, NULL, 850000, 1200000, 346530),
(16, 'Củ sạc Baseus Super SI 25W 1 cổng kèm cáp Type-C to Type-C 1M', 'assets/img/product/1744883066_group_135_1.jpg', 'Củ sạc Type C Samsung T4510 45W có kèm cáp là củ sạc được mong đợi nhất trong thời điểm hiện tại. Bởi đây chính là phiên bản sạc Samsung chính hãng dành cho mẫu điện thoại Samsung Galaxy S22 Ultra cực hot gần đây. Hãy xem điểm đặc biệt của củ sạc này là gì nhé!', b'1', 44, '2025-04-17 16:44:26', '2025-04-17 16:44:26', b'1', NULL, NULL, 300000, 500000, 56645),
(17, 'Sạc Trusmi cổng 1A1C PD 20W kèm cáp type-C to type-C 60W CH11 (EU)', 'assets/img/product/1744883136_cu-sac-trusmi-ch011-1a-1c-20w-kem-cap-type-c-to-type-c-60w-eu_2_.png', 'Củ sạc Type C Samsung T4510 45W có kèm cáp là củ sạc được mong đợi nhất trong thời điểm hiện tại. Bởi đây chính là phiên bản sạc Samsung chính hãng dành cho mẫu điện thoại Samsung Galaxy S22 Ultra cực hot gần đây. Hãy xem điểm đặc biệt của củ sạc này là gì nhé!', b'1', 44, '2025-04-17 16:45:36', '2025-04-17 16:45:36', b'1', NULL, NULL, 200000, 300000, 23223),
(18, 'Sạc Trusmi cổng USB-C PD 20W kèm cáp type-C to Lightning 20W (EU) CH10', 'assets/img/product/1745289391_cu-sac-trusmi-type-c-pd-20w-kem-cap-type-c-to-lightning-20w-eu_2_.jpg', 'Củ sạc Type C Samsung T4510 45W có kèm cáp là củ sạc được mong đợi nhất trong thời điểm hiện tại. Bởi đây chính là phiên bản sạc Samsung chính hãng dành cho mẫu điện thoại Samsung Galaxy S22 Ultra cực hot gần đây. Hãy xem điểm đặc biệt của củ sạc này là gì nhé!', b'1', 44, '2025-04-17 16:46:35', '2025-04-17 16:46:35', b'1', NULL, NULL, 299000, 350000, 12350),
(21, 'Gậy chụp ảnh Tripod WIWU Selfie Stick SE012', 'assets/img/product/1745294352_gay-chup-anh-tripod-wiwu-selfie-stick-se012_2_.webp', 'Gậy chụp ảnh Tripod Wiwu Selfie Stick SE012 được tạo nên từ nhựa ABS và hợp kim nhôm, có thể điều chỉnh chiều dài linh động bằng cách kéo ra hoặc thu vào. Gậy có độ dài tối đa là 1.8m nhờ đó người dùng có thể thu được nhiều khoảnh khắc ở nhiều góc chụp khác nhau', b'1', 46, '2025-04-22 10:59:12', '2025-04-22 10:59:12', b'1', NULL, NULL, 495000, 550000, 12356),
(22, 'Gậy chụp ảnh Tripod WIWU DETACHABLE SE001', 'assets/img/product/1745294515_text_ng_n_39__14.webp', 'Gậy chụp ảnh Tripod Wiwu Detachable SE001 với thiết kế có thể tháo rời đáp ứng được nhiều nhu cầu chụp khác nhau của người dùng. gậy với kết nối bluetooth hỗ trợ chụp hình thông qua điều khiển từ xa ở khoảng cách tới 10m', b'1', 46, '2025-04-22 11:01:55', '2025-04-22 11:01:55', b'1', NULL, NULL, 200000, 250000, 12356),
(23, 'Gậy chụp ảnh Tripod Wiwu Warrior SE013', 'assets/img/product/1745294890_text_ng_n_68__2_6.webp', 'Gậy chụp ảnh Tripod Wiwu Warrior SE013 là phụ kiện đa năng 3 trong 1 với thiết kế hiện đại, tích hợp chống rung và kết nối Bluetooth điều khiển từ xa', b'1', 46, '2025-04-22 11:08:10', '2025-04-22 11:08:10', b'1', NULL, NULL, NULL, 1150000, 123123);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `slide_id` int NOT NULL,
  `img_slide` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tk_id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `role` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tk_id`, `ho_ten`, `dia_chi`, `email`, `sdt`, `mat_khau`, `role`, `ngay_tao`, `ngay_update`, `trang_thai`) VALUES
(1, 'Nguyễn Gia Bảo', 'Phương Canh', 'admin@gmail.com', '0833236944', 'admin123', b'0', '2024-11-12 13:18:15', '2024-11-12 13:18:15', b'0'),
(4, 'nguyễn văn b', 'abc123', 'nguyenvanb@gmail.com', '123123', '123123', b'1', '2024-11-20 11:30:56', '2024-11-12 11:30:56', b'0'),
(5, 'nguyễn văn c', 'abc123', 'nguyenvanc@gmail.com', '123111', '123123', b'1', '2024-11-20 11:27:04', '2024-11-20 11:27:04', b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`bl_id`),
  ADD UNIQUE KEY `bl_id` (`bl_id`),
  ADD KEY `binh_luan_fk1` (`tk_id`),
  ADD KEY `fk_binh_luan_san_pham` (`sp_id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ctdh_id`),
  ADD UNIQUE KEY `ctdh_id` (`ctdh_id`),
  ADD KEY `chi_tiet_don_hang_fk1` (`order_id`),
  ADD KEY `chi_tiet_don_hang_fk2` (`sp_id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`dg_id`),
  ADD UNIQUE KEY `dg_id` (`dg_id`),
  ADD KEY `danh_gia_fk3` (`tk_id`),
  ADD KEY `danh_gia_fksp` (`sp_id`),
  ADD KEY `danh_gia_fkod` (`order_id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`dm_id`),
  ADD UNIQUE KEY `dm_id` (`dm_id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `don_hang_fk1` (`tk_id`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `gio_hang_fk1` (`sp_id`),
  ADD KEY `gio_hang_fk2` (`tk_id`);

--
-- Chỉ mục cho bảng `list_img`
--
ALTER TABLE `list_img`
  ADD PRIMARY KEY (`sp_id`),
  ADD UNIQUE KEY `sp_id` (`sp_id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`sp_id`),
  ADD UNIQUE KEY `sp_id` (`sp_id`),
  ADD KEY `san_pham_fk9` (`dm_id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`),
  ADD UNIQUE KEY `slide_id` (`slide_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tk_id`),
  ADD UNIQUE KEY `tk_id` (`tk_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `bl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ctdh_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `dg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `dm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `list_img`
--
ALTER TABLE `list_img`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `tk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_fk1` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`),
  ADD CONSTRAINT `fk_binh_luan_san_pham` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`);

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_fk1` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`),
  ADD CONSTRAINT `chi_tiet_don_hang_fk2` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_chi_tiet_don_hang_san_pham` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_fk3` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gia_fkod` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gia_fksp` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`),
  ADD CONSTRAINT `fk_danh_gia_san_pham` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_fk1` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_gio_hang_san_pham` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`),
  ADD CONSTRAINT `gio_hang_fk1` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `gio_hang_fk2` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`);

--
-- Các ràng buộc cho bảng `list_img`
--
ALTER TABLE `list_img`
  ADD CONSTRAINT `list_img_fk0` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_fk9` FOREIGN KEY (`dm_id`) REFERENCES `danh_muc` (`dm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
