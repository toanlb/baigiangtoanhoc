<?php

function lay_duongdan($id)
{
  if($id!="")
  {  
    $d=0;
	$arr=array();
    while($id!=0)
    {	    
        $sql="select id_parent,tukhoa from gws_noidung gws_danhmuc where id=$id";
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
	  if($id_parent!=0) $sql="select id_noidung,capnhat from gws_noidung where id_parent=$id_parent order by capnhat asc";
	  else $sql="select id_noidung,capnhat from gws_noidung order by capnhat asc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_noidung"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_noidung"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_noidung"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update  set capnhat='$capnhatdau' where id_noidung=$id_cuoi";
		mysql_query($sql);
		$sql="update  set capnhat='$capnhatcuoi' where id_noidung=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=9;  
  if(isset($_GET["id_noidung"]))
  {
    $id_noidung=$_GET["id_noidung"];    
	$sql="delete from gws_noidung where id_noidung=$id_noidung";
	mysql_query($sql);
  }
?>
<html>
<head>
<title>Danh Sach Tin</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function doKiemduyet(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrinoidung/kiemduyet.php?id="+ck.name+"&trangthai="+tt;
}
</script>
<body>
<iframe name="ifKiemduyet" height="0" width="0"></iframe>
<?php require("top_main.php"); ?>
<?php
$lang=$_GET["lang"];
$url=$_SERVER['QUERY_STRING'];
$url=str_replace("&lang=$lang","",$url);
?>
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="4" style="display:none">
  <tr>
    <td>Bài viết bằng: <a href="?<?php echo $url."&lang="?>">Tiếng Việt</a> | <a href="?<?php echo $url."&lang=_eng"?>">Tiếng Anh</a></td>
    <td align="right"><form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
      <?php echo $arr_tin["ds_timkiem"];?>
      <input name="tieude" type="text" value="<?php if(isset($_POST["tieude$lang"])) echo $_POST["tieude$lang"];?>" >
      <input name="Search" type="submit" id="Search" value="Tìm">
    </form></td>
  </tr>
</table>
<p>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td colspan="2"><font size=2><b>Quản lý Nội dung - Danh sách</b></font></td>
  </tr>
  <tr class="gridTitle">
	<td class="gridTitle" width="5%" height="16" align="center"><?php echo $arr_tin["ds_stt"];?></td>
	<td class="gridTitle" align="center"><?php echo $arr_tin["ds_tieudetin"];?></td>
	<td class="gridTitle" width="6%" align="center"><?php echo $arr_tin["ds_duyet"];?></td>
	<td class="gridTitle" width="7%" align="center"><?php echo $arr_tin["ds_xoa"];?></td>
  </tr>
<?php
$sql="select * from gws_noidung where trim(tieude$lang)<>'' and id_parent=$id_parent";
if (isset($_POST["tieude"]))
  {
	$tieude=$_POST["tieude"];
	$sql.=" and tieude$lang like '%$tieude%' ";			
  }
$sql.=" order by capnhat asc";
$resultcount=mysql_query($sql);	
$sl=$vt+$sodong; 
$sql.=" limit $sl";
$result=mysql_query($sql);
for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_noidung"];}
?>

<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" align="center"><?php echo $i;?>.</td>
	<td class="gridRow">&nbsp;&nbsp;
	  <?php 
	  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_noidung"])) echo "<span class='doiVitri'>".$row["tieude"]."</span>";
	  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_noidung"])) echo "<span class='doiVitri'>".$row["tieude$lang"]."</span>";
	  else echo $row["tieude$lang"];}else echo $row["tieude$lang"];?></td>
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_noidung"];?>" <?php if($row["kiemduyet"]==1) echo "checked";?> onClick="doKiemduyet(this)"></td>
	<td class="gridRow" align="center">
	  <a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suanoidung&id_noidung=<?php echo $row["id_noidung"];?>';"><?php echo $arr_tin["ds_suatin"] ?></a>
	  <a href="javascript:if(confirm('<?php echo $arr_tin["ds_xacnhan_xoa_tin"] ?><?php echo $row["tieude$lang"];?>?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_noidung=<?php echo $row["id_noidung"];?>';"><?php echo $arr_tin["ds_xoatin"] ?></a></td>
  </tr>
	<?php $i++;$idluu=$row["id_noidung"];}else{?>		  
  <tr>
	<td colspan="4" height="30" class="gridRow"><?php echo $arr_chung["chung_chuaco_noidung"] ?></td>
  </tr>
	<?php }?>
  <tr>
    <td colspan="4" align="center"><?php require("phantrang.php"); ?></td>
  </tr>
</table>
<script language="javascript">frmSubmit.tieude.focus();</script>
</body>
</html>