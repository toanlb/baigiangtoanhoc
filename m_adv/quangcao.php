<ul>
       

<?php

$sql="select * from gws_logo where id_parent=".get_id("quang-cao")." and kiemduyet=1 order by capnhat asc";

$rs=mysql_query($sql);
if(mysql_num_rows($rs)){  
//echo $sql;
while($row=mysql_fetch_array($rs)){
	if ($row["type"]==1)

?>
   <li style="margin-right:10px;">
<a href="<?php echo $row["lienket"];?>" > <img src=" <?php echo $row["logo"];?>" width="160" height="44" alt=""  border="0"/></a></li>
<? }} ?>
</ul>