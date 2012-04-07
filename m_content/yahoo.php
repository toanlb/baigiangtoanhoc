
<?php
  $sql="select * from gws_noidung where id_parent=".get_id("yahoo")." and kiemduyet=1 order by capnhat asc";
  $rs=mysql_query($sql);
  if(mysql_num_rows($rs)){  
  while($row=mysql_fetch_array($rs)){?>
<div style="padding-left:10px; padding-top:10px;">
    <a  href='ymsgr:sendim?<?php echo $row["noidung$noi"]?>'><img src='http://opi.yahoo.com/online?u=<?php echo $row["noidung$noi"]?>&m=g&t=1' border='0' align="absmiddle"> </a>:
  <?php echo $row["tieude$noi"]?>
            <!--end .name-title-->
    
		</div>	

	 
<?php }}?>

