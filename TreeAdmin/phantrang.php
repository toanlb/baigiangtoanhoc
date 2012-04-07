<?php
$sotrang=intval(mysql_num_rows($resultcount)/($sodong+1));
if($sotrang<mysql_num_rows($resultcount)/($sodong+1)) $sotrang=$sotrang+1;
?>
Trang: 
<select name="pagenum" class="TextBox" onChange="frmSubmit.action+='&vt='+this.value;frmSubmit.submit();">
	<?php for($i=1;$i<=$sotrang;$i++){?>
	<option value="<?php echo ($i-1)*($sodong+1);?>" <?php if(isset($_GET["vt"])) $tg=$_GET["vt"];else $tg=0;if($tg==($i-1)*($sodong+1)) echo "selected";?>>
	<?php if($i<10) echo "0".$i;else echo $i;?>
	</option>
	<?php }?>
</select>
trong tổng số <font color="#FF0000"><b><?php echo $sotrang;?></b></font> trang