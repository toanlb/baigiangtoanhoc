<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?


$st=strtolower($st); $chuoikodau=ham_loc_dau($st);
 $sql="SELECT * FROM table WHERE LCASE(field) LIKE '%$st%' OR field LIKE '%chuoikodau%'";



function ham_loc_dau($st)
{ $codau=array("�","�","?","?","�","�","?","?","?","?","?","a", "?","?","?","?","?","�","�","?","?","?","�","?" ,"?","?","?","?", "�","�","?","?","i", "�","�","?","?","�","�","?","?","?","?","?","o" ,"?","?","?","?","?", "�","�","?","?","u","u","?","?","?","?","?", "?","�","?","?","?", "d", "�","�","?","?","�","�","?","?","?","?","?","A" ,"?","?","?","?","?", "�","�","?","?","?","�","?","?","?","?","?", "�","�","?","?","I", "�","�","?","?","�","�","?","?","?","?","?","O" ,"?","?","?","?","?", "�","�","?","?","U","U","?","?","?","?","?", "?","�","?","?","?", "�"," ");  
$khongdau=array("a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a", "e","e","e","e","e","e","e","e","e","e","e", "i","i","i","i","i", "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o", "u","u","u","u","u","u","u","u","u","u","u", "y","y","y","y","y", "d", "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A", "E","E","E","E","E","E","E","E","E","E","E", "I","I","I","I","I", "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O", "U","U","U","U","U","U","U","U","U","U","U", "Y","Y","Y","Y","Y", "D","_"); 
return str_replace($codau,$khongdau,$st); }


?>
</body>
</html>
