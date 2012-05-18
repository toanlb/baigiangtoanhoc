<?php 
  require("../connect.php");
  $id=$_GET["id"];
  $trangthai=$_GET["trangthai"];
  $sql="update gws_monhoc set tinnong=$trangthai where id_mh=$id";
  mysql_query($sql);
?>
