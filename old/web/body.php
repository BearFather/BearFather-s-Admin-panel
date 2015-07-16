<?php
require('settings.php');
require_once('MinecraftQuery.class.php');

$query = new MinecraftQuery();
try {
        $query->Connect(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);
} catch (MinecraftQueryException $e) {
        $error = $e->getMessage();
}
function chbody($tp) {
        print("<p>");
        print("<FORM NAME=csel METHOD=POST ACTION=index.php>");
        if ($tp == "ac") { print("<INPUT TYPE = Submit Name = achat VALUE ='' style='border:0; DISPLAY: none;';>"); }
        else {  print("<INPUT TYPE = Submit Name = conch VALUE ='' style='border:0; DISPLAY: none;'>"); }
        if ($tp == "cc"){
                echo "<input type=submit value='Change Mode' name=achat style='border:2; background-color:Transparent;'>";
                echo "<table border=1><tr><td width=97 bgcolor=green><center>Console Mode";
        }
        else {
                echo "<input type=submit  value='Change Mode' name=conch style='border:2; background-color:Transparent;'>";
                echo "<table border=1><tr><td width=97 bgcolor=green><center>Admin Mode";
        }
        print("</center></td></tr></table></td></tr></table><table width=710 bgcolor=black border=4 bordercolor=007c9a text=white><tr><td>");
        print("<iframe id=control name=control border=0 width=800 height=250></iframe>");
        print("</td></tr></table>");
        print("<p><table width=710><tr><td><center>");
        print("<FORM NAME =chatform METHOD =POST ACTION = index.php>");
        if ($tp == "cc"){
                print("<input type=button value='Server log' onClick=lglog() />");
		if (isset($_POST['crfrsh'])) {
                        echo "<INPUT TYPE=CHECKBOX NAME=crfrsh VALUE=refresh checked=checked> Refresh Console Chat";
       	                echo "<script language=javascript>refrsh();</script>";
                }
		else {echo "<INPUT TYPE=CHECKBOX NAME=crfrsh VALUE=refresh> Refresh Console Chat";}
        }
        print("<INPUT TYPE=TEXT VALUE='' name=words size=80>");
        if ($tp == "ac") { print("<INPUT TYPE = Submit Name = achat VALUE ='Say it'>"); }
        else {  print("<INPUT TYPE = Submit Name = conch VALUE ='Say it'>"); }
        print("</form></center></td></tr></table>");
        echo "Main server been up for:  <font color=white>";
        $sup = exec('uptime | sed -n -e \'s/^\([^<]*\)user.*/\1/p\'');
        echo substr($sup, 13, -4);
        $mcpid = exec('pidof java');
        print("</font><br>");
        print("Minecraft server been running since:  <font color=white>");
        $mcup = exec('ps -aeo stime,pid | grep '.EscapeShellArg($mcpid));
        echo rtrim($mcup, $mcpid);
        echo "</td></tr></table>";
}

function cnbody() {
        print("<iframe id=control frameborder=0 scrolling=auto name=control border=0 width=800 height=250></iframe>");
        echo "<p><table><tr><td>MineCraft Server:</td><td><input type=button value='Start MC Server' onClick=mstart() />";
        echo "<input type=button value='Restart MC Server' onClick=restart() />";
	echo "<input type=button value='Stop MC Server' onClick=mstop() />";
	echo "<input type=button value=Update onClick=update() /></td></tr><p><tr><td>MineCraft Data:</td><td>";
        echo "<input type=button value=Backup onClick=backup() />";
        echo "<input type=button value=Restore onClick=restore() />";
        echo "<input type=button value=Purge onClick=cleanit() />";
        echo "<input type=button value='DropBox Backup' onClick=dropbox() /></td></tr><p><tr><td>Main System:</td><td>";
	echo "<input type=button value='Shutdown Server' onClick=sstop() />";
        echo "<input type=button value='Force Restart' onClick=frestart() />";
	echo "</td></tr><p><tr><td><input type=button value='Net Stats' onClick=netstat() /></td><td>";
}

function msbody() {
	require_once('MinecraftQuery.class.php');
	$query = new MinecraftQuery();
	try {
	        $query->Connect(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);
	} catch (MinecraftQueryException $e) {
	        $error = $e->getMessage();
	}
        print("<FORM NAME =plform METHOD =POST ACTION = index.php>");
	if ($query->GetPlayers() != ""){
		$players =$query->GetPlayers();
                $count = 0;
                        echo "<select name=prsn> <option value=default>choose a player</option>";
                        foreach ($players as $value) {
				echo "<option value=".$value.">".$value."</option>";
			}
		echo "</select>";
	}
	else{echo "<font color=red><strong>Nobody Online</strong></font>";}
        print("OR <INPUT TYPE=TEXT VALUE='' name=plyr size=40><p>");
	print("<INPUT TYPE=Submit Name=pnkcl VALUE='Demote them'>");
	print("<INPUT TYPE=Submit Name=upgrd VALUE='Make them Builder'>");
	print("<INPUT TYPE=Submit Name=vipcl VALUE='VIP style'>");
	print("<INPUT TYPE=Submit Name=banh VALUE='BanHammer'>");
	print("<INPUT TYPE=Submit Name=zappy VALUE='Zap'>");
	echo "</form>";

}
?>
