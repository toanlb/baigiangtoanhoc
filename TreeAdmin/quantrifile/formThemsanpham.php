﻿<?php

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

	mysql_query(InputData("gws_thuvien",$id_parent));

	//echo InputData("gws_sanpham",$id_parent);exit;

	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_file';</script>";

  }

?>

<html>

<head>

<title>Thêm mới</title>

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
<?php 

		$sql="select * from gws_thuvien ORDER BY id_thuvien DESC";

		$resultsanpham=mysql_query($sql);

		$rowsanpham=mysql_fetch_array($resultsanpham);
		
  ?>


<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1" class="mainTb">

  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">    

  <tr>

    <td colspan="2"><font size=2><b>Module quản lý tài liệu, bài giảng- Thêm mới </b></font></td>

  </tr>

  <tr>

  

    <td align="right" >

      <?php 

		$sql="SELECT * FROM gws_admin where username='$username' order by capnhat desc limit 1

";

//echo $sql;

		$result = mysql_query($sql);

		

		

	?>

    <input name="username" type="text" class="TextBox" id="username" value="<?php echo $username;?>" size="20" style="border:none; _border:1px solid #fff; display:none; " >

      </td>

	

  </tr>

 

  <tr>

    <td width="20%">Tên tài liệu </td>

    <td><input name="tentl" type="text" id="tentl" size="50"></td>

  </tr>

   <tr>

    <td width="20%">Mã tài liệu </td>

    <td><input disabled="yes" name="mathuvien" type="text" id="mathuvien" size="50" value="<?php echo $rowsanpham['id_thuvien'] + 1 ?>"></td>

  </tr>

  <tr>

    <td width="20%">Lượt thi</td>

    <td><input name="luotthi" type="text" id="luotthi" size="50"></td>

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

    <td width="20%">Tên tài liệu (Tiếng Anh)</td>

    <td><input name="tentl_eng" type="text" id="tentl_eng" size="50"></td>

  </tr>

  

  <tr>

    <td>Ảnh </td>

    <td>

      <input name="anh" type="text" size="40">      

      <input name="button" type="button" onClick="BrowseServer('Image',frmAddnew.anh);" value="Chọn ảnh"></td>

  </tr>

  

  <tr >

    <td>Chọn file tài liệu </td>

    <td>

      <input name="file" type="text" size="40">      

      <input name="button" type="button" onClick="BrowseServer('File',frmAddnew.file);" value="Chọn file">	</td>

  </tr>

 
  <tr>

    <td width="20%">Link tham khảo </td>

    <td><input name="link" type="text" id="link" size="50"></td>

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

  <tr>

    <td colspan="2">

		<?php

			$oFCKeditor 			= new FCKeditor ('gioithieu');

			$oFCKeditor->BasePath 	= 'FCKeditor/';

			$oFCKeditor->ToolbarSet = 'Standard' ;

	        $oFCKeditor->Width      = '90%' ;

			$oFCKeditor->Height		= '400' ;

			$oFCKeditor->Value		= '';

			$oFCKeditor->Create();

		?>	</td>

  </tr>

  <tr style="display:none;">

    <td colspan="2">Nội dung(Tiếng Anh): </td>

  </tr>

  <tr>

    <td colspan="2" style="display:none;">

		<?php

			$oFCKeditor 			= new FCKeditor ('gioithieu_eng');

			$oFCKeditor->BasePath 	= 'FCKeditor/';

			$oFCKeditor->ToolbarSet = 'Standard' ;

	        $oFCKeditor->Width      = '90%' ;

			$oFCKeditor->Height		= '400' ;

			$oFCKeditor->Value		= '';

			$oFCKeditor->Create();

		?>	</td>

  </tr>

  <tr>

    <td><input type="button" value="Thêm mới" onClick="frmAddnew.submit();"></td>

    <td>&nbsp;</td>

  </tr>  

  </form>

</table>

</body>

</html>