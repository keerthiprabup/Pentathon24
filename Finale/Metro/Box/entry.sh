#!/bin/bash

apt-get update && apt-get install -y docker.io cron
service docker start
cd ./.box/ && ./docker_start.sh 
cd -


useradd -m metro && echo "metro:0n3_m0r3_st3p_c10s3r" | chpasswd
cd /home/metro/ && mkdir -p Downloads Desktop Documents Pictures backup && cd -

#pwn
cp ./.box/register /home/metro/backup/
cp ./.box/ynetd /home/metro/

echo "pentathon{fakeuser}" > /home/metro/user.txt
chown -R metro:metro /home/metro
echo "pentathon{fakeroot}" > /root/root.txt
sudo -u metro /home/metro/ynetd -p 5000 -a $(ip addr show docker0 | grep -Po 'inet \K[\d.]+') /home/metro/backup/register &

#Cron for healthcheck
echo "* * * * * /bin/bash /root/check.sh" | crontab -
service cron status || service cron start &
rm entry.sh stop.sh ./.box -rf
