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
	  if($id_parent!=0) $sql="select id_traloithamdo,capnhat from gws_traloithamdo where id_parent=$id_parent order by capnhat asc";
	  else $sql="select id_traloithamdo,capnhat from gws_traloithamdo order by capnhat asc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_traloithamdo"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_traloithamdo"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_traloithamdo"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update gws_traloithamdo set capnhat='$capnhatdau' where id_traloithamdo=$id_cuoi";
		mysql_query($sql);
		$sql="update gws_traloithamdo set capnhat='$capnhatcuoi' where id_traloithamdo=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=11;  
  if(isset($_GET["id_traloithamdo"]))
  {
    $id_traloithamdo=$_GET["id_traloithamdo"];
	$sql="delete from gws_traloithamdo where id_traloithamdo=$id_traloithamdo";
	mysql_query($sql);
  }
?>
<html>
<head>
<title>Danh Sach Cau Tra Loi Tham Do</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Tim kiem -->
<?php
$lang=$_GET["lang"];
$url=$_SERVER['QUERY_STRING'];
$url=str_replace("&lang=$lang","",$url);
?>

<?php
  $sql="select cauhoithamdo from gws_cauhoithamdo where trim(cauhoithamdo$lang)<>'' and id_cauhoithamdo=$id_parent";
  $rs=mysql_query($sql);
  $row=mysql_fetch_array($rs);  
?>
<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">
  <tr>
	<td><font size=2><b><?php echo $row["cauhoithamdo"];?></b></font></td>
	<td align="right">Câu trả lời bằng: <a href="?<?php echo $url."&lang="?>">Tiếng Việt</a> | <a href="?<?php echo $url."&lang=_eng"?>">Tiếng Anh</a></td>
  </tr>
</table>
<p>
<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="5%" height="16" align="center" class="gridTitle"><?php echo $arr_sp["ds_stt"] ?></td>
    <td class="gridTitle">&nbsp;&nbsp;Các phương án lựa chọn</td>
    <td width="5%" align="center" class="gridTitle">Clicks</td>
    <td width="8%" align="center" class="gridTitle"><?php echo $arr_sp["ds_vitri"] ?></td>
    <td width="12%" align="center" class="gridTitle">Tính năng </td>
  </tr>
	<?php
	$sql="select * from gws_traloithamdo where id_parent=$id_parent";
	$sql.=" order by capnhat asc";
	$resultcount=mysql_query($sql);	
	$sl=$vt+$sodong; 
	$sql.=" limit $sl";
	$result=mysql_query($sql);
	for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_traloithamdo"];}
	?>
	<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" align="center"><?php echo $i;?></td>
	<td class="gridRow" id="<?php echo $row["id_traloithamdo"];?>">&nbsp;&nbsp;
	  <?php 
	  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_traloithamdo"])) echo "<span class='doiVitri'>".$row["traloithamdo$lang"]."</span>";
	  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_traloithamdo"])) echo "<span class='doiVitri'>".$row["traloithamdo$lang"]."</span>";
	  else echo $row["traloithamdo$lang"];}else echo $row["traloithamdo$lang"];?>	</td>
	<td class="gridRow" align="center"><?php echo $row["soluongchon"];?></td>
	<td class="gridRow" align="center">
	  <?php if($i>$vt){?><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a><?php }else echo "&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id_traloithamdo"];?>';">V</a>	</td>
	<td class="gridRow" align="center">
	  <a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suatraloithamdo&id_traloithamdo=<?php echo $row["id_traloithamdo"];?>';"><?php echo $arr_sp["ds_suasp"] ?></a>
	  <a href="javascript:if(confirm('Bạn thực sự muốn xóa câu trả lời [<?php echo $row["traloithamdo$lang"];?>]?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_traloithamdo=<?php echo $row["id_traloithamdo"];?>';"><?php echo $arr_sp["ds_xoasp"] ?></a></td>
  </tr>
  <?php $i++;$idluu=$row["id_traloithamdo"];}else{?>
  <tr>
    <td class="gridRow" colspan="5"><?php echo $arr_chung["chung_chuaco_noidung"]?></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="5"><a href="?id_parent=<?php echo $id_parent?>&kieunhap=form_themcautraloithamdo">Thêm trả lời</a></td>
  </tr>
<!-- Phan trang -->
  <tr align="center">
    <td colspan="5"><?php require("phantrang.php"); ?></td>
  </tr>
<!-- Het phan trang -->
</table>
</body>
</html>