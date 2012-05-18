<?php
  $id_logo=$_GET["id_logo"];
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
    mysql_query(UpdateData("gws_logo","where id_logo=$id_logo"));
	//echo UpdateData("gws_logo","where id_logo=$id_logo");
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_video';</script>";
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
	frmEdit.logo.value = sImageURL ;
}
</script>

<body>
<?php require("top_main.php"); ?>
<table align="center" width="99%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td colspan="2"><font size=2><b>Module Quảng cáo - Sửa quảng cáo</b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_logo=<?php echo $id_logo;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_logo where id_logo=$id_logo";
	$resulttin=mysql_query($sql);
	$rowanh=mysql_fetch_array($resulttin);
  ?>
  
 
  <tr>
    <td >Tiêu đề</td>
    <td >
	
	<input name="tieude" type="text" id="tieude" value="<?php echo $rowanh["tieude"];?>" size="40">
	</td>
  </tr>
  <tr>
    <td >Liên kết video</td>
    <td ><input name="lienket" type="text" id="lienket" value="<?php echo $rowanh["lienket"];?>" size="40"></td>
  </tr>    
 
  <tr>
    <td>Hiển thị </td>
    <td>Hiển thị <input name="kiemduyet" type="radio" value="1" <?php if($rowanh["kiemduyet"]==1) echo "checked";?>>
	Không hiển thị <input name="kiemduyet" type="radio" value="0" <?php if($rowanh["kiemduyet"]==0) echo "checked";?>></td>
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