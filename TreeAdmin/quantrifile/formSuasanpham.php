<?php

  $id_sp=$_GET["id_thuvien"];

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

    mysql_query(UpdateData("gws_thuvien","where id_thuvien=$id_sp"));

	//echo UpdateData("gws_sanpham","where id_sp=$id_sp");exit;

	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_file';</script>";

  }

?>

<html>

<head>

<title>Sửa thông tin</title>

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

  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_thuvien=<?php echo $id_sp;?>" method="post" name="frmEdit">    

  <?php 

		$sql="select * from gws_thuvien where id_thuvien=$id_sp";

		$resultsanpham=mysql_query($sql);

		$rowsanpham=mysql_fetch_array($resultsanpham);

  ?>

  <tr>

    <td colspan="2"><font size=2><b>Module quản lý tài liệu, bài giảng- Sửa thông tin tài liệu </b></font></td>

  </tr>

  <tr>

    <td width="20%">Tên tài liệu </td>

    <td><input name="tentl" type="text" class="TextBox" id="tentl" value="<?php echo $rowsanpham["tentl"];?>" size="50"></td>

  </tr>

  

  <tr>

    <td width="20%">Mã tài liệu </td>

    <td><input disabled="yes" name="mathuvien" type="text" id="mathuvien" value="<?php echo $rowsanpham["id_thuvien"];?>" size="50"></td>

  </tr>

  <tr>

    <td width="20%">Lượt thi</td>

    <td><input name="luotthi" type="text" id="luotthi" value="<?php echo $rowsanpham["luotthi"];?>" size="50"></td>

  </tr>

   <tr>

    <td width="20%">Khóa học</td>

    <td><select name="id_kh">

	<?php 

		$sql_nsx = "select * from gws_khoahoc";

		$result_nsx = mysql_query($sql_nsx);

		while ($row_nsx = mysql_fetch_array($result_nsx)) {

	?>

		<option id="<?php echo $row_nsx["id_kh"]; ?>" value="<?php echo $row_nsx["id_kh"]; ?>"><?php echo $row_nsx["tenkh"]; ?></option>

	<?php } ?>

	</select></td>	

  </tr>

  

   <tr>

    <td width="20%">Môn học</td>

  <td><select name="id_mh">

	<?php 

		$sql_nsx = "select * from gws_monhoc";

		$result_nsx = mysql_query($sql_nsx);

		while ($row_nsx = mysql_fetch_array($result_nsx)) {

	?>

		<option id="<?php echo $row_nsx["id_mh"]; ?>" value="<?php echo $row_nsx["id_mh"]; ?>"><?php echo $row_nsx["tenmh"]; ?></option>

	<?php } ?>

	</select></td>	

  </tr>

   <tr style="display:none;">

    <td width="20%">Tên tài liệu(Tiếng Anh) </td>

    <td><input name="tentl_eng" type="text" class="TextBox" id="tentl_eng" value="<?php echo $rowsanpham["tentl_eng"];?>" size="50"></td>

  </tr>

  

    <tr >

    <td >Ảnh</td>

    <td ><input name="anh" type="text" class="TextBox" size="50" value="<?php echo $rowsanpham["anh"];?>">

	

	    

      <input name="button" type="button" onClick="BrowseServer('Image',frmEdit.anh);" value="Chọn ảnh">	</td>

  </tr>

  <tr>

    <td>File </td>

    <td><input name="file" type="text" class="TextBox" id="file" value="<?php echo $rowsanpham["file"];?>" size="50">

	

	   

      <input name="button" type="button" onClick="BrowseServer('File',frmEdit.file);" value="Chọn file">	</td>

  </tr>

   <tr>

    <td width="20%">Link tham khảo </td>

    <td><input name="link" type="text" id="link" value="<?php echo $rowsanpham["link"];?>" size="50"></td>

  </tr>


  <tr>

    <td>Kiểm duyệt</td>

    <td>

      <?php echo $arr_tin["them_kd_ht"];?><input name="kiemduyet" type="radio" value="1" <?php if($rowsanpham["kiemduyet"]==1) echo "checked";?>>

      <?php echo $arr_tin["them_kd_kht"];?>

      <input name="kiemduyet" type="radio" value="0" <?php if($rowsanpham["kiemduyet"]==0) echo "checked";?>></td>

  </tr>

 

  <tr>

    <td colspan="2">Nội dung: </td>

  </tr>

<!--Noi dung tin-->  

  <tr>

    <td colspan="2">

	  <?php

			$oFCKeditor 			= new FCKeditor ('gioithieu');

			$oFCKeditor->BasePath 	= 'FCKeditor/';

			$oFCKeditor->ToolbarSet = 'Standard' ;

	        $oFCKeditor->Width      = '90%' ;

			$oFCKeditor->Height		= '450' ;

			$oFCKeditor->Value		= $rowsanpham["gioithieu"];

			$oFCKeditor->Create();

	?></td>

  </tr>

  

  <tr style="display:none;">

    <td colspan="2">Nội dung(Tiếng Anh):</td>

  </tr>

  <tr style="display:none;">

    <td colspan="2" >

	 <?php

			$oFCKeditor 			= new FCKeditor ('gioithieu_eng');

			$oFCKeditor->BasePath 	= 'FCKeditor/';

			$oFCKeditor->ToolbarSet = 'Standard' ;

	        $oFCKeditor->Width      = '90%' ;

			$oFCKeditor->Height		= '450' ;

			$oFCKeditor->Value		= $rowsanpham["gioithieu_eng"];

			$oFCKeditor->Create();

	?>	</td>

  </tr>

  <tr>

    <td><input type="button" value="Cập nhật" onClick="frmEdit.submit();"></td>

    <td>&nbsp;</td>

  </tr>  

  </form>

</table>

</body>

</html>