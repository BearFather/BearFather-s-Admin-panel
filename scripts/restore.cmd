#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
if [ -n "$w1" ]; then
rdiff-backup --force -r $1 $bkloc/$w1 $mcloc/$w1/
fi
if [ -n "$w2" ]; then
rdiff-backup --force -r $1 $bkloc/$w2 $mcloc/$w2/
fi
if [ -n "$w3" ]; then
rdiff-backup --force -r $1 $bkloc/$w3 $mcloc/$w3/
fi
if [ -n "$w4" ]; then
rdiff-backup --force -r $1 $bkloc/$w4 $mcloc/$w4/
fi
if [ -n "$w5" ]; then
rdiff-backup --force -r $1 $bkloc/$w5 $mcloc/$w5/
fi
if [ -n "$w6" ]; then
rdiff-backup --force -r $1 $bkloc/$w6 $mcloc/$w6/
fi
if [ -n "$w7" ]; then
rdiff-backup --force -r $1 $bkloc/$w7 $mcloc/$w7/
fi
if [ -n "$w8" ]; then
rdiff-backup --force -r $1 $bkloc/$w8 $mcloc/$w8/
fi
if [ -n "$w9" ]; then
rdiff-backup --force -r $1 $bkloc/$w9 $mcloc/$w9/
fi

