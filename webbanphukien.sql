-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 11:59 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanphukien`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietban`
--

CREATE TABLE `chitietban` (
  `id_hoadonban` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietban`
--

INSERT INTO `chitietban` (`id_hoadonban`, `id_sanpham`, `dongia`, `soluong`, `thanhtien`) VALUES
(1, 5, 3790000, 1, 3790000),
(1, 7, 8500000, 1, 8500000),
(2, 1, 50000000, 2, 100000000),
(6, 15, 10000000, 1, 10000000),
(7, 14, 40000000, 1, 40000000),
(10, 19, 6190000, 1, 6190000),
(3, 1, 50000000, 1, 50000000),
(4, 17, 900000, 2, 18000000),
(5, 25, 350000, 6, 2100000),
(8, 12, 13799000, 1, 13799000),
(9, 21, 8000000, 1, 8000000),
(9, 22, 90000, 1, 90000),
(11, 18, 22000000, 1, 22000000),
(11, 24, 990000, 1, 990000),
(12, 22, 90000, 5, 450000),
(12, 30, 50000, 5, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhap`
--

CREATE TABLE `chitietnhap` (
  `id_hoadonnhap` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietnhap`
--

INSERT INTO `chitietnhap` (`id_hoadonnhap`, `id_sanpham`, `soluong`, `dongia`) VALUES
(4, 4, 19, 6000000),
(6, 1, 14, 4000000),
(6, 8, 15, 0),
(7, 18, 13, 22000000),
(8, 22, 19, 90000),
(8, 23, 19, 90000),
(4, 8, 19, 9000000),
(1, 21, 19, 8000000),
(2, 13, 14, 22000000),
(9, 27, 8, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_giohang`
--

CREATE TABLE `chitiet_giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id_giohang`, `id_nguoidung`) VALUES
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonban`
--

CREATE TABLE `hoadonban` (
  `id_hoadonban` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `ngayhoadon` date NOT NULL,
  `tongtien` float NOT NULL,
  `tinhtrang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaythanhtoan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadonban`
--

INSERT INTO `hoadonban` (`id_hoadonban`, `id_nguoidung`, `ngayhoadon`, `tongtien`, `tinhtrang`, `ngaythanhtoan`) VALUES
(1, 4, '2019-12-19', 12290000, 'Đã hủy', '0000-00-00'),
(2, 4, '2019-12-19', 100000000, 'Đã xác nhận', '0000-00-00'),
(3, 5, '2019-12-19', 50000000, 'Đã hủy', '0000-00-00'),
(4, 5, '2019-12-19', 18000000, 'Đã thu tiền', '2019-12-19'),
(5, 5, '2019-12-19', 2100000, 'Đã xác nhận', '0000-00-00'),
(6, 6, '2019-11-30', 10000000, 'Đã thanh toán', '2019-12-12'),
(7, 7, '2019-12-19', 40000000, 'Đã xác nhận', '0000-00-00'),
(8, 7, '2019-12-19', 13799000, 'Đã thu tiền', '2019-12-20'),
(9, 4, '2019-12-19', 8090000, 'Đã xác nhận', '0000-00-00'),
(10, 8, '2019-11-21', 6190000, 'Đã xác nhận', '0000-00-00'),
(11, 8, '2019-11-26', 22990000, 'Đã xác nhận', '0000-00-00'),
(12, 11, '2019-12-21', 700000, 'Đã thu tiền', '2019-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `id_hoadonnhap` int(11) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `tongtiennhap` int(11) NOT NULL,
  `tinhtrang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaythanhtoan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`id_hoadonnhap`, `id_ncc`, `ngaynhap`, `tongtiennhap`, `tinhtrang`, `ngaythanhtoan`) VALUES
