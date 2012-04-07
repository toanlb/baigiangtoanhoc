<div style="font-size:16px;color:#666666;font-family:Arial, Helvetica, sans-serif">Home&raquo;Học bổng du học</div>	<?php
	  if(!isset($_GET["vt"])) $vt=0;
	  else $vt=intval($_GET["vt"]);
	  
	  $sql="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi from gws_tinbai where  kiemduyet=1 and id_parent=".get_id("hoc-bong-cp")." or id_parent=".get_id("hoc-bong-tc")." or id_parent=".get_id("chau-a")." or id_parent=".get_id("chau-au")." or id_parent=".get_id("chau-uc")." or id_parent=".get_id("chau-my")." ";
	  $rs_count=@mysql_query($sql);
	  $count=mysql_num_rows($rs_count);
	  $sodong=10;
	  $sotrang=intval($count/($sodong+1));
	  if($sotrang<$count/($sodong+1)) $sotrang=$sotrang+1;
	  $limit=($vt+1)*$sodong;
	  $sql.=" order by capnhat desc limit $limit";
	  
	  //echo $sql;
	  $result=@mysql_query($sql);
	  if(@mysql_num_rows($result)==0)
	  {
		echo "Hiện không có tin nào!";
	  }
	  if(@mysql_num_rows($result)==1)
	  {
		$row=@mysql_fetch_array($result);
		echo "<script language=\"javascript\">
		window.location='"."?".$_SERVER['QUERY_STRING']."&id=".$row["id_tin"]."';
		</script>";
	  }
	  $i=1;  
	  if(@mysql_num_rows($result)!=0) 
	  {
		$bg=$limit-$sodong;
		for($i=0;$i<$bg;$i++) $row=mysql_fetch_array($result);    
		while($row=@mysql_fetch_array($result)){
		$i++;
		$href="?".$_SERVER['QUERY_STRING']."&id=".$row["id_tin"];
	?>
	
	
	 <div class="news">
            		<div class="img"><?php if($row['anhtrichdan']!=""){?><img src="<?php echo $row['anhtrichdan'];?>" width="98" height="92" align="left" style="margin:4px 5px 0 4px; border: 1px solid #CCCCCC; float:left"><?php }?></div>
                    <div class="title"> <a style="text-decoration:none;color:#0066FF;font-weight:bold;" href="./?page=hoc-bong-du-hoc&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"><?php echo $row["tieude$noi"];?></a></div>
                    <div class="content-new"><?php echo nl2br($row["trichdan$noi"]);?></div>
    </div>
            
	
	
	<?php }}?>
	<!--Paging-->
	<?php if(@mysql_num_rows($result)>0) {?>
	<?php $href=str_replace("&vt=$vt","",$_SERVER['QUERY_STRING']);?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td align="right"><?php if($noi!="_eng") echo "Trang:";else echo "Page:";?> <?php for($i=0;$i<$sotrang;$i++){$so=$i+1;?>
			<?php if($vt==$i) echo "<strong>$so</strong>";else{?>
			<a href="?<?php echo $href."&vt=$i";?>" style="color:#BC0000"><?php echo $so;?></a>
			<?php }?>
		<?php }?></td>
	  </tr>
	</table>
	<?php } ?>
	
