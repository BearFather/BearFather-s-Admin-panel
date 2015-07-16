<html><body><?php
require('settings.php');
if (isset($_POST['update'])) {
	$file=$_POST['file'];
	$res=exec("sudo ".EscapeShellArg($scloc)."/web.cmd upd ".EscapeShellArg($file));
	if($res == "Not a valid RAR."){
		echo "<font size=5 color=#cc0000><b>";
		echo $res;
		echo "</font></b>";
	}
	else{
		echo $res;
		echo "<P>Finshed Extracting Update.<p>Restarting server.";
	}
}
else{
	$target_path = "/mnt/drive/mc/bukkit/uploads/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		echo "The file ".  basename( $_FILES['uploadedfile']['name'])." has been uploaded<p>";
		$file=basename( $_FILES['uploadedfile']['name']);
		echo "Do you want to run update process?";
		print("<FORM NAME=upd METHOD=POST ACTION=uploader.php>");
		print("<INPUT TYPE=hidden VALUE=$file name=file>");
		print("<INPUT TYPE=Submit Name=update VALUE='Run Update'>");
	}
	else{
	    echo "There was an error uploading the file, please try again!";
	}
}
?></body></html>
