/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/12/2021 04:51:58                          */
/*==============================================================*/


drop table if exists FOTO_PRODUK_JASA_CATERING;

drop table if exists FOTO_PRODUK_JASA_DEKORASI;

drop table if exists FOTO_PRODUK_JASA_FOTOGRAFER;

drop table if exists FOTO_PRODUK_TEMPAT_AKAD_NIKAH;

drop table if exists FOTO_TOKO;

drop table if exists JENIS_PENYEDIA_LAYANAN;

drop table if exists PENYEDIA_LAYANAN;

drop table if exists PRODUK_JASA_CATERING;

drop table if exists PRODUK_JASA_DEKORASI;

drop table if exists PRODUK_JASA_FOTOGRAFER;

drop table if exists PRODUK_TEMPAT_AKAD_NIKAH;

drop table if exists TRANSAKSI;

drop table if exists TRANSAKSI_SEMENTARA;

drop table if exists USERS;

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USERS  (
   ID_USER              int not null AUTO_INCREMENT,
   USERNAME             varchar(50) not null,
   EMAIL                varchar(50) not null,
   PASSWORD             varchar(255) not null,
   NAMA                 varchar(255) not null,
   ROLE                 char(1) not null,
   primary key (ID_USER)
);

/*==============================================================*/
/* Table: JENIS_PENYEDIA_LAYANAN                                */
/*==============================================================*/
create table JENIS_PENYEDIA_LAYANAN (
   ID_JENIS_PENYEDIA    int not null AUTO_INCREMENT,
   NAMA                 varchar(255) not null,
   primary key (ID_JENIS_PENYEDIA)
);

/*==============================================================*/
/* Table: PENYEDIA_LAYANAN                                      */
/*==============================================================*/
create table PENYEDIA_LAYANAN (
   ID_PENYEDIA_LAYANAN  int not null AUTO_INCREMENT,
   ID_USER              int not null,
   ID_JENIS_PENYEDIA    int not null,
   NAMA_TOKO_JASA       varchar(255) not null,
   ALAMAT               varchar(255) not null,
   NOMOR_TELEPON        varchar(20) not null,
   DESKRIPSI_TOKO_JASA  varchar(500),
   JENIS_KATEGORI       varchar(20),
   primary key (ID_PENYEDIA_LAYANAN)
);

/*==============================================================*/
/* Table: PRODUK_JASA_CATERING                                  */
/*==============================================================*/
create table PRODUK_JASA_CATERING (
   ID_JASA_CATERING     int not null AUTO_INCREMENT,
   ID_PENYEDIA_LAYANAN  int not null,
   NAMA_PAKET           varchar(50) not null,
   DESKRIPSI            varchar(500) not null,
   HARGA                int not null,
   DISKON               int,
   HARGA_SETELAH_DISKON int,
   primary key (ID_JASA_CATERING)
);

/*==============================================================*/
/* Table: PRODUK_JASA_DEKORASI                                  */
/*==============================================================*/
create table PRODUK_JASA_DEKORASI (
   ID_JASA_DEKORASI     int not null AUTO_INCREMENT,
   ID_PENYEDIA_LAYANAN  int not null,
   NAMA_PAKET           varchar(50) not null,
   DESKRIPSI            varchar(500) not null,
   HARGA                int not null,
   DISKON               int,
   HARGA_SETELAH_DISKON int,
   primary key (ID_JASA_DEKORASI)
);

/*==============================================================*/
/* Table: PRODUK_JASA_FOTOGRAFER                                */
/*==============================================================*/
create table PRODUK_JASA_FOTOGRAFER (
   ID_PRODUK_JASA_FOTOGRAFER int not null AUTO_INCREMENT,
   ID_PENYEDIA_LAYANAN  int not null,
   NAMA                 varchar(255) not null,
   DESKRIPSI            varchar(500) not null,
   HARGA                int not null,
   DISKON               int,
   HARGA_SETELAH_DISKON int,
   primary key (ID_PRODUK_JASA_FOTOGRAFER)
);

