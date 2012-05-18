<?php require("connect.php");?>
<?php
if(isset($_GET["delete"]))
{
	$sql="DELETE FROM gws_giohang WHERE sess='".trim($_GET["delete"])."'";	
	mysql_query($sql);
	header("location:quantrisanpham/danhsachkhachhang.php");
}
?>
<html>
<head>
<title>Danh Sach Khach hang</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
$sql="delete from gws_giohang where soluong<=0";
mysql_query($sql);
function getNumber($sess)
{
	$sql="select count(*) as soluong from gws_giohang where sess='$sess'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_array($result);
		return $row["soluong"];
	}else return 0;
}
	if(!isset($_GET["vt"])) $vt=1;
	else if($_GET["vt"]!="1") $vt=intval($_GET["vt"])+1;
	else if($_GET["vt"]=="1") $vt=intval($_GET["vt"]);
	$sodong=11; 
	$sql="select *, DATE_FORMAT(capnhat,'%Hh:%i ngày %d-%m-%Y') as capnhat from gws_khachhang";
	$sql.=" order by capnhat asc";
	$resultcount=mysql_query($sql);	
	$sl=$vt+$sodong; 
	$sql.=" limit $sl";
	$result=mysql_query($sql);
	for($bg=1;$bg<$vt;$bg++) {$row=mysql_fetch_array($result);$idluu=$row["id_sp"];}
?>
<?php require("top_main.php"); ?>
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="4" style="display:none">
  <tr>
  	<td>&nbsp;</td>
    <td align="right"><form name="frmSubmit" action="?id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post">
	    <?php echo $arr_sp["ds_timkiem"] ?>
		<input name="tenkhach" type="text" value="<?php if(isset($_POST["tenkhach"])) echo $_POST["tenkhach"];?>" >
		<input name="Search" type="submit" id="Search" value="Tìm">
    </form>
	</td>
  </tr>
</table>
<p>
<table align="center" width="99%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="4"><font size=2><b>Module eCommerce - Danh sách khách hàng</b></font></td>
  </tr>
  <tr>
    <td width="5%" align="center" class="gridTitle">STT</td>
    <td class="gridTitle">Tên khách hàng</td>
    <td width="17%" align="center" class="gridTitle">Ngày đặt hàng </td>
    <td width="10%" align="center" class="gridTitle">Điện thoại</td>
    <td width="15%" align="center" class="gridTitle">Email</td>
	<td width="10%" align="center" class="gridTitle">Xóa</td>
  </tr>
  <?php $i=$vt;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
  <?php if(getNumber($row["sess"])>0){?>
  <tr>
    <td class="gridRow" align="center"><?php echo $i++;?></td>
    <td class="gridRow">&nbsp;&nbsp;<?php echo $row["tenkhach"];?></td>
    <td class="gridRow"><?php echo $row["capnhat"];?></td>
    <td class="gridRow"><?php echo $row["dienthoai"];?></td>
    <td class="gridRow"><?php echo $row["email"];?></td>
	<td class="gridRow" align="center"><a href="quantrisanpham/giohang.php?sess=<?php echo $row["sess"];?>">Xem</a> <a href="javascript:deleteSess('<?php echo $row["sess"];?>');">Xóa</a></td>
  </tr>
  <?php }?>
  <?php }?>
  <!-- Phan trang -->
  <tr align="center">
    <td colspan="6">
<?php
$sotrang=intval(mysql_num_rows($resultcount)/($sodong+1));
if($sotrang<mysql_num_rows($resultcount)/($sodong+1)) $sotrang=$sotrang+1;
?>
Trang: 
<select name="pagenum" class="TextBox" onChange="window.location='?vt='+this.value;">
	<?php for($i=1;$i<=$sotrang;$i++){?>
	<option value="<?php echo ($i-1)*($sodong+1);?>" <?php if(isset($_GET["vt"])) $tg=$_GET["vt"];else $tg=0;if($tg==($i-1)*($sodong+1)) echo "selected";?>>
	<?php if($i<10) echo "0".$i;else echo $i;?>
	</option>
	<?php }?>
</select>
trong tổng số <font color="#FF0000"><b><?php echo $sotrang;?></b></font> trang</td>
  </tr>
  <!-- Het phan trang -->
</table>
<script language="javascript">
function deleteSess(sess)
{
	if(confirm("Bạn thực sự muốn xóa đơn đặt hàng này?"))
		window.location="?delete="+sess;
}
</script>
</body>
</html>