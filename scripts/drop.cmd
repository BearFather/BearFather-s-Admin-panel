#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
if [ ! -e "$dir/drop.lck" ]
then
TIME=`date +%m%d%g`
touch $dir/drop.lck
if [ -n "$w1" ]; then
	cp -r $bkloc/$w1/ $dbtloc/
	rm -r $dbtloc/$w1/rdiff-backup-data
fi
if [ -n "$w2" ]; then
	cp -r $bkloc/$w2/ $dbtloc/
	rm -r $dbtloc/$w2/rdiff-backup-data
fi
if [ -n "$w3" ]; then
	cp -r $bkloc/$w3/ $dbtloc/
	rm -r $dbtloc/$w3/rdiff-backup-data
fi
if [ -n "$w4" ]; then
	cp -r $bkloc/$w4/ $dbtloc/
	rm -r $dbtloc/$w4/rdiff-backup-data
fi
if [ -n "$w5" ]; then
	cp -r $bkloc/$w5/ $dbtloc/
	rm -r $dbtloc/$w5/rdiff-backup-data
fi
if [ -n "$w6" ]; then
	cp -r $bkloc/$w6/ $dbtloc/
	rm -r $dbtloc/$w6/rdiff-backup-data
fi
if [ -n "$w7" ]; then
	cp -r $bkloc/$w7/ $dbtloc/
	rm -r $dbtloc/$w7/rdiff-backup-data
fi
if [ -n "$w8" ]; then
	cp -r $bkloc/$w8/ $dbtloc/
	rm -r $dbtloc/$w8/rdiff-backup-data
fi
if [ -n "$w9" ]; then
	cp -r $bkloc/$w9/ $dbtloc/
	rm -r $dbtloc/$w9/rdiff-backup-data
fi
rar -df -ep1 a $dbtloc/worlds_${TIME}.rar $dbtloc/*
$dbploc/dropbox.py start
rm $dbloc/worlds_*.rar
mv $dbtloc/worlds_${TIME}.rar $dbloc/
rm $dir/drop.lck
fi
