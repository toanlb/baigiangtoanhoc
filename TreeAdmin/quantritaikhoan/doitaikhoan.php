<?php
require_once "../connect.php";
require("../lang/vie.php");
if(isset($_GET["user"]))
	$user=$_GET["user"];
else
	$user="";
$sql="select * from gws_admin where id='".$_GET["id"]."'";
$result=mysql_query($sql);
//$username="";
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_array($result);
		$s_user=$row["hoten"];
		
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Doi Tai Khoan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="JavaScript">
function doClick()
{
  if(document.frm.newpassword.value!=document.frm.renewpassword.value)
    alert("Bạn đã nhập password mới không khớp nhau!");
  else
    document.frm.submit();
}
</script>
<?php
  if(isset($_GET["status"]))
  {
	require_once("md5.php");
    $username=$_POST{"username"};
	$password=$_POST{"password"};
	$hoten=$_POST{"hoten"};
    //$password=mina_md5($str_mahoa,$_POST{"password"});
    $newusername=$_POST{"newusername"};
	$newpassword=md5($_POST{"newpassword"});
    //$newpassword=mina_md5($str_mahoa,$_POST{"newpassword"});    
    $sql="select * from gws_admin where hoten='$hoten' ";
    $result=mysql_query($sql,$link);  
    $count=mysql_num_rows($result);
    if($count==1)
    {
      $sql="update gws_admin set username='$newusername',password='$newpassword',capnhat=Now() where hoten='$hoten' ";	  
	  $result=mysql_query($sql,$link);?>	  
      <script language="javascript">alert("Bạn đã đổi tài khoản thành công!");</script>
	  <?php  echo "<script language='javascript'>window.location='dstaikhoan.php';</script>";
	}else{?>
      <script language="javascript">alert("Tài khoản của bạn không đúng!");</script><?php	  
	}?>
    <script language="javascript">window.location='doitaikhoan.php';</script><?php       
  }	
?>
<body>
	<FORM><INPUT TYPE="BUTTON" VALUE="Quay lại"ONCLICK="history.go(-1)"></FORM>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2"><font size=2><b>Module Hệ thống - Sửa thông tin người dùng </b></font>
	<br> <a href="taotaikhoan.php">Thêm</a>
	</td>
  </tr>
  <form name="frm" method="post" action="doitaikhoan.php?status=submit">
	<tr style="">
	  <td width="20%">Chủ tài khoản</td>
	  <td><input name="hoten" type="text" class="TextBox" value="<?php echo $s_user;?>" size="40" maxlength="40"></td>
	</tr>
	<tr style="display:none;"> 
	  <td><?php echo $arr_tkhoan["tk_moi"] ?></td>
	  <td><input name="username" type="text" class="TextBox" size="40" maxlength="40"></td>
	</tr>
	<tr style="display:none;">
	  <td><?php echo $arr_tkhoan["tk_mk_moi"] ?></td>
	  <td><input name="password" type="password" class="TextBox" size="40" maxlength="40"></td>
	</tr>
	<tr> 
	  <td><?php echo $arr_tkhoan["tk_moi"] ?></td>
	  <td><input name="newusername" type="text" class="TextBox" size="40" maxlength="40"></td>
	</tr>
	<tr>
	  <td><?php echo $arr_tkhoan["tk_mk_moi"] ?></td>
	  <td><input name="newpassword" type="password" class="TextBox" size="40" maxlength="40"></td>
	</tr>
	<tr> 
	  <td><?php echo $arr_tkhoan["tk_mk_moi_nhaplai"] ?></td>
	  <td><input name="renewpassword" type="password" class="TextBox" size="40" maxlength="40"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>(Tất cả các trường là bắt buộc)</td>
    </tr>
	<tr> 
	  <td><input name="Button" type="button" class="bigButton" onClick="doClick()" value="Cập nhật"></td>
	  <td>&nbsp;</td>
	</tr>
  </form>	  
</table>
</body>
</html>