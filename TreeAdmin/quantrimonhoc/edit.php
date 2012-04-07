<?php
  $id_mh=$_GET["id_mh"];
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
    mysql_query(UpdateData("gws_monhoc","where id_mh=$id_mh"));
	//echo UpdateData("gws_nhasanxuat","where id_nsx=$id_nsx");
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_monhoc';</script>";
  }
?>
<html>
<head>
<title>Sửa môn học</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
browseURL="FCKeditor/editor/filemanager/browser/default/browser.html?Type=file&Connector=connectors/php/connector.php";
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
	frmEdit.anh.value = sImageURL ;
}
</script>

<body>
<?php require("top_main.php"); ?>
<table align="center" width="99%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td colspan="2"><font size=2><b> Quản lý môn học- Sửa thông tin </b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_mh=<?php echo $id_mh;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_monhoc where id_mh=$id_mh";
	$result_nsx=mysql_query($sql);
	$row_nsx=mysql_fetch_array($result_nsx);
  ?>
  <tr>
    <td>Tên môn học </td>
    <td ><input name="tenmh" type="text" id="tenmh" value="<?php echo $row_nsx["tenmh"];?>" size="40"></td>
  </tr>
  <tr>
    <td width="20%">Ảnh đại diện </td>
    <td ><p>
      <input name="anh" type="text" id="anh" value="<?php echo $row_nsx["anh"];?>" size="40">
      &nbsp;
      <input name="button" type="button" value="Chọn ảnh" onClick="BrowseServer('Image',document.frmEdit.anh);">
    </p></td>
  </tr> 
   <tr>
    <td>Học phí </td>
    <td ><input name="hocphi" type="text" id="hocphi" value="<?php echo $row_nsx["hocphi"];?>" size="40"></td>
  </tr>
 
  <tr>
    <td colspan="2" >Nội dung</td>
  </tr>
<!--Noi dung tin-->  
  <tr>
    <td colspan="2">
	  <?php
			$oFCKeditor 			= new FCKeditor ('noidung');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		=$row_nsx["noidung"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
   
  <tr>
    <td>Hiển thị </td>
    <td>Hiển thị <input name="kiemduyet" type="radio" value="1" <?php if($row_nsx["kiemduyet"]==1) echo "checked";?>>
	Không hiển thị <input name="kiemduyet" type="radio" value="0" <?php if($row_nsx["kiemduyet"]==0) echo "checked";?>></td>
  </tr>
  <tr>
    <td>
	  <input type="button" value="Cập nhật" onClick="document.frmEdit.submit();"></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>