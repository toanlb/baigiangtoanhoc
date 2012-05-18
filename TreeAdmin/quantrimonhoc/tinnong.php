<?php 
  require("../connect2.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_tinbai set tinnong=$trangthai where id_tin=$id";
  mysql_query($sql);
?>
