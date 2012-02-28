<?php
require __DIR__.'/MinecraftRcon.class.php';
require __DIR__.'/sp.php';

if (isset($_POST['rcon'])) {
	$cmdr=$_POST['cmd'];
	$Data=mrcon($cmdr);
	$blah=explode($spc."e", $Data);
        foreach ($blah as $value){echo $value."<br>";}
  	echo "<font color=red>What command do you want?";
        echo "<FORM NAME=form METHOD=POST ACTION=rcon.php>";
        echo "<INPUT TYPE= TEXT VALUE='' name=cmd><P>";
        echo "<INPUT TYPE=Submit Name=rcon VALUE='Run it!'></FORM></font>";
}
else {
	echo "<font color=red>What command do you want?";
        echo "<FORM NAME=form METHOD=POST ACTION=rcon.php>";
        echo "<INPUT TYPE= TEXT VALUE='' name=cmd><P>";
        echo "<INPUT TYPE=Submit Name=rcon VALUE='Run it!'></FORM></font>";
}
?>
