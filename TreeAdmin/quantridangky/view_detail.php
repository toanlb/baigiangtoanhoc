<?php
require_once("../connect.php");
$sql="SELECT *, DATE_FORMAT(capnhat,'%H:%i ngày %d-%m-%Y') as datetime FROM gws_dangky WHERE id_dangky=".$_GET["id_dangky"];
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
<script language="javascript">
function doXuly(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifXuly.location="quantridangky/xuly.php?id="+ck.name+"&trangthai="+tt;
}
</script>
<body>
<iframe name="ifXuly" height="0" width="0"></iframe>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="2"><font size="2"><b>Thông tin đăng ký </b></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="15%">Họ tên học viên </td>
    <td><?php echo $row["hoten"];?></td>
  </tr>
   <tr>
    <td width="15%">Giới tính </td>
    <td><?php echo $row["gioitinh"];?></td>
  </tr>
 
  <tr>
    <td width="15%">Số điện thoại nhà riêng </td>
    <td><?php echo $row["codinh"];?></td>
  </tr>

  <tr>
    <td width="15%">Họ tên bố/ mẹ </td>
    <td><?php echo $row["tenbome"];?></td>
  </tr>
  <tr>
    <td width="15%">Điện thoại của bố/mẹ </td>
    <td><?php echo $row["dtbome"];?></td>
  </tr>
  <tr>
    <td width="15%">Nơi học tập </td>
    <td><?php echo $row["noilv"];?></td>
  </tr>
   <tr>
    <td>Email</td>
    <td><a href="mailto:<?php echo $row["mail"];?>"><?php echo $row["mail"];?></a></td>
  </tr>
   <tr>
    <td>Ngày học phù hợp</td>
    <td><?php echo $row["ngayhoc"];?></td>
  </tr>
 
  <tr>
    <td>Biết đến trung tâm qua</td>
    <td><?php echo $row["biet1"];?>;
	    <?php echo $row["biet2"];?></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><span style="color:#999999"><i>Để trả lời, bạn hãy click vào địa chỉ email của khách hàng ở trên</i></span></td>
  </tr>
</table>
</body>
</html>