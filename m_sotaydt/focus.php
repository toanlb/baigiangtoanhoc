   		 <ul>
	<?php
	$sql="select id_tin,capnhat,tieude$noi, DATE_FORMAT(capnhat,'%d-%m') as dt,trichdan$noi from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id("hoat-dong")." and kiemduyet=1  order by capnhat desc limit 4";
	$datetime=$row["capnhat"];
	$result=mysql_query($sql);

			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			
			{
			?>
			
			
					<?
$iCha = "50"; // Max number of character(s) for cutting
$iOutpu = "24"; // Max number of character(s) for the output
if(strlen($row["tieude$noi"]) > 0)
{
    $cOutpu = mb_substr($row["tieude$noi"], 0, $iOutpu, "UTF-8");
    while(substr($cOutpu, -1) != " ")
    {
        $cOutpu = substr($cOutpu, 0, strlen($cOutpu)-1);
    }
    $cOutpu = $cOutpu." ...";
}

?>      

      
      <li>
      
          <a href="./?page=hoat-dong-nv&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>">
		   <? echo $cOutpu?> </a>
		   
		  </li>
		
			<?
	}
	?></ul>
	
	<?php 
		  $hoatdong="./?page=hoat-dong-nv&lang=en";
          $hoatdong1="./?page=hoat-dong-nv";
?>
	 <p class="readmore"><? if ($lang=="en") echo "<a href='".$hoatdong."'>Detail ";else echo "<a href='".$hoatdong1."'>Xem thêm"; echo " </a>"; ?></p>
