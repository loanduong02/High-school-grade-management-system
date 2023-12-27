-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2022 lúc 09:06 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydiem1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day`
--

CREATE TABLE `day` (
  `MaDayHoc` varchar(10) NOT NULL,
  `MaMonHoc` varchar(10) NOT NULL,
  `Magv` int(11) NOT NULL,
  `MaLopHoc` varchar(10) NOT NULL,
  `MaHocKy` varchar(10) NOT NULL,
  `MoTa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `day`
--

INSERT INTO `day` (`MaDayHoc`, `MaMonHoc`, `Magv`, `MaLopHoc`, `MaHocKy`, `MoTa`) VALUES
('01', 'NV', 1002, '1001', '20121', ''),
('02', 'VL', 1001, '1001', '20121', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `MaDiem` int(11) NOT NULL,
  `MaHocKy` varchar(10) NOT NULL,
  `NamHoc` char(10) NOT NULL,
  `MaMonHoc` varchar(10) NOT NULL,
  `MaHS` int(10) NOT NULL,
  `MaLopHoc` varchar(10) NOT NULL,
  `DiemMieng` varchar(4) NOT NULL,
  `Diem15Phut1` varchar(4) NOT NULL,
  `Diem15Phut2` varchar(4) NOT NULL,
  `Diem1Tiet1` varchar(4) NOT NULL,
  `Diem1Tiet2` varchar(4) NOT NULL,
  `DiemThi` varchar(4) NOT NULL,
  `DiemTB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`MaDiem`, `MaHocKy`, `NamHoc`, `MaMonHoc`, `MaHS`, `MaLopHoc`, `DiemMieng`, `Diem15Phut1`, `Diem15Phut2`, `Diem1Tiet1`, `Diem1Tiet2`, `DiemThi`, `DiemTB`) VALUES
(1, '20121', '2021-2022', 'NV', 100101, '1001', '8', '7', '7.8', '8', '9', '8.7', 0),
(2, '20121', '2021-2022', 'VL', 100101, '1001', '9', '8', '8.6', '8.9', '9', '9.5', 0),
(3, '20121', '2021-2022', 'NV', 100102, '1001', '8', '7', '7.8', '8.9', '9', '9.6', 0),
(4, '20121', '2021-2022', 'NV', 100103, '1001', '9', '7', '7.8', '8.7', '8.9', '8.6', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `Magv` int(5) NOT NULL,
  `Tengv` varchar(50) NOT NULL,
  `GioiTinh` varchar(5) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` int(11) NOT NULL,
  `passwordgv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`Magv`, `Tengv`, `GioiTinh`, `DiaChi`, `SDT`, `passwordgv`) VALUES
(1001, 'NGUYEN VAN HUNG', 'Nam', 'TRA VINH     ', 9248374, '123456'),
(1002, 'LE MY HANH', 'NU', 'AN GIANG', 987374621, '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `MaHocKy` varchar(10) NOT NULL,
  `TenHocKy` varchar(50) NOT NULL,
  `NamHoc` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`MaHocKy`, `TenHocKy`, `NamHoc`) VALUES
('20121', '1', '2021-2022'),
('20221', '2', '2021-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `MaHS` int(6) NOT NULL,
  `MaLopHoc` varchar(10) NOT NULL,
  `TenHS` varchar(50) NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `NgaySinh` date NOT NULL,
  `noisinh` varchar(50) NOT NULL,
  `dantoc` varchar(50) NOT NULL,
  `hotencha` varchar(50) NOT NULL,
  `hotenme` varchar(50) NOT NULL,
  `passwordhs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`MaHS`, `MaLopHoc`, `TenHS`, `GioiTinh`, `NgaySinh`, `noisinh`, `dantoc`, `hotencha`, `hotenme`, `passwordhs`) VALUES
(100101, '1001', 'DUONG ANH LOAN', 'Nữ', '2001-02-06', 'AN GIANG', 'KINH ', 'DUONG HOANG TUAN', 'TRUONG THI NGA', '123456'),
(100102, '1001', 'LE TRUNG HIEU', 'Nam', '2001-02-14', 'AN GIANG', 'KINH', 'LE QUOC BAO', 'NGUYEN NHU MAI', '123456'),
(100103, '1001', 'LE VAN HAU', 'Nam', '2001-02-14', 'AN GIANG', 'KINH', 'LE THANH TAM', 'DO MY HA', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLopHoc` varchar(10) NOT NULL,
  `Tenlophoc` varchar(50) NOT NULL,
  `KhoiHoc` varchar(10) NOT NULL,
  `NamHoc` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLopHoc`, `Tenlophoc`, `KhoiHoc`, `NamHoc`) VALUES
('1001', '10A1', '10', '2021-2022'),
('1102', '11A2', '11', '2021-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(10) NOT NULL,
  `TenMonHoc` varchar(50) DEFAULT NULL,
  `SoTiet` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `SoTiet`) VALUES
('NV', 'NGU VAN', 60),
('VL', 'VAT LY', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `NamHoc` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`NamHoc`) VALUES
('2013-2014\r'),
('2021-2022'),
('2022-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tennguoidung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userid`, `username`, `tennguoidung`, `password`) VALUES
(9, 'duonganhloan0227', 'Loan', '123456'),
(15, 'loan', 'loanduong', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`MaDayHoc`),
  ADD KEY `day_ibfk_1` (`Magv`),
  ADD KEY `day_ibfk_2` (`MaHocKy`),
  ADD KEY `day_ibfk_3` (`MaLopHoc`),
  ADD KEY `day_ibfk_4` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaDiem`),
  ADD KEY `MaHocKy` (`MaHocKy`),
  ADD KEY `MaLopHoc` (`MaLopHoc`),
  ADD KEY `MaHS` (`MaHS`),
  ADD KEY `MaMonHoc` (`MaMonHoc`),
  ADD KEY `NamHoc` (`NamHoc`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`Magv`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHocKy`),
  ADD KEY `fk_NamHocHK` (`NamHoc`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MaHS`),
  ADD KEY `MaLopHoc` (`MaLopHoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`),
  ADD KEY `fk_lopnamhoc` (`NamHoc`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`NamHoc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `MaDiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `Magv` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `day_ibfk_1` FOREIGN KEY (`Magv`) REFERENCES `giaovien` (`Magv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_ibfk_2` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_ibfk_3` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_ibfk_4` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`mamonhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaHocKy`) REFERENCES `hocky` (`MaHocKy`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`),
  ADD CONSTRAINT `diem_ibfk_3` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  ADD CONSTRAINT `diem_ibfk_4` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`mamonhoc`),
  ADD CONSTRAINT `diem_ibfk_5` FOREIGN KEY (`NamHoc`) REFERENCES `namhoc` (`NamHoc`);

--
-- Các ràng buộc cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD CONSTRAINT `fk_NamHocHK` FOREIGN KEY (`NamHoc`) REFERENCES `namhoc` (`NamHoc`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`MaLopHoc`) REFERENCES `lophoc` (`MaLopHoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `fk_lopnamhoc` FOREIGN KEY (`NamHoc`) REFERENCES `namhoc` (`NamHoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
