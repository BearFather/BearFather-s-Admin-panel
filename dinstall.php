<?php
// pulls variables from commandline
$ps=$argv[1];
$mcl=$argv[2];
$scl=$argv[3];
$fdl=$argv[4];
$ip=$argv[5];
$rpt=$argv[6];
$rps=$argv[7];

//opening settings template
$f=file('settings.dae');
//changing the settings
$f[2]='$psw="'.$ps.'";';
$f[4]='$mcloc="'.$mcl.'";';
$f[6]='$scloc="'.$scl.'";';
$f[8]='$fdloc="'.$fdl.'";';
$f[16]="define('MQ_SERVER_PORTr', ".$rpt." );";
$f[18]="define('MQ_SERVER_PASS', ".$rps." );";
$f[20]="define('MQ_SERVER_ADDR', '".$ip."');";
//writing settings file
$filename = 'settings.php';
$handle = fopen($filename, 'a');
$f2=implode("",$f);
fwrite($handle, $f2);
fclose($handle);
//we are done

// call it with:
//php dinstall.php hello /server /scripts /var/www 192.168.1.12 57767 '!blowme!'
?>
