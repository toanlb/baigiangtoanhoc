<?php
  $id_cauhoithamdo=$_GET["id_cauhoithamdo"];
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
    mysql_query(UpdateData("gws_cauhoithamdo","where id_cauhoithamdo=$id_cauhoithamdo"));
	//echo UpdateData("gws_cauhoithamdo","where id_cauhoithamdo=$id_cauhoithamdo");exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_cauhoithamdo';</script>";
  }
?>
<html>
<head>
<title>Sua San Pham</title>
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
<?php require("top_main.php"); ?>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="5"><font size=2><b>Module Bình chọn - Sửa câu hỏi</b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_cauhoithamdo=<?php echo $id_cauhoithamdo;?>" method="post" name="frmEdit">    
  <?php 
		$sql="select * from gws_cauhoithamdo where id_cauhoithamdo=$id_cauhoithamdo";
		$resultsanpham=mysql_query($sql);
		$rowsanpham=mysql_fetch_array($resultsanpham);
  ?>
  <tr>
    <td width="20%">Câu hỏi (Tiếng Việt)</td>
    <td><input name="cauhoithamdo" type="text" id="cauhoithamdo" value="<?php echo $rowsanpham["cauhoithamdo"];?>" size="50"></td>
  </tr>
  <tr>
    <td>Câu hỏi (Tiếng Anh)</td>
    <td><input name="cauhoithamdo_eng" type="text" id="cauhoithamdo_eng" value="<?php echo $rowsanpham["cauhoithamdo_eng"];?>" size="50"></td>
  </tr>
  <tr>
    <td><input type="button" value="Cập nhật" onClick="frmEdit.submit();"></td>
    <td>&nbsp;</td>
  </tr>  
  </form>
</table>
<script language="javascript">frmEdit.cauhoithamdo.focus();</script>
</body>
</html>