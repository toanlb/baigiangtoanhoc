<?php require("../connect.php");?>
<html>
<head>
<title>Danh Sach San Pham</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script language="JavaScript" type="text/javascript">
function NotNumber()
{
  if((event.keyCode<48)||(event.keyCode>57)) event.returnValue =false
}
function doUpdate()
{
	frmEditNum.submit();
}
function doDestroy()
{
	if(confirm("Bạn thực sự muốn hủy giỏ hàng?"))
	{
		var nrdo=frmEditNum.elements.length;
		for(var i=0;i<nrdo;i++)
			if(frmEditNum.elements(i).type=='text')
				frmEditNum.elements(i).value=0;
		doUpdate();
	}
}
</script>
<?php
$sql="delete from gws_giohang where soluong<=0";
mysql_query($sql);
function getNumber($id_sp,$sess)
{
	$sql="select * from gws_giohang where id_sp=$id_sp and sess='$sess'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_array($result);
		return $row["soluong"];
	}else return 0;
}  
?>
<?php
$sql="select gws_sanpham.id_sp,gws_giohang.id,gws_sanpham.id_parent,gws_sanpham.tensp,gws_sanpham.anhsp,gws_giohang.soluong from gws_sanpham inner join gws_giohang on(gws_sanpham.id_sp=gws_giohang.id_sp)";
$sql.=" where gws_giohang.soluong>0 and gws_giohang.sess='".$_GET["sess"]."' order by gws_giohang.capnhat desc";
$result=@mysql_query($sql);
if(@mysql_num_rows($result)>0)
{
?>
<form action="exeBuy.php?<?php echo $_SERVER['QUERY_STRING']?>&status=tinhlai" method="post" name="frmEditNum">
<table width="98%" border="0" cellspacing="0" cellpadding="5" align="center">
  <?php
	$sql="SELECT *,DATE_FORMAT(capnhat,'Lúc %H:%i ngày %d/%m/%Y') AS time FROM gws_khachhang WHERE sess='".$_GET["sess"]."'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row_kh=mysql_fetch_array($rs);
  ?>
  <tr>
  	<td class="tieude_top">THÔNG TIN ĐẶT HÀNG</td>	
  </tr>
  <tr>
  	<td><table border="0" cellpadding="5" cellspacing="5">
		<tr>
		  <td class="homthu_tieude">Tên khách hàng:</td><td class="homthu_chitiet_moi"><?php echo $row_kh["tenkhach"];?></td>
		</tr>
		<tr>
		  <td class="homthu_tieude">Email:</td><td class="homthu_chitiet_moi"><?php echo $row_kh["email"];?></td>
		</tr>
		<tr>
		  <td class="homthu_tieude">Điện thoại:</td><td class="homthu_chitiet_moi"><?php echo $row_kh["dienthoai"];?></td>
		</tr>
		<tr>
		  <td class="homthu_tieude">Thời điểm đặt hàng:</td><td class="homthu_chitiet_moi"><?php echo $row_kh["time"];?></td>
		</tr>
		<tr>
		  <td valign="top" class="homthu_tieude">Yêu cầu:</td><td class="homthu_chitiet_moi"><?php echo $row_kh["tieude"];?><br><span style="font-weight:normal"><?php echo $row_kh["yeucau"];?></span></td>
		</tr>
		</table></td>
  </tr>
  <?php }?>
  <tr>
  	<td><table width="100%" border="0" cellpadding="4" cellspacing="1" class="mainTb">
		<tr>
		  <td width="25" class="head_row1">STT</td>
		  <td class="head_row1">Sản phẩm</td>
		  <td width="60" class="head_row1">Số lượng</td>
		</tr>
		<?php $i=1;while($row=mysql_fetch_array($result)){?>
		<tr bgcolor="#FFFFFF">
		  <td><?php echo $i++;?></td>
		  <td><b><?php echo $row["tensp"];?></b></td>
		  <td><?php echo getNumber($row["id_sp"],$_GET["sess"]);?></td>
		</tr>
		<?php }?>
		</table></td>
  </tr>
</table>
</form>
<?php }else{?>
<table width="100%"  border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td>Giỏ hàng chưa có sản phẩm nào!</td>
  </tr>
</table>
<?php }?>
</body>
</html>