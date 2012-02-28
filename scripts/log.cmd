#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
tmp=$1

cd $mcloc
rm $mcloc/server.tmp
rm $mcloc/server1.tmp
more server.log server.log.1 server.log.2 server.log.3 >> server.tmp
if [ "$tmp" == "no" ]; then
	tail -8 server.tmp >> server1.tmp
else
	cp server.tmp server1.tmp
fi
cp $mcloc/server1.tmp $fdloc/server.log
