<?php
//require_once("md5.php"); 
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
	$password=md5($_POST["password"]);
  }
  if(isset($_GET["status"])) 
  {
 
	mysql_query(InputData("gws_admin",$id_parent));
	//echo InputData("gws_nhasanxuat",$id_parent);exit;
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_giaovien';</script>";
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>thêm giáo viên</title>
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
    <td colspan="2"><font size=2><b>Quản lý giáo viên- Thêm mới </b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">  
 
  <tr>
	<td >Họ và tên</td>
	<td width="36%" ><input name="hoten" type="text" class="TextBox" size="50"></td>
 
    <td width="12%">Ảnh đại diện </td>
    <td width="39%" ><input name="anh" type="text" id="anh" size="40"><input type="button" value="Chọn ảnh" onClick="BrowseServer('Image',document.frmAddnew.anh);"></td>
  </tr>
  <tr>
    <td width="13%">Bộ môn giảng dạy</td>
  <td><select name="id_mh">
	<?php 
		$sql_nsx = "select * from gws_monhoc";
		$result_nsx = mysql_query($sql_nsx);
		while ($row_nsx = mysql_fetch_array($result_nsx)) {
	?>
		<option id="<?php echo $row_nsx["id_mh"]; ?>" value="<?php echo $row_nsx["id_mh"]; ?>"><?php echo $row_nsx["tenmh"]; ?></option>
	<?php } ?>
	</select></td>	
 
	<td >Nơi công tác</td>
	<td ><input name="congtac" type="text"  id="congtac" size="50"></td>
	</tr>
 <tr>
	<td class="row1">Thành phố</td>
	<td class="row1"><input name="thanhpho" type="text"  id="thanhpho" size="50"></td>
 
	<td class="row1">Điện thoại</td>
	<td class="row1"><input name="dienthoai" type="text"  id="dienthoai" size="50"></td>
  </tr>
   <tr>
	<td class="row1">Email/Yahoo/Skype</td>
	<td class="row1"><input name="mail" type="text"  id="mail" size="50"></td>
 	<td>Hiển thị </td>
    <td>
	<?php echo $arr_tin["them_kd_ht"];?> 
	<input name="kiemduyet" type="radio" value="1">
	<?php echo $arr_tin["them_kd_kht"];?> 
	<input type="radio" name="kiemduyet" value="0" checked></td>
	</tr>
  
  <tr>
	<td class="row1">Học vị</td>
	<td class="row1"><input name="capbac" type="text"  id="capbac" size="50"></td>
  
    
  </tr>
 <tr>
    <td colspan="4" >Thành tích</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('thanhtich');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '200' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>
					
					<tr>
    <td colspan="4" >Đầu sách đã xuất bản</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('sach');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '200' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>
				
					
					 <tr>
    <td colspan="4" >Phong cách giảng dạy</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('phongcach');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '300' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>
   <tr>
    <td colspan="4" >Thông tin khác</td>
  </tr>
  <tr>
    <td colspan="4" >
		<?php
			$oFCKeditor 			= new FCKeditor ('thongtin');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '300' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>
					
					
  
					
					
  <tr>
					  <td height="37" class="ContactText">Giới tính</td>
					  <td><input name="gioitinh" type="radio" id="gioitinh" value="1" />
					    Nam <input name="gioitinh" type="radio" id="gioitinh" value="0" checked />Nữ </td>
					
	<td class="row1">M&#7913;c qu&#7843;n tr&#7883;</td>
	<td class="row1"><select name="level" class="TextBox">
	 
	   <option value="2">Giáo viên</option>
	   
	  </select>
	</td>
  </tr>	  

  <tr>
  <td>&nbsp;</td>
    <td  style="padding-left:190px;"><input name="button" type="button" onClick="doSubmit();" value="Thêm mới"></td>
    <td>&nbsp;</td><td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>