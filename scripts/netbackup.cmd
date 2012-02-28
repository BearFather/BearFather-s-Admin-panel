#!/bin/bash
if [ ! -e "/mnt/drive/scripts/net.lck" ]
then
touch /mnt/drive/scripts/net.lck
TIME=`date +%m%d%g`
echo Starting copy process...
cp -r /mnt/drive/backup/survival/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/survival/rdiff-backup-data
echo Copied Survival
cp -r /mnt/drive/backup/challenge/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/challenge/rdiff-backup-data
echo Copied Challenge
cp -r /mnt/drive/backup/skyworldc/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/skyworldc/rdiff-backup-data
echo Copied SkyworldC
cp -r /mnt/drive/backup/spawn1/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/spawn1/rdiff-backup-data
echo Copied Spawn1
cp -r /mnt/drive/backup/nether/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/nether/rdiff-backup-data
echo Copied Nether
cp -r /mnt/drive/backup/skyworld/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/skyworld/rdiff-backup-data
echo Copied Skyworld
cp -r /mnt/drive/backup/creative/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/creative/rdiff-backup-data
echo Copied Creative
cp -r /mnt/drive/backup/plugins/ /mnt/drive/dropbox/temp/
rm -r /mnt/drive/dropbox/temp/plugins/rdiff-backup-data
rm -r /mnt/drive/dropbox/temp/plugins/dynmap/tiles
echo Copied plaugins
echo Rarring files...
rar -df -ep1 a /mnt/drive/dropbox/server_${TIME}.rar /mnt/drive/dropbox/temp/*
echo Moving File to backup!
mv /mnt/drive/dropbox/server_${TIME}.rar /mnt/backup/worlds/
rm /mnt/drive/scripts/net.lck
fi
