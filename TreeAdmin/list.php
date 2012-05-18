<html>
<head>
<title>List</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />

</head>
<?php
  echo "<script language='javascript'>
  var id_parent=$id_parent;
  var kieunhap=$kieunhap;
  var idxp=$xp;
  </script>";
?>
<?php
echo "<script language=\"javascript\">
//winW = document.body.offsetWidth;
//winH = document.body.offsetHeight;
var vt=null;
var tentm=null;
var objluu=null;
function doClick(obj,id,ten)
{
  vt=id;
  tentm=ten;
  if(objluu!=null)
  {
    objluu.bgColor=\"#FFFFFF\";
	objluu.style.color=\"#000000\";
  }
  objluu=obj;  
  objluu.bgColor=\"#555D66\";
  objluu.style.color=\"#FFFFFF\";";
  
  echo "btsua.style.display=\"block\";";
  if($level=="f")
  	echo "btxoa.style.display=\"block\";";  
echo "
}
</script>";
?>
<script language="javascript">
function func_xoa()
{
  if(confirm('Bạn thực sự muốn xóa ['+tentm+'] ?')) 
    window.location='quantridanhmuc/exeAdmin.php?id_parent='+id_parent+'&kieunhap='+kieunhap+'&id='+vt+'&idxp='+idxp;
}
function func_them()
{
  window.location='formThem.php?id_parent='+id_parent+'&kieunhap='+kieunhap+'&idxp='+idxp;
}
function func_sua()
{
  window.location='formSua.php?id_parent='+id_parent+'&kieunhap='+kieunhap+'&id='+vt+'&idxp='+idxp;
}
function func_open(id,knhap,kt)
{
  if(kt==0) parent.treeframe.location='treeuser.php?idxp='+idxp+'&id='+id;
  window.location="?id_parent="+id+"&kieunhap="+knhap+'&idxp='+idxp;
}
function sapxep()
{
  window.location='?id_parent='+id_parent+'&kieunhap=form_qlmuc_dsmuc';
}
</script>
<body>
<?php $buttonthem="hienthi";require("top_main.php"); ?>
<?php
  $sql="select * from gws_danhmuc where id_parent=$id_parent order by capnhat asc";
  $result=mysql_query($sql);  
?>
<table border="0" cellpadding="0" cellspacing="0" style="padding:0;">
  <?php if(mysql_num_rows($result)!=0)
    while($row=mysql_fetch_array($result)){
	  if($row["kieunhap"]!=1)
	  {
	    $id_truyen=$row["id_parent"];
		$ktmo=1;
	  }else{
	    $id_truyen=$row["id"];
		$ktmo=0;
	  }
  ?>
  <tr>
    <td align="left"><table class="folder" width="170" border="0" cellpadding="0" cellspacing="0" style="cursor:pointer" title="ID: [<?php echo $row["id"];?>] Từ khóa: [<?php echo $row["tukhoa"];?>]" onDblClick="func_open(<?php echo "$id_truyen,'".$row["kieunhap"]."',$ktmo";?>);" onClick="doClick(this,<?php echo $row["id"].",'".$row["ten"]."'";?>);">
      <tr>
        <td width="40" height="40"><img src="images/folder.png" height="32" width="32"></td>
		<td align="left"><?php echo $row["ten"];?></td>
      </tr>
    </table></td>
    <?php
	  for($i=0;$i<3&&$row=mysql_fetch_array($result);$i++){
	    if($row["kieunhap"]!=1)
		{
		  $id_truyen=$row["id_parent"];
		  $ktmo=1;
	    }else{
		  $id_truyen=$row["id"];
		  $ktmo=0;
		}
	?>
    <td><table class="folder" width="170" border="0" cellpadding="0" cellspacing="0" style="cursor:pointer" title="ID: [<?php echo $row["id"];?>] Từ khóa: [<?php echo $row["tukhoa"];?>]" onDblClick="func_open(<?php echo "$id_truyen,'".$row["kieunhap"]."',$ktmo";?>);" onClick="doClick(this,<?php echo $row["id"].",'".$row["ten"]."'";?>);">
      <tr>
        <td width="40" height="40"><img src="images/folder.png" height="32" width="32"></td>
		<td align="left"><?php echo $row["ten"];?></td>
      </tr>
    </table></td>
	<?php }?>
  </tr>
  <?php }?>
</table>
</body>
</html>