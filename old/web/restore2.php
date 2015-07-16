<html>
<head>
<title>restore2</title>
</head><body bgcolor=007c9a text=white>
<?PHP
require('settings.php');
$member = $_SERVER['PHP_AUTH_USER'];
echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' step 2 of restore started. >> access.log');
if (isset($_POST['time1'])) {

   $time = $_POST['time'];
        if ($time == "") {
        print ("There is no time set!<p>");
	print ("How far back would you like to restore?");
	echo "<FORM NAME=form1 METHOD=POST ACTION=restore2.php>";
	echo "<INPUT TYPE= TEXT VALUE='' name=time><a href=timef.php>Time Format</a><P>";
	echo "<INPUT TYPE=Submit Name=time1 VALUE='Restore to time'></FORM>";
        }
   else {
        print ("Running a restore back to ".$time.".");
	echo exec('sudo '.EscapeShellArg($scloc).'/web.cmd 7'.' '.EscapeShellArg($member)." ".EscapeShellArg($time));
   }

}
else {
	print ("How back would you like to restore?");
        echo "<FORM NAME=form1 METHOD=POST ACTION=restore2.php>";
        echo "<INPUT TYPE= TEXT VALUE='' name=time><a href=timef.php>Time Format</a><P>";
        echo "<INPUT TYPE=Submit Name=time1 VALUE='Restore to time'></FORM>";

}
?>

</body>
</html>

