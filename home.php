<div class="heartbanner relav">
	<img src="pic/banner.jpg" width="980" height="296" />
    <ul class="lstNumber clearfix">
    	<li class=""><a href=""></a></li>
        <li class="act"><a href=""></a></li>
        <li class=""><a href=""></a></li>
        <li class=""><a href=""></a></li>
    </ul>
</div>

<?php
	if($_GET["page"] == 'home'){
		$page = 'tin-tuc';
	}
	$sql1="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id($page)." and kiemduyet=1 and tinnong=1";
	$sql1.=" order by capnhat desc limit 1";
	$result1=@mysql_query($sql1);	
	$row1=@mysql_fetch_array($result1);
?>

<div class="boxModule clearfix">
	<!--begin col 669 -->
	<div class="col-669 hotnewsbtm">
    	<div class="hotnewstop clearfix">
        	<!--begin col 407 -->
			<div class="col-407">
            	<div class="hotnews">
           	    	<a href=""><img src="<?php echo $row1['anhtrichdan']?>" width="391" height="256"></a>
                    <h2><a href="?page=home&detail=<?php echo $row1['id_tin']?>"><?php echo $row1['tieude']?></a></h2>
                    <p><?php echo $row1['trichdan']?></p>
                </div>	
            </div>    
            
            <?php
		     $sql="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id('tin-tuc')." and kiemduyet=1 and tinnong=1";
			 $sql.=" order by capnhat desc limit 1,10";
			 $result=@mysql_query($sql);	
		    ?>
		            
            <!--begin col 250 -->
            <div class="col-255">
            	<div class="lstHotnews">
                	<h3>Tin nổi bật</h3>
                    <ul>
                    	<?php 
		        			while($row=@mysql_fetch_array($result)){ 
		        		?>
                    	<li><a href="?page=home&detail=<?php echo $row['id_tin']?>"><?php echo $row['tieude']?></a></li>
                        <?php }?>
                    </ul>
                </div>	
            </div>                	
        </div>
    </div>	
    <!--end col 669 -->
    <div class="col-300 fr" style="margin-right: 20px;">
    	<!--begin box quang cao -->
    	<?php 
    		 $sql_qc="select * from gws_logo where id_parent=".get_id('quang-cao-chinh')." and kiemduyet=1";
			 $sql_qc.=" order by capnhat desc limit 0,2";
			 $result_qc=@mysql_query($sql_qc);	
    	?>
        <div class="boxModule">
        	<div class="advBox">
        		<?php 
        			while($row_qc=@mysql_fetch_array($result_qc)){
        		?>
            	<div><a href=""><img src="<?php echo $row_qc['logo']?>" width="300"></a></div>
                <?php 
					} 
        		?>
            </div>
        </div>
        <!--end box quang cao -->	
    </div>
</div>

<div class="col-483">
	<!--begin news1 -->
    <?php require "luyenthi_news.php";?>
	<!--end news1 -->
    <!--begin news1 -->
    <?php require "solienlac_news.php"?>
    <!--end news1 -->
    <!--begin news1 -->
    <?php require "giasu_news.php"?>
	<!--end news1 -->
    <!--begin news1 -->
    <?php require "eschool_news.php"?>
	<!--end news1 -->
    
</div>