-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:12 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pak_bonar`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_data`
--

CREATE TABLE `table_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama_ktp` varchar(200) NOT NULL,
  `t_tempat` varchar(200) NOT NULL,
  `t_lahir` datetime NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha','Konghuchu') NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `no_ktp` varchar(200) NOT NULL,
  `foto_ktp` text NOT NULL,
  `skck` text NOT NULL,
  `slik_ojk` text NOT NULL,
  `ibu_kandung` varchar(200) NOT NULL,
  `status_pernikahan` enum('Sudah Menikah','Belum Menikah') NOT NULL,
  `pendidikan_terakhir` enum('SD','SMP','SMA','SMK','Diploma','S1','S2','S3') NOT NULL,
  `pekerjaan` enum('PNS','TNI/POLRI','Karyawan BUMN','Karyawan Swasta','Wiraswasta','Pelajar/Mahasiswa','Belum Bekerja') NOT NULL,
  `bidang_pekerjaan` varchar(200) NOT NULL,
  `pendapatan_per_bulan` enum('0 - Rp 2.950.000','Rp 2.950.001 - Rp 5.935.000','Rp 5.935.001 - Rp 11.865.000','Rp 11.865.001 - Rp 24.988.000','Rp 24.988.001 - Rp 208.330.000','Rp 208.330.001 - Rp 4.000.233.000','>4.000.233.000') NOT NULL,
  `sumber_dana` varchar(200) NOT NULL,
  `pengalaman_kerja` enum('Pelajar/ belum pernah bekerja','<1 tahun','1-2 tahun','2-3 tahun','>3 tahun') NOT NULL,
  `npwp` varchar(200) NOT NULL,
  `no_hp` varchar(200) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `nama_bank` varchar(200) NOT NULL,
  `no_rek` varchar(200) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL,
  `rekening_koran` text NOT NULL,
  `no_gopay` varchar(200) NOT NULL,
  `no_dana` varchar(200) NOT NULL,
  `nama_ahli_waris` varchar(200) NOT NULL,
  `nik_ahli_waris` varchar(200) NOT NULL,
  `hubungan_ahli_waris` varchar(200) NOT NULL,
  `alamat_ahli_waris` text NOT NULL,
  `no_ahli_waris` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_data`
--

INSERT INTO `table_data` (`id`, `user_id`, `email`, `nama_ktp`, `t_tempat`, `t_lahir`, `agama`, `jk`, `no_ktp`, `foto_ktp`, `skck`, `slik_ojk`, `ibu_kandung`, `status_pernikahan`, `pendidikan_terakhir`, `pekerjaan`, `bidang_pekerjaan`, `pendapatan_per_bulan`, `sumber_dana`, `pengalaman_kerja`, `npwp`, `no_hp`, `alamat_ktp`, `nama_bank`, `no_rek`, `nama_pemilik`, `rekening_koran`, `no_gopay`, `no_dana`, `nama_ahli_waris`, `nik_ahli_waris`, `hubungan_ahli_waris`, `alamat_ahli_waris`, `no_ahli_waris`) VALUES
(1, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(2, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(3, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(4, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(5, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(6, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(7, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(8, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(9, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(10, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123'),
(11, 0, 'ausathaulia@gmail.com', 'Aulia Ausath', 'Jakarta', '1993-10-16 00:00:00', 'Islam', 'Laki-laki', '0987654321', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'e6a77115f84572112333aabeefe2fcfc.png', 'Roqoyyah', 'Sudah Menikah', 'S1', 'Wiraswasta', 'Programmer', 'Rp 5.935.001 - Rp 11.865.000', 'Gaji', '>3 tahun', '1234', '082299160032', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', 'BCA', '123456', 'Aulia Ausath', 'e6a77115f84572112333aabeefe2fcfc.png', '082299160032', '082299160032', 'Aulia Ausath', '082299160032', 'keluarga', 'Jl. Nurul Islam No.31, RT.003/RW.018, Jatimekar, Kec. Jatiasih, Kota Bks, Jawa Barat 17422', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_data`
--
ALTER TABLE `table_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_data`
--
ALTER TABLE `table_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
