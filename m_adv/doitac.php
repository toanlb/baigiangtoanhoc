
 <ul>
      

<?php

$sql="select * from gws_logo where id_parent=".get_id("doi-tac")." and kiemduyet=1 order by capnhat asc";

$rs=mysql_query($sql);
if(mysql_num_rows($rs)){  
//echo $sql;
while($row=mysql_fetch_array($rs)){
	if ($row["type"]==1)

?>
 <li><a href="<?php echo $row["lienket"];?>"><img src="<?php echo $row["logo"];?>" width="180" height="100" alt="ited" /></a></li>
  
<? }} ?>

     
            
          </ul>