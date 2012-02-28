<form action="insert.php" method="post">
Site: <input type="text" name="site" value="www"><br>
name: <input type="text" name="autur"><br>
mesg: <input type="text" name="tresc"><br>
<input type="Submit">
</form>
<?
$username="root";
$password="sql";
$database="minecraft";

mysql_connect('localhost',$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM blah";
$result=mysql_query($query);

$num=mysql_numrows($result);
echo $num;
$low=$num-16;
mysql_close();

echo "<b><center>Database Output</center></b><br><br>";

$i=$low;
while ($i < $num) {

$first=mysql_result($result,$i,"blah");
//$last=mysql_result($result,$i,"autor");
//$phone=mysql_result($result,$i,"tresc");
//$mobile=mysql_result($result,$i,"czas");

echo "<b>$first $last</b><br>mesg: $phone<br>date: $mobile<br>><hr><br>";

$i++;
}

?>

