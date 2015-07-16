<?php
//shortcuts for socket access
function swrite($mes){socket_write($GLOBALS['client'],$mes);}
function scl(){socket_close($GLOBALS['client']);}
function sread(){return socket_read($GLOBALS['client'], 1024000);}
// end shortcuts
function mstop($input){
	$filename=$GLOBALS['mcloc']."/server.log.lck";
//	$filename=$GLOBALS['mcloc']."/blah";
	if (file_exists($filename)) {mrcon("stop");}
	$stpnum=0;
	while ($stpnum < 6){
		if (file_exists($filename)) {
	        	$stpnum++;
	                $response="here\n";
			echo "mstop: ".$response;
			swrite($response);
			sleep(10);
	        }
	        else {
			$response="gone\n";
			echo "mstop: ".$response;
			$stpnum=50;
		}
	}
	if ($stpnum > 5 && $stpnum < 49){$response="timedout\n";echo "mstop: ".$response;}
	swrite($response);
	if ($input != "open"){scl();}
}
function slog($input){
	$filen=$GLOBALS['mcloc']."/server.log";
        if ($input == "short"){
                $line = `tail -n 10 $filen`;
		echo "slog: short\n";
		$line=str_replace("\n",",:,",$line);
	        swrite($line);
	        scl();
        }
	else{
		$file=fopen($filen, "rb");
		$rtn=fread($file, filesize($filen));
		fclose($file);
		echo "slog: ".$input."\n";
		$rtn=str_replace("\n",",:,",$rtn);
        	swrite($rtn);
	        scl();
	}
	clearstatcache();
}
function wcmd($input){
	$info=explode(",",$input);
	$opt=$info[0];
	$opt2="";
	if (isset($info[1])){$opt2=$info[1];}
	exec("sudo ".EscapeShellArg($GLOBALS['scloc'])."/web.cmd ".EscapeShellArg($opt)." ".EscapeShellArg($opt2),$rtn);
	$rtn=implode("<br>",$rtn);
	echo "wcmd: ".$input.", rtn: ".PREG_REPLACE('#<br\s*?/?>#i', "\n",$rtn)."\n";
	swrite($rtn);
	scl();
}
function dcon($input){
	$rtn=mrcon($input);
	echo "dcon: ".$input.", rtn: ".$rtn."\n";
	$rtn=str_replace("\n","<br>",$rtn);
       	swrite($rtn);
	scl();
}
function update($input){
	$path=$GLOBALS['mcloc']."/update/update.rar";
	$path2=$GLOBALS['mcloc']."/update/update.rar.old";
	if(file_exists($path)){rename($path,$path2);}
	if(!($handle = fopen("http://".$input, "rb"))){
		swrite("Could not retrieve update file!$input");
		scl();
		echo "update: bad url\n";
		return;
	}
	$contents = stream_get_contents($handle);
	fclose($handle);
	$handle = fopen($path, "wb");
	fwrite($handle, $contents);
	fclose($handle);
	$check=exec("sudo ".EscapeShellArg($GLOBALS['scloc'])."/web.cmd upd ".EscapeShellArg($path))."\n";
	if (substr($check,0,3) == "Not"){swrite("File is currupt!");scl();echo "update: file currupt\n";return;}
	//need to call a mstop here...i think we do it with an include.
	mstop("open");
	exec("sudo ".EscapeShellArg($GLOBALS['scloc'])."/web.cmd upd2 ".EscapeShellArg($path),$rar);
	if (trim(end($rar))!="All OK"){swrite("something went wrong<br>".implode("<br>",$rar));}
	else{
		$check=$GLOBALS['mcloc']."/craftbukkit.jar";
		if(!file_exists($check)){
			$mes="Extracted files ok but can't find 'craftbukkit.jar' in ".$GLOBALS['mcloc']."<br>".implode("<br>",$rar);
			swrite($mes);
		}
		else{
			swrite("Update successful. Starting server.\n");
			exec("sudo ".EscapeShellArg($GLOBALS['scloc'])."/web.cmd mstart",$srv);
			swrite($srv[0]."\n");
			swrite(implode("<br>",$rar));
		}
	}
	echo "update: Complete.\n";
	scl();

}
function stime($input){
        $sup = exec('uptime | sed -n -e \'s/^\([^<]*\)user.*/\1/p\'');
        $sup=substr($sup, 13, -4);
        $mcpid = exec('pidof java');
        $mcup = exec('ps -aeo stime,pid | grep '.EscapeShellArg($mcpid));
        $mcup=rtrim($mcup, $mcpid);
	$rtn=$sup."^^".trim($mcup);
	echo "stime: ".$rtn."\n";
	swrite($rtn);
	scl();
}
?>
