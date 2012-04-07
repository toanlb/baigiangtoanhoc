<div class="col-483">
	<?php
	$sql1="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id($_GET["page"])." and kiemduyet=1";
	$sql1.=" order by capnhat desc limit 1";
	$result1=@mysql_query($sql1);	
	$row1=@mysql_fetch_array($result1);
	?>
	<!--begin news1 -->
    <div class="boxModule bluBoxbtm">
    	<div class="blueBoxTop">
        	<div class="blueCont clearfix">
       	    	<a href="">
                	<img class="bluePic" src="<?php echo $row1['anhtrichdan']?>" width="237" height="209">
                </a>
                <div class="blueNews">
                	<h2><a href="?page=tin-tuc&id=<?php echo $row1['id_tin']?>"><?php echo $row1['tieude'];?></a></h2>
                    <p><?php echo $row1['trichdan']?></p>
                    <div class="catlgext" style="width:212px">
                       <a href="?page=tin-tuc&id=<?php echo $row1['id_tin']?>">Xem thêm</a>
                    </div>
                </div>
          	</div>
        </div>	
    </div>
    <?php
     $sql="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id($_GET["page"])." and kiemduyet=1";
	 $sql.=" order by capnhat desc limit 1,50";
	 $result=@mysql_query($sql);	
    ?>
	<!--begin news1 -->
    <div class="boxModule boxbtm483">
    	<div class="boxtop483-sm"> </div>	
        <div class="boxmd483">
        	<div class="catlgCont clearfix">
        		<?php 
        			while($row=@mysql_fetch_array($result)){ 
        		?>
            	<!--begin hot news -->
                <div class="catlgHot clearfix lineNews">
                    <div class="catlgPic"><img width="130" height="100" src="<?php echo $row['anhtrichdan']?>"></div>
                        <div class="fl cal325">
                        <h4><a href="?page=tin-tuc&id=<?php echo $row['id_tin']?>"><?php echo $row['tieude'];?></a></h4>
                        <p><?php echo $row['trichdan']?></p>
                        
                        <div class="catlgext">
                            <a href="?page=tin-tuc&id=<?php echo $row['id_tin']?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
               <?php
					}
               ?>
                
            </div>	
        </div>
    </div>
	<!--end news1 -->
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
