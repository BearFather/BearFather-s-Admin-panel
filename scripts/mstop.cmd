#!/bin/bash
dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
source $dir/settings.web
sudo screen -S mc -X stuff "say Server going down in 5 seconds!$(printf \\r)"
sleep 5
sudo screen -S mc -X stuff "Stop$(printf \\r)"
sleep 30
echo Server stopped

