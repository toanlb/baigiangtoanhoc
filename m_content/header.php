	<div id="taskbarTop">
    	<div class="main clearfix">
        	<ul class="lstTopLink fl">
            	<li class="current"><a target="_blank" href="http://luyenthivip.vn"><span><b>Luyện thi VIP</b></span></a></li>
            	<li><a target="_blank" href="http://vtes.vn"><span><b>Trang chủ VTES</b></span></a></li>
            	<li><a target="_blank" href="http://baigiang.vn"><span><b>Bài giảng trực tuyến</b></span></a></li>
            	<li><a target="_blank" href=""><span><b>Số liên lạc điện tử</b></span></a></li>
            	<li><a target="_blank" href=""><span><b>Gia sư trực tuyến</b></span></a></li>
            </ul>
			<p class="loginLink"><a href="">Đăng nhập</a></p>
        </div>
	</div>
    
    <div id="header">
    	<div class="col-980 clearfix">
        	<h1 class="logo-homepage"><a href="index.php"><img src="images/vteslogo.png"></a></h1>
           <!--  <div class="adv-top"><a href=""><img src="../pic/topbanner.gif"></a></div> -->
        </div>
    </div>
    
    <div id="menuTop">
		<div style="margin-top:10px" class="col-980  relvts">
			<div class="homeMenu">
				<div style="position:relative" class="homeMenu-inner clearfix">
					<a href="index.php" class="fl icon-home">Home</a>
					<ul class="clearfix">
						<?php 
							$active = "class='actived'";
							$page = $_GET['page'];
							$code = $_GET['code'];
							if($code){
								if($code == 'dich-vu'){
									$dichvu = $active;
								}
								if($code == 'doi-tac'){
									$doitac = $active;
								}
							}else{
								if($page == 'gioi-thieu'){
									$gioithieu = $active;
								}
								if($page == 'tin-tuc'){
									$tintuc = $active;
								}
								if($page == 'tuyen-dung'){
									$tuyendung = $active;
								}
								if($page == 'hoi-dap'){
									$hoidap = $active;
								}
								if($page == 'lien-he'){
									$lienhe = $active;
								}
							}
						?>
						<li <?php echo $gioithieu?> ><a href="?page=gioi-thieu"><span><b>Giới thiệu</b></span></a></li>
						<li <?php echo $tintuc?>><a href="?page=tin-tuc"><span><b>Tin tức</b></span></a></li>
						<li <?php echo $dichvu; ?>><a href="?page=vtes&code=dich-vu"><span><b>Sản phẩm - Dịch vụ</b></span></a></li>
						<li <?php echo $doitac;?>><a href="?page=vtes&code=doi-tac"><span><b>Đối tác</b></span></a></li>
						<li <?php echo $tuyendung?>><a href="?page=tuyen-dung"><span><b>Tuyển dụng</b></span></a></li>
						<li <?php echo $hoidap?>><a href=""><span><b>Hỏi đáp</b></span></a></li>
                        <li <?php echo $lienhe?>><a href="?page=lien-he"><span><b>Liên hệ</b></span></a></li>
					</ul>
					
				</div>
			</div>
			<div style="display:none" class="homeMenuDrop">
				<div class="homeMenuDrop-innter clearfix">
					<ul class="clearfix">
						<li style="width:50%">
							<p><a href="">Luyện thi đại học</a></p>
							<p><a href="">Khối 12</a></p>
							<p><a href="">Khối 11</a></p>
							<p><a href="">Khối 10</a></p>
							<p><a href="">Luyện thi cấp 3</a></p>
							<p><a href="">Khối 9</a></p>
							<p><a href="">Khối 8</a></p>
							<p><a href="">Khối 7</a></p>
						</li>
						<li style="width:50%">
							<p><a href="">Luyện thi đại học</a></p>
							<p><a href="">Khối 12</a></p>
							<p><a href="">Khối 11</a></p>
							<p><a href="">Khối 10</a></p>
							<p><a href="">Luyện thi cấp 3</a></p>
							<p><a href="">Khối 9</a></p>
							<p><a href="">Khối 8</a></p>
							<p><a href="">Khối 7</a></p>
						</li>
					</ul>
				</div>               
			</div>
			
			<div class="homeSrchbx">
				<div class="homeSrchbx-inner clearfix">
					<div class="homeGuide">
						<?php 
						 $d = date('l',time());
						 switch ($d) {
							 case 'Saturday': $t = 'Thứ 7';
								 
								 break;
							 case 'Sunday': $t = 'Chủ nhật';
								 
								 break;
							 case 'Tuesday': $t = 'Thứ 3';
								 
								 break;
							 case 'Webnesday': $t = 'Thứ 4';
								 
								 break;
							 case 'Thursday': $t = 'Thứ 5';
								 
								 break;
							 case 'Friday': $t = 'Thứ 6';
								 
								 break;
							 
							 default: $t = 'Thứ 2';
								 
								 break;
						 }
						 echo $t.', ngày '.date('d/m/Y',time());
						?>
					</div>
					<div class="hotNewsTop">
						<p><b>Thông báo:</b> <a href="">Giúp học sinh tìm kiếm nhanh bài kiểm tra miễn phí</a></p>
					</div>
					<div class="topbxSrch">
						<div class="topbxSrch-inner"><input type="text" name="" value="Nhập từ khóa tìm kiếm" style="width:220px"><button class="srchbtns"></button></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    