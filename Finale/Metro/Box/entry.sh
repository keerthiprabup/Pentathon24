#!/bin/bash

apt-get update && apt-get install -y docker.io 
service docker start
./docker_start.sh 



useradd -m /bin/bash metro && echo "metro:0n3_m0r3_st3p_c10s3r" | chpasswd
cd /home/metro/ && mkdir -p Downloads Desktop Documents Pictures backup && cd -

#pwn
cp register /home/metro/backup/
cp ynetd /home/metro/
chown -R metro /home/metro

echo "pentathon{fakeroot}" > /root/root.txt
su metro
echo "pentathon{fakeuser}" > /home/metro/user.txt
/home/metro/ynetd -p 5000 -a $(ip addr show docker0 | grep -Po 'inet \K[\d.]+') /home/metro/backup/register &
exit


