<?php
  function count_value_in_table($value,$field,$table,$link)
  {
    $sql="select count(*) as dem from $table where $field='$value'";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	return $row["dem"];
  }
  
  function count_access($user,$pass,$id_muc)
  {
    $sql="select count(*) as dem from gws_admin";
	$sql.=" where username='$user' and password='$pass' and id_danhmuc=$id_muc";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	return $row["dem"];
  }  
  
  function UpdateData($TableName,$dieukien)
  {
    if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    $i=1;
	$sql="update $TableName set ";
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  
	  $gt=$_POST["$sForm"];
	  if($i==1)  $sql.="$sForm='$gt'";
	  else $sql.=",$sForm='$gt'";
	  $i++;
    }
	if(!isset($_POST["chonlen_menu"])) $sql.=",chonlen_menu='off'";
	$sql.=" $dieukien";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {   
    mysql_query(UpdateData("gws_danhmuc","where id=$id"));
	//echo UpdateData("gws_danhmuc","where id=$id");
	echo "<script language='javascript'>
	parent.treeframe.location='treeuser.php?id=$id_parent&idxp=$xp';
	window.location='danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap&idxp=$xp';
	parent.parent.topFrame.location='top.php';
	</script>";
  }
  if(isset($_GET["newaccount"])) 
  {
    $user=$_POST["username"];
	$pass=$_POST["password"];
	$pass=md5($password);
	$id=$_GET["id"];
	if((count_access($user,$pass,$id)==0&&isset($_GET["ok"]))||count_value_in_table($user,"username","gws_admin",$link)==0)
	{	  	  
      $sql="insert into gws_admin(username,password,id_danhmuc,capnhat) values('$user','$pass',$id,Now())";
      mysql_query($sql);	
	  echo "<script language='javascript'>window.location='?id_parent=$id_parent&kieunhap=$kieunhap&id=$id';</script>";
	}else echo "<script language='javascript'>alert('Tên tài khoản này đã được đăng ký!');history.go(-1);</script>";
  }
?>
<html>
<head>
<title>Sua Muc</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
var obj=null;
function BrowseServer(type,objInput)
{  
	obj=objInput;
	browseURL="FCKeditor/editor/filemanager/browser/default/browser.html?Type="+type+"&Connector=connectors/php/connector.php";
	var oWindow = openNewWindow(browseURL, "BrowseWindow",650,450) ;
	oWindow.SetUrl = SetUrl ;
}
function openNewWindow(sURL, sName, iWidth, iHeight, bResizable, bScrollbars)
{
	var iTop  = 50;//(screen.height - iHeight) / 4 ;
	var iLeft = (screen.width  - iWidth) / 2 ;
	
	var sOptions = "toolbar=no" ;
	sOptions += ",width=" + iWidth ; 
	sOptions += ",height=" + iHeight ;
	sOptions += ",resizable="  + (bResizable  ? "yes" : "no") ;
	sOptions += ",scrollbars=" + (bScrollbars ? "yes" : "no") ;
	sOptions += ",left=" + iLeft ;
	sOptions += ",top=" + iTop ;
	
	var oWindow = window.open(sURL, sName, sOptions)
	oWindow.focus();
	
	return oWindow ;
}

function SetUrl(sImageURL)
{	
	frmEdit.icon_menu.value = sImageURL ;
}
function doSubmitAccount()
{
  var struser=frmAccount.username.value;
  var strpass=frmAccount.password.value;
  if(struser=="")
  {
  	alert("Bạn chưa nhập Username.");
	frmAccount.username.focus();
  }else if  (strpass=="")
  {
  	alert("Chưa nhập Password.");
	frmAccount.password.focus();
  }else frmAccount.submit();
}

</script>

