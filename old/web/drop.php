<body text=white>
<?php
$sdrop=$_GET["start"];
if ($sdrop=="dropmess"){
	echo "We are running drop backup.</br>It will run for awhile you may leave the page.</br>Or wait for results.";
}
else{
	require('settings.php');
	require('sp.php');
	$member = $_SERVER['PHP_AUTH_USER'];
	echo exec('echo '.date(hi).' '.date(mdy).' '.EscapeShellArg($member).' ran a DropBox backup. >> access.log');
	$member = $_SERVER['PHP_AUTH_USER'];
	exec('sudo '.EscapeShellArg($scloc).'/web.cmd 1'.' '.EscapeShellArg($member).$furl, $scanme);
	$scanme = implode("<br>",$scanme);
	$scanme=explode($spc3, $scanme);
        foreach ($scanme as $value){
                echo $value."&nbsp;";
        }
}
?>
</body>
