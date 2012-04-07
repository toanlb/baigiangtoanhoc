

           

 <div class="left">
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
	mysql_query(InputData("gws_lienhe",7));
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
if (document.frmAddnew.dienthoai.value=="")
	{
	alert("Bạn vui lòng cho biết số điện thoại");
	document.frmAddnew.dienthoai.focus();
	return false;
	}
else
if (document.frmAddnew.diachi.value=="")
	{
	alert("Bạn vui lòng cho biết địa chỉ");
	document.frmAddnew.diachi.focus();
	return false;
	}
else
if (document.frmAddnew.tieude.value=="")
	{
	alert("Bạn vui lòng cho biết thông tin");
	document.frmAddnew.tieude.focus();
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
<? if ($lang=="en") echo " 
            

					<table width='100%' border='0' align='center' cellpadding='3' cellspacing='0'>
					
					<tr><br />
					  <strong>Institute for Training and Economic Development :
					 <br /> ...............................
					  <br /> Contact here!</strong><br /><br />
					  
					</tr>
					
					
					<form action='' method='post' name='frmAddnew' id='frmAddnew'>
					<tr>
					  <td width='20%' height='39' class='ContactText'><b class='blue'>Full name:</b></td>
					  <td><input name='tenkhach' type='text' class='ContactForm' id='tenkhach' size='40' maxlength='80' /></td>
					</tr>
					<tr>
					  <td height='37' class='ContactText'><b class='blue'>Email:</b></td>
					  <td><input name='email' type='text' class='ContactForm' id='email' size='40' maxlength='30' /></td>
					</tr>
					<tr>
					  <td height='44' class='ContactText'><b class='blue'>Tel:</b></td>
					  <td><input name='dienthoai' type='text' class='ContactForm' id='dienthoai' size='40' maxlength='15' /></td>
					</tr>
					<tr>
					  <td height='38' class='ContactText'><b class='blue'>Address:</b></td>
					  <td><input name='diachi' type='text' class='ContactForm' id='diachi' size='40' maxlength='500' /></td>
					</tr>
					<tr>
					  <td height='50' class='ContactText'><b class='blue'>Title:</b></td>
					  <td><input name='tieude' type='text' class='ContactForm' id='tieude' size='40' maxlength='255' /></td>
					</tr>
					<tr>
					  <td class='ContactText'><b class='blue'>Contents:</b></td>
					  <td style='padding-bottom:20px;'><textarea name='noidung' cols='40' rows='7' wrap='physical' id='noidung'></textarea></td>
					</tr>
					<tr>
					  <td align='center'>&nbsp;</td>
					  <td><input type='button' name='btnSubmit' value='Send' onclick='doSubmit();'></td>
					</tr>
				  </form>
				  </table>";
	   
	   else
	    echo " <table width='100%' border='0' align='center' cellpadding='3' cellspacing='0'>
					
					<tr><br />
					  <strong>Mọi thông tin đăng ký khóa học hoặc góp ý xin vui lòng liên hệ với chúng tôi theo địa chỉ :
					 <br /> ..................................
					  
					</tr>
					
					
					<form action='' method='post' name='frmAddnew' id='frmAddnew'>
					<tr>
					  <td width='20%' height='39' class='ContactText'><b class='blue'>Họ tên:</b></td>
					  <td><input name='tenkhach' type='text' class='ContactForm' id='tenkhach' size='40' maxlength='80' /></td>
					</tr>
					<tr>
					  <td height='37' class='ContactText'><b class='blue'>Email:</b></td>
					  <td><input name='email' type='text' class='ContactForm' id='email' size='40' maxlength='30' /></td>
					</tr>
					<tr>
					  <td height='44' class='ContactText'><b class='blue'>Tel:</b></td>
					  <td><input name='dienthoai' type='text' class='ContactForm' id='dienthoai' size='40' maxlength='15' /></td>
					</tr>
					<tr>
					  <td height='38' class='ContactText'><b class='blue'>Địa chỉ:</b></td>
					  <td><input name='diachi' type='text' class='ContactForm' id='diachi' size='40' maxlength='500' /></td>
					</tr>
					<tr>
					  <td height='50' class='ContactText'><b class='blue'>Tiêu đề:</b></td>
					  <td><input name='tieude' type='text' class='ContactForm' id='tieude' size='40' maxlength='255' /></td>
					</tr>
					<tr>
					  <td class='ContactText'><b class='blue'>Nội dung:</b></td>
					  <td style='padding-bottom:20px;'><textarea name='noidung' cols='40' rows='7' wrap='physical' id='noidung'></textarea></td>
					</tr>
					<tr>
					  <td align='center'>&nbsp;</td>
					  <td><input type='button' name='btnSubmit' value='Gửi thông tin' onclick='doSubmit();'></td>
					</tr>
				  </form>
				  </table>"; 
				   ?>
        </div>