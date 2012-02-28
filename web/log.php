<body text=#48CCCD bgcolor=black>
<?php
require('settings.php');
$lgsh = $_GET['shlg'];
echo exec('sudo '.EscapeShellArg($scloc).'/log.cmd '.EscapeShellArg($lgsh)." ".EscapeShellArg($scloc));
$file = $fdloc."/server.log";
$contents = file($file);
$string = implode($contents);
echo nl2br($string);
?>
</body>
