<?php
//session_start();
require("TreeAdmin/connect.php");
if(isset($_GET["code"]))
{
	$_SESSION["code"]=$_GET["code"];
}

require("excute.php");
  if(isset($_SESSION["giohang"])) $sess=$_SESSION["giohang"];
  else $sess="";
  if($_SERVER['QUERY_STRING']=="")
    echo "<script language='javascript'>window.location='./?page=home';</script>";
  if(isset($_GET["lang"]))
  {
    $lang=$_GET["lang"];
	if($lang!="vn"&&$lang!="en"&&$lang!="th") $lang="vn";
  }else $lang="vn";
  if($lang=="en") $noi="_eng";
  elseif($lang=="th") $noi="_thai";
  else $noi="";
  $duoi="";
  if($noi=="_eng") $duoi="&lang=en";
  if($noi=="_thai") $duoi="&lang=th";
  ///////////////////////////////////////////////////////
  if(isset($_GET["page"])) $page=$_GET["page"];
  else $page="noidung";
  if(isset($_GET["code"])){
    $tukhoa=$_GET["code"];
	$code=$_GET["code"];
  }elseif(isset($_GET["store"])){
    $tukhoa=$_GET["store"];
	$store=$_GET["store"];
  }else $tukhoa="gioithieu";
  ///////////////////////////////////////////////////////

function get_id($tukhoa)
{
  $sql="select id from gws_danhmuc where tukhoa='$tukhoa'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
  return $row["id"];
}

function get_value_field($field_input,$value_input,$field_output,$table,$default_result)
{
	$sql="select $field_output from $table where $field_input='$value_input'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_array($result);
		return $row["$field_output"];
	}else return $default_result;
}

function get_key($id)
{
  $sql="select tukhoa from gws_danhmuc where id='$id'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
  return $row["tukhoa"];
}

function getlevel($id,$idxp)
{
  $level=0;
  while($id!=$idxp)
  {
    $sql="select id_parent from gws_danhmuc where id=$id";
	$rs=mysql_query($sql);
	$row=mysql_fetch_array($rs);
	$id=$row["id_parent"];
	$level++;
  }
  return $level;
}

function get_num_child($id_parent)
{
  $sql="select * from gws_danhmuc where id_parent=$id_parent and kieunhap=1 order by capnhat desc";
  $result=mysql_query($sql);
  return mysql_num_rows($result);
}

function get_name($tukhoa,$noi)
{
  $sql="select ten$noi from gws_danhmuc where tukhoa='$tukhoa'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
  return $row["ten"];
}

function getPathDir($id,$noi,$char=">")
{
	$sResult="";
	$count=0;
	while($id!=0)
	{
		$count++;
		$sql="select id_parent from gws_danhmuc where id=$id";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

/*  		if($sResult!="")
			$sResult=" $char ".$sResult;
		if(!isset($_GET["code"]))
			$sResult="".get_name(get_key($id),$noi)."".$sResult;
		elseif($count==1)
			$sResult="".get_name(get_key($id),$noi)."".$sResult;
		elseif($count==2)
			$sResult="".get_name(get_key($id),$noi)."".$sResult;
		$id=$row["id_parent"];	
 */
  	if($sResult!="")
			$sResult=" $char ".$sResult;
		if(!isset($_GET["code"]))
			$sResult="<a href='./?page=".$_GET["page"]."'>".get_name(get_key($id),$noi)."</a>".$sResult;
		elseif($count==1)
			$sResult="<a href='./?page=".$_GET["page"]."&code=".$_GET["code"]."'>".get_name(get_key($id),$noi)."</a>".$sResult;
		elseif($count==2)
			$sResult="<a href='./?page=".$_GET["page"]."'>".get_name(get_key($id),$noi)."</a>".$sResult;
		$id=$row["id_parent"]; 
	
	}	
	return $sResult;
}

function getPath($id,$noi,$char="&raquo;")
{
	$sResult="";
	$count=0;
	while($id!=0)
	{
		$count++;
		$sql="select id_parent from gws_danhmuc where id=$id";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

 		if($sResult!="")
			$sResult=" $char ".$sResult;
		if(!isset($_GET["code"]))
			$sResult="".get_name(get_key($id),$noi)."".$sResult;
		elseif($count==1)
			$sResult="".get_name(get_key($id),$noi)."".$sResult;
		elseif($count==2)
			$sResult="".get_name(get_key($id),$noi)."".$sResult;
		$id=$row["id_parent"];	

/*  	if($sResult!="")
			$sResult=" $char ".$sResult;
		if(!isset($_GET["code"]))
			$sResult="<a href='./?page=".$_GET["page"]."'>".get_name(get_key($id),$noi)."</a>".$sResult;
		elseif($count==1)
			$sResult="<a href='./?page=".$_GET["page"]."&code=".$_GET["code"]."'>".get_name(get_key($id),$noi)."</a>".$sResult;
		elseif($count==2)
			$sResult="<a href='./?page=".$_GET["page"]."'>".get_name(get_key($id),$noi)."</a>".$sResult;
		$id=$row["id_parent"]; 
*/	
	}	
	return $sResult;
}


function danhsachcon($tukhoa,$link,$field)
  {
    $arr=array();
	$sql_ds="select $field from gws_danhmuc where id_parent=".get_id($tukhoa)." order by capnhat desc";
	$result_ds=mysql_query($sql_ds);
	$i=0;
	if(mysql_num_rows($result_ds)!=0)
	  while($row_ds=mysql_fetch_array($result_ds))
	  {
	    $arr[$i]=$row_ds["$field"];
		$i++;
	  }
	return $arr;
  }  

function viewInboundTours($tukhoa1, $tukhoa2, $tukhoa3, $tukhoa4, $tukhoa5, $tukhoa6, $tukhoa7, $noi)
{
	if($noi=="_eng") $duoi="&lang=en";
	$sql="select * from gws_tours";
	$sql.=" where trim(tieude$noi)<>'' and kiemduyet=1 and id_parent in(".get_id($tukhoa1).",".get_id($tukhoa2).",".get_id($tukhoa3).",".get_id($tukhoa4).",".get_id($tukhoa5).",".get_id($tukhoa6).",".get_id($tukhoa7).") and (tieudiem=1 or tinnong=1) order by capnhat desc limit 5";

	$result=@mysql_query($sql);
	if(@mysql_num_rows($result)!=0)
	{
		while ($row=@mysql_fetch_array($result)){
		echo "<div id='tour' style='height:110px; padding:5px; margin-bottom:10px; border:1px solid #C5DEFE'>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			  <tr>
				<td valign='top' width='90'><a href='./?page=tours&code=".get_key($row["id_parent"])."&id=".$row["id_tour"].$duoi."'><img src='".$row["anhtrichdan"]."' width='80' style='padding:2px; border:1px solid #ccc' />"."</a></td>
				<td valign='top'><div class='tour_name'><a href='./?page=tours&code=".get_key($row["id_parent"])."&id=".$row["id_tour"].$duoi."'>".$row["tieude$noi"]."</a>";
				if ($row['tieudiem']==1) {
					echo "<span class='tour_new'><img src='../images/icon_new.gif' alt='Tour mới' align='baseline' /></span>";
				}
				if ($row['tinnong']==1) {
					echo "<span class='tour_hot'><img src='../images/icon_hot.gif' alt='Tour hot' align='baseline' /></span></div>";
				}
					echo "<div class='tour_info'>".$row["trichdan$noi"]."</div>
				</td>
			  </tr>
			</table>
		</div>
		";
		}
		return true;
	}else return false;
}

function viewOutboundTours($tukhoa1, $tukhoa2, $tukhoa3, $tukhoa4, $tukhoa5, $tukhoa6, $tukhoa7, $tukhoa8, $tukhoa9, $noi)
{
	if($noi=="_eng") $duoi="&lang=en";
	$sql="select * from gws_tours";
	$sql.=" where trim(tieude$noi)<>'' and kiemduyet=1 and id_parent in(".get_id($tukhoa1).",".get_id($tukhoa2).",".get_id($tukhoa3).",".get_id($tukhoa4).",".get_id($tukhoa5).",".get_id($tukhoa6).",".get_id($tukhoa7).",".get_id($tukhoa8).",".get_id($tukhoa9).") and (tieudiem=1 or tinnong=1) order by capnhat desc limit 5";

	//echo $sql;
	$result=@mysql_query($sql);
	if(@mysql_num_rows($result)!=0)
	{
		while ($row=@mysql_fetch_array($result)){
		echo "<div id='tour' style='height:110px; padding:5px; margin-bottom:10px; border:1px solid #C5DEFE'>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			  <tr>
				<td valign='top' width='90'><a href='?page=tours&code=".get_key($row["id_parent"])."&id=".$row["id_tour"].$duoi."'><img src='".$row["anhtrichdan"]."' width='80' style='padding:2px; border:1px solid #ccc' />"."</a></td>
				<td valign='top'><div class='tour_name'><a href='?page=tours&code=".get_key($row["id_parent"])."&id=".$row["id_tour"].$duoi."'>".$row["tieude$noi"]."</a>";
				if ($row['tieudiem']==1) {
					echo "<span class='tour_new'><img src='../images/icon_new.gif' alt='Tour mới' align='baseline' /></span>";
				}
				if ($row['tinnong']==1) {
					echo "<span class='tour_hot'><img src='../images/icon_hot.gif' alt='Tour hot' align='baseline' /></span></div>";
				}
					echo "<div class='tour_info'>".$row["trichdan$noi"]."</div>
				</td>
			  </tr>
			</table>
		</div>
		";
		}
		return true;
	}else return false;
}

function viewHotels($tukhoa1, $tukhoa2, $tukhoa3, $noi)
{
	if($noi=="_eng") $duoi="&lang=en";
	$sql="select * from gws_hotels";
	$sql.=" where trim(tieude$noi)<>'' and kiemduyet=1 and id_parent in (".get_id($tukhoa1).",".get_id($tukhoa2).",".get_id($tukhoa3).") and (tieudiem=1 or tinnong=1) order by capnhat desc limit 5";
	
	//echo $sql;
	
	$result=@mysql_query($sql);
	if(@mysql_num_rows($result)!=0)
	{
		while ($row=@mysql_fetch_array($result)){
		echo "<div id='tour' style='height:90px; padding:5px; margin-bottom:10px; border:1px solid #C5DEFE'>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			  <tr>
				<td valign='top' width='90'><a href='?page=hotels&code=".get_key($row["id_parent"])."&id=".$row["id_hotel"].$duoi."'><img src='".$row["anhtrichdan"]."' width='80' style='padding:2px; border:1px solid #ccc' />"."</a></td>
				<td valign='top'><div class='tour_name'><a href='?page=hotels&code=".get_key($row["id_parent"])."&id=".$row["id_hotel"].$duoi."'>".$row["tieude$noi"]."</a>";
				echo "<div class='tour_info'>".$row["trichdan$noi"]."</div>";
				echo "</td>
			  </tr>
			</table>
		</div>
		";
		}
		return true;
	}else return false;
}

function viewNews($tukhoa1, $noi)
{
	if($noi=="_eng") $duoi="&lang=en";
	$sql="select * from gws_tinbai";
	$sql.=" where trim(tieude$noi)<>'' and kiemduyet=1 and id_parent=(".get_id($tukhoa1).") order by capnhat desc limit 5";

	$result=@mysql_query($sql);
	if(@mysql_num_rows($result)!=0)
	{
		while ($row=@mysql_fetch_array($result)){
		echo "<div id='tour' style='height:90px; padding:5px; margin-bottom:10px; border:1px solid #C5DEFE'>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			  <tr>
				<td valign='top' width='90'><a href='?page=tin-tuc&code=".get_key($row["id_parent"])."&id=".$row["id_tin"].$duoi."'><img src='".$row["anhtrichdan"]."' width='80' style='padding:2px; border:1px solid #ccc' />"."</a></td>
				<td valign='top'><div class='tour_name'><a href='?page=tin-tuc&code=".get_key($row["id_parent"])."&id=".$row["id_tin"].$duoi."'>".$row["tieude$noi"]."</a>";
				echo "<div class='tour_info'>".$row["trichdan$noi"]."</div>";
				echo "</td>
			  </tr>
			</table>
		</div>
		";
		}
		return true;
	}else return false;
}
?>