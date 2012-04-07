Home <?php
	if(isset($_GET["code"])) echo getPath(get_id($_GET["code"]),$noi);
	elseif(isset($_GET["store"])) echo getPath(get_id($_GET["store"]),$noi);
	elseif(isset($_GET["page"])) echo getPath(get_id($_GET["page"]),$noi);		  	
?>