<?php
  $level=$_SESSION["level"];
?>
<script language="javascript">
function logout()
{
  parent.location='../edit/index.php?logout=ok';
}
</script>
<table width="99%" align="center" border="0" cellpadding="4" cellspacing="0">
  <tr>
	<td width="20" id="btback"><input name="Back" type="submit" onclick="history.go(-1);" value="Quay lại" style="cursor:pointer"/></td>
	<td width="20" id="btsort"><input name="Sort" type="submit" onclick="sapxep();" value="Sắp xếp" style="cursor:pointer"/></td>
    <td width="20" id="btthem"><input name="Add" type="submit" onclick="func_them();" value="Thêm mục" style="cursor:pointer"/></td>
    <td width="20" id="btsua" style="display:none"><input name="Edit" type="submit" onclick="func_sua();" value="Sửa mục" style="cursor:pointer"/></td>
    <td width="20" id="btxoa"><input name="Del" type="submit" onclick="func_xoa();" value="Xóa mục" style="cursor:pointer"/></td>
	<td width="20" id="btthoat"><input name="Logout" type="submit" onclick="logout();" value="Thoát" style="cursor:pointer; font-weight:bold; color:#990000"/></td>
	<td><?php echo $chuoihienthi;?></td>
    <td align="right" onclick=""><b><a href="quantritaikhoan/dstaikhoan.php?user=<?php echo $_SESSION["username"];?>';" style="padding-right:5"><font color="#990000">Quản lý tài khoản</font></a></b></td>
  </tr>
</table>
<hr size="1" width="100%">