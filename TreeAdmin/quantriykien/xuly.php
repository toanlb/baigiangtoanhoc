<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  echo $sql="update gws_ykien set xuly=$trangthai where id_lienhe=$id";
  mysql_query($sql);
?>
