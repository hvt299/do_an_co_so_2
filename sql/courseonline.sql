-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 07:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `IDKH` int(11) NOT NULL,
  `TenKH` varchar(255) NOT NULL,
  `TacGiaKH` varchar(255) NOT NULL,
  `MoTaKH` text NOT NULL,
  `GiaGocKH` float NOT NULL,
  `GiaHienTaiKH` float NOT NULL,
  `URLKH` varchar(255) NOT NULL,
  `HinhAnhKH` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`IDKH`, `TenKH`, `TacGiaKH`, `MoTaKH`, `GiaGocKH`, `GiaHienTaiKH`, `URLKH`, `HinhAnhKH`) VALUES
(1, 'Khóa học lập trình C/C++ từ cơ bản đến nâng cao', 'Admin', 'Khóa học lập trình C/C++ từ cơ bản tới nâng cao dành cho người mới bắt đầu. Mục tiêu của khóa học này nhằm giúp các bạn nắm được các khái niệm căn cơ của lập trình, giúp các bạn có nền tảng vững chắc để chinh phục con đường trở thành một lập trình viên.', 199000, 159000, '#', './images/khoa-hoc-c-c++(1).png'),
(2, 'Khóa học lập trình Java', 'Admin', 'Khóa học lập trình Java cho người mới bắt đầu là khóa học hỗ trợ cho những người “nhập môn” Java có một lộ trình đơn giản và dễ dàng có thể làm quen với ngôn ngữ lập trình đa dạng này. Mục tiêu khóa học là giúp bạn nắm vững các kiến thức nền tảng của Java cũng như triển khai và vận dụng chúng một cách thuần thục. Bên cạnh đó, bạn cũng được đào để có thể phát triển ứng dụng web với Spring Framework và mô hình PVC. Không chỉ vậy, bạn cũng sẽ được cung cấp các kiến thức các công nghệ lưu trữ khác nhau và đào tạo cho bạn một lối tư duy, phong cách lập trình riêng cho mình.', 199000, 169000, '#', './images/khoa-hoc-java(1).png'),
(3, 'Khóa học lập trình Python căn bản', 'Admin', 'Khóa học Python căn bản cung cấp cho học viên những kiến thức nền tảng và kỹ năng cần thiết về lập trình Python, xây dựng ứng dụng game, ứng dụng tính toán sử dụng kiến thức lập trình căn bản, tạo nền tảng vững chắc khi chuyển sang khóa học chuyên sâu về data science như phân tích dữ liệu, học máy v.v. Ngoài ra, khoá học còn cung cấp các công cụ đặc thù để gia tăng hiệu suất lập trình, các phương pháp học tập và phát triển bản thân một cách khoa học, hiệu quả và bền vững. Sau khóa học, học viên đủ năng lực thi chứng chỉ quốc tế PCEP-30-02.', 299000, 250000, '#', './images/khoa-hoc-python(1).png'),
(4, 'Khóa học lập trình PHP', 'Admin', 'Khóa học lập trình PHP là chương trình đào tạo ngắn hạn của Aptech Ấn Độ , cung cấp cho người học các kiến thức cơ bản của ngôn ngữ PHP. Sau khi kết thúc khóa học, học viên có đầy đủ kiến thức để có thể bắt đầu tham gia các dự án web PHP đơn giản hoặc có thể tiếp tục tìm hiểu những thành phần nâng cao, các framework của PHP như Laravel hoặc WordPress.', 319000, 299000, '#', './images/khoa-hoc-php(1).png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `IDMenu` int(11) NOT NULL,
  `TenMenu` varchar(255) NOT NULL,
  `URLMenu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`IDMenu`, `TenMenu`, `URLMenu`) VALUES
(1, 'Trang chủ', 'index.php'),
(2, 'Khóa học', 'course_list.php'),
(3, 'Giới thiệu', 'about.php'),
(4, 'Liên hệ', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `VaiTro` varchar(255) NOT NULL DEFAULT 'Học viên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Email`, `Name`, `Password`, `VaiTro`) VALUES
('huavietthai299@gmail.com', 'Hứa Viết Thái', '123321', 'Học viên'),
('nguyenvana@gmail.com', 'Nguyễn Văn A', '123abc345', 'Học viên'),
('nguyenvanb@gmail.com', 'Nguyễn B', '123', 'Học viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`IDKH`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IDMenu`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `IDKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IDMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
