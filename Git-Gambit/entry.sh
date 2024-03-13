#! /bin/bash
sleep 30
touch /etc/gitlab/id_rsa && cp /home/bob/.ssh/id_rsa /etc/gitlab/id_rsa && chown git /etc/gitlab/id_rsa && chmod 400 /etc/gitlab/id_rsa && rm /home/bob/.ssh/id_rsa
rm /entry.sh