<body>
<?php //require("top_main.php");?>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2"><font size=2><b>Quản lý Danh mục - Sửa mục</b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id=<?php echo $id;?>&idxp=<?php echo $xp;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_danhmuc where id=$id";
	$resulttin=mysql_query($sql);
	$row=mysql_fetch_array($resulttin);
  ?>
  <tr>
	<td width="20%">Tên mục (tiếng Việt)</td>
	<td>
	  <input name="ten" type="text" class="TextBox" id="ten" value="<?php echo $row["ten"];?>" size="50"></td>
  </tr>  
  <tr style="display:none;">
	<td >Tên mục (tiếng Anh)</td>
	<td >
	  <input name="ten_eng" type="text" class="TextBox" id="ten_eng" value="<?php echo $row["ten_eng"];?>" size="50"></td>
  </tr>  
  <tr>
	<td>Từ khóa</td>
	<td>
	  <input name="tukhoa" type="text" class="TextBox" id="tukhoa" value="<?php echo $row["tukhoa"];?>" size="50"></td>
  </tr>
  <tr>
    <td>Ảnh danh mục</td>
    <td><input name="icon_menu" type="text" class="TextBox" id="icon_menu" value="<?php echo $row["icon_menu"];?>" size="50"><input type="button" value="Ch&#7885;n &#7843;nh" onClick="BrowseServer('Image',frmEdit.icon_menu);"></td>
  </tr>
  <tr>
	<td>Module</td>
	<td>
	  <select name="kieunhap" class="TextBox" id="kieunhap">
	  <option value="1" <?php if($row["kieunhap"]=="1") echo "selected";?>>Module Hệ thống - Thêm Danh mục</option>
	  
	  <option value="form_themnoidung" <?php if($row["kieunhap"]=="form_themnoidung") echo "selected";?>>Quản lý Nội dung - Thêm nội dung</option>
	  <option value="ds_noidung" <?php if($row["kieunhap"]=="ds_noidung") echo "selected";?>>Quản lý Nội dung - Danh sách</option>
	  
      <option value="form_themtin" <?php if($row["kieunhap"]=="form_themtin") echo "selected";?>>Module Tin tức - Thêm tin</option>
	  <option value="ds_tin" <?php if($row["kieunhap"]=="ds_tin") echo "selected";?>>Module Tin tức - Danh sách tin</option>
	  
 
	  
      <option value="form_themanh" <?php if($row["kieunhap"]=="form_themanh") echo "selected";?>>Photo Gallery - Thêm ảnh</option> 
	  <option value="dsanh" <?php if($row["kieunhap"]=="dsanh") echo "selected";?>>Photo Gallery - Danh sách</option>
	  
      <option value="form_themfile" <?php if($row["kieunhap"]=="form_themfile") echo "selected";?>>Quản lý tài liệu, bài giảng - Thêm mới</option>
	  <option value="ds_file" <?php if($row["kieunhap"]=="ds_file") echo "selected";?>>Quản lý tài liệu, bài giảng - Danh sách </option>
	  
	   <option value="form_themdiemthi" <?php if($row["kieunhap"]=="form_themdiemthi") echo "selected";?>>Quản lý điểm thi - Thêm điểm</option>
	  <option value="ds_diemthi" <?php if($row["kieunhap"]=="ds_diemthi") echo "selected";?>>Quản lý điểm thi - Danh sách điểm</option>
	  
	   <option value="form_themgiaovien" <?php if($row["kieunhap"]=="form_themgiaovien") echo "selected";?>>Quản lý giáo viên - Thêm mới</option>
	  <option value="ds_giaovien" <?php if($row["kieunhap"]=="ds_giaovien") echo "selected";?>>Quản lý giáo viên - Danh sách </option>
	  
	  <option value="form_themmonhoc" <?php if($row["kieunhap"]=="form_themmonhoc") echo "selected";?>>Module Quản lý môn học - Thêm môn học</option>
	  <option value="ds_monhoc" <?php if($row["kieunhap"]=="ds_monhoc") echo "selected";?>>Module Quản lý môn học - Danh sách</option>
	  
	    <option value="form_themkhoahoc" <?php if($row["kieunhap"]=="form_themkhoahoc") echo "selected";?>>Module Quản lý khóa học - Thêm khóa học</option>
	  <option value="ds_khoahoc" <?php if($row["kieunhap"]=="ds_khoahoc") echo "selected";?>>Module Quản lý khóa học - Danh sách</option>
	  
	 
	  <option value="form_themlogo" <?php if($row["kieunhap"]=="form_themlogo") echo "selected";?>>Module Quảng cáo - Thêm logo</option>
	  <option value="ds_logo" <?php if($row["kieunhap"]=="ds_logo") echo "selected";?>>Module Quảng cáo - Danh sách logo</option>
	  
	   <option value="form_themvideo" <?php if($row["kieunhap"]=="form_themvideo") echo "selected";?>>Module video - Thêm video</option>
	  <option value="ds_video" <?php if($row["kieunhap"]=="ds_video") echo "selected";?>>Module video - Danh sách video</option>
	  
	  <option value="form_themcauhoithamdo" <?php if($row["kieunhap"]=="form_themcauhoithamdo") echo "selected";?>>Module FAQ - Thêm câu hỏi</option>
	  <option value="ds_cauhoithamdo" <?php if($row["kieunhap"]=="ds_cauhoithamdo") echo "selected";?>>Module FAQ - Danh sách</option>
	  
	   <option value="form_themcautraloithamdo" <?php if($row["kieunhap"]=="form_themcautraloithamdo") echo "selected";?>>Module FAQ - Thêm câu tra lời</option>
	  <option value="ds_cautraloithamdo" <?php if($row["kieunhap"]=="ds_cautraloithamdo") echo "selected";?>>Module FAQ - Danh sách câu trả lời</option>
	  
  <option value="ds_ykien" <?php if($row["kieunhap"]=="ds_ykien") echo "selected";?>>Form ý kiến độc giả - Danh sách</option>
	  
 <option value="ds_dangky" <?php if($row["kieunhap"]=="ds_dangky") echo "selected";?>>Form đăng ký - Danh sách</option>
	  
	  <option value="ds_lienhe" <?php if($row["kieunhap"]=="ds_lienhe") echo "selected";?>>Form liên hệ - Danh sách</option>
    </select></td>
  </tr>
  <tr>
	<td>&nbsp;</td>
    <td><input name="button" type="button" class="bigButton" onClick="frmEdit.submit();" value="Cập nhật"></td>
  </tr>
  </form>
