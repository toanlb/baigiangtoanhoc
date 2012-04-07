<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_sanpham set kho=$trangthai where id_sp=$id";
  mysql_query($sql);
?>
