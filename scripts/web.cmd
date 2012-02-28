#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
opt=$1
admin=$2
rtime=$3
clss=$4
words=$*
words=${words:2}
case "$opt" in
 "1" )
  $scloc/drop.cmd
 ;;
 "2" )
  $scloc/cleanup.cmd $admin
 ;;
 "3" )
  $scloc/mstop.cmd
  sleep 30
  $scloc/go.cmd
  sleep 30
  cp $mcloc/server.log $fdloc/server.log
  echo Server restarted.
 ;;
 "4" )
  sudo shutdown -r now
 ;;
 "5" )
  sudo screen -S mc -X stuff "broadcast $admin just logged into chat$(printf \\r)"
 ;;
 "6" )
  sudo screen -S mc -X stuff "say $admin is wanting todo a backup, demanding huh...fine!$(printf \\r)"
  sudo $scloc/backup.cmd
  echo Backup Complete
 ;;
 "7" )
  sudo screen -S mc -X stuff "say $admin is wanting todo a restore,that's alot of work. $(printf \\r)"
  sudo screen -S mc -X stuff "say He want's to restore $rtime , what a bitch.  So server going down!$(printf \\r)"
  sleep 5
  $scloc/mstop.cmd
  sleep 20
  cd $mcloc
  sudo $scloc/restore.cmd $rtime
  $scloc/go.cmd
  sleep 30
  sudo cp $mcloc/server.log $fdloc/server.log
  echo Restore complete
 ;;
 "upd" )
  file=$2
  vfil=`unrar t $mcloc/uploads/$file|grep 'All OK'`
  if [ "$vfil" == "All OK" ]; then
        $scloc/mstop.cmd
        rm $mcloc/craftbukkit.jar
        rm -r $mcloc/plugins
        unrar x $mcloc/uploads/$file $mcloc/
        $scloc/go.cmd
        rm $mcloc/uploads/update.rar.2
        mv $mcloc/uploads/update.rar.1 $mcloc/uploads/update.rar.2
        mv $mcloc/uploads/$file $mcloc/uploads/update.rar.1
  else
        echo "Not a valid RAR."
        sudo rm $mcloc/uploads/$file
  fi
 ;;
 "mstop" )
  $scloc/mstop.cmd
 ;;
 "mstart" )
  $scloc/go.cmd
  sleep 30
  cp $mcloc/server.log $fdloc/server.log
  echo Server restarted.
 ;;
 "sstop" )
  $scloc/seeya.cmd
 ;;
  * )
 echo "No option was sent!"
 ;;

esac
