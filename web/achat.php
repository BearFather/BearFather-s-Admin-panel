<html>
<body text=green>
<?PHP
require('settings.php');
       $file = $fdloc."/achat.log";
        $contents = file($file);
        $string = implode($contents);
        echo nl2br($string);
?>
</body>
