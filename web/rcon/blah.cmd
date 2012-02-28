value=$(php -f rcon.php)
for str in $value; do
   player=$str
   echo $player
done;
