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
  }
  if(isset($_GET["status"])) 
  {
	mysql_query(InputData("gws_danhmuc",$id_parent));
	//echo InputData("gws_danhmuc",$id_parent);exit;
	echo "<script language='javascript'>
	parent.treeframe.location='treeuser.php?id=$id_parent&idxp=$xp';
	window.location='danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap&idxp=$xp';
	parent.parent.topFrame.location='top.php';
	</script>";
  }
?>
<html>
<head>
<title>Them San Pham Moi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url(css/admin.css);
-->
</style>
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
	frmAddnew.icon_menu.value = sImageURL ;
}
function doSubmit()
{
  frmAddnew.submit();
}
</script>
<body>
<?php require("top_main.php"); ?>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2"><font size=2><b>Module Hệ thống - Quản lý Danh mục</b></font></td>
  </tr>
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&idxp=<?php echo $xp;?>" method="post" name="frmAddnew">
  <tr>
    <td width="20%">Tên mục (tiếng Việt)</td>
    <td ><input name="ten" type="text" class="TextBox" id="ten" size="50"></td>
  </tr>
  <tr style="display:none;" >
    <td >Tên mục (tiếng Anh)</td>
    <td ><input name="ten_eng" type="text" class="TextBox" id="ten_eng" size="50"></td>
  </tr>  
  <tr>
    <td >Từ khóa</td>
	<?php
	  $rand_str="";
	  $feed="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      for ($i=0;$i<20;$i++)
      {
        $rand_str.=substr($feed,rand(0,strlen($feed)-1),1);
      }
	?>
    <td ><input name="tukhoa" type="text" class="TextBox" id="tukhoa" size="50" value="<?php echo $id_parent."_".$rand_str;?>"></td>
  </tr>  
  <tr>
    <td>Ảnh danh mục</td>
    <td><input name="icon_menu" type="text" class="TextBox" id="icon_menu" size="50"><input name="button" type="button" class="smallButton" onClick="BrowseServer('Image',frmAddnew.icon_menu);" value="Chọn ảnh"></td>
  </tr>
  <tr>
    <td >Module</td>
    <td >
      <select name="kieunhap" class="TextBox" id="kieunhap">
	  <option value="1">Module Hệ thống - Thêm Danh mục</option>
	  
	  <option value="form_themnoidung">Quản lý Nội dung - Thêm nội dung</option>
	  <option value="ds_noidung">Quản lý Nội dung - Danh sách</option>
	  
      <option value="form_themtin">Module Tin tức - Thêm tin</option>
	  <option value="ds_tin">Module Tin tức - Danh sách tin</option>
	  
	
	  
	  <option value="form_themanh">Photo Gallery - Thêm ảnh</option>
	  <option value="dsanh">Photo Gallery - Danh sách</option>
	  
	  <option value="form_themfile">Quản lý tài liệu, bài giảng- Thêm mới</option>
	  <option value="ds_file">Quản lý tài liệu, bài giảng - Danh sách </option>
	 
	  <option value="form_themdiemthi">Quản lý điểm thi- Thêm điểm </option>
	  <option value="ds_diemthi">Quản lý điểm thi- Danh sách điểm</option>
	 
	  <option value="form_themgiaovien">Quản lý giáo viên - Thêm mới </option>
	  <option value="ds_giaovien">Quản lý giáo viên- Danh sách </option>
	  
	   <option value="form_themmonhoc">Module Quản lý môn học - Thêm môn học</option>
	  <option value="ds_monhoc">Module Quản lý môn học - Danh sách</option>
	  
	  <option value="form_themkhoahoc">Module Quản lý khóa học - Thêm khóa học</option>
	  <option value="ds_khoahoc">Module Quản lý khoa học - Danh sách</option>
	  
	  <option value="form_themcauhoithamdo">Module FAQ - Thêm câu  hỏi</option>
	  <option value="ds_cauhoithamdo">Module FAQ - Danh sách câu hỏi</option>
	  
	  <option value="form_themcautraloithamdo">Module FAQ - Thêm trả lời</option>
	  <option value="ds_cautraloithamdo">Module FAQ - Danh sách câu trả lời</option>
	  
	  <option value="form_themlogo">Module Quảng cáo - Thêm logo</option>
	  <option value="ds_logo">Module Quảng cáo - Danh sách logo</option>
	  
	 <option value="form_themvideo">Module Vieo - Thêm video</option>
	  <option value="ds_video">Module Video - Danh sách video</option>
	  

	  <option value="form_themdownload">Module Download - Thêm file download</option>
	  <option value="ds_download">Module Download - Danh sách các file</option>


             <option value="ds_ykien">Form ý kiến dộc giả - Danh sách</option>
			  <option value="ds_dangky">Form đăng ký - Danh sách</option>
	  <option value="ds_lienhe">Form liên hệ - Danh sách</option>
    </select></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td ><input name="button2" type="button" onClick="doSubmit()" value="Thêm mới"></td>
  </tr>
  </form>
</table>
</body>
</html>