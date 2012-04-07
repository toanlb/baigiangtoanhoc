   	
	
	<?php
	$sql="select id_thuvien,capnhat,tentl,file, DATE_FORMAT(capnhat,'%d-%m') as dt,tentl from gws_thuvien where trim(tentl)<>'' and id_parent=".get_id("lich-kg")." and kiemduyet=1 order by capnhat desc limit 4";
	$datetime=$row["capnhat"];
	$result=mysql_query($sql);

			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			
			{
			?>
			
			
					
      
      
    
          <a href="./?page=lich-kg&id=<?php echo $row["id_thuvien"]?>" style="text-decoration:none;padding-left:10px;color:#000000"> <? echo $row["tentl"]?> </a>
		
		
			<?
	}
	?>
	
	