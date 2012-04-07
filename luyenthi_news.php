<!--begin news1 -->
    <div class="boxModule boxbtm483">
    	<div class="boxtop483 clearfix">
    		<?php
				require 'connect_other.php';
  				mysql_select_db("luyenthivip",$link);
			    $sq_lt="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id('tin-tuc-luyenthi')." and kiemduyet=1";
				$sq_lt.=" order by capnhat desc limit 1";
				$result_lt=@mysql_query($sq_lt);	
				$row_lt=@mysql_fetch_array($result_lt);
			?>
        	<h3 class="fl"><a href="">Tin luyện thi vip</a></h3>
            <a class="catlgMore" href="">Xem thêm</a>
        </div>	
        <div class="boxmd483">
        	<div class="catlgCont clearfix">
            	<!--begin hot news -->
                <div class="catlgHot clearfix">
                	<div class="col-300 fl">
                        <div class="catlgPic"><img width="64" height="64" src="http://luyenthivip.vn<?php echo $row_lt['anhtrichdan']?>"></div>
                        <h4><a href=""><?php echo $row_lt['tieude']?></a></h4>	
                        <p><?php echo $row_lt['trichdan']?></p>
                        <div class="catlgext">
                    </div>
                    </div>
                    <?php 
                    	$sq_lt2="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id('tin-tuc-luyenthi')." and kiemduyet=1";
						$sq_lt2.=" order by capnhat desc limit 1,4";
						$result_lt2=@mysql_query($sq_lt2);	
                    ?>
                    <ul class="catlgLst">
                    	<?php 
		        			while($row_lt2=@mysql_fetch_array($result_lt2)){
		        		?>
                    	<li><a href=""><?php echo $row_lt2['tieude']?></a></li>
                        <?php } ?>
                    </ul>
                    
                </div>
                <!--begin other catlg hot -->
                <ul class="otherCatlg">
                	<li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
                <!--end other catlg hot -->
            </div>	
        </div>
    </div>
    <?php 
    	mysql_close($link);
    	require 'connect_other.php';
    	mysql_select_db("vtes",$link);
    ?>
	<!--end news1 -->