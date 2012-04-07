<?php
  $id=$_GET["id"];
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
	$sql.=" $dieukien";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {   
    mysql_query(UpdateData("gws_admin","where id=$id"));
	//echo UpdateData("gws_admin","where id=$id");
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_giaovien';</script>";
  }
?>
<html>
<head>
<title>Sua Logo</title>
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
	obj.value = sImageURL ;
}
</script>

<body>
<?php require("top_main.php"); ?>
<table align="center" width="99%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td colspan="2"><font size=2><b>Module Quản lý giáo viên- Sửa thông tin </b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id=<?php echo $id;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_admin where id=$id";
	$resultdownload=mysql_query($sql);
	$row_khachhang=mysql_fetch_array($resultdownload);
  ?>
  
  <tr>
    <td>Họ và tên </td>
    <td width="36%"><input name="hoten" type="text" id="hoten" value="<?php echo $row_khachhang["hoten"];?>" size="40"></td>

    <td width="13%">Ảnh đại diện </td>
    <td width="37%" ><p>
      <input name="anh" type="text" id="anh" value="<?php echo $row_khachhang["anh"];?>" size="40">
      &nbsp;
      <input name="button" type="button" value="Chọn ảnh" onClick="BrowseServer('Image',document.frmEdit.anh);">
    </p></td>
  </tr> 
    <tr>
    <td width="14%">Bộ môn giảng dạy</td>
  <td>
  <select name="id_mh">
	<?php 
		$sql_nsx = "select * from gws_monhoc";
		$result_nsx = mysql_query($sql_nsx);
		while ($row_nsx = mysql_fetch_array($result_nsx)) {
	?>
		<option id="<?php echo $row_nsx["id_mh"]; ?>" value="<?php echo $row_nsx["id_mh"]; ?>"><?php echo $row_nsx["tenmh"]; ?></option>
	<?php } ?>
	</select>
	</td>	
 
	<td >Nơi công tác</td>
	<td ><input name="congtac" type="text"  id="congtac" value="<?php echo $row_khachhang["congtac"];?>" size="50"></td>
  </tr>
  <tr>
	<td class="row1">Thành phố</td>
	<td class="row1"><input name="thanhpho" type="text"  id="thanhpho" value="<?php echo $row_khachhang["thanhpho"];?>" size="50"></td>
 
	<td class="row1">Điện thoại</td>
	<td class="row1"><input name="dienthoai" type="text"  id="dienthoai" value="<?php echo $row_khachhang["dienthoai"];?>" size="50"></td>
  </tr>
   <tr>
	<td class="row1">Email/Yahoo/Skype</td>
	<td class="row1"><input name="mail" type="text"  id="mail" value="<?php echo $row_khachhang["mail"];?>"  size="50"></td>
 
	<td>Hiển thị </td>
    <td>
	<?php echo $arr_tin["them_kd_ht"];?> 
	<input name="kiemduyet" type="radio" value="1" checked>
	<?php echo $arr_tin["them_kd_kht"];?> 
	<input type="radio" name="kiemduyet" value="0" ></td>	
	</tr>
  
  <tr>
	<td class="row1">Học vị</td>
	<td class="row1"><input name="capbac" type="text"  id="capbac" value="<?php echo $row_khachhang["capbac"];?>"  size="50"></td>
  
  </tr>
 <tr>
    <td colspan="4" >Thành tích</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('thanhtich');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '200' ;
			$oFCKeditor->Value		= $row_khachhang["thanhtich"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
					
					<tr>
    <td colspan="4" >Đầu sách đã xuất bản</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('sach');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '200' ;
			$oFCKeditor->Value		= $row_khachhang["sach"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
					
<tr>
    <td colspan="4" >Phong cách giảng dạy</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('phongcach');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '300' ;
			$oFCKeditor->Value		= $row_khachhang["phongcach"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
   <tr>
    <td colspan="4" >Thông tin khác</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('thongtin');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '300' ;
			$oFCKeditor->Value		= $row_khachhang["thongtin"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
					
  <tr>
					  <td height="37" class="ContactText">Giới tính</td>
					  <td><input name="gioitinh" type="radio" id="gioitinh"  value="1" />
					    Nam <input name="gioitinh" type="radio" id="gioitinh" value="0" checked />Nữ </td>
					
	<td class="row1">M&#7913;c qu&#7843;n tr&#7883;</td>
	<td class="row1"><select name="level" class="TextBox">
	
	   <option value="2">Giáo viên</option>
	
	  </select>
	</td>
  </tr>	  

  <tr><td>&nbsp;</td>
    <td  style="padding-left:190px;">
	  <input type="button" value="Cập nhật" onClick="frmEdit.submit();"></td>
    <td>&nbsp;</td><td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>