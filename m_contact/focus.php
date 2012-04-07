   	  <ul>
	<?php
	$sql="select id_tin,anhtrichdan,tieude$noi, DATE_FORMAT(capnhat,'%d-%m-%Y') as dt,trichdan$noi from gws_tinbai where trim(tieude$noi)<>'' and kiemduyet=1 and tinnong=1 order by capnhat desc limit 4";
	$result=mysql_query($sql);

			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			
			{
			?>
		  <li>
          <a href="./?page=tin-tuc&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"> <? echo $row["tieude$noi"]?> </a></li>
          <!--end .box-title-->
	
			<?
	}
	?>
	
	
	
          
            
          </ul>