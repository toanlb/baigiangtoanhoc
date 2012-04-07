<?php include("w3s.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>

<link rel="stylesheet" type="text/css" href="style/style/general.css"/>
<link rel="stylesheet" type="text/css" href="style/style/taskbar.css"/>
<script type="text/javascript" src="js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
							  $('.tool-pag ul li a span').hide();
							  $('.tool-pag ul li a').hover(function(){
												$(this).find('span').show();					
																	},function(){
												$(this).find('span').hide();						
																		}); 
							  $('.slide').nivoSlider();
							   });
	function clearText(field)
	{
	if (field.defaultValue == field.value) field.value = '';
	else if (field.value == '') field.value = field.defaultValue;
	} 
</script>
<title>Vtes.vn</title>
</head>
<body>
<?php include("m_content/header.php");?>

<div class="content">
<div id="wrapper">
  <div class="container">
  	  
  

  
  <div style="font-size:16px;color:#666666;font-family:Arial, Helvetica, sans-serif">Home&raquo;<?php echo get_name($_GET["page"],$noi); ?></div><div class="block-l">
 
    <div class="grid-10 bg-white">
      <!-- left -->
     
         <?php 
         $detail = $_GET['detail'];
		 if($detail){
		 	require("detail.php");
		 }else{
			switch ($page)
			  {
				case "home":require("home.php");break;
				case "so-tay-dien-tu":require("m_sotaydt/main.php");break;
				
				case "tin-tuc":require("m_news/main.php");break;
				case "tv-hinh-anh":require("m_gioithieu/focus.php");break;
				
				case "gia-su-truc-tuyen":require("m_giasu/main.php");break;
				case "ds-lien-ket":require("m_lienket/n_others.php");break;
				case "tin-khuyen-mai":require("m_news/focus.php");break;
				
				case "luyen-thi-vip":require("m_luyenthi/main.php");break;
				case "tin-luyen-thi":require("m_luyenthi/n_others.php");break;
				
				case "thu-vien":require("m_thuvien/main.php");break;
				case "lich-kg":require("m_thuvien/main1.php");break;
				case "bai-giang-truc-tuyen":require("m_baigiang/main.php");break;
				case "tin-hoc-bong-du-hoc":require("m_hocbong/n_others.php");break;
				
				case "lien-he":require("m_contact/contact.php");break;
				case "dang-ky":require("m_contact/dangky.php");break;
				
				case "vtes":require("m_gioithieu/main.php");break;
				case "gioi-thieu":require("m_gioithieu/n_others.php");break;
				
				case "tuyen-dung":require("m_tuyendung/main.php");break;
				
				case "search":require("m_search/result.php");break;
				case "tracuudiemthi":require("m_tracuudiemthi/result.php");break;
				case "diem-thi":require("m_tracuudiemthi/main1.php");break;
				
				default:require("m_content/main.php");break;
			  }
			}
		?>		
		
		
      <!-- right -->
     <?
     $id = $_GET['id'];
	 if(!$id && !$detail){
	 	include("right.php");
	 }else{
	 	include("right_detail.php");
	 }
	 
	 ?>
    </div>
	
</div>
  </div>
  <!-- foot -->
  <?php include("m_content/footer.php");?>

</div>




</body>
</html>
