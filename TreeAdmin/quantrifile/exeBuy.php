<?php
require("../connect.php");
$sess=$_GET["sess"];

function getNumber($id_sp,$sess)
{
	$sql="select * from gws_giohang where id_sp=$id_sp and sess='$sess'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$row=mysql_fetch_array($result);
		return $row["soluong"];
	}else return 0;
}

function buyProduct($id_sp,$sess,$num)
{
	$old_num=getNumber($id_sp,$sess);
	$new_num=$old_num+$num;
	if($old_num==0)
		$sql="insert into gws_giohang(id_sp,sess,soluong,capnhat) values($id_sp,'$sess',$num,Now())";
	else
		$sql="update gws_giohang set soluong=$new_num where id_sp=$id_sp and sess='$sess'";	
	mysql_query($sql);
}
if(isset($_GET["status"]))
{
	if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    $i=1;
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  	  
	  $gt=$_POST["$sForm"];  
	  if(substr($sForm,0,3)=="txt")
	  {
	  	$sql="update gws_giohang set soluong=$gt where id=".str_replace("txt","",$sForm);
		mysql_query($sql);
	  }
	}
	header("location:giohang.php?".str_replace("&status=tinhlai","",$_SERVER['QUERY_STRING']));
}
?>