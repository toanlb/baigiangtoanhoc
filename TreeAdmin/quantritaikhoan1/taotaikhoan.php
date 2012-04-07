<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Tao Tai Khoan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function doSubmit()
{
  if(frmAddnew.username.value==""||frmAddnew.password.value=="") alert(xau.value);
  else frmAddnew.submit();
}
</script>
<input type="hidden" name="message" value="T&#234;n s&#7917; d&#7909;ng n&#224;y &#273;&#227; t&#7891;n t&#7841;i!">
<input type="hidden" value="B&#7841;n ch&#432;a nh&#7853;p &#273;&#7911;!" name="xau">
<body bgcolor="#d2e8ff">
<?php
  require_once("../connect.php");
  require_once("md5.php");  
  if(isset($_GET["status"])) 
  {    
	$username=$_POST["username"];
	//$password=mina_md5($str_mahoa,$_POST["password"]);
	$password=$_POST{"password"};
	$level=$_POST["quyen"];
	$sql="select * from gws_admin where username='$username'";
    $resulttontai=mysql_query($sql);
	if(mysql_num_rows($resulttontai)==0)
	{
	  $sql="insert into gws_admin(username,password,level,capnhat) values('$username','$password',$level,Now())";	  
	  mysql_query($sql);
	  echo "<script language='javascript'>window.location='dstaikhoan.php';</script>";
	}else{
	  echo "<script language='javascript'>alert(message.value);</script>";
	}
	echo "<script language='javascript'>window.location='taotaikhoan.php';</script>";
  }
?>
<table width="99%" align="center" border="0" cellpadding="4" cellspacing="0">
  <tr>
	<td class="tieude_top"> Tạo Tài Khoản</td>
  </tr>
  <tr><td><hr size="1" width="99%"></td></tr>
</table>

<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1" class="mainTb">
  <form action="../quantritaikhoan/taotaikhoan.php?status=submit" method="post" name="frmAddnew">
  <tr>
	<td width="30%" class="row1">T&#234;n s&#7917; d&#7909;ng m&#7899;i</td>
	<td class="row1"><input name="username" type="text" class="TextBox" size="50"></td>
  </tr>
  <tr>
	<td class="row1">M&#7853;t kh&#7849;u</td>
	<td class="row1"><input name="password" type="password" class="TextBox" size="50"></td>
  </tr>		
   <tr>
	<td class="row1">M&#7913;c qu&#7843;n tr&#7883;</td>
	<td class="row1"><select name="quyen" class="TextBox">
	  <option value="2">Nhập</option>
	  </select>
	</td>
  </tr>	  
  <tr>
	<td class="row1" colspan="2" align="center"><input type="button" class="bigButton" value="Ch&#7845;p nh&#7853;n" onClick="doSubmit()"><input type="reset" class="bigButton" value="Nh&#7853;p l&#7841;i"></td>
  </tr>
  </form>
</table>
</body>
</html>