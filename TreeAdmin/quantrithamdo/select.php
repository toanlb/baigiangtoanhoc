<?php
  require("../connect.php");
  $id=$_GET["id"];
  $sql="update gws_cauhoithamdo set selected=0 where selected=1";
  mysql_query($sql);
  $sql="update gws_cauhoithamdo set selected=1 where id_cauhoithamdo=$id";
  mysql_query($sql);
?>