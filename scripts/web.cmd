#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
opt=$1
admin=$2
case "$opt" in
 "stat" )
  vnstat
 ;;
 "1" )
  $scloc/drop.cmd
 ;;
 "2" )
  $scloc/cleanup.cmd $admin
 ;;
 "6" )
#done
 sudo $scloc/backup.cmd
 echo "BackUp Complete"
 ;;
 "7" )
#done
  cd $mcloc
  sudo $scloc/restore.cmd $admin
  $scloc/go.cmd
  echo Restore complete
;;
 "shutd" )
  sudo shutdown $admin now
 ;;
"upd2" )
#done
  file=$2
  rm $mcloc/craftbukkit.jar
  rm -r $mcloc/plugins
  unrar x -y $file $mcloc/
;;
 "upd" )
#done
  file=$2
  vfil=`unrar t $file|grep 'All OK'`
  if [ "$vfil" == "All OK" ]; then
        echo $vfil
  else
        echo "Not a valid RAR."
  fi
 ;;
 "mstart" )
  $scloc/go.cmd
 ;;
 "rmmcflag" )
  rm $mcloc/server.log.lck
 ;;
  * )
 echo "No option was sent!"
 ;;

esac
