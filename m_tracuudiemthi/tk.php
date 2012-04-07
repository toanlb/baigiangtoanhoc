
	<?php
	   
	 $sql="SELECT `gws_diemthi`.`id_diemthi`,`gws_diemthi`.`hovaten`,`gws_diemthi`.`sbd`, `gws_nhasanxuat`.`ten_nsx`,`gws_diemthi`.`mail`,`gws_diemthi`.`dienthoai`,`gws_diemthi`.`diachi`,`gws_diemthi`.`monthi1`,`gws_diemthi`.`monthi2`,`gws_diemthi`.`monthi3`,`gws_diemthi`.`monthi4`
FROM gws_diemthi, gws_nhasanxuat
where `gws_nhasanxuat`.`id_nsx`=`gws_diemthi`.`id_nsx` and id_diemthi=$id";
	  $result=@mysql_query($sql);
	  if(@mysql_num_rows($result)!=0){
		$row=@mysql_fetch_array($result);
		$datetime=$row["capnhat"];
	?>
	
	
	<table width="80%" height="399" border="0" cellpadding="0" cellspacing="0" align="center">
	
	 <tr>
	  <td width="52%"><strong>Bảng điểm của thí sinh</strong></td>
		
	  </tr>
	  <tr>
	  <tr>
	  <td>Họ và tên</td>
		<td width="48%"><?php echo $row["hovaten"];?>		</td>
	  </tr>
	  <tr>
	  <td>Số báo danh</td>
		<td><?php echo $row["sbd"];?></td>
	  </tr>
		<tr>
		<td>Khóa học</td>
		<td>
		<?php echo $row["ten_nsx"];?></td>
	  </tr>
	  <tr>
		<td>Email</td>
		<td>
		<?php echo $row["mail"];?></td>
	  </tr>
	  <tr>
		<td>Điện thoạil</td>
		<td>
		<?php echo $row["dienthoai"];?></td>
	  </tr>
	  
	  <tr>
		<td>Địa chỉ</td>
		<td>
		<?php echo $row["diachi"];?></td>
	  </tr>
	  
	  <tr>
		<td>Nghe</td>
		<td>
		<?php echo $row["monthi1"];?></td>
	  </tr>
	  
	  <tr>
		<td>Ngữ pháp</td>
		<td>
		<?php echo $row["monthi2"];?></td>
	  </tr>
	  
	  <tr>
		<td>Đọc hiểu</td>
		<td>
		<?php echo $row["monthi3"];?></td>
	  </tr>
	  
	  <tr >
		<td>Nói</td>
		<td >
		<?php echo $row["monthi4"];?></td>
	  </tr>
	  
	  <tr>
		<td>Tổng điểm</td>
		<td>
		<?php echo $tongdiem=($row["monthi1"]+$row["monthi2"]+$row["monthi3"]+$row["monthi4"]);?></td>
	  </tr>
	  
	  <tr>
	  
		<td align="right"><span  style="font-family:Arial, Helvetica, sans-serif; text-decoration:none; color:#666666;"><?php echo $row["hs"];?></span></td>
		<td>
		<a href="javascript:history.go(-1);" style="font-weight:bold; text-decoration:underline; color:black; padding-right:10px; float:right;">Quay lại</a></td>
	  </tr>
	</table>
	
	
	
	
	
	<?php }else{?>
	<script language="javascript">
	window.location="?page=home<?php echo $duoi;?>";
	</script>
	<?php }?>
	
