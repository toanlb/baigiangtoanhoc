<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_admin set tieubieu=$trangthai where id=$id";
  mysql_query($sql);
?>