(1, 4, '2019-10-24', 80000000, 'Đã hủy', '0000-00-00'),
(2, 2, '2019-11-08', 110000000, 'Đã thanh toán', '2019-12-21'),
(3, 1, '2019-11-14', 0, 'Đã hủy', '0000-00-00'),
(4, 1, '2019-11-25', 150000000, 'Đã thanh toán', '2019-12-21'),
(5, 4, '2019-11-30', 0, 'Đã hủy', '0000-00-00'),
(6, 2, '2019-12-01', 0, 'Đã hủy', '0000-00-00'),
(7, 5, '2019-12-09', 88000000, 'Đã xác nhận', '0000-00-00'),
(8, 6, '2019-12-16', 1800000, 'Đã thanh toán', '2019-12-19'),
(9, 8, '2019-12-21', 13900000, 'Đã thanh toán', '2019-12-21'),
(10, 1, '2019-12-21', 0, 'Đã hủy', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id_loaisp` int(11) NOT NULL,
  `tenloaisp` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id_loaisp`, `tenloaisp`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Apple'),
(4, 'Tablet'),
(5, 'Bao da ốp lưng'),
(6, 'Sạc dự phòng'),
(7, 'Thẻ nhớ'),
(8, 'Miếng dán màn hình'),
(9, 'Tai nghe'),
(10, 'Loa'),
(11, 'USB - Ổ cứng'),
(12, 'Cáp sạc'),
(13, 'Chuột'),
(14, 'Bàn phím'),
(15, 'Balo - Túi xách'),
(16, 'Phụ kiện khác');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` int(11) NOT NULL,
  `tendangnhap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tennguoidung` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `loaitaikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `tendangnhap`, `matkhau`, `tennguoidung`, `diachi`, `email`, `dienthoai`, `loaitaikhoan`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', 1),
(2, 'admin2', 'admin2', 'admin2', '', '', '', 1),
(3, 'admin3', 'admin3', 'admin3', '', '', '', 1),
(4, 'user001', 'user001', 'Khách hàng #1', 'Khu phố 6 Linh Trung Thủ Đức', 'user001@gmail.com', '0902456789', 2),
(5, 'user002', 'user002', 'Khách hàng #2', '98 Nguyễn Tất Thành', 'user002@yahoo.com', '090987654', 2),
(6, 'user003', 'user003', 'Khách hàng #3', '104 Lê Đại Hành', 'user003@yan.com', '098625173', 2),
(7, 'user004', 'user004', 'Khách hàng #4', '884/89 Lê Văn Thọ, phường 16, Gò Vấp, TPHCM', 'user004@hotmail.com', '012571720', 2),
(8, 'user005', 'user005', 'Khách hàng #5', '89 Nguyễn Xí, Bình Thạnh, TPHCM', 'user005@gm.msa.com', '055123456', 2),
(9, 'user006', 'user006', 'Khách hàng #6', '125/8 Hiệp Thành, Q12, TPHCM', 'user006@yan.com', '0255123456', 2),
(10, 'huynm123', '123456789', 'Nguyễn Văn Tèo', '156 Nguyễn Văn Nghi', 'teo123@hotmail.com', '09026789', 2),
(11, 'huy123', '123456', 'Nguyễn Minh Huy', '154 Linh Trung, Thủ Đức, TPHCM', 'huynm123@gmail.com', '09023556792', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id_ncc` int(11) NOT NULL,
  `tenncc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt_ncc` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id_ncc`, `tenncc`, `diachi`, `email`, `sdt_ncc`) VALUES
(1, 'Công ty cp thiết bị Bách Khoa', ' 247 Lý Thường Kiệt, Phường 15, Quận 11, Hồ Chí Minh', 'backkhoacp@gmail.com', '097 650 45 79'),
(2, 'Phân phối laptop Thành Nam', 'Đường D1, Phường Tân Phú, Quận 9, Hồ Chí Minh', 'sankyovn366@yahoo.co', '028 3736 0014'),
(3, 'Công ty phân phối điện thoại Minh Vượng', 'Khu phố 10 Linh Trung Thủ Đức', 'minhvuongltd@yahoo.com.vn', '012 355 6789'),
(4, 'Tablet Supplier Việt Nam', '104 Lê Đại Hành', 'ahaznvn@gmail.com', '090 736 5881'),
(5, 'Apple Inc Retail Việt Nam', '82 Lê Duẩn TPHCM', 'applevn@gmail.com', '012 315 6792'),
(6, 'Phụ kiện công nghệ Hoàng Hải', '125 Lê Đại Hành ', 'hanghaitoy@hotmail.com', '098 123 6789'),
(7, 'Hoàng Hà Mobiles', '265 Nguyễn Bính, Q. Tân Phú, TPHCM', 'hoanghamobiles@hoangha.com.vn', '090 756 2251'),
(8, 'Điện máy Vàng', '15/8 Tô Ngọc Vân, Q12, TPHCM', 'yellowMachine@gmail.com', '015 762 8888');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `giasp` int(11) NOT NULL,
  `mota` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `baohanh` int(11) NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_loaisp` int(11) NOT NULL,
  `id_ncc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensp`, `giasp`, `mota`, `soluong`, `baohanh`, `hinhanh`, `id_loaisp`, `id_ncc`) VALUES
(1, 'Samsung Galaxy Fold', 50000000, '- Màn hình chính 7.3\r\n- Camera 10MP\r\n- Ram 12G, Bộ nhớ 512GB', 105, 12, '637102754985873870_samsung-galaxy-fold-den-0.png', 1, 7),
(2, 'Samsung Galaxy Note 10 Plus', 26990000, '-6.8 inches\r\n-RAM 12GB, Bộ nhớ 256GB\r\n-Dung lượng pin: 4,300 mAh\r\n-Hệ điều hành: Android 9.0 (Pie)', 106, 6, '637008702547566121_SS-note-10-pl-glow-1-1.png', 1, 1),
(3, 'Vivo Y11', 2990000, ' -RAM 3GB, bộ nhớ 32GB\r\n-Pin trâu ', 30, 3, '637069295775630500_vivo-y11-xanh-1.png', 1, 3),
(4, 'Xiaomi Redmi Note 8 Pro', 6000000, ' RAM 6GB, Bộ nhớ 64GB, Pin trâu ', 50, 3, '637060435932431657_xiaomi-redmi-note-8-pro-xanh-1.png', 1, 1),
(5, 'Vsmart Live', 3790000, '-Màn hình 6.2, full HD+\r\n-Camera 20MP\r\n-RAM 6GB, Bộ nhớ 64GB', 50, 18, '636993881845164627_vsmart-live-xanh-1.png', 1, 3),
(6, 'Oppo A9 2020', 5990000, 'Camera 16PM, RAM 8GB, bộ nhớ 128GB\r\nPin 5000mAh', 100, 6, '637031272300640521_oppo-a9-tim-1.png', 1, 7),
(7, 'OPPO Reno2 ', 8500000, 'Sơn Tùng làm đại diện', 60, 5, '637109040587616277_oppo-reno2-f-xanhtim-1.png', 1, 7),
(8, 'Huawei Nova 5T 8GB-128GB  ', 9000000, '- Ram 8 GB\r\n- GPU Mali-G76\r\n- pin 3750 mAh', 80, 3, '637105309126556376_huawei-nova-5t-xanh-1.png', 1, 1),
(9, 'Realme XT 8GB-128GB', 7990000, '- Ram cao, pin khủng\r\n- Bộ nhớ trong lớn \r\n- Camera AI', 100, 6, '637092380829657558_realme-xt-trang-1.png', 1, 3),
(10, 'Acer Spin 3 SP314-51-51LE/Core i5', 12990000, ' -Intel core i5\r\n-RAM 4GB, DDR4\r\n-SSD, 256GB ', 30, 6, '637020691437890867_acer-spin-3-sp314-51-1-1.png', 2, 2),
(11, 'Asus TUF FX505DY-AL095T/R5-3550H', 17990000, 'Laptop for Gaming', 50, 6, '636927403262242198_asus-tuf-fx505dy-1.png', 2, 2),
(12, 'Lenovo Ideapad S340-15IWL/i5', 13799000, ' -intel core i5\r\n-Card rời, Nvidia Geforce MX230 ', 50, 12, '636959259046596625_lenovo-ideapad-s340-15iwl-1.png', 2, 2),
(13, 'MSI GF63 8RC-203VN/I5-8300H', 22000000, '-Cơ hội trúng iPhone 9 khi mua', 30, 12, '636680367015529770_MSI-GF63-8RD-Chi-tiet-1.png', 2, 2),
(14, 'iPhone Xs Max 512GB ', 40000000, 'CPU 6, Camera 7.0, RAM 4GB', 30, 12, '636767481293463872_iphone-xs-gold-4.png', 3, 5),
(15, 'iPad 2019 10.2 Wi-Fi 32GB', 10000000, 'Trả góp 0% chỉ từ 1,212,000đ/tháng\r\nGiảm ngay 1,000,000đ\r\nGiảm thêm 500,000đ khi mua kèm Apple Penci', 50, 12, '637063885990188798_ipad-wifi-2019-xam-1.png', 3, 5),
(16, 'Macbook Pro 13 Touch Bar', 52000000, 'i5 2.4GHz/8G/512GB (2019)', 10, 12, '636948950247111627_macbook-pro-13-touch-bar-2019-xam-1.png', 3, 5),
(17, 'Apple Watch Nike S3 GPS', 9000000, 'Cellular, 38mm viền nhôm dây cao su', 20, 6, '637108778585000148_APW-00629606-nike-den-1.png', 3, 5),
(18, 'Apple Watch S5 GPS', 22000000, 'Cellular, 40mm viền thép dây Milanese\r\nƯu đãi/ Khuyến mãi: Trả góp 0% chỉ từ 1,441,000đ/tháng\r\nGiảm ', 20, 12, '637105520384087410_APW-00629604-bac-1.png', 3, 5),
(19, 'Samsung Galaxy Tab A Plus 8.0', 6190000, 'Giá đặc biệt đến 22/12: 6,190,000đ\r\nTrả góp 0%, mỗi tháng chỉ từ 876,000đ', 20, 6, '636900747857038410_ss-tab-a-plus-8-xam-1.png', 4, 4),
(20, 'Masstel Tab 10 Plus ', 2090000, 'Giá đặc biệt đến 31/12: 2,090,000đ\r\nTặng Bao da chính hãng\r\nTặng Phần mềm học tiếng Anh Kidup\r\nTặng ', 20, 3, '636822148608270051_MasstelTab10Plus(1).jpg', 4, 4),
(21, 'Huawei MediaPad M5 Lite 64GB', 8000000, 'Trả góp 0%', 25, 6, '637104705908313430_huawei-mediapad-m5-lite-101-1.png', 4, 4),
(22, 'Ốp lưng Samsung A50s ', 90000, 'Nhựa dẻo Solid TPU UV Printing Meetu MT-2019038 Con gấu ', 45, 1, '637097552610582260_OP-LUNG-1.jpg', 5, 6),
(23, 'Ốp lưng Oppo A9 2020', 90000, 'Nhựa dẻo Solid TPU UV Printing Meetu MT-2019033 King', 50, 1, '637097561838076300_OP-LUNG-26.jpg', 5, 6),
(24, 'Bao da Macbook Air 13 2018 ', 990000, ' Da thật MacBook Top Layer Genuine Leather Cover F.Power Nâu', 50, 1, '637013963044939396_BAO-DA-MACBOOK-13-5.jpg', 5, 8),
(25, 'Bao da nắp gập iPad Mini 5 2019 ', 350000, 'Nhựa cứng viền dẻo Pen Slot Leather Case Meetu Xanh Navy ', 30, 1, '636981781728897032_HASP-Baoda-iPad-Mini-5-Color-Cover-Meetu-Pink-2.jpg', 5, 8),
(26, ' Pin sạc dự phòng Li-ion 10000mAh ', 600000, 'Anker PowerCore Select A1223', 20, 2, '637063909147757022_Pin sạc dự phòng Li-ion 10000mAh Anker PowerCore Select A1223 Đen 3.jpg', 6, 6),
(27, 'Pin sạc dự phòng Li-ion 5000mAh Anker PowerCore', 500000, 'Tặng PMH trị giá 100,000đ mua Tai nghe Buetooth đơn hàng tiếp theo.\r\nCàng mua càng rẻ:\r\nMua 2-3 món ', 48, 1, '636863538097615653_00547537.jpg', 6, 8),
(28, 'Thẻ nhớ Micro SD 128GB Sandisk C10', 1090000, 'Mua 2 - 3 món Phụ Kiện khác nhau giảm 10%\r\nMua 4 món Phụ Kiện khác nhau giảm 15%\r\nMua 5 món Phụ Kiện', 50, 3, '636251068136755339_HMPK-THE-NHO-MICRO-SD-128GB-SANDISK-C10-01.jpg', 7, 6),
(29, 'Thẻ nhớ Micro SD 32Gb Sandisk C10', 300000, 'Mua 2 - 3 món Phụ Kiện khác nhau giảm 10%\r\nMua 4 món Phụ Kiện khác nhau giảm 15%\r\nMua 5 món Phụ Kiện', 40, 3, '636252809479326462_HMPK-THE-NHO-MICRO-SD-32GB-SANDISK-C10-01.jpg', 7, 8),
(30, 'MDMH Iphone 11 YVS - mặt sau', 50000, 'Mua 2-3 món Phụ Kiện khác nhau giảm 10%\r\nMua 4 món Phụ Kiện khác nhau giảm 15%\r\nMua 5 món Phụ Kiện t', 45, 1, '637068152947857943_00610456.jpg', 8, 1),
(31, 'MDMH Kính Cường Lực tràn viền Oppo A9 2020 Black Y', 150000, 'Ưu đãi dùng thử 15 ngày\r\nCàng mua càng rẻ:\r\nMua 2-3 món Phụ Kiện khác nhau giảm 10%\r\nMua 4 món Phụ K', 50, 1, '637068147659734552_00604912.jpg', 8, 8),
(32, 'Tai nghe có dây choàng đầu có mic i.value T-139', 400000, 'Ưu đãi dùng thử 15 ngày\r\nCàng mua càng rẻ:\r\nMua 2-3 món Phụ Kiện khác nhau giảm 10%\r\nMua 4 món Phụ K', 50, 1, '637121963723526233_HASP-Tainghe-ivalue-T1390-RED-Black-0063788-3.jpg', 9, 6),
(33, 'Tai nghe bluetooth nhét tai i.value Y933', 350000, 'Mua 2-3 món Phụ Kiện khác nhau giảm 10%\r\nMua 4 món Phụ Kiện khác nhau giảm 15%\r\nMua 5 món Phụ Kiện t', 40, 1, '637121950113405654_HASP-Tainghe-ivalue-00630784-3.jpg', 9, 1),
(34, 'Tai nghe bluetooth choàng đầu có mic i.value A8 ', 550000, 'Ưu đãi dùng thử 15 ngày\r\nCàng mua càng rẻ', 50, 1, '637050170631026636_HASP-Tainghe-iValue-A8-00602556-3.jpg', 9, 8),
(35, 'Tai nghe bluetooth nhét tai F.Power L-18 black', 1200000, 'Càng mua càng rẻ', 50, 1, '636894634453427413_HASP-Tainghe-ivalue-L18-555008-3.jpg', 9, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietban`
--
ALTER TABLE `chitietban`
  ADD KEY `id_hoadonban` (`id_hoadonban`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD KEY `id_hoadonnhap` (`id_hoadonnhap`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  ADD KEY `id_giohang` (`id_giohang`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`id_hoadonban`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`id_hoadonnhap`),
  ADD KEY `id_ncc` (`id_ncc`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id_ncc`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_loaisp` (`id_loaisp`),
  ADD KEY `id_ncc` (`id_ncc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `id_hoadonban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `id_hoadonnhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id_ncc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietban`
--
ALTER TABLE `chitietban`
  ADD CONSTRAINT `fk_chitietban_hoadonban` FOREIGN KEY (`id_hoadonban`) REFERENCES `hoadonban` (`id_hoadonban`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitietban_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD CONSTRAINT `fk_chitietnhap_hoadonnhap` FOREIGN KEY (`id_hoadonnhap`) REFERENCES `hoadonnhap` (`id_hoadonnhap`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitietnhap_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  ADD CONSTRAINT `fk_chitietgiohang_giohang` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`id_giohang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitietgiohang_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD CONSTRAINT `fk_hoadonban_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `fk_hoadonnhap_nhacungcap` FOREIGN KEY (`id_ncc`) REFERENCES `nhacungcap` (`id_ncc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_loaisp` FOREIGN KEY (`id_loaisp`) REFERENCES `loaisp` (`id_loaisp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sanpham_nhacungcap` FOREIGN KEY (`id_ncc`) REFERENCES `nhacungcap` (`id_ncc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
