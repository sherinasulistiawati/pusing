-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 10:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tintapuc_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
`id_main` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `icon` varchar(20) NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `icon`, `link`, `aktif`) VALUES
(1, 'Setting Admin', 'fa-gear', '', 'Y'),
(2, 'Menu', 'fa-database', '', 'Y'),
(3, 'Setting', 'fa-gavel', '', 'Y'),
(4, 'SPP', 'fa-paper-plane-o', '?module=spp', 'Y'),
(5, 'PO', 'fa-money', '?module=po', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `key_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link_modul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `key_modul`, `link_modul`, `aktif`) VALUES
(1, 'Home', 'home', 'mod_home/home.php', 'Y'),
(2, 'Manajemen User', 'users', 'mod_users/users.php', 'Y'),
(3, 'Manajemen User Level', 'userslevel', 'mod_users_level/users_level.php', 'Y'),
(4, 'Manajemen Modul', 'modul', 'mod_modul/modul.php', 'Y'),
(5, 'Menu Utama', 'menuutama', 'mod_menuutama/menuutama.php', 'Y'),
(6, 'Sub Menu', 'submenu', 'mod_submenu/submenu.php', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
`id_permission` int(11) NOT NULL,
  `id_users_level` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id_permission`, `id_users_level`, `id_modul`) VALUES
(12, 1, 6),
(11, 1, 5),
(10, 1, 4),
(9, 1, 3),
(8, 1, 2),
(7, 1, 1),
(13, 1, 7),
(14, 1, 8),
(15, 1, 9),
(16, 1, 10),
(21, 2, 1),
(22, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
`id_sub` int(5) NOT NULL,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`, `id_submain`, `aktif`) VALUES
(1, 'Manajemen User', '?module=users', 1, 0, 'Y'),
(2, 'Manajemen Modul', '?module=modul', 1, 0, 'Y'),
(3, 'Manajemen Level User', '?module=userslevel', 1, 0, 'Y'),
(4, 'Menu Utama', '?module=menuutama', 2, 0, 'Y'),
(5, 'Sub Menu', '?module=submenu', 2, 0, 'Y'),
(10, 'Alat', '?module=alat', 3, 0, 'Y'),
(11, 'Kode Status Breakdown', '?module=kode_status_breakdown', 0, 0, 'Y'),
(12, 'Kode Stat Breakdown', '?module=kode_status_breakdown', 2, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_users` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `lokasi_kantor` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `id_users_level` int(11) NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `lokasi_kantor`, `foto`, `id_users_level`, `blokir`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'ahmad.rizki.s@tintapuccino.com', '085721210992', '', '', 1, 'N', 'la07ncben8ba6jb8e87f4o20b3');

-- --------------------------------------------------------

--
-- Table structure for table `users_level`
--

CREATE TABLE IF NOT EXISTS `users_level` (
`id_users_level` int(11) NOT NULL,
  `users_level` varchar(50) NOT NULL,
  `users_level_key` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_level`
--

INSERT INTO `users_level` (`id_users_level`, `users_level`, `users_level_key`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Programmer', 'programmer'),
(3, 'Manager', 'manager'),
(4, 'HRD', 'hrd'),
(5, 'SHE', 'she'),
(6, 'Pengawas', 'pengawas'),
(7, 'Checker', 'checker'),
(8, 'Keuangan', 'keuangan'),
(9, 'Plant', 'plant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
 ADD PRIMARY KEY (`id_main`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`id_permission`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
 ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_users`), ADD KEY `id_users_level` (`id_users_level`);

--
-- Indexes for table `users_level`
--
ALTER TABLE `users_level`
 ADD PRIMARY KEY (`id_users_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
MODIFY `id_main` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_level`
--
ALTER TABLE `users_level`
MODIFY `id_users_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
