<?php 

  require("../connect.php");

  $id=$_GET["id"];

  $trangthai=$_GET["trangthai"];

  $sql="update gws_thuvien set vip=$trangthai where id_thuvien=$id";

  mysql_query($sql);

?>

