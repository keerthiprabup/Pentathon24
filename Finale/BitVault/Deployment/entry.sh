#!/bin/bash
./stop.sh
apt-get update && \
    apt-get install -y mariadb-server python3-pip openssh-server sudo net-tools nginx cron && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
adduser --system --no-create-home --disabled-login --group nginx
useradd -m Hax_BitVault
echo 'Hax_BitVault:25430304' | chpasswd
usermod -aG sudo Hax_BitVault
rm /etc/ssh/sshd_config
cp sshd_config /etc/ssh/sshd_config
cp root/app /root/app -rf
cd /root/app && pip3 install -r requirements.txt && cd -
cp root/db.sql /root/

echo 'pentathon{e8e5c35da10eb79911bbb5dbf24b4d89cd86a27ee2ffd9e2bd5e0c10a28c7f9b}' > /home/Hax_BitVault/user.txt
echo 'pentathon{c6155daaac22a34f38e9984d056916476c37077b813e296a336b08bcd3f2a9c7}' > /root/root.txt

cp ./web/* /usr/share/nginx/html/ -rf

##################
RUN mkdir -p /usr/local/tomcat/
RUN mkdir -p /usr/lib/jvm/java-8-openjdk-amd64/jre
cp -rf tomcat/* /usr/local/tomcat/
cp -rf jre/* /usr/lib/jvm/java-8-openjdk-amd64/jre
chown -R Hax_BitVault /usr/local/tomcat/
#################

mkdir -p /home/Hax_BitVault/under-development
cp BitVault-debug.apk /home/Hax_BitVault/under-development

cp nginx.conf /etc/nginx/nginx.conf
chown -R nginx:nginx /usr/share/nginx/html
chown -R Hax_BitVault:Hax_BitVault /usr/local/tomcat/ 
chown -R Hax_BitVault:Hax_BitVault /home/Hax_BitVault


systemctl restart nginx

#Health check
cp check.sh /root/.check
echo "* * * * * /root/.check" | crontab -
systemctl start cron
systemctl enable cron


# cd ../ && rm -rf Deployment
./start.sh