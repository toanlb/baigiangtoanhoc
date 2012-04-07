<?php
include_once("w3s.php");
$sql="select * from gws_logo where id_parent=".get_id("tv-hinh-anh")." and kiemduyet=1 order by capnhat asc";
$rs=mysql_query($sql);
if(mysql_num_rows($rs)){  
//echo $sql;
while($row=mysql_fetch_array($rs)){
	if ($row["type"]==1)
		echo"<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"".$row["rong"]."\" height=\"".$row["cao"]."\" title=\"".$row["tieude"]."\">
		  <param name=\"movie\" value=\"".$row["logo"]."\" />
		  <param name=\"quality\" value=\"high\" />
		  <embed src=\"".$row["logo"]."\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"".$row["rong"]."\" height=\"".$row["cao"]."\"></embed>
		</object>";
		else echo "<div class=\"glidecontent1\"><a href=\"".$row['lienket']."\"><img src=\"".$row['logo']."\" border=\"0\" width=\"600px\" \" height=\"".$row["cao"]."\" title=\"".$row['tieude']."\"></a></div>";
}}?>
