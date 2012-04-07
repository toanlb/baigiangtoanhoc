<?php
require_once("../connect.php");
$sql="SELECT *, DATE_FORMAT(capnhat,'%H:%i ngày %d-%m-%Y') as datetime FROM gws_ykien WHERE id_lienhe=".$_GET["id_lienhe"];
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<html>
<head>
<title>Thong tin lien he</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.body, table, td {font:11px Verdana, Arial, Helvetica, sans-serif}

-->
</style>
</head>

<body>
<iframe name="ifXuly" height="0" width="0"></iframe>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="2"><font size="2"><b>Ý kiến của độc giả</b></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15%">Người liên hệ </td>
    <td><?php echo $row["tenkhach"];?></td>
  </tr>
  <tr>
    <td>Lúc</td>
    <td><?php echo $row["datetime"];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><a href="mailto:<?php echo $row["email"];?>"><?php echo $row["email"];?></a></td>
  </tr>
 
 
  <tr>
    <td>Tiêu đề</td>
    <td><?php echo $row["tieude"];?></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><?php echo $row["noidung"];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</body>
</html>