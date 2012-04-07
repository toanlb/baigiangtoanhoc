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