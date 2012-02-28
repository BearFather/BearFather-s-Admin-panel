#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
if [ ! -e "$dir/sdrop.lck" ]
then
touch $dir/sdrop.lck
TIME=`date +%m%d%g`
cp $mcloc/craftbukkit.jar $dbtloc/
cp $mcloc/server.properties $dbtloc/
cp $mcloc/bukkit.yml $dbtloc/
cp $mcloc/banned-ips.txt $dbtloc/
cp $mcloc/permissions.yml $dbtloc/
cp $mcloc/banned-players.txt $dbtloc/
cp $mcloc/ops.txt $dbtloc/
cp $mcloc/ebean.properties $dbtloc/
cp -r $mcloc/lib/ $dbtloc/
cp $mcloc/blocks.json $dbtloc/
cp -r $bkloc/plugins/ $dbtloc/
rm -r $dbtloc/plugins/rdiff-backup-data
rm -r $dbtloc/plugins/dynmap/web
rar -df -ep1 a $dbtloc/server_${TIME}.rar $dbtloc/*
$dbploc/dropbox.py start
mv $dbtloc/server_${TIME}.rar ~/Dropbox/Minecraft/serverupdates/
rm $dir/sdrop.lck
fi
