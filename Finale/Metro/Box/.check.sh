#!/bin/bash

#Host
service apache2 status || service apache2 start
service ssh status || service ssh start &
(nc $(ip addr show docker0 | grep -Po 'inet \K[\d.]+') 5000 && pkill nc) || sudo -u metro /home/metro/ynetd -p 5000 -a $(ip addr show docker0 | grep -Po 'inet \K[\d.]+') /home/metro/backup/register & 

#Container
(docker ps | grep 'metro_container') || ((docker rm $(docker ps -aq)||true) && docker run -d -p80:80 -p2222:22 --name metro_container -v /home/metro/backup:/backup metro_image sleep infinity) &
