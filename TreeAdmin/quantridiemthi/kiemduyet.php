<?php 
  require("../connect.php");
  echo $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  echo $sql="update gws_diemthi set kiemduyet=$trangthai where id_diemthi=$id";
  mysql_query($sql);
?>
