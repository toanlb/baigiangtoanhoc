		
     <div class="left">
     
          
       

  <div style="font-size:16px;color:#666666;font-family:Arial, Helvetica, sans-serif">Home&raquo;<?php echo get_name($_GET["page"],$noi); ?></div>
        
      <!--end .product-top-->
    
		    <?php
			  $sql="select tieude,noidung$noi from gws_noidung where kiemduyet=1 and id_parent=".get_id($page)." order by capnhat desc limit 1";
			  $result=@mysql_query($sql);
			  if(@mysql_num_rows($result)!=0){
				$row=@mysql_fetch_array($result);
					
			}?>
		
			<?php echo $row["noidung$noi"];?>
       
             
        
     </div>
             