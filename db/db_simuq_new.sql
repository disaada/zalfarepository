/*
SQLyog Ultimate v10.42 
MySQL - 5.5.27 : Database - db_backend_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `t_album` */

CREATE TABLE `t_album` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `judul_album` varchar(100) NOT NULL,
  `gambar_album` varbinary(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_album` */

insert  into `t_album`(`id`,`judul_album`,`gambar_album`) values (1,'Talaki ngaji','album_1476252680.png');
insert  into `t_album`(`id`,`judul_album`,`gambar_album`) values (2,'Pelabuhan Ratu sukabumi ','album_1476254154.jpg');

/*Table structure for table `t_kategori_artikel` */

CREATE TABLE `t_kategori_artikel` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_kategori_artikel` */

insert  into `t_kategori_artikel`(`id`,`nama_kategori`) values (1,'Al-quran');
insert  into `t_kategori_artikel`(`id`,`nama_kategori`) values (2,'Fiqih');
insert  into `t_kategori_artikel`(`id`,`nama_kategori`) values (3,'Pendidikan Islam');

/*Table structure for table `t_artikel` */

CREATE TABLE `t_artikel` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(4) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text,
  `tgl_publish` datetime DEFAULT NULL,
  `tampilkan` enum('Ya') DEFAULT NULL,
  `nama_gambar` varchar(40) DEFAULT NULL,
  `tipe_gambar` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_artikel` (`id_kategori`),
  CONSTRAINT `fk_id_artikel` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori_artikel` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_artikel` */

insert  into `t_artikel`(`id`,`id_kategori`,`judul_artikel`,`isi_artikel`,`tgl_publish`,`tampilkan`,`nama_gambar`,`tipe_gambar`) values (1,1,'Manisnya Al-quran ','Al-quran sebagai petunjuk hidup dalam hidup di dunia maupun akhirat','2016-10-10 06:03:23','Ya','file_1476155356.jpg','image/jpeg');
insert  into `t_artikel`(`id`,`id_kategori`,`judul_artikel`,`isi_artikel`,`tgl_publish`,`tampilkan`,`nama_gambar`,`tipe_gambar`) values (2,3,'Keutamaan Menghafal Al-quran','\"Sebaik-Baiknya kalian adalah yang mempelajari Al-Quran dan mengamalkannya\".(Al-Hadist)','2016-10-10 11:03:53','Ya','artikel_1476158351.jpg','image/jpeg');
insert  into `t_artikel`(`id`,`id_kategori`,`judul_artikel`,`isi_artikel`,`tgl_publish`,`tampilkan`,`nama_gambar`,`tipe_gambar`) values (3,3,'Tiga Penggunaan Istilah Riba dalam Hadis','<p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><span style=\"background-color: transparent;\">Riba secara bahasa dari kata rabaa-yarbuu yang artinya “tumbuh dan bertambah.” Makna bahasa kata riba ini bisa kita jumpai di beberapa kata dalam al-Quran. Diantaranya,</span><br></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Allah berfirman,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">“Maka (masing-masing) mereka mendurhakai Rasul Tuhan mereka, lalu Allah menyiksa mereka dengan siksaan yang rabiyah.”</em>&nbsp;(QS. Al-Haaqqah: 10).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Yang dimaksud siksaan&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Rabiyah</em>&nbsp; artinya siksa yang terus bertambah.</p><h3 style=\"margin: 0px 0px 14px; font-family: Oswald, sans-serif, Helvetica, sans-serif; line-height: 34px; color: rgb(51, 51, 51); text-rendering: optimizeLegibility; letter-spacing: normal; padding: 0px; border: 0px; vertical-align: baseline;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Riba secara istilah</strong></h3><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Riba secara istilah memiliki 2 makna;</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Pertama</em></strong>, riba dalam arti luas</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Riba dalam makna yang luas adalah semua transaksi jual beli yang dilarang oleh syariat.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Kedua</em></strong>, riba dalam arti sempit</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Pengertian riba secara istilah dalam arti sempit, para ulama memberikan pengertian riba dengan berbagai definisi, diantaranya,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">“Tambahan khusus yang dimiliki salah satu dari dua orang yang melakukan transaksi tanpa ada imbalan sebalikya.”</p><h3 style=\"margin: 0px 0px 14px; font-family: Oswald, sans-serif, Helvetica, sans-serif; line-height: 34px; color: rgb(51, 51, 51); text-rendering: optimizeLegibility; letter-spacing: normal; padding: 0px; border: 0px; vertical-align: baseline;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Makna kata Riba dalam Hadis</strong></h3><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Dalam sunah, terkadang kita menjumpai istilah riba digunakan untuk selain yang ada hubungannya dengan transaksi manusia. seperti, Nabi shallallahu ‘alaihi wa sallam menyebut orang mencemarkan nama baik orang lain sebagai bentuk riba yang paling parah.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Jika kita simpulkan, di sana ada 3 makna untuk kata riba dalam hadis,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Pertama</em></strong>, Riba dari sisi bahasa</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Terkadang digunakan kata riba dalam hadis, semata untuk menunjukkan makna tambahan.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Diantaranya,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Riwayat dari Ibnu Mas’ud&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">radhiyallahu ‘anhu</em>, dengan redaksi lebih panjang,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Riba itu ada 73 pintu, yang paling ringan, seperti orang yang berzina dengan ibunya. Dan riba yang paling riba adalah kehormatan seorang muslim</em>. (HR. Hakim 2259 dan dishahihkan ad-Dzahabi).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Dalam riwayat lain, Dari Said bin Zaid&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">radhiyallahu ‘anhu</em>, Nabi<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">&nbsp;shallallahu ‘alaihi wa sallam</em>&nbsp;bersabda,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Diantara bentuk riba yang paling parah adalah mempermalukan kehormatan seorang muslim tanpa hak.</em>(HR. Abu Daud 4878 dan dishahihkan al-Albani).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Karena makna bahasa dari kata riba adalah tambahan. Sehingga semua bentuk tambahan yang melebihi apa yang Allah halalkan, bisa disebut riba secara makna bahasa.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Imam Ibn Baz melanjutkan keterangannya,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><span style=\"background-color: transparent;\">Riba tidak hanya khusus dalam jual beli saja. Bahkan semua tindakan maksiat dan penyimpangan, melanggar hak orang lain dengan ghibah dan adu domba, termasuk riba. Karena di sana ada tambahan dari batas yang Allah halalkan. Dia menambahi dari apa yang Allah bolehkan, sehingga terjerumus ke dalam hal yang haram.</span></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Sumber:&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">http://www.binbaz.org.sa/node/3407</em></p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Kedua</em></strong>, Riba secara istilah dengan makna luas</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Mencakup semua transaksi haram dan penghasilan yang haram.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Terkadang dalam hadis disebutkan kata riba yang maknanya transaksi haram atau penghasilan yang haram.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Diantaranya,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Keterangan sahabat Ibnu Abi Aufa&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">radhiyallahu ‘anhu.</em>&nbsp;Beliau memberikan celaan orang yang melakukan transaksi najasy,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">“Orang yang melakukan jual beli najasy adalah orang yang memakan riba dan seorang yang tidak amanah” (<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Ma La Yasa’ at Tajir Jahluhu,</em>hlm. 15)</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Keterangan Keterangan Aisyah&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">radhiyallahu ‘anha</em>&nbsp;mengatakan,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">“Tatkala diturunkan beberapa ayat terakhir dari surat al-Baqarah yang isinya melarang riba, Rasulullah pergi ke masjid lantas mengharamkan jual beli khamr sebagai realisasi pelarangan riba.”</em>&nbsp;(HR. Bukhari 4540 dan Muslim 4131)</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Berikutnya, riwayat dari Abu Umamah secara marfu’,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Siapa yang memberi syafaat kepada orang lain, lalu orang yang mendapat syafaat memberikan hadiah kepadanya dan dia menerimanya, berarti dia telah melakukan salah satu dari pintu besar riba. (HR. Ahmad 22251 dan didhaifkan Syuaib al-Arnauth).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Syafaat adalah menolong orang lain dengan menjadi penghubung orang yang ditolong untuk mendapatkan apa yang diinginkan. Misal, si A dan si B bertetangga. Si A seorang pejabat pemerintah daerah, si B sedang punya proyek yang membutuhkan perizinan. Ketika hendak membuka proyek, diperlancar oleh si A. Posisi si A sebagai pemberi syafaat.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Karena si A telah memudahkan si B untuk proyeknya, lalu si B memberi hadiah kepada si A, dan si A menerimanya. Hadiah ini termasuk pintu besar riba.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Itu semua disebut riba, meskipun tidak ada hubungannya dengan utang, karena semuanya penghasilan yang haram. Transaksi najasy haram. Jual beli khamr, haram. Ucapan terima kasih karena dibantu pejabat, juga haram.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Ketiga</em></strong>, Riba secara istilah dengan makna sempit</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Inilah riba yang diberi ancaman besar, seperti tantangan perang di mahsyar, berenang di sungai darah di alam barzakh, laknat Rasulullah<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">&nbsp;shallallahu ‘alaihi wa sallam,</em>&nbsp;dan ancaman lainnya. Inilah riba yang dosanya lebih besar dari pada zana.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Dari Ka’ab al-Ahbar secara marfu’,</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Satu dirham riba yang dimakan seseorang, sementara dia tahu itu riba yang haram, lebih berat dosanya dibandingkan 36 kali berzina.</em>&nbsp;(HR. Daruquthni 2880, Ahmad 21957).</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Allahu a’lam.</p><p style=\"margin-bottom: 20px; padding: 0px; border: 0px; line-height: 21px; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);\">Sumber : pengusahamuslim.com</p><div><br></div>','2016-10-10 11:39:16','Ya','artikel_1476169164.jpg','image/jpeg');

/*Table structure for table `t_donatur` */

CREATE TABLE `t_donatur` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_donatur` varchar(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pin_bb` char(10) DEFAULT NULL,
  `no_kontak` varchar(15) DEFAULT NULL,
  `no_rekening` varchar(15) DEFAULT NULL,
  `jenis_donatur` varchar(20) DEFAULT NULL,
  `komitmen_tetap` varchar(18) DEFAULT NULL,
  `status` enum('Terdaftar','Belum terdaftar') DEFAULT NULL,
  `type_input` enum('website','admin') DEFAULT NULL,
  `kesedian_donasi` varchar(40) DEFAULT NULL,
  `teknis_pengambilan` varchar(30) DEFAULT NULL,
  `tgl_ambil_donasi` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_donatur` */

insert  into `t_donatur`(`id`,`nama_donatur`,`email`,`kota`,`alamat`,`tgl_lahir`,`pin_bb`,`no_kontak`,`no_rekening`,`jenis_donatur`,`komitmen_tetap`,`status`,`type_input`,`kesedian_donasi`,`teknis_pengambilan`,`tgl_ambil_donasi`) values (1,'Muhammad Irobby ',NULL,'Cipanas','Kp. Babakan Situ',NULL,NULL,'089756473829','430129101000','Perusahaan',NULL,'Terdaftar',NULL,NULL,NULL,NULL);
insert  into `t_donatur`(`id`,`nama_donatur`,`email`,`kota`,`alamat`,`tgl_lahir`,`pin_bb`,`no_kontak`,`no_rekening`,`jenis_donatur`,`komitmen_tetap`,`status`,`type_input`,`kesedian_donasi`,`teknis_pengambilan`,`tgl_ambil_donasi`) values (2,'Ruston Pirmansyah',NULL,'sukabumi','geger kalong ',NULL,NULL,'087528912031','41201290100','Perusahaan',NULL,'Belum terdaftar',NULL,NULL,NULL,NULL);
insert  into `t_donatur`(`id`,`nama_donatur`,`email`,`kota`,`alamat`,`tgl_lahir`,`pin_bb`,`no_kontak`,`no_rekening`,`jenis_donatur`,`komitmen_tetap`,`status`,`type_input`,`kesedian_donasi`,`teknis_pengambilan`,`tgl_ambil_donasi`) values (3,'Ade Rony Saprudin',NULL,'nangor','geger kalong wetan no. 8',NULL,NULL,'0896473718','23900012003','Tetap',NULL,'Belum terdaftar',NULL,NULL,NULL,NULL);

/*Table structure for table `t_fundraising` */

CREATE TABLE `t_fundraising` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `periode` varchar(30) NOT NULL,
  `total_kebutuhan` varchar(18) DEFAULT '-',
  `total_realisasi` varchar(18) DEFAULT '-',
  `total_pemasukan` varchar(18) DEFAULT '-',
  `selisih` varchar(18) DEFAULT '-',
  `status` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_fundraising` */

insert  into `t_fundraising`(`id`,`periode`,`total_kebutuhan`,`total_realisasi`,`total_pemasukan`,`selisih`,`status`) values (1,'10-2016','56700000','360000','8500000','-48200000',0);

/*Table structure for table `t_galeri` */

CREATE TABLE `t_galeri` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_album` int(4) NOT NULL,
  `judul_galeri` varchar(100) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `gambar_galeri` varchar(100) DEFAULT NULL,
  `tampilkan` enum('Ya') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_album` (`id_album`),
  CONSTRAINT `fk_id_album` FOREIGN KEY (`id_album`) REFERENCES `t_album` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_galeri` */

insert  into `t_galeri`(`id`,`id_album`,`judul_galeri`,`keterangan`,`gambar_galeri`,`tampilkan`) values (1,1,'Ust.Suhud','foto pemilik Mahad Usyaqil Quran (MUQ)','galeri_1476267500.png','Ya');

/*Table structure for table `t_group_users` */

CREATE TABLE `t_group_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `t_group_users` */

insert  into `t_group_users`(`id`,`level`,`deskripsi`) values (1,'Super Admin','Super Administrator ');
insert  into `t_group_users`(`id`,`level`,`deskripsi`) values (39,'Admin','Admin sistem');


/*Table structure for table `t_kategori_video` */

CREATE TABLE `t_kategori_video` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `t_kategori_video` */

insert  into `t_kategori_video`(`id`,`nama_kategori`) values (1,'Murotal Ustad Suhud ');
insert  into `t_kategori_video`(`id`,`nama_kategori`) values (2,'Murotal Ustad Ali');
insert  into `t_kategori_video`(`id`,`nama_kategori`) values (5,'Murotal Ustad Hanan Attaki, LC');

/*Table structure for table `t_kebutuhan` */

CREATE TABLE `t_kebutuhan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_fundraising` int(4) NOT NULL,
  `nama_kebutuhan` varchar(50) NOT NULL,
  `nominal` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_fund` (`id_fundraising`),
  CONSTRAINT `fk_id_fund` FOREIGN KEY (`id_fundraising`) REFERENCES `t_fundraising` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `t_kebutuhan` */

insert  into `t_kebutuhan`(`id`,`id_fundraising`,`nama_kebutuhan`,`nominal`) values (1,1,'beras','9000000');
insert  into `t_kebutuhan`(`id`,`id_fundraising`,`nama_kebutuhan`,`nominal`) values (2,1,'telor ayam','200000');
insert  into `t_kebutuhan`(`id`,`id_fundraising`,`nama_kebutuhan`,`nominal`) values (3,1,'mie instan','1500000');
insert  into `t_kebutuhan`(`id`,`id_fundraising`,`nama_kebutuhan`,`nominal`) values (4,1,'bumbu','1000000');
insert  into `t_kebutuhan`(`id`,`id_fundraising`,`nama_kebutuhan`,`nominal`) values (5,1,'Uang saku pengajar','45000000');

/*Table structure for table `t_komentar` */

CREATE TABLE `t_komentar` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_artikel` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `komentar` text,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `status` enum('Menunggu','Diterima') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_artikel_komentar` (`id_artikel`),
  CONSTRAINT `fk_id_artikel_komentar` FOREIGN KEY (`id_artikel`) REFERENCES `t_artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `t_komentar` */

insert  into `t_komentar`(`id`,`id_artikel`,`nama`,`email`,`komentar`,`tanggal`,`jam`,`status`) values (1,3,'irobby','irobbyyusuf08@gmail.com','bagus sangat bermanfaat\r\n','2016-10-13','09:06:01','Diterima');
insert  into `t_komentar`(`id`,`id_artikel`,`nama`,`email`,`komentar`,`tanggal`,`jam`,`status`) values (2,3,'Ruston','rustonpir@gmail.com','mantap\r\n','2016-10-13','12:06:01','Diterima');
insert  into `t_komentar`(`id`,`id_artikel`,`nama`,`email`,`komentar`,`tanggal`,`jam`,`status`) values (6,3,'Admin','kontak.muqtahfidz@gmail.com','terima kasih\r\n','2016-10-13','03:23:10','Diterima');

/*Table structure for table `t_pemasukan` */

CREATE TABLE `t_pemasukan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_fundraising` int(4) NOT NULL,
  `id_donatur` int(4) NOT NULL,
  `nominal` varchar(18) DEFAULT NULL,
  `tgl_pemasukan` int(3) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_donatur_pemasukan` (`id_donatur`),
  KEY `fk_id_fundraising_pemasukan` (`id_fundraising`),
  CONSTRAINT `fk_id_fundraising_pemasukan` FOREIGN KEY (`id_fundraising`) REFERENCES `t_fundraising` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_id_donatur_pemasukan` FOREIGN KEY (`id_donatur`) REFERENCES `t_donatur` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `t_pemasukan` */

insert  into `t_pemasukan`(`id`,`id_fundraising`,`id_donatur`,`nominal`,`tgl_pemasukan`,`keterangan`) values (1,1,3,'1500000',21,'ada lagi lagi');
insert  into `t_pemasukan`(`id`,`id_fundraising`,`id_donatur`,`nominal`,`tgl_pemasukan`,`keterangan`) values (3,1,1,'2000000',22,'bulan depan nambah');
insert  into `t_pemasukan`(`id`,`id_fundraising`,`id_donatur`,`nominal`,`tgl_pemasukan`,`keterangan`) values (5,1,1,'5000000',22,'');

/*Table structure for table `t_pesan` */

CREATE TABLE `t_pesan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(40) NOT NULL,
  `email_pengirim` varchar(40) DEFAULT NULL,
  `subjek` varchar(30) DEFAULT NULL,
  `pesan` text,
  `tanggal` date DEFAULT NULL,
  `status_pesan` enum('baru','dibaca') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_pesan` */

insert  into `t_pesan`(`id`,`nama_pengirim`,`email_pengirim`,`subjek`,`pesan`,`tanggal`,`status_pesan`) values (1,'irobby','irobbyyusuf08@gmail.com','coba0coba','bismillahirrahmanirrahim','2016-10-12','baru');

/*Table structure for table `t_realisasi` */

CREATE TABLE `t_realisasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_fundraising` int(4) NOT NULL,
  `realisasi_kebutuhan` varchar(50) NOT NULL,
  `nominal` varchar(18) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT '-',
  `tgl_realisasi` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_fund_realisasi` (`id_fundraising`),
  CONSTRAINT `fk_id_fund_realisasi` FOREIGN KEY (`id_fundraising`) REFERENCES `t_fundraising` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_realisasi` */

insert  into `t_realisasi`(`id`,`id_fundraising`,`realisasi_kebutuhan`,`nominal`,`keterangan`,`tgl_realisasi`) values (6,1,'telor ayam','100000','kemarin 1 kg\r\n',15);
insert  into `t_realisasi`(`id`,`id_fundraising`,`realisasi_kebutuhan`,`nominal`,`keterangan`,`tgl_realisasi`) values (9,1,'beli kopi grande','10000','3 hari sekali\r\n',12);
insert  into `t_realisasi`(`id`,`id_fundraising`,`realisasi_kebutuhan`,`nominal`,`keterangan`,`tgl_realisasi`) values (10,1,'makan sehari-hari','150000','',12);
insert  into `t_realisasi`(`id`,`id_fundraising`,`realisasi_kebutuhan`,`nominal`,`keterangan`,`tgl_realisasi`) values (11,1,'bumbu kecap','75000','',11);
insert  into `t_realisasi`(`id`,`id_fundraising`,`realisasi_kebutuhan`,`nominal`,`keterangan`,`tgl_realisasi`) values (12,1,'beli teh','25000','asal',14);

/*Table structure for table `t_user` */

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `nama_user` varbinary(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('aktif','blokir') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`),
  KEY `FK_sys_users_sys_group_users` (`id_group`),
  CONSTRAINT `FK_users_group_users` FOREIGN KEY (`id_group`) REFERENCES `t_group_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

insert  into `t_user`(`id`,`id_group`,`nama_user`,`username`,`password`,`status`) values (1,1,'Muhammad Irobby','irobby123','21232f297a57a5a743894a0e4a801fc3','aktif');
insert  into `t_user`(`id`,`id_group`,`nama_user`,`username`,`password`,`status`) values (9,39,'Muhammad Irobby Yusuf','admin1','e00cf25ad42683b3df678c61f42c6bda','aktif');
insert  into `t_user`(`id`,`id_group`,`nama_user`,`username`,`password`,`status`) values (11,1,'AdminSuper','admins','2aefc34200a294a3cc7db81b43a81873','aktif');

/*Table structure for table `t_video` */

CREATE TABLE `t_video` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(4) DEFAULT NULL,
  `judul_video` varchar(50) NOT NULL,
  `link` varchar(120) NOT NULL,
  `tampilkan` enum('Tidak','Ya') DEFAULT NULL,
  `tgl_publish` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_kategori_video` (`id_kategori`),
  CONSTRAINT `fk_id_kategori_video` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori_video` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_video` */

insert  into `t_video`(`id`,`id_kategori`,`judul_video`,`link`,`tampilkan`,`tgl_publish`) values (2,5,'Surah Maryam (1 - 15)','https://www.youtube.com/watch?v=rWaFK16vwyI','Ya','2016-09-10 02:56:19');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
