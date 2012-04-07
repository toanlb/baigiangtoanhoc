<?php
  $sql_yahoo="select * from gws_noidung where id_parent=".get_id("ho-tro-kinh-doanh")." and kiemduyet=1 order by capnhat asc";
  $rs_yahoo=mysql_query($sql_yahoo);
  if(mysql_num_rows($rs_yahoo)){  
  while($row_yahoo=mysql_fetch_array($rs_yahoo)){?>
	<?php echo $row_yahoo["tieude$noi"]?>: <a style="background:none" href='ymsgr:sendim?<?php echo $row_yahoo["noidung$noi"]?>'><img src='http://opi.yahoo.com/online?u=<?php echo $row_yahoo["noidung$noi"]?>&m=g&t=1' border='0' align="absmiddle"></a>
<?php }}?>


