   	  
	<?php
	$sql="select id_tin,anhtrichdan,tieude$noi, DATE_FORMAT(capnhat,'%d-%m-%Y') as dt,trichdan$noi from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id("tin-tuc")." and kiemduyet=1 and tinnong=1 order by capnhat desc limit 4";
	$result=mysql_query($sql);

			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			
			{
			?>
			
			  <div class="tin-tuc-center">
<div class="box">
          <div class="box-img"><a href="./?page=tin-tuc&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"> 
		  <img src="<? echo $row["anhtrichdan"]?>" />
		   </a></div>
          <!--end .box-img-->
          <div class="box-title"><a href="./?page=tin-tuc&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"> <? echo $row["trichdan$noi"]?> </a></div>
          <!--end .box-title-->
		  		  
        </div>
        <!--end .box-->
        <div class="clear"></div>
        <!--end .clear-->
      </div>
			<?
	}
	?>