/*==============================================================*/
/* Table: PRODUK_TEMPAT_AKAD_NIKAH                              */
/*==============================================================*/
create table PRODUK_TEMPAT_AKAD_NIKAH (
   ID_PRODUK_TEMPAT_AKAD int not null AUTO_INCREMENT,
   ID_PENYEDIA_LAYANAN  int not null,
   NAMA                 varchar(255) not null,
   LOKASI               varchar(100) not null,
   DESKRIPSI            varchar(500) not null,
   HARGA                int not null,
   DISKON               int,
   HARGA_SETELAH_DISKON int,
   STATUS_KETERSEDIAAN  int not null,
   primary key (ID_PRODUK_TEMPAT_AKAD)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_JASA_CATERING                             */
/*==============================================================*/
create table FOTO_PRODUK_JASA_CATERING (
   ID_FOTO_PRODUK_JASA_CATERING int not null AUTO_INCREMENT,
   ID_JASA_CATERING     int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_JASA_CATERING)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_JASA_DEKORASI                             */
/*==============================================================*/
create table FOTO_PRODUK_JASA_DEKORASI (
   ID_FOTO_PRODUK_JASA_DEKORASI int not null AUTO_INCREMENT,
   ID_JASA_DEKORASI     int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_JASA_DEKORASI)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_JASA_FOTOGRAFER                           */
/*==============================================================*/
create table FOTO_PRODUK_JASA_FOTOGRAFER (
   ID_FOTO_PRODUK_JASA_FOTOGRAFER int not null AUTO_INCREMENT,
   ID_PRODUK_JASA_FOTOGRAFER int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_JASA_FOTOGRAFER)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_TEMPAT_AKAD_NIKAH                         */
/*==============================================================*/
create table FOTO_PRODUK_TEMPAT_AKAD_NIKAH (
   ID_FOTO_PRODUK_TEMPAT_AKAD_NIKAH int not null AUTO_INCREMENT,
   ID_PRODUK_TEMPAT_AKAD int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_TEMPAT_AKAD_NIKAH)
);

/*==============================================================*/
/* Table: FOTO_TOKO                                             */
/*==============================================================*/
create table FOTO_TOKO (
   ID_FOTO_TOKO         int not null AUTO_INCREMENT,
   ID_PENYEDIA_LAYANAN  int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_TOKO)
);

/*==============================================================*/
/* Table: TRANSAKSI                                             */
/*==============================================================*/
create table TRANSAKSI (
   ID_TRANSAKSI         int not null AUTO_INCREMENT,
   ID_USER              int not null,
   STATUS_PEMBAYARAN    int not null,
   LIST_BARANG          longtext not null,
   TOTAL_HARGA          int not null,
   BUKTI_PEMBAYARAN     longblob,
   primary key (ID_TRANSAKSI)
);

/*==============================================================*/
/* Table: TRANSAKSI_SEMENTARA                                   */
/*==============================================================*/
create table TRANSAKSI_SEMENTARA(
   ID_TRANSAKSI_SEMENTARA int not null AUTO_INCREMENT,
   ID_TRANSAKSI         int not null,
   ID_JASA_DEKORASI     int,
   ID_PRODUK_JASA_FOTOGRAFER int,
   ID_JASA_CATERING     int,
   ID_PRODUK_TEMPAT_AKAD int,
   primary key (ID_TRANSAKSI_SEMENTARA)
);

alter table FOTO_PRODUK_JASA_CATERING add constraint FK_DOKUMEN_FOTO_CATERING foreign key (ID_JASA_CATERING)
      references PRODUK_JASA_CATERING (ID_JASA_CATERING) on delete cascade on update cascade;

alter table FOTO_PRODUK_JASA_DEKORASI add constraint FK_DOKUMEN_FOTO_JASA_DEKORASI foreign key (ID_JASA_DEKORASI)
      references PRODUK_JASA_DEKORASI (ID_JASA_DEKORASI) on delete cascade on update cascade;

alter table FOTO_PRODUK_JASA_FOTOGRAFER add constraint FK_DOKUMEN_FOTOGRAFER foreign key (ID_PRODUK_JASA_FOTOGRAFER)
      references PRODUK_JASA_FOTOGRAFER (ID_PRODUK_JASA_FOTOGRAFER) on delete cascade on update cascade;

alter table FOTO_PRODUK_TEMPAT_AKAD_NIKAH add constraint FK_DOKUMEN_FOTO_TEMPAT_AKAD_NIKAH foreign key (ID_PRODUK_TEMPAT_AKAD)
      references PRODUK_TEMPAT_AKAD_NIKAH (ID_PRODUK_TEMPAT_AKAD) on delete cascade on update cascade;

