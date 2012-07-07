<html> <script language="JavaScript"> <!-- var controlFrame = "";
function scroll_to_end() {
    var frame = document.getElementById('control');
    var doc   = "achat.php";
    alert(doc);
    var node  = doc.getElementsByTagName('body')[0].lastChild;
    var y = parseInt(node.offsetTop, 10);
    frame.scrollTo(0, y);
}
function cleanit() {
        controlFrame.contentWindow.location.replace("clean.php");
}
function dropbox() {
        controlFrame.contentWindow.location.replace("drop.php?start=dropmess");
	setTimeout('dropit()', 500)
}
function dropit() {
        controlFrame.contentWindow.location.replace("drop.php?start=dropit");
}
function netstat() {
        controlFrame.contentWindow.location.replace("stat.php");
}
function mstop() {
	controlFrame.contentWindow.location.replace("mstop.php");
}
function mstart() {
	controlFrame.contentWindow.location.replace("mstart.php");
}
function update() {
	controlFrame.contentWindow.location.replace("update.php");
}
function sstop() {
	controlFrame.contentWindow.location.replace("sstop.php");
}
function restart() {
	controlFrame.contentWindow.location.replace("reset.php");
}
function frestart() {
	controlFrame.contentWindow.location.replace("freset.php");
}
function players() {
        controlFrame.contentWindow.location.replace("players.php");
}
function backup() {
        controlFrame.contentWindow.location.replace("bac.php");
	setTimeout('bac()', 500)
}
function bac() {
        controlFrame.contentWindow.location.replace("backup.php");
}
function restore() {
        controlFrame.contentWindow.location.replace("restore.php");
}
function lglog() {
        controlFrame.contentWindow.location.replace("log.php?shlg=yes");
}
function shlog() {
        controlFrame.contentWindow.location.replace("log.php?shlg=no");
}
function zap() {
        controlFrame.contentWindow.location.replace("zap.php");
}
function addplayer() {
        controlFrame.contentWindow.location.replace("addplayer.php");
}
function test() {
	alert("test");
}
function strt() {
        controlFrame.contentWindow.location.replace("achat.php");
}
function refrsh(){
        setTimeout("logrefr()", 5000);
}
function logrefr() {
        controlFrame.contentWindow.location.replace("log.php?shlg=no");
	refrsh()
}
//--> </script> <body bgcolor=007c9a text=black onLoad="controlFrame =document.getElementById('control');">

