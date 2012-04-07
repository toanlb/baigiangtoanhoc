   	
	<ul>
	<?php
	$sql="select id_thuvien,capnhat,tentl$noi,gioithieu$noi,file, DATE_FORMAT(capnhat,'%d-%m') as dt,gioithieu$noi from gws_thuvien where trim(gioithieu$noi)<>'' and id_parent=".get_id("thu-vien")." and kiemduyet=1 order by capnhat desc limit 4";
	$datetime=$row["capnhat"];
	$result=mysql_query($sql);

			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			
			{
			?>
			
		
					<?
$iCha = "50"; // Max number of character(s) for cutting
$iOutpu = "24"; // Max number of character(s) for the output
if(strlen($row["tentl$noi"]) > 0)
{
    $cOutpu = mb_substr($row["tentl$noi"], 0, $iOutpu, "UTF-8");
    while(substr($cOutpu, -1) != " ")
    {
        $cOutpu = substr($cOutpu, 0, strlen($cOutpu)-1);
    }
    $cOutpu = $cOutpu." ...";
}

?>      
	
      
      <li style="width:200px;" >
          <a href="./?page=thu-vien&id=<?php echo $row["id_thuvien"]?>">
		  
		   <? echo $cOutpu ;?> </a>
		</li> 
		
			<?
	}
	?>
	
	</ul>
	 <?php 
		  $thuvien="./?page=thu-vien&lang=en";
          $thuvien1="./?page=thu-vien";
?>
	 <p class="readmore"><? if ($lang=="en") echo "<a href='".$thuvien."'>Detail ";else echo "<a href='".$thuvien1."'>Xem thêm ";echo"</a>";  ?></p>