alter table FOTO_TOKO add constraint FK_PENYEDIA_FOTO foreign key (ID_PENYEDIA_LAYANAN)
      references PENYEDIA_LAYANAN (ID_PENYEDIA_LAYANAN) on delete cascade on update cascade;

alter table PENYEDIA_LAYANAN add constraint FK_JENIS_PENYEDIA foreign key (ID_JENIS_PENYEDIA)
      references JENIS_PENYEDIA_LAYANAN (ID_JENIS_PENYEDIA) on delete cascade on update cascade;

alter table PENYEDIA_LAYANAN add constraint FK_USER_PENYEDIA_LAYANAN foreign key (ID_USER)
      references USERS (ID_USER) on delete cascade on update cascade;

alter table PRODUK_JASA_CATERING add constraint FK_PENYEDIA_PRODUK_JASA_CATERING foreign key (ID_PENYEDIA_LAYANAN)
      references PENYEDIA_LAYANAN (ID_PENYEDIA_LAYANAN) on delete cascade on update cascade;

alter table PRODUK_JASA_DEKORASI add constraint FK_PENYEDIA_PRODUK_DEKORASI foreign key (ID_PENYEDIA_LAYANAN)
      references PENYEDIA_LAYANAN (ID_PENYEDIA_LAYANAN) on delete cascade on update cascade;

alter table PRODUK_JASA_FOTOGRAFER add constraint FK_PENYEDIA_PRODUK_JASA_FOTOGRAFER foreign key (ID_PENYEDIA_LAYANAN)
      references PENYEDIA_LAYANAN (ID_PENYEDIA_LAYANAN) on delete cascade on update cascade;

alter table PRODUK_TEMPAT_AKAD_NIKAH add constraint FK_PENYEDIA_PRODUK_TEMPAT_AKAD foreign key (ID_PENYEDIA_LAYANAN)
      references PENYEDIA_LAYANAN (ID_PENYEDIA_LAYANAN) on delete cascade on update cascade;

alter table TRANSAKSI add constraint FK_MELAKUKAN_4 foreign key (ID_USER)
      references USERS (ID_USER) on delete cascade on update cascade;

alter table TRANSAKSI_SEMENTARA add constraint FK_MEMILIKI_11 foreign key (ID_TRANSAKSI)
      references TRANSAKSI (ID_TRANSAKSI) on delete cascade on update cascade;

alter table TRANSAKSI_SEMENTARA add constraint FK_MEMPUNYAI_10 foreign key (ID_JASA_DEKORASI)
      references PRODUK_JASA_DEKORASI (ID_JASA_DEKORASI) on delete cascade on update cascade;

alter table TRANSAKSI_SEMENTARA add constraint FK_MEMPUNYAI_7 foreign key (ID_PRODUK_JASA_FOTOGRAFER)
      references PRODUK_JASA_FOTOGRAFER (ID_PRODUK_JASA_FOTOGRAFER) on delete cascade on update cascade;

alter table TRANSAKSI_SEMENTARA add constraint FK_MEMPUNYAI_8 foreign key (ID_JASA_CATERING)
      references PRODUK_JASA_CATERING (ID_JASA_CATERING) on delete cascade on update cascade;

alter table TRANSAKSI_SEMENTARA add constraint FK_MEMPUNYAI_9 foreign key (ID_PRODUK_TEMPAT_AKAD)
      references PRODUK_TEMPAT_AKAD_NIKAH (ID_PRODUK_TEMPAT_AKAD) on delete cascade on update cascade;

INSERT INTO `users` (`ID_USER`, `USERNAME`, `EMAIL`, `PASSWORD`, `NAMA`, `ROLE`) VALUES
(1, 'ridaadila', 'ridaadila10@gmail.com', 'test123', 'Rida Adila', 'A');

INSERT INTO `jenis_penyedia_layanan` (`ID_JENIS_PENYEDIA`, `NAMA`) VALUES
(1, 'Tempat akad nikah'),
(2, 'Catering'),
(3, 'Dekorasi'),
(4, 'Fotografer');

