<?php
  @session_start();
  if(isset($_SESSION["quantriEBIZ"]))
  {
    $quantri=$_SESSION["quantriEBIZ"];
	$id_danhmuc=$_SESSION["danhmuc"];
	$username=$_SESSION["username"];
	$level=$_SESSION["level"];
  }else{
    echo "<script language='javascript'>parent.parent.location='../edit';</script>";
  }
?>
<?php
  include("FCKeditor/fckeditor.php") ;
  require("lang/vie.php");
  require('connect.php');
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
  if(isset($_GET["id"]))
  {
    $id=$_GET["id"];
    if($id!=0)
    {
      $sql="select * from gws_danhmuc where id=$id";  
      $result=mysql_query($sql);	
	  $row=mysql_fetch_array($result);
	  $chuoihienthi=$row["ten$lang"];
    }
  }
  
  switch($kieunhap)
  {
    case "1":require("quantridanhmuc/formSuamuc.php");break;
	case "form_suanoidung":require("quantrinoidung/formSuanoidung.php");break;
	case "form_suatin":require("quantritintuc/formSuatin.php");break;
	case "form_suatuvan":require("quantrituvan/formSuatin.php");break;
	case "form_suagiaovien":require("quantrigiaovien/edit.php");break;
	case "form_suaanh":require("quantrithuvienanh/formSuaanh.php");break;
	case "form_sualogo":require("quantrilogo/formSualogo.php");break;
	case "form_suavideo":require("quantrivideo/formSualogo.php");break;
	case "form_suaraovat":require("quantriraovat/formSuaraovat.php");break;
	case "form_suacauhoi":require("quantrihoidap/formSuacauhoi.php");break;
	case "form_suafile":require("quantrifile/formSuasanpham.php");break;
	case "form_suacauhoithamdo":require("quantrithamdo/formSuacauhoithamdo.php");break;
	case "form_suatraloithamdo":require("quantrithamdo/formSuacautraloithamdo.php");break;	
	case "form_suasanpham":require("quantridiemthi/formSuasanpham.php");break;
	case "form_suamonhoc":require("quantrimonhoc/edit.php");break;
	case "form_suakhoahoc":require("quantrikhoahoc/edit.php");break;
	case "form_suadonhang":require("quantrisanpham/danhsachkhachhang.php");break;
	case "form_suadownload":require("quantridownload/edit.php");break;
	case "form_suavanbanluat":require("quantrivanbanluat/edit.php");break;
	case "form_suakhachhang":require("quantrikhachhang/edit.php");break;	
	case "form_suadanhba":require("quantridanhba/edit.php");break;
	case "form_suathutuchanhchinh":require("quantrithutuchanhchinh/edit.php");break;	
	
	default:require("quantridanhmuc/formSuamuc.php");break;
  }
?>
