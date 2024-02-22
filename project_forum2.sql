-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 06:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1352025327_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `diskusi_id` int(11) NOT NULL,
  `diskusi_posting` int(11) NOT NULL,
  `diskusi_tanggal` datetime NOT NULL,
  `diskusi_member` int(11) NOT NULL,
  `diskusi_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

INSERT INTO `diskusi` (`diskusi_id`, `diskusi_posting`, `diskusi_tanggal`, `diskusi_member`, `diskusi_isi`) VALUES
(1, 1, '2019-12-12 15:25:57', 6, '<p>Coba pakai android studio<br></p>'),
(2, 1, '2019-12-12 17:04:24', 5, '<p><img src=\"http://localhost/project_forum/gambar/diskusi/1d7f7abc18fcb43975065399b0d1e48e.jpg\" style=\"width: 50%;\"></p><p>tes<br></p>'),
(3, 3, '2019-12-12 17:13:57', 7, '<p>Saya biasa pakai font ROBOTO<br></p>'),
(4, 2, '2019-12-12 17:14:41', 8, '<p>Terima kasiih infonya suhu<br></p>'),
(5, 3, '2019-12-12 17:14:57', 8, '<p>iya roboto bagus font nya, bersiih<br></p>'),
(6, 1, '2019-12-12 17:15:18', 8, '<p>coba baca tutorialnya di malasngoding.com<br></p>'),
(7, 4, '2019-12-12 17:15:41', 8, '<p>keduanya bagus, tergantung pengguna suka yang maana<br></p>'),
(9, 3, '2019-12-12 17:25:32', 11, '<p>coba lihat di website font google, ada bannyak pilihan yang bagus2</p>'),
(10, 1, '2019-12-12 17:26:39', 11, '<p>tes posting gambar</p><p style=\"text-align: center; \"><img src=\"http://localhost/project_forum/gambar/diskusi/a0a080f42e6f13b3a2df133f073095dd.png\" style=\"width: 50%;\"></p><p style=\"text-align: left;\">Oke</p>');


--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Tidak Berkategori'),
(14, 'PHP'),
(15, 'Javascript'),
(16, 'C++'),
(19, 'Go'),
(20, 'Ruby'),
(21, 'Swift'),
(22, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_nama` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_hp` varchar(20) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_alamat` text NOT NULL,
  `member_foto` varchar(255) NOT NULL,
  `member_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_nama`, `member_email`, `member_hp`, `member_password`, `member_alamat`, `member_foto`, `member_status`) VALUES
(5, 'Samsul Bahri', 'samsul@gmail.com', '0812345678', 'b5146ab5c012993e868d0f7f3ab2c092', 'jl. merpati n0.8 jakarta', '','aktif'),
(6, 'Sulaiman Kasirun', 'sulaiman@gmail.com', '08123234567', 'b952c0aa88e8ddfa82095665f8c9b4ec', 'Sumedang', '','aktif'),
(7, 'Ferdian Syah', 'ferdian@gmail.com', '082123223332', '01bd76c7c5a32d22e2d7a951346976f7', 'Tanjung Kleng', '','aktif'),
(8, 'Muhammad Irsyad', 'irsyad@gmail.com', '0812262727262', '5647b8b060c2f2c9f5608e77f1aecd12', 'Cimahi', '293482666_01bbb243-33f6-482f-a988-257f85179658-ff5ff253bd89ddd4f5523417a8d4de78.jpg', 'aktif'),
(9, 'Raja Fajar', 'raja@gmail.com', '082221212272', 'ee70da5c423d0938d626d74301539542', 'Cibaduyut', '', 'aktif'),
(10, 'Fatimah', 'fatimah@gmail.com', '0821122122', '65695b363e7c8b3c0e838b230dea78b3', 'Sumedang', '', 'aktif'),
(11, 'Sumanto', 'sumanto@gmail.com', '081223223233', '9e37faf5a6921562bbcb96b55bf3061d', 'Jawa Tengah', '1538883492_lucu.jpg', 'aktif'),
(12, 'Jihan Markuti', 'jihan@gmail.com', '082232234234', 'c93c89a8f0a5e0fb37a1c4fcd1c79fe1', 'Jamaika', '764409174_petak.jpg', 'aktif'),
(15, 'aul', 'member3@gmail.com', '01921241', '950a5e3732fd173428154f84954a82b7', 'anjaw', '', 'banned'),
(16, 'Fadhil', 'fadhildzm@gmail.com', '987654323', '202cb962ac59075b964b07152d234b70', 'Palestina', '', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `posting_id` int(11) NOT NULL,
  `posting_tanggal` datetime NOT NULL,
  `posting_member` int(11) NOT NULL,
  `posting_kategori` int(11) NOT NULL,
  `posting_judul` varchar(255) NOT NULL,
  `posting_isi` text NOT NULL,
  `posting_dibaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posting` (`posting_id`, `posting_tanggal`, `posting_member`, `posting_kategori`, `posting_judul`, `posting_isi`, `posting_dibaca`) VALUES
(1, '2019-12-12 15:24:53', 5, 19, 'Software Terbaik Untuk Membuat Aplikasi Android', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 63),
(2, '2019-12-12 17:06:22', 5, 14, 'Cara Terbaru Mendaftar Google Adsense', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 7),
(3, '2019-12-12 17:09:39', 10, 16, 'Font Terbaru Dari Google', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 7),
(4, '2019-12-12 17:10:55', 7, 19, 'IOS VS ANDROID, Bagus mana?', '<p>Saya bingung Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p align=\"center\"><img src=\"http://localhost/project_forum/gambar/diskusi/0a09c8844ba8f0936c20bd791130d6b6.jpg\" style=\"width: 50%;\"><br></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 3),
(5, '2019-12-12 17:17:00', 8, 14, 'Memasarkan Produk Makanan Di Internet', '<p>Cara memasarkan produk makanan di internet sangat gampang.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p align=\"center\"><img src=\"http://localhost/project_forum/gambar/diskusi/cedebb6e872f539bef8c3f919874e9d7.jpg\" style=\"width: 50%;\"><br></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 8);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`diskusi_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`posting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `diskusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `posting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
