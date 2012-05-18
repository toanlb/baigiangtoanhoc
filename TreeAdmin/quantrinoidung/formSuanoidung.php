<?php  

  $id_noidung=$_GET["id_noidung"];
  function dachon($id_noidung,$table)
  {
    $sql="select vitri from gws_noidung $table where id_noidung=$id_noidung";	
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0) return 0;
	else
	{
	  $row=mysql_fetch_array($rs);
	  return intval($row["vitri"]);
	}
  }
  function UpdateData($TableName,$dieukien,$id_noidung)
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
	  $gt=str_replace("'","&rsquo;",$_POST["$sForm"]);
	  if($sForm=="noibat")
	  {
	    $sql_noibat="update tin_noibat set id_noidung=$id_noidung where vitri=$gt";
		mysql_query($sql_noibat);
	  }else if($sForm=="moi")
	  {
	    $sql_moi="update tin_moi set id_noidung=$id_noidung where vitri=$gt";
		mysql_query($sql_moi);
	  }else if($sForm=="dacsac")
	  {
	    $sql_dacsac="update tin_dacsac set id_noidung=$id_noidung where vitri=$gt";
		mysql_query($sql_dacsac);
	  }else{
	    if($i==1)  $sql.="$sForm='$gt'";
	    else $sql.=",$sForm='$gt'";
	  }
	  $i++;
    }
	$sql.=" $dieukien";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {   
    mysql_query(UpdateData("gws_noidung","where id_noidung=$id_noidung",$id_noidung));
	//echo UpdateData("gws_noidung","where id_noidung=$id_noidung");
	echo "<script language='javascript'>
	window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_noidung';
	</script>";
  }
?>
<html>
<head>
<title>Sua Tin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
browseURL="FCKeditor/editor/filemanager/browser/default/browser.html?Connector=connectors/php/connector.php";
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
	frmEdit.anhtrichdan.value = sImageURL ;	
}
function chonngay()
{
  frmAddnew.gio_hienthi.value=Calendar1.Year+"/"+Calendar1.Month+"/"+Calendar1.Day;
  frmAddnew.gio_hienthi.value+=" "+gio.value+":"+phut.value+":"+giay.value;
  o_ngaygio.innerHTML="&nbsp;"+gio.value+":"+phut.value+":"+giay.value;
  o_ngaygio.innerHTML+="  ng&#224;y: "+Calendar1.Day+"/"+Calendar1.Month+"/"+Calendar1.Year+"&nbsp;";
  showclick('lich');
}

</script>

<body>
<?php require("top_main.php"); ?>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2"><font size=2><b>Quản lý Nội dung - Sửa</b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_noidung=<?php echo $id_noidung;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_noidung where id_noidung=$id_noidung";
	$result_noidung=mysql_query($sql);
	$row_noidung=mysql_fetch_array($result_noidung);
  ?>
<!--Tieu de tin-->
  <tr>
    <td width="20%">Tiêu đề: </td>
    <td><input name="tieude" type="text" class="TextBox" size="50" value="<?php echo $row_noidung["tieude"];?>"></td>
  </tr>
  <tr style="display:none;">
    <td ><?php echo $arr_tin["them_tieude_eng"];?></td>
    <td ><input name="tieude_eng" type="text" class="TextBox" size="50" value="<?php echo $row_noidung["tieude_eng"];?>"></td>
  </tr>
  <tr>
    <td><?php echo $arr_tin["them_kd"];?></td>
    <td>
      <?php echo $arr_tin["them_kd_ht"];?><input name="kiemduyet" type="radio" value="1" <?php if($row_noidung["kiemduyet"]==1) echo "checked";?>>
	  <?php echo $arr_tin["them_kd_kht"];?><input name="kiemduyet" type="radio" value="0" <?php if($row_noidung["kiemduyet"]==0) echo "checked";?>></td>
  </tr>
  <tr>
    <td colspan="2">Nội dung: </td>
  </tr>
<!--Noi dung tin-->  
  <tr>
    <td colspan="2">
	  <?php
			$oFCKeditor 			= new FCKeditor ('noidung');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		=$row_noidung["noidung"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
  <tr style="display:none;">
    <td colspan="2"><?php echo $arr_tin["them_noidung_eng"];?></td>
  </tr>
  <tr style="display:none;">
    <td colspan="2" >
	  <?php
			$oFCKeditor 			= new FCKeditor ('noidung_eng');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		=$row_noidung["noidung_eng"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
<!--Het-->    
  <tr>
    <td><input name="button" type="button" class="bigButton" onClick="frmEdit.submit();" value="Cập nhật"></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<script language="javascript">frmEdit.tieude.focus();</script>
</body>
</html>