<?php
require('sp.php');
require('settings.php');
require('body.php');
require('function.php');
require __DIR__.'/MinecraftRcon.class.php';
$member = $_SERVER['PHP_AUTH_USER'];
if (isset($_POST['conch'])) {
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<table><tr><td>");
        print("<INPUT TYPE = submit style='background-image: url(img/chaton.png); border:none; background-color:Transparent; width:60; height:24' Name=chatp value=''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name=cnsle value=''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscoff.png); border:none; background-color:Transparent; width:62; height:25' Name=miscp value =''>");
        print("</form></td></tr></table><table><tr><td>");
	$words = $_POST['words'];
        if ($words == "") {
		chbody("cc");
		echo "<script language=javascript>setTimeout('shlog()', 500)</script>";
	}
	else {
		echo mrcon("broadcast ".$spc2."b".$member.$spc2."f: ".$words);
		chbody("cc");
		echo "<script language=javascript>setTimeout('shlog()', 500)</script>";
	}
	plyrs();
}
elseif (isset($_POST['achat'])) {
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<table><tr><td>");
        print("<INPUT TYPE = submit style='background-image: url(img/chaton.png); border:none; background-color:Transparent; width:60; height:24' Name=chatp value=''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name=cnsle value=''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscoff.png); border:none; background-color:Transparent; width:62; height:25' Name=miscp value =''>");
        print("</form></td></tr></table><table><tr><td>");
 	$words = $_POST['words'];
        if ($words == "") {
		chbody("ac");
	echo "<script language=javascript>setTimeout('strt()', 500)</script>";
	}
	else {
	        exec('echo '.date('hi').' '.date('mdy').' '.EscapeShellArg($member).': '.EscapeShellArg($words).' >> achat.log');
		chbody("ac");
	echo "<script language=javascript>setTimeout('strt()', 500)</script>";
	}
	plyrs();
}
elseif (isset($_POST['cnsle'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name = chatp value =''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controlon.png); border:none; background-color:Transparent; width:60; height:24' Name=cnsle value =''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscoff.png); border:none; background-color:Transparent; width:62; height:25' Name = miscp value =''>");
        print("</td></tr></table>");
	cnbody();
}
elseif (isset($_POST['miscp'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name=chatp value =''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name = cnsle value =''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscon.png); border:none; background-color:Transparent; width:60; height:24' Name = miscp value =''>");
        print("</td></tr></table>");
	msbody();
}
elseif (isset($_POST['pnkcl'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name=chatp value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name =cnsle value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscon.png); border:none; background-color:Transparent; width:60; height:24' Name = misp value=>");
        print("</td></tr></table>");
        msbody();
	echo "<p>";
	if ($_POST['prsn'] == "default") {
		if ($_POST['plyr'] == "") {
			echo "<script language=javascript>alert('no player choosen')</script>";
		}
		else {
			$player=$_POST['plyr'];
		        echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' added '.EscapeShellArg($player).' to Punk. >> access.log');
			echo mrcon("permissions player setgroup ".$player." default");
		}
	}
	else {
                $player=$_POST['prsn'];
                echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' added '.EscapeShellArg($player).' to Punk. >> access.log');
                        echo mrcon("permissions player setgroup ".$player." default");
	}
}
elseif (isset($_POST['upgrd'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name=chatp value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name =cnsle value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscon.png); border:none; background-color:Transparent; width:60; height:24' Name = misp value=>");
        print("</td></tr></table>");
        msbody();
	echo "<p>";
	if ($_POST['prsn'] == "default") {
		if ($_POST['plyr'] == "") {
			echo "<script language=javascript>alert('no player choosen')</script>";
		}
		else {
	                $player=$_POST['plyr'];
        		echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' added '.EscapeShellArg($player).' to Default. >> access.log');
			echo mrcon("permissions player setgroup ".$player." builder");
		}
	}
	else {
                $player=$_POST['prsn'];
	        echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' added '.EscapeShellArg($player).' to Default. >> access.log');
		echo mrcon("permissions player setgroup ".$player." builder");
	}
}
elseif (isset($_POST['vipcl'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name=chatp value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name =cnsle value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscon.png); border:none; background-color:Transparent; width:60; height:24' Name = misp value=>");
        print("</td></tr></table>");
        msbody();
	echo "<p>";
	if ($_POST['prsn'] == "default") {
		if ($_POST['plyr'] == "") {
			echo "<script language=javascript>alert('no player choosen')</script>";
		}
		else {
			$player=$_POST['plyr'];
		        echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' added '.EscapeShellArg($player).' to VIP. >> access.log');
			echo mrcon("permissions player setgroup ".$player." VIP");
		}
	}
	else {
	        $player=$_POST['prsn'];
		echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' added '.EscapeShellArg($player).' to VIP. >> access.log');
		echo mrcon("permissions player setgroup ".$player." VIP");
	}
}
elseif (isset($_POST['banh'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name=chatp value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name =cnsle value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscon.png); border:none; background-color:Transparent; width:60; height:24' Name = misp value=>");
        print("</td></tr></table>");
        msbody();
	echo "<p>";
        if ($_POST['prsn'] == "default") {
                if ($_POST['plyr'] == "") {
                        echo "<script language=javascript>alert('no player choosen')</script>";
                }
                else {
                        $player=$_POST['plyr'];
                        echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' banned '.EscapeShellArg($player).' >> access.log');
			$ccc="say §2".$player."§f just got the §cBanHammer §fdropped on them!";
			mrcon($ccc);
			echo mrcon("ban ".$player);
                }
        }
        else {
                $player=$_POST['prsn'];
                echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' banned '.EscapeShellArg($player).' >> access.log');
			$ccc="say §2".$player."§f just got the §cBanHammer §fdropped on them!";
			mrcon($ccc);
			echo mrcon("ban ".$player);
	}
}
elseif (isset($_POST['zappy'])) {
        print("<table><tr><td>");
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<INPUT TYPE = Submit style='background-image: url(img/chatoff.png); border:none; background-color:Transparent; width:62; height:25' Name=chatp value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name =cnsle value=>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscon.png); border:none; background-color:Transparent; width:60; height:24' Name = misp value=>");
        print("</td></tr></table>");
        msbody();
	echo "<p>";
	if ($_POST['prsn'] == "default") {
		if ($_POST['plyr'] == "") {
			echo "<script language=javascript>alert('no player choosen')</script>";
		}
		else {
			$player=$_POST['plyr'];
		        echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' is zapping '.EscapeShellArg($player).'! >> access.log');
			echo mrcon("shock ".$player);
		}
	}
	else {
		$player=$_POST['prsn'];
	        echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' is zapping '.EscapeShellArg($player).'! >> access.log');
		echo mrcon("shock ".$player);
	}
}
else
{
        echo exec('echo '.date('hi').' '.date('mdy').' '.EscapeShellArg($member).' logged in. >> access.log');
        print("<FORM NAME =form1 METHOD =POST ACTION = index.php>");
        print("<table><tr><td>");
        print("<INPUT TYPE = submit style='background-image: url(img/chaton.png); border:none; background-color:Transparent; width:60; height:24' Name=chatp value=''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/controloff.png); border:none; background-color:Transparent; width:62; height:25' Name=cnsle value=''>");
        print("<INPUT TYPE = Submit style='background-image: url(img/miscoff.png); border:none; background-color:Transparent; width:62; height:25' Name=miscp value =''>");
        print("</form></td></tr></table><table><tr><td>");
	chbody(ac);
	echo "<script language=javascript>setTimeout('strt()', 500)</script>";
	plyrs();
}
?>

</body></html> <!-- 432,324 | 800,600 -->
