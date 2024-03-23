#! /bin/bash
docker build -t box3 .
docker run -d  -p 2222:22 -p 5555:21 --name git-container -p 40000-40100:40000-40100 box3
# docker exec -d git-container bash "touch /etc/gitlab/id_rsa && cp /home/bob/.ssh/id_rsa /etc/gitlab/id_rsa && chown git /etc/gitlab/id_rsa && chmod 400 /etc/gitlab/id_rsa && rm /home/bob/.ssh/id_rsa"
