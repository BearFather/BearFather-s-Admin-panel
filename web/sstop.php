<html><body>
<?php
require('settings.php');
if (isset($_POST['sstop'])) {
$res="faked";
//        $res=exec("sudo ".EscapeShellArg($scloc)."/web.cmd sstop");
        echo "<font size=5 color=#cc0000><b>";
        echo $res;
        echo "<P>Main server has been shutdown!</br>  It's not coming back.</font></b>";
}
else{
                echo "<font size=5 color=#cc0000><b>Do you REALLY want to stop the MAIN Server?</br>There is no way to recover!</br>You will have to hit the power button!<p></font>";
                print("<FORM NAME=stop METHOD=POST ACTION=sstop.php>");
                print("<INPUT TYPE=Submit Name='sstop' VALUE='Stop Server'>");
}
?></body></html>

