#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
if [ ! -e "$mcloc/server.log.lck" ]
then
cd $mcloc
TIME=`date +%m%d.%H%M`
more ${mcloc}/server.log.1 ${mcloc}/server.log.2 ${mcloc}/server.log.3 >> ${mcloc}/server.log
mv server.log "${mcloc}/logs/${TIME}.server.log"
rm server.log.*
sudo screen -d -m -S mc java -server -Xmx$rmamo -Xms$rmamo -jar $mcloc/craftbukkit.jar
else
echo $mcloc/server.log.lck exist.  Server already running?
fi
