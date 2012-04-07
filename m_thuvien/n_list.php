
	<?php
	  if(!isset($_GET["vt"])) $vt=0;
	  else $vt=intval($_GET["vt"]);
	  
	  $sql="select id_thuvien,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anh,gioithieu$noi,tentl$noi, file from gws_thuvien where trim(gioithieu$noi)<>'' and id_parent=".get_id($_GET["page"])." and kiemduyet=1";
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
		echo "Hiện không có file nào!";
	  }
	  if(@mysql_num_rows($result)==1)
	  {
		$row=@mysql_fetch_array($result);
		echo "<script language=\"javascript\">
		window.location='"."?".$_SERVER['QUERY_STRING']."&id=".$row["id_thuvien"]."';
		</script>";
	  }
	  $i=1;  
	  if(@mysql_num_rows($result)!=0) 
	  {
		$bg=$limit-$sodong;
		for($i=0;$i<$bg;$i++) $row=mysql_fetch_array($result);    
		while($row=@mysql_fetch_array($result)){
		$i++;
		$href="?".$_SERVER['QUERY_STRING']."&id=".$row["id_thuvien"];
	?>
	
	
	 <div style="width:100%; height:70px;">
            		<div class="img"><?php if($row['anh']!=""){?><img src="<?php echo $row['anh'];?>" width="63" height="56" align="left" style="margin:4px 5px 0 4px; border: 1px solid #CCCCCC; float:left"><?php }?></div>
					 
                    <div class="title"><?php echo $row["tentl"];?></div>
					<a href=".<?php echo $row["file"];?>" style="text-decoration:none;">Downdload file</a>
					  <div class="title"><a href="<?php echo $href;?>" style="text-decoration:none;color:#0066FF;font-weight:bold;">Chi tiết</a></div>
					
                   
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
	
