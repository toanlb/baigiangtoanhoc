<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_hotels set tieudiem=$trangthai where id_hotel=$id";
  mysql_query($sql);
?>
