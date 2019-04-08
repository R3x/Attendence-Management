#!/bin/bash
# Dependencies  : xprintidle 

MAC="20:A6:0C:B7:C2:95"
WIFI_INTERFACE="wlp8s0"

ESSID=`sudo iwlist $WIFI_INTERFACE scanning  | grep  -A 10 $MAC |  grep "ESSID"  | sed -E 's/\s*?ESSID:"(128)"/\1/'`
IDLE_TIME=$(xprintidle)
MAC=`ip addr show $WIFI_INTERFACE | sed -E -n "s|\s*link/ether ([a-Z0-9:p]{17}).*|\1|p"`


if [[ $IDLE_TIME -lt 600000 ]];then
    echo curl "http:ip/attendence.php?essid=$ESSID&macid=$MAC"
fi

