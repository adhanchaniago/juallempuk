DROP TABLE IF EXISTS `tbl_costumer`;
CREATE TABLE `tbl_costumer`
(
`IdCostumer` int(3)NOT NULL AUTO_INCREMENT,
`Nama` varchar(20)NOT NULL,
`Email` varchar(32)NOT NULL,
`Sandi` varchar(32)NOT NULL,
`Alamat` text NOT NULL,
`Kecamatan` varchar(3)NOT NULL,
`Kota` varchar(3)NOT NULL,
`Provinsi` varchar(3)NOT NULL,
`KodePos` varchar(5)NOT NULL,
`NoHP` varchar(12)NOT NULL,
PRIMARY KEY(`IdCostumer`)
);

DROP TABLE IF EXISTS `tbl_karyawan`;
CREATE TABLE `tbl_karyawan`
(
`IdKaryawan` varchar(6)NOT NULL,
`Nama` varchar(20)NOT NULL,
`JenisKelamin` char(1) NOT NULL,
`Alamat` text NOT NULL,
`NoHp` varchar(12)NOT NULL,
`IdBagian` varchar(4)NOT NULL,
PRIMARY KEY(`IdKaryawan`)
);

DROP TABLE IF EXISTS `tbl_jabatan`;
CREATE TABLE `tbl_jabatan`
(
`IdBagian` varchar(4)NOT NULL,
`NamaBagian` varchar(20)NOT NULL,
`JumlahUpah` int(10)NOT NULL,
PRIMARY KEY(`IdBagian`)
);

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin`
(
`IdAdmin` int(2)NOT NULL,
`Nama` varchar(20)NOT NULL,
`Email` varchar(32)NOT NULL,
`Sandi` varchar(32)NOT NULL,
PRIMARY KEY(`IdAdmin`)
);

DROP TABLE IF EXISTS `tbl_pesanan`;
CREATE TABLE `tbl_pesanan`
(
`IdPesanan` int(4)NOT NULL AUTO_INCREMENT,
`NoFaktur` varchar(5)NOT NULL,
`IdProduk` varchar(3)NOT NULL,
`IdCostumer` varchar(3)NOT NULL,
`JumlahPesanan` int(4)NOT NULL,
`TotalBayar` int(10)NOT NULL,
`TanggalPesanan` date NOT NULL,
`Alamat` text NOT NULL,
`StatusPesanan` enum('Y','N')NOT NULL,
PRIMARY KEY(`IdPesanan`)
);
DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk`
(
`IdProduk` varchar(5)NOT NULL,
`NamaProduk` varchar(32)NOT NULL,
`Harga` varchar(10)NOT NULL,
`IdKemasan` varchar(5)NOT NULL,
PRIMARY KEY(`IdProduk`)
);
DROP TABLE IF EXISTS `tbl_kemasan`;
CREATE TABLE `tbl_kemasan`
(
`IdKemasan` varchar(5)NOT NULL,
`NamaKemasan` varchar(50)NOT NULL,
`Keterangan` text NOT NULl,
PRIMARY KEY(`IdKemasan`)
);

DROP TABLE IF EXISTS `tbl_stock`;
CREATE TABLE `tbl_stock`
(
`TglStock` date NOT NULL,
`Jumlah_Stock` int(4)NOT NULL,
PRIMARY KEY(`TglStock`)
);