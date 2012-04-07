 <?php
  $sql="select capnhat,luotxem,username,DATE_FORMAT(capnhat,'%d-%m-%Y') as hs, tieude$noi,anhtrichdan, noidung$noi,trichdan$noi from gws_tinbai where trim(tieude$noi)<>'' and id_tin=$detail";
  $result=@mysql_query($sql);
  if(@mysql_num_rows($result)!=0){
	$row=@mysql_fetch_array($result);
	$datetime=$row["capnhat"];
?>
<div class="col-669 ">
	<div class="boxModule box669btm">
        <div class="box669top"></div>
        <div class="box669md">
            <div class="newsCont">
                <h1><?php echo $row["tieude$noi"];?></h1>
                <p class="time"><?php echo $row["capnhat"];?></p>
                <p class="tomtat"><?php echo $row["noidung$noi"];?></p>
                
            </div>
        </div>
    </div>

    <div class="boxModule">
    	<h4 class="pstedTitle">Tin đã đăng</h4>
        <ul class="pstednews">
       	<?php 
    		$sq2="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id($_GET["page"])." and kiemduyet=1";
			$sq2.=" order by capnhat desc ";
			$result2=@mysql_query($sq2);	
			while($row2=@mysql_fetch_array($result2)){ 
		?>
    	<li><a href="?page=tin-tuc&id=<?php echo $row2['id_tin']?>"><?php echo $row2['tieude'];?></a><span><?php echo $row2['capnhat'];?></span></li>
    	<?php
			}
       	?>
       	</ul>
    </div>
</div>

<?php } ?>