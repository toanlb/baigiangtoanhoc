   	
		 <ul>
	<?php
	$sql="select id_tin,capnhat,tieude$noi, DATE_FORMAT(capnhat,'%d-%m') as dt,trichdan$noi from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id("tu-van")." and kiemduyet=1 and tinnong=1 order by capnhat desc limit 4";
	$datetime=$row["capnhat"];
	$result=mysql_query($sql);

			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			
			{
			?>
			
			
					<?
$iCha = "100"; // Max number of character(s) for cutting
$iOutpu = "50"; // Max number of character(s) for the output
if(strlen($row["trichdan$noi"]) > $iCha)
{
    $cOutpu = mb_substr($row["trichdan$noi"], 0, $iOutpu, "UTF-8");
    while(substr($cOutpu, -1) != " ")
    {
        $cOutpu = substr($cOutpu, 0, strlen($cOutpu)-1);
    }
    $cOutpu = $cOutpu." ...";
}

?>
      
      <li>
      
          <a href="./?page=hoc-bong&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"> <? echo $cOutpu?> </a>
		  </li>
		
			<?
	}
	?></ul>
	 <p class="readmore"><a href="./?page=tu-van">Xem thêm</a></p>