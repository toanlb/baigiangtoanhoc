	<?php
					  if(isset($_GET["id"]))
					  {
						$id=$_GET["id"];
						require("m_tracuudiemthi/tk.php");	
					  }	
					   elseif(isset($_GET["id1"]))
					  {
						$id1=$_GET["id1"];
						require("m_tracuudiemthi/diem-thi2.php");
					  }
					  elseif(isset($_GET["code"]))
					  {
						$code=$_GET["code"];
						require("m_tracuudiemthi/result");
					  }
					  elseif(isset($_GET["page"]))
					  {
						$page=$_GET["page"];
						require("m_tracuudiemthi/diem-thi2.php");
					  }
					?>
		
			
        