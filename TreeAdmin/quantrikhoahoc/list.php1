<?php
  if(isset($_GET["vector"]))
  {
    $vector=$_GET["vector"];
	$id=$_GET["id"];
	if($vector=="xuong"||$vector=="len")
	{
	  if($id_parent!=0) $sql="select id_kh,capnhat from gws_khoahoc where id_parent=$id_parent order by capnhat desc";
	  else $sql="select id_kh,capnhat from gws_khoahoc order by capnhat desc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_kh"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_kh"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_kh"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update gws_khoahoc set capnhat='$capnhatdau' where id_kh=$id_cuoi";
		mysql_query($sql);
		$sql="update gws_khoahoc set capnhat='$capnhatcuoi' where id_kh=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=11;  
  if(isset($_GET["id_kh"]))
  {
    $id_kh=$_GET["id_kh"];    
	$sql="delete from gws_khoahoc where id_kh=$id_kh";
	mysql_query($sql);
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Danh Sách Khóa Học</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function doKiemduyet(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrikhoahoc/kiemduyet.php?id="+ck.name+"&trangthai="+tt;
}

function doKhoahocmoi(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrikhoahoc/khmoi.php?id="+ck.name+"&trangthai="+tt;
}

function doTieudiem(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantrikhoahoc/tieudiem.php?id="+ck.name+"&trangthai="+tt;
}
</script>
<body>
<iframe name="ifKiemduyet" height="0" width="0"></iframe>
<?php require("top_main.php"); ?>
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="4">
  <tr>
  	<td>&nbsp;</td>
    <td align="right"><form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
      <?php echo $arr_tin["ds_timkiem"];?>
      <input name="tieude" type="text" value="<?php if(isset($_POST["tieude$lang"])) echo $_POST["tieude$lang"];?>" >
      <input name="Search" type="submit" id="Search" value="Tìm">
    </form></td>
  </tr>
</table>
<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="6"><font size=2><b> Quản lý khóa học- Danh sách khóa học </b></font></td>
  </tr>
  <tr>
    <td width="5%" height="16" align="center" class="gridTitle">#</td>
    <td class="gridTitle">&nbsp;&nbsp;Tên khóa học </td>
    <td width="15%" align="center" class="gridTitle">Ảnh  </td>
	 <td width="8%" align="center" class="gridTitle">KH mới </td>
	  <td width="8%" align="center" class="gridTitle">Tiêu điểm </td>
    <td width="8%" align="center" class="gridTitle">Hiển thị </td>
    <td width="8%" align="center" class="gridTitle">Vị trí </td>
    <td width="7%" align="center" class="gridTitle">Thao tác </td>
  </tr>
  <?php
	$sql="select * from gws_khoahoc where id_parent=$id_parent order by capnhat asc";
	$resultcount=mysql_query($sql);	
	$sl=$vt+$sodong; 
	$sql.=" limit $sl";
	//echo $sql;
	$result=mysql_query($sql);
	for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_kh"];}
  ?>
  <?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" width="5%" align="center"><?php echo $i;?></td>
	<td class="gridRow">&nbsp;&nbsp;<?php 
		if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_kh"])) echo "<span class='doiVitri'>".$row["tenkh"]."</span>";
		elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_kh"])) echo "<span class='doiVitri'>".$row["tenkh"]."</span>";
		else echo $row["tenkh"];}else echo $row["tenkh"];?></td>
	<td class="gridRow" align="center">
	<?php if($row["anh"]!="") {
			echo "<img src='".$row["anh"]."' width='50px'";
		}
		else echo "chưa có ảnh";
	?></td>
	
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_kh"];?>" <?php if($row["khmoi"]==1) echo "checked";?> onClick="doKhoahocmoi(this)"></td>
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_kh"];?>" <?php if($row["khmoi1"]==1) echo "checked";?> onClick="doTieudiem(this)"></td>
	
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_kh"];?>" <?php if($row["kiemduyet"]==1) echo "checked";?> onClick="doKiemduyet(this)"></td>
	
	
	<td class="gridRow" width="10%" align="center"><?php if($i>$vt){?><a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a><?php }else echo "&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id_kh"];?>';">V</a></td>
	<td class="gridRow" width="5%" align="center">
	<a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suakhoahoc&id_kh=<?php echo $row["id_kh"];?>';"><?php echo $arr_chung["sua"] ?></a>
	<a href="javascript:if(confirm('B&#7841;n th&#7921;c s&#7921; mu&#7889;n x&#243;a file [<?php echo $row["tieude"];?>] ch&#7913;?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_kh=<?php echo $row["id_kh"];?>';"><?php echo $arr_chung["xoa"] ?></a>  </tr>
  <?php $i++;$idluu=$row["id_kh"];}else{?>		  
  <tr>
	<td class="gridRow" colspan="6" height="30"><?php echo $arr_chung["chung_chuaco_noidung"] ?></td>
  </tr>
  <?php }?>
  <tr><td colspan="6"><?php require("phantrang.php"); ?></td></tr>
</table>
</body>
</html>