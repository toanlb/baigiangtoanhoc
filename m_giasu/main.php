
		<div class="left">
   <div style="font-size:16px;color:#666666;font-family:Arial, Helvetica, sans-serif">Home&raquo;<?php echo get_name($_GET["page"],$noi); ?></div><div class="block-l">
          <div class="mod-l">	
        
		
		  <?php
					  if(isset($_GET["id"]))
					  {
						$id=$_GET["id"];
						require("m_giasu/n_detail.php");	
					  }	
					  elseif(isset($_GET["code"]))
					  {
						$code=$_GET["code"];
						require("m_giasu/n_list.php");
					  }
					  elseif(isset($_GET["page"]))
					  {
						$page=$_GET["page"];
						require("m_giasu/n_list.php");
					  }
					?>
       
          
     </div></div></div>