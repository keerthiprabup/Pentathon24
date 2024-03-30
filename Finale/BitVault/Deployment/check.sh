#!/bin/bash

curl -f http://localhost:8080 || (pkill -fu root "sudo -u Hax_BitVault env JAVA_HOME=/usr/lib/jvm/java-8-openjdk-amd64/jre /usr/local/tomcat/bin/catalina.sh run" && sudo -u Hax_BitVault env JAVA_HOME='/usr/lib/jvm/java-8-openjdk-amd64/jre' /usr/local/tomcat/bin/catalina.sh run) \
    && curl -f http://localhost:80 || nginx -g "daemon off;" \
    && curl -f http://localhost:5000 || (pkill -fu root "python3 /root/app/app.py" && python3 /root/app/app.py) \
    && service ssh status || service ssh start \
    && service mariadb status || service mariadb start
