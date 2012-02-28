<?php


$username="root";
$password="sql";
$database="chatMC3";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM chat3";
$result=mysql_query($query);

$num=mysql_numrows($result);
echo $num;
$num=$num-100;


$i=0;
while ($i < $num) {
$query1 = "DELETE FROM chat3 WHERE id=".$i;
	$results=mysql_query($query1);
	$i++;
}
$query="SELECT * FROM chat3";
$result=mysql_query($query);

$num=mysql_numrows($result);
mysql_close();
echo "<br>".$results."<br>";
echo $num;
?>
