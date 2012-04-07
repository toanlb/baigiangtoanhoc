
		  <?php
					$sql_nsx="select * from gws_nhasanxuat where kiemduyet=1 and id_parent=".get_id("nha-san-xuat") ;
					$result_nsx=@mysql_query($sql_nsx);
							  if(@mysql_num_rows($result_nsx)!=0){
								while ($row_nsx=@mysql_fetch_array($result_nsx)) {
			  ?>
			  
			  <?php if($row_nsx["logo_nsx"]!="") {?>
			  <a href="./?page=thuong-hieu&nsx=<?php echo($row_nsx["id_nsx"]);?>"><img src="<?php echo $row_nsx["logo_nsx"];?>" width="65" height="31" border="0" align="<?php echo($row_nsx["ten_nsx"]);?>" /></a>
			  <?php } else {?>
			  
			  <?php }}}?>
