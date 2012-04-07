<?php
  require('connect.php');
  require("lang/vie.php");
  include("FCKeditor/fckeditor.php") ;
  if(isset($_GET["id_parent"]))
  {
    $id_parent=$_GET["id_parent"];
	if($id_parent=="") $id_parent=0;
  }	
  else $id_parent=0;  
  
  if(isset($_GET["kieunhap"]))
  {
    $kieunhap=$_GET["kieunhap"];
	if($kieunhap=="") $kieunhap=1;
  }

  if(isset($_GET["idxp"])) $xp=$_GET["idxp"];  
  else $xp=$id_danhmuc;
  
  if($id_parent=="") $id_parent=0;  
  $chuoihienthi="Home";
  if($id_parent!=0)
  {
    $sql="select * from gws_danhmuc where id=$id_parent";  
    $result=mysql_query($sql);	
	$row=mysql_fetch_array($result);
	$chuoihienthi=$row["ten$lang"];
  }
  
  switch($kieunhap)
  {

    case "1":require("quantridanhmuc/formThemmuc.php");break;
	case "form_themtin":require("quantritintuc/formThemtin.php");break;
	case "form_themtuvan":require("quantrituvan/formThemtin.php");break;
	case "form_themtour":require("quantritours/formThemtour.php");break;
	case "form_themhotel":require("quantrihotels/formThemhotel.php");break;
	case "form_themanh":require("quantridanhmuc/formThemanh.php");break;
	case "dsanh":require("quantridanhmuc/danhsachanh.php");break;
	case "form_themfile":require("quantrifile/formThemsanpham.php");break;
	case "form_themgiaovien":require("quantrigiaovien/add.php");break;
	case "form_themmonhoc":require("quantrimonhoc/add.php");break;
	case "form_themkhoahoc":require("quantrikhoahoc/add.php");break;
	case "ds_donhang":require("quantrisanpham/danhsachkhachhang.php");break;
	case "form_themdanhba":require("quantridanhba/add.php");break;
	case "form_themdownload":require("quantridownload/add.php");break;
	
	case "form_themthutuchanhchinh":require("quantrithutuchanhchinh/add.php");break;
	default:require("quantridanhmuc/formThemmuc.php");break;
  }
?>
