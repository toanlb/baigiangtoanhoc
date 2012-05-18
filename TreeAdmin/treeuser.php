<?php
  @session_start();
  if(isset($_SESSION["quantriEBIZ"]))
  {
    $quantri=$_SESSION["quantriEBIZ"];
	$id_danhmuc=$_SESSION["danhmuc"];
	$username=$_SESSION["username"];
	$level=$_SESSION["level"];
  }else{
    echo "<script language='javascript'>parent.parent.location='../edit';</script>";
  }
  require('connect.php');
?>
<html>
<head>
<title>Phan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function showclick(obj)
{
  var el = document.getElementById(obj);
  if(el.style.display != "block") el.style.display = "block";
  else el.style.display = "none";
}
function doThem()
{
  var dialog=window.open("quantrisukien/taosk.php","","width=300,height=150");
  dialog.refreshme=refreshme;
}
function refreshme()
{
  window.location='../treeuser.php';
}
function doXoa()
{
  if(chimuc==-1) alert(msg2.value);
  else{
    if(confirm(msg3.value)) window.location="?status=ok&chimuc="+chimuc;
  }
}
function logout()
{
  parent.location='../quantri/?logout=ok';
}
</script>
<SCRIPT src='TreeAdmin_files/ua.js'></SCRIPT>
<SCRIPT src='TreeAdmin_files/ftiens4.js'></SCRIPT>
<SCRIPT language='javascript'>
USETEXTLINKS = 1
STARTALLOPEN = 0
ICONPATH = ''
</script>
<?php
if(isset($_GET["idxp"])) $xp=$_GET["idxp"];
else $xp=$_SESSION["arr_danhmuc"];
$sql="select * from gws_danhmuc where id=".str_replace(","," or id=",$xp);
$rs=mysql_query($sql);

if(mysql_num_rows($rs)!=0)
{
	echo "<script language='javascript'>
	foldersTree = gFld('<b>[Web Admin CP]</b>','');
	  foldersTree.pngnSrc = ICONPATH + 'TreeAdmin_files/admin.png';
	  foldersTree.pngnSrcClosed = ICONPATH + 'images/admin.png';
	</SCRIPT>";  
	while($row=mysql_fetch_array($rs))
	{
		echo "<script language='javascript'>";
		$id=$row["id"];
		$id_parent=$row["id_parent"];
		$ten=$row["ten"];
		$kieunhap=$row["kieunhap"];
		if(intval($kieunhap)==1)
			echo "nut$id = insFld(foldersTree, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'));";	
		else{
			echo "nut$id = insFld(foldersTree, gFld('$ten', 'danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap'));";
			echo "nut$id.pngnSrc = ICONPATH + 'TreeAdmin_files/ftv2doc.gif';";
			echo "nut$id.pngnSrcClosed = ICONPATH + 'TreeAdmin_files/ftv2doc.gif';";
		}
		echo "</script>";  
		duyetcay($id);
	}
}else{
	echo "<script language='javascript'>
	foldersTree = gFld('<b>[Web Admin CP]</b>','danhsach.php?id_parent=$xp&kieunhap=1$kieunhap&idxp=$xp');
	  foldersTree.pngnSrc = ICONPATH + 'TreeAdmin_files/admin.png';
	  foldersTree.pngnSrcClosed = ICONPATH + 'TreeAdmin_files/admin.png';
	</SCRIPT>";  
	$sql="select * from  gws_danhmuc where id_parent='$xp' order by capnhat asc";  
    $result=mysql_query($sql);
    if(mysql_num_rows($result)!=0)  
		while($row=mysql_fetch_array($result))
		{
			echo "<script language='javascript'>";
			$id=$row["id"];
			$id_parent=$row["id_parent"];
			$ten=$row["ten"];
			$kieunhap=$row["kieunhap"];
			if(intval($kieunhap)==1)
				echo "nut$id = insFld(foldersTree, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'));";	
			else{
				echo "nut$id = insFld(foldersTree, gFld('$ten', 'danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap'));";
				echo "nut$id.pngnSrc = ICONPATH + 'TreeAdmin_files/ftv2doc.gif';";
				echo "nut$id.pngnSrcClosed = ICONPATH + 'TreeAdmin_files/ftv2doc.gif';";
			}
			echo "</script>";  
			duyetcay($id);
		}
}
  function duyetcay($so)
  {
    $sql="select * from  gws_danhmuc where id_parent='$so' order by capnhat asc";    
	$result1=mysql_query($sql);
	if(mysql_num_rows($result1)!=0) while($row=mysql_fetch_array($result1))
	{
	  echo "<script language='javascript'>";
	  $id=$row["id"];
	  $id_parent=$row["id_parent"];
	  $ten=$row["ten"];
	  $kieunhap=$row["kieunhap"];
	  if(intval($kieunhap)==1)
		echo "nut$id = insFld(nut$so, gFld('$ten', 'danhsach.php?id_parent=$id&kieunhap=$kieunhap'));";
	  else{
	    echo "nut$id = insFld(nut$so, gFld('$ten', 'danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap'));";
		echo "nut$id.pngnSrc = ICONPATH + 'TreeAdmin_files/ftv2doc.gif';";
		echo "nut$id.pngnSrcClosed = ICONPATH + 'TreeAdmin_files/ftv2doc.gif';";
      }
	  echo "</script>";  
	  duyetcay($id);
	}	
  }  
?>
<body>
<A href='http://www.treemenu.net/' target=_blank></A>
<SCRIPT>initializeDocument();</SCRIPT>

<?php
if(isset($_GET["id"]))
{
  $id=$_GET["id"];   
  if($id!="")
  {  
    $d=1;
	$a=array(100);	
    while($id!=$xp)
    {
	    $a[$d]=$id;
        $sql="select id_parent from gws_danhmuc where id=$id";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
	    $id=$row["id_parent"];	  
	    $d++;
    }      
    for($i=$d-1;$i>=1;$i--) 
    {
      $id=intval($a[$i]);
	  if($id!=$xp) echo "<script>clickOnNodeObj(nut$id);</script>";
    }
  }	
}
?>
</body>
</html>
