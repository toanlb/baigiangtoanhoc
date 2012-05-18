<?php
  $id_traloithamdo=$_GET["id_traloithamdo"];
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
    mysql_query(UpdateData("gws_traloithamdo","where id_traloithamdo=$id_traloithamdo"));
	//echo UpdateData("gws_traloithamdo","where id_traloithamdo=$id_traloithamdo");exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_cautraloithamdo';</script>";
  }
?>
<html>
<head>
<title>Trả lời thăm dò</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript">
browseURL="FCKeditor/editor/filemanager/browser/default/browser.html?Type=Image&Connector=connectors/php/connector.php";
function BrowseServer()
{  
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
	frmEdit.anhsp.value = sImageURL ;
}

</script>
<body>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2"><font size=2><b>Module Bình chọn - Sửa câu trả lời thăm dò</b></font></td>
  </tr>
  <hr size="1" width="100%">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_traloithamdo=<?php echo $id_traloithamdo;?>" method="post" name="frmEdit">
  <?php 
		$sql="select * from gws_traloithamdo where id_traloithamdo=$id_traloithamdo";
		$resultthamdo=mysql_query($sql);
		$rowthamdo=mysql_fetch_array($resultthamdo);
  ?> 
  <tr>
    <td width="20%">Trả lời (Tiếng Việt)</td>
    <td><input name="traloithamdo" type="text" id="traloithamdo" value="<?php echo $rowthamdo["traloithamdo"];?>" size="50"></td>
  </tr>
  <tr>
    <td>Trả lời (Tiếng Anh)</td>
    <td><input name="traloithamdo_eng" type="text" id="traloithamdo_eng" value="<?php echo $rowthamdo["traloithamdo_eng"];?>" size="50"></td>
  </tr>
  <tr>
	<td>Số lần chọn </td>
	<td><input name="soluongchon" type="text" id="soluongchon" value="<?php echo $rowthamdo["soluongchon"];?>" size="5"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" value="Cập nhật" onClick="frmEdit.submit();"> <input name="Back" type="submit" onClick="history.go(-1);" value="Quay lại" style="cursor:pointer"/></td>
  </tr>
  </form>
</table>
<script language="javascript">frmEdit.traloithamdo.focus();</script>
</body>
</html>