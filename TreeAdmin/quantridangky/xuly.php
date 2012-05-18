<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  echo $sql="update gws_dangky set xuly=$trangthai where id_dangky=$id";
  mysql_query($sql);
?>
