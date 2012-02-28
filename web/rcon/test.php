You can look up a player's play time since the start of the new years.<br>

<?php
require __DIR__.'/MinecraftRcon.class.php';
require 'sp.php';
if (isset($_POST['rcon'])) {
	$nmer=$_POST['nme'];
	$cmdr="pstats playtime ".$nmer;
	$Data=mrcon($cmdr);
	$blah=explode($spc, $Data);
	foreach ($blah as $value) {
		$value=substr($value, 1);
		if (is_numeric($value)) {
			echo $value."<br>";
		}
	}


}
  	echo "<font color=red>What Player do you want to look up??";
        echo "<FORM NAME=form METHOD=POST ACTION=test.php>";
        echo "<INPUT TYPE= TEXT VALUE='' name=nme><P>";
        echo "<INPUT TYPE=Submit Name=rcon VALUE='Run it!'></FORM></font>";

?>

