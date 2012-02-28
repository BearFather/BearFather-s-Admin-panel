<html> <script language="JavaScript"> <!-- var controlFrame = "";
function restore() {
location.href = "restore2.php" ;
}
//--> </script> <body text=red onLoad="controlFrame =
document.getElementById('control')" bgcolor=black>
<?php
//$member = $_SERVER['PHP_AUTH_USER'];
//echo exec('sudo /mnt/drive/scripts/web.cmd 7'.' '.EscapeShellArg($member));
$member = $_SERVER['PHP_AUTH_USER'];
echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' started restore process. >> access.log');
?>
    <iframe id="control" name="control" border=0 width=1 height=1></iframe>
<p>
<center>Are you sure you want to restore?<p>This will shutdown the server while its restoring.</center>
<p>
<center><input type="button" value="restore" onClick="restore()" /></center>

</html> <!-- 432,324 | 800,600 -->


