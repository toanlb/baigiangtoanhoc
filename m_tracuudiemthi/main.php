
       
	   
	   <form action="?page=tracuudiemthi<?php echo $duoi;?>" method="post" name="frmketqua" id="frmketqua">
	   
	    
             
			  
			  <select name="id_nsx">
			   <option >Chọn khóa học..</option>
	<?php 
		$sql_nsx = "select * from gws_nhasanxuat";
		$result_nsx = mysql_query($sql_nsx);
		while ($row_nsx = mysql_fetch_array($result_nsx)) {
	?>
		<option id="<?php echo $row_nsx["id_nsx"]; ?>" value="<?php echo $row_nsx["id_nsx"]; ?>" <?php if ($row_nsx["id_nsx"] == ($rowsanpham["id_nsx"])) echo "selected"; ?>><?php echo $row_nsx["ten_nsx"]; ?></option>
	<?php } ?>
	</select>
           
            <input type="text"  name="keyworld" class="text_feild" value="Nhập địa chỉ mail hoặc SBD"/>
			<? if ($lang=="en") echo " <input type='submit' class='catch_matche' value='xem keát quaû'/>";else echo " <input type='submit' class='catch_match' value='xem keát quaû'/>";  ?>
            
         
     
    
      </form>
   
   
   
           