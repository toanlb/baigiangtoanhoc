 <div class="left">
    <?php

	$keyworld=$_POST['keyworld'];

	
	    $select= "SELECT * FROM gws_tinbai where noidung like '%$keyworld%';";
	$results = mysql_query($select) or die(mysql_error());	
	$ktra=mysql_num_rows($results);
	
?>


<?php
if($ktra==0){

	
	echo "<div align = 'center'><b><strong><font color='#0066ff'>Không tìm thấy kết quả nào thoả mãn</font></strong></b></div>";

	
	}
else
	{
	 
	
?>
	
	
	
			<strong>Tìm thấy  <font color="red"><b><?php echo $ktra;?></b></font> kết quả :</strong><br><br>
		
	



	<?php
	$i=1;
	while($row=mysql_fetch_array($results))
	
	{
	?>
	

	               <a  style="text-decoration:none;" href="./?page=tin-tuc&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"> <?php echo $row['tieude'];?>	</a>				
			<br>
					<img src="<?php echo $row['anhtrichdan'];?>" width="127" height="94" />
					<br>
					
				
<?php
	$i=$i+0;
		if($i%2)
		echo "</tr>";
	}
?>
<?php
	}
	
?>

</div>