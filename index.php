<?php include 'include/lib.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/css/style.css"/>
<link rel="stylesheet" type="text/css" href="style/css/nivo-slider.css"/>
<script type="text/javascript" src="style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="style/js/cufon-yui.js"></script>
<script type="text/javascript" src="style/js/VNI-Vari_700.font.js"></script>
<script type="text/javascript" src="style/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
							  $('.slide').nivoSlider({
													 controlNav: false,
													   directionNav:false
													 }); 
							  $('ul#menu li').hover(function(){
															  $(this).find('.sub').show();
															  $(this).find('.have_sub').addClass('active');
															  },function(){
																$(this).find('.have_sub').removeClass('active');  
															   $(this).find('.sub').hide();	  
																  }); 
							   $('.support_online').hover(function(){
																  $(this).stop().animate({right:'0px'});
																  },function(){
																	 $(this).stop().animate({right:'-170px'});  
																	  });
							    $('.search').hover(function(){
															   $(this).find('.form_search').show();
															   },function(){
																    $(this).find('.form_search').hide();
																   });
							 
							   });
	Cufon.replace('ul#menu li a',{hover:true});
	Cufon.replace('.search',{hover:true});
	Cufon.replace('.head_line h3 a',{hover:true});
	Cufon.replace('.col_1 h3 a',{hover:true});
	Cufon.replace('.title_subj ul li a',{hover:true});
	Cufon.replace('ul#quick_link',{hover:true});
	Cufon.replace('.block_left h3');
	Cufon.replace('.list_news h3 a',{hover:true});
</script>
<title>Tài liệu toán học-gioi thieu</title>
</head>
<body>

<!-- Header -->
<div class="page_header">
	<?php 
		if($page=='home'){
			include 'module/content/home_header.php';
		}else include 'module/content/header.php'; 
	?>
</div>

<!-- Content -->
<div class="page_content">
	<?php
		switch($page){
			case 'gioi-thieu': include 'module/gioi-thieu/detail.php';
				break;
			case 'tin-tuc-giao-duc': include 'module/tin-tuc-giao-duc/detail.php';
				break;
			default: ;
				break;
		}
	?>
</div>

<!-- Footer -->
<div class="page_footer">
	<?php include 'module/content/footer.php'; ?>
</div>

</body>
</html>
