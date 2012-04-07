
        
		<?php

  include("TreeAdmin/FCKeditor/fckeditor.php") ;
?>

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
	mysql_query(InputData("gws_dangky",7));
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
					  <? if ($lang=="en") echo " 
					  <strong>Institute for Training and Economic Development :
					 <br /> Building C6-TT6 - Van Quan Urban -Ha Dong - Hanoi<br />
					  T: 84-4 6328 5795 |F: 84-4 3354 5874 |E: info@ited.edu.vn

					  <br /> Contact here!</strong><br /><br />
					  
					";
					  else echo "<br />
					  <strong>Mọi thông tin đăng ký khóa học hoặc góp ý xin vui lòng liên hệ với chúng tôi theo địa chỉ :
					 <br /> Tòa nhà: C6 TT6 Khu Đô thị Văn Quán - Hà Đông - Hà Nội<br />
					  DT: (84-4) 6328 5795| Fax: (84-4) 3354 5874| E: info@ited.edu.vn 
					  <br /> Hoặc liên hệ với chúng tôi tại đây!</strong><br /><br />
					  
					";?>
					</tr>
					
					
					<form action="" method="post" name="frmAddnew" id="frmAddnew">
					<tr>
					  <td width="20%" height="39" class="ContactText"> 1. Họ và tên</td>
					  <td><input name="tenkhach" type="text" class="ContactForm" id="tenkhach" size="40" maxlength="80" /></td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">2. Giới tính</td>
					  <td><input name="gioitinh" type="radio" value="Nam" />
					    Nam <input name="gioitinh" type="radio" value="Nữ" checked />Nữ </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">3. Nghề nghiệp</td>
					  <td><input name="nghe" type="text" class="ContactForm" id="nghe" size="40" maxlength="30" /></td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">4. Ngày sinh </td>
					  <td>

<p>
  <input name="ngaysinh" type="text" id="ngaysinh" value="Click vào chọn ngày" />
