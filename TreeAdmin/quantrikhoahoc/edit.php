<?php
  $id_kh=$_GET["id_kh"];
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
    mysql_query(UpdateData("gws_khoahoc","where id_kh=$id_kh"));
	//echo UpdateData("gws_nhasanxuat","where id_nsx=$id_nsx");
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_khoahoc';</script>";
  }
?>
<html>
<head>
<title>Sua Nha khoa hoc</title>
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
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />
    <link rel="stylesheet" media="screen" type="text/css" href="css/layout.css" />
    <title>DatePicker - jQuery plugin</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/datepicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
<body>
<?php require("top_main.php"); ?>
<table align="center" width="99%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td height="42" colspan="2"><font size=2><b> Quản lý khóa học- Sửa thông tin </b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_kh=<?php echo $id_kh;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_khoahoc where id_kh=$id_kh";
	$result_nsx=mysql_query($sql);
	$row_nsx=mysql_fetch_array($result_nsx);
  ?>
  <tr>
    <td height="28">Tên khóa học </td>
    <td ><input name="tenkh" type="text" id="tenkh" value="<?php echo $row_nsx["tenkh"];?>" size="40"></td>
  </tr>
  <tr>
    <td width="20%" height="29">Ảnh đại diện </td>
    <td ><p>
      <input name="anh" type="text" id="anh" value="<?php echo $row_nsx["anh"];?>" size="40">
      &nbsp;
      <input name="button" type="button" value="Chọn ảnh" onClick="BrowseServer('Image',document.frmEdit.anh);">
    </p></td>
  </tr> 
  <tr>
    <td width="20%" height="31">Tình trạng khóa học (khuyến mãi 20%, new...)</td>
    <td ><input name="anh_nho" type="text" id="anh_nho" size="40" value="<?php  echo $row_nsx["anh_nho"];?>"></td>
  </tr>
   <tr>
    <td height="29">Học phí </td>
    <td ><input name="hocphi" type="text" id="hocphi" value="<?php echo $row_nsx["hocphi"];?>" size="40"></td>
  </tr>
   <tr>
    <td>Thời gian khai giảng </td>
    <td >
	<p>
					<input class="inputDate" id="inputDate" value="12/12/2011" name="inputDate" />
					<label id="closeOnSelect" style="display:none;"><input type="checkbox" checked="checked" /> Close on selection</label>
				</p
       ></td>
  </tr>
   <tr>
    <td width="20%" height="28">Giáo viên</td>
    <td><select name="id">
	<?php 
		$sql_nsx1 = "select * from gws_admin where level=2";
		$result_nsx1 = mysql_query($sql_nsx1);
		while ($row_nsx1 = mysql_fetch_array($result_nsx1)) {
	?>
		<option id="<?php echo $row_nsx1["id"]; ?>" value="<?php echo $row_nsx1["id"]; ?>"><?php echo $row_nsx1["hoten"]; ?></option>
	<?php } ?>
	</select></td>	
  </tr>
  <tr>
    <td height="25" colspan="2" >Trích dẫn</td>
  </tr>
<!--Noi dung tin-->  
  <tr>
    <td height="27" colspan="2">
	  <?php
			$oFCKeditor 			= new FCKeditor ('trichdan');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		=$row_nsx["trichdan"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
  
  <tr>
    <td height="26" colspan="2" >Nội dung</td>
  </tr>
<!--Noi dung tin-->  
  <tr>
    <td height="29" colspan="2">
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
    <td height="29">Hiển thị </td>
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