 <div class="mod-l-in">
 <?php
	  $sql="select capnhat,DATE_FORMAT(capnhat,'%d-%m-%Y') as hs, tieude$noi,anhtrichdan, noidung$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_tin=$id";
	  $result=@mysql_query($sql);
	  if(@mysql_num_rows($result)!=0){
		$row=@mysql_fetch_array($result);
		$datetime=$row["capnhat"];
	?>
              <h3><a href="#"><?php echo $row["tieude$noi"];?>
 </a></h3>
              <div class="info-article">
                <div class="info-writer">
                  <ul>
                    <li>Đăng bởi: <? echo $row["username"]?></li>
                    <li><?php echo $row["hs"];?></li>
                    <li><script type='text/javascript'>
//<![CDATA[
function setC(visitors<?php echo $row["id_tin"]?>, value){
var expireDate=new Date (2099, 12, 31);
document.cookie = visitors<?php echo $row["id_tin"]?> + "=" + escape(value) + ((expireDate == null) ? "" : ("; expires=" +
expireDate.toGMTString())) }
function readC(visitors<?php echo $row["id_tin"]?>){
var search = visitors<?php echo $row["id_tin"]?> + "=";
var i, j;
if (document.cookie.length > 0) {
i = document.cookie.indexOf(search);
if (i != -1) {
i += search.length;
j = document.cookie.indexOf(";", i);
if (j == -1) j = document.cookie.length;
return unescape(document.cookie.substring(i,j));
} } }
var num;
num=readC("visitors<?php echo $row["id_tin"]?>");
if (!num) num=0;
num++;
setC("visitors<?php echo $row["id_tin"]?>", num);
document.write("Lượt xem: "+num+" ");

//]]>
</script></li>
                  </ul>
                </div>
                <div class="tool-pag">
                  <ul>
                    <li><a href="#" class="email"><span>Email</span></a></li>
                    <li><a href="#" class="print"><span>Print</span></a></li>
                    <li><a href="#" class="pdf"><span>Pdf</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="details-in">



		
		<?php echo $row["noidung$noi"];?><br />
	<span  style="font-family:Arial, Helvetica, sans-serif; text-decoration:none; color:#666666;">Cập nhật ngày <?php echo $row["hs"];?></span><br /><a href="javascript:history.go(-1);" style="font-weight:bold; text-decoration:underline; color:black; padding-right:10px; float:right;">Quay lại</a>
	
	</div>
	
	<?php }else{?>
	<script language="javascript">
	window.location="?page=home<?php echo $duoi;?>";
	</script>
	<?php }?>
	</div>