</p></td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">5. Địa chỉ thường chú </td>
					  <td><input name="diachitt" type="text" class="ContactForm" id="diachitt" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">6. Số điện thoại nhà riêng </td>
					  <td><input name="codinh" type="text" class="ContactForm" id="codinh" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">7. Di động </td>
					  <td><input name="didong" type="text" class="ContactForm" id="didong" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">8. Họ tên bố/mẹ </td>
					  <td><input name="tenbome" type="text" class="ContactForm" id="tenbome" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">9. Điện thoại của bố/mẹ </td>
					  <td><input name="dtbome" type="text" class="ContactForm" id="dtbome" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">10. Nơi làm việc(học tập) </td>
					  <td><input name="noilv" type="text" class="ContactForm" id="noilv" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">11. Email</td>
					  <td><input name="mail" type="text" class="ContactForm" id="mail" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">12. Đồng ý nhận các thông tin về dịch vụ của ITED qua email </td>
					  <td>
					Có  <input name="nhanmail" type="radio" value="Có" checked /> 
					Không
					
					<input name="nhanmail" type="radio" value="không" />									    </td>
					</tr>
					
					<tr>
					  <td height="37" class="ContactText">13. Nguyện vọng theo khóa học </td>
					  <td>
					    <p>
					      <input name="khoahoc" type="checkbox" value="TOEFL-ITP" /> 
					      TOEFL-ITP 
				          <input name="khoahoc" type="checkbox" value="BTC" /> 	
				          BTC
					      <input name="khoahoc" type="checkbox" value="TESOL" /> 	
					      TESOL
					      <input name="khoahoc" type="checkbox" value=" TOEIC" /> 	
					      TOEIC				        </p>
					    <p>
					      <input name="khoahoc" type="checkbox" value="IELTS" />
					      IELTS
					      <input name="khoahoc" type="checkbox" value="Happy house" />
					      Happy house
					      <input name="khoahoc" type="checkbox" value="AET" />
					      AET
					      <input name="khoahoc" type="checkbox" value=" Khác" />
					      Khác.... </p></td>
					</tr>
					
					<tr>
					  <td height="37" class="ContactText">14. Điểm nguyện vọng </td>
					  <td><input name="diemnv" type="text" class="ContactForm" id="diemnv" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">15. Thời gian cần đạt điểm </td>
					  <td><input name="tgdat" type="text" class="ContactForm" id="tgdat" size="40" maxlength="30" /> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">16. Thời gian học phù hợp</td>
					  <td>
					  Tại Hà Nội: 
					    <input name="tghoc" type="checkbox" value=" 9:00 - 11:00" /> 
					      9:00 - 11:00 
				          <input name="tghoc" type="checkbox" value=" 15:00 - 17:00" /> 	
				         15:00 - 17:00
					      <input name="tghoc" type="checkbox" value=" 18:00 - 20:00" /> 	
					      18:00 - 20:00					     			      </td>
					</tr>
					
					<tr>
					  <td height="37" class="ContactText">17. Ngày học phù hợp</td>
					  <td>
					  Tại Hà Nội: 
					    <input name="ngayhoc" type="checkbox" value="2 - 4 - 6" /> 
					      2 - 4 - 6
				          <input name="ngayhoc" type="checkbox" value="3 - 5 - 7" /> 	
				         3 - 5 - 7					     			      </td>
					</tr>
					
					<tr>
					  <td height="37" class="ContactText">18. Thời gian đăng ký kiểm tra đầu vào </td>
					  <td>
					  <p> <input name="tgktra" type="text" id="tgktra" value="Click vào chọn ngày" /></p> </td>
					</tr>
					
					<tr>
					  <td height="37" class="ContactText">19. Bạn có nguyện vọng đi du học Hoa Kỳ ? </td>
					  <td>
					Có  <input name="nvduhoc" type="radio" value="Có" checked /> 
					Không
					
					<input name="nvduhoc" type="radio" value="Không" />									    </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">20. Quốc gia khác </td>
					  <td>
					  <input name="quocgia" type="text"  id="quocgia" />									    </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">21. Nếu có bạn sẽ học theo hình thức nào </td>
					  <td>
					Tự túc  <input name="hinhthuc" type="radio" value="Có" checked /> 
					Học bổng
					
					<input name="hinhthuc" type="radio" value="Không" />									    </td>
					</tr>
					
					<tr>
					  <td height="37" class="ContactText">22. Bạn sẽ đi vào thời gian nào </td>
					  <td>
					   
					      <p>
					        <input name="tgduhoc" type="checkbox" value="Lớp 10" /> 
					      Lớp 10
				          <input name="tgduhoc" type="checkbox" value="Lớp 11" /> 	
				          Lớp 11
					      <input name="tgduhoc" type="checkbox" value="Lớp 12" /> 	
					     Lớp 12</p>
					      <p>
					        <input name="tgduhoc" type="checkbox" value="Đại học" />
					        Đại học
					        <input name="tgduhoc" type="checkbox" value="Sau đại học" />
				          Sau đại học </p></td>
					</tr>
					<tr>
					  <td  class="ContactText">23. Các bạn có thể đặt câu hỏi liên quan đến việc học tập và du học ITED sẽ trả lời và gửi giải đáp qua địa chỉ liên hệ bạn đã đưa phía trên:</td>
					  <td><textarea name="cauhoi" cols="50" rows="15"></textarea> </td>
					</tr>
					<tr>
					  <td height="37" class="ContactText">24. Bạn nhận được học bổng ITED từ </td>
					  <td><input name="nhanhb" type="text" class="ContactForm" id="nhanhb" size="40" maxlength="30" /> </td>
					</tr>
					<tr valign="top">
					  <td height="37" class="ContactText">25. Bạn biết đến ITED qua </td>
					  <td >
					    <p>
					      <input name="biet1" type="checkbox" value="Bạn biết đến ITED qua" /> 
				        Webisite/Forum:</p>
					    <p>
					      <input name="biet2" type="text" class="ContactForm" id="biet2" size="40" maxlength="30" />
				          </p>
					    <p>    
				          <input name="biet1" type="checkbox" value="Bạn bè/ Học viên cũ của ITED" /> 
					      Bạn bè/ Học viên cũ của ITED       </p>
					    <p>
					      <input name="biet2" type="text" class="ContactForm" id="biet2" size="40" maxlength="30" /> 
			               </p>
					    <p>    
				          <input name="biet1" type="checkbox" value="Tờ rơi/các điểm quảng cáo/ báo chí" /> 
					      Tờ rơi/các điểm quảng cáo/ báo chí</p>
						  <p>    
				          <input name="biet1" type="checkbox" value="Hội thảo/ Event" /> 
					      Hội thảo/ Event </p>
						  <p>    
				          <input name="biet1" type="checkbox" value="Khác" /> 
					      Khác....</p>
						 <p>
					      <input name="biet2" type="text" class="ContactForm" id="biet2" size="40" maxlength="30" /> 
			               </p>					   </td>
					</tr>
					<tr>
					<td width="30%">&nbsp;</td>
					  <td>  <? if ($lang=="en") echo "<input type='button' name='btnSubmit' value='REGISTRATION' onClick='doSubmit();'> ";
					  else echo " <input type='button' name='btnSubmit' value='ĐĂNG KÝ' onClick='doSubmit();'>";?> </td>
					</tr>
				  </form>
				  </table>
		
       
          
	