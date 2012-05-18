<?php
function delDir($dirName) {
   if(empty($dirName)) {
       return;
   }
   if(file_exists($dirName)) {
       $dir = dir($dirName);
       while($file = $dir->read()) {
           if($file != '.' && $file != '..') {
               if(is_dir($dirName.$file)) {
			   		echo $dirName.$file;
                   delDir($dirName.$file);
               } else {
			   		echo $dirName."/".$file;
                   unlink($dirName."/".$file);// or die('Tập tin '.$dirName.$file.' không thể xóa!');
               }
           }
       }
       rmdir($dirName.$file);// or die('Thư mục '.$dirName.$file.' không thể xóa!');
   } else {
       echo 'Thư mục "<b>'.$dirName.'</b>" không tồn tại.';
   }
}
	$strPath=$_GET["Path"];
	$strPath=substr($strPath,1,strlen($strPath));
	if(is_file($strPath)) @unlink($strPath);
	else delDir($strPath);
	echo "<script language=\"javascript\">parent.Refresh();</script>";
?>