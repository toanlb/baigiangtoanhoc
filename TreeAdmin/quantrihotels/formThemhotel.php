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
//	  $gt=str_replace("\"","&quot;",$_POST["$sForm"]);
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
	mysql_query(InputData("gws_hotels",$id_parent));
	//echo InputData("gws_hotels",$id_parent);exit;
	echo "<script language='javascript'>
	window.location='danhsach.php?id_parent=$id_parent&kieunhap=ds_hotel';
	</script>";
  }
?>
<html>
<head>
<title>Them Khach san Moi</title>
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
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1" class="mainTb">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">
  <!--Tieu de tin-->
  <tr>
    <td colspan="2"><font size=2><b>Quản lý Khách sạn - Thêm khách sạn mới</b></font></td>
  </tr>
  <tr>
    <td width="20%"><?php echo $arr_tin["them_tieude"];?></td>
    <td><input name="tieude" type="text" class="TextBox" size="50"></td>
  </tr>
  <tr style="display:none">
    <td><?php echo $arr_tin["them_tieude_eng"];?></td>
    <td><input name="tieude_eng" type="text" class="TextBox" id="tieude_eng" size="50"></td>
  </tr>
<!--Het-->
  <tr>
    <td>Mã khách sạn </td>
    <td><input name="hotel_code" type="text" class="TextBox" id="hotel_code" size="50"></td>
  </tr>
  <tr>
    <td>Tiêu chuẩn </td>
    <td>3 sao <input name="tieuchuan" type="radio" value="3 sao" checked="checked">&nbsp;&nbsp;&nbsp;&nbsp;
	4 sao <input name="tieuchuan" type="radio" value="4 sao">&nbsp;&nbsp;&nbsp;&nbsp;
	5  sao <input name="tieuchuan" type="radio" value="5 sao"></td>
  </tr>
  <tr>
    <td><?php echo $arr_tin["them_anhtrichdan"];?></td>
    <td>
      <input name="anhtrichdan" type="text" class="TextBox" id="anhtrichdan" size="40">
      <input name="button" type="button" class="smallButton" onClick="BrowseServer('Image',frmAddnew.anhtrichdan);" value="<?php echo $arr_btn["btn_chonanh"];?>"></td>
  </tr> 
<!--Trich dan tin-->
  <tr>
    <td><?php echo $arr_tin["them_trichdan"];?></td>
    <td>
	<?php
			$oFCKeditor 			= new FCKeditor ('trichdan');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Basic' ;
	        $oFCKeditor->Width      = '400' ;
			$oFCKeditor->Height		= '200' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
	?>
	</td>
  </tr>
  <tr style="display:none">
    <td><?php echo $arr_tin["them_trichdan_eng"];?></td>
    <td>
	<?php
			$oFCKeditor 			= new FCKeditor ('trichdan_eng');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Basic' ;
	        $oFCKeditor->Width      = '400' ;
			$oFCKeditor->Height		= '200' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
	?></td>
  </tr>
<!--Het-->
<!--Noi dung tin-->
  <tr>
    <td><?php echo $arr_tin["them_kd"];?></td>
    <td>
	<?php echo $arr_tin["them_kd_ht"];?> 
	<input name="kiemduyet" type="radio" value="1">
	<?php echo $arr_tin["them_kd_kht"];?> 
	<input type="radio" name="kiemduyet" value="0" checked></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $arr_tin["them_noidung"];?></td>
  </tr>
  <tr>
    <td colspan="2">
		<?php
			$oFCKeditor 			= new FCKeditor ('noidung');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>
  <tr style="display:none">
    <td colspan="2"><?php echo $arr_tin["them_noidung_eng"];?></td>
  </tr>
  <tr style="display:none">
    <td colspan="2">
		<?php
			$oFCKeditor 			= new FCKeditor ('noidung_eng');
			$oFCKeditor->BasePath 	= 'FCKeditor/';
			$oFCKeditor->ToolbarSet = 'Standard' ;
	        $oFCKeditor->Width      = '90%' ;
			$oFCKeditor->Height		= '400' ;
			$oFCKeditor->Value		= '';
			$oFCKeditor->Create();
		?>	</td>
  </tr>

<!--Het-->  
  <tr>
    <td><input type="button" value="Thêm mới" onClick="frmAddnew.submit();"></td>
    <td>&nbsp;</td>
  </tr>  
  </form>
</table>
<script language="javascript">frmAddnew.tieude.focus();</script>
</body>
</html>