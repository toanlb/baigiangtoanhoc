
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
  require('connect.php');
  require("lang/vie.php");
  include("FCKeditor/fckeditor.php") ;
?>


<div style="padding:0 1 0 1">
<?php
  if(isset($_GET["id_parent"]))
  {
    $id_parent=$_GET["id_parent"];
	if($id_parent=="") $id_parent=$id_danhmuc;
  }	
  else $id_parent=$id_danhmuc;  
  
  if(isset($_GET["kieunhap"]))
  {
    $kieunhap=$_GET["kieunhap"];
	if($kieunhap=="")
	{
	  $sql="select kieunhap from gws_danhmuc where id=$id_parent";
	  $rs=mysql_query($sql);
	  $ro=mysql_fetch_array($rs);
  	  $kieunhap=$ro["kieunhap"];
	}
  }else $kieunhap=1;
  
  if(isset($_GET["idxp"])) $xp=$_GET["idxp"];  
  else $xp=$id_danhmuc;
  
  function cap($idchimuc)
  {
    $d=0;
    while($idchimuc!=0)
    {
       $sql="select id_parent from gws_danhmuc where id=$idchimuc";
	   $resultcap=mysql_query($sql);
	   $row=mysql_fetch_array($resultcap);
	   $idchimuc=$row["id_parent"];	  
	   $d++;
    }  
	return $d;
  }
?>
<?php   
  if($id_parent=="") $id_parent=0;
  $chuoihienthi="";
  if($id_parent!=0)
  {
    $sql="select * from gws_danhmuc where id=$id_parent";  
    $result=mysql_query($sql);	
	$row=mysql_fetch_array($result);
	$chuoihienthi=$row["ten$lang"];
  }
  switch($kieunhap)
  {
	
	case "form_qlmuc_dsmuc":require("quantridanhmuc/danhsachmuc.php");break;
	
	case "1":require("list.php");break;
	
	case "ds_noidung":require("quantrinoidung/danhsachnoidung.php");break;
	case "form_themnoidung":require("quantrinoidung/formThemnoidung.php");break;
	
	case "ds_tin":require("quantritintuc/danhsachtin.php");break;
	case "form_themtin":require("quantritintuc/formThemtin.php");break;
	
	case "ds_tuvan":require("quantrituvan/danhsachtin.php");break;
	case "form_themtuvan":require("quantrituvan/formThemtin.php");break;
	
	case "dsanh":require("quantrithuvienanh/danhsachanh.php");break;
	case "form_themanh":require("quantrithuvienanh/formThemanh.php");break;
	case "form_suaanh":require("quantrithuvienanh/formSuaanh.php");break;
	
	case "ds_file":require("quantrifile/danhsachsanpham.php");break;
	case "form_themfile":require("quantrifile/formThemsanpham.php");break;
	
	case "ds_giaovien":require("quantrigiaovien/list.php");break;
	case "form_themgiaovien":require("quantrigiaovien/add.php");break;
	
	case "ds_diemthi":require("quantridiemthi/danhsachsanpham.php");break;
	case "form_themdiemthi":require("quantridiemthi/formThemsanpham.php");break;
	
		
	case "ds_logo":require("quantrilogo/danhsachlogo.php");break;
	case "form_themlogo":require("quantrilogo/formThemlogo.php");break;
	
	case "ds_video":require("quantrivideo/danhsachlogo.php");break;
	case "form_themvideo":require("quantrivideo/formThemlogo.php");break;
	
	
	case "ds_cauhoithamdo":require("quantrithamdo/danhsachcauhoithamdo.php");break;
	case "form_themcauhoithamdo":require("quantrithamdo/formThemcauhoithamdo.php");break;
	case "ds_cautraloithamdo":require("quantrithamdo/danhsachcautraloithamdo.php");break;
	case "form_themcautraloithamdo":require("quantrithamdo/formThemcautraloithamdo.php");break;
	#--------------------------------------datnv------------------------------------------#
	case "ds_cauhoithamdo":require("quantrithamdo/danhsachcauhoithamdo.php");break;
	case "form_themcauhoithamdo":require("quantrithamdo/formThemcauhoithamdo.php");break;
	case "ds_cautraloithamdo":require("quantrithamdo/danhsachcautraloithamdo.php");break;
	case "form_themcautraloithamdo":require("quantrithamdo/formThemcautraloithamdo.php");break;
	#--------------------------------------datnv------------------------------------------#
	case "form_themtaikhoan":require("quantritaikhoan/taotaikhoan.php");break;

	case "ds_download":require("quantridownload/list.php");break;
	case "form_themdownload":require("quantridownload/add.php");break;

	case "ds_khachhang":require("quantrikhachhang/list.php");break;
	case "form_themkhachhang":require("quantrikhachhang/add.php");break;

	
	case "ds_ykien":require("quantriykien/list.php");break;
	case "ds_dangky":require("quantridangky/list.php");break;
	case "ds_lienhe":require("quantrilienhe/list.php");break;
	
	#--------------------------------------Nha san xuat------------------------------------------#
	case "ds_monhoc":require("quantrimonhoc/list.php");break;
	case "form_themmonhoc":require("quantrimonhoc/add.php");break;
	
	#--------------------------------------Tours------------------------------------------#
#--------------------------------------Nha san xuat------------------------------------------#
	case "ds_khoahoc":require("quantrikhoahoc/list.php");break;
	case "form_themkhoahoc":require("quantrikhoahoc/add.php");break;
	
	#--------------------------------------Tours------------------------------------------#


	//default:require("quantridanhmuc/danhsachmuc.php");break;
	default:require("list.php");break;
  }
?>
</div>
