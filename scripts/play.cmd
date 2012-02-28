#!/bin/bash
value=$(php -f /mnt/drive/scripts/workfiles/gplay.php)
count=0
for str in $value; do
   let count=count+1
   export player$count=$str
done;
let RANGE=$count+1
number=$RANDOM
let "number %= $RANGE"
if [ $number -eq "1" ]; then
        screen -S mc -X stuff "say $player1 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player1$(printf \\r)"
elif [ $number -eq "2" ]; then
        screen -S mc -X stuff "say $player2 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player2$(printf \\r)"
elif [ $number -eq "3" ]; then
        screen -S mc -X stuff "say $player3 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player3$(printf \\r)"
elif [ $number -eq "4" ]; then
        screen -S mc -X stuff "say $player4 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player4$(printf \\r)"
elif [ $number -eq "5" ]; then
        screen -S mc -X stuff "say $player5 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player5$(printf \\r)"
elif [ $number -eq "6" ]; then
        screen -S mc -X stuff "say $player6 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player6$(printf \\r)"
elif [ $number -eq "7" ]; then
        screen -S mc -X stuff "say $player7 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player7$(printf \\r)"
elif [ $number -eq "8" ]; then
        screen -S mc -X stuff "say $player8 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player8$(printf \\r)"
elif [ $number -eq "9" ]; then
        screen -S mc -X stuff "say $player9 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player9$(printf \\r)"
elif [ $number -eq "10" ]; then
        screen -S mc -X stuff "say $player10 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player10$(printf \\r)"
elif [ $number -eq "11" ]; then
        screen -S mc -X stuff "say $player11 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player11$(printf \\r)"
elif [ $number -eq "12" ]; then
        screen -S mc -X stuff "say $player12 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player12$(printf \\r)"
elif [ $number -eq "13" ]; then
        screen -S mc -X stuff "say $player13 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player13$(printf \\r)"
elif [ $number -eq "14" ]; then
        screen -S mc -X stuff "say $player14 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player14$(printf \\r)"
elif [ $number -eq "15" ]; then
        screen -S mc -X stuff "say $player15 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player15$(printf \\r)"
elif [ $number -eq "16" ]; then
        screen -S mc -X stuff "say $player16 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player16$(printf \\r)"
elif [ $number -eq "17" ]; then
        screen -S mc -X stuff "say $player17 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player17$(printf \\r)"
elif [ $number -eq "18" ]; then
        screen -S mc -X stuff "say $player18 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player18$(printf \\r)"
elif [ $number -eq "19" ]; then
        screen -S mc -X stuff "say $player19 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player19$(printf \\r)"
elif [ $number -eq "20" ]; then
        screen -S mc -X stuff "say $player20 has been chosen!$(printf \\r)"
	sleep 2
        screen -S mc -X stuff "shock -a $player20$(printf \\r)"
else
        screen -S mc -X stuff "say I have choosen to spare you puny beings this time!$(printf \\r)"
fi


