
     
      <?php
	  if(!isset($_GET["vt"])) $vt=0;
	  else $vt=intval($_GET["vt"]);
	  
	  $sql="select id_tin,DATE_FORMAT(capnhat,'Cập nhật lúc %H:%i ngày %d/%m/%Y') as hs,DATE_FORMAT(capnhat,'(%d/%m/%Y)') as dt, anhtrichdan,tieude$noi,trichdan$noi,username from gws_tinbai where trim(tieude$noi)<>'' and id_parent=".get_id($_GET["code"])." and kiemduyet=1";
	  $rs_count=@mysql_query($sql);
	  $count=mysql_num_rows($rs_count);
	  $sodong=10;
	  $sotrang=intval($count/($sodong+1));
	  if($sotrang<$count/($sodong+1)) $sotrang=$sotrang+1;
	  $limit=($vt+1)*$sodong;
	  $sql.=" order by capnhat desc limit $limit";
	  
	  //echo $sql;
	  $result=@mysql_query($sql);
	  if(@mysql_num_rows($result)==0)
	  {
		echo "Hiện không có tin nào!";
	  }
	  if(@mysql_num_rows($result)==1)
	  {
		$row=@mysql_fetch_array($result);
		echo "<script language=\"javascript\">
		window.location='"."?".$_SERVER['QUERY_STRING']."&id=".$row["id_tin"]."';
		</script>";
	  }
	  $i=1;  
	  if(@mysql_num_rows($result)!=0) 
	  {
		$bg=$limit-$sodong;
		for($i=0;$i<$bg;$i++) $row=mysql_fetch_array($result);    
		while($row=@mysql_fetch_array($result)){
		$i++;
		$href="?".$_SERVER['QUERY_STRING']."&id=".$row["id_tin"];
	?>
	<?
$iChar = "500"; // Max number of character(s) for cutting
$iOutput = "250"; // Max number of character(s) for the output
if(strlen($row["trichdan$noi"]) > $iChar)
{
    $cOutput = mb_substr($row["trichdan$noi"], 0, $iOutput, "UTF-8");
    while(substr($cOutput, -1) != " ")
    {
        $cOutput = substr($cOutput, 0, strlen($cOutput)-1);
    }
    $cOutput = $cOutput." ...";
}

?>
          	<div class="block-l">
          <div class="mod-l">
            <div class="mod-l-in">
			
              <h3><a href="./?page=luyen-thi-vip&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"><? echo $row["tieude$noi"]?> </a></h3>
              <div class="info-article">
                <div class="info-writer">
                  <ul>
                    <li>Đăng bởi: <? echo $row["username"]?></li>
                    <li><? echo $row["dt"]?></li>
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
              <div class="details">
                <a href="./?page=luyen-thi-vip&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>" class="hold-img"><img src="<? echo $row["anhtrichdan"]?>" width="245" height="175" alt="img" /></a>
                <div> <a href="./?page=luyen-thi-vip&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>"> <? echo $row["trichdan$noi"]?> </a></div>
          <!--end .box-title-->
	
              <a href="./?page=luyen-thi-vip&code=<?php echo get_key($row["id_parent"]);?>&id=<?php echo $row["id_tin"]?>" class="read-more">Chi tiết</a> </div>
            </div>
          </div>
          <div class="mod-l-b"></div>
		  
		  		
	
        </div>
	

           <?php }}?>
	<!--Paging-->
	<?php if(@mysql_num_rows($result)>0) {?>
	<?php $href=str_replace("&vt=$vt","",$_SERVER['QUERY_STRING']);?>&nbsp;
	<?php if($noi!="_eng") echo "Trang:";else echo "Page:";?> <?php for($i=0;$i<$sotrang;$i++){$so=$i+1;?>
			<?php if($vt==$i) echo "<strong>$so</strong>";else{?>
			<a href="?<?php echo $href."&vt=$i";?>" style="color:#BC0000"><?php echo $so;?></a>
			<?php }?>
		<?php }?>
	<?php } ?>
      
