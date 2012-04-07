

	<?php
	  $sql="select  tieude$noi, noidung$noi from gws_noidung where trim(tieude$noi)<>'' and id_noidung=$id";
	  $result=@mysql_query($sql);
	  if(@mysql_num_rows($result)!=0){
		$row=@mysql_fetch_array($result);
		$datetime=$row["capnhat"];
	?>
	<?php echo $row["tieude$noi"];?>
		

		<div style="padding-bottom:10px;padding-top:10px"><?php echo $row["noidung$noi"];?></div>
		<a href="javascript:history.go(-1);" style="font-weight:bold; text-decoration:underline; color:black">Quay lại</a>
	<?php }else{?>
	<script language="javascript">
	window.location="?page=home<?php echo $duoi;?>";
	</script>
	

	<?php }?>
	
