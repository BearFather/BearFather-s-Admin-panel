<html>
<head>
<?php
require('settings.php');
$member=$_SERVER['PHP_AUTH_USER'];
echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' started a Full server restart! >> access.log');

if (isset($_POST['restart'])) {

        print ("<font color=red>Shutting Down the server!</font>");
        echo exec('sudo '.EscapeShellArg($scloc).'/web.cmd 4');

}
else {
   print ("<font color=red> This will cause a full server restart are you sure?");
}
?>

</head>
<body bgcolor=007c9a text=white>

<FORM NAME ="form1" METHOD ="POST" ACTION = "freset.php">

<p>
<INPUT TYPE = "Submit" Name = "restart" VALUE = "Yes Restart">

</FORM></body></html>
