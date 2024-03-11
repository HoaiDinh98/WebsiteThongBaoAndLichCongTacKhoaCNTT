-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2023 lúc 03:59 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thongbao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `IDBoMon` int(11) NOT NULL,
  `TenBoMon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`IDBoMon`, `TenBoMon`) VALUES
(1, 'Hệ thống thông tin'),
(2, 'Kỹ thuật phần mềm'),
(3, 'Khoa học dữ liệu & Trí tuệ nhân tạo'),
(4, 'Mạng máy tính và An toàn thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdanhsachgvnhan`
--

CREATE TABLE `chitietdanhsachgvnhan` (
  `IDNhomGV` int(11) NOT NULL,
  `IDNguoiDung` int(11) NOT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdanhsachgvnhan`
--

INSERT INTO `chitietdanhsachgvnhan` (`IDNhomGV`, `IDNguoiDung`, `TrangThai`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(2, 1, NULL),
(2, 3, NULL),
(4, 2, NULL),
(4, 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `IDChucVu` int(11) NOT NULL,
  `TenChucVu` varchar(256) NOT NULL,
  `GhiChu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`IDChucVu`, `TenChucVu`, `GhiChu`) VALUES
(1, 'Trưởng Khoa', 'Quản lý và lãnh đạo toàn bộ khoa'),
(2, 'Phó trưởng khoa', 'Hỗ trợ Trưởng Khoa trong việc quản lý và điều hành các hoạt động của khoa.'),
(3, 'Trưởng bộ môn', 'Nghiên cứu và xuất bản công trình nghiên cứu.'),
(4, 'Giảng viên', 'Giảng dạy các môn học.'),
(5, 'Admin', ''),
(6, 'Giáo vụ', 'Hướng dẫn sinh viên và tham gia vào các hoạt động hướng nghiệp.'),
(7, 'Trợ giảng', 'Thực hiện công việc giảng dạy và nghiên cứu nhưng có thể có mức độ trách nhiệm'),
(9, ' Tổ trưởng công đoàn', 'Không'),
(10, 'Tổ phó công đoàn', 'Không'),
(11, 'Bí thư liên chi đoàn', 'Không'),
(12, 'Phụ trách bộ môn', 'Không'),
(13, 'Trưởng bộ môn phụ trách', 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chutri`
--

CREATE TABLE `chutri` (
  `IDChuTri` int(11) NOT NULL,
  `TenNguoiChuTri` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chutri`
--

INSERT INTO `chutri` (`IDChuTri`, `TenNguoiChuTri`, `GhiChu`) VALUES
(1, 'Nguyễn Thị Anh Thư', ''),
(2, 'Nguyễn Xuân Hoàn', ''),
(3, 'Phan Xuân Cường', 'Trưởng phòng'),
(4, 'Lê Hoài Dinh', 'sinh viên'),
(7, 'Trần Như Ý', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congdoan`
--

CREATE TABLE `congdoan` (
  `IDCongDoan` int(11) NOT NULL,
  `TenCongDoan` varchar(250) NOT NULL,
  `GhiChu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congdoan`
--

INSERT INTO `congdoan` (`IDCongDoan`, `TenCongDoan`, `GhiChu`) VALUES
(1, 'Đoàn thanh niên cộng sản Hồ Chí Minh', 'Khong'),
(2, 'Mặt trận tổ quốc Việt Nam', 'Khong'),
(4, ' Công đoàn Việt Nam', 'Không'),
(5, 'Hội nông dân Việt Nam', 'Không'),
(6, 'Hội liên hiệp phụ nữ Việt Nam', 'Không'),
(7, 'Hội cựu chiến binh Việt Nam', 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachgvnhan`
--

CREATE TABLE `danhsachgvnhan` (
  `IDNhomGV` int(11) NOT NULL,
  `TenNhom` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachgvnhan`
--

INSERT INTO `danhsachgvnhan` (`IDNhomGV`, `TenNhom`, `GhiChu`) VALUES
(1, 'GV toàn trường', 'Khong'),
(2, 'GV Thuộc biên chế nhà trường', 'Khong'),
(4, 'GV tham dự', 'Khong'),
(6, 'Toàn thể giảng viên', 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsgvdaxemlichcongtac`
--

CREATE TABLE `dsgvdaxemlichcongtac` (
  `IDNguoiDung` int(11) NOT NULL,
  `IDLichCongTac` int(11) NOT NULL,
  `IDTrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dsgvdaxemlichcongtac`
--

INSERT INTO `dsgvdaxemlichcongtac` (`IDNguoiDung`, `IDLichCongTac`, `IDTrangThai`) VALUES
(1, 5, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 18, 1),
(1, 19, 1),
(3, 13, 1),
(3, 18, 1),
(3, 22, 1),
(3, 23, 1),
(1, 8, 2),
(1, 9, 2),
(1, 10, 2),
(1, 11, 2),
(1, 12, 2),
(1, 13, 2),
(1, 20, 2),
(1, 21, 2),
(1, 22, 2),
(1, 23, 2),
(1, 24, 2),
(1, 25, 2),
(1, 26, 2),
(1, 27, 2),
(2, 5, 2),
(2, 8, 2),
(2, 9, 2),
(2, 10, 2),
(2, 11, 2),
(2, 12, 2),
(2, 13, 2),
(2, 14, 2),
(2, 15, 2),
(2, 16, 2),
(2, 17, 2),
(2, 18, 2),
(2, 19, 2),
(2, 20, 2),
(2, 21, 2),
(2, 22, 2),
(2, 23, 2),
(2, 24, 2),
(2, 25, 2),
(2, 26, 2),
(2, 27, 2),
(3, 5, 2),
(3, 8, 2),
(3, 9, 2),
(3, 10, 2),
(3, 11, 2),
(3, 12, 2),
(3, 14, 2),
(3, 15, 2),
(3, 16, 2),
(3, 17, 2),
(3, 19, 2),
(3, 20, 2),
(3, 21, 2),
(3, 24, 2),
(3, 25, 2),
(3, 26, 2),
(3, 27, 2),
(5, 19, 2),
(5, 20, 2),
(5, 21, 2),
(5, 22, 2),
(5, 23, 2),
(5, 24, 2),
(5, 25, 2),
(5, 26, 2),
(5, 27, 2),
(6, 20, 2),
(6, 21, 2),
(6, 22, 2),
(6, 23, 2),
(6, 24, 2),
(6, 25, 2),
(6, 26, 2),
(6, 27, 2),
(7, 20, 2),
(7, 21, 2),
(7, 22, 2),
(7, 23, 2),
(7, 24, 2),
(7, 25, 2),
(7, 26, 2),
(7, 27, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsgvdaxemthongbao`
--

CREATE TABLE `dsgvdaxemthongbao` (
  `IDNguoiDung` int(11) NOT NULL,
  `IDThongBao` int(11) NOT NULL,
  `IDTrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dsgvdaxemthongbao`
--

INSERT INTO `dsgvdaxemthongbao` (`IDNguoiDung`, `IDThongBao`, `IDTrangThai`) VALUES
(1, 2, 1),
(1, 4, 1),
(1, 5, 1),
(1, 17, 1),
(1, 19, 1),
(1, 20, 1),
(1, 21, 1),
(2, 4, 1),
(2, 5, 1),
(3, 2, 1),
(3, 4, 1),
(3, 5, 1),
(3, 15, 1),
(3, 20, 1),
(5, 21, 1),
(1, 15, 2),
(1, 16, 2),
(1, 18, 2),
(1, 22, 2),
(1, 23, 2),
(1, 24, 2),
(1, 25, 2),
(2, 2, 2),
(2, 15, 2),
(2, 16, 2),
(2, 17, 2),
(2, 18, 2),
(2, 19, 2),
(2, 20, 2),
(2, 21, 2),
(2, 22, 2),
(2, 23, 2),
(2, 24, 2),
(2, 25, 2),
(3, 16, 2),
(3, 17, 2),
(3, 18, 2),
(3, 19, 2),
(3, 21, 2),
(3, 22, 2),
(3, 23, 2),
(3, 24, 2),
(3, 25, 2),
(5, 22, 2),
(5, 23, 2),
(5, 24, 2),
(5, 25, 2),
(6, 22, 2),
(6, 23, 2),
(6, 24, 2),
(6, 25, 2),
(7, 22, 2),
(7, 23, 2),
(7, 24, 2),
(7, 25, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichcongtac`
--

CREATE TABLE `lichcongtac` (
  `IDLichCongTac` int(11) NOT NULL,
  `IDNguoiTao` int(11) NOT NULL,
  `IDNhomNguoiNhan` int(11) NOT NULL,
  `IDChuTri` int(11) NOT NULL,
  `NgayTao` date NOT NULL,
  `NgayHetHan` date NOT NULL,
  `GioBatDau` time NOT NULL,
  `GioKetThuc` time NOT NULL,
  `TieuDe` varchar(250) NOT NULL,
  `NoiDung` text NOT NULL,
  `DiaDiem` varchar(250) NOT NULL,
  `GhiChu` text NOT NULL,
  `KetQua` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichcongtac`
--

INSERT INTO `lichcongtac` (`IDLichCongTac`, `IDNguoiTao`, `IDNhomNguoiNhan`, `IDChuTri`, `NgayTao`, `NgayHetHan`, `GioBatDau`, `GioKetThuc`, `TieuDe`, `NoiDung`, `DiaDiem`, `GhiChu`, `KetQua`) VALUES
(5, 2, 1, 3, '2023-11-29', '2023-11-29', '17:00:00', '18:00:00', 'Sinh hoạt Công dân - Sinh viên cuối khóa năm học 2023-2024', 'Thực hiện theo Kế hoạch số 762/KH-DCT ngày 29/8/2023 của Hiệu trưởng Trường Đại học Công Thương Thành phố Hồ Chí Minh về việc tổ chức Tuần sinh hoạt Công dân - Sinh viên năm học 2023-2024', 'Hội trường C', 'Trung tâm Dịch vụ mở cửa và vệ sinh Hội trường C; Phòng Quản trị Thiết bị cử người trực âm thanh, ánh sáng', NULL),
(8, 1, 1, 1, '2023-11-30', '2023-11-30', '17:00:00', '19:00:00', 'Tập luyện chương trình văn nghệ công đoàn Trường tham dự Hội diễn văn nghệ cấp khối năm 2023', 'Tập luyện chương trình văn nghệ công đoàn Trường tham dự Hội diễn văn nghệ cấp khối năm 2023', 'Hội trường C', 'Trung tâm Dịch vụ hỗ trợ mở cửa hội trường, phòng Quản trị Thiết bị hỗ trợ âm thanh, ánh sáng', '0'),
(9, 1, 1, 1, '2023-12-07', '2023-12-08', '08:00:00', '17:00:00', 'Hội nghị trực tuyến nghiên cứu, học tập, quán triệt Nghị quyết Hội nghị lần thứ tám Ban Chấp hành Trung ương Đảng khóa XIII', 'Hội nghị trực tuyến', 'Hội trường C', 'TT.CNTT chuẩn bị phòng họp trực tuyến', '0'),
(10, 1, 1, 1, '2023-12-07', '2023-12-08', '07:00:00', '23:30:00', 'Sinh hoạt Công dân - Sinh viên cuối khóa năm học 2023-2024', 'Thực hiện theo Kế hoạch số 762/KH-DCT ngày 29/8/2023 của Hiệu trưởng Trường Đại học Công Thương Thành phố Hồ Chí Minh về việc tổ chức Tuần sinh hoạt Công dân - Sinh viên năm học 2023-2024', 'Hội trường C', 'Trung tâm Dịch vụ mở cửa và vệ sinh Hội trường C; Phòng Quản trị Thiết bị cử người trực âm thanh, ánh sáng', '0'),
(11, 1, 1, 1, '2023-12-07', '2023-12-07', '01:35:00', '05:35:00', 'Sinh hoạt Công dân - Sinh viên cuối khóa năm học 2023-2024', 'Thực hiện theo Kế hoạch số 762/KH-DCT ngày 29/8/2023 của Hiệu trưởng Trường Đại học Công Thương Thành phố Hồ Chí Minh về việc tổ chức Tuần sinh hoạt Công dân - Sinh viên năm học 2023-2024', 'Hội trường C', 'Trung tâm Dịch vụ mở cửa và vệ sinh Hội trường C; Phòng Quản trị Thiết bị cử người trực âm thanh, ánh sáng', '0'),
(12, 1, 1, 1, '2023-12-09', '2023-12-12', '07:23:00', '03:23:00', 'Vòng chung kết cuộc thi học thuật SV Khoa TC-KT: Thử thách đầu tư lần 2', '', '', 'Trung tâm DV mở cửa; P.QTTB cử người trực âm thanh', '0'),
(13, 1, 1, 1, '2023-12-10', '2023-12-10', '08:23:00', '14:26:00', 'Đoàn chuyên gia làm việc với Đoàn TN, Hội sinh viên trường khảo sát tư vấn xây dựng mô hình HTX sinh viên', '', 'Hội trường C', '', '0'),
(14, 1, 1, 1, '2023-12-10', '2023-12-10', '08:00:00', '11:30:00', 'Sinh hoạt Công dân - Sinh viên cuối khóa năm học 2023-2024', 'Thực hiện theo Kế hoạch số 762/KH-DCT ngày 29/8/2023 của Hiệu trưởng Trường Đại học Công Thương Thành phố Hồ Chí Minh về việc tổ chức Tuần sinh hoạt Công dân - Sinh viên năm học 2023-2024', 'Hội trường C', 'Trung tâm Dịch vụ mở cửa và vệ sinh Hội trường C; Phòng Quản trị Thiết bị cử người trực âm thanh, ánh sáng', '0'),
(15, 1, 1, 1, '2023-12-10', '2023-12-10', '08:35:00', '15:35:00', 'Làm việc và ký kết hợp tác với Công Ty TNHH Truyền Thông Golden A, Công ty TNHH Học viện Công nghệ và Sáng tạo Golden A, Viện Đào Tạo và Phát Triển Doanh Nhân Việt Nam, Công ty TNHH Thương Mại và Dịch Vụ Kỹ Thuật DIỆU PHÚC, Trường Cao đẳng Khoa học v', '', 'Phòng Họp (C.306)', '', '0'),
(16, 1, 1, 1, '2023-12-10', '2023-12-10', '14:00:00', '14:30:00', 'Đoàn chuyên gia làm việc với Công đoàn trường khảo sát tư vấn xây dựng mô hình HTX sinh viên', '', 'Phòng Họp VIP 2 (C.209)', '', '0'),
(17, 1, 1, 1, '2023-12-11', '2023-12-11', '06:29:00', '09:29:00', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', 'Hội trường C', '', '0'),
(18, 1, 1, 1, '2023-12-11', '2023-12-14', '09:49:00', '11:49:00', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', 'Hội trường C', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', '0'),
(19, 1, 6, 3, '2023-12-12', '2023-12-16', '10:26:00', '11:45:00', 'test toàn thể', 'test toàn thể', 'Hội trường C', 'test toàn thể', NULL),
(20, 1, 1, 1, '2023-12-16', '2023-12-24', '08:30:00', '11:30:00', ' Tổ chức Talkshow chủ đề \"Chăm sóc răng miệng cùng chuyên gia\" và trao học bổng \"Tiếp sức sinh viên - Mừng tết an vui\"', ' Tổ chức Talkshow chủ đề \"Chăm sóc răng miệng cùng chuyên gia\" và trao học bổng \"Tiếp sức sinh viên - Mừng tết an vui\"', 'Hội trường C', 'Cao Xuân Thủy, Đồng Thị Mỹ Lệ, Lê Nguyễn Đoan Duy, Lê Thành Tới, Lê Văn Thảo, Ngô Thanh An, Nguyễn Tấn Phong, Nguyễn Thanh Long, Nguyễn Thị Thu Thoa, Nguyễn Tuấn Anh, Nguyễn Văn Dung, Nguyễn Văn Ít, Phạm Hồ Mai Anh, Phạm Huy Hoàng, Phan Xuân Cường, Trần Phước, Trần Tín Nghị, Võ Thị Tuyết Sương - Đại biểu khách mời; Chuyên gia; Sinh viên', '0'),
(21, 1, 2, 7, '2023-12-18', '2023-12-19', '13:30:00', '17:30:00', ' Hội thảo về Xây dựng, phát triển chương trình đào tạo với chủ đề “Thách thức và cơ hội trong đổi mới phát triển chương trình đào tạo”', ' Hội thảo về Xây dựng, phát triển chương trình đào tạo với chủ đề “Thách thức và cơ hội trong đổi mới phát triển chương trình đào tạo”', 'Hội trường C', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', NULL),
(22, 1, 6, 7, '2023-12-17', '2023-12-17', '13:30:00', '16:45:00', '	\r\n Hội thảo về Xây dựng, phát triển chương trình đào tạo với chủ đề “Thách thức và cơ hội trong đổi mới phát triển chương trình đào tạo”', '	\r\n Hội thảo về Xây dựng, phát triển chương trình đào tạo với chủ đề “Thách thức và cơ hội trong đổi mới phát triển chương trình đào tạo”', 'Hội trường C', 'Các đơn vị thực hiện theo Kế hoạch số 1179/KH-DCT ngày 11/12/2023; Phòng Quản trị thiết bị phân công người trực âm thanh, ánh sáng. Trung tâm dịch vụ phân công người trực Hội trường C.', NULL),
(23, 1, 2, 7, '2023-12-17', '2023-12-17', '13:40:00', '16:40:00', ' Tổng duyệt chương trình Lễ phát động hưởng ứng Tháng hành động vì bình đẳng giới, phòng ngừa, ứng phó với bạo lực trên cơ sở giới năm 2023 và hội nghị khen thưởng phong trào thi đua “Giỏi việc nước – Đảm việc nhà” năm 2023', ' Tổng duyệt chương trình Lễ phát động hưởng ứng Tháng hành động vì bình đẳng giới, phòng ngừa, ứng phó với bạo lực trên cơ sở giới năm 2023 và hội nghị khen thưởng phong trào thi đua “Giỏi việc nước – Đảm việc nhà” năm 2023', 'Hội trường C', 'Trung tâm Dịch vụ hỗ trợ mở cửa Hội trường, Phòng QTTB cử người trực âm thanh, ánh sáng', NULL),
(24, 1, 1, 3, '2023-12-17', '2023-12-17', '06:50:00', '11:50:00', 'Tổ chức chương trình HUIT Dancing Party', 'Tổ chức chương trình HUIT Dancing Party', 'Hội trường C', '	\r\nTrung tâm Dịch vụ cử người mở cửa…\r\nPhòng Quản trị thiết bị cử nhân viên trực kỹ thuật.', NULL),
(25, 1, 1, 3, '2023-12-18', '2023-12-18', '07:00:00', '10:00:00', ' Talkshow về giáo dục sức khỏe cộng đồng cho sinh viên', ' Talkshow về giáo dục sức khỏe cộng đồng cho sinh viên', 'Hội trường C', 'Trung tâm Dịch vụ hỗ trợ mở cửa Hội trường C, Phòng QTTB hỗ trợ trực âm thanh, ánh sáng', NULL),
(26, 1, 1, 1, '2023-12-18', '2023-12-18', '13:55:00', '16:55:00', ' Hội thảo góp ý dự thảo Nghị định về tự chủ đại học', ' Hội thảo góp ý dự thảo Nghị định về tự chủ đại học', 'Hội trường C', '59C Nguyễn Đình Chiểu, Q3', '0'),
(27, 1, 1, 3, '2023-12-19', '2023-12-19', '07:00:00', '16:00:00', ' Tổ chức Lễ tốt nghiệp đợt 2 năm 2023', ' Tổ chức Lễ tốt nghiệp đợt 2 năm 2023', 'Hội trường C', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithongbao`
--

CREATE TABLE `loaithongbao` (
  `IDLoaiThongBao` int(11) NOT NULL,
  `TenLoaiThongBao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaithongbao`
--

INSERT INTO `loaithongbao` (`IDLoaiThongBao`, `TenLoaiThongBao`) VALUES
(1, 'Thông báo toàn trường'),
(2, 'Thông báo bộ môn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `IDNguoiDung` int(11) NOT NULL,
  `IDChucVu` int(11) NOT NULL,
  `IDPhongBan` int(11) DEFAULT NULL,
  `IDBoMon` int(11) DEFAULT NULL,
  `IDCongDoan` int(11) DEFAULT NULL,
  `HoTen` varchar(250) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `NgayVaoLam` date DEFAULT NULL,
  `NgayTaoTK` date DEFAULT NULL,
  `GioiTinh` varchar(250) DEFAULT NULL,
  `SDT` text DEFAULT NULL,
  `Email` varchar(250) NOT NULL,
  `MatKhau` varchar(250) NOT NULL,
  `HinhAnh` varchar(250) DEFAULT NULL,
  `DiaChi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`IDNguoiDung`, `IDChucVu`, `IDPhongBan`, `IDBoMon`, `IDCongDoan`, `HoTen`, `NgaySinh`, `NgayVaoLam`, `NgayTaoTK`, `GioiTinh`, `SDT`, `Email`, `MatKhau`, `HinhAnh`, `DiaChi`) VALUES
(1, 1, 1, 1, 2, 'PGS. TS. Đặng Trần Khánh', '1993-01-01', '2023-11-05', '2023-11-05', 'Nam', '0977112312', 'khanh@hufi.edu.vn', '1234', '1702751779.jpg', '<p>Kh&ocirc;ng</p>'),
(2, 2, 1, 4, 2, 'Nguyễn Thanh Long', '1995-06-17', '2023-11-01', '2023-11-01', 'Nam', '0981312331', 'longnt@hufi.edu.vn', '13223', '1702751240.jpeg', '<p>Kh&ocirc;ng</p>'),
(3, 4, 1, 2, 2, 'Nguyễn Thị Bích Ngân', '1981-06-17', '2013-11-25', '2013-11-25', 'Nữ', '0833243346', 'ntbn@gmail.com', '1234', '1702750880.jpg', '<p>Kh&ocirc;ng</p>'),
(4, 5, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', '1234', NULL, NULL),
(5, 7, 1, 2, 2, 'hoài dinh', '2023-12-12', '2023-12-12', '2023-12-12', 'Nam', '0833243346', 'hoaidinh2@gmail.com', '1234', 'dinh.jpg', '<p>long an</p>'),
(6, 7, 1, 2, 6, 'Nguyễn Thị Ngọc Phượng', '2002-02-17', '2023-12-15', '2023-12-15', 'Nữ', '0833243346', 'ngocphuong123@gmail.com', '1234', '1702751191.jpg', '<p>Quảng Ng&atilde;i</p>'),
(7, 1, 1, 2, 7, 'Nguyễn Thành Đạt', '2002-01-29', '2023-12-16', '2023-12-16', 'Nam', '0987654321', 'thuytrang17052901@gmail.com', '123123', '1702751015.jpg', '<p>kkkkkk</p>'),
(8, 9, 1, 3, 6, 'TS. Trần Như Ý', '1988-03-17', '2020-06-17', '2020-07-17', 'Nữ', '0971881589', 'nhuytran@edu.huit', '123123', 'chup-anh-the-lay-ngay.png', '<p>Kh&ocirc;ng</p>'),
(9, 4, 1, 3, 1, 'TS. Ngô Dương Hà', '1990-01-17', '2020-01-15', '2020-01-17', 'Nam', '0987654320', 'duonghango@huit.edu.vn', '123123123', 'R (1).jpeg', '<p>Kh&ocirc;ng</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `IDPhanQuyen` int(11) NOT NULL,
  `IDChucVu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`IDPhanQuyen`, `IDChucVu`) VALUES
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 6),
(2, 9),
(2, 10),
(3, 4),
(3, 7),
(3, 11),
(3, 12),
(3, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `IDPhongBan` int(11) NOT NULL,
  `TenPhongBan` varchar(250) NOT NULL,
  `GhiChu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`IDPhongBan`, `TenPhongBan`, `GhiChu`) VALUES
(1, 'Khoa CNTT', 'Khong'),
(2, 'Khoa CNSH', 'Khong'),
(5, 'Khoa Luật', 'Không'),
(6, 'Khoa CNDD', 'Không'),
(7, 'Khoa CNHH', 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `IDPhanQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`IDPhanQuyen`, `TenQuyen`) VALUES
(1, 'Admin'),
(2, 'Quản lý'),
(3, 'Giảng viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `IDThongBao` int(11) NOT NULL,
  `IDNguoiTao` int(11) NOT NULL,
  `IDNhomNguoiNhan` int(11) NOT NULL,
  `IDLoaiThongBao` int(11) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `NgayHetHan` date NOT NULL,
  `TieuDe` varchar(250) DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `ThanhPhan` varchar(250) DEFAULT NULL,
  `TepDinhKem` varchar(250) NOT NULL,
  `IDTrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`IDThongBao`, `IDNguoiTao`, `IDNhomNguoiNhan`, `IDLoaiThongBao`, `NgayTao`, `NgayHetHan`, `TieuDe`, `NoiDung`, `ThanhPhan`, `TepDinhKem`, `IDTrangThai`) VALUES
(2, 1, 1, 1, '2023-11-05 00:00:00', '2023-11-03', 'Thông báo về việc Tổ chức nghiệm thu đề tài Nhóm nghiên cứu năm học 2019-2020', 'Khong', 'Tat ca', 'Khong', 2),
(4, 1, 1, 1, '2023-12-02 00:00:00', '2023-12-07', 'Thông báo về việc triển khai các chức năng trên phần mềm quản lý khoa học giai đoạn 2', 'Kính gửi các đơn vị Thông báo về việc triển khai các chức năng trên phần mềm quản lý khoa học giai đoạn 2', 'Toàn trường', '../uploads/1087-tb-dct-16112023-ke-hoach-danh-gia-cap-nhat-chuan-dau-ra-va-chuong-trinh-dao-tao-trinh-do-do-dh-nam-hoc-2024-2025-20231116043226-e.pdf', 0),
(5, 1, 1, 1, '2023-12-04 00:00:00', '2023-12-06', 'Thông báo về việc đề xuất, xét duyệt, giao nhiệm vụ thực hiện đề tài khoa học và công nghệ, sáng kiến cấp Trường năm học 2023 - 2024 (đợt 2)', 'Kính gửi các đơn vị Thông báo về việc đề xuất, xét duyệt, giao nhiệm vụ thực hiện đề tài khoa học và công nghệ, sáng kiến cấp Trường năm học 2023 - 2024 (đợt 2) (đính kèm biểu mẫu)', 'Toàn trường', '../uploads/tb-1086-de-xuat-de-tai-sang-kien-cap-truong-2023-2024-dot-2-20231117103604-e.pdf', 0),
(15, 1, 1, 1, '2023-12-06 19:21:00', '2023-12-09', 'Thông báo về việc cử đại biểu tham dự Vòng Bán kết và Chung kết Cuộc thi Công nghệ chế biến sau thu hoạch năm 2023', 'Kính gửi các đơn vị Thông báo về việc cử đại biểu tham dự Vòng Bán kết và Chung kết Cuộc thi Công nghệ chế biến sau thu hoạch năm 2023.', 'Toàn trường', '../uploads/thong-bao-cu-dai-bieu-vbk-vck-cuoc-thi-cong-nghe-che-bien-sau-thu-hoach-nam-2023-20231123032046-e-20231124084117-e.pdf', 0),
(16, 1, 1, 1, '2023-12-09 01:54:00', '2023-12-12', 'Thông báo về việc tổ chức Lễ tốt nghiệp và trao bằng thạc sĩ, kỹ sư, cử nhân đợt 2 năm 2023', 'Kính gửi các đơn vị Thông báo về việc tổ chức Lễ tốt nghiệp và trao bằng thạc sĩ, kỹ sư, cử nhân đợt 2 năm 2023', 'Toàn trường', '../uploads/thong-bao-le-tot-nghiep-dot-2-nam-2023-20231124020946-e.pdf', 0),
(17, 1, 1, 1, '2023-12-09 01:57:00', '2023-12-18', 'Thông báo về việc Tổ chức nghiệm thu đề tài Nhóm nghiên cứu năm học 2019-2020', 'Kính gửi các đơn vị Thông báo về việc Tổ chức nghiệm thu đề tài Nhóm nghiên cứu năm học 2019-2020 (đính kèm biểu mẫu)', 'Toàn trường', '../uploads/thong-bao-nghiem-thu-nhom-nghien-cuu-nh-2019-2020-20231124032630-e.pdf', 0),
(18, 1, 1, 1, '2023-12-13 01:58:00', '2023-12-28', 'Quyết định về việc thành lập Hội đồng Khoa học và Đào tạo Trường Đại học Công Thương Thành phố Hồ Chí Minh', 'Kính gửi các đơn vị Quyết định về việc thành lập Hội đồng Khoa học và Đào tạo Trường Đại học Công Thương Thành phố Hồ Chí Minh', 'Toàn trường', '../uploads/quyet-dinh-thanh-lap-hoi-dong-khdt-huit-16112023-20231128072839-e-20231128074048-e.pdf', 0),
(19, 1, 1, 1, '2023-12-09 02:03:00', '2023-12-13', 'Thông báo về phổ biến những quy định về nâng bậc lương thường xuyên, nâng bậc lương trước thời hạn và phụ cấp thâm niên vượt khung và công khai danh sách dự kiến nâng bậc lương thường xuyên trong năm 2024', 'Kính gửi các đơn vị Thông báo về phổ biến những quy định về nâng bậc lương thường xuyên, nâng bậc lương trước thời hạn và phụ cấp thâm niên vượt khung và công khai danh sách dự kiến nâng bậc lương thường xuyên trong năm 2024 (đính kèm biểu mẫu)', 'Toàn trường', '../uploads/1154-tb-dct-01122023-vv-pho-bien-nhung-quy-dinh-ve-nang-bltx-nang-bl-truoc-han-va-pctn-vuot-khung-20231201092636-e.pdf', 0),
(20, 1, 1, 1, '2023-12-10 02:30:00', '2023-12-10', 'Kế hoạch công tác tháng 12 năm 2023', 'Kính gửi các đơn vị Kế hoạch công tác tháng 12 năm 2023', 'Toàn trường', '../uploads/1156-kh-dct-01122023-ke-hoach-cong-tac-thang-12-nam-2023-20231204022005-e.pdf', 0),
(21, 1, 1, 1, '2023-12-12 16:04:00', '2023-12-16', 'Thông báo về việc triển khai các chức năng trên phần mềm quản lý khoa học giai đoạn 2', 'Kính gửi các đơn vị Thông báo về việc triển khai các chức năng trên phần mềm quản lý khoa học giai đoạn 2', 'Toàn trường', '../uploads/tb-trien-khai-cac-chuc-nang-phan-mem-qlkh-giai-doan-2-20231207045349-e.pdf', 0),
(22, 7, 1, 1, '2023-12-17 00:11:00', '2023-12-18', 'Thông báo về việc sử dụng hộp thư điện tử (e-mail) với tên miền \"huit.edu.vn\"', 'Thông báo về việc sử dụng hộp thư điện tử (e-mail) với tên miền \"huit.edu.vn\"', 'Kính gửi các đơn vị Thông báo về việc sử dụng hộp thư điện tử (e-mail) với tên miền \"huit.edu.vn\"', '../uploads/DoAnCuoiKy_Word.pdf', 0),
(23, 7, 1, 1, '2023-12-18 00:13:00', '2023-12-19', 'Quyết định về việc điều chỉnh một số nội dung trong Quy chế chi tiêu nội bộ áp dụng từ năm học 2023 - 2024', 'Quyết định về việc điều chỉnh một số nội dung trong Quy chế chi tiêu nội bộ áp dụng từ năm học 2023 - 2024', 'Kính gửi các đơn vị Quyết định về việc điều chỉnh một số nội dung trong Quy chế chi tiêu nội bộ áp dụng từ năm học 2023 - 2024', '../uploads/DoAnCuoiKy_Word.pdf', 0),
(24, 1, 1, 1, '2023-12-20 00:14:00', '2023-12-21', 'Thông báo về việc hướng dẫn thực hiện kê khai, xét tính hưởng chế độ phụ cấp thâm niên nhà giáo lần đầu đối với viên chức giảng dạy thuộc trường', 'Thông báo về việc hướng dẫn thực hiện kê khai, xét tính hưởng chế độ phụ cấp thâm niên nhà giáo lần đầu đối với viên chức giảng dạy thuộc trường', 'Kính gửi các đơn vị Thông báo về việc hướng dẫn thực hiện kê khai, xét tính hưởng chế độ phụ cấp thâm niên nhà giáo lần đầu đối với viên chức giảng dạy thuộc trường (đính kèm biểu mẫu)', '../uploads/DoAnCuoiKy_Word.pdf', 0),
(25, 1, 1, 1, '2023-12-17 00:15:00', '2023-12-24', 'Thông báo Tổ chức Lễ phát động hưởng ứng tháng hành động vì bình đẳng giới và phòng ngừa, ứng phó với bạo lực giới cơ sở năm 2023 và Hội nghị khen thưởng phong trào thi đua \"Giỏi việc nước - Đảm việc nhà\" năm 2023', 'Thông báo Tổ chức Lễ phát động hưởng ứng tháng hành động vì bình đẳng giới và phòng ngừa, ứng phó với bạo lực giới cơ sở năm 2023 và Hội nghị khen thưởng phong trào thi đua \"Giỏi việc nước - Đảm việc nhà\" năm 2023', 'Kính gửi các đơn vị Thông báo Tổ chức Lễ phát động hưởng ứng tháng hành động vì bình đẳng giới và phòng ngừa, ứng phó với bạo lực giới cơ sở năm 2023 và Hội nghị khen thưởng phong trào thi đua \"Giỏi việc nước - Đảm việc nhà\" năm 2023', '../uploads/DoAnCuoiKy_Word.pdf', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `IDTrangThai` int(11) NOT NULL,
  `TenTrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`IDTrangThai`, `TenTrangThai`) VALUES
(1, 'Da Xem'),
(2, 'Chua Xem');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`IDBoMon`);

--
-- Chỉ mục cho bảng `chitietdanhsachgvnhan`
--
ALTER TABLE `chitietdanhsachgvnhan`
  ADD PRIMARY KEY (`IDNhomGV`,`IDNguoiDung`),
  ADD KEY `IDNguoiDung` (`IDNguoiDung`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`IDChucVu`);

--
-- Chỉ mục cho bảng `chutri`
--
ALTER TABLE `chutri`
  ADD PRIMARY KEY (`IDChuTri`);

--
-- Chỉ mục cho bảng `congdoan`
--
ALTER TABLE `congdoan`
  ADD PRIMARY KEY (`IDCongDoan`);

--
-- Chỉ mục cho bảng `danhsachgvnhan`
--
ALTER TABLE `danhsachgvnhan`
  ADD PRIMARY KEY (`IDNhomGV`);

--
-- Chỉ mục cho bảng `dsgvdaxemlichcongtac`
--
ALTER TABLE `dsgvdaxemlichcongtac`
  ADD PRIMARY KEY (`IDNguoiDung`,`IDLichCongTac`),
  ADD KEY `IDNguoiDung` (`IDNguoiDung`),
  ADD KEY `IDLichCongTac` (`IDLichCongTac`),
  ADD KEY `dsgvdaxemlichcongtac_ibfk_4` (`IDTrangThai`);

--
-- Chỉ mục cho bảng `dsgvdaxemthongbao`
--
ALTER TABLE `dsgvdaxemthongbao`
  ADD PRIMARY KEY (`IDNguoiDung`,`IDThongBao`),
  ADD KEY `IDNguoiDung` (`IDNguoiDung`),
  ADD KEY `IDThongBao` (`IDThongBao`),
  ADD KEY `IDTrangThai` (`IDTrangThai`);

--
-- Chỉ mục cho bảng `lichcongtac`
--
ALTER TABLE `lichcongtac`
  ADD PRIMARY KEY (`IDLichCongTac`),
  ADD KEY `IDNguoiTao` (`IDNguoiTao`),
  ADD KEY `IDNhomNguoiNhan` (`IDNhomNguoiNhan`),
  ADD KEY `IDChuTri` (`IDChuTri`);

--
-- Chỉ mục cho bảng `loaithongbao`
--
ALTER TABLE `loaithongbao`
  ADD PRIMARY KEY (`IDLoaiThongBao`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`IDNguoiDung`),
  ADD KEY `IDBoMon` (`IDBoMon`),
  ADD KEY `IDChucVu` (`IDChucVu`),
  ADD KEY `IDCongDoan` (`IDCongDoan`),
  ADD KEY `IDPhongBan` (`IDPhongBan`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`IDPhanQuyen`,`IDChucVu`),
  ADD KEY `phanquyen7` (`IDChucVu`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`IDPhongBan`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`IDPhanQuyen`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`IDThongBao`),
  ADD KEY `IDLoaiThongBao` (`IDLoaiThongBao`),
  ADD KEY `IDNguoiTao` (`IDNguoiTao`),
  ADD KEY `IDNhomNguoiNhan` (`IDNhomNguoiNhan`),
  ADD KEY `IDTrangThai` (`IDTrangThai`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`IDTrangThai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `IDBoMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chitietdanhsachgvnhan`
--
ALTER TABLE `chitietdanhsachgvnhan`
  MODIFY `IDNhomGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `IDChucVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chutri`
--
ALTER TABLE `chutri`
  MODIFY `IDChuTri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `congdoan`
--
ALTER TABLE `congdoan`
  MODIFY `IDCongDoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danhsachgvnhan`
--
ALTER TABLE `danhsachgvnhan`
  MODIFY `IDNhomGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lichcongtac`
--
ALTER TABLE `lichcongtac`
  MODIFY `IDLichCongTac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `loaithongbao`
--
ALTER TABLE `loaithongbao`
  MODIFY `IDLoaiThongBao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `IDNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `IDPhongBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `IDPhanQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `IDThongBao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `IDTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdanhsachgvnhan`
--
ALTER TABLE `chitietdanhsachgvnhan`
  ADD CONSTRAINT `chitietdanhsachgvnhan_ibfk_1` FOREIGN KEY (`IDNguoiDung`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `chitietdanhsachgvnhan_ibfk_2` FOREIGN KEY (`IDNhomGV`) REFERENCES `danhsachgvnhan` (`IDNhomGV`);

--
-- Các ràng buộc cho bảng `dsgvdaxemlichcongtac`
--
ALTER TABLE `dsgvdaxemlichcongtac`
  ADD CONSTRAINT `dsgvdaxemlichcongtac_ibfk_2` FOREIGN KEY (`IDLichCongTac`) REFERENCES `lichcongtac` (`IDLichCongTac`),
  ADD CONSTRAINT `dsgvdaxemlichcongtac_ibfk_3` FOREIGN KEY (`IDTrangThai`) REFERENCES `trangthai` (`IDTrangThai`),
  ADD CONSTRAINT `dsgvdaxemlichcongtac_ibfk_4` FOREIGN KEY (`IDTrangThai`) REFERENCES `trangthai` (`IDTrangThai`);

--
-- Các ràng buộc cho bảng `dsgvdaxemthongbao`
--
ALTER TABLE `dsgvdaxemthongbao`
  ADD CONSTRAINT `dsgvdaxemthongbao_ibfk_1` FOREIGN KEY (`IDNguoiDung`) REFERENCES `nguoidung` (`IDNguoiDung`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dsgvdaxemthongbao_ibfk_2` FOREIGN KEY (`IDThongBao`) REFERENCES `thongbao` (`IDThongBao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dsgvdaxemthongbao_ibfk_3` FOREIGN KEY (`IDTrangThai`) REFERENCES `trangthai` (`IDTrangThai`);

--
-- Các ràng buộc cho bảng `lichcongtac`
--
ALTER TABLE `lichcongtac`
  ADD CONSTRAINT `lichcongtac_ibfk_1` FOREIGN KEY (`IDNguoiTao`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `lichcongtac_ibfk_2` FOREIGN KEY (`IDNhomNguoiNhan`) REFERENCES `danhsachgvnhan` (`IDNhomGV`),
  ADD CONSTRAINT `lichcongtac_ibfk_3` FOREIGN KEY (`IDChuTri`) REFERENCES `chutri` (`IDChuTri`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`IDBoMon`) REFERENCES `bomon` (`IDBoMon`),
  ADD CONSTRAINT `nguoidung_ibfk_2` FOREIGN KEY (`IDChucVu`) REFERENCES `chucvu` (`IDChucVu`),
  ADD CONSTRAINT `nguoidung_ibfk_3` FOREIGN KEY (`IDCongDoan`) REFERENCES `congdoan` (`IDCongDoan`),
  ADD CONSTRAINT `nguoidung_ibfk_4` FOREIGN KEY (`IDPhongBan`) REFERENCES `phongban` (`IDPhongBan`);

--
-- Các ràng buộc cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen7` FOREIGN KEY (`IDChucVu`) REFERENCES `chucvu` (`IDChucVu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phanquyen8` FOREIGN KEY (`IDPhanQuyen`) REFERENCES `quyen` (`IDPhanQuyen`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`IDLoaiThongBao`) REFERENCES `loaithongbao` (`IDLoaiThongBao`),
  ADD CONSTRAINT `thongbao_ibfk_2` FOREIGN KEY (`IDNguoiTao`) REFERENCES `nguoidung` (`IDNguoiDung`),
  ADD CONSTRAINT `thongbao_ibfk_3` FOREIGN KEY (`IDNhomNguoiNhan`) REFERENCES `danhsachgvnhan` (`IDNhomGV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
