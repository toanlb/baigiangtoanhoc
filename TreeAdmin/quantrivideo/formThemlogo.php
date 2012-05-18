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
	$sql.="insert into $TableName($dstruong,id_parent,capnhat) values($dsgiatri,$id_parent,Now())";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {
	mysql_query(InputData("gws_logo",$id_parent));
	//echo InputData("gws_logo",$id_parent); exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_video';</script>";
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Them Logo</title>
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
	frmAddnew.logo.value = sImageURL ;
}

function doSubmit()
{
	frmAddnew.submit();
}
</script>
<body>
<?php require("top_main.php"); ?>
<table align="center" width="99%" border="0" cellspacing="1" cellpadding="4" class="mainTb">
  <tr>
    <td colspan="2"><font size=2><b>Module Video - Thêm Video</b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">  
 
 
  <tr>
    <td >Tiêu đề</td>
   
	
	 <td><input name="tieude" type="text" id="tieude" value="" size="40"></td>
  </tr>
  
  
   
 
  
  
  <tr>
    <td >Liên kết tới</td>
    <td ><input name="lienket" type="text" id="lienket" value="http://" size="40"></td>
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
    <td><input name="button" type="button" onClick="doSubmit();" value="Thêm mới"></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>