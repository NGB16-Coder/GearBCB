-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 10, 2024 lúc 04:34 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `bl_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `spbt_id` int NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ctdh_id` int NOT NULL,
  `order_id` int NOT NULL,
  `spbt_id` int NOT NULL,
  `gia_mua` int NOT NULL,
  `so_luong_mua` int NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `an_hien` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ctdh_id`, `order_id`, `spbt_id`, `gia_mua`, `so_luong_mua`, `ngay_tao`, `ngay_update`, `an_hien`) VALUES
(1, 1, 2, 500000, 1, '2024-12-10 11:03:19', '2024-12-10 11:03:19', b'1'),
(2, 1, 19, 999999, 3, '2024-12-10 11:03:19', '2024-12-10 11:03:19', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `dg_id` int NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `spbt_id` int NOT NULL,
  `sp_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `order_id` int NOT NULL,
  `so_sao` int NOT NULL,
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`dg_id`, `noi_dung`, `spbt_id`, `sp_id`, `tk_id`, `order_id`, `so_sao`, `an_hien`, `ngay_tao`, `ngay_update`) VALUES
(1, 'cốc đẹp, xịn, chất lượng', 2, 1, 5, 1, 5, b'1', '2024-12-10 11:19:25', '2024-12-10 11:19:25'),
(2, 'quá đẹp', 19, 9, 5, 1, 5, b'1', '2024-12-10 11:19:25', '2024-12-10 11:19:25');

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
(1, 'Ấm giữ nhiệt', b'1', '2024-11-20 02:26:12', '2024-11-20 02:26:12'),
(2, 'Cốc giữ nhiệt', b'1', '2024-11-22 14:19:07', '2024-11-22 14:19:07');

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
(1, 5, NULL, NULL, NULL, '2024-12-10 11:03:19', 4, 3, 3499997, b'1', '2024-12-10 11:12:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `spbt_id` int NOT NULL,
  `size_id` int NOT NULL,
  `tk_id` int NOT NULL,
  `so_luong` int NOT NULL COMMENT 'số lượng',
  `an_hien` bit(1) DEFAULT b'1',
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `spbt_id`, `size_id`, `tk_id`, `so_luong`, `an_hien`, `ngay_tao`, `ngay_update`) VALUES
(2, 3, 3, 5, 1, b'1', '2024-12-10 11:01:11', '2024-12-10 11:01:11');

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
  `tong_so_sao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`sp_id`, `ten_sp`, `img_sp`, `mo_ta`, `trang_thai`, `dm_id`, `ngay_tao`, `ngay_update`, `an_hien`, `tong_dg`, `tong_so_sao`) VALUES
(1, 'Cốc bạc in tên', 'assets/img/product/1733800842_vn-11134207-7r98o-lwpnuez7m7dn51.jpg', 'Cốc nước giữ nhiệt Lason Mature inox 306, chống tràn, ly uống cafe giữ nhiệt 6 - 8 tiếng 420ml', b'1', 2, '2024-12-10 10:20:42', '2024-12-10 10:20:42', b'1', NULL, NULL),
(2, 'Cốc giữ nhiệt đen', 'assets/img/product/1733800970_vn-11134207-7r98o-lsi4bf0h6htw19@resize_w450_nl.jpg', 'Cốc giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 2, '2024-12-10 10:22:50', '2024-12-10 10:22:50', b'1', NULL, NULL),
(3, 'Cốc giữ nhiệt trắng', 'assets/img/product/1733802329_vn-11134207-7r98o-lsi4bf0h3op0c0.jpg', 'Cốc giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 2, '2024-12-10 10:45:29', '2024-12-10 10:45:29', b'1', NULL, NULL),
(4, 'Cốc giữ nhiệt tím', 'assets/img/product/1733802461_vn-11134207-7r98o-lqiji4puu0xja7@resize_w450_nl.jpg', 'Cốc giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 2, '2024-12-10 10:47:41', '2024-12-10 10:47:41', b'1', NULL, NULL),
(5, 'Ấm giữ nhiệt trắng', 'assets/img/product/1733802547_vn-11134201-23030-nckrp9un6fov49.jpg', 'Ấm giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 1, '2024-12-10 10:49:07', '2024-12-10 10:49:07', b'1', NULL, NULL),
(6, 'Ấm giữ nhiệt đen', 'assets/img/product/1733802635_vn-11134201-23030-fij5opfp6fovb9.jpg', 'Ấm giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 1, '2024-12-10 10:50:35', '2024-12-10 10:50:35', b'1', NULL, NULL),
(7, 'Ấm giữ nhiệt Đỏ', 'assets/img/product/1733802867_vn-11134201-23030-8bpepugv6fov86.jpg', 'Ấm giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 1, '2024-12-10 10:54:27', '2024-12-10 10:54:27', b'1', NULL, NULL),
(8, 'Ấm giữ nhiệt xanh lá', 'assets/img/product/1733802919_vn-11134201-23030-1i9tqqmp6fova2.jpg', 'Ấm giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 1, '2024-12-10 10:55:19', '2024-12-10 10:55:19', b'1', NULL, NULL),
(9, 'Cốc giữ nhiệt hồng đào', 'assets/img/product/1733802960_vn-11134207-7r98o-lsi4ch2vcvd0a5@resize_w450_nl.jpg', 'Cốc giữ nhiệt Tyeso Wonder 600ml bình giữ nhiệt có ống hút inox 304 Fan House khắc tên, tặng Sticker, cọ rửa, túi đựng', b'1', 2, '2024-12-10 10:56:00', '2024-12-10 10:56:00', b'1', NULL, NULL);

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
-- Cấu trúc bảng cho bảng `sp_bien_the`
--

CREATE TABLE `sp_bien_the` (
  `spbt_id` int NOT NULL,
  `sp_id` int NOT NULL,
  `size_id` int NOT NULL,
  `gia_sp` decimal(18,0) NOT NULL,
  `km_sp` decimal(18,0) NOT NULL,
  `so_luong` int NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `an_hien` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sp_bien_the`
