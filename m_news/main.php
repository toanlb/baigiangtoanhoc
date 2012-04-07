<div class="left">
 
        
			<?php
					  if(isset($_GET["id"]))
					  {
						$id=$_GET["id"];
						require("m_news/n_detail.php");	
					  }	
					  elseif(isset($_GET["code"]))
					  {
						$code=$_GET["code"];
						require("m_news/n_list.php");
					  }
					  elseif(isset($_GET["page"]))
					  {
						$page=$_GET["page"];
						require("m_news/n_list.php");
					  }
					?>
		
			
</div>