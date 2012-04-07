<table width="100%" border="0" cellpadding="0" cellspacing="0" id="ym">
	<tr>
	  <td><h4>Hỗ trợ trực tuyến</h4></td>
	</tr>
<?php
  $sql="select * from gws_noidung where id_parent=".get_id("ho-tro-kinh-doanh")." and kiemduyet=1 order by capnhat asc";
  $rs=mysql_query($sql);
  if(mysql_num_rows($rs)){  
  while($row=mysql_fetch_array($rs)){?>
	<tr>
	  <td><?php echo $row["tieude$noi"]?>: <a style="background:none" href='ymsgr:sendim?<?php echo $row["noidung$noi"]?>'><img src='http://opi.yahoo.com/online?u=<?php echo $row["noidung$noi"]?>&m=g&t=1' border='0' align="absmiddle"></a>
	  </td>
	</tr>
	<tr><td height="10"></td></tr>
<?php }}?>
</table>