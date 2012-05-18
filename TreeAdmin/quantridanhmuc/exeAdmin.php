<?php    
  function xoa($id,$link)
  {
    $sql="delete from gws_danhmuc where id=$id";
    mysql_query($sql);
	
	$sql="delete from gws_noidung where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_tinbai where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_thuvien where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_diemthi where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_thuvienanh where id_parent=$id";
    mysql_query($sql);

	$sql="delete from gws_danhba where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_logo where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_raovat where id_parent=$id";
    mysql_query($sql);
	
	$sql="delete from gws_faq where id_parent=$id";
    mysql_query($sql);
	
	$sql="select id from gws_danhmuc where id_parent=$id";
    $result=mysql_query($sql,$link);
	if(mysql_num_rows($result)!=0)
	  while($row=mysql_fetch_array($result)) xoa($row["id"],$link);
  }
  $id=$_GET["id"];  
  $id_parent=$_GET["id_parent"];
  $kieunhap=$_GET["kieunhap"];
  $xp=$_GET["idxp"];
  require_once("../connect.php");
  xoa($id,$link);
  echo "<script language='javascript'>
  parent.treeframe.location='../treeuser.php?id=$id_parent&idxp=$xp';
  window.location='../danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap&idxp=$xp';
  parent.parent.topFrame.location='../top.php';
  </script>";
?>