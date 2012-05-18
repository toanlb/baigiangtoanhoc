-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 13, 2012 at 06:02 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `vtes`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `gws_admin`
-- 

CREATE TABLE `gws_admin` (
  `id` int(11) NOT NULL auto_increment,
  `id_danhmuc` int(11) NOT NULL default '0',
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `level` varchar(255) NOT NULL default 'bthuong',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `gws_admin`
-- 

INSERT INTO `gws_admin` VALUES (1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bthuong', '2011-11-01 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `gws_cauhoithamdo`
-- 

CREATE TABLE `gws_cauhoithamdo` (
  `id_cauhoithamdo` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `cauhoithamdo` varchar(255) NOT NULL default '',
  `cauhoithamdo_eng` varchar(255) NOT NULL default '',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  `selected` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_cauhoithamdo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_cauhoithamdo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_dangky`
-- 

CREATE TABLE `gws_dangky` (
  `id_lienhe` int(11) NOT NULL auto_increment,
  `id_parent` int(2) NOT NULL default '0',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tenkhach` varchar(255) NOT NULL,
  `gioitinh` varchar(100) NOT NULL,
  `nghe` varchar(225) NOT NULL,
  `ngaysinh` varchar(50) NOT NULL,
  `didong` int(12) NOT NULL default '0',
  `codinh` int(12) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `monhoc` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `diachitt` varchar(255) NOT NULL,
  `tenbome` varchar(255) NOT NULL,
  `dtbome` int(12) NOT NULL,
  `noilv` varchar(225) NOT NULL,
  `nhanmail` varchar(100) NOT NULL,
  `khoahoc` varchar(255) NOT NULL,
  `diemnv` int(2) NOT NULL,
  `tgdat` varchar(225) NOT NULL,
  `tghoc` varchar(100) NOT NULL,
  `ngayhoc` varchar(100) NOT NULL,
  `tgktra` varchar(50) NOT NULL,
  `nvduhoc` varchar(225) NOT NULL,
  `quocgia` varchar(225) NOT NULL,
  `hinhthuc` varchar(255) NOT NULL,
  `tgduhoc` varchar(255) NOT NULL,
  `cauhoi` text NOT NULL,
  `nhanhb` text NOT NULL,
  `biet1` text NOT NULL,
  `biet2` text NOT NULL,
  `xuly` int(11) NOT NULL default '0',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_lienhe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_dangky`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_danhmuc`
-- 

CREATE TABLE `gws_danhmuc` (
  `id` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `id_truycap` int(11) NOT NULL default '0',
  `ten` varchar(255) NOT NULL default '',
  `ten_eng` varchar(255) NOT NULL default '',
  `icon_menu` text NOT NULL,
  `tukhoa` varchar(255) NOT NULL default '',
  `kieunhap` varchar(255) NOT NULL default '1',
  `chonlen_menu` varchar(5) NOT NULL default 'off',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `tukhoa` (`tukhoa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `gws_danhmuc`
-- 

INSERT INTO `gws_danhmuc` VALUES (1, 0, 0, 'Quáº£ng cÃ¡o top', '', '', 'quang-cao-top', '1', 'off', '2012-05-13 13:37:39');
INSERT INTO `gws_danhmuc` VALUES (2, 1, 0, 'Danh sÃ¡ch', '', '', '1_WqWX0d55a0SOnp1v8uK0', 'ds_logo', 'off', '2012-05-13 13:38:09');
INSERT INTO `gws_danhmuc` VALUES (3, 1, 0, 'ThÃªm má»›i', '', '', '1_EJ6d7oZ6xSWKuUiA4HTD', 'form_themlogo', 'off', '2012-05-13 13:38:30');
INSERT INTO `gws_danhmuc` VALUES (4, 0, 0, 'BÃ i giáº£ng', '', '', 'bai-giang', '1', 'off', '2012-05-13 16:55:14');
INSERT INTO `gws_danhmuc` VALUES (8, 4, 0, 'ThÃªm má»›i', '', '', '4_SZ3k0XFD2m235o1wJMYw', 'form_themfile', 'off', '2012-05-13 16:59:38');
INSERT INTO `gws_danhmuc` VALUES (7, 4, 0, 'Danh sÃ¡ch bÃ i giáº£ng', '', '', '4_YtrYmZwEQl4nwMU5Z1og', 'ds_file', 'off', '2012-05-13 16:59:19');

-- --------------------------------------------------------

-- 
-- Table structure for table `gws_diemthi`
-- 

CREATE TABLE `gws_diemthi` (
  `id_diemthi` int(11) NOT NULL auto_increment,
  `id_nsx` int(10) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `sbd` varchar(20) NOT NULL,
  `hovaten` varchar(50) NOT NULL,
  `dienthoai` int(15) NOT NULL,
  `diachi` text NOT NULL,
  `mail` text NOT NULL,
  `khoahoc` text NOT NULL,
  `monthi1` int(2) NOT NULL,
  `monthi2` int(2) NOT NULL,
  `monthi3` int(2) NOT NULL,
  `monthi4` int(2) NOT NULL,
  `kiemduyet` int(2) NOT NULL,
  `capnhat` datetime NOT NULL,
  PRIMARY KEY  (`id_diemthi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_diemthi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_faq`
-- 

CREATE TABLE `gws_faq` (
  `id_faq` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `tieude` text NOT NULL,
  `tieude_eng` text NOT NULL,
  `tieude_chin` text NOT NULL,
  `anhtrichdan` text NOT NULL,
  `trichdan` text NOT NULL,
  `trichdan_eng` text NOT NULL,
  `trichdan_chin` text NOT NULL,
  `noidung` longblob NOT NULL,
  `noidung_eng` longblob NOT NULL,
  `noidung_chin` longblob NOT NULL,
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  `kiemduyet` int(11) NOT NULL default '0',
  `tieudiem` int(11) NOT NULL default '0',
  `hoten` varchar(255) NOT NULL default '',
  `diachi` varchar(255) NOT NULL default '',
  `dienthoai` varchar(25) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id_faq`),
  KEY `id_parent` (`id_parent`),
  KEY `kiemduyet` (`kiemduyet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_faq`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_giohang`
-- 

CREATE TABLE `gws_giohang` (
  `id` int(11) NOT NULL auto_increment,
  `sess` blob,
  `id_sp` int(11) default NULL,
  `soluong` int(11) default NULL,
  `capnhat` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_giohang`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_khachhang`
-- 

CREATE TABLE `gws_khachhang` (
  `id` int(11) NOT NULL auto_increment,
  `sess` blob,
  `tenkhach` varchar(253) default NULL,
  `email` varchar(253) default NULL,
  `dienthoai` varchar(253) default NULL,
  `tieude` varchar(253) default NULL,
  `yeucau` varchar(253) default NULL,
  `capnhat` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_khachhang`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_khoahoc`
-- 

CREATE TABLE `gws_khoahoc` (
  `id_kh` int(11) NOT NULL auto_increment,
  `makh` varchar(25) NOT NULL,
  `tenkh` text,
  `username` varchar(25) NOT NULL,
  `anh` text NOT NULL,
  `sobai` varchar(25) NOT NULL,
  `hocphi` varchar(25) NOT NULL,
  `trichdan` text,
  `noidung` text,
  `capnhat` datetime default '0000-00-00 00:00:00',
  `kiemduyet` int(2) NOT NULL,
  `khmoi` int(2) NOT NULL,
  `khmoi1` int(2) NOT NULL,
  `khmoi2` int(2) NOT NULL,
  `khmoi3` int(2) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY  (`id_kh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_khoahoc`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_lienhe`
-- 

CREATE TABLE `gws_lienhe` (
  `id_lienhe` int(11) NOT NULL auto_increment,
  `id_parent` int(2) NOT NULL default '0',
  `tenkhach` varchar(255) NOT NULL default '',
  `changbay` varchar(100) NOT NULL,
  `ngaydi` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL default '',
  `dienthoai` int(11) NOT NULL default '0',
  `diachi` varchar(255) NOT NULL default '',
  `tieude` varchar(255) NOT NULL default '',
  `noidung` text NOT NULL,
  `xuly` int(11) NOT NULL default '0',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_lienhe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_lienhe`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_logo`
-- 

CREATE TABLE `gws_logo` (
  `id_logo` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `logo` varchar(255) NOT NULL default '',
  `tieude` varchar(255) NOT NULL default '',
  `lienket` varchar(255) NOT NULL default '',
  `rong` int(11) NOT NULL,
  `cao` int(11) NOT NULL,
  `type` enum('0','1') NOT NULL,
  `solanclick` int(11) NOT NULL default '0',
  `kiemduyet` tinyint(2) NOT NULL default '0',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_logo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `gws_logo`
-- 

INSERT INTO `gws_logo` VALUES (1, 1, '/UserFiles/Image/slide-2.jpg', '', 'http://hvt.vn/', 0, 0, '0', 0, 1, '2012-05-13 13:39:34');
INSERT INTO `gws_logo` VALUES (2, 1, '/UserFiles/Image/slide-1.jpg', '', 'http://hvt.vn/', 0, 0, '0', 0, 1, '2012-05-13 13:39:43');

-- --------------------------------------------------------

-- 
-- Table structure for table `gws_monhoc`
-- 

CREATE TABLE `gws_monhoc` (
  `id_mh` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `tenmh` varchar(25) NOT NULL,
  `noidung` text NOT NULL,
  `hocphi` varchar(25) NOT NULL,
  `anh` text NOT NULL,
  `tinmoi` int(2) NOT NULL,
  `tinnong` int(2) NOT NULL,
  `kiemduyet` int(2) NOT NULL,
  `capnhat` datetime NOT NULL,
  PRIMARY KEY  (`id_mh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_monhoc`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_nhasanxuat`
-- 

CREATE TABLE `gws_nhasanxuat` (
  `id_nsx` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL,
  `ten_nsx` varchar(255) NOT NULL,
  `logo_nsx` text NOT NULL,
  `kiemduyet` int(1) NOT NULL,
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_nsx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_nhasanxuat`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_noidung`
-- 

CREATE TABLE `gws_noidung` (
  `id_noidung` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `tieude` text NOT NULL,
  `tieude_eng` text NOT NULL,
  `tieude_chin` text NOT NULL,
  `noidung` longblob NOT NULL,
  `noidung_eng` longblob NOT NULL,
  `noidung_chin` longblob NOT NULL,
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  `kiemduyet` int(11) NOT NULL default '0',
  `tieudiem` int(11) NOT NULL default '0',
  `user` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_noidung`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_noidung`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_sanpham`
-- 

CREATE TABLE `gws_sanpham` (
  `id_sp` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `tensp` text NOT NULL,
  `tensp_eng` text NOT NULL,
  `modelsp` varchar(255) NOT NULL default '',
  `anhsp` text NOT NULL,
  `kho` int(1) NOT NULL default '1',
  `gioithieusp` text NOT NULL,
  `gioithieusp_eng` text NOT NULL,
  `chitietsp` longblob NOT NULL,
  `chitietsp_eng` longblob NOT NULL,
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  `kiemduyet` int(1) NOT NULL default '0',
  `filesp` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_sp`),
  KEY `id_parent` (`id_parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_sanpham`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_thuvien`
-- 

CREATE TABLE `gws_thuvien` (
  `id_thuvien` int(10) NOT NULL auto_increment,
  `mathuvien` varchar(25) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_mh` int(12) NOT NULL,
  `id_parent` int(10) NOT NULL,
  `tentl` text NOT NULL,
  `tentl_eng` varchar(250) NOT NULL,
  `hocphi` varchar(25) NOT NULL,
  `gioithieu_eng` text NOT NULL,
  `file` text NOT NULL,
  `anh` text NOT NULL,
  `gioithieu` text NOT NULL,
  `capnhat` datetime NOT NULL,
  `kiemduyet` int(2) NOT NULL,
  `tinmoi` int(11) NOT NULL,
  `tinnong` int(2) NOT NULL,
  PRIMARY KEY  (`id_thuvien`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_thuvien`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_tinbai`
-- 

CREATE TABLE `gws_tinbai` (
  `id_tin` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `id_parent` int(11) NOT NULL default '0',
  `tieude` text NOT NULL,
  `tieude_eng` text NOT NULL,
  `tieude_chin` text NOT NULL,
  `keyword` text NOT NULL,
  `anhtrichdan` text NOT NULL,
  `trichdan` text NOT NULL,
  `trichdan_eng` text NOT NULL,
  `trichdan_chin` text NOT NULL,
  `noidung` longblob NOT NULL,
  `noidung_eng` longblob NOT NULL,
  `noidung_chin` longblob NOT NULL,
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  `kiemduyet` int(11) NOT NULL default '0',
  `tieudiem` int(11) NOT NULL default '0',
  `tinnong` int(11) NOT NULL default '0',
  `gio_hienthi` datetime NOT NULL default '0000-00-00 00:00:00',
  `luotxem` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_tin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_tinbai`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_traloithamdo`
-- 

CREATE TABLE `gws_traloithamdo` (
  `id_traloithamdo` int(11) NOT NULL auto_increment,
  `id_parent` int(11) NOT NULL default '0',
  `traloithamdo` varchar(255) NOT NULL default '',
  `traloithamdo_eng` varchar(255) NOT NULL default '',
  `soluongchon` int(11) NOT NULL default '0',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_traloithamdo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_traloithamdo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `gws_ykien`
-- 

CREATE TABLE `gws_ykien` (
  `id_lienhe` int(11) NOT NULL auto_increment,
  `id_parent` int(2) NOT NULL default '0',
  `tenkhach` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `dienthoai` int(11) NOT NULL default '0',
  `diachi` varchar(255) NOT NULL default '',
  `tieude` varchar(255) NOT NULL default '',
  `noidung` text NOT NULL,
  `xuly` int(11) NOT NULL default '0',
  `capnhat` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id_lienhe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gws_ykien`
-- 

