-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2023 at 03:58 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_si_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int NOT NULL,
  `judul_berita` text NOT NULL,
  `slug_berita` varchar(256) NOT NULL,
  `isi_berita` text NOT NULL,
  `user_posting` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto_berita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `slug_berita`, `isi_berita`, `user_posting`, `created_at`, `foto_berita`) VALUES
(2, 'Judul Berita Ini', 'judul-berita-ini-1689174683', '<h1><strong>Ini Berita</strong></h1><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, pariatur laboriosam autem ab, impedit distinctio enim cum temporibus ad vel dolorum a<strong>ccusantium ipsam harum eaque delectus numquam reprehenderit, quos suscipit atque! Officiis veniam enim beatae nam aperiam eveniet, saepe ad repudiandae quia possimus iste facere numquam vero impedit, dolorem voluptatum. Doloremq</strong>ue incidunt repellendus placeat iusto nihil quos voluptatibus velit, beatae ut sed vel illum earum fugit reprehenderit, minima cupiditate aspernatur totam voluptate? Autem ducimus cum, quae quos veniam asperiores laborum officia. Qui maiores iusto accusamus? In corrupti eligendi necessitatibus unde, delectus alias iure, omnis voluptatum vero, vel consectetur. Perferendis eveniet obcaecati commodi veritatis aliquid mollitia ea eligendi odio, quisquam, est, dolorem sit sed ratione. Illum repellat aut saepe at <em>harum facere officia deserunt autem laborum impedit non, temporibus quisquam cum nemo, obcaecati beatae voluptatibus nulla sunt suscipit alias voluptas atque dolore, unde accusantium? Provident pariatur itaque id tempora repudiandae officiis reprehenderit, odio qui totam excepturi, ex sint voluptates ab. Facere aut at sit pra</em>esentium voluptate consectetur delectus, soluta ratione laboriosam molestiae architecto quos id suscipit repellendus officiis, repellat exercitationem in beatae rem dicta maxime sed, dolores quae assumenda. Autem dolorum quia quas odit facilis modi quisquam cum veniam sapiente&nbsp;</div><div><br></div><div><br></div><div><br></div><div><br></div>', 1, '2023-07-12 14:20:31', '1748_64aec29b6b751.jpg'),
(3, 'Laksanakan SE Pemko Padang, SDN 03 Alai Larang Ratusan Siswa Masuk Sekolah', 'laksanakan-se-pemko-padang,-sdn-03-alai-larang-ratusan-siswa-masuk-sekolah-1689258790', '<div>Setelah diterbitkannya surat edaran Walikota <a href=\"https://www.harianhaluan.com/tag/padang\">Padang</a>, bahwasanya siswa yang boleh belajar tatap muka di <a href=\"https://www.harianhaluan.com/tag/sekolah\">sekolah</a> hanya siswa yang sudah divaksin, pihak SDN 03 Alai Timur, Kecamatan <a href=\"https://www.harianhaluan.com/tag/padang\">Padang</a> Timur, mulai memberikan surat edaran tersebut kepada wali murid.<br><br></div><div>Kepala SDN 03 Alai Zulhendri membenarkan pemberian surat edaran dari Pemerintah Kota <a href=\"https://www.harianhaluan.com/tag/padang\">Padang</a> itu kepada wali muridnya masing-masing.<br><br></div><div>\"Setelah melakukan sosialisasi kepada guru-guru, kita langsung meneruskan memberikan surat edaran itu kepada wali murid,\" ujarnya, Selasa (8/2/2022).</div>', 1, '2023-07-13 14:33:10', '8234_64b00b26056ed.webp'),
(4, 'Wali Kota Padang Motivasi Murid SDN 03 Alai Timur di Sumarak Juz Amma', 'wali-kota-padang-motivasi-murid-sdn-03-alai-timur-di-sumarak-juz-amma-1689258905', '<div>Wali Kota Padang Hendri Septa memberikan motivasi dalam kegiatan Sumarak Juz Amma yang digelar oleh Dinas Pendidikan dan Kebudayaan (Disdikbud) Kota Padang bekerja sama dengan Padang TV, yang dipusatkan di Sekolah Dasar Negeri (SDN) 03 Alai Timur, Selasa (12/07/2022).</div><div>Kegiatan tersebut digelar dalam rangka menyambut Tahun Ajaran baru dan perayaan Idul Adha 1443 H. “Alhamdulillah hari ini anak-anak kita masuk sekolah kembali, setelah libur kenaikan kelas. Kita awali dengan menggemakan juz amma, agar anak-anak ini senantiasa hatinya dekat dengan Al-quran,” tutur Wako Hendri Septa.</div>', 1, '2023-07-13 14:35:05', '1100_64b00b9944472.jpg'),
(5, 'Direktur SD Membawa Tiga Misi Kunjungan ke Sumatera Barat', 'direktur-sd-membawa-tiga-misi-kunjungan-ke-sumater-1689260478', '<div>Direktorat Sekolah Dasar, Kemendikbudristek menjalankan tiga misi sekaligus dalam kegiatan kunjungan kerja ke Kota Padang, Sumatera Barat, pada 20-22 Oktober 2022. Ketiga misi tersebut adalah pemantauan implementasi kebijakan Merdeka Belajar, sosialisasi gerakan <a href=\"https://direktoratsd.id/artikel/detail/kemendikbudristek-revitalisasi-uks-melalui-sekolah-sehat-wujudkan-anak-sehat-berkarakter\">Sekolah Sehat</a>, dan pemantauan transformasi unit pelaksana teknis (UPT) Kemendikbudristek di daerah.<br><br></div><div>Kegiatan dipusatkan di Sekolah Dasar Negeri 03 Alai Timur dengan menghadirkan puluhan guru, kepala sekolah, dan pengawas sekolah se-Kota Padang. Turut hadir Plt. Kepala Dinas Pendidikan dan Kebudayaan Kota Padang Drs. Arfian beserta jajaran, dan Kepala Puskesmas Kecamatan Alai Timur drg. Hj. Yenni.<br><br></div><div>“Kemendikbudristek terus berupaya mengatasi tantangan pendidikan di Indonesia dengan berbagai macam kebijakan, salah satunya melalui kebijakan <a href=\"https://direktoratsd.id/hal/merdeka-belajar\">Merdeka Belajar</a> yang di dalamnya ada <a href=\"https://direktoratsd.id/hal/kurikulum-merdeka\">Kurikulum Merdeka</a>,” kata Direktur Sekolah Dasar, Dr. Muhammad Hasbi yang dalam kunjungan kerja ini didampingi oleh beberapa pejabat fungsional ahli madya beserta tim.<br><br></div>', 1, '2023-07-13 14:37:44', '9264_64b00c38e2bc2.jpg'),
(6, 'Padang Membanggakan! Ini 25 Sekolah Dasar (SD) Terbaik di Kota Padang Tahun 2023 Akreditasi A', 'padang-membanggakan!-ini-25-sekolah-dasar-(sd)-terbaik-di-kota-padang-tahun-2023-akreditasi-a-1689259172', '<div>SDN 03 ALAI TIMUR berstatus NEGERI adalah <a href=\"https://cilacap.pikiran-rakyat.com/tag/sekolah\">sekolah</a> <a href=\"https://cilacap.pikiran-rakyat.com/tag/terbaik\">terbaik</a> di <a href=\"https://cilacap.pikiran-rakyat.com/tag/Kota%20Padang\">Kota Padang</a> tahun 2023 yang <a href=\"https://cilacap.pikiran-rakyat.com/tag/membanggakan\">membanggakan</a> dengan nomor NPSN 10304110. SDN 03 ALAI TIMUR berada di Jln Gajah Mada, Alai Parak Kopi, Kec. Padang Utara, <a href=\"https://cilacap.pikiran-rakyat.com/tag/Kota%20Padang\">Kota Padang</a>.<br><br></div><div>SDN 03 ALAI TIMUR Merupakan salah satu <a href=\"https://cilacap.pikiran-rakyat.com/tag/sekolah\">sekolah</a> dasar negeri <a href=\"https://cilacap.pikiran-rakyat.com/tag/terbaik\">terbaik</a> di <a href=\"https://cilacap.pikiran-rakyat.com/tag/Kota%20Padang\">Kota Padang</a> pada tahun 2023 yang <a href=\"https://cilacap.pikiran-rakyat.com/tag/membanggakan\">membanggakan</a>, SDN 03 ALAI TIMUR memiliki fasilitas yang lengkap, lingkungan yang bersih dan aman, serta guru-guru yang berkualitas dan berpengalaman. Sekolah ini juga memiliki kurikulum yang terus diperbarui sehingga memastikan anak-anak mendapatkan pendidikan <a href=\"https://cilacap.pikiran-rakyat.com/tag/terbaik\">terbaik</a>.</div>', 1, '2023-07-13 14:39:32', '6665_64b00ca4ec04b.webp');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id_ekstrakurikuler` int NOT NULL,
  `nama_ekstrakurikuler` varchar(100) NOT NULL,
  `pembina` int NOT NULL,
  `siswa_mengikuti` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `nama_ekstrakurikuler`, `pembina`, `siswa_mengikuti`) VALUES
(2, 'Sepakbola', 1, 14),
(3, 'Pramuka', 10, 20),
(4, 'Silat', 4, 19),
(5, 'Marching Band', 22, 20),
(6, 'Paskibra', 13, 15);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `gender_guru` enum('L','P') NOT NULL,
  `jabatan_guru` varchar(40) NOT NULL,
  `tanggal_lahir_guru` date DEFAULT NULL,
  `tempat_lahir_guru` varchar(30) NOT NULL,
  `agama_guru` enum('Islam','Protestan','Katolik','Hindu','Budha','Lainnya') NOT NULL,
  `alamat_guru` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `foto_guru` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `gender_guru`, `jabatan_guru`, `tanggal_lahir_guru`, `tempat_lahir_guru`, `agama_guru`, `alamat_guru`, `email`, `nohp`, `foto_guru`) VALUES
(1, '789', 'Siti', 'L', 'Guru Kimia', '1980-01-22', 'Padang', 'Islam', 'Padang', 'siti@gmail.com', '3241', '6083_64ae7ed59d9e9.jpeg'),
(3, '879789', 'Nuraini', 'P', 'Guru Sejarah', '1997-02-27', 'Padang', 'Islam', 'Padang', 'nuraini@gmail.com', '981902', 'user.png'),
(4, '2839421', 'Nuraini Sitorus', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'aini@gmail.com', '82913', 'user.png'),
(5, '8989', 'Bella', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'bella@gmail.com', '9024', 'user.png'),
(7, '687678', 'Dani', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'dani@gmail.com', '76987', 'user.png'),
(8, '68768', 'Ferdy Sambo', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'ferdi@gmail.com', '877', 'user.png'),
(10, '687', 'Nurhikmah', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'nurhikmah@gmail.com', '8789-', 'user.png'),
(11, '89080', 'Hamdan', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'hamdan@gmail.com', '728934', 'user.png'),
(12, '829304', 'Hafidzah', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'hafidzah@gmail.com', '9423', 'user.png'),
(13, '82304989', 'Mirwan', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'mirwan@gmail.com', '872813', 'user.png'),
(14, '798', 'Syahreza', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'syahreza@gmail.com', '8234', 'user.png'),
(15, '6543567', 'Rahmad', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'rahmad@gmail.com', '67312313', 'user.png'),
(16, '', 'Situmorang', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'situmorang@gmail.com', '8423042', 'user.png'),
(17, '62873453', 'Suparman', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'suparman@gmail.com', '2899423100', 'user.png'),
(22, '', 'Syahbani', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'syahbani@gmail.com', '8179031', 'user.png'),
(23, '123', 'Guru', 'L', 'Guru Sejarah', '1980-01-01', 'Padang', 'Islam', 'Padang', 'guru@gmail.com', '081212345678', 'user.png'),
(27, '797', 'jak', 'L', 'Guru Sejarah', '2023-07-12', 'hkjh', 'Islam', '', '', '', 'user.png'),
(28, '8909', 'hgdhajk', 'L', 'Guru Sejarah', '2023-07-12', 'hkjhkj', 'Islam', '', '', '', 'user.png'),
(29, '890080', 'hjkjj', 'L', 'Guru Sejarah', '2023-07-12', 'jlk', 'Islam', 'kjl', '', '', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id_meta` int NOT NULL,
  `kunci` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id_meta`, `kunci`, `value`) VALUES
(1, 'visi', 'Berprestasi dilandasi Iman, Taqwa dan Berbudaya Lingkungan serta Berwawasan Global'),
(2, 'misi', '<ol><li>Mewujudkan pendidikan untuk menghasilkan prestasi dan lulusa berkwalitas tinggi yang peduli dengan lingkungan hidup</li><li>Mewujudkan sumber daya manusia yang beriman, produktif, kreatif, inofatif dan efektif</li><li>Mewujudkan pengembangan inovasi pembelajaran sesuai tuntutan</li><li>Mewujudkan sumber daya manusia yang peduli dalam mencegahan pencemaran, mencegahan kerusakan lingkungan dan melestarikan lingkungan hidup</li><li>Mewujudkan sarana prasarana reprensentatif dan up to date</li></ol>'),
(3, 'kepsek', 'Syafri, M.Pd'),
(4, 'nip_kepsek', '197001232002031001'),
(5, 'foto_kepsek', 'foto_kepsek.jpg'),
(6, 'banner_depan', 'banner_depan.jpg'),
(7, 'status_ppdb', 'Buka');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id_ppdb` int NOT NULL,
  `uid_ppdb` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `panggilan` varchar(40) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `anak_ke` int NOT NULL,
  `status_anak` varchar(20) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL,
  `nohp_siswa` varchar(13) NOT NULL,
  `tk_asal` varchar(30) NOT NULL,
  `alamat_tk_asal` varchar(50) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(50) NOT NULL,
  `nohp_ortu` varchar(13) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `sekolah_ayah` varchar(3) NOT NULL,
  `sekolah_ibu` varchar(3) NOT NULL,
  `penghasilan_ayah` int NOT NULL,
  `penghasilan_ibu` int NOT NULL,
  `wali` varchar(50) NOT NULL,
  `alamat_wali` varchar(50) NOT NULL,
  `nohp_wali` varchar(13) NOT NULL,
  `pekerjaan_wali` varchar(20) NOT NULL,
  `sekolah_wali` varchar(3) NOT NULL,
  `penghasilan_wali` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  `foto_siswa_ppdb` varchar(35) NOT NULL,
  `foto_kk` varchar(35) NOT NULL,
  `ktp_ayah` varchar(35) NOT NULL,
  `ktp_ibu` varchar(35) NOT NULL,
  `ktp_wali` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id_ppdb`, `uid_ppdb`, `nama_lengkap`, `panggilan`, `tempat_lahir`, `tanggal_lahir`, `gender`, `agama`, `anak_ke`, `status_anak`, `alamat_siswa`, `nohp_siswa`, `tk_asal`, `alamat_tk_asal`, `ayah`, `ibu`, `alamat_ortu`, `nohp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `sekolah_ayah`, `sekolah_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `wali`, `alamat_wali`, `nohp_wali`, `pekerjaan_wali`, `sekolah_wali`, `penghasilan_wali`, `created_at`, `status`, `foto_siswa_ppdb`, `foto_kk`, `ktp_ayah`, `ktp_ibu`, `ktp_wali`) VALUES
(1, '168922207064af7bb6510ce', 'Imron Hadi', 'Imron', 'Bukittinggi', '2017-07-13', 'L', 'islam', 1, 'anak_kandung', 'Jalan Adinegoro Tangah Jua I No. 2', '', '', '', 'Imron', 'Hayati', 'Jalan Adinegoro Tangah Jua I No. 2', '083181411190', 'Wiraswasta', 'Ibu Rumah Tangga', 'S1', 'SMA', 2500000, 0, '', '', '', '', '', 0, '2023-07-13 04:21:10', 'approved', 'siswa-9601_64af7bb65111b.jpg', 'kk-8342_64af7bb656904.jpg', 'ayah-8874_64af7bb65a9be.jpg', 'ibu-9586_64af7bb66442a.jpg', 'wali-1234_64af7bb664c5f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama_siswa` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `gender_siswa` enum('L','P') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tanggal_lahir_siswa` date DEFAULT NULL,
  `tempat_lahir_siswa` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `agama_siswa` enum('Islam','Protestan','Katolik','Hindu','Budha','Lainnya') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `alamat_siswa` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email_siswa` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nohp_siswa` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `foto_siswa` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `gender_siswa`, `tanggal_lahir_siswa`, `tempat_lahir_siswa`, `agama_siswa`, `alamat_siswa`, `email_siswa`, `nohp_siswa`, `foto_siswa`) VALUES
(1, '789', 'Siti', 'L', '1980-01-22', 'Padang', 'Islam', 'Padang', 'siti@gmail.com', '3241', '4415_64b0043d882aa.jpg'),
(3, '879789', 'Nuraini', 'P', '1997-02-27', 'Padang', 'Islam', 'Padang', 'nuraini@gmail.com', '981902', ''),
(4, '2839421', 'Nuraini Sitorus', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'aini@gmail.com', '82913', ''),
(5, '8989', 'Bella', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'bella@gmail.com', '9024', ''),
(7, '687678', 'Dani', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'dani@gmail.com', '76987', ''),
(8, '68768', 'Ferdy Sambo', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'ferdi@gmail.com', '877', ''),
(10, '687', 'Nurhikmah', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'nurhikmah@gmail.com', '8789-', ''),
(11, '89080', 'Hamdan', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'hamdan@gmail.com', '728934', ''),
(12, '829304', 'Hafidzah', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'hafidzah@gmail.com', '9423', ''),
(13, '82304989', 'Mirwan', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'mirwan@gmail.com', '872813', ''),
(14, '798', 'Syahreza', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'syahreza@gmail.com', '8234', ''),
(15, '6543567', 'Rahmad', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'rahmad@gmail.com', '67312313', ''),
(16, '', 'Situmorang', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'situmorang@gmail.com', '8423042', ''),
(17, '62873453', 'Suparman', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'suparman@gmail.com', '2899423100', ''),
(22, '', 'Syahbani', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'syahbani@gmail.com', '8179031', ''),
(23, '123', 'Guru', 'L', '1980-01-01', 'Padang', 'Islam', 'Padang', 'guru@gmail.com', '081212345678', ''),
(27, '797', 'jak', 'L', '2023-07-12', 'hkjh', 'Islam', '', '', '', ''),
(28, '8909', 'hgdhajk', 'L', '2023-07-12', 'hkjhkj', 'Islam', '', '', '', ''),
(29, '890080', 'hjkjj', 'L', '2023-07-12', 'jlk', 'Islam', 'kjl', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '$2y$10$azitLW28AhwvrcNwlllq7eFC4YEhlmrU/tK5qkPrO1mQc14KDzSsC', 'Administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id_ekstrakurikuler`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id_meta`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id_ppdb`),
  ADD UNIQUE KEY `uid_ppdb` (`uid_ppdb`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id_ekstrakurikuler` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id_meta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id_ppdb` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
