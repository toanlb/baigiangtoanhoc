<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>jQuery lightBox plugin</title>
    
    <link href="css/nf.lightbox.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="js/NFLightBox.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
        var settings = { containerResizeSpeed: 350
            };
            $('#gallery a').lightBox(settings);
        });
    </script>

    <style type="text/css">
        #gallery
        {
           
           
        }
        #gallery ul
        {
            list-style: none;
        }
        #gallery ul li
        {
            display: inline;
        }
        #gallery ul img
        {
            border: 5px solid #3e3e3e;
            border-width: 5px 5px 20px;
        }
        #gallery ul a:hover img
        {
            border: 5px solid #fff;
            border-width: 5px 5px 20px;
            color: #fff;
        }
        #gallery ul a:hover
        {
            color: #fff;
        }
		
		
    </style>
	
	<style type="text/css">
		img, div { behavior: url(js/iepngfix.htc); }
	</style>
	
</head>
<body>
    <div id="gallery" align="center">
        <ul>
            <li><a href="../ited.jpg" title="Add title to show image name or description">
                <img src="../ited.jpg" alt="Bản đồ"  height="519"  title="Bản đồ"/>
            </a></li>
        
          
        </ul>
		 
</div>
<div align="center">
 <a href="http://ited.edu.vn/?page=home" style="font-weight:bold; color:#0066FF; text-decoration:none;"> Quay lại</a></div>
</body>
</html>
