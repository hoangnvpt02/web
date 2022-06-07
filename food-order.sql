-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2022 lúc 02:10 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food-order`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `quyen` tinyint(5) NOT NULL DEFAULT 1,
  `trangthai` tinyint(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `quyen`, `trangthai`) VALUES
(27, 'Vũ Thùy Linh', 'linhthuyvu1606', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(28, 'Trần Long Vũ', 'longvu0709', 'b6a262ca904b6d3b991882edac826b90', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(12, 'Pizza', 'Food-category_683.jpg', 'Yes', 'Yes'),
(13, 'Humberger', 'Food-category_433.jpg', 'Yes', 'Yes'),
(14, 'Mo Mo', 'Food-category_203.jpg', 'Yes', 'Yes'),
(15, 'SandWich', 'Food-category_168.webp', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(24, 'Pizza', 'Ngon lắm', '300.00', 'Food-Name-9392.jpg', 12, 'Yes', 'Yes'),
(25, 'Pizza Pháp ', 'Ngon Nhức Nách', '300.00', 'Food-Name-3012.jpg', 12, 'Yes', 'Yes'),
(26, 'Pizza Ý', 'Thơm - Hương Vị Ý', '500.00', 'Food-Name-7359.jpg', 12, 'Yes', 'Yes'),
(27, 'Pizza Ông Tây', 'Ngọt Thơm Mùi Bơ', '100.00', 'Food-Name-1484.webp', 12, 'Yes', 'Yes'),
(28, 'Sandwich Kẹp Chả Tôm', 'Béo - Ngậy - Thơm', '250.00', 'Food-Name-5502.webp', 15, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Humberger', '2000.00', 1, '2000.00', '2022-05-23 06:41:06', 'Ordered', 'Vũ Trần Long', '0982179102', 'exhateme0000@gmail.com', 'Cấp Tiến - Tiên Lãng'),
(2, 'Bánh Ngọt', '5000.00', 1, '5000.00', '2022-05-23 06:44:51', 'Deliveried', 'Vũ Trường Sơn', '0982179102', 'Linhthuyvu16062004@gmail.com', 'Kiến Thiết - Tiên Lãng'),
(3, 'Bánh Ngọt', '5000.00', 5, '25000.00', '2022-05-23 06:46:31', 'Deliveried', 'Vũ Thùy Linh', '0356793755', 'linhxuka.tv@gmail.com', 'Tiên Minh - Tiên Lãng'),
(4, 'Pizza', '300.00', 2, '600.00', '2022-05-23 07:10:00', 'Cancelled', 'Lương Thanh Long', '0123456789', 'longpheu@gmail.com', 'Đoàn Lập - Tiên Lãng'),
(5, 'Pizza Pháp ', '300.00', 5, '1500.00', '2022-05-24 11:51:47', 'Ordered', 'Vũ Trường Sơn', '037564987', 'vutlth2103017@fpt.edu.vn', 'Cấp Tiến - Tiên Lãng'),
(6, 'Pizza', '300.00', 1, '300.00', '2022-05-30 03:08:17', 'Ordered', 'Vũ Trường Sơn', '1236547890', 'Linhthuyvu16062004@gmail.com', 'Caasp tien hai phong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
