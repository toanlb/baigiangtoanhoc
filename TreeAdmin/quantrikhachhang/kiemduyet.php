<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_khachhang set kiemduyet=$trangthai where id_khachhang=$id";
  mysql_query($sql);
?>
