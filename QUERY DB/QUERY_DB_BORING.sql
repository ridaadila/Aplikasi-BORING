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
   ID_USER              int not null,
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
   ID_JENIS_PENYEDIA    int not null,
   NAMA                 varchar(255) not null,
   primary key (ID_JENIS_PENYEDIA)
);

/*==============================================================*/
/* Table: PENYEDIA_LAYANAN                                      */
/*==============================================================*/
create table PENYEDIA_LAYANAN (
   ID_PENYEDIA_LAYANAN  int not null,
   ID_USER              int not null,
   ID_JENIS_PENYEDIA    int not null,
   NAMA_TOKO_JASA       varchar(255) not null,
   ALAMAT               varchar(255) not null,
   NOMOR_TELEPON        varchar(20) not null,
   DESKRIPSI_TOKO_JASA  varchar(500),
   primary key (ID_PENYEDIA_LAYANAN)
);

/*==============================================================*/
/* Table: PRODUK_JASA_CATERING                                  */
/*==============================================================*/
create table PRODUK_JASA_CATERING (
   ID_JASA_CATERING     int not null,
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
   ID_JASA_DEKORASI     int not null,
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
   ID_PRODUK_JASA_FOTOGRAFER int not null,
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
   ID_PRODUK_TEMPAT_AKAD int not null,
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
   ID_FOTO_PRODUK_JASA_CATERING int not null,
   ID_JASA_CATERING     int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_JASA_CATERING)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_JASA_DEKORASI                             */
/*==============================================================*/
create table FOTO_PRODUK_JASA_DEKORASI (
   ID_FOTO_PRODUK_JASA_DEKORASI int not null,
   ID_JASA_DEKORASI     int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_JASA_DEKORASI)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_JASA_FOTOGRAFER                           */
/*==============================================================*/
create table FOTO_PRODUK_JASA_FOTOGRAFER (
   ID_FOTO_PRODUK_JASA_FOTOGRAFER int not null,
   ID_PRODUK_JASA_FOTOGRAFER int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_JASA_FOTOGRAFER)
);

/*==============================================================*/
/* Table: FOTO_PRODUK_TEMPAT_AKAD_NIKAH                         */
/*==============================================================*/
create table FOTO_PRODUK_TEMPAT_AKAD_NIKAH (
   ID_FOTO_PRODUK_TEMPAT_AKAD_NIKAH int not null,
   ID_PRODUK_TEMPAT_AKAD int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_PRODUK_TEMPAT_AKAD_NIKAH)
);

/*==============================================================*/
/* Table: FOTO_TOKO                                             */
/*==============================================================*/
create table FOTO_TOKO (
   ID_FOTO_TOKO         int not null,
   ID_PENYEDIA_LAYANAN  int not null,
   FILE                 longblob not null,
   primary key (ID_FOTO_TOKO)
);

/*==============================================================*/
/* Table: TRANSAKSI                                             */
/*==============================================================*/
create table TRANSAKSI (
   ID_TRANSAKSI         int not null,
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
   ID_TRANSAKSI_SEMENTARA int not null,
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

INSERT INTO `jenis_penyedia_layanan` (`ID_JENIS_PENYEDIA`, `NAMA`) VALUES
(1, 'Tempat akad nikah'),
(2, 'Catering'),
(3, 'Dekorasi'),
(4, 'Fotografer');

