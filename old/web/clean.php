<html>
<head>
</head>
<body bgcolor=007c9a text=white>
<?php
require('settings.php');
$member=$_SERVER['PHP_AUTH_USER'];
echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' started a purge >> access.log');

if (isset($_POST['cleanup'])) {
   $ctime=$_POST['time'];
   if ($ctime != ""){
	exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' did a purge of '.EscapeShellArg($ctime).' >> access.log');
        print ("<font color=purple>Running Cleanup...<br>");
        exec('sudo '.EscapeShellArg($scloc).'/web.cmd 2 '.$ctime, $scanme);
	$scanme = implode("<br>",$scanme);
	echo $scanme;
  }
  else {
   print ("<font color=purple>You must enter a time!<br></font>");
   print ("<font color=white>This will erase all map data before the time set.<br>There is no undo ");
   print ("<br><br><br><FORM NAME='form1' METHOD='POST' ACTION='clean.php'>");
   print ("<input type='text' name='time' value=''><a href=timef.php>Time Format</a>");
   print ("<p><INPUT TYPE='Submit' Name='cleanup' VALUE='Clean it up!'></FORM>");
   print ("<br><br><font color=red><b>This will take a awhile.  Only press once");

  }

}
else {
   print ("<font color=white>This will erase all map data before the time set.<br>There is no undo ");
   print ("<br><br><br><FORM NAME='form1' METHOD='POST' ACTION='clean.php'>");
   print ("<input type='text' name='time' value=''><a href=timef.php>Time Format</a>");
   print ("<p><INPUT TYPE='Submit' Name='cleanup' VALUE='Clean it up!'></FORM>");
   print ("<br><font color=red><b>This will take a awhile.  Only press once");
}
?>
</body></html>
