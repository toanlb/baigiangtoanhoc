<div id="footer">
		<div class="ftrGd1">
			<div class="main clearfix">
            	<div class="fl" style="width:45%">
                	<div class="listLink fl" style="width:45%">
                    	<h3>Sản phẩm dịch vụ</h3>
                        <ul class="lstService">
                            <li><a href="http://slldt.vn">Sổ liên lạc điện tử</a></li>
                            <li><a href="http://luyenthivip.vn/">Trung tâm luyện thi VIP</a></li>
                            <li><a href="http://baigiangtructuyen.vn">Bài giảng trực tuyến</a></li>
                            <li><a href="http://e-school.vn/">Trường học điện tử</a></li>
                            <li><a href="http://giasutructuyen.info/">Gia sư trực tuyến</a></li>
                        </ul>
                    </div>
                    <div class="fr" style="width:45%">
                    	<h3>Hỗ trợ trực tuyến</h3>
                        <ul class="lstHelp">
                            <li><i class="tel-icon"></i><b>04.2345778</b></li>
                            <li><i class="ym-icon"></i><a href="">Hỗ trợ dịch vụ</a></li>
                            <li><i class="ym-icon"></i><a href="">Hỗ trợ dịch vụ</a></li>
                            <li><i class="ym-icon"></i><a href="">Hỗ trợ dịch vụ</a></li>
                            <li><i class="guide-icon"></i><a href="">Hướng dẫn sử dụng</a></li>
                            <li><i class="contact-icon"></i><a href="">Liên hệ qua Email</a></li>
                        </ul>	
                    </div>	
                </div>
                <div class="fr" style="width:50%">
                	<div class="fl listLink" style="width:35%">
                    	<h3>Liên kết</h3>
                        <ul>
                            <li><a href="">Tại sao bạn nên chọn Vtes?</a></li>
                            <li><a href="">Chúng tôi là ai?</a></li>
                            <li><a href="">Thoả thuận sử dụng</a></li>
                            <li><a href="">Tin tức thông báo</a></li>
                            <li><a href="">Bảo vệ riêng tư</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>	
                    </div>
                    <div class="fr" style="width:50%">
                    	<h3>Bản đồ</h3>
                        <p><img src="pic/maps.png"></p>
                        <p style="margin-bottom:0px"><b>Địa chỉ:</b> Số 6, Lô A1, Tiểu khu Ngọc Khánh, Ngọc Khánh, Ba Đình, Hà Nội.</p>
                        <p><b>Tel:</b>(84-4) 6237-4962 <b>Fax:</b> (84-4) 6237-4948</p>	
                    </div>	
                </div>
				
			</div>
		</div>
		<div class="ftrGd2">
			<div class="main">
				<?php
					$sql1="select * from gws_noidung where id_parent=".get_id('footer')." and kiemduyet=1";
					$sql1.=" order by capnhat desc limit 1";
					$result1=@mysql_query($sql1);	
					$row1=@mysql_fetch_array($result1);
				?>
				<div class="companyName">
					<a href=""><img src="images/footerLogo.png"></a>
					<?php echo $row1['noidung']?>
				</div>
			</div>
		</div>
		<div class="ftrGd3">
			<div class="main">
				<div class="footerlinks">
					<a href="">bếp công nghiệp</a>, <a href="">bếp công nghiệp</a>, <a href="">bếp công nghiệp</a>, <a href="">bếp công nghiệp</a>, <a href="">bếp công nghiệp</a>, <a href="">bếp công nghiệp</a>
				</div>
			</div>
		</div>
    </div>