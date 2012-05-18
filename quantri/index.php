<html>
<head>
<title>Web Admin 1.0 | Powered by World Wide Web Soft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<style type="text/css">
<!--
body, td, input, select, textarea {font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; }
input {font-weight:700}
-->
</style>
</head>
<?php 
  @session_start();
  if(isset($_GET["logout"]))
  {
    unset($_SESSION["quantriEBIZ"]);
	unset($_SESSION["username"]);
	echo "<script language='javascript'>window.location='index.php';</script>";
  }
  if(isset($_SESSION["quantriEBIZ"]))
  {
    session_unset();		
  }
  if(isset($_GET["status"]))
  {
    $username=$_POST{"username"};
    $password=$_POST{"password"};
    $password=md5($password);
    require_once "../TreeAdmin/connect.php";
    $sql="select * from gws_admin where username='$username' and password='$password'";
    $result=mysql_query($sql);  
    $count=mysql_num_rows($result);
    mysql_close($link);  
    if($count>=1) 
    {
	  $row=mysql_fetch_array($result);
	  $_SESSION["danhmuc"]=$row["id_danhmuc"];
	  $_SESSION["tukhoa"]=$row["tukhoa"];
	  $_SESSION["username"]=$row["username"];
	  $_SESSION["quantriEBIZ"]="quantriEBIZ";
	  $_SESSION["level"]=$row["level"];
	  $_SESSION["arr_danhmuc"]=$row["id_danhmuc"];
	  while($row=mysql_fetch_array($result))
	  	$_SESSION["arr_danhmuc"].=",".$row["id_danhmuc"];
	  if($_POST["select_gws_admin"]=="ht")
	    echo "<script language='javascript'>window.location='../TreeAdmin/';</script>";
	  else	
	    echo "<script language='javascript'>window.location='../TreeAdmin/index.php';</script>";
	}else{?>
      <script language="javascript">alert("Tài khoản của bạn không hợp lệ!");window.location='index.php';</script><?php
	}
  }
?>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<form name="form1" method="post" action="index.php?status=submit">
  <tr>
    <td align="center">
		<table width="200" border="0" cellpadding="5" cellspacing="0">
		  <tr>
		    <td style="font-size:12px; font-weight:bold;">Đăng nhập hệ thống</td>
	      </tr>
		  <tr>
			<td><input name="username" type="text" class="login" id="username" style="width:140px; height:20" size="15" maxlength="20"></td>
		  </tr>
		  <tr>
			<td><input name="password" type="password" class="login" id="password" style="width:140px; height:20" size="15" maxlength="20"></td>
		  </tr>
		  <tr>
			<td><input name="Submit" type="submit" value="Đăng nhập"></td>
		  </tr>
		</table>
  </tr>
</form>
</table>
<script language="javascript">
form1.username.focus();
</script>
</body>
</html>