--

INSERT INTO `sp_bien_the` (`spbt_id`, `sp_id`, `size_id`, `gia_sp`, `km_sp`, `so_luong`, `ngay_tao`, `ngay_update`, `an_hien`) VALUES
(1, 1, 1, 550000, 499000, 3213, '2024-12-10 10:20:42', '2024-12-10 10:20:42', b'1'),
(2, 1, 2, 580000, 500000, 3212, '2024-12-10 10:21:07', '2024-12-10 10:21:07', b'1'),
(3, 1, 3, 600000, 550000, 23144, '2024-12-10 10:21:23', '2024-12-10 10:21:23', b'1'),
(4, 2, 1, 345000, 320000, 5422, '2024-12-10 10:22:50', '2024-12-10 10:22:50', b'1'),
(5, 2, 2, 345000, 330000, 3255, '2024-12-10 10:23:13', '2024-12-10 10:23:13', b'1'),
(6, 2, 3, 500000, 400000, 36363, '2024-12-10 10:23:38', '2024-12-10 10:23:38', b'1'),
(7, 3, 1, 400000, 349000, 23132, '2024-12-10 10:45:29', '2024-12-10 10:45:29', b'1'),
(8, 3, 2, 450000, 400000, 2125, '2024-12-10 10:45:53', '2024-12-10 10:45:53', b'1'),
(9, 3, 3, 500000, 450000, 6523, '2024-12-10 10:46:06', '2024-12-10 10:46:06', b'1'),
(10, 4, 1, 300000, 250000, 56858, '2024-12-10 10:47:41', '2024-12-10 10:47:41', b'1'),
(11, 4, 2, 400000, 500000, 23663, '2024-12-10 10:48:01', '2024-12-10 10:48:01', b'1'),
(12, 4, 3, 223333, 12324, 21523, '2024-12-10 10:48:24', '2024-12-10 10:48:24', b'1'),
(13, 5, 1, 800000, 600000, 56583, '2024-12-10 10:49:07', '2024-12-10 10:49:07', b'1'),
(14, 5, 2, 900000, 700000, 32325, '2024-12-10 10:49:40', '2024-12-10 10:49:40', b'1'),
(15, 5, 3, 850000, 800000, 12323, '2024-12-10 10:49:58', '2024-12-10 10:49:58', b'1'),
(16, 6, 1, 700000, 600000, 33453, '2024-12-10 10:50:35', '2024-12-10 10:50:35', b'1'),
(17, 7, 2, 800000, 680000, 6866, '2024-12-10 10:54:27', '2024-12-10 10:54:27', b'1'),
(18, 8, 3, 900000, 800000, 5689, '2024-12-10 10:55:19', '2024-12-10 10:55:19', b'1'),
(19, 9, 3, 1000000, 999999, 999996, '2024-12-10 10:56:00', '2024-12-10 10:56:00', b'1');

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
  `an_hien` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tk_id`, `ho_ten`, `dia_chi`, `email`, `sdt`, `mat_khau`, `role`, `ngay_tao`, `ngay_update`, `an_hien`) VALUES
(1, 'Nguyễn Gia Bảo', 'Phương Canh', 'giabao16032005@gmail.com', '0833236944', 'tolabaoday', b'0', '2024-11-12 13:18:15', '2024-11-12 13:18:15', b'0'),
(4, 'nguyễn văn b', 'abc123', 'nguyenvanb@gmail.com', '123123', '123123', b'1', '2024-11-20 11:30:56', '2024-11-12 11:30:56', b'1'),
(5, 'nguyễn văn c', 'abc123', 'nguyenvanc@gmail.com', '123111', '123123', b'1', '2024-11-20 11:27:04', '2024-11-20 11:27:04', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_size`
--

