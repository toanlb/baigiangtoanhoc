<?php
	  $sqldd="select id_tin,id_parent,tieude$noi,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id($_GET["code"])." and id_tin<>$id and capnhat<'$datetime'";
	  $sqldd.=" order by capnhat desc limit 10";
	  $resulttindd=@mysql_query($sqldd);
	  if(@mysql_num_rows($resulttindd)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="2"><h5><?php if($noi!="_eng") echo "CÁC TIN ĐÃ ĐƯA:"; else echo "READ ON";?></h5></td>
  </tr>
  <?php  while($rowtindd=@mysql_fetch_array($resulttindd)){?>
  <tr>
    <td valign="baseline">
      <a href="<?php echo "?page=TinTuc&code=".get_key($rowtindd["id_parent"])."&id=".$rowtindd["id_tin"].$duoi;?>"><?php echo $rowtindd["tieude$noi"];?></a> <font color="#999999"><?php echo $rowtindd["dt"];?></font></td>
  </tr>
  <?php }?>
</table>
<?php }?>