INSERT INTO `penyedia_layanan` (`ID_PENYEDIA_LAYANAN`, `ID_USER`, `ID_JENIS_PENYEDIA`, `NAMA_TOKO_JASA`, `ALAMAT`, `NOMOR_TELEPON`, `DESKRIPSI_TOKO_JASA`, `JENIS_KATEGORI`) VALUES
(1, 1, 1, 'Masjid Al-Aqsha', 'Graha Sukodono', '0893248323', 'Masjid untuk tempat nikah', 'masjid'),
(2, 1, 1, 'Masjidil Halal', 'Wiyun 67 Surabaya', '09389482', 'Masjid untuk tempat akad & nikah', 'masjid'),
(3, 1, 1, 'Masjid Al Akbar', 'Jl. Gayungsari 89 Surabaya', '0315834387', 'Masjid al akbar surabaya untuk tempat akad & pernikahan', 'masjid'),
(4, 1, 1, 'Cathedral Of St. Virgin Mary Of Mount Carmel', 'Jl. Pabean Surabaya', '0328328493', 'Gereja utk pernikahan', 'gereja'),
(5, 1, 1, 'YHS Church', 'Jl. Kenjeran 78 Surabaya', '089829892', 'Gereja untuk tempat pernikahan', 'gereja'),
(6, 1, 1, 'GBI Suropati', 'Jl. Untung Suropati 88 Surabaya', '08799799779', 'Gereja untuk tempat pernikahan di surabaya', 'gereja'),
(7, 1, 1, 'Grand City Convention Hall', 'Jl. walikota mustajab', '089232982', 'convention hall untuk tempat pernikahan di surabaya', 'convention_hall'),
(8, 1, 1, 'Dyandra Convention Center', 'Jl. Basuki Rahmat No.93 -105, Embong Kaliasin, Kec. Genteng, Kota SBY', '0889797977', 'convention hall untuk tempat pernikahan di surabaya', 'convention_hall'),
(9, 1, 1, 'Surabaya Convention Center', 'Jl. Mayjen Yono Suwoyo No.2, Babatan, Kec. Wiyung, Kota SBY', '0738473847', 'convention hall untuk tempat pernikahan dan akad di sby', 'convention_hall'),
(10, 1, 1, 'hotel harris', 'jl. gubeng no 78 surabaya', '08898983928', 'hotel untuk tempat pernikahan dan akad di surabaya', 'hotel'),
(11, 1, 1, 'Java Paragon Hotel & Residence', 'Jl. Mayjen Sungkono No.101-103', '0889348398', 'hotel tempat akad dan pernikahan di surabaya', 'hotel'),
(12, 1, 1, 'LUMINOR Hotel', 'Jl. Raya Jemursari No.206-208', '088979799', 'hotel tempat untuk akad dan pernikahan di surabaya', 'hotel'),
(13, 1, 1, 'Singgasana Hotel Surabaya', 'Singgasana Hotel Surabaya', '0889797977', 'hotel untuk tempat pernikahan dan akad di surabaya', 'hotel'),
(14, 1, 4, 'Oky photography', 'Jl. Wisma Indah 2 No.K7/20, Gn. Anyar Tambak, Kec. Gn. Anyar, Kota SBY', '0879797997', 'jasa fotografer pernikahan di surabaya', 'foto_video'),
(15, 1, 4, 'Smart Foto Surabaya', 'Jl. Simo Mulyo Baru No.17, Simomulyo, Kec. Sukomanunggal, Kota SBY', '0829382938', 'Jasa foto dan video profesional untuk acara resmi skala kecil hingga besar. Termasuk jg wedding, prewed. Ditangani dengan ramah dan profesional. SFS juga sering bekerja sama dengan organisasi resmi, instansi negara, hingga pemerintah.', 'foto_video'),
(16, 1, 4, 'Jasa Foto Fotografer Wedding Prewedding | Maiyunanda Photo', 'Candi Lempung blok 47-E no.45, Lontar, Sambikerep, Manukan Kulon, Tandes, Surabaya City, East Java 60216', '082983299', 'Jasa fotografer pernikahan di surabaya', 'foto_video'),
(17, 1, 4, 'Jasa Foto deProject Photography', 'Candi Lempung blok 47-E no.45, Lontar, Sambikerep, Manukan Kulon, Tandes, Surabaya City, East Java 60216', '0316726772', 'jasa photobooth untuk berbagai macam acara', 'photobooth'),
(18, 1, 4, 'Hadient Photo | Jasa Foto di Surabaya', 'Hadient Photo | Jasa Foto di Surabaya', '036273627', 'jasa photobooth di surabaya', 'photobooth'),
(19, 1, 4, 'Jasa Fotografi Ds Citra', 'Jl. Klampis Jaya No.44, Klampis Ngasem, Kec. Sukolilo, Kota SBY, Jawa Timur 60116', '035162516', 'jasa photobooth untuk berbagai macam acara', 'photobooth'),
(20, 1, 2, 'Early Bird Catering', 'Jl. Simo Sidomulyo Baru No.23B, Petemon, Kec. Sawahan, Kota SBY', '031873872', 'jasa catering di surabaya', NULL),
(21, 1, 2, 'Catering bu ana & setia biro jasa', 'Asem Jajar VI No.22, RT.005/RW.03, Tembok Dukuh, Kec. Bubutan, Kota SBY, Jawa Timur 60173', '0813-8814-1617', 'jasa catering di surabaya', NULL),
(22, 1, 2, 'Putri Mandiri Catering', 'Jl. Petemon III No.97, Petemon, Kec. Sawahan, Kota SBY, Jawa Timur 60253', '031562728', 'jasa catering di surabaya', NULL),
(23, 1, 2, 'Jasa Catering Surabaya Fiona', 'Jl. Ikan Kerapu II No.16, Perak Bar., Kec. Krembangan, Kota SBY, Jawa Timur 60177', '089291289', 'jasa catering di surabaya', NULL),
(24, 1, 2, 'BUZET CATERING DIET SURABAYA', 'Jl. Ploso Tim. VI No.80 A, Ploso, Kec. Tambaksari, Kota SBY, Jawa Timur 60132', '0838-5766-1710', 'Catering di Surabaya', NULL),
(25, 1, 2, 'PT. Berkah Catering Nusantara - Surabaya', 'Royal Plaza Lt.G Blok C2-27, Wonokromo, Kec. Wonokromo, Kota SBY, Jawa Timur 60243', '08119823928', 'jasa catering di surabaya', NULL),
(26, 1, 3, 'Aris Decoration', 'Jl. Jojoran I No.89, Mojo, Kec. Gubeng, Kota SBY, Jawa Timur 60285', '0815-5579-9780', 'One stop service wedding organizer. Harga yg sangat terjangkau dengan kualitas terbaik. Pelayanan sangat memuaskan. Ibu aris dan mas aris melayani dengan sangat baik dan menuruti semua yg kita inginkan', NULL),
(27, 1, 3, 'Mitra Flower & Decorations', 'Jl. Gubeng Kertajaya VII G No.23 A, Gubeng, Kec. Gubeng, Kota SBY, Jawa Timur 60286', '982320029', 'Kami melayani di bidang jasa dekorasi pelaminan utk calon pengantin. Hubungi kami utk detail', NULL),
(28, 1, 3, 'Twister Art Decoration / jasa dekorasi surabaya/wedding dekorasi', 'Jl. Manukan Lor VII No.55, kel. banjarsuguhan, Kec. Tandes, Kota SBY, Jawa Timur 60197', '0813-3234-5323', 'Kami menerima dekorasi wedding, dekorasi akad, make up, b\'day anak/dewasa, baby shower, photo booth, pembuatan patung styrofoam dan semen, etc', NULL),
(29, 1, 3, 'Edelweiss_artt Decoration', 'Jagir Sidomukti V No.57, Jagir, Kec. Wonokromo, Kota SBY, Jawa Timur 60244', '092093029', 'Kami merupakan salah satu vendor yang bergerak dalam jasa dekorasi untuk berbagai event, antara lain ultah, siraman, pengajian, lamaran, wedding, backdrop event / pameran', NULL),
(30, 1, 3, 'Amadea Decoration & Organizer Surabaya', 'Gunung anyar harapan ZA 30, Gn. Anyar, Kec. Gn. Anyar, Kota SBY, Jawa Timur 60294', '0822-3144-1501', 'jasa dekorasi pernikahan surabaya', NULL),
(31, 1, 3, 'PF Decoration', 'Jl. Manyar Kerta Adi VI No.35, Manyar Sabrangan, Kec. Mulyorejo, Kota SBY, Jawa Timur 60116', '0898989899', 'Category Event Styling & Decor. Address Surabaya. instagram @pfdecoration. email pf.decors@gmail.com. Phone 0816-513-969. whatsapp +0816-513-969', NULL);




