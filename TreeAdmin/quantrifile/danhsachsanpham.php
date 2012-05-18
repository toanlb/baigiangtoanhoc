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

	  if($id_parent!=0) $sql="select id_thuvien,capnhat from gws_thuvien where id_parent=$id_parent order by capnhat desc";

	  else $sql="select id_thuvien,capnhat from gws_thuvien order by capnhat desc";

	  $resultvt=mysql_query($sql);

	  if(mysql_num_rows($resultvt)!=0)

	  {

	    $kt=0;

	    while($kt==0&&$row=mysql_fetch_array($resultvt))

		{

		  $id_dau=$row["id_thuvien"];

		  $capnhatdau=$row["capnhat"];

		  if(intval($id_dau)==intval($id)) $kt=1;

		}  		

		if($row=mysql_fetch_array($resultvt))

		{

		  $id_cuoi=$row["id_thuvien"];

		  $capnhatcuoi=$row["capnhat"];

		}else{

		  $resultvt=mysql_query($sql);

		  $row=mysql_fetch_array($resultvt);

		  $id_cuoi=$row["id_thuvien"];

		  $capnhatcuoi=$row["capnhat"];

		}

		$sql="update gws_thuvien set capnhat='$capnhatdau' where id_thuvien=$id_cuoi";

		mysql_query($sql);

		$sql="update gws_thuvien set capnhat='$capnhatcuoi' where id_thuvien=$id_dau";

		mysql_query($sql);

	  }

	}

  }

  if(!isset($_GET["vt"])) $vt=1;

  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;

  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);

  $sodong=11;  

  if(isset($_GET["id_thuvien"]))

  {

    $id_sp=$_GET["id_thuvien"];

	$sql="delete from gws_thuvien where id_thuvien=$id_sp";

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



function doKiemduyet(ck)

{

  if(ck.checked) tt=1;else tt=0;

  ifKiemduyet.location="quantrifile/kiemduyet.php?id="+ck.name+"&trangthai="+tt;

}



function doMoi(ck)

{

  if(ck.checked) tt=1;else tt=0;

  ifKiemduyet.location="quantrifile/spmoi.php?id="+ck.name+"&trangthai="+tt;

}

function doDown(ck)

{

  if(ck.checked) tt=1;else tt=0;

  ifKiemduyet.location="quantrifile/down.php?id="+ck.name+"&trangthai="+tt;

}



function doVip(ck)

{

  if(ck.checked) tt=1;else tt=0;

  ifKiemduyet.location="quantrifile/vip.php?id="+ck.name+"&trangthai="+tt;

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

		<input name="tentl" type="text" value="<?php if(isset($_POST["tentl"])) echo $_POST["tentl"];?>" >  

		<input name="Search" type="submit" id="Search" value="Tìm">

    </form>

	</td>

  </tr>

</table>

<p>

<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">

  <tr>

    <td colspan="9"><font size=2><b>Quản lý tài liệu, bài giảng- Danh sách </b></font></td>

  </tr>

  <tr class="gridTitle">

    <td width="3%" height="16" align="center" class="gridTitle"><?php echo $arr_sp["ds_stt"] ?></td>

    <td width="32%" class="gridTitle">&nbsp;&nbsp;Tên tài liệu</td>

    

    

    <td width="11%" align="center" class="gridTitle">Ảnh</td>

   <td width="14%" align="center" class="gridTitle">Miễn phí </td>
   <td width="14%" align="center" class="gridTitle">Download nhiều </td>

	

	<td width="14%" align="center" class="gridTitle">VIP</td>

	<td width="5%" align="center" class="gridTitle">Hiển thị </td>

    

    <td width="7%" align="center" class="gridTitle"><?php echo $arr_sp["ds_xoa"] ?></td>

  </tr>

	<?php

	$sql="select * from gws_thuvien where id_parent=$id_parent";

	if (isset($_POST["tentl"]))

	  {

		$tensp=$_POST["tentl"];

		$sql.=" and tentl$lang like '%$tensp%' ";			

	  }

	$sql.=" order by capnhat desc";

	$resultcount=mysql_query($sql);	

	$sl=$vt+$sodong; 

	$sql.=" limit $sl";

	$result=mysql_query($sql);

	for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_thuvien"];}

	?>

	<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>

  <tr class="gridRow">

	<td class="gridRow" align="center"><?php echo $i;?></td>

	<td class="gridRow" id="<?php echo lay_duongdan($row["id_parent"])."&id=".$row["id_thuvien"];?>">&nbsp;&nbsp;

	  <?php 

	  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_thuvien"])) echo "<span class='doiVitri'>".$row["tensp$lang"]."</span>";

	  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_thuvien"])) echo "<span class='doiVitri'>".$row["tentl$lang"]."</span>";

	  else echo $row["tentl$lang"];}else echo $row["tentl$lang"];?>	</td>

	

	

<td class="gridRow" align="center">

	<?php if($row["anh"]!="") {

			echo "<img src='".$row["anh"]."' width='50px'";

		}

		else echo "chưa có ảnh";

	?></td>

	

	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_thuvien"];?>" <?php if($row["tinmoi"]==1) echo "checked";?> onClick="doMoi(this);"></td>

<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_thuvien"];?>" <?php if($row["down"]==1) echo "checked";?> onClick="doDown(this);"></td>


	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_thuvien"];?>" <?php if($row["vip"]==1) echo "checked";?> onClick="doVip(this);"></td>

	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_thuvien"];?>" <?php if($row["kiemduyet"]==1) echo "checked";?> onClick="doKiemduyet(this);"></td>

	

	<td class="gridRow" align="center">

	  <a href="javascript:window.location='formSua.php?id_parent=<?php echo $id_parent;?>&kieunhap=form_suafile&id_thuvien=<?php echo $row["id_thuvien"];?>';"><?php echo $arr_sp["ds_suasp"] ?></a>

	  <a href="javascript:if(confirm('<?php echo $arr_sp["ds_xacnhan_xoa_sp"] ?><?php echo $row["file$lang"];?>')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_thuvien=<?php echo $row["id_thuvien"];?>';"><?php echo $arr_sp["ds_xoasp"] ?></a></td>

  </tr>

	<?php $i++;$idluu=$row["id_thuvien"];}else{?>

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

<script language="javascript">frmSubmit.tensp.focus();</script>

</body>

</html>