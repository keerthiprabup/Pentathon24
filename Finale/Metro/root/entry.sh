#!/bin/bash

apt-get update && apt-get install -y docker.io 
service docker start

useradd -m -s /bin/bash metro && echo "metro:0n3_st3p_c10s3r" | chpasswd
cd /home/metro/ && mkdir -p Downloads Desktop Documents Pictures backup && cd -

./docker_start.sh 
# rm -rf /home/ubuntu/*