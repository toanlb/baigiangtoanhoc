
          
         
        <div class="box-du-an">
   		  <div class="du-an-top"><h2> Home &raquo; <?php echo get_name($_GET["page"],$noi); ?></h2></div><!--end .du-an-top-->
          <div class="du-an-center">
          		
                <div class="gioi-thieu">
                
                	  <?php
					  if(isset($_GET["id"]))
					  {
						$id=$_GET["id"];
						require("hotrokh/n_detail.php");	
					  }	
					
					  elseif(isset($_GET["page"]))
					  {
						$page=$_GET["page"];
						require("hotrokh/n_list.php");
					  }
					?>
                </div><!--end .gioi-thieu-->
                	
              <div class="clear"></div><!--end .clear-->
          </div><!--end .du-an-center-->          
          <div class="du-an-bottom"></div><!--end .du-an-bottom-->
		</div><!--end .box-du-an-->
          
  