</table>
<p>
<table style="display:none" width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
	<td colspan="2"><font size=2><b>Quản lý Danh mục - Thêm tài khoản quản trị mục</b></font></td>
  </tr>
  <form name="frmAccount" method="post" action="?newaccount=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id=<?php echo $id;?>">
  <tr>
	<td width="20%">Tài khoản</td>
    <td><input type="text" class="TextBox" name="username"></td>
  </tr>
  <tr>
	<td>Mật khẩu</td>
    <td><input type="password" class="TextBox" name="password">&nbsp;&nbsp;<a href="javascript:open_list_account();" style="color:#3300FF; font-weight:bold">Chọn từ danh sách</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" name="Submit" class="smallButton" value="Cập nhật" onClick="doSubmitAccount();"></td>
  </tr>
  </form>
</table>
<p>
<table style="display:none" width="100%" border="0" cellpadding="4" cellspacing="1">
  <tr>
	<td colspan="2"><font size=2><b>Quản lý Danh mục - Các tài khoản đang quản trị mục này</b></font></td>
  </tr>
  <tr>
    <td width="20%">&nbsp;</td>
    <td><table width="50%" cellpadding="4" cellspacing="0">
	<?php
	  if(isset($_GET["id_xoa"]))
	  {
		$id_xoa=$_GET["id_xoa"];    
		$sql="delete from gws_admin where id=".$id_xoa;
		mysql_query($sql);
		$sql="delete from gws_admin where id=".$id_xoa;
		mysql_query($sql);
	  }
	  $sql="select * from gws_admin where id_danhmuc=$id";
	  $result=mysql_query($sql);  
	?>
	  <tr>
		<td><b><?php echo $arr_chung["user"] ;?></b></td>
		<td width="20%" align="center" style="display:none "><b><?php echo $arr_chung["pass"] ;?></b></td>
		<td width="30%" align="center"><b><?php echo $arr_muc["quyen"] ;?></b></td>
		<td width="5%" align="center"><b><?php echo $arr_muc["xoa"] ?></b></td>
	  </tr>
	<?php $i=1;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
	  <tr>
		<td><?php echo $row["username"];?></td>
		<td align="center" style="display:none "><?php if($row["level"]!=1) echo $row["password"];else echo "Kh&#244;ng hi&#7875;n th&#7883;!";?></td>
		<td align="center"><?php switch($row["level"]){ case 1:echo "Cao nh&#7845;t";break; default: echo"Nh&#7853;p";break;}?></td>
		<td align="center">
		  <a href="javascript:if(confirm('Bạn thực sự muốn xóa tài khoản [<?php echo $row["username"];?>] ?'))  window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id=<?php echo $id;?>&id_xoa=<?php echo $row["id"];?>';"><?php echo $arr_chung["xoa"] ?></a>
		</td>
	  </tr>
	<?php }?></table></td>
  </tr>
</table>

<script language="javascript">
function openNewWindow(sURL, sName, iWidth, iHeight, bResizable, bScrollbars)
{
  var iTop=50//(screen.height-iHeight)/2;
  var iLeft=(screen.width-iWidth)/2;
	
  var sOptions="toolbar=no";
  sOptions+=",width="+iWidth; 
  sOptions+=",height="+iHeight;
  sOptions+=",resizable="+(bResizable?"yes":"no");
  sOptions+=",scrollbars="+(bScrollbars?"yes":"no");
  sOptions+=",left="+iLeft ;
  sOptions+=",top="+iTop ;
	
  var oWindow = window.open(sURL, sName, sOptions)
  oWindow.focus();
  return oWindow ;
}

function setAccount(listAccount,password)
{
  frmAccountHidden.username.value=listAccount;
  frmAccountHidden.password.value=password;
  frmAccountHidden.action+="&ok=ok";
  frmAccountHidden.submit();
}
function open_list_account()
{
  var obj=openNewWindow("quantridanhmuc/danhsachtaikhoan.php","BrowseWindow",460,400);
  obj.setAccount=setAccount;
}
</script>
<form name="frmAccountHidden" method="post" action="?newaccount=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id=<?php echo $id;?>">
<input type="hidden" class="TextBox" name="username">
<input type="hidden" class="TextBox" name="password">
</form>
</body>
</html>