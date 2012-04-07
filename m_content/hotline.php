<?php
  $sql="select tieude,noidung$noi from gws_noidung where kiemduyet=1 and id_parent=".get_id('hotline')." order by capnhat desc limit 1";
  $result=@mysql_query($sql);
  if(@mysql_num_rows($result)!=0){
	$row=@mysql_fetch_array($result);
		echo $row["noidung$noi"];
}?>