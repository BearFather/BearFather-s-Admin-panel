<html><body>
<?php
require('settings.php');
if (isset($_POST['stop'])) {
        $res=exec("sudo ".EscapeShellArg($scloc)."/web.cmd mstop");
        echo "<font size=5 color=#cc0000><b>";
        echo $res;
        echo "Server has been stopped.</font></b>";
}
else{
                echo "Do you REALLY want to stop the MC Server?";
                print("<FORM NAME=stop METHOD=POST ACTION=mstop.php>");
                print("<INPUT TYPE=Submit Name='stop' VALUE='Stop Server'>");
}
?></body></html>

