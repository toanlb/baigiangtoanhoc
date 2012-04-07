<? session_start();  
	session_register('dem1');
?>
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
