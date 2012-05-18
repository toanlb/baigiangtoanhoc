<?php 
  require("../connect.php");
  echo $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  echo $sql="update gws_thuvien set kiemduyet=$trangthai where id_thuvien=$id";
  mysql_query($sql);
?>
