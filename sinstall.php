<?php
// pulls variables from commandline
$scl=$argv[1];
$bkl=$argv[2];
$mcl=$argv[3];
$ram=$argv[4];
$dbsw=$argv[5];
$dbtl=$argv[6];
$dbl=$argv[7];
$dbpl=$argv[8];
$w1=$argv[9];
if (isset($argv[10])){$w2=$argv[10];}else{$w2="";}
if (isset($argv[11])){$w3=$argv[11];}else{$w3="";}
if (isset($argv[12])){$w4=$argv[12];}else{$w4="";}
if (isset($argv[13])){$w5=$argv[13];}else{$w5="";}
if (isset($argv[14])){$w6=$argv[14];}else{$w6="";}
if (isset($argv[15])){$w7=$argv[15];}else{$w7="";}
if (isset($argv[16])){$w8=$argv[16];}else{$w8="";}
if (isset($argv[17])){$w9=$argv[17];}else{$w9="";}

//opening settings template
$f=file('settings.scr');
//changing the settings
$f[3]='scloc='.$scl;
$f[5]='bkloc='.$bkl;
$f[7]='mcloc='.$mcl;
$f[9]='rmamo='.$ram."M";
$f[13]='dbon='.$dbsw;
$f[15]='dbtloc='.$dbtl;
$f[17]='dbloc='.$dbl;
$f[19]='dbploc='.$dbpl;
$f[24]='w1='.$w1;
$f[25]='w2='.$w2;
$f[26]='w3='.$w3;
$f[27]='w4='.$w4;
$f[28]='w5='.$w5;
$f[29]='w6='.$w6;
$f[30]='w7='.$w7;
$f[31]='w8='.$w8;
$f[32]='w9='.$w9;
$e=array();
foreach ($f as $value){
	$value=trim($value);
	array_push($e,$value);
}
$f=$e;
//writing settings file
$filename = 'settings.web';
$handle = fopen($filename, 'a');
$f2=implode("\n",$f);
fwrite($handle, $f2);
fclose($handle);
//we are done
// call it with:
//php sinstall.php /scripts /backup /server 1023 false none none none world world_nether2
?>
