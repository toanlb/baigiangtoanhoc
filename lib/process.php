<?php
function fitimage($image,$fit) 
{
	$size = @getimagesize($image);
	$w=$size[0];$h=$size[1];  
	if($h>$w) $tg=$h;else $tg=$w;
	if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
	echo "<input type='image' src='$image' height='$h' width='$w' border='0' onClick='viewImage(this)'>";
} 
function fitimagepopup($image,$fit) 
{
	$size = @getimagesize($image);
	$w=$size[0];$h=$size[1];  
	if($h>$w) $tg=$h;else $tg=$w;
	if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
	if($h==0||$w==0)  echo "<img src='$image' border='0'>";
	else echo "<img src='$image' height='$h' width='$w' hspace='0' vspace='0' style='border:4px solid white' align='bottom'>";
}
function fitimageleft($image,$fit) 
{
	$size = @getimagesize($image);
	$w=$size[0];$h=$size[1];  
	if($h>$w) $tg=$h;else $tg=$w;
	if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}
	if($h==0||$w==0)  echo "<img src='$image' border='0'>";
	else echo "<img src='$image' height='$h' width='$w' border='0' align='left'>";
}
function whimage($image,$fit,$wh) 
{
	$size = @getimagesize($image);
	$w=$size[0];$h=$size[1];
	if($h>$w) $tg=$h;else $tg=$w;
	if($tg>$fit) {$h=$h/($tg/$fit);$w=$w/($tg/$fit);}  
	if($wh==0) return $w;
	if($wh==1) return $h;
} 
function chenphay($str)
{
	$s="";
	$dem=0;
	for($i=strlen($str)-1;$i>=0;$i--){			    
	$s=substr($str,$i,1).$s;
	$dem++;
	if($dem==3&&$i>=1){$s=",".$s;$dem=0;}				
	}
	return $s;
}

function chuyenhe($so,$noi)
{
	if($so>=1000000)
	{
	$so=$so/1000000;
	if($noi!="_eng")
	  $str="$so triệu";
	else
	  $str="$so million";
	}
	if($so>=1000)
	{
	$so=$so/1000;
	if($noi!="_eng")
	  $str="$so tỉ";
	else
	  $str="$so billion";
	}
	return $str;
}
function locanh($mystring)
{ 
	$mystring=strstr($mystring,"src=");
	$pos2=strpos($mystring,"width");
	$str=substr($mystring,$pos1,$pos2-$pos1);  
	$str=str_replace("src=","",$str);
	$str=substr($str,1,strlen($str)-3);
	$str=str_replace("/demo/","",$str);  
	$str=str_replace("http://".$_SERVER['HTTP_HOST']."/","",$str);  
	fitimageleft($str,60);
}

function show_images($h,$w,$src,$href,$border)
{
	$size = @getimagesize("$src");
	$w_size=$size[0];$h_size=$size[1];
	if($h_size>0&&$w_size>0)
	{
		if($w_size<$h_size)
		  $w_tg=$w+5;
		else
		  $w_tg=$w_size*$h/$h_size+5;
		return "<div style='position: relative;width:$w;height:$h; overflow: hidden; $border '>
		<a href='$href'>
		<img src='$src' width='$w_tg' border='0' style='position :relative;top:-5;left:-5;'>
		</a>
		</div>";
	}
}
?>
<script language="javascript">
function viewImage(obj)
{
  //window.open("view.php?path="+obj.src,"","height=450,width=450");
  showModalDialog("view.php?path="+obj.src,window, "dialogWidth:450 px;dialogHeight:450 px;help:no;scroll:no;status:no");
}
</script>
