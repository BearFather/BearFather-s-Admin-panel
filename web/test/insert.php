<?php
require('sp.php');
$user="root";
$password="sql";
$database="minecraft";
$host="localhost";
mysql_connect($host,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$site=$_POST['site'];
$autur=$_POST['autur'];
//$autur=$spc."c".$autur.$spc."f";
$tresc=$_POST['tresc'];
$czas="2012-01-18 07:45:12";
$query = "INSERT INTO blah VALUES ('','$site')";
//,'$autur','$tresc','$czas')";

$result=mysql_query($query);
mysql_close();
echo "results: ".$result;




?>

