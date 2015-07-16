#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
if [ ! -e "$dir/bk.lck" ]
then
touch $dir/bk.lck
screen -S mc -X stuff "say Running backup!$(printf \\r)"
 screen -S mc -X stuff "save-off$(printf \\r)"
if [ -n "$w1" ]; then
	rdiff-backup --force $mcloc/$w1 $bkloc/$w1
fi
if [ -n "$w2" ]; then
	rdiff-backup --force $mcloc/$w2 $bkloc/$w2
fi
if [ -n "$w3" ]; then
	rdiff-backup --force $mcloc/$w3 $bkloc/$w3
fi
if [ -n "$w4" ]; then
	rdiff-backup --force $mcloc/$w4 $bkloc/$w4
fi
if [ -n "$w5" ]; then
	rdiff-backup --force $mcloc/$w5 $bkloc/$w5
fi
if [ -n "$w6" ]; then
	rdiff-backup --force $mcloc/$w6 $bkloc/$w6
fi
if [ -n "$w7" ]; then
	rdiff-backup --force $mcloc/$w7 $bkloc/$w7
fi
if [ -n "$w8" ]; then
	rdiff-backup --force $mcloc/$w8 $bkloc/$w8
fi
if [ -n "$w9" ]; then
	rdiff-backup --force $mcloc/$w9 $bkloc/$w9
fi
rdiff-backup --force --exclude $mcloc/plugins/dynmap/web $mcloc/plugins $bkloc/plugins
screen -S mc -X stuff "save-on$(printf \\r)"

RANGE=10
number=$RANDOM
let "number %= $RANGE"
RANGE=10
number=$RANDOM
let "number %= $RANGE"
if [ $number -eq "1" ]; then
        screen -S mc -X stuff "say Backup is done.  Now screw off twerp!$(printf \\r)"
elif [ $number -eq "2" ]; then
        screen -S mc -X stuff "say Yaya backup is complete fairy.$(printf \\r)"
elif [ $number -eq "3" ]; then
        screen -S mc -X stuff "say Did you know Your mom was my ho?$(printf \\r)say laugh no seriously tho Backup is done.$(printf \\r)"
elif [ $number -eq "4" ]; then
        screen -S mc -X stuff "say Don't worry your precious uber charater is backed up, and your OHH SO MIGHTY stonghold. $(printf \\r)"
elif [ $number -eq "5" ]; then
        screen -S mc -X stuff "say Umm yeah, about that backup...Did you know you can save 10% on car insurance by switching to geiko?$(printf \\r)"
elif [ $number -eq "6" ]; then
        screen -S mc -X stuff "say So I was sitting here copying these worthless files and thought, woulndn't be funny to delete them instead...$(printf \\r)"
	sleep 5
        screen -S mc -X stuff "say Ok backup's deleted!$(printf \\r)"
elif [ $number -eq "7" ]; then
        screen -S mc -X stuff "say Screw that backup, I got better things to do!$(printf \\r)"
elif [ $number -eq "8" ]; then
        screen -S mc -X stuff "say I have canceled the backup, My cycles can be used for better things. Like how to take over the world.$(printf \\r)"

else
        screen -S mc -X stuff "say Backup Complete.$(printf \\r)"
fi
rm $dir/bk.lck
fi
