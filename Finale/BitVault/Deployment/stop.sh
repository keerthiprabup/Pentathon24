#!/bin/bash

pkill -fu root "sudo -u Hax_BitVault env JAVA_HOME=/usr/lib/jvm/java-8-openjdk-amd64/jre /usr/local/tomcat/bin/catalina.sh run"
sleep 2
pkill -fu root "sudo -u Hax_BitVault env JAVA_HOME=/usr/lib/jvm/java-8-openjdk-amd64/jre /usr/local/tomcat/bin/catalina.sh run"
pkill -fu root "python3 /root/app/app.py"
systemctl stop nginx
pkill nginx
systemctl stop cron
# rm /usr/lib/jvm/java-8-openjdk-amd64/jre/* -rf
# rm -rf /usr/local/tomcat/*
userdel Hax_BitVault
rm -rf /home/Hax_BitVault

