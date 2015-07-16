#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
time=$1
source $dir/settings.web
if [ -n "$w1" ]; then
echo Cleaning world $w1
rdiff-backup --force --remove-older-than $time $bkloc/$w1
fi
if [ -n "$w2" ]; then
echo Cleaning world $w2
rdiff-backup --force --remove-older-than $time $bkloc/$w2
fi
if [ -n "$w3" ]; then
echo Cleaning world $w3
rdiff-backup --force --remove-older-than $time $bkloc/$w3
fi
if [ -n "$w4" ]; then
echo Cleaning world $w4
rdiff-backup --force --remove-older-than $time $bkloc/$w4
fi
if [ -n "$w5" ]; then
echo Cleaning world $w5
rdiff-backup --force --remove-older-than $time $bkloc/$w5
fi
if [ -n "$w6" ]; then
echo Cleaning world $w6
rdiff-backup --force --remove-older-than $time $bkloc/$w6
fi
if [ -n "$w7" ]; then
echo Cleaning world $w7
rdiff-backup --force --remove-older-than $time $bkloc/$w7
fi
if [ -n "$w8" ]; then
echo Cleaning world $w8
rdiff-backup --force --remove-older-than $time $bkloc/$w8
fi
if [ -n "$w9" ]; then
echo Cleaning world $w9
rdiff-backup --force --remove-older-than $time $bkloc/$w9
fi
echo Cleaning plugins
rdiff-backup --force --remove-older-than $time $bkloc/plugins

