<?php  

  $id_tin=$_GET["id_tin"];
  function dachon($id_tin,$table)
  {
    $sql="select vitri from $table where id_tin=$id_tin";	
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0) return 0;
	else
	{
	  $row=mysql_fetch_array($rs);
	  return intval($row["vitri"]);
	}
  }
  function UpdateData($TableName,$dieukien,$id_tin)
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
//	  $gt=str_replace("\"","&quot;",$_POST["$sForm"]);
	  if($sForm=="noibat")
	  {
	    $sql_noibat="update tin_noibat set id_tin=$id_tin where vitri=$gt";
		mysql_query($sql_noibat);
	  }else if($sForm=="moi")
	  {
	    $sql_moi="update tin_moi set id_tin=$id_tin where vitri=$gt";
		mysql_query($sql_moi);
	  }else if($sForm=="dacsac")
	  {
	    $sql_dacsac="update tin_dacsac set id_tin=$id_tin where vitri=$gt";
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
    mysql_query(UpdateData("gws_tinbai","where id_tin=$id_tin",$id_tin));
	//echo UpdateData("gws_tinbai","where id_tin=$id_tin",$id_tin);exit;
	echo "<script language='javascript'>
	window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_tin';
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
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_tin=<?php echo $id_tin;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from gws_tinbai where id_tin=$id_tin";
	$resulttin=mysql_query($sql);
	$rowtin=mysql_fetch_array($resulttin);
  ?>
<!--Tieu de tin-->
  <tr>
    <td colspan="2"><font size=2><b>Quản lý Tin tức - Sửa nội dung tin</b></font></td>
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
    <td width="20%"><?php echo $arr_tin["them_tieude"];?></td>
    <td><input name="tieude" type="text" class="TextBox" size="50" value="<?php echo $rowtin["tieude"];?>"></td>
  </tr>
  <tr style="display:none;">
    <td ><?php echo $arr_tin["them_tieude_eng"];?></td>
    <td ><input name="tieude_eng" type="text" class="TextBox" size="50" value="<?php echo $rowtin["tieude_eng"];?>"></td>
  </tr>
<!--Het-->

  <tr>
    <td><?php echo $arr_tin["them_anhtrichdan"];?></td>
    <td>
      <input name="anhtrichdan" type="text" class="TextBox" id="anhtrichdan" size="40" value="<?php echo $rowtin["anhtrichdan"];?>">
      <input type="button" value="Ch&#7885;n &#7843;nh" onClick="BrowseServer('Image',frmEdit.anhtrichdan);"></td>
  </tr> 
<!--Trich dan de tin-->
  <tr>
    <td><?php echo $arr_tin["them_trichdan"];?></td>
    <td>
      <textarea name="trichdan" class="TexBox" cols="50" rows="7" wrap="virtual"><?php echo $rowtin["trichdan"];?></textarea></td>
  </tr>
  <tr style="display:none;">
    <td ><?php echo $arr_tin["them_trichdan_eng"];?></td>
    <td>
      <textarea name="trichdan_eng" class="TexBox" cols="50" rows="7" wrap="virtual"><?php echo $rowtin["trichdan_eng"];?></textarea></td>
  </tr>
  <tr>
    <td><?php echo $arr_tin["them_kd"];?></td>
    <td>
      <?php echo $arr_tin["them_kd_ht"];?><input name="kiemduyet" type="radio" value="1" <?php if($rowtin["kiemduyet"]==1) echo "checked";?>>
	  <?php echo $arr_tin["them_kd_kht"];?><input name="kiemduyet" type="radio" value="0" <?php if($rowtin["kiemduyet"]==0) echo "checked";?>></td>
  </tr>
<!--Het-->  
  <tr>
    <td colspan="2"><?php echo $arr_tin["them_noidung"];?></td>
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
			$oFCKeditor->Value=$rowtin["noidung"];
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
			$oFCKeditor->Value=$rowtin["noidung_eng"];
			$oFCKeditor->Create();
		?>	</td>
  </tr>
<!--Het-->    
  <tr>
    <td><input type="button" onClick="frmEdit.submit();" value="Cập nhật"></td>
	<td>&nbsp;</td>
  </tr>
  </form>
</table>
<script language="javascript">frmEdit.tieude.focus();</script>
</body>
</html>
