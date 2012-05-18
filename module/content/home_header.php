<div class="wrapper_slide">
  <div class="container">
    <div class="grid-10">
      <ul id="menu">
        <li><a href="?page=home" class="home">trang chu</a></li>
        <li><a href="?page=gioi-thieu">giôùi thieäu</a></li>
        <li><a href="?page=bai-giang-toan-hoc">baøi giaûng toaùn hoïc</a> </li>
        <li><a href="?page=ngan-hang-de-thi" class="have_sub">ngaân haøng ñeà thi</a>
          <ul class="sub">
            <li><a href="#">Ñeà thi ñaïi hoïc</a></li>
            <li><a href="#">Ñeà thi ñaïi hoïc</a></li>
            <li><a href="#">Ñeà thi keát thuùc hoïc phaàn</a></li>
            <li><a href="#">Ñeà thi keát thuùc hoïc phaàn</a></li>
          </ul>
        </li>
        <li><a href="?page=kinh-nghiem-hoc-toan">kinh nghieäm hoïc toaùn</a></li>
        <li><a href="?page=lien-he-gui-bai">lieân heä göûi baøi</a></li>
        <li class="search"> <span>search</span> 
        	<div class="form_search">
            	<form>
                	<div><input type="text" class="txt_search" /></div>
                  <div><input type="submit" class="sbm_search" value="tim kiem" />
                    </div>
                </form>
            </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="grid-10">
      <h1 id="logo"><a href="#">tai lieu toan hoc</a></h1>
      <div class="options"><a href="#" class="sign_up">đăng ký</a><a href="#" class="login">đăng nhâp</a></div>
    </div>
  </div>
  <div class="container">
    <div class="grid-10">
      <div class="head_line">
        <h3><a href="#">Fusce euismod consequat ante. Lorem ipsum dolor sit amet,</a> </h3>
        <p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, conse nctetuer adipiscing elit. Pellen tesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla </p>
        <a href="#" class="read_more_line">Xem thêm</a> </div>
      <div class="hold_slide">
        <div class="slide">
        	<?php 
				$sql_qc="select * from gws_logo where id_parent=".get_id('quang-cao-top')." and kiemduyet=1";
				$sql_qc.=" order by capnhat desc";  
				$result_qc = mysql_query($sql_qc);
				while($row_qc = @mysql_fetch_array($result_qc)){
					echo "<a href='".$row_qc['lienket']."'><img src= ".$row_qc['logo']." width='570' height='290' alt='img' ></a>";
				}	
        	?>
        </div>
      </div>
    </div>
  </div>
</div>