#!/bin/bash
docker rmi -f $(docker images -q)
kill $(pgrep -f "/home/metro/backup/register")
pkill ynetd
docker stop metro_container
docker rm $(docker ps -aq)
service cron stop
userdel metro
rm -rf /home/metro