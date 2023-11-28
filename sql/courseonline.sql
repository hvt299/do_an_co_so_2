-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 03:44 PM
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
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `IDDG` int(11) NOT NULL,
  `IDHV` int(11) NOT NULL,
  `IDKH` int(11) NOT NULL,
  `NoiDungDG` text NOT NULL,
  `SaoDG` tinyint(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`IDDG`, `IDHV`, `IDKH`, `NoiDungDG`, `SaoDG`) VALUES
(1, 1, 1, 'Khóa học C/C++ từ cơ bản đến nâng cao là một chương trình học tuyệt vời để nắm vững hai ngôn ngữ lập trình quan trọng này. Khóa học cung cấp một hành trình học tập đầy đủ, bắt đầu từ những khái niệm căn bản như biến và cú pháp, sau đó tiến tới các chủ đề phức tạp như con trỏ và lập trình hướng đối tượng.', 5),
(2, 2, 2, 'Khóa học cung cấp một sự kết hợp tốt giữa lý thuyết và thực hành. Học viên không chỉ học các khái niệm trên giấy mà còn có cơ hội thực hành thông qua các bài tập và dự án thực tế. Điều này giúp học viên áp dụng kiến thức vào thực tế và phát triển kỹ năng lập trình thực tế.', 4),
(3, 3, 3, 'Khóa học Python là một khóa học đáng giá cho những ai muốn nắm vững ngôn ngữ lập trình Python. Với nội dung phong phú, môi trường thực hành tốt, giảng viên chuyên nghiệp và tính linh hoạt trong học tập, khóa học này cung cấp một cơ hội tuyệt vời để học viên phát triển kỹ năng lập trình Python và áp dụng kiến thức vào các dự án thực tế.', 4),
(4, 2, 4, 'Nội dung khóa học không được cập nhật đầy đủ hoặc không đi sâu vào các khía cạnh phức tạp của ngôn ngữ PHP.', 3),
(14, 5, 4, 'Hay', 3),
(15, 3, 5, 'OK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE `hocvien` (
  `IDHV` int(11) NOT NULL,
  `TenHV` varchar(255) NOT NULL,
  `GioiTinh` varchar(255) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `QueQuan` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `SDT` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`IDHV`, `TenHV`, `GioiTinh`, `NgaySinh`, `QueQuan`, `Email`, `SDT`) VALUES
