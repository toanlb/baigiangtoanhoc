
  <div style="font-size:16px;color:#666666;font-family:Arial, Helvetica, sans-serif">Home&raquo;Hoạt động của nhân viên</div>

<?php
function view_men($id_parent,$language,$duoi,$idxp,$link)
{
  $sql="select * from gws_danhmuc where id_parent=$id_parent and kieunhap=1";
  $sql.=" order by capnhat desc";  
  $result=mysql_query($sql);
  if(mysql_num_rows($result)>0)
    while($row=mysql_fetch_array($result)){
	  $id_folder=$row["id"];
	  $level_nodes=getlevel($id_folder,$idxp);
	  $spacebar="";
	  for($i=0;$i<$level_nodes;$i++) $spacebar.="&nbsp;&nbsp;&nbsp;&nbsp;";
	  if(get_num_child($id_folder)==0)
	    $str_link="?page=du-lich&page=".$row["tukhoa"].$duoi;
	  else{
	  	$arr=array();
		$arr=danhsachcon($row["tukhoa"],$link,"id");
	    $str_link="javascript:";
		for($i=0;$i<sizeof($arr);$i++)
			$str_link.="show_hide('child".$arr[$i]."');";
	  }
	  $name=$row["ten$language"];
	  	  
?>

  <?php if($level_nodes==1){?>
  <tr>
  	<td  align="left"  >
	 <div style="padding-left:15px; font-family:Arial, Helvetica, sans-serif;font-size:13px; text-decoration:none; color:#000000; margin-top:10px; " >
		<strong> <?php echo $name;?> </strong></div>
		
	</td>
  </tr>
 
<?php }else{?>
  <?php if(isset($_GET["page"])&&$row["id_parent"]==get_value_field("tukhoa",$_GET["page"],"id_parent","gws_danhmuc",2)){?>
  	<tr id="child<?php echo $row["id"];?>" style="display:block"> 
  <?php }else{?>
  	<tr id="child<?php echo $row["id"];?>" style="display:none"> 
  <?php }?>
	<td >
	
		
	        <div style="padding-left:15px; font-family:Arial, Helvetica, sans-serif;font-size:13px; text-decoration:none; color:#000000; " >
		  <a href="<?php echo $str_link;?>" style=" text-decoration:none; color:#000000; "  >- <?php echo $name;?></a></div>	</td>
	 
	</td></tr>
  <?php }?>
  <?php view_men($id_folder,$language,$duoi,$idxp,$link);?>
<?php }
}?>
<?php
$sort="desc";
$id_parent=get_id("du-lich");//get_id("san-pham");
//echo "[$id_parent]";
view_men($id_parent,$noi,$duoi,$id_parent,$link);
?>



<script language="javascript">
function show_hide(objName)
{
	var e=document.getElementById(objName);	
	if(e.style.display=="none")
		e.style.display="block";
	else
		e.style.display="none";
}
</script>


