-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 08, 2020 lúc 12:01 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `facebook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang_baomat`
--

CREATE TABLE `chucnang_baomat` (
  `ID` int(11) NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `loaibaomat` text COLLATE utf8_unicode_ci NOT NULL,
  `thangbaomat` int(11) NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_chucnang` int(11) NOT NULL,
  `thoigian` text COLLATE utf8_unicode_ci NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang_baomat`
--

INSERT INTO `chucnang_baomat` (`ID`, `link`, `loaibaomat`, `thangbaomat`, `SDT`, `ghichu`, `ID_chucnang`, `thoigian`, `ID_user`, `trangthai`) VALUES
(2, 'https://vuihoc.club/home', 'Bảo mật theo tháng, chống rip hoàn toàn, chống toàn bộ các lỗi, bảo mật 24/7', 3, '2365988552', '', 12, '2020-07-08 15:04:25', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang_doiten`
--

CREATE TABLE `chucnang_doiten` (
  `ID` int(11) NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tendoi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_chucnang` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `thoigian` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang_doiten`
--

INSERT INTO `chucnang_doiten` (`ID`, `link`, `tendoi`, `SDT`, `ghichu`, `ID_chucnang`, `ID_user`, `thoigian`, `trangthai`) VALUES
(5, 'https://vuihoc.club/home', 'ABC ABC', '2365988552', 'test1', 11, 1, '2020-07-08 14:58:50', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang_muaban`
--

CREATE TABLE `chucnang_muaban` (
  `ID` int(11) NOT NULL,
  `loainick` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SL` int(11) NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_chucnang` int(11) NOT NULL,
  `thoigian` text COLLATE utf8_unicode_ci NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang_muaban`
--

INSERT INTO `chucnang_muaban` (`ID`, `loainick`, `SL`, `SDT`, `ghichu`, `ID_chucnang`, `thoigian`, `ID_user`, `trangthai`) VALUES
(11, 'Nick Facebook', 117, '1236598554', 'test1', 9, '2020-07-08 14:54:02', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang_rip`
--

CREATE TABLE `chucnang_rip` (
  `ID` int(11) NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `loairip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `loaithoigian` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_chucnang` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `thoigian` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang_rip`
--

INSERT INTO `chucnang_rip` (`ID`, `link`, `loairip`, `loaithoigian`, `SDT`, `ghichu`, `ID_chucnang`, `ID_user`, `thoigian`, `trangthai`) VALUES
(5, 'https://vuihoc.club/home', 'Rip nick facebook', '48h', '2365988552', '', 10, 1, '2020-07-08 14:55:19', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `ID_chucnang` int(11) NOT NULL,
  `thoigianorder` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_user` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `thoigianhoanthanh` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID`, `ID_chucnang`, `thoigianorder`, `noidung`, `tongtien`, `ghichu`, `ID_user`, `trangthai`, `thoigianhoanthanh`) VALUES
(1, 19, '2020-07-08 16:35:57', 'Link: https://vuihoc.club/home<br/> Cảm xúc:love<br/> Số lượng:100', '4000', 'test2', 1, 1, NULL),
(2, 20, '2020-07-08 16:45:38', 'Link: https://vuihoc.club/home<br/> Số lượng:101<br/> Đơngiá:40', '4040', '', 1, 1, NULL),
(3, 21, '2020-07-08 16:46:56', 'Link: https://vuihoc.club/home<br/> Số lượng:102<br/> Đơngiá:42', '4284', '', 1, 1, NULL),
(4, 22, '2020-07-08 16:50:13', 'Link: https://vuihoc.club/home<br/> Số lượng: <br/> Đơngiá: 500<br/> Nội dung cmt: abc\r\nnana\r\n\r\nok', '0', '', 1, 1, NULL),
(5, 23, '2020-07-08 16:51:38', 'Link: https://vuihoc.club/home<br/> Số lượng: 100<br/> Đơn giá: 1000', '100000', 'test2', 1, 1, NULL),
(6, 1, '2020-07-08 16:52:30', 'Link: https://vuihoc.club/home<br/> Số lượng: 100<br/> Đơn giá: 70', '7000', '', 1, 1, NULL),
(7, 2, '2020-07-08 16:53:11', 'Link: https://vuihoc.club/home<br/> Số lượng: 100<br/> Đơn giá: 150', '15000', '', 1, 1, NULL),
(8, 3, '2020-07-08 16:54:28', 'Link: https://vuihoc.club/home<br/> Số lượng: <br/> Đơngiá: 1000<br/> Nội dung cmt: abc\r\nok\r\nđẹp', '0', 'test1', 1, 1, NULL),
(9, 5, '2020-07-08 16:56:45', 'Link: https://vuihoc.club/home<br/> Minlike: 40<br/> Maxlike: 50<br/> Số lượng bài: 1<br/> Số lượng ngày: 1<br/> Đơn giá: 30', '1500', '', 1, 1, NULL),
(10, 6, '2020-07-08 16:58:08', 'Link: https://vuihoc.club/home<br/> Minlike: 41<br/> Maxlike: 51<br/> Số lượng bài: 2<br/> Đơn giá: 30', '3060', '', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nap_tien`
--

CREATE TABLE `nap_tien` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `sotien` text COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `ID_type` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`ID_type`, `type_name`) VALUES
(1, 'Facebook Buff'),
(2, 'Facebook VIP'),
(3, 'Instagram Buff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_chucnang`
--

CREATE TABLE `type_chucnang` (
  `ID_chucnang` int(11) NOT NULL,
  `chucnang_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ID_type` int(11) NOT NULL,
  `chucnang_ghichu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_chucnang`
--

INSERT INTO `type_chucnang` (`ID_chucnang`, `chucnang_name`, `ID_type`, `chucnang_ghichu`, `href`) VALUES
(1, 'Buff Like Instagram', 3, 'Buff Like Instagram', 'insta-like'),
(2, 'Buff Follow Instagram', 3, 'Buff Follow Instagram', 'insta-follow'),
(3, 'Buff Comment Instagram', 3, 'Buff Comment Instagram', 'insta-comment'),
(4, 'VIP Like Clone Giá Rẻ', 2, 'VIP Like Clone Giá Rẻ', 'vip-like-clone'),
(5, 'VIP Like Bài Viết Tháng', 2, 'VIP Like Bài Viết Tháng', 'vip-like-month'),
(6, 'VIP Like Bài Viết Theo Số Lượng', 2, 'VIP Like Bài Viết Theo Số Lượng', 'vip-like-mount'),
(7, 'VIP Cảm Xúc Bài Viết Tháng', 2, 'VIP Like Cảm Xúc', 'vip-reaction-month'),
(8, 'VIP Bình Luận Bài Viết Tháng', 2, 'VIP Comment', 'vip-comment-month'),
(9, 'Mua Bán Fanpage, Nick Facebook', 1, 'Hệ Thống Mua Bán Fanpage, Nick Facebook', 'fb-buy-sell'),
(10, 'Rip Nick, Bài Đăng, Page, Group', 1, 'Hệ Thống Rip Xoá Bài Viết + Khoá Link Tên Miền Website', 'fb-rip-nick'),
(11, 'Đổi Tên Profile Và Page Quá 60 Ngày', 1, 'Hệ Thống Đổi Tên Profile Và Fanpage', 'fb-rename'),
(12, 'Bảo Mật Và Bảo Kê Facebook', 1, 'Hệ Thống Bảo Mật Và Bảo Kê Facebook', 'fb-security'),
(19, 'Buff Like Post', 1, 'Buff Like Post', 'fb-like-post'),
(20, 'Buff Sub', 1, 'Buff Follow (Tăng Theo Dõi)', 'fb-follow'),
(21, 'Buff Like Fanpage', 1, 'Buff Like Fanpage Order', 'fb-fan-page'),
(22, 'Buff Comment Post', 1, '', 'fb-cmt-post'),
(23, 'Buff Share Post', 1, '', 'fb-share-post');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `user_money` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_hoten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_sdt` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_fbid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID_user`, `user_name`, `password`, `user_money`, `user_email`, `user_hoten`, `user_sdt`, `user_fbid`, `level`) VALUES
(1, 'ngocanh2822', '1234567', '10000', 'ngocanh2822@gmail.com', 'Ngọc Anh', '0329266200', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucnang_baomat`
--
ALTER TABLE `chucnang_baomat`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chucnang_doiten`
--
ALTER TABLE `chucnang_doiten`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chucnang_muaban`
--
ALTER TABLE `chucnang_muaban`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chucnang_rip`
--
ALTER TABLE `chucnang_rip`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `nap_tien`
--
ALTER TABLE `nap_tien`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID_type`);

--
-- Chỉ mục cho bảng `type_chucnang`
--
ALTER TABLE `type_chucnang`
  ADD PRIMARY KEY (`ID_chucnang`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucnang_baomat`
--
ALTER TABLE `chucnang_baomat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chucnang_doiten`
--
ALTER TABLE `chucnang_doiten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chucnang_muaban`
--
ALTER TABLE `chucnang_muaban`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chucnang_rip`
--
ALTER TABLE `chucnang_rip`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nap_tien`
--
ALTER TABLE `nap_tien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `ID_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `type_chucnang`
--
ALTER TABLE `type_chucnang`
  MODIFY `ID_chucnang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
