-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2020 lúc 12:00 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_ad` int(11) NOT NULL,
  `ho_ten_ad` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `dia_chi_ad` text CHARACTER SET utf8mb4 NOT NULL,
  `sdt_ad` varchar(50) NOT NULL,
  `anh_ad` varchar(300) NOT NULL DEFAULT 'iconad.jpg',
  `tai_khoan_ad` varchar(200) NOT NULL,
  `mat_khau_ad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_ad`, `ho_ten_ad`, `dia_chi_ad`, `sdt_ad`, `anh_ad`, `tai_khoan_ad`, `mat_khau_ad`) VALUES
(998, 'admin', 'Số 55 Abc - Hà Nội', '0988888868', '', 'abc', '111'),
(1000, 'sangngu', 'phan dinh giot - ha noi', '0988866688', 'iconad.jpg', 'sang', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hd` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `ngay_dh` date NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `tinh_trang_hd` int(11) NOT NULL COMMENT '0: Vua dat, 1: Dang giao hang 2:Da giao hang 3:Da huy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong_mua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_kh` int(11) NOT NULL,
  `ten_kh` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `dia_chi_kh` text CHARACTER SET utf8mb4 NOT NULL,
  `sdt_kh` varchar(50) NOT NULL,
  `anh_kh` varchar(300) NOT NULL DEFAULT 'iconkh.jpg',
  `tai_khoan_kh` varchar(200) NOT NULL,
  `mat_khau_kh` varchar(200) NOT NULL,
  `tinh_trang_kh` tinyint(1) NOT NULL COMMENT '0: Binh thuong  1: Block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id_kh`, `ten_kh`, `dia_chi_kh`, `sdt_kh`, `anh_kh`, `tai_khoan_kh`, `mat_khau_kh`, `tinh_trang_kh`) VALUES
(1046, 'Nguyễn Văn A', 'abc -def', '0123456789', '', 'user', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id_loai_san_pham` int(11) NOT NULL,
  `ten_loai_san_pham` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id_loai_san_pham`, `ten_loai_san_pham`) VALUES
(7, 'Thiết bị gia đình'),
(8, 'Đồ nhà bếp'),
(12, 'Nha ve sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `id_nha_san_xuat` int(11) NOT NULL,
  `ten_nha_san_xuat` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`id_nha_san_xuat`, `ten_nha_san_xuat`) VALUES
(5, 'Germany'),
(6, 'England');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `mo_ta_sp` text CHARACTER SET utf8mb4 NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `hinh_anh` text NOT NULL,
  `so_luong_sp` int(11) UNSIGNED NOT NULL,
  `id_nha_san_xuat` int(11) NOT NULL,
  `id_loai_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id_sp`, `ten_sp`, `mo_ta_sp`, `gia_sp`, `hinh_anh`, `so_luong_sp`, `id_nha_san_xuat`, `id_loai_san_pham`) VALUES
(603, 'Âu trộn Inox', 'Tính năng sản phẩm:\r\nSet âu inox này có đường kính lần lượt 22, 24cm.\r\nThích hợp dùng để trộn Salat, trộn nộm, trộn bột làm bánh hoặc để rau củ quả...\r\nChất liệu thép không rỉ Cromargan 18/10 sáng bóng đẹp mắt với logo WMF thể hiện rõ đẳng cấp gian bếp nhà bạn.', 2000, 'AuInox.jpg', 4, 5, 8),
(604, 'Bếp từ', 'Kích thước mỏng và nhỏ nên phù hợp với những căn bếp nhỏ, để trên bàn ăn lẩu hoặc mang theo đi Picnic rất tiện\r\nKích thước: 30x5x38cm\r\n\r\nCó 6 chức năng có thể chọn trực tiếp: chế độ giữ ấm, chế độ làm ấm sữa, chế độ hầm, chế độ hấp, chế độ rán đồ nhanh, chố độ đun sôi nước nhanh Booster\r\nSử dụng hiệu quả hơn bếp hồng ngoại hoặc bếp điện, kết quả nấu tốt như bếp gas nhưng an toàn hơn bếp bếp Gas\r\nCó 8 mức công suất tùy chọn và cài đặt khi đun nấu\r\nCó chế độ hẹn giờ trên màn hình kĩ thuật số\r\nCó chế độ nhận diện nồi và chảo dùng cho bếp từ. Khi không có nồi và chảo phù hơn hoặc ko có nồi chảo trên bếp thì bếp sẽ tự động tắt.\r\nCó thể sử dụng cho nồi và chảo có đường kính đáy tối đa là 28cm\r\nCông suất: 2.205W\r\nTrọng lượng bếp bao gồm cả bao bì: 3,5kg', 5000, 'BepTu.jpg', 6, 5, 8),
(607, 'Sản phẩm 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3000, 'SanPham3.jpg', 3, 5, 7),
(609, 'Sản phẩm 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3000, 'SanPham4.jpg', 4, 5, 12);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`id_hd`,`id_sp`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id_loai_san_pham`);

--
-- Chỉ mục cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`id_nha_san_xuat`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_loai_san_pham` (`id_loai_san_pham`),
  ADD KEY `id_nha_san_xuat` (`id_nha_san_xuat`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1047;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id_loai_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  MODIFY `id_nha_san_xuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=610;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`);

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hoa_don` (`id_hd`),
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id_sp`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `loai_san_pham` (`id_loai_san_pham`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_nha_san_xuat`) REFERENCES `nha_san_xuat` (`id_nha_san_xuat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
