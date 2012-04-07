<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_logo set kiemduyet=$trangthai where id_logo=$id";
  mysql_query($sql);
?>
