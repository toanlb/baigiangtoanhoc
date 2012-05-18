<?php
  $id_khachhang=$_GET["id_khachhang"];
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
    mysql_query(UpdateData("gws_khachhang","where id_khachhang=$id_khachhang"));
	echo UpdateData("gws_khachhang","where id_khachhang=$id_khachhang");
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_khachhang';</script>";
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
    <td colspan="2"><font size=2><b>Module Quản lý Khách hàng- Sửa khách hàng </b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_khachhang=<?php echo $id_khachhang;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_khachhang where id_khachhang=$id_khachhang";
	$resultdownload=mysql_query($sql);
	$row_khachhang=mysql_fetch_array($resultdownload);
  ?>
  <tr>
    <td>Tên khách hàng </td>
    <td ><input name="tencongty" type="text" id="tencongty" value="<?php echo $row_khachhang["tencongty"];?>" size="40"></td>
  </tr>
  <tr>
    <td>Tên giao dịch </td>
    <td><input name="tengiaodich" type="text" id="tengiaodich" value="<?php echo $row_khachhang["tengiaodich"];?>" size="40"></td>
  </tr>
  <tr>
    <td>Địa chỉ </td>
    <td ><input name="diachi" type="text" id="diachi" value="<?php echo $row_khachhang["diachi"];?>" size="40"></td>
  </tr>
  <tr>
    <td width="20%">Logo</td>
    <td ><p>
      <input name="logo" type="text" id="logo" value="<?php echo $row_khachhang["logo"];?>" size="40">
      &nbsp;
      <input name="btnImg" type="button" value="Logo" onClick="BrowseServer('File',frmEdit.logo);">
    </p></td>
  </tr>
  <tr>
    <td>Ngành nghề </td>
    <td>
		<?php
			$oFCKeditor 			= new FCKeditor ('nganhnghe');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		=$row_khachhang["nganhnghe"];
			$oFCKeditor->Create();
		?>
	</td>
  </tr>
  <tr>
    <td>Hiển thị </td>
    <td>Hiển thị <input name="kiemduyet" type="radio" value="1" <?php if($row_khachhang["kiemduyet"]==1) echo "checked";?>>
	Không hiển thị <input name="kiemduyet" type="radio" value="0" <?php if($row_khachhang["kiemduyet"]==0) echo "checked";?>></td>
  </tr>
  <tr>
    <td>
	  <input type="button" value="Cập nhật" onClick="frmEdit.submit();"></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>