CREATE TABLE `tb_size` (
  `size_id` int NOT NULL,
  `size_value` varchar(10) NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `an_hien` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_size`
--

INSERT INTO `tb_size` (`size_id`, `size_value`, `ngay_tao`, `ngay_update`, `an_hien`) VALUES
(1, 'M', '2024-11-23 14:11:34', '2024-11-23 14:11:34', b'1'),
(2, 'L', '2024-11-23 14:12:02', '2024-11-23 14:12:02', b'1'),
(3, 'XL', '2024-11-23 14:12:07', '2024-11-23 14:12:07', b'1');

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
  ADD KEY `binh_luan_fk4` (`spbt_id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ctdh_id`),
  ADD UNIQUE KEY `ctdh_id` (`ctdh_id`),
  ADD KEY `chi_tiet_don_hang_fk1` (`order_id`),
  ADD KEY `chi_tiet_don_hang_fk2` (`spbt_id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`dg_id`),
  ADD UNIQUE KEY `dg_id` (`dg_id`),
  ADD KEY `danh_gia_fk2` (`spbt_id`),
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
  ADD KEY `gio_hang_fk1` (`spbt_id`),
  ADD KEY `gio_hang_fk2` (`tk_id`),
  ADD KEY `gio_hang_fk3` (`size_id`);

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
-- Chỉ mục cho bảng `sp_bien_the`
--
ALTER TABLE `sp_bien_the`
  ADD PRIMARY KEY (`spbt_id`),
  ADD UNIQUE KEY `spbt_id` (`spbt_id`),
  ADD KEY `sp_bien_the_fk1` (`sp_id`),
  ADD KEY `size_id_fk2` (`size_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tk_id`),
  ADD UNIQUE KEY `tk_id` (`tk_id`);

--
-- Chỉ mục cho bảng `tb_size`
--
ALTER TABLE `tb_size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `bl_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ctdh_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `dg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `dm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `list_img`
--
ALTER TABLE `list_img`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sp_bien_the`
--
ALTER TABLE `sp_bien_the`
  MODIFY `spbt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `tk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tb_size`
--
ALTER TABLE `tb_size`
  MODIFY `size_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_fk1` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`),
  ADD CONSTRAINT `binh_luan_fk4` FOREIGN KEY (`spbt_id`) REFERENCES `sp_bien_the` (`spbt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_fk1` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`),
  ADD CONSTRAINT `chi_tiet_don_hang_fk2` FOREIGN KEY (`spbt_id`) REFERENCES `sp_bien_the` (`spbt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_fk2` FOREIGN KEY (`spbt_id`) REFERENCES `sp_bien_the` (`spbt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gia_fk3` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gia_fkod` FOREIGN KEY (`order_id`) REFERENCES `don_hang` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gia_fksp` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_fk1` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_fk1` FOREIGN KEY (`spbt_id`) REFERENCES `sp_bien_the` (`spbt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `gio_hang_fk2` FOREIGN KEY (`tk_id`) REFERENCES `taikhoan` (`tk_id`),
  ADD CONSTRAINT `gio_hang_fk3` FOREIGN KEY (`size_id`) REFERENCES `tb_size` (`size_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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

--
-- Các ràng buộc cho bảng `sp_bien_the`
--
ALTER TABLE `sp_bien_the`
  ADD CONSTRAINT `size_id_fk2` FOREIGN KEY (`size_id`) REFERENCES `tb_size` (`size_id`),
  ADD CONSTRAINT `sp_bien_the_fk1` FOREIGN KEY (`sp_id`) REFERENCES `san_pham` (`sp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
