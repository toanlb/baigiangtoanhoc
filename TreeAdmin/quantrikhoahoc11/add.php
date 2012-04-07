<?php
  function InputData($TableName,$id_parent)
  {
    if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    $i=1;
	$dstruong="";
	$dsgiatri="";
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  	  
	  $gt=$_POST["$sForm"];
	  if($i==1){
	    $dstruong.="$sForm";
		$dsgiatri.="'$gt'";
	  }else{
	    $dstruong.=",$sForm";
		$dsgiatri.=",'$gt'";
	  }
	  $i++;
    }
	$sql.="insert into $TableName($dstruong,id_parent,id_danhmuc,capnhat) values($dsgiatri,$id_parent,$id_danhmuc,Now())";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {
	mysql_query(InputData("gws_khoahoc",$id_parent));
	//echo InputData("gws_nhasanxuat",$id_parent);exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_khoahoc';</script>";
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Them Nha san xuat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
browseURL="FCKeditor/editor/filemanager/browser/default/browser.html?Type=File&Connector=connectors/php/connector.php";

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
	frmAddnew.anh.value = sImageURL ;
}

function doSubmit()
{
	document.frmAddnew.submit();
}
</script>
<body>
<?php require("top_main.php"); ?>
<table align="center" width="99%" border="0" cellspacing="1" cellpadding="4" class="mainTb">
  <tr>
    <td colspan="2"><font size=2><b>Quản lý khóa học- Thêm khóa học </b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">  
  <tr>
    <td>Tên khóa học </td>
    <td ><input name="tenkh" type="text" id="tenkh" size="40"></td>
  </tr>
  <tr>
    <td width="20%">Ảnh đại diện </td>
    <td ><input name="anh" type="text" id="anh" size="40"><input type="button" value="Chọn ảnh" onClick="BrowseServer('Image',document.frmAddnew.anh);"></td>
  </tr>
  
  <tr>
    <td>Học phí </td>
    <td ><input name="hocphi" type="text" id="hocphi" size="40"></td>
  </tr>
  <tr>
    <td>Hiển thị </td>
    <td>
	<?php echo $arr_tin["them_kd_ht"];?> 
	<input name="kiemduyet" type="radio" value="1">
	<?php echo $arr_tin["them_kd_kht"];?> 
	<input type="radio" name="kiemduyet" value="0" checked></td>
  </tr>
  
   <tr>
    <td colspan="2" ><?php echo $arr_tin["them_trichdan"];?></td>
  </tr>
  <tr>
    <td colspan="2" >
		<?php
			$oFCKeditor 			= new FCKeditor ('trichdan');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>
  <tr>
    <td colspan="2" ><?php echo $arr_tin["them_noidung"];?></td>
  </tr>
  <tr>
    <td colspan="2" >
		<?php
			$oFCKeditor 			= new FCKeditor ('noidung');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>

  
  
  <tr>
    <td><input name="button" type="button" onClick="doSubmit();" value="Thêm mới"></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>