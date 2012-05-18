<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  echo $sql="update gws_khoahoc set khmoi1=$trangthai where id_kh=$id";
  mysql_query($sql);
?>
