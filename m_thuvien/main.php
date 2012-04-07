
      <div style="font-size:16px;color:#666666;font-family:Arial, Helvetica, sans-serif">Home&raquo;<?php echo get_name($_GET["page"],$noi); ?></div>
    
			<?php
					  if(isset($_GET["id"]))
					  {
						$id=$_GET["id"];
						require("m_thuvien/n_detail.php");	
					  }	
					  elseif(isset($_GET["code"]))
					  {
						$code=$_GET["code"];
						require("m_thuvien/n_list.php");
					  }
					  elseif(isset($_GET["page"]))
					  {
						$page=$_GET["page"];
						require("m_thuvien/n_list.php");
					  }
					?>
		
			
        