   	  <ul>
	<?php
	$sql="select id_tin,anhtrichdan,tieude$noi, DATE_FORMAT(capnhat,'%d-%m-%Y') as dt,trichdan$noi from gws_tinbai where trim(tieude$noi)<>'' and tinnong=1   and kiemduyet=1 order by capnhat desc limit 5";
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
	
	
	
          
   
	<?php
	$sql1="select id_thuvien,anh,tentl$noi, DATE_FORMAT(capnhat,'%d-%m-%Y') as ds,tentl from gws_thuvien where trim(tentl$noi)<>'' and id_parent=".get_id("thu-vien")." and kiemduyet=1 order by capnhat desc limit 5";
	$result1=mysql_query($sql1);

			if(mysql_num_rows($result1))
			while($row1=mysql_fetch_array($result1))
			
			{
			?>
		  <li>
          <a href="./?page=thu-vien&code=<?php echo get_key($row1["id_parent"]);?>&id=<?php echo $row1["id_thuvien"]?>"> <? echo $row1["tentl$noi"]?> </a></li>
          <!--end .box-title-->
	
			<?
	}
	?>
	
	
	
          
            
          </ul>