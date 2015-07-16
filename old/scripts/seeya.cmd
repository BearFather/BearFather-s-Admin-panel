#!/bin/bash
screen -S mc -X stuff "say SHUTTING DOWN MAIN SERVER!$(printf \\r)"
sleep 5
screen -S mc -X stuff "stop$(printf \\r)"
sleep 20
shutdown now
sleep 15

