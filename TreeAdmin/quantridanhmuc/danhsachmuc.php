<?php
  if(isset($_GET["vector"]))
  {
    $vector=$_GET["vector"];
	$id=$_GET["id"];
	if($vector=="xuong"||$vector=="len")
	{
	  if($id!=0) $sql="select id,capnhat from gws_danhmuc where id_parent=$id_parent order by capnhat asc";
	  else $sql="select id,capnhat from gws_danhmuc order by capnhat asc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update gws_danhmuc set capnhat='$capnhatdau' where id=$id_cuoi";
		mysql_query($sql);
		$sql="update gws_danhmuc set capnhat='$capnhatcuoi' where id=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=20;
?>
<html>
<head>
<title>Danh Sach Muc</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function doRemove(ob)
{
  if(confirm(thongdiepdau.value+ob.value+thongdiepcuoi.value))
  {
    frmSubmit.action="?id="+ob.name;
	frmSubmit.submit();
  }
}
function sapxep()
{
  window.location='?id_parent='+id_parent+'&kieunhap=form_qlmuc_dsmuc';
}

</script>
<body>
<?php require("top_main.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr class="gridTitle">
    <td class="gridTitle" align="center">STT</td>
    <td class="gridTitle">&nbsp;&nbsp;Hệ thống website</td>
    <td class="gridTitle" align="center">Sắp xếp</td>
  </tr>
<?php			    
$sql="select * from gws_danhmuc where id_parent=$id_parent order by capnhat asc";
$resultcount=mysql_query($sql);	
$sl=$vt+$sodong; 
$sql.=" limit $sl";
$result=mysql_query($sql);
for($bg=1;$bg<$vt;$bg++) $row=mysql_fetch_array($result);
$i=$vt;
if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" width="5%" align="center"><?php echo $i++;?></td>
	<td class="gridRow">&nbsp;&nbsp;<span style="cursor:default" title="ID: [<?php echo $row["id"];?>] Từ khóa: [<?php echo $row["tukhoa"];?>]"> <?php echo $row["ten"];?></span></td>
	<td class="gridRow" width="8%" align="center">
	<a title="<?php echo $arr_chung["len"] ?>" href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=len&id=<?php echo $idluu;?>';">&Lambda;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title="<?php echo $arr_chung["xuong"] ?>" href="javascript:window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&vt=<?php $tg=$_GET["vt"];echo $tg;?>&vector=xuong&id=<?php echo $row["id"];?>';">V</a></td>
  </tr>  
  <?php $idluu=$row["id"];}else{?>
  <tr>
	<td colspan="3">&nbsp;Chưa có mục nào!</td>
  </tr>
  <?php }?>
</table>
</body>
</html>