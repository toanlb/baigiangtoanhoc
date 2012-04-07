<?php
	 $sql="select * from gws_logo where id_parent=".get_id("quang-cao-phai-1")." and kiemduyet=1";
	 $result=@mysql_query($sql);	
?>  
<div class="col-300 fl">
	<div class="advBox">
		<?php 
			while($row=@mysql_fetch_array($result)){
		?>
    	<div><a href="<?php echo $row['lienket']?>"><img width="300" src="<?php echo $row['logo']?>" /></a></div>
        <?php 
			}
        ?>
    </div>
</div>
<?php
	 $sql2="select * from gws_logo where id_parent=".get_id("quang-cao-phai-2")." and kiemduyet=1";
	 $result2=@mysql_query($sql2);	
?>                  
<div class="col-180 fr">
	<div class="advBox">
		<?php 
			while($row2=@mysql_fetch_array($result2)){
		?>
    	<div><a href="<?php echo $row2['lienket']?>"><img width="180" src="<?php echo $row2['logo'] ?>" /></a></div>
        <?php } ?>
    </div>
</div>