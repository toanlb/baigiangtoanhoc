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
	  if($id_parent!=0) $sql="select id_diemthi,capnhat from gws_diemthi where id_parent=$id_parent order by capnhat desc";
	  else $sql="select id_diemthi,capnhat from gws_diemthi order by capnhat desc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_diemthi"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_diemthi"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_diemthi"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update gws_diemthi set capnhat='$capnhatdau' where id_diemthi=$id_cuoi";
		mysql_query($sql);
		$sql="update gws_diemthi set capnhat='$capnhatcuoi' where id_diemthi=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=11;  
  if(isset($_GET["id_diemthi"]))
  {
    $id_sp=$_GET["id_diemthi"];
	$sql="delete from gws_diemthi where id_diemthi=$id_sp";
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
  window.open("../?"+th.id);
}


function doSPmoi(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantridiemthi/spmoi.php?id="+ck.name+"&trangthai="+tt;
}

function doSPKM(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantridiemthi/spkm.php?id="+ck.name+"&trangthai="+tt;
}

function doKho(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifKiemduyet.location="quantridiemthi/kho.php?id="+ck.name+"&trangthai="+tt;
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
  	<td>Ngôn ngữ: <a href="?<?php echo $url."&lang="?>">Tiếng Việt</a> | <a href="?<?php echo $url."&lang=_eng"?>">Tiếng Anh</a></td>
    <td align="right">	  <form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
	    <?php echo $arr_sp["ds_timkiem"] ?>
		<input name="tensp" type="text" value="<?php if(isset($_POST["tensp"])) echo $_POST["tensp"];?>" >  
		<input name="Search" type="submit" id="Search" value="Tìm">
    </form>
	</td>
  </tr>
</table>
<p>
<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="9"><font size=2><b>Module điểm thi - Danh mục điểm thi</b></font></td>
  </tr>
  <tr class="gridTitle">
    <td width="5%" height="16" align="center" class="gridTitle"><?php echo $arr_sp["ds_stt"] ?></td>
    <td width="23%" class="gridTitle">&nbsp;&nbsp;Họ và tên </td>
    <td width="10%" align="center" class="gridTitle">Số báo danh </td>
	<td width="10%" align="center" class="gridTitle">Khóa học </td>
    <td width="11%" align="center" class="gridTitle">Phần nghe </td>
    <td width="10%" align="center" class="gridTitle">Phần ngữ pháp </td>
    <td width="10%" align="center" class="gridTitle">Phần đọc hiểu </td>
    <td width="10%" align="center" class="gridTitle" >Phần nói </td>
   
    <td width="7%" align="center" class="gridTitle"><?php echo $arr_sp["ds_xoa"] ?></td>
  </tr>
	<?php
	$sql="SELECT `gws_diemthi`.`id_diemthi`,`gws_diemthi`.`hovaten`,`gws_diemthi`.`sbd`, `gws_nhasanxuat`.`ten_nsx`,`gws_diemthi`.`monthi1`,`gws_diemthi`.`monthi2`,`gws_diemthi`.`monthi3`,`gws_diemthi`.`monthi4`
FROM gws_diemthi, gws_nhasanxuat
where `gws_nhasanxuat`.`id_nsx`=`gws_diemthi`.`id_nsx`";
	
	
	$resultcount=mysql_query($sql);	
	$sl=$vt+$sodong; 
	 $tongdiem=$_POST["tongdiem"];
	 $heso=$_POST["heso"];
	
	$result=mysql_query($sql);

	for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_diemthi"];}
	?>
	<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" align="center"><?php echo $row["id_diemthi"];?></td>
	<td class="gridRow" >&nbsp;&nbsp;<?php echo $row["hovaten"];?>
	  	</td>
	<td class="gridRow" align="center"><?php echo $row["sbd"];?></td>
	<td class="gridRow" align="center"><?php echo $row["ten_nsx"];?></td>
	<td class="gridRow" align="center"><?php echo $row["monthi1"];?></td>
	<td class="gridRow" align="center"><?php echo $row["monthi2"];?></td>
	<td class="gridRow" align="center"><?php echo $row["monthi3"];?></td>
	<td class="gridRow" align="center" ><?php echo $row["monthi4"];?> </td>
	
	<td class="gridRow" align="center">
	  <a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suasanpham&id_diemthi=<?php echo $row["id_diemthi"];?>';"><?php echo $arr_sp["ds_suasp"] ?></a>
	 <a href="javascript:if(confirm('<?php echo $arr_tin["ds_xacnhan_xoa_diemthi"] ?><?php echo $row["sbd$lang"];?>?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_diemthi=<?php echo $row["id_diemthi"];?>';"><?php echo $arr_tin["ds_xoatin"] ?></a></td>
  </tr>
	<?php $i++;$idluu=$row["id_diemthi"];}else{?>
  <tr>
    <td class="gridRow" colspan="9"><?php echo $arr_chung["chung_chuaco_noidung"] ?></td>
  </tr>
	<?php }?>
<!-- Phan trang -->
  <tr align="center">
    <td colspan="9"><?php require("phantrang.php"); ?></td>
  </tr>
<!-- Het phan trang -->
</table>
<script language="javascript">frmSubmit.hovaten.focus();</script>
</body>
</html>