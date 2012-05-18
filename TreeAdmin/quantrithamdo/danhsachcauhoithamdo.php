<?php
function lay_duongdan($id)
{
  if($id!="")
  {  
    $d=0;
	$arr=array();
    while($id!=0)
    {	    
        $sql="select id_parent,tukhoa from danhmuc where id=$id";
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
?>
<?php
  if(isset($_GET["vector"]))
  {
    $vector=$_GET["vector"];
	$id=$_GET["id"];
	if($vector=="xuong"||$vector=="len")
	{
	  if($id_parent!=0) $sql="select id_cauhoithamdo,capnhat from gws_cauhoithamdo where id_parent=$id_parent order by capnhat asc";
	  else $sql="select id_cauhoithamdo,capnhat from gws_cauhoithamdo order by capnhat asc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_cauhoithamdo"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_cauhoithamdo"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_cauhoithamdo"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update gws_cauhoithamdo set capnhat='$capnhatdau' where id_cauhoithamdo=$id_cuoi";
		mysql_query($sql);
		$sql="update gws_cauhoithamdo set capnhat='$capnhatcuoi' where id_cauhoithamdo=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=11;  
  if(isset($_GET["id_cauhoithamdo"]))
  {
    $id_cauhoithamdo=$_GET["id_cauhoithamdo"];
	$sql="delete from gws_cauhoithamdo where id_cauhoithamdo=$id_cauhoithamdo";	
	mysql_query($sql);
	$sql="delete from gws_traloithamdo where id_parent=$id_cauhoithamdo";	
	mysql_query($sql);
  }
?>
<html>
<head>
<title>Danh Sach San Pham</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function Preview(th)
{
  browseURL="danhsach.php?id_parent="+th.id+"&kieunhap=ds_cautraloithamdo"
  var oWindow = openNewWindow(browseURL, "BrowseWindow",650,450) ;
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
</script>
<body>
<iframe name="ifExecute" height="0" width="0"></iframe>
<?php require("top_main.php"); ?>
<?php
$lang=$_GET["lang"];
$url=$_SERVER['QUERY_STRING'];
$url=str_replace("&lang=$lang","",$url);
?>
<!-- Tim kiem -->
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td>Bình chọn bằng: <a href="?<?php echo $url."&lang="?>">Tiếng Việt</a> | <a href="?<?php echo $url."&lang=_eng"?>">Tiếng Anh</a></td>
    <td align="right"><form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
	    <?php echo $arr_sp["ds_timkiem"] ?>
		<input name="cauhoithamdo" type="text" class="TextBox" value="<?php if(isset($_POST["cauhoithamdo"])) echo $_POST["cauhoithamdo"];?>" >  
		<input name="Search" type="submit" id="Search" value="Tìm"></form>
    </td>
  </tr>
</table>
<p>
<!-- Het tim kiem -->
<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="5"><font size=2><b>Module Bình chọn - Danh sách câu hỏi</b></font></td>
  </tr>
  <tr>
    <td width="5%" height="16" align="center" class="gridTitle"><?php echo $arr_sp["ds_stt"] ?></td>
    <td class="gridTitle">Câu hỏi thăm dò</td>
    <td width="8%" align="center" class="gridTitle">Hiển thị</td>
    <td width="5%" align="center" class="gridTitle"><?php echo $arr_sp["ds_vitri"] ?></td>
    <td width="7%" align="center" class="gridTitle"><?php echo $arr_sp["ds_xoa"] ?></td>
  </tr>
	<?php
	$sql="select * from gws_cauhoithamdo where id_parent=$id_parent";
	if (isset($_POST["cauhoithamdo"]))
	  {
		$cauhoithamdo=$_POST["cauhoithamdo"];
		$sql.=" and cauhoithamdo$lang like '%$cauhoithamdo%' ";			
	  }
	$sql.=" order by capnhat asc";
	$resultcount=mysql_query($sql);	
	$sl=$vt+$sodong; 
	$sql.=" limit $sl";
	$result=mysql_query($sql);
	for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_cauhoithamdo"];}
	?>
	<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" align="center"><?php echo $i;?></td>
	<td class="gridRow" id="<?php echo $row["id_cauhoithamdo"];?>" style="cursor:pointer;" onClick="Preview(this);">&nbsp;&nbsp;
	  <?php 
	  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_cauhoithamdo"])) echo "<span class='doiVitri'>".$row["cauhoithamdo"]."</span>";
	  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_cauhoithamdo"])) echo "<span class='doiVitri'>".$row["cauhoithamdo"]."</span>";
	  else echo $row["cauhoithamdo$lang"];}else echo $row["cauhoithamdo$lang"];?>    
	</td>
	<td class="gridRow" align="center"><input name="radiobutton" type="radio" value="<?php echo $row["id_cauhoithamdo"];?>" onClick="doSelect(this);" <?php if($row["selected"]==1) echo "checked";?>></td>
	<td class="gridRow" align="center">
	  <?php if($i>$vt){?><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a><?php }else echo "&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id_cauhoithamdo"];?>';">V</a>
	</td>
	<td class="gridRow">
	  <a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suacauhoithamdo&id_cauhoithamdo=<?php echo $row["id_cauhoithamdo"];?>';"><?php echo $arr_sp["ds_suasp"] ?></a>
	  <a href="javascript:if(confirm('Bạn thực sự muốn xóa [<?php echo $row["cauhoithamdo$lang"];?>] ?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_cauhoithamdo=<?php echo $row["id_cauhoithamdo"];?>';"><?php echo $arr_sp["ds_xoasp"] ?></a>
	</td>
  </tr>
	<?php $i++;$idluu=$row["id_cauhoithamdo"];}else{?>
  <tr>
    <td class="gridRow" colspan="5"><?php echo $arr_chung["chung_chuaco_noidung"] ?></td>
  </tr>
	<?php }?>
<!-- Phan trang -->
  <tr align="center">
    <td colspan="5" class="row1"><?php require("phantrang.php"); ?></td>
  </tr>
<!-- Het phan trang -->
</table>
<script language="javascript">
function doSelect(obj)
{
  ifExecute.location="quantrithamdo/select.php?id="+obj.value;
}
</script>
<script language="javascript">frmSubmit.cauhoithamdo.focus();</script>
</body>
</html>