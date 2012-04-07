<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_tinbai set tieudiem=$trangthai where id_tin=$id";
  mysql_query($sql);
?>
