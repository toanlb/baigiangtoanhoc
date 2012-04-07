
	<?php
	  $sql="select capnhat,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d-%m-%Y') as hs, tentl$noi,anh, file,gioithieu$noi from gws_thuvien where trim(tentl$noi)<>'' and id_thuvien=$id";
	  $result=@mysql_query($sql);
	  if(@mysql_num_rows($result)!=0){
		$row=@mysql_fetch_array($result);
		$datetime=$row["capnhat"];
	?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td><img src="<?php echo $row["anh"];?>" align="left" /><?php echo $row["tentl$noi"];?>
		<br /></td>
	  </tr>
	  <tr>
		<td><a href=".<?php echo $row["file"];?>" style="text-decoration:none;">Downdload file</a></div>
		<div style="text-align:justify; padding-left:15px; padding-right:15px;"><?php echo $row["gioithieu$noi"];?></div></td>
	  </tr>
	  <tr>
		<td align="right"><span  style="font-family:Arial, Helvetica, sans-serif; text-decoration:none; color:#666666;"><?php echo $row["hs"];?></span><br /><a href="javascript:history.go(-1);" style="font-weight:bold; text-decoration:underline; color:black; padding-right:10px;">Quay lại</a></td>
	  </tr>
	</table>
	<?php }else{?>
	<script language="javascript">
	window.location="?page=home<?php echo $duoi;?>";
	</script>
	<?php }?>
	
	
	<div style="border-top:solid #0066FF 1px;">
		<?php
  require("TreeAdmin/connect.php");
  $noi=$_GET["noi"];
  function InputData($TableName,$id_parent)
  {
    if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    $i=1;
	$dstruong="";
	$dsgiatri="";
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  	  
	  $gt=str_replace("'","&rsquo;",$_POST["$sForm"]);
	  if($i==1){
	    $dstruong.="$sForm";
		$dsgiatri.="'$gt'";
	  }else{
	    $dstruong.=",$sForm";
		$dsgiatri.=",'$gt'";
	  }
	  $i++;
    }
	$sql.="insert into $TableName($dstruong,id_parent,capnhat) values($dsgiatri,$id_parent,Now())";
	return $sql;
  }
  if(isset($_POST["tenkhach"])) 
  {
	mysql_query(InputData("gws_ykien",7));
	//echo InputData("gws_lienhe",7); exit;
  }
?>
<script language="javascript">
function doSubmit()
{
if (document.frmAddnew.tenkhach.value=="")
	{
	alert("Bạn vui lòng cho biết tên");
	document.frmAddnew.tenkhach.focus();
	return false;
	}else if (document.frmAddnew.email.value=="")
	{
	alert("Bạn vui lòng cho biết email");
	document.frmAddnew.email.focus();
	return false;
	}


else
if (document.frmAddnew.noidung.value=="")
	{
	alert("Bạn vui lòng cho biết thông tin chi tiết");
	document.frmAddnew.noidung.focus();
	return false;
	}
else
	{
	document.frmAddnew.submit();
	alert("Cám ơn bạn! Chúng tôi sẽ sớm liên lạc lại với bạn!");
	}
}
</script>

					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
					
					<tr><br />
					  <strong> Ý kiến độc giả!</strong><br /><br />
					  
					</tr>
					
					
					<form action="" method="post" name="frmAddnew" id="frmAddnew">
					<tr>
					  <td width="20%" height="39" class="ContactText"><b class="blue">Họ tên:</b></td>
					  <td><input name="tenkhach" type="text" class="ContactForm" id="tenkhach" size="40" maxlength="80" /></td>
					</tr>
					<tr>
					  <td height="37" class="ContactText"><b class="blue">Email:</b></td>
					  <td><input name="email" type="text" class="ContactForm" id="email" size="40" maxlength="30" /></td>
					</tr>
					
				
					<tr>
					  <td class="ContactText"><b class="blue">Nội dung:</b></td>
					  <td style="padding-bottom:20px;"><textarea name="noidung" cols="40" rows="7" wrap="physical" id="noidung"></textarea></td>
					</tr>
					<tr>
					  <td align="center">&nbsp;</td>
					  <td><input type="button" name="btnSubmit" value="Gửi thông tin" onclick="doSubmit();"></td>
					</tr>
				  </form>
				  </table>
		
       
 <?php
$tenkhach=$_POST["tenkhach"];
$mail=$_POST["email"];
$noidung=$_POST["noidung"];
	$sql="SELECT *, DATE_FORMAT(capnhat,'%H:%i ngày %d-%m-%Y') as datetime FROM gws_ykien WHERE id_lienhe=".$_GET["id_lienhe"];
$result=mysql_query($sql);

$datetime=$row["capnhat"];
	
?>


<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="2"><font size="2"><b>Thông tin ý kiến độc giả </b></font></td>
  </tr>
 
  <tr>
    <td width="15%">Người liên hệ </td>
    <td><?php echo $tenkhach;?></td>
  </tr>
 
  <tr>
    <td>Email</td>
    <td><a href="mailto:<?php echo $mail;?>"><?php echo $mail;?></a></td>
  </tr>
 <tr>
    <td>Nội dung</td>
    <td><?php echo $noidung;?></td>
  </tr>
 
 
 
</table></div>