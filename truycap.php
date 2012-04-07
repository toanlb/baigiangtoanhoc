<link href="css/text.css" rel="stylesheet" type="text/css" />

<?php
$truycap = file("counterlog.txt"); 
$dem = $truycap[0];
if(!isset($_SESSION['dem1']))
{
$dem++; 
$_SESSION['dem1']=1;
}
$luu_file = fopen("counterlog.txt", "w"); 
fwrite($luu_file, $dem); 
fclose($luu_file);

?>
<div class="thongke">
<p class="thongke">
S&#7889; l&#432;&#7907;t truy c&#7853;p: <?php echo $dem; ?></p>
</div>