<?php @session_start();?>
<meta name="robots" content="noindex, nofollow">
<link href="css/admin.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body {
	background-color: #5e8ea6;
}
-->
</style><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td colspan="3">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
	<td height="20" align="right"><table border="0" cellpadding="0" cellspacing="0">
      <tr align="left">
        <td align="right"><table border="0" cellpadding="0" cellspacing="0" id="tinnhan">
          <tr>
            <td align="center" class="user" style="padding:0 5 0 5"><!--Tin nhắn mới <font color="#FFCC00"><b>(<span id="tinnhanmoi"><?php //echo $sl_thumoi;?></span>)</b></font>--></td>
            <td class="lines" width="1" height="20"><img src="images/space.gif" alt="" width="1" height="1"></td>			
          </tr>
        </table>
          <td align="right"><table border="0" cellpadding="0" cellspacing="0" id="taikhoan">
            <tr>
              <td style="padding:0 5 0 5">T&#224;i kho&#7843;n c&#7911;a b&#7841;n:</td>
              <td onClick="parent.mainFrame.basefrm.location='quantritaikhoan/doitaikhoan.php?user=<?php echo $_SESSION["username"];?>';" style="padding-right:5"><b><a href="#"><font color="#FFCC00"><?php echo $_SESSION["username"];?></font></a></b></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
      </tr>
      <tr valign="top">
	<td class="lines" height="2"><img src="images/space.gif" alt="" width="1" height="2"></td>
      </tr>
      <tr valign="middle">
	<td height="26" align="right"><table border="0" cellpadding="0" cellspacing="0" id="version">
      <tr>
        <td class="lines" width="1"><img src="images/space.gif" width="1" height="20"></td>
        <td width="300" align="center" class="welcome">&copy;2005 <font color="#FFCC00"><b>W3Soft</b></font> Development Team</td>
      </tr>
    </table></td>
      </tr>
      <tr valign="top">
	<td class="lines" height="1"><img src="images/space.gif" alt="" width="1" height="1"></td>
      </tr>
    </table>
  </td>	
</tr>
</table>