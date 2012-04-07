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
	  //if($_POST["spmoi"]=="") $sql.=",spmoi=0";
    }	
	$sql.="insert into $TableName($dstruong,id_parent,capnhat) values($dsgiatri,$id_parent,Now())";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {
	mysql_query(InputData("gws_diemthi",$id_parent));
	//echo InputData("gws_sanpham",$id_parent);exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_diemthi';</script>";
  }
?>
<html>
<head>
<title>Them San Pham Moi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
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

<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1" class="mainTb">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">    
  <tr>
    <td colspan="2"><font size=2><b>Module quản lý điểm thi- Thêm điểm thi </b></font></td>
  </tr>
  <tr>
    <td width="20%">Số báo danh </td>
    <td><input name="sbd" type="text" id="sbd" size="50"></td>
  </tr>
  
  <tr>
    <td width="20%" >Họ và tên </td>
    <td ><input name="hovaten" type="text" id="hovaten" size="50"></td>
  </tr>
  <tr>
    <td>Số điện thoại </td>
    <td><input name="dienthoai" type="text" id="dienthoai" size="50"></td>
  </tr>
  <tr>
    <td>Địa chỉ </td>
    <td>
	<input name="diachi" type="text" id="diachi" size="50">	</td>	
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <input name="mail" type="text" id="mail"size="50">      </td>
  </tr>
  
  <tr style="">
    <td>Khóa học </td>
    <td>
    <select name="id_nsx">
	<?php 
		$sql_nsx = "select * from gws_nhasanxuat";
		$result_nsx = mysql_query($sql_nsx);
		while ($row_nsx = mysql_fetch_array($result_nsx)) {
	?>
		<option id="<?php echo $row_nsx["id_nsx"]; ?>" value="<?php echo $row_nsx["id_nsx"]; ?>"><?php echo $row_nsx["ten_nsx"]; ?></option>
	<?php } ?>
	</select></td>
  </tr>
  <tr>
    <td>Phần nghe </td>
    <td><input name="monthi1" type="text" id="monthi1" size="8"></td>
  </tr>
  
  <tr>
    <td>Phần ngữ pháp </td>
    <td><input name="monthi2" type="text" id="monthi2" size="8"></td>
  </tr>
  
  <tr>
    <td>Phần đọc hiểu </td>
    <td><input name="monthi3" type="text" id="monthi3"  size="8"></td>
  </tr>
    <tr >
    <td >Phần nói </td>
    <td><input name="monthi4" type="text" id="monthi4"  size="8"></td>
  </tr>
 
  
 
  <tr>
    <td><input type="button" value="Thêm mới" onClick="frmAddnew.submit();"></td>
    <td>&nbsp;</td>
  </tr>  
  </form>
</table>
</body>
</html>