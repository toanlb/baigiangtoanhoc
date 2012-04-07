

 <?php
$keyworld=$_POST['keyworld'];
	$tensp=$_POST['keyworld'];
	$id_nsx=$_POST['id_nsx'];
	
	    $select= "SELECT * FROM gws_diemthi where id_nsx=$id_nsx and (sbd like '%$keyworld%' or mail like '%$keyworld%') ;";
		
	$results = mysql_query($select) or die(mysql_error());	
	$ktra=mysql_num_rows($results);
	
?>



<?php
if($ktra==0){
?>
<div style="font-weight:bold;color:#0066FF;" align="center">Không tìm thấy kết quả nào thỏa mãn</div>
<div  align="center">
  <p>Bạn nên nhập đúng số báo danh hoặc email để có kết quả chính xác nhất</p>
  
</div>
<?

	
	}
else
	{
	
      if ($id_nsx==30){ ?>
	  
	<table width="435" border="0" bgcolor="#FFFFFF" cellpadding="1" cellspacing="1"  >
		<tr>
			
			<td width="157" align="right">Tìm thấy  <font color="red"><b><?php echo $ktra;?></b></font> kết quả</td>
		</tr>
</table>
	  <table width="100%" border="0">
	 <tr>
	<td width="23%">Họ và tên </td>
    <td width="12%">Số báo danh </td>
    <td width="10%" align="center">Nghe </td>
    <td width="14%" align="center">Ngữ pháp </td>
    <td width="13%" align="center">Đọc hiểu </td>
	 <td width="10%" style="display:none">Nói</td>
	  <td width="10%" align="center">Tổng điểm</td>
	  <td width="9%">Chi tiết </td>
	</tr>
	  <?
    $selec= "SELECT * FROM gws_diemthi where id_nsx=30 and (sbd like '%$keyworld%' or mail like '%$keyworld%') ;";
	
	$result = mysql_query($selec) ;
			if(mysql_num_rows($result))
			while($row=mysql_fetch_array($result))
			{
			?>
  <tr>
    <td><?php echo $row['hovaten'];?></td>
    <td><?php echo $row['sbd'];?></td>
    <td align="center"><?php echo $row['monthi1'];?></td>
    <td align="center"><?php echo $row['monthi2'];?></td>
    <td align="center"><?php echo $row['monthi3'];?></td>
	 <td align="center" style="display:none"><?php echo $row['monthi4'];?></td>
	  <td align="center"><?php echo $tongdiem=(($row["monthi1"]+$row["monthi2"]+$row["monthi3"])*10)/3;?></td>
	  <td><a style="text-decoration:none; font-weight:bold;" href="./?page=diem-thi&code=<?php echo get_key($row["id_parent"]);?>&id1=<?php echo $row["id_diemthi"]?>">  Chi tiết </a> </td>
  </tr>
  <? } ?>
	 </table>

	 <? } else{?>
	
	<table width="435" border="0" bgcolor="#FFFFFF" cellpadding="1" cellspacing="1"  >
		<tr>
			
			<td width="157" align="right">Tìm thấy  <font color="red"><b><?php echo $ktra;?></b></font> kết quả</td>
		</tr>
</table>
	
	<table width="100%" border="0" cellpadding="0" >	
	<tr>
	<td width="23%">Họ và tên </td>
    <td width="12%">Số báo danh </td>
    <td width="10%" align="center"> Nghe </td>
    <td width="14%" align="center">Ngữ pháp </td>
    <td width="13%" align="center">Đọc hiểu </td>
	 <td width="10%"  align="center">Nói</td>
	  <td width="10%" align="center">Tổng điểm</td>
	  <td width="9%">Chi tiết </td>
	</tr>
	
	<?php
	$i=1;
	while($row=mysql_fetch_array($results))
	{
	?>
 <tr>
    <td><?php echo $row['hovaten'];?></td>
    <td><?php echo $row['sbd'];?></td>
    <td align="center"><?php echo $row['monthi1'];?></td>
    <td align="center"><?php echo $row['monthi2'];?></td>
    <td align="center"><?php echo $row['monthi3'];?></td>
	 <td  align="center"><?php echo $row['monthi4'];?></td>
	  <td align="center"><?php echo $tongdiem=($row["monthi1"]+$row["monthi2"]+$row["monthi3"]+$row["monthi4"]);?></td>
	  <td><a style="text-decoration:none; font-weight:bold;" href="./?page=diem-thi&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_diemthi"]?>">  Chi tiết </a> </td>
  </tr>
<?php
	$i=$i+0;
		if($i%2)
		echo "</tr>";
	}
?>
</table>
<?php
	}
	}
?>
