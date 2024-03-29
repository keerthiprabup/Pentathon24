#!/bin/bash

pkill ynetd
docker stop metro_container
docker rm metro_container
service cron stop
userdel metro
rm -rf /home/metro