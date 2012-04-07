<?php
  $id_sp=$_GET["id_diemthi"];
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
    mysql_query(UpdateData("gws_diemthi","where id_diemthi=$id_sp"));
	//echo UpdateData("gws_sanpham","where id_sp=$id_sp");exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_diemthi';</script>";
  }
?>
<html>
<head>
<title>Sửa điểm thi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Ronnie T. Moore -->
<!-- Dynamic 'fix' by: Nannette Thacker -->
<!-- Begin
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}
// End -->
</script>
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
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_diemthi=<?php echo $id_sp;?>" method="post" name="frmEdit">    
  <?php 
		$sql="select * from gws_diemthi where id_diemthi=$id_sp";
		$resultsanpham=mysql_query($sql);
		$rowsanpham=mysql_fetch_array($resultsanpham);
  ?>
  <tr>
    <td colspan="2"><font size=2><b>Module quản lý điểm thi - Sửa thông tin điểm thi</b></font></td>
  </tr>
  <tr>
    <td width="20%">Số báo danh </td>
    <td><input name="sbd" type="text" class="TextBox" id="sbd" value="<?php echo $rowsanpham["sbd"];?>" size="50"></td>
  </tr>
  
    <tr >
    <td >Họ và tên </td>
    <td ><input name="hovaten" type="text" class="TextBox" size="50" value="<?php echo $rowsanpham["hovaten"];?>"></td>
  </tr>
  <tr>
    <td>Số điện thoại </td>
    <td><input name="dienthoai" type="text" class="TextBox" id="dienthoai" value="<?php echo $rowsanpham["dienthoai"];?>" size="50"></td>
  </tr>
  <tr>
    <td>Địa chỉ </td>
    <td>
	 <input name="diachi" type="text" class="TextBox" value="<?php echo $rowsanpham["diachi"];?>" size="40">	</td>	
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <input name="mail" type="text" class="TextBox" value="<?php echo $rowsanpham["mail"];?>" size="50">     	</td>
  </tr>
  <tr>
    <td>Khóa học </td>
    <td>
     <select name="id_nsx">
	<?php 
		$sql_nsx = "select * from gws_nhasanxuat";
		$result_nsx = mysql_query($sql_nsx);
		while ($row_nsx = mysql_fetch_array($result_nsx)) {
	?>
		<option id="<?php echo $row_nsx["id_nsx"]; ?>" value="<?php echo $row_nsx["id_nsx"]; ?>" <?php if ($row_nsx["id_nsx"] == ($rowsanpham["id_nsx"])) echo "selected"; ?>><?php echo $row_nsx["ten_nsx"]; ?></option>
	<?php } ?>
	</select>	</td>
  </tr>
  
  <tr>
    <td>Phần nghe </td>
    <td><input name="monthi1" type="text" id="monthi1" value="<?php echo $rowsanpham["monthi1"];?>" size="8"> </td>
  </tr>
  
  <tr>
    <td>Phần ngữ pháp </td>
    <td><input name="monthi2" type="text" id="monthi2" value="<?php echo $rowsanpham["monthi2"];?>" size="8">      </td>
  </tr>
  
  <tr>
    <td>Phần đọc hiểu </td>
    <td><input name="monthi3" type="text" id="monthi3" value="<?php echo $rowsanpham["monthi3"];?>" size="8">      </td>
  </tr>
  
  <tr >
    <td>Phần nói </td>
    <td><input name="monthi4" type="text" id="monthi4"value="<?php echo $rowsanpham["monthi4"];?>" size="8">      </td>
  </tr>
 
  
 
  <tr>
    <td><input type="button" value="Cập nhật" onClick="frmEdit.submit();"></td>
    <td>&nbsp;</td>
  </tr>  
  </form>
</table>
</body>
</html>