(1, 'Nguyễn Văn A', 'Nam', '2004-01-01', 'Đà Nẵng', 'nguyenvana@gmail.com', NULL),
(2, 'Nguyễn B', 'Nam', '2004-07-21', 'Quảng Nam', 'nguyenvanb@gmail.com', NULL),
(3, 'Hứa Thái', 'Nam', '2004-09-29', 'Quảng Nam', 'huavietthai299@gmail.com', '0766747419'),
(4, 'Phong', 'Nam', NULL, NULL, 'phong31004@gmail.com', NULL),
(5, 'Thái 299', NULL, NULL, NULL, '123@gmail.com', NULL);

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
(1, 'Khóa học lập trình C/C++ từ cơ bản đến nâng cao', 'Admin', 'Khóa học lập trình C/C++ từ cơ bản tới nâng cao dành cho người mới bắt đầu. Mục tiêu của khóa học này nhằm giúp các bạn nắm được các khái niệm căn cơ của lập trình, giúp các bạn có nền tảng vững chắc để chinh phục con đường trở thành một lập trình viên.', 199000, 159000, '#', './images/khoa-hoc-c-c++.png'),
(2, 'Khóa học lập trình Java', 'Admin', 'Khóa học lập trình Java cho người mới bắt đầu là khóa học hỗ trợ cho những người “nhập môn” Java có một lộ trình đơn giản và dễ dàng có thể làm quen với ngôn ngữ lập trình đa dạng này. Mục tiêu khóa học là giúp bạn nắm vững các kiến thức nền tảng của Java cũng như triển khai và vận dụng chúng một cách thuần thục. Bên cạnh đó, bạn cũng được đào để có thể phát triển ứng dụng web với Spring Framework và mô hình PVC. Không chỉ vậy, bạn cũng sẽ được cung cấp các kiến thức các công nghệ lưu trữ khác nhau và đào tạo cho bạn một lối tư duy, phong cách lập trình riêng cho mình.', 199000, 169000, '#', './images/khoa-hoc-java.png'),
(3, 'Khóa học lập trình Python căn bản', 'Admin', 'Khóa học Python căn bản cung cấp cho học viên những kiến thức nền tảng và kỹ năng cần thiết về lập trình Python, xây dựng ứng dụng game, ứng dụng tính toán sử dụng kiến thức lập trình căn bản, tạo nền tảng vững chắc khi chuyển sang khóa học chuyên sâu về data science như phân tích dữ liệu, học máy v.v. Ngoài ra, khoá học còn cung cấp các công cụ đặc thù để gia tăng hiệu suất lập trình, các phương pháp học tập và phát triển bản thân một cách khoa học, hiệu quả và bền vững. Sau khóa học, học viên đủ năng lực thi chứng chỉ quốc tế PCEP-30-02.', 299000, 250000, '#', './images/khoa-hoc-python.png'),
(4, 'Khóa học lập trình PHP', 'Admin', 'Khóa học lập trình PHP là chương trình đào tạo ngắn hạn của Aptech Ấn Độ , cung cấp cho người học các kiến thức cơ bản của ngôn ngữ PHP. Sau khi kết thúc khóa học, học viên có đầy đủ kiến thức để có thể bắt đầu tham gia các dự án web PHP đơn giản hoặc có thể tiếp tục tìm hiểu những thành phần nâng cao, các framework của PHP như Laravel hoặc WordPress.', 319000, 299000, '#', './images/khoa-hoc-php.png'),
(5, 'Khóa học cấu trúc dữ liệu và giải thuật', 'Admin', 'Khóa học cấu trúc dữ liệu và giải thuật là một khóa học chuyên sâu trong lĩnh vực khoa học máy tính và lập trình. Nó tập trung vào việc nghiên cứu và áp dụng các phương pháp, kỹ thuật và công cụ để tổ chức và xử lý dữ liệu một cách hiệu quả.', 399000, 359000, '#', './images/khoa-hoc-ctdl-gt.png'),
(6, 'Khóa học lập trình front-end', 'Admin', 'Khóa học lập trình front-end là một khóa học tập trung vào việc học cách phát triển giao diện người dùng (UI) của các ứng dụng web. Front-end là phần của một ứng dụng web mà người dùng tương tác trực tiếp và thấy được trên trình duyệt. Ngoài ra, khóa học cũng tập trung vào việc học cách sử dụng các công cụ và framework phổ biến để phát triển front-end như Bootstrap, React, Angular hoặc Vue.js. Các công cụ này cung cấp thư viện và tiện ích giúp tăng tính tương tác, khả năng mở rộng và quản lý dự án hiệu quả trong việc xây dựng ứng dụng web phức tạp.', 350000, 320000, '#', './images/khoa-hoc-frontend.png');

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
  `VaiTro` varchar(255) NOT NULL DEFAULT 'Học viên',
  `MatKhauUngDung` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Email`, `Name`, `Password`, `VaiTro`, `MatKhauUngDung`) VALUES
('123@gmail.com', 'Thái 299', '123', 'Học viên', NULL),
('admin@courseonline.com', 'Admin', 'admin', 'Quản lý', NULL),
('huavietthai299@gmail.com', 'Hứa Viết Thái', '123321', 'Học viên', NULL),
('nguyenvana@gmail.com', 'Nguyễn Văn A', '123abc345', 'Học viên', NULL),
('nguyenvanb@gmail.com', 'Nguyễn B', '123', 'Học viên', NULL),
('phong31004@gmail.com', 'duyphong3131', '123', 'Học viên', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`IDDG`),
  ADD KEY `FK_hocvien_danhgia_idhv` (`IDHV`),
  ADD KEY `FK_khoahoc_danhgia_idkh` (`IDKH`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`IDHV`),
  ADD KEY `FK_taikhoan_hocvien_email` (`Email`);

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
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `IDDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `IDHV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `IDKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IDMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `FK_hocvien_danhgia_idhv` FOREIGN KEY (`IDHV`) REFERENCES `hocvien` (`IDHV`),
  ADD CONSTRAINT `FK_khoahoc_danhgia_idkh` FOREIGN KEY (`IDKH`) REFERENCES `khoahoc` (`IDKH`);

--
-- Constraints for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD CONSTRAINT `FK_taikhoan_hocvien_email` FOREIGN KEY (`Email`) REFERENCES `taikhoan` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
