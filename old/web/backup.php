<body text=white>
<?php
require('settings.php');
$member = $_SERVER['PHP_AUTH_USER'];
echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' ran a backup. >> access.log');
$member = $_SERVER['PHP_AUTH_USER'];
echo exec('sudo '.EscapeShellArg($scloc).'/web.cmd 6'.' '.EscapeShellArg($member));
?>
</body>
