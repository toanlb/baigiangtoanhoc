<?php

function lay_duongdan($id)
{
  if($id!="")
  {  
    $d=0;
	$arr=array();
    while($id!=0)
    {	    
        $sql="select id_parent,tukhoa from gws_danhmuc where id=$id";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
	    $id=$row["id_parent"];
		$arr[$d]=$row["tukhoa"];
	    $d++;
    }      
  }
  if(sizeof($arr)==1) $href="page=".$arr[0];
  if(sizeof($arr)==2) $href="page=".$arr[1]."&p=".$arr[0];
  if(sizeof($arr)==3) $href="page=".$arr[2]."&p=".$arr[1]."&p_child=".$arr[0];
  return $href;
}

if(isset($_POST["exe_action"]))
{
	$exe_action=$_POST["exe_action"];
	if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  	  
	  $gt=$_POST["$sForm"];
	  if(substr($sForm,0,5)=="ckdel")
	  {
	  	$sql="delete from gws_hotels where id_hotel=$gt";
		mysql_query($sql);
	  }
    }		
}

?>
<?php
  if(isset($_GET["vector"]))
  {
    $vector=$_GET["vector"];
	$id=$_GET["id"];
	if($vector=="xuong"||$vector=="len")
	{
	  if($id_parent!=0) $sql="select id_hotel,capnhat from gws_hotels where id_parent=$id_parent order by capnhat desc";
	  else $sql="select id_hotel,capnhat from gws_hotels order by capnhat desc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_hotel"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_hotel"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_hotel"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update gws_hotels set capnhat='$capnhatdau' where id_hotel=$id_cuoi";
		mysql_query($sql);
		$sql="update gws_hotels set capnhat='$capnhatcuoi' where id_hotel=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=9;  
  if(isset($_GET["id_hotel"]))
  {
    $id_hotel=$_GET["id_hotel"];    
	$sql="delete from gws_hotels where id_hotel=$id_hotel";
	mysql_query($sql);
  }
?>
<html>
<head>
<title>Danh Sach Hotels</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function doKiemduyet(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrihotels/kiemduyet.php?id="+ck.name+"&trangthai="+tt;
}
function doTieudiem(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrihotels/tieudiem.php?id="+ck.name+"&trangthai="+tt;
}
function doTinnong(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrihotels/tinnong.php?id="+ck.name+"&trangthai="+tt;
}
</script>
<body>
<iframe name="ifKiemduyet" height="0" width="0"></iframe>
<?php require("top_main.php"); ?>
<!-- Tim kiem tin -->
<?php
$lang=$_GET["lang"];
$url=$_SERVER['QUERY_STRING'];
$url=str_replace("&lang=$lang","",$url);
?>
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td>Bài viết bằng: <a href="?<?php echo $url."&lang="?>">Tiếng Việt</a> | <a href="?<?php echo $url."&lang=_eng"?>">Tiếng Anh</a></td>
    <td align="right"><form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
	    <?php echo $arr_tin["ds_timkiem"];?>
		<input name="tieude" type="text" class="TextBox" value="<?php if(isset($_POST["tieude"])) echo $_POST["tieude"];?>" >  
		<input name="Search" type="submit" class="smallButton" id="Search" value="Tìm">
    </form></td>
  </tr>
</table>
<p>
<!-- Het tim kiem tin -->
<table width="99%" class="mainTb" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="7"><font size=2><b>Quản lý Khách sạn - Danh sách khách sạn</b></font></td>
  </tr>
  <tr>  
	<td width="5%" height="16" align="center" class="gridTitle"><?php echo $arr_tin["ds_stt"];?></td>
	<td align="center" class="gridTitle"><?php echo $arr_tin["ds_tieudetin"];?></td>
	<td width="8%" align="center" class="gridTitle">Tiêu chuẩn</td>
	<td width="8%" align="center" class="gridTitle">Mã K.S </td>
	<td width="8%" align="center" class="gridTitle">Hot</td>
	<td width="6%" align="center" class="gridTitle">Mới</td>
	<td width="8%" align="center" class="gridTitle">Duyệt</td>
	<td width="5%" align="center" class="gridTitle"><?php echo $arr_tin["ds_vitri"];?></td>
	<td width="7%" align="center" class="gridTitle"><?php echo $arr_tin["ds_xoa"];?></td>
  </tr>
<?php
$sql="select * from gws_hotels where trim(tieude$lang)<>'' and id_parent=$id_parent";
if (isset($_POST["tieude"]))
  {
	$tieude=$_POST["tieude"];
	$sql.=" and tieude$lang like '%$tieude%' ";			
  }
$sql.=" order by capnhat desc";
$resultcount=mysql_query($sql);	
$sl=$vt+$sodong; 
$sql.=" limit $sl";
$result=mysql_query($sql);
for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_hotel"];}
?>
<form action="" method="post" name="frmList">
	<input name="exe_action" type="hidden" id="exe_action">
<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr>
	<td class="gridRow" align="center"><?php echo $i;?></td>
	<td class="gridRow"><input name="ckdel<?php echo $row["id_hotel"];?>" type="checkbox" id="ckdel<?php echo $row["id_hotel"];?>" value="<?php echo $row["id_hotel"];?>">
	&nbsp;&nbsp;
	  <?php 
	  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_hotel"])) echo "<span class='doiVitri'>".$row["tieude$lang"]."</span>";
	  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_hotel"])) echo "<span class='doiVitri'>".$row["tieude$lang"]."</span>";
	  else echo $row["tieude$lang"];}else echo $row["tieude$lang"];?>   
	</td>
	<td class="gridRow" align="center"><?php echo $row["tieuchuan"];?></td>
	<td class="gridRow" align="center"><?php echo $row["hotel_code"];?></td>
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_hotel"];?>" <?php if($row["tinnong"]==1) echo "checked";?> onClick="doTinnong(this);"></td>
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_hotel"];?>" <?php if($row["tieudiem"]==1) echo "checked";?> onClick="doTieudiem(this);"></td>
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_hotel"];?>" <?php if($row["kiemduyet"]==1) echo "checked";?> onClick="doKiemduyet(this);"></td>
	<td class="gridRow" align="center">
	  <?php if($i>$vt){?><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a><?php }else echo "&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id_hotel"];?>';">V</a>
	</td>
	<td class="gridRow" align="center">
	  <a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suahotel&id_hotel=<?php echo $row["id_hotel"];?>';"><?php echo $arr_tin["ds_suatin"] ?></a>
	  <a href="javascript:if(confirm('<?php echo $arr_tin["ds_xacnhan_xoa_tin"] ?><?php echo $row["tieude$lang"];?>?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_hotel=<?php echo $row["id_hotel"];?>';"><?php echo $arr_tin["ds_xoatin"] ?></a>
	</td>
  </tr>
	<?php $i++;$idluu=$row["id_hotel"];}else{?>		  
  <tr>
	<td colspan="9" height="30" class="gridRow"><?php echo $arr_chung["chung_chuaco_noidung"] ?></td>
  </tr>
	<?php }?>
</form>
  <tr><td height="30" colspan="9" class="gridRow"><a href="javascript:deleteAll();"><strong><font color="#3300FF">Xóa các lựa chọn</font></strong></a></td>
  </tr>
  <tr>
    <td colspan="9" align="center"><?php require("phantrang.php"); ?></td>
  </tr>
</table>
<script language="javascript">
frmSubmit.tieude.focus();
function deleteAll()
{
	if(confirm("Bạn thực sự muốn xóa các lựa chọn?"))
	{
		frmList.exe_action.value="delete";
		frmList.submit();
	}
}
</script>
</body>
</html>