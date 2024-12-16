CREATE DATABASE proyekgogorentals;

use proyekgogorentals;

CREATE TABLE users(
  username varchar(30) PRIMARY KEY,
  password varchar(100),
  nama_lengkap varchar(50),
  alamat varchar(100),
  no_telepon varchar(20),
  level ENUM('1','2') DEFAULT '1',
  remember_me varchar(100)
);

INSERT INTO users VALUES
('admin', '$2y$10$paiHuouGO665kttfC94ZN.MHHwR46dr49sl9IUuJ4rN/zHmmROWai', 'admin', 'Jatinangor', '123', '2', NULL); 
-- password = admin

CREATE TABLE `kategori` (
  `kode_kategori` varchar(10) NOT NULL PRIMARY KEY,
  `nama_kategori` varchar(50) NOT NULL
);

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('Con', 'Convertible Car'),
('Elc', 'Electric Car'),
('Fam', 'Family Car'),
('Hch', 'Hatchback Car'),
('Pck', 'Pickup Car'),
('Sdn', 'Sedan Car');

CREATE TABLE `kendaraan` (
  `id_kendaraan` varchar(4) NOT NULL,
  `kode_kategori` varchar(10) DEFAULT NULL,
  `merk_kendaraan` varchar(50) DEFAULT NULL,
  `varian` varchar(50) DEFAULT NULL,
  `kapasitas_penumpang` int(11) DEFAULT NULL,
  `tahun_produksi` int(11) DEFAULT NULL,
  `nomor_polisi` varchar(11) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kendaraan`),
  KEY `kode_kategori` (`kode_kategori`),
  CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`)
);


INSERT INTO `kendaraan` (`id_kendaraan`, `kode_kategori`, `merk_kendaraan`, `varian`, `kapasitas_penumpang`, `tahun_produksi`, `nomor_polisi`, `harga_sewa`, `gambar`) VALUES
('M001', 'Fam', 'Toyota', 'Avanza', 6, 2021, 'D 1234 CD', 350000, 'ToyotaAvanza.png'),
('M002', 'Fam', 'Honda', 'Mobilio', 6, 2020, 'D 5678 EF', 280000, 'HondaMobilio.png'),
('M003', 'Fam', 'Nissan', 'Grand Livina', 6, 2019, 'D 9012 HI', 190000, 'NissanGrandLivina.jpg'),
('M004', 'Sdn', 'Ford', 'Focus', 5, 2022, 'D 3456 KL', 620000, 'FordFocus.jpg'),
('M005', 'Sdn', 'Mazda', 'CX-5', 5, 2021, 'D 1234 QR', 500000, 'MazdaCX5.png'),
('M006', 'Pck', 'Dodge', 'Ram 1500', 3, 2020, 'D 5678 TU', 250000, 'DodgeRam1500.jpg'),
('M007', 'Pck', 'GMC', 'Sierra 1500', 3, 2022, 'D 9012 WX', 250000, 'GMCSierra1500.png'),
('M008', 'Pck', 'Daihatsu', 'Grand Max', 3, 2022, 'D 3344 WX', 250000, 'DaihatsuGrandMax.jpg'),
('M009', 'Elc', 'Tesla', 'Model 3', 5, 2023, 'D 6789 CD', 3000000, 'TeslaModel3.jpg'),
('M010', 'Elc', 'Nio', 'ES8', 5, 2023, 'D 6789 CD', 1500000, 'NioES8.jpg'),
('M011', 'Elc', 'Rivian', 'R1T', 5, 2021, 'D 5678 IJ', 1250000, 'RivianR1T.jpg'),
('M012', 'Hch', 'Volkswagen', 'Golf', 5, 2020, 'D 1234 UV', 400000, 'VolkswagenGolf.jpg'),
('M013', 'Hch', 'Ford', 'Fiesta', 5, 2019, 'D 5678 WX', 320000, 'FordFiesta.png'),
('M014', 'Con', 'Chevrolet', 'Camaro Convertible', 4, 2021, 'D 6789 CD', 600000, 'ChevroletCamaro.jpg');

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `id_kendaraan` varchar(4) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `metode_pembayaran` enum('Cash','Debit','Dana','GoPay') NOT NULL,
  `status` enum('Menunggu Konfirmasi','Sukses','Gagal') NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `username` (`username`),
  KEY `booking_ibfk_2` (`id_kendaraan`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE
);

INSERT INTO `booking` (`id_booking`, `username`, `nama`, `no_telepon`, `id_kendaraan`, `tanggal_sewa`, `tanggal_pengembalian`, `total_biaya`, `metode_pembayaran`, `status`, `deskripsi`) VALUES
(1, 'jason', 'Jason Natanael Krisyanto', '087777727799', 'M001', '2023-11-22', '2023-11-23', 700000, 'Cash', 'Sukses', NULL),
(2, 'ichsan', 'ichsan', '085767230981', 'M005', '2023-11-24', '2023-11-24', 500000, 'GoPay', 'Sukses', NULL),
(3, 'ichsan', 'Ichsan', '089512308121', 'M002', '2023-12-10', '2023-12-20', 3080000, 'Cash', 'Sukses', NULL),
(4, 'vernan', 'Vernand', '089982727211', 'M004', '2023-12-14', '2023-12-14', 620000, 'GoPay', 'Sukses', NULL),
(5, 'ichsan', 'Ichsan Firdaus', '089523086833', 'M014', '2023-12-03', '2023-12-04', 800000, 'Cash', 'Sukses', NULL),
(6, 'jason', 'Jason N', '087777727788', 'M010', '2023-12-04', '2023-12-06', 3000000, 'Dana', 'Gagal', NULL),
(7, 'vernan', 'Vernandika', '081111131114', 'M003', '2023-12-15', '2023-12-16', 190000, 'GoPay', 'Gagal', NULL);
