<?php
@session_start();
require("../lang/vie.php");
require_once("../connect.php");
function get_name($id)
{
	$sql="select ten from gws_danhmuc where id=$id";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_array($result);
		return $row["ten"];
	}else return "Administrator";
}
function getPath($id,$xp)
{
	$str="";	
	while($id!=$xp)
	{
		$str=get_name($id)."/".$str;
		$sql="select id_parent,ten from gws_danhmuc where id=$id";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$id=$row["id_parent"];
	}
	get_name($id);
	$str="Administrator/".$str;
	$str=substr($str,0,strlen($str)-1);
	return $str;
}
if(isset($_GET["reset"]))
{
	$username=$_GET["reset"];
	$sql="update gws_admin set username='$username',password='$username'";
	$sql.=" where username='$username'";
	mysql_query($sql);
}
if(isset($_GET["id"]))
{
	$id=$_GET["id"];    
	$sql="delete from gws_admin where id=".$id;
	mysql_query($sql);
	$sql="delete from gws_admin where id=".$id;
	mysql_query($sql);
}
$sql="select * from gws_admin";
$sql.=" order by username asc";
$result=mysql_query($sql);  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Danh Sach Tai Khoan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="99%" align="center" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td colspan="7"><font size=2><b>Danh Sách Tài Khoản</b></font></td>
  </tr>
  <tr><td><hr size="1" width="99%"></td></tr>
</table>

<table width="99%" class="mainTb" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr style="cursor:pointer" bgcolor="#FFFFFF" onmouseover="this.bgColor='#F0F4F7'" onmouseout="this.bgColor='#FFFFFF'">
    <td class="gridTitle" width="3%" align="center"><?php echo $arr_tkhoan["tk_stt"] ?></td>
    <td width="20%" align="center" class="gridTitle"><?php echo $arr_tkhoan["tk_ds"] ?></td>
    <td align="center" class="gridTitle">Họ tên chủ tài khoản</td>
    <td class="gridTitle" width="20%" align="center" >Level truy cập</td>
    <td class="gridTitle" width="15%" align="center">&nbsp;</td>
  </tr>
  <?php $user_after="";?>
  <?php $i=1;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr style="cursor:pointer" bgcolor="#FFFFFF" onmouseover="this.bgColor='#F0F4F7'" onmouseout="this.bgColor='#FFFFFF'">
	<td align="center"><?php  echo $i++;?></td>
	<td><strong><?php if($user_after!=$row["username"]) echo $row["username"]; else echo "<font color='#FF0000'>Chưa có tài khoản</font>"?></strong></td>
	<td><?php echo $row["hoten"];?></td>
	<td><?php if ($row["level"]==1) echo "Quản trị hệ thống"; elseif($row["level"]==2) echo "Giáo viên"; elseif($row["level"]==3) echo "Thành viên";?>
	
	</td>
	<td style="display:none" align="center"><?php if($user_after!=$row["username"]){$user_after=$row["username"];?><a href="javascript:if(confirm('Bạn thực sự muốn reset password tài khoản [<?php echo $row["username"];?>] ?')) window.location='?reset=<?php echo $row["username"];?>'">Reset password</a><?php }?></td>
	<td align="center">
	  <a href="doitaikhoan.php?id=<?php echo $row["id"];?>">Sửa</a> 
	  <a href="javascript:if(confirm('Bạn thực sự muốn xóa tài khoản [<?php echo $row["username"];?>] ?')) window.location='?id=<?php echo $row["id"];?>';"><?php echo $arr_chung["xoa"] ?></a>
	</td>
  </tr>
  <?php }?>
</table>
<a href="taotaikhoan.php">>> Thêm tài khoản</a> 
</body>
</html>
