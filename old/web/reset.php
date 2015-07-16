<html>
<body text=white>
<?php
require('settings.php');
$member = $_SERVER['PHP_AUTH_USER'];
echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' restarted the MC server. >> access.log');

echo "<font color=green>";
echo exec('sudo '.EscapeShellArg($scloc).'/web.cmd 3');
echo "</font>";
echo "<p>";
echo "Log Output below.<br>";
echo "<font color=red>==========================================================================<br>";
echo "==========================================================================</font><p><p>";
$file = $fdloc."/server.log";
$contents = file($file);
$string = implode($contents);
echo nl2br($string);
echo "<font color=green><p>!!!End of file!!!</font>";
?>

</body></html>
