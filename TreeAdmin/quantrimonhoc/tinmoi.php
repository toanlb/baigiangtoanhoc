<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  echo $sql="update gws_monhoc set tinmoi=$trangthai where id_mh=$id";
  mysql_query($sql);
?>
