<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_noidung set kiemduyet=$trangthai where id_noidung=$id";
  mysql_query($sql);
?>
