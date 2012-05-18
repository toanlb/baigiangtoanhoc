    <div class="block_right">
    	<div class="list_news">
        	<h3><a href="#">tin tuc giao duc</a></h3>
            <ul>
			
           <?php 
				$sql="select id_tin,anhtrichdan,trichdan from gws_tinbai where  id_parent=12";
				$sql.=" order by capnhat desc ";
				$result=@mysql_query($sql);	
				while($row=@mysql_fetch_array($result)){ 
					?>
						<li>
							<a href="?page=tin-tuc-giao-duc&id=<?php echo $row['id_tin']?>" class="img_news"> <img src="<?php echo $row['anhtrichdan'];?>" width="80" height="60" alt="img" /></a>				
							<p><?php echo $row['trichdan'];?></p>
							<a href="?page=tin-tuc-giao-duc&id=<?php echo $row['id_tin']?>" class="readmore_news">chi tiet</a>
						</li>
					<?php
				}
			?>
			
            	<li>
                	<a href="#" class="img_news"><img src="images/no-img.jpg" width="80" height="60" alt="img" /></a>
                    <p>Ut dignissim aliquet nibh tristique hendrerit. Donec ullamcU</p>
                    <a href="#" class="readmore_news">chi tiet</a>
                </li>
                <li>
                	<a href="#" class="img_news"><img src="images/no-img.jpg" width="80" height="60" alt="img" /></a>
                    <p>Ut dignissim aliquet nibh tristique hendrerit. Donec ullamcU</p>
                    <a href="#" class="readmore_news">chi tiet</a>
                </li>
                <li>
                	<a href="#" class="img_news"><img src="images/no-img.jpg" width="80" height="60" alt="img" /></a>
                    <p>Ut dignissim aliquet nibh tristique hendrerit. Donec ullamcU</p>
                    <a href="#" class="readmore_news">chi tiet</a>
                </li>
                <li>
                	<a href="#" class="img_news"><img src="images/no-img.jpg" width="80" height="60" alt="img" /></a>
                    <p>Ut dignissim aliquet nibh tristique hendrerit. Donec ullamcU</p>
                    <a href="#" class="readmore_news">chi tiet</a>
                </li>
            </ul>
        </div>
        <div class="tags">
        	<h3>tim kiem nhanh</h3>
            <ul>
            	<li><a href="#" id="a1">Ut</a></li>
                <li><a href="#" id="a2">dignissim</a></li>
                <li><a href="#" id="a3">aliquet</a></li>
                <li><a href="#" id="a1">nibh t </a></li>
                <li><a href="#" id="a5">hendrerit</a></li>
                <li><a href="#" id="a4">Donec ullamc</a></li>
                <li><a href="#" id="a1">t dignis</a></li>
                <li><a href="#" id="a3">sim aliqu</a></li>
                <li><a href="#" id="a1">et nibh tristique</a></li>
                <li><a href="#" id="a3">hendrerit.</a></li>
                <li><a href="#" id="a2">Donec ullam</a></li>
                <li><a href="#" id="a1">Ut</a></li>
                <li><a href="#" id="a2">dignissim</a></li>
                <li><a href="#" id="a3">aliquet</a></li>
                <li><a href="#" id="a1">nibh t </a></li>
                <li><a href="#" id="a5">hendrerit</a></li>
                <li><a href="#" id="a4">Donec ullamc</a></li>
                <li><a href="#" id="a1">t dignis</a></li>
                
            </ul>
        </div>
    </div>