<?php

function lay_duongdan($id)
{
  if($id!="")
  {  
    $d=0;
	$arr=array();
    while($id!=0)
    {	    
        $sql="select id_parent,tukhoa from gws_lienhe gws_danhmuc where id=$id";
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
	  if($id_parent!=0) $sql="select id_lienhe,capnhat from gws_lienhe where id_parent=$id_parent order by capnhat asc";
	  else $sql="select id_lienhe,capnhat from gws_lienhe order by capnhat asc";
	  $resultvt=mysql_query($sql);
	  if(mysql_num_rows($resultvt)!=0)
	  {
	    $kt=0;
	    while($kt==0&&$row=mysql_fetch_array($resultvt))
		{
		  $id_dau=$row["id_lienhe"];
		  $capnhatdau=$row["capnhat"];
		  if(intval($id_dau)==intval($id)) $kt=1;
		}  		
		if($row=mysql_fetch_array($resultvt))
		{
		  $id_cuoi=$row["id_lienhe"];
		  $capnhatcuoi=$row["capnhat"];
		}else{
		  $resultvt=mysql_query($sql);
		  $row=mysql_fetch_array($resultvt);
		  $id_cuoi=$row["id_lienhe"];
		  $capnhatcuoi=$row["capnhat"];
		}
		$sql="update  set capnhat='$capnhatdau' where id_lienhe=$id_cuoi";
		mysql_query($sql);
		$sql="update  set capnhat='$capnhatcuoi' where id_lienhe=$id_dau";
		mysql_query($sql);
	  }
	}
  }
  if(!isset($_GET["vt"])) $vt=1;
  else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
  else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
  $sodong=9;  
  if(isset($_GET["id_lienhe"]))
  {
    $id_lienhe=$_GET["id_lienhe"];    
	$sql="delete from gws_lienhe where id_lienhe=$id_lienhe";
	mysql_query($sql);
  }
?>
<html>
<head>
<title>Danh Sach Lien he</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function doXuly(ck)
{
  if(ck.checked) tt=1;else tt=0;
  ifXuly.location="quantrilienhe/xuly.php?id="+ck.name+"&trangthai="+tt;
}
</script>
<body>
<iframe name="ifXuly" height="0" width="0"></iframe>
<?php require("top_main.php"); ?>
<?php
$lang=$_GET["lang"];
$url=$_SERVER['QUERY_STRING'];
$url=str_replace("&lang=$lang","",$url);
?>
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
      Tìm kiếm
      <input name="tenkhach" type="text" value="<?php if(isset($_POST["tenkhach"])) echo $_POST["tenkhach"];?>" >
      <input name="Search" type="submit" id="Search" value="Tìm">
    </form></td>
  </tr>
</table>
<p>
<table width="99%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td colspan="7"><font size=2><b>Form liên hệ - Danh sách liên hệ</b></font></td>
  </tr>
  <tr class="gridTitle">
	<td class="gridTitle" width="5%" align="center"><?php echo $arr_tin["ds_stt"];?></td>
	<td class="gridTitle">&nbsp;&nbsp;Người liên hệ</td>
	<td width="18%" class="gridTitle">Email</td>
	<td width="12%" class="gridTitle">Điện thoại </td>
	<td width="20%" class="gridTitle">Lúc</td>
	<td width="9%" align="center" class="gridTitle">Tình trạng </td>
	<td class="gridTitle" width="7%" align="center">&nbsp;</td>
  </tr>
<?php
$sql="select *, DATE_FORMAT(capnhat,'%H:%i ngày %d-%m-%Y') as datetime from gws_lienhe where trim(tenkhach)<>''";
if (isset($_POST["tenkhach"]))
  {
	$tieude=$_POST["tenkhach"];
	$sql.=" and tenkhach like '%$tenkhach%' ";			
  }
$sql.=" order by capnhat asc";
$resultcount=mysql_query($sql);	
$sl=$vt+$sodong; 
$sql.=" limit $sl";
$result=mysql_query($sql);
for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_lienhe"];}
?>

<?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <tr class="gridRow">
	<td class="gridRow" align="center"><?php echo $i;?>.</td>
	<td class="gridRow">&nbsp;&nbsp;
	  <?php 
	  if(isset($_GET["vector"])){ if($vector=="xuong"&&intval($id_dau)==intval($row["id_lienhe"])) echo "<span class='doiVitri'>".$row["tieude"]."</span>";
	  elseif($vector=="len"&&intval($id_cuoi)==intval($row["id_lienhe"])) echo "<span class='doiVitri'>".$row["tieude$lang"]."</span>";
	  else echo $row["tieude$lang"];}else echo $row["tenkhach"];?></td>
	<td class="gridRow"><a href="mailto:<?php echo $row["email"];?>"><?php echo $row["email"];?></a></td>
	<td class="gridRow"><?php echo $row["dienthoai"];?></td>
	<td class="gridRow"><?php echo $row["datetime"];?></td>
	<td class="gridRow" align="center"><input type="checkbox" name="<?php echo $row["id_lienhe"];?>" <?php if($row["xuly"]==1) echo "checked";?> onClick="doXuly(this)"></td>
	<td class="gridRow" align="center">
	  <a href="javascript:var oW=window.open('quantrilienhe/view_detail.php?id_lienhe=<?php echo $row["id_lienhe"];?>','','400','300');">Xem</a>
	  <a href="javascript:if(confirm('Xóa <?php echo $row["tenkhach"];?>?')) window.location='?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_lienhe=<?php echo $row["id_lienhe"];?>';">xóa</a></td>
  </tr>
	<?php $i++;$idluu=$row["id_lienhe"];}else{?>		  
  <tr>
	<td colspan="7" height="30" class="gridRow">Hiện chưa có khách hàng nào liên hệ</td>
  </tr>
	<?php }?>
  <tr>
    <td colspan="7" align="center"><?php require("phantrang.php"); ?></td>
  </tr>
</table>
<script language="javascript">frmSubmit.tenkhach.focus();</script>
</body>
</html>