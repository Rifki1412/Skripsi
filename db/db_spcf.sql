-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 11:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spcf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `pertanyaan`, `jawaban`, `nama_lengkap`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Apa Makanan Favorit Anda?', 'bb9f601ba081ab8d336a14a697048cb0', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `kode_gejala` int(11) NOT NULL,
  `mb` double(11,1) NOT NULL,
  `md` double(11,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `kode_penyakit`, `kode_gejala`, `mb`, `md`) VALUES
(1, 1, 1, 0.9, 0.0),
(2, 1, 2, 0.8, 0.0),
(3, 1, 20, 0.8, 0.2),
(4, 1, 9, 0.8, 0.0),
(5, 1, 11, 0.7, 0.2),
(6, 1, 16, 0.7, 0.0),
(7, 1, 6, 0.4, 0.0),
(8, 2, 4, 0.9, 0.0),
(9, 2, 10, 0.8, 0.0),
(10, 2, 5, 0.6, 0.0),
(11, 2, 30, 0.6, 0.0),
(12, 2, 18, 0.4, 0.0),
(13, 3, 7, 0.8, 0.0),
(14, 3, 32, 0.6, 0.2),
(15, 3, 8, 0.9, 0.0),
(16, 4, 21, 0.7, 0.0),
(17, 4, 4, 0.7, 0.0),
(18, 4, 14, 0.7, 0.0),
(19, 4, 22, 0.8, 0.0),
(20, 4, 13, 0.8, 0.0),
(21, 5, 15, 0.9, 0.0),
(22, 5, 19, 0.9, 0.0),
(23, 7, 17, 0.9, 0.0),
(24, 7, 25, 0.8, 0.0),
(25, 7, 23, 0.6, 0.0),
(26, 6, 31, 0.9, 0.0),
(27, 6, 25, 0.6, 0.0),
(28, 6, 26, 0.8, 0.0),
(29, 6, 3, 0.9, 0.0),
(30, 6, 29, 0.9, 0.0),
(31, 6, 30, 0.7, 0.0),
(32, 6, 27, 0.5, 0.0),
(33, 8, 1, 0.9, 0.0),
(34, 8, 2, 0.8, 0.0),
(35, 8, 12, 0.4, 0.0),
(36, 9, 24, 0.9, 0.2),
(37, 9, 1, 0.8, 0.0),
(38, 9, 2, 0.8, 0.0),
(39, 9, 28, 0.5, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
(1, 'Buah menjadi busuk dan lunak'),
(2, 'Buah sering berguguran'),
(3, 'Daun terlihat ada seperti serbuk putih'),
(4, 'Daun terlihat berlubang-lubang dan keriting'),
(5, 'Permukaan daun berubah menjadi warna kuning'),
(6, 'Rasa buah tidak manis'),
(7, 'Daun menggulung'),
(8, 'Daun menjadi rusak karena digerogoti'),
(9, 'Buah menjadi kecoklatan'),
(10, 'Daun Sering Berguguran'),
(11, 'Pada biji buah terdapat bintik-bintik berwarna kehitaman'),
(12, 'Kulit buah terlihat terkelupas'),
(13, 'Pada dahan terlihat berlubang'),
(14, 'Pada daun terdapat kutil-kutil menggembung'),
(15, 'Pertumbuhan tanaman terhambat'),
(16, 'Buah mengering'),
(17, 'Batang Berlubang'),
(18, 'Daun mengering'),
(19, 'Tanaman menjadi layu'),
(20, 'Kulit luar buah terdapat lubang kecil sehingga kulit buah tidak mulus'),
(21, 'Pada permukaan daun terdapat benang-benang halus seperti sarang laba-laba'),
(22, 'Pada batang terdapat benang-benang halus seperti sarang laba-laba'),
(23, 'Batang terlihat mengeluarkan getah'),
(24, 'Daun memiliki bercak berwarna hitam pada daun-daun tua'),
(25, 'Kulit batang terlihat terkelupas'),
(26, 'Pucuk daun menjadi kecil dan keriput'),
(27, 'Buah menjadi kerdil'),
(28, 'Tunas mengering dan mati'),
(29, 'Pada batang terlihat ada seperti serbuk putih '),
(30, 'Daun mengkerut'),
(31, 'Tanaman sudah mulai gundul'),
(32, 'Daun tidak lagi berwarna hijau dan buram');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL DEFAULT '0',
  `penyakit` text NOT NULL,
  `gejala` text NOT NULL,
  `hasil_id` int(11) NOT NULL,
  `hasil_nilai` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `penyakit`, `gejala`, `hasil_id`, `hasil_nilai`) VALUES
(14, '2021-12-24 16:18:41', 'a:3:{i:1;s:6:"0.9000";i:9;s:6:"0.8000";i:8;s:6:"0.8000";}', 'a:1:{i:1;s:1:"1";}', 1, '0.9000'),
(13, '2021-12-23 14:53:11', 'a:3:{i:1;s:6:"0.9800";i:8;s:6:"0.9760";i:9;s:6:"0.9600";}', 'a:3:{i:1;s:1:"1";i:2;s:1:"1";i:12;s:1:"1";}', 1, '0.9800'),
(12, '2021-12-23 14:52:44', 'a:3:{i:1;s:6:"0.9640";i:8;s:6:"0.9568";i:9;s:6:"0.9280";}', 'a:3:{i:1;s:1:"1";i:2;s:1:"2";i:12;s:1:"1";}', 1, '0.9640'),
(11, '2021-12-23 14:51:08', 'a:3:{i:1;s:6:"0.9655";i:9;s:6:"0.8128";i:8;s:6:"0.8128";}', 'a:7:{i:1;s:1:"2";i:2;s:1:"3";i:6;s:1:"2";i:9;s:1:"1";i:11;s:1:"5";i:16;s:1:"2";i:20;s:1:"2";}', 1, '0.9655'),
(9, '2021-12-23 14:48:13', 'a:3:{i:9;s:6:"0.9600";i:8;s:6:"0.9600";i:1;s:6:"0.9490";}', 'a:7:{i:1;s:1:"1";i:2;s:1:"1";i:6;s:1:"4";i:9;s:1:"2";i:11;s:1:"5";i:16;s:1:"3";i:20;s:1:"3";}', 9, '0.9600'),
(10, '2021-12-23 14:49:41', 'a:3:{i:1;s:6:"0.9999";i:9;s:6:"0.9600";i:8;s:6:"0.9600";}', 'a:7:{i:1;s:1:"1";i:2;s:1:"1";i:6;s:1:"1";i:9;s:1:"1";i:11;s:1:"1";i:16;s:1:"1";i:20;s:1:"1";}', 1, '0.9999'),
(15, '2021-12-24 16:20:04', 'a:3:{i:1;s:6:"0.9000";i:8;s:6:"0.9000";i:9;s:6:"0.8000";}', 'a:1:{i:1;s:1:"1";}', 1, '0.9000'),
(16, '2021-12-24 16:20:26', 'a:4:{i:8;s:6:"0.9000";i:1;s:6:"0.9000";i:9;s:6:"0.8000";i:2;s:6:"0.6000";}', 'a:2:{i:1;s:1:"1";i:5;s:1:"1";}', 8, '0.9000'),
(17, '2021-12-24 16:21:31', 'a:3:{i:8;s:6:"0.9320";i:1;s:6:"0.9000";i:9;s:6:"0.8000";}', 'a:2:{i:1;s:1:"1";i:12;s:1:"2";}', 8, '0.9320'),
(18, '2021-12-24 16:21:58', 'a:3:{i:8;s:6:"0.9619";i:1;s:6:"0.9440";i:9;s:6:"0.9280";}', 'a:3:{i:1;s:1:"2";i:2;s:1:"1";i:12;s:1:"2";}', 8, '0.9619'),
(19, '2021-12-24 16:23:17', 'a:3:{i:9;s:6:"0.9664";i:8;s:6:"0.9440";i:1;s:6:"0.9440";}', 'a:3:{i:1;s:1:"2";i:2;s:1:"1";i:28;s:1:"2";}', 9, '0.9664'),
(20, '2021-12-24 16:43:30', 'a:3:{i:9;s:6:"0.9990";i:8;s:6:"0.9800";i:1;s:6:"0.9800";}', 'a:4:{i:1;s:1:"1";i:2;s:1:"1";i:24;s:1:"1";i:28;s:1:"1";}', 9, '0.9990'),
(21, '2021-12-24 16:46:37', 'a:3:{i:9;s:6:"0.9905";i:8;s:6:"0.8096";i:1;s:6:"0.8096";}', 'a:4:{i:1;s:1:"2";i:2;s:1:"4";i:24;s:1:"1";i:28;s:1:"1";}', 9, '0.9905'),
(22, '2021-12-24 17:29:48', 'a:3:{i:9;s:6:"0.9980";i:8;s:6:"0.9800";i:1;s:6:"0.9800";}', 'a:4:{i:1;s:1:"1";i:2;s:1:"1";i:24;s:1:"1";i:28;s:1:"1";}', 9, '0.9980'),
(23, '2021-12-24 17:51:26', 'a:3:{i:1;s:6:"0.9800";i:8;s:6:"0.9800";i:9;s:6:"0.9244";}', 'a:4:{i:1;s:1:"1";i:2;s:1:"1";i:24;s:1:"1";i:28;s:1:"1";}', 1, '0.9800'),
(24, '2021-12-24 17:53:01', 'a:3:{i:9;s:6:"0.9916";i:8;s:6:"0.9800";i:1;s:6:"0.9800";}', 'a:4:{i:1;s:1:"1";i:2;s:1:"1";i:24;s:1:"1";i:28;s:1:"1";}', 9, '0.9916');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`, `ket`) VALUES
(1, 'Pasti ya', ''),
(2, 'Hampir pasti ya', ''),
(3, 'Kemungkinan besar ya', ''),
(4, 'Mungkin ya', ''),
(5, 'Tidak tahu', ''),
(6, 'Mungkin tidak', ''),
(7, 'Kemungkinan besar tidak', ''),
(8, 'Hampir pasti tidak', ''),
(9, 'Pasti tidak', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `det_penyakit` text NOT NULL,
  `srn_penyakit` text NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `det_penyakit`, `srn_penyakit`, `gambar`) VALUES
(1, 'Lalat Buah', '<ul><li style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Hama lalat tentunya akan menyerang buah di bandingkan dengan daunnya. Hama ini akan menyebabkan buah menjadi rontok dan membusuk.</li><li style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Hal ini terjadi karena lalat akan mengkontaminasi buah dengan menggunakan bakterinya. Buah yang terkena hama ini juga akan berubah menjadi coklat hingga menghitam.</li></ul>', '<ul><li style="margin-right: 0px;">1. Membungkus buah yang masih ada di pohon dengan\r\nplastik sewaktu masih pecah bunga. <o:p></o:p></li></ul>\r\n<ul><li style="margin-right: 0px;">2. Melakukan penyemprotan pestisida seperti\r\nPetrogenol, Alika. <o:p></o:p></li><li style="margin-right: 0px;">3. Membuat perangkap dari botol bekas untuk memancing dan menangkap lalat buah masuk yang berisi cairan Metil Eugenol. <o:p></o:p></li></ul><span style="line-height: 115%;">4. Memasang perangkap menggunakan lem.</span>', ''),
(2, 'Ulat Kupu-Kupu Gajah', '<ul><li style="text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Ulat kupu â€“ kupu gajah adalah hama yang memiliki bentuk seperti ulat dengan panjangnya kisaran 12 cm. Jenis ulat ini memiliki warna hijau yang kebiru â€“ biruan. Tekstur dari ulat ini adalah lunak dan sedikit gemuk. Biasanya hama ini akan bertelur pada tepi â€“ tepi daun serta kepompong yang menggantung daun.</li><li style="text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Daun jambu air akan terlihat berlubang â€“ lubang dikarenakan di makan oleh ulat. Pada jangka waktu yang cukup panjang daun ini akan mengalami kerutan, menguning dan mati.</li></ul>', '<ul><li style="margin-right: 0px;">1. Mengumpulkan telur, kepompong, dan ulat\r\nkupu-kupu gajah menjadi satu, lalu dibuang dan dibakar.</li></ul>\r\n<ul><li style="margin-right: 0px;">2. Bisa melakukan penyemprotan menggunakan pestisida\r\nnamun hal ini tidak disarankan.</li></ul>', ''),
(3, 'Ulat Pagoda (Pagodiella hekmeyeri)', '<ul><li style="text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Ulat penggoda cukup berbahaya bagi pertumbuhan jambu air. Pasalnya hama ini dapat membuat daun jambu air mengalami bopengan karena di makan. Meskipun demikian dampaknya tidak terlalu besar karena tanaman masih tetap berbuah meskipunhanya sedikit saja.</li></ul>', '<ul><li style="margin-right: 0px;">1. Melakukan penyemprotan insektisida pada daun muda\r\nseperti Decis, Agrimec, dan Alfamex.</li></ul>\r\n<ul><li style="margin-right: 0px;">2. Membersihkan tanaman dari rumput-rumput liar\r\ndan gulma serta melakukan penyiangan.</li><li style="margin-right: 0px;">3. Melakukan penyemprotan menggunakan pestisida nabati&nbsp;<em style="border: 0px; font-size: 15px; margin: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; font-family: Poppins, sans-serif; text-align: justify;">B. thuringiensis</em></li></ul>', ''),
(4, 'Tungau', '<span style="line-height: 115%;" times="" new="" roman",serif;mso-fareast-font-family:calibri;mso-fareast-theme-font:="" minor-latin;mso-ansi-language:en-us;mso-fareast-language:en-us;mso-bidi-language:="" ar-sa"="">Tungau adalah hawan yang berukuran kecil (tungkai delapan) dan merupakan\r\nsub ordo dari Acarina. Perlu diketahui bahwa tungau berbeda dengan kutu,\r\nwalaupun tungau dan kutu memiliki ukuran yang sama-sama kecil akan tetapi\r\nberbeda. Kutu itu sendiri lebih dimasukan atau dikategorikan sebagai serangga\r\n(insecta), sedangkan tungau lebih didekatkan atau dikategrorikan laba-laba.</span>', '<ul><li style="margin-right: 0px;">1. Melakukan penyemprotan Akarisida yang berbahan\r\naktif dengan menambahkan pupuk daun seperti, Karbosulfan, Dikofol dan\r\nPermetrin.</li></ul>\r\n<ul><li style="margin-right: 0px;">2. Melakukan penyemprotan insektisida nabati\r\nseperti bawang putih dicampurkan dengan deterjen.</li></ul>', ''),
(5, 'Benalu', '<ul><li style="text-align: justify; margin-right: 0px;">Benalu adalah salah satu jenis hama yang merepotkan, karena kehadirannya akan menghisap sari-sari makanan secara langsung melalui daun hingga batang yang dihinggapinya. Jika terlambat dalam menangani hama yang satu ini, bisa dipastikan bahwa tanaman jambu air Anda akan terganggu pertumbuhannya hingga menyebabkan mati kering.</li></ul>', '<ul><li style="margin-right: 0px;">1. Membersihkan tanaman dari rumput-rumput liar dan\r\ngulma serta melakukan penyiangan.<o:p></o:p></li><li>\r\n<ul><li style="margin-right: 0px;">2. Melakukan sanitasi lahan dan membersihkan\r\ntanaman jambu air dari tanaman pengganggu atau cendawan liar.</li></ul></li></ul>', ''),
(6, 'Kutu Putih (Megatrioza vitiensis)', '<ul><li style="text-align: justify; box-sizing: inherit; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; line-height: 1.476; margin-right: 0px; margin-bottom: 1.25em; max-width: 90rem; width: calc(100% - 4rem);">Hama ini berupa kutu putih yang sering kali menyerang daun jambu air untuk menghisap makanan di dalamnya. Gejala yang timbul dari serangan ini adalah daun muda atau tunas baru akan tumbuh bergelombang hingga membekas sampai tua.</li><li style="text-align: justify; box-sizing: inherit; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; line-height: 1.476; margin-right: 0px; margin-bottom: 1.25em; max-width: 90rem; width: calc(100% - 4rem);">Kutu putih ini akan menghasilkan embun madu yang dapat menarik perhatian semut dan bebrapa cendawan lainnya. Akibat yang ditimbulkan bisa beragam seperti tanaman tumbuh kerdil dan terhambat perkembanganya.</li></ul>', '<ul><li style="margin-right: 0px;">1. Membersihkan tanaman dari rumput-rumput liar dan\r\ngulma serta melakukan penyiangan. <o:p></o:p></li><li style="margin-right: 0px;">2. Melakukan penyemprotan insektisida nabati seperti\r\nbawang putih dicampurkan dengan deterjen. <o:p></o:p></li><li>\r\n<ul><li style="margin-right: 0px;">3. Memotong daun tanaman yang terserang atau\r\nterinfeksi, kemudian dibuang dan dibakar.</li></ul></li></ul>', ''),
(7, 'Penggerek Batang', '<ul><li><span style="text-align: justify;">Hama ini bukan menyerang buah, daun tetapi juga batangnya. Biasanya dampak yang akan di tujukan dari hama ini adalah dengan di tandainnya batang&nbsp; berlubang.</span></li></ul>', '<ul><li style="margin-right: 0px;">1. Memotong batang tanaman yang terserang atau\r\nterinfeksi, kemudian dibuang dan dibakar.</li></ul>\r\n<ul><li style="margin-right: 0px;">2. Menempelkan kapas yang telah direndam menggunakan\r\npestisida, kemudian disumbatkan pada bagian yang berlubang.</li></ul>', ''),
(8, 'Kelelawar', '<ul><li style="text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Hama satu ini cukup berat untuk di hilangkan karena akan menyerang buah jambu air. Hal ini akan menyebabkan buah mengelupas dan berjatuhan bahkan hingga membusuk.</li><li style="text-align: justify; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; overflow-wrap: break-word;">Pada jangka panjang jika di biarkan maka akan membuat tumbuhan akan sedikit dalam berbuah. Selain itu dampak lainnya seperti penuruna produktivitas sehingga akan mengalami gagal panen.</li></ul>', '<p><span style="line-height: 115%;">1. Membungkus buah yang masih ada di pohon dengan\r\nplastik sewaktu masih pecah bunga.</span></p>', ''),
(9, 'Antraknosa', '<ul><li style="text-align: justify;">Kehadiran penyakit ini pada daun ditandai dengan adanya bercak-bercak berwarna coklat kehitaman yang menyerang daun tua. Akibat serangan yang ditimbulkan adalah buah-buah yang menjadi busuk lalu berjatuhan, kemudian tunas-tunas muda akan segera kering dan mati. Penyebab munculnya penyakit ini adalah cendawan&nbsp;<span style="box-sizing: inherit; -webkit-font-smoothing: antialiased; word-break: break-word; border-width: initial; border-color: initial; border-image: initial; line-height: inherit;"><b>Collectotrichum gloeosporioides Penz</b>.</span></li></ul>', '<ul><li><span style="line-height: 115%;">1. Memotong bagian\r\ntanaman yang terserang atau terinfeksi, kemudian dibuang dan dibakar.</span></li><li><span style="line-height: 115%;">2. Melakukan penyemprotan\r\nfungisida seperti Dhitan M45 atau Vigran Blue.</span></li></ul>', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `kode_post` int(11) NOT NULL,
  `nama_post` varchar(50) NOT NULL,
  `det_post` text NOT NULL,
  `srn_post` text NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`kode_post`, `nama_post`, `det_post`, `srn_post`, `gambar`) VALUES
(45, 'Tungau', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'tungau.jpg'),
(46, 'Benalu', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'benalu.jpg'),
(47, 'Kutu Putih', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'kutu putih.jpg'),
(48, 'Penggerek Batang', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'Larva-penggerek-2.jpg'),
(49, 'Codot ', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'codot.jpg'),
(50, 'Antraknosa', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'antraknosa.jpg'),
(44, 'Ulat Pagoda', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'ulat pagoda.jpg'),
(43, 'Ulat Kupu-Kupu Gajah', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'ulat gajah.jpg'),
(42, 'Lalat Buah', '<p>&nbsp;</p>', '<p>&nbsp;</p>', 'lalat.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kode_pengetahuan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`kode_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `kode_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `kode_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kode_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `kode_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
