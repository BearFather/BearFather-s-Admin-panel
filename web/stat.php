<html>
<body text=white>
<?php
require('settings.php');
$member = $_SERVER['PHP_AUTH_USER'];

echo "<font color=purple>";
exec('vnstat'.$furl, $scanme);
$scanme = implode("<br>",$scanme);
echo $scanme;
echo "</font>";
echo "<p>";
?>

</body></html>
