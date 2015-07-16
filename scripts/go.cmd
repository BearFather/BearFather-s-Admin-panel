#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
if [ ! -e "$mcloc/server.log.lck" ]
then
cd $mcloc
TIME=`date +%m%d.%H%M`
if [ -e "$mcloc/server.log.1" ]
then
more ${mcloc}/server.log.2 ${mcloc}/server.log.3 >> ${mcloc}/server.log
rm server.log.*
fi
mv $mcloc/server.log "${mcloc}/logs/${TIME}.server.log"
sudo screen -d -m -S mc java -server -Xmx$rmamo -Xms$rmamo -jar $mcloc/craftbukkit.jar
else
echo $mcloc/server.log.lck exist.  Server already running?
fi

