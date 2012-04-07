
	
<?php
  $sql="select * from gws_noidung where id_parent=".get_id("ho-tro-khach-hang")." and kiemduyet=1 order by capnhat asc";
  $rs=mysql_query($sql);
  if(mysql_num_rows($rs))  
  while($row=mysql_fetch_array($rs))
  {?>
	<a href=".?page=ho-tro-khach-hang&id=<?php echo $row["id_noidung"]?>" >- <?php echo $row["tieude$noi"]?></a>
	<br />
	  
<?php }?>
