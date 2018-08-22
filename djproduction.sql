-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2017 at 02:11 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djproduction`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_afiliasi`
--

CREATE TABLE `tb_afiliasi` (
  `idafiliasi` int(10) UNSIGNED NOT NULL,
  `tgl` date DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8_unicode_ci,
  `file1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastupdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kdtampil` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_afiliasi`
--

INSERT INTO `tb_afiliasi` (`idafiliasi`, `tgl`, `judul`, `isi`, `file1`, `lastupdate`, `kdtampil`) VALUES
(1, '2014-03-20', 'IBCBet', '<p><br />\r\n<span style="color:rgb(46, 49, 49)">Dengan memperoleh lisensesi dari first Cagayan leisure and resort corporation menjadikan IBCbet sebagai salah satu perusahaan besar dalam bisnis betting online asia-eropa. Dengan pelayanan yang memuaskan IBCbet menjadi perusahaan yang berkembang dan ber-skala internasional.</span></p>\r\n', '25042014220655_ibcbet.jpg', '2014-04-25 22:14:23 sabet', 1),
(2, '2014-03-25', 'SBOBet Casino', '<p><br />\r\n<span style="color:rgb(46, 49, 49)">Casino online dengan live online streaming yang merupakan salah satu produk dari SBOBET. Kenyaman dalam bermain menjadi visi dari perusahaan sehingga kami menawarkan real time dengan live time dealer untuk merasakan sensasi berada di kasino dan multi player agar pemain dapat merasakan pengalaman yang baru dalam betting online casino.</span></p>\r\n', '25042014220615_sbocasino.jpg', '2014-04-25 22:15:07 sabet', 1),
(3, '2014-03-25', 'SBOBet Sportbook', '<p><br />\r\n<span style="color:rgb(46, 49, 49); line-height:1.6">Sbobet adalah perusahan betting online terbesar dan terpecaya khusus nya untuk kawasan asia dan eropa. Dengan memperoleh penghargaan sebagai asian the best operator award pada tahun 2009 dan 2010 membuktikan bahwa sbobet layak sebagai perusahaan yang ber-skala internasional. Dengan menghadirkan lebih dari 500 even pertandingan sbobet sebagai salah satu penyedia fasilitas betting online terbesar di dunia.</span></p>\r\n', '25042014220520_sportbook.jpg', '2014-04-25 22:13:15 sabet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `idbank` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`idbank`, `nama`) VALUES
(1, 'BCA'),
(2, 'Bank Mandiri'),
(3, 'BNI'),
(4, 'BRI'),
(5, 'CIMB Niaga'),
(6, 'Bank Permata');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `idbanner` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kdtampil` tinyint(1) NOT NULL DEFAULT '0',
  `urut` int(11) NOT NULL DEFAULT '1',
  `file1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`idbanner`, `judul`, `url`, `kdtampil`, `urut`, `file1`) VALUES
(1, 'Gabung Djudi.com', 'http://localhost:8081/djcom/index.php?m=register&id=S00001', 1, 1, '25042014222416_iklan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `idberita` int(10) UNSIGNED NOT NULL,
  `tgl` date DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8_unicode_ci,
  `file1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastupdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kdtampil` tinyint(1) NOT NULL DEFAULT '0',
  `seokeyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seodescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`idberita`, `tgl`, `judul`, `isi`, `file1`, `lastupdate`, `kdtampil`, `seokeyword`, `seodescription`) VALUES
(1, '2014-03-19', 'Ini Analisa yang Mendasari Pengumuman MH370 Berakhir di Samudera Hindia', '<p>Pengumuman pesawat MAS MH370 berakhir di Samudera Hindia didasari data satelit Inmarsat yang diperkuat analisa ahli. Sebenarnya bagaimana analisa data tersebut hingga memicu keyakinan Malaysia?</p>\r\n', '19032014201440_2ea099180ef393746f95b2f1ed6dd9b15af03088.jpg', '2014-03-25 19:00:44 admin', 1, NULL, NULL),
(2, '2014-03-25', 'Kepala BPH Migas Tidak Tahu Banyak Soal RFID', '<p>BPH Migas tidak mengetahui perkembangan RFID. Pasalnya Pertamina tidak pernah menyampaikan hal tersebut secara resmi kepada lembaga tersebut.</p>\r\n', '25032014190154_39812208_300x300_1.jpg', '2014-03-25 19:01:54 admin', 1, NULL, NULL),
(3, '2014-03-25', 'Kemlu Fasilitasi Keluarga Penumpang MH370 yang ke Malaysia dan Perth', '<p>Pemerintah Indonesia melalui Kementerian Luar Negeri akan memfasilitasi perwakilan keluarga pesawat Malaysia Airlines MH370 yang akan ke Malaysia dan Perth menyusul pengumuman pesawat jatuh di Samudera Hindia.</p>\r\n', '25032014190223_babyface.jpg', '2014-03-25 19:02:23 admin', 1, NULL, NULL),
(4, '2014-03-25', 'Benda Mirip Bagian Pesawat di Palangkaraya Akhirnya Diamankan Polisi', '<p>Benda mirip bagian pesawat yang ditemukan di Palangkaraya, Kalimantan Tengah (Kalteng), akhirnya diamankan polisi. Belum bisa dipastikan apakah benda tersebut merupakan bagian pesawat atau bukan.oh ya</p>\r\n', '25032014190252_1233219864_folderir5.jpg', '2014-04-11 01:14:20 admin', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `idcontact` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) UNSIGNED NOT NULL,
  `tgl` datetime DEFAULT NULL,
  `iphost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `komentar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cs`
--

CREATE TABLE `tb_cs` (
  `idcs` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_cs`
--

INSERT INTO `tb_cs` (`idcs`, `nama`, `yahoo`) VALUES
(1, 'Agung Ajah', 'gungp720');

-- --------------------------------------------------------

--
-- Table structure for table `tb_email_template`
--

CREATE TABLE `tb_email_template` (
  `idemailtemplate` int(10) UNSIGNED NOT NULL,
  `emailuntuk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8_unicode_ci,
  `isitext` text COLLATE utf8_unicode_ci,
  `strvjudul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strvisi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastupdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_email_template`
--

INSERT INTO `tb_email_template` (`idemailtemplate`, `emailuntuk`, `judul`, `isi`, `isitext`, `strvjudul`, `strvisi`, `lastupdate`) VALUES
(1, 'Email Registrasi', 'Pendaftaran Anda di ||webtitle||', '<p>Hallo ||nama||,</p>\r\n\r\n<p>Anda telah melakukan pendaftaran di website kami ||webtitle||, detailnya sebagai berikut:</p>\r\n\r\n<p>Sponsor: ||sponsor||<br />\r\nEmail: ||email||<br />\r\nPassword: ||password||<br />\r\nNama: ||nama||<br />\r\nTelp 1: ||telp||<br />\r\nBBM: ||bbm||</p>\r\n\r\n<p>Untuk mengaktifkan user Anda diwebsite kami silahkan klik link berikut untuk konfirmasi <a href="||urlkonfirmasi||">||urlkonfirmasi||</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Best Regards</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Team ||webtitle||</p>\r\n', 'Hallo ||nama||,\r\n\r\nAnda telah melakukan pendaftaran di website kami ||webtitle||, detailnya sebagai berikut:\r\n\r\nSponsor: ||sponsor||\r\nEmail: ||email||\r\nPassword: ||password||\r\nNama: ||nama||\r\nTelp 1: ||telp||\r\nBBM: ||bbm||\r\n\r\nUntuk mengaktifkan user Anda diwebsite kami silahkan klik link berikut untuk konfirmasi ||urlkonfirmasi||\r\n\r\nBest Regards\r\n\r\n\r\nTeam ||webtitle||', '||webtitle||', '||sponsor||, ||nama||, ||email||, ||password||, ||webtitle||, ||telp||, ||bbm||, ||urlkonfirmasi||', '2014-04-19 15:19:28 admin'),
(2, 'Email Registrasi untuk Upline', 'Pendaftaran Downline di ||webtitle||', '<p>Hallo ||namaupline||,</p>\r\n\r\n<p>Ada yang telah melakukan pendaftaran di website ||webtitle|| sebagai downline Anda,&nbsp;detailnya sebagai berikut:</p>\r\n\r\n<p>Email: ||email||<br />\r\nNama: ||nama||<br />\r\nTelp 1: ||telp||<br />\r\nBBM: ||bbm||</p>\r\n\r\n<p>Best Regards</p>\r\n\r\n<p>Team ||webtitle||</p>\r\n', 'Hallo ||namaupline||,\r\n\r\nAda yang telah melakukan pendaftaran di website ||webtitle|| sebagai downline Anda, detailnya sebagai berikut:\r\n\r\nEmail: ||email||\r\nNama: ||nama||\r\nTelp 1: ||telp||\r\nBBM: ||bbm||\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||namaupline||, ||email||, ||nama||, ||telp||, ||bbm||, ||webtitle||', '2014-04-20 15:26:25 admin'),
(3, 'Email untuk forget password member', '[Lupa Password] ||webtitle||', '<p>Hallo ||nama||,</p>\r\n\r\n<p>Anda telah melakukan request forget password, berikut detailnya:</p>\r\n\r\n<p>Username: ||email||<br />\r\nNew Password: ||newpassword||</p>\r\n\r\n<p>Klik link berikut atau copy paste ke browser Anda untuk mengaktifkan password baru Anda: <a href="||linkkonfirmasi||">||linkkonfirmasi||</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Best Regards</p>\r\n\r\n<p>Team ||webtitle||</p>\r\n', 'Hallo ||nama||,\r\n\r\nAnda telah melakukan request forget password, berikut detailnya:\r\n\r\nUsername: ||email||\r\nNew Password: ||newpassword||\r\n\r\nKlik link berikut atau copy paste ke browser Anda untuk mengaktifkan password baru Anda: ||linkkonfirmasi||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||nama||, ||email||, ||newpassword||, ||linkkonfirmasi||, ||webtitle||', '2014-04-20 17:57:34 admin'),
(4, 'New Deposit untuk RMI', '[New Deposit] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>Ada new deposit baru, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal: ||tgl||<br />\r\nProduk: ||produk||<br />\r\nJumlah: ||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team ||webtitle||</p>\r\n', 'Hallo,\r\n\r\nAda new deposit baru, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:36:17 admin'),
(5, 'Deposit untuk RMI', '[Deposit] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>Ada deposit baru, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo,\r\n\r\nAda deposit baru, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:36:33 admin'),
(6, 'Withdraw untuk Settlement', '[Withdraw] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>Ada withdraw baru, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo,\r\n\r\nAda withdraw baru, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:37:03 admin'),
(7, 'Transfer untuk Settlement', '[Transfer] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>Ada transfer baru, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nProduk Tujuan:&nbsp;||produk_tujuan||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo,\r\n\r\nAda transfer baru, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nProduk Tujuan: ||produk_tujuan||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||produk_tujuan||, ||jumlah||, ||webtitle||', '2014-04-19 15:37:43 admin'),
(8, 'New Deposit dari RMI ke Settlement', '[New Deposit] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>New Deposit baru telah dikonfirmasi oleh RMI, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo,\r\n\r\nNew Deposit baru telah dikonfirmasi oleh RMI, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:38:55 admin'),
(9, 'Deposit dari RMI ke Settlement', '[Deposit] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>Deposit baru telah dikonfirmasi oleh RMI, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo,\r\n\r\nDeposit baru telah dikonfirmasi oleh RMI, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:39:17 admin'),
(10, 'Withdraw dariSettlement untuk RMO', '[Withdraw] ||webtitle||', '<p>Hallo,</p>\r\n\r\n<p>Withdraw baru telah dikonfirmasi oleh Settlement, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo,\r\n\r\nWithdraw baru telah dikonfirmasi oleh Settlement, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:40:23 admin'),
(11, 'Withdraw dari RMO untuk member', '[Withdraw] ||webtitle||', '<p>Hallo ||namamember||,</p>\r\n\r\n<p>Withdraw Anda telah selesai diproses, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo ||namamember||,\r\n\r\nWithdraw Anda telah selesai diproses, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||namamember||, ||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:41:09 admin'),
(12, 'Transfer dari Settlement ke member', '[Transfer] ||webtitle||', '<p>Hallo ||namamember||,</p>\r\n\r\n<p>Transfer Anda telah selesai diproses, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nProduk Tujuan:&nbsp;||produk_tujuan||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo ||namamember||,\r\n\r\nTransfer Anda telah selesai diproses, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nProduk Tujuan: ||produk_tujuan||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||namamember||, ||tgl||, ||produk||, ||produk_tujuan||, ||jumlah||, ||webtitle||', '2014-04-20 21:02:09 admin'),
(13, 'New Deposit dari Settlement ke member', '[New Deposit] ||webtitle||', '<p>Hallo ||namamember||,</p>\r\n\r\n<p>New Deposit Anda telah selesai diproses, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||<br />\r\nAccount: ||account||<br />\r\nPassword: ||accountpassword||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo ||namamember||,\r\n\r\nNew Deposit Anda telah selesai diproses, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\nAccount: ||account||\r\nPassword: ||accountpassword||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||namamember||, ||tgl||, ||produk||, ||jumlah||, ||produk_account||, ||produk_password||,||webtitle||', '2014-04-20 21:08:32 admin'),
(14, 'Deposit dari Settlement ke member', '[Deposit] ||webtitle||', '<p>Hallo ||namamember||,</p>\r\n\r\n<p>Deposit Anda telah selesai diproses, detailnya sebagai berikut:</p>\r\n\r\n<p>Tanggal:&nbsp;||tgl||<br />\r\nProduk:&nbsp;||produk||<br />\r\nJumlah:&nbsp;||jumlah||</p>\r\n\r\n<p><br />\r\nBest Regards</p>\r\n\r\n<p>Team&nbsp;||webtitle||</p>\r\n', 'Hallo ||namamember||,\r\n\r\nDeposit Anda telah selesai diproses, detailnya sebagai berikut:\r\n\r\nTanggal: ||tgl||\r\nProduk: ||produk||\r\nJumlah: ||jumlah||\r\n\r\n\r\nBest Regards\r\n\r\nTeam ||webtitle||', '||webtitle||', '||namamember||, ||tgl||, ||produk||, ||jumlah||, ||webtitle||', '2014-04-19 15:42:43 admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_marquee`
--

CREATE TABLE `tb_marquee` (
  `idmarquee` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kdtampil` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_marquee`
--

INSERT INTO `tb_marquee` (`idmarquee`, `judul`, `url`, `kdtampil`) VALUES
(1, 'Test berita berjalan ini dipersembahkan oleh afiliasi beberapa merk ternama ...', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `idmember` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bbm` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idbank` int(10) UNSIGNED DEFAULT NULL,
  `namarek` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `norek` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bitly` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `kdaktif` tinyint(1) NOT NULL DEFAULT '0',
  `cppasswd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpsesi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idupline` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`idmember`, `email`, `passwd`, `nama`, `telp1`, `telp2`, `bbm`, `idbank`, `namarek`, `norek`, `alamat`, `bitly`, `regdate`, `kdaktif`, `cppasswd`, `cpsesi`, `idupline`) VALUES
(1, 'toecashman@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Master', '+6591644198', '+6591644198', '21FECA82', 6, 'Master', '1112223333', 'Singapore', 'http://bit.ly/1iebae4', '2014-03-31 09:28:49', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `idmenu` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`idmenu`, `nama`, `file`) VALUES
(1, 'Afiliasi', 'afiliasi'),
(2, 'Berita', 'news'),
(3, 'Banner Slider', 'slider'),
(4, 'Banner Iklan', 'banner'),
(5, 'Berita Jalan', 'marquee'),
(6, 'Customer Support', 'cs'),
(7, 'List Bank', 'bank'),
(8, 'Email Template', 'emailtpl'),
(9, 'List Member', 'member'),
(10, 'List Transaksi', 'translist'),
(11, 'RMI: New Deposit', 'rmindepo&kd=1'),
(12, 'RMI: Deposit ', 'rmindepo&kd=2'),
(13, 'RMO: Withdraw', 'rmowithd'),
(14, 'Settlement: New Deposit', 'settndepo&kd=1'),
(15, 'Settlement: Deposit', 'settndepo&kd=2'),
(16, 'Settlement: Withdraw', 'settwithd'),
(17, 'Settlement: Transfer', 'setttransf'),
(18, 'Admin: User', 'user'),
(19, 'Admin: Group', 'group'),
(20, 'Admin: Menu Group', 'mgroup'),
(21, 'Admin: Transaction List', 'admtranslist');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_level`
--

CREATE TABLE `tb_menu_level` (
  `idmenulevel` int(10) UNSIGNED NOT NULL,
  `idlevel` int(10) UNSIGNED NOT NULL,
  `idmenu` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_menu_level`
--

INSERT INTO `tb_menu_level` (`idmenulevel`, `idlevel`, `idmenu`) VALUES
(90, 1, 21),
(89, 1, 20),
(88, 1, 19),
(87, 1, 18),
(86, 1, 17),
(85, 1, 16),
(84, 1, 15),
(83, 1, 14),
(82, 1, 13),
(81, 1, 12),
(80, 1, 11),
(79, 1, 10),
(78, 1, 9),
(77, 1, 8),
(76, 1, 7),
(75, 1, 6),
(74, 1, 5),
(73, 1, 4),
(22, 2, 12),
(21, 2, 11),
(72, 1, 3),
(71, 1, 2),
(43, 3, 13),
(44, 4, 14),
(45, 4, 15),
(46, 4, 16),
(47, 4, 17),
(48, 5, 10),
(70, 1, 1),
(92, 6, 2),
(93, 7, 1),
(94, 7, 3),
(95, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `idslider` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kdtampil` tinyint(1) NOT NULL DEFAULT '0',
  `urut` int(11) NOT NULL DEFAULT '1',
  `file1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`idslider`, `judul`, `url`, `kdtampil`, `urut`, `file1`) VALUES
(1, 'Banner promo1', '', 1, 1, '25042014215004_banner1.jpg'),
(2, 'Banner Promo2', '', 1, 2, '25042014215056_banner2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans`
--

CREATE TABLE `tb_trans` (
  `idtrans` int(10) UNSIGNED NOT NULL,
  `idmember` int(10) UNSIGNED NOT NULL,
  `idafiliasi` int(10) UNSIGNED NOT NULL,
  `parenttrans` int(10) UNSIGNED DEFAULT NULL,
  `amount` double NOT NULL,
  `iphost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl` datetime NOT NULL,
  `idbank` int(10) UNSIGNED NOT NULL,
  `namarek` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `norek` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idstatus` int(10) UNSIGNED NOT NULL,
  `idstatusrmi` int(10) UNSIGNED NOT NULL,
  `idstatussettlement` int(10) UNSIGNED NOT NULL,
  `idtranskode` int(10) UNSIGNED NOT NULL,
  `lastupdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_trans`
--

INSERT INTO `tb_trans` (`idtrans`, `idmember`, `idafiliasi`, `parenttrans`, `amount`, `iphost`, `tgl`, `idbank`, `namarek`, `norek`, `idstatus`, `idstatusrmi`, `idstatussettlement`, `idtranskode`, `lastupdate`) VALUES
(1, 1, 2, 0, 500000, '36.69.79.79', '2014-04-07 11:01:51', 1, 'Hanung Bram', '1234567890', 2, 2, 2, 1, '2014-04-07 15:57:02 by admin'),
(2, 1, 3, 0, 300000, '36.69.79.79', '2014-04-07 11:02:07', 1, 'Hanung Bram', '1234567890', 2, 2, 2, 1, '2014-04-07 13:31:10 by admin'),
(3, 1, 3, 2, 750000, '36.69.79.79', '2014-04-07 13:49:03', 1, 'Hanung Bram', '1234567890', 2, 2, 2, 2, '2014-04-07 14:03:12 by admin'),
(4, 1, 3, 2, 200000, '36.69.79.79', '2014-04-07 14:23:59', 1, 'Hanung Bram', '1234567890', 2, 2, 2, 3, '2014-04-07 15:14:13 by admin'),
(5, 1, 2, 1, 100000, '36.69.79.79', '2014-04-07 15:57:55', 0, NULL, NULL, 2, 2, 2, 4, '2014-04-07 16:14:30 by admin'),
(6, 3, 2, 0, 100000, '114.4.23.37', '2014-04-09 14:11:51', 7, 'Dudut', '01982773', 1, 1, 1, 1, '2014-04-09 14:11:51 by briezieck@yahoo.com'),
(7, 4, 2, 0, 300000, '114.79.13.23', '2014-04-11 01:23:44', 1, 'hul', '123777778', 1, 1, 1, 1, '2014-04-11 01:23:44 by toecashman@yahoo.com'),
(8, 1, 2, 0, 800000, '36.69.79.57', '2014-04-15 12:56:09', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-15 12:56:09 by gungp720@yahoo.com'),
(9, 1, 2, 0, 900000, '36.69.79.57', '2014-04-15 12:58:40', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-15 12:58:40 by gungp720@yahoo.com'),
(10, 1, 2, 0, 900000, '36.69.79.57', '2014-04-15 12:59:42', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-15 12:59:42 by gungp720@yahoo.com'),
(11, 1, 2, 0, 900000, '36.69.79.57', '2014-04-15 13:00:26', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-15 13:00:26 by gungp720@yahoo.com'),
(12, 1, 2, 0, 900000, '36.69.79.57', '2014-04-15 13:01:17', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-15 13:01:17 by gungp720@yahoo.com'),
(13, 1, 2, 0, 900000, '36.69.79.57', '2014-04-15 13:10:43', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-15 13:10:43 by gungp720@yahoo.com'),
(14, 1, 1, 0, 750000, '36.69.72.123', '2014-04-19 10:30:51', 2, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 1, '2014-04-19 10:30:51 by gungp720@yahoo.com'),
(15, 1, 3, 0, 850000, '36.69.72.123', '2014-04-19 10:41:48', 2, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 1, '2014-04-19 10:43:40 by setest'),
(16, 1, 3, 15, 125000, '36.69.72.123', '2014-04-19 10:46:04', 2, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 2, '2014-04-19 10:47:55 by setest'),
(17, 1, 3, 15, 70000, '36.69.72.123', '2014-04-19 10:52:17', 6, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 3, '2014-04-19 10:59:20 by rmotest'),
(18, 1, 3, 15, 55000, '36.69.72.123', '2014-04-19 11:00:28', 6, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 3, '2014-04-19 11:00:28 by gungp720@yahoo.com'),
(19, 1, 3, 15, 60000, '36.69.72.123', '2014-04-19 11:10:26', 6, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 3, '2014-04-19 11:13:02 by rmotest'),
(20, 1, 3, 15, 60005, '36.69.72.123', '2014-04-19 11:20:50', 0, NULL, NULL, 2, 2, 2, 4, '2014-04-19 11:22:23 by setest'),
(21, 9, 2, 0, 60000, '36.69.64.222', '2014-04-20 18:02:37', 3, 'Siapakah saya?', '1000999877987', 2, 2, 2, 1, '2014-04-20 21:05:15 by setest'),
(22, 1, 3, 15, 65000, '36.69.64.222', '2014-04-20 20:38:27', 6, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 2, '2014-04-20 21:10:22 by setest'),
(23, 1, 3, 15, 50000, '36.69.64.222', '2014-04-20 20:42:10', 6, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 3, '2014-04-20 20:42:10 by gungp720@yahoo.com'),
(24, 1, 3, 15, 50000, '36.69.64.222', '2014-04-20 20:42:33', 6, 'Hanung Bramxxxx', '1234567890x', 1, 1, 1, 3, '2014-04-20 20:42:33 by gungp720@yahoo.com'),
(25, 1, 3, 15, 50000, '36.69.64.222', '2014-04-20 20:43:24', 6, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 3, '2014-04-20 20:58:17 by rmotest'),
(26, 1, 3, 15, 60000, '36.69.64.222', '2014-04-20 20:45:56', 0, NULL, NULL, 2, 2, 2, 4, '2014-04-20 21:01:21 by setest'),
(27, 1, 2, 0, 87000, '36.69.64.222', '2014-04-20 21:12:00', 6, 'Hanung Bramxxxx', '1234567890x', 2, 2, 2, 1, '2014-04-20 21:13:26 by admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_account`
--

CREATE TABLE `tb_trans_account` (
  `idtransaccount` int(10) UNSIGNED NOT NULL,
  `idtrans` int(10) UNSIGNED NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastupdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_trans_account`
--

INSERT INTO `tb_trans_account` (`idtransaccount`, `idtrans`, `account`, `passwd`, `lastupdate`) VALUES
(2, 2, 'testakun', 'testpassword', '2014-04-07 13:31:10 by admin'),
(3, 1, 'testakun2', 'testpassword2', '2014-04-07 15:57:02 by admin'),
(4, 15, 'testakun3', 'password', '2014-04-19 10:43:40 by setest'),
(5, 21, 'testakun4', 'password', '2014-04-20 21:05:15 by setest'),
(6, 27, 'testakun5', 'test', '2014-04-20 21:13:26 by admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_kode`
--

CREATE TABLE `tb_trans_kode` (
  `idtranskode` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_trans_kode`
--

INSERT INTO `tb_trans_kode` (`idtranskode`, `kode`) VALUES
(1, 'New Deposit'),
(2, 'Deposit'),
(3, 'Withdraw'),
(4, 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_status`
--

CREATE TABLE `tb_trans_status` (
  `idstatus` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_trans_status`
--

INSERT INTO `tb_trans_status` (`idstatus`, `status`) VALUES
(1, 'Diproses'),
(2, 'Selesai'),
(3, 'Batal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_status_admin`
--

CREATE TABLE `tb_trans_status_admin` (
  `idstatusadmin` int(10) UNSIGNED NOT NULL,
  `statusadmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_trans_status_admin`
--

INSERT INTO `tb_trans_status_admin` (`idstatusadmin`, `statusadmin`) VALUES
(1, 'Pending'),
(2, 'OK'),
(3, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans_transfer`
--

CREATE TABLE `tb_trans_transfer` (
  `idtranstransfer` int(10) UNSIGNED NOT NULL,
  `idtrans` int(10) UNSIGNED NOT NULL,
  `idafiliasito` int(10) UNSIGNED NOT NULL,
  `idtransto` int(10) UNSIGNED NOT NULL,
  `lastupdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_trans_transfer`
--

INSERT INTO `tb_trans_transfer` (`idtranstransfer`, `idtrans`, `idafiliasito`, `idtransto`, `lastupdate`) VALUES
(1, 5, 3, 2, '2014-04-07 15:57:55 by gungp720@yahoo.com'),
(2, 20, 2, 1, '2014-04-19 11:20:50 by gungp720@yahoo.com'),
(3, 26, 3, 2, '2014-04-20 20:45:56 by gungp720@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idlevel` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `username`, `passwd`, `idlevel`, `nama`, `email`, `regdate`, `lastupdate`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Administrator', 'gungp720@yahoo.com', '2012-09-29 15:01:00', '2012-10-02 12:25:46'),
(2, 'rmitest', '098f6bcd4621d373cade4e832627b4f6', 2, 'RMI', 'gungp720@yahoo.com', '2014-04-09 14:35:42', NULL),
(3, 'rmotest', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'Test RMO', 'gungp720@yahoo.com', '2014-04-19 09:39:09', NULL),
(4, 'setest', '5f4dcc3b5aa765d61d8327deb882cf99', 4, 'Settlement Test', 'gungp720@yahoo.com', '2014-04-19 09:39:38', NULL),
(5, 'sabet', 'dc0fc028d376bf26d427839646b467c7', 7, 'Grafis Desain', 'gengsabet@gmail.com', '2014-04-25 21:30:41', '2014-04-25 21:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_level`
--

CREATE TABLE `tb_user_level` (
  `idlevel` int(10) UNSIGNED NOT NULL,
  `level` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user_level`
--

INSERT INTO `tb_user_level` (`idlevel`, `level`) VALUES
(1, 'Administrator'),
(2, 'RMI'),
(3, 'RMO'),
(4, 'Settlement'),
(5, 'Report'),
(6, 'News'),
(7, 'Grafis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_afiliasi`
--
ALTER TABLE `tb_afiliasi`
  ADD PRIMARY KEY (`idafiliasi`),
  ADD KEY `kdtampil` (`kdtampil`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`idbank`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`idbanner`),
  ADD KEY `kdtampil` (`kdtampil`,`urut`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`idberita`),
  ADD KEY `kdtampil` (`kdtampil`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`idcontact`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_cs`
--
ALTER TABLE `tb_cs`
  ADD PRIMARY KEY (`idcs`);

--
-- Indexes for table `tb_email_template`
--
ALTER TABLE `tb_email_template`
  ADD PRIMARY KEY (`idemailtemplate`);

--
-- Indexes for table `tb_marquee`
--
ALTER TABLE `tb_marquee`
  ADD PRIMARY KEY (`idmarquee`),
  ADD KEY `kdtampil` (`kdtampil`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`idmember`),
  ADD KEY `email` (`email`),
  ADD KEY `passwd` (`passwd`),
  ADD KEY `kdaktif` (`kdaktif`),
  ADD KEY `cppasswd` (`cppasswd`),
  ADD KEY `cpsesi` (`cpsesi`),
  ADD KEY `idupline` (`idupline`),
  ADD KEY `idbank` (`idbank`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `tb_menu_level`
--
ALTER TABLE `tb_menu_level`
  ADD PRIMARY KEY (`idmenulevel`),
  ADD KEY `idlevel` (`idlevel`,`idmenu`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`idslider`),
  ADD KEY `kdtampil` (`kdtampil`,`urut`);

--
-- Indexes for table `tb_trans`
--
ALTER TABLE `tb_trans`
  ADD PRIMARY KEY (`idtrans`),
  ADD KEY `idmember` (`idmember`,`idafiliasi`,`tgl`,`idstatus`),
  ADD KEY `parentafiliasi` (`parenttrans`),
  ADD KEY `idbank` (`idbank`),
  ADD KEY `idtranskode` (`idtranskode`),
  ADD KEY `idstatusadmin` (`idstatusrmi`),
  ADD KEY `idstatussettlement` (`idstatussettlement`);

--
-- Indexes for table `tb_trans_account`
--
ALTER TABLE `tb_trans_account`
  ADD PRIMARY KEY (`idtransaccount`),
  ADD KEY `idtrans` (`idtrans`);

--
-- Indexes for table `tb_trans_kode`
--
ALTER TABLE `tb_trans_kode`
  ADD PRIMARY KEY (`idtranskode`);

--
-- Indexes for table `tb_trans_status`
--
ALTER TABLE `tb_trans_status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `tb_trans_status_admin`
--
ALTER TABLE `tb_trans_status_admin`
  ADD PRIMARY KEY (`idstatusadmin`);

--
-- Indexes for table `tb_trans_transfer`
--
ALTER TABLE `tb_trans_transfer`
  ADD PRIMARY KEY (`idtranstransfer`),
  ADD KEY `idtrans` (`idtrans`,`idafiliasito`,`idtransto`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `username` (`username`,`passwd`),
  ADD KEY `idlevel` (`idlevel`);

--
-- Indexes for table `tb_user_level`
--
ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`idlevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_afiliasi`
--
ALTER TABLE `tb_afiliasi`
  MODIFY `idafiliasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `idbank` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `idbanner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `idberita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `idcontact` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_cs`
--
ALTER TABLE `tb_cs`
  MODIFY `idcs` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_email_template`
--
ALTER TABLE `tb_email_template`
  MODIFY `idemailtemplate` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_marquee`
--
ALTER TABLE `tb_marquee`
  MODIFY `idmarquee` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `idmember` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_menu_level`
--
ALTER TABLE `tb_menu_level`
  MODIFY `idmenulevel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `idslider` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_trans`
--
ALTER TABLE `tb_trans`
  MODIFY `idtrans` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_trans_account`
--
ALTER TABLE `tb_trans_account`
  MODIFY `idtransaccount` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_trans_kode`
--
ALTER TABLE `tb_trans_kode`
  MODIFY `idtranskode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_trans_status`
--
ALTER TABLE `tb_trans_status`
  MODIFY `idstatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_trans_status_admin`
--
ALTER TABLE `tb_trans_status_admin`
  MODIFY `idstatusadmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_trans_transfer`
--
ALTER TABLE `tb_trans_transfer`
  MODIFY `idtranstransfer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user_level`
--
ALTER TABLE `tb_user_level`
  MODIFY `idlevel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
