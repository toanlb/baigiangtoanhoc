<html>
<head>
<title>Danh Sach Tai Khoan</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
var list_acc="";
var pass="";
function doRemove(ob)
{
  if(confirm(thongdiepdau.value+ob.value+thongdiepcuoi.value))
  {
    frmSubmit.action="?id="+ob.name;
	frmSubmit.submit();
  }
}
function doCheck(obj)
{
 list_acc=obj.title;
 pass=obj.alt;
}
function doChon()
{	
  window.setAccount(list_acc,pass);
  window.close();
}
</script>
<body>
<div style="font: bold 18px Verdana, Arial, Helvetica, sans-serif; text-align:center">Danh Sách Tài Khoản</div>
<table class="mainTb" width="99%" align="center" border="0" cellspacing="1" cellpadding="4">
  <?php
	require("../connect.php");
	@session_start();
	$sql="select * from gws_admin where username<>'".$_SESSION['username']."' and level<>'quantri' and level<>'cautruc' group by username order by username asc";
	$result=mysql_query($sql);
	$i=1;
	if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr style="cursor:pointer" bgcolor="#FFFFFF" onMouseOver="this.bgColor='#F0F4F7'" onMouseOut="this.bgColor='#FFFFFF'">
	<td width="5%" align="center"><?php echo $i++;?></td>
	<td>&nbsp;&nbsp;<?php echo $row["username"];?></span></td>
	<td width="5%" align="center"><input type="radio" name="ck" alt="<?php echo $row["password"];?>" title="<?php echo $row["username"];?>" onClick="doCheck(this);"></td>
  </tr>  
  <?php }else{?>
  <tr bgcolor="#FFFFFF">
	<td colspan="3" height="30">&nbsp;Chưa có tài khoản nào!</td>
  </tr>
  <?php }?>
</table>
<p>
<center>
	<input name="btnChon" type="button" onClick="doChon();" value="Chọn">
	<input name="btnDong" type="button" onClick="window.close();" value="Đóng">	</td>
</center>
</body>
</html>
