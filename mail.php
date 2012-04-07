<?php
if(isset($_POST["fullname"]))
{
  $fullname=$_POST["fullname"];
  $address=$_POST["address"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $description=$_POST["description"];
  $message="Your information\n
  
	\nFull name: $fullname
	\nAddress: $address
	\nTelephone number: $phone
	\nEmail: $email
	\nDescription: $description";
	 mail('luuthang8x@yahoo.com','Lien he!',$message);
}
?>
<script language="javascript">
function checkInput(obj,mess)
{
	if(obj.value=="")
	{
		alert(mess);
		obj.focus();
		return false;
	}else return true;
}
function doContact()
{
	if(!checkInput(form1.fullname,"Bạn phải nhập đầy đủ thông tin!")) return;
	if(!checkInput(form1.address,"Bạn phải nhập đầy đủ thông tin!")) return;
	if(!checkInput(form1.phone,"Bạn phải nhập đầy đủ thông tin!")) return;
	if(!checkInput(form1.email,"Bạn phải nhập đầy đủ thông tin!")) return;
	if(!checkInput(form1.description,"Bạn phải nhập đầy đủ thông tin!")) return;
	if(confirm("Bạn có chắc chắn với thông tin đã nhập?")){
		if(confirm("Cám ơn bạn đã gửi thông tin cho chúng tôi. Chúng tôi sẽ liên hệ lại với bạn sớm nhất trong thời gian có thể."))
			form1.submit();
	}
}
</script>
<table width="98%" border="0" align="center" cellpadding="10" cellspacing="0">
  <form name="form1" method="post" action="" id="form1">
    <tr>
      <td colspan="2"><strong>Thông tin của bạn</strong></td>
    </tr>
    <tr>
      <td width="20%" align="right">Họ và tên:</td>
      <td><input name="fullname" type="text" id="fullname" size="40"></td>
    </tr>
    <tr>
      <td align="right">Địa chỉ:</td>
      <td><input name="address" type="text" id="address" size="40"></td>
    </tr>
    <tr>
      <td align="right">Số điện thoại:</td>
      <td><input name="phone" type="text" id="phone" size="40"></td>
    </tr>
    <tr>
      <td align="right">Email: </td>
      <td><input name="email" type="text" id="email" size="40"></td>
    </tr>
    <tr>
      <td align="right" valign="top">Yêu cầu:</td>
      <td><textarea name="description" cols="40" rows="7" wrap="VIRTUAL" id="description"></textarea></td>
    </tr>
    <tr>
	  <td>&nbsp;</td>
      <td><input type="button" name="Button" value=" Gửi đi " onClick="doContact();"></td>
    </tr>
  </form>
</table>
