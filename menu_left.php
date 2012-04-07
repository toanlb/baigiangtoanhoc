 <ul id="menu">

<?php
function view_menu($id_parent,$language,$duoi,$idxp,$link)
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
	    $str_link="?page=thuong-hieu&code=".$row["tukhoa"].$duoi;
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

	<li>
		<?php if($str_link!="#") echo "<a href=\"$str_link\" class='mn_left' style='color:#000000;'>";?>
		<?php echo $name;?>
		<?php if($str_link!="#") echo "</a>";?>
		</li>

  
  
<?php }else{?>
  <?php if(isset($_GET["code"])&&$row["id_parent"]==get_value_field("tukhoa",$_GET["code"],"id_parent","gws_danhmuc",2)){?>
  	<li id="child<?php echo $row["id"];?>" style="display:block;"> 
  <?php }else{?>
  	<li id="child<?php echo $row["id"];?>" style="display:none;"> 
  <?php }?>
	
	
	       <ul ><li>
		  <a href="<?php echo $str_link;?>"><?php echo $name;?></a></li></ul>	
	 
	
	<!--Sub menu-->
	
  <?php }?>
<?php view_menu($id_folder,$language,$duoi,$idxp,$link);?>

<?php }
}?>
<?php
$sort="desc";
$id_parent=get_id("thuong-hieu");//get_id("san-pham");
//echo "[$id_parent]";
view_menu($id_parent,$noi,$duoi,$id_parent,$link);
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
</script></ul>