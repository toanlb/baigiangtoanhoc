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
	  $gt=str_replace("'","&rsquo;",$_POST["$sForm"]);
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
	mysql_query(InputData("gws_traloithamdo",$id_parent));
	//echo InputData("gws_sanpham",$id_parent);
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_cautraloithamdo';</script>";
  }
?>
<html>
<head>
<title>Trả lời thăm dò</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
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
	frmAddnew.anhsp.value = sImageURL ;
}

</script>
<body>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2"><font size=2><b>Module Bình chọn - Thêm câu trả lời thăm dò</b></font></td>
  </tr>
  <hr size="1" width="100%">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">
  <tr>
    <td width="20%">Trả lời (Tiếng Việt)</td>
    <td><input name="traloithamdo" type="text" id="traloithamdo" size="50"></td>
  </tr>
    <tr>
    <td>Trả lời (Tiếng Anh)</td>
    <td><input name="traloithamdo_eng" type="text" id="traloithamdo_eng" size="50"></td>
  </tr>
    <tr>
      <td>Số lần chọn </td>
      <td><input name="soluongchon" type="text" id="soluongchon" size="5"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" value="Cập nhật" onClick="frmAddnew.submit();"> <input name="Back" type="submit" onClick="history.go(-1);" value="Quay lại" style="cursor:pointer"/></td>
  </tr>
  </form>
</table>
<script language="javascript">frmAddnew.traloithamdo.focus();</script>
</body>
</html>