FROM tomcat:8.0.36-jre8 AS tomcat_builder
FROM nginx:latest

#---------------------------------------------------------------
RUN apt update && apt install -y net-tools
RUN apt-get update && \
    apt-get install -y mariadb-server python3-pip openssh-server sudo && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN useradd -m -s /bin/bash Hax_BitVault
# RUN useradd -m -s /bin/bash root
RUN echo 'Hax_BitVault:25430304' | chpasswd
RUN usermod -aG sudo Hax_BitVault
RUN rm /etc/ssh/sshd_config
COPY sshd_config /etc/ssh/sshd_config




COPY root/app /root/app

WORKDIR /root/app

RUN pip3 install -r requirements.txt --break-system-packages

COPY root/db.sql /root/
# CMD service mysql start && mysql < /root/db.sql && rm -rf /root/db.sql && python3 /root/app/app.py

#---------------------------------------------------------------
RUN echo 'pentathon{e8e5c35da10eb79911bbb5dbf24b4d89cd86a27ee2ffd9e2bd5e0c10a28c7f9b}' > /home/Hax_BitVault/user.txt
RUN echo 'pentathon{c6155daaac22a34f38e9984d056916476c37077b813e296a336b08bcd3f2a9c7}' > /root/root.txt

WORKDIR /
COPY ./web/ /usr/share/nginx/html/
RUN mkdir -p /usr/local/tomcat/
RUN mkdir -p /usr/lib/jvm/java-8-openjdk-amd64/jre
# RUN rm /usr/share/nginx/html/index.html



COPY --from=tomcat_builder /usr/local/tomcat/ /usr/local/tomcat/
COPY --from=tomcat_builder /usr/lib/jvm/java-8-openjdk-amd64/jre /usr/lib/jvm/java-8-openjdk-amd64/jre
RUN chown -R Hax_BitVault /usr/local/tomcat/
RUN rm -rf /usr/local/tomcat/webapps/*
# USER Hax_BitVault
# ENV JAVA_HOME=/usr/lib/jvm/java-8-openjdk-amd64/jre

# USER root
RUN mkdir -p /home/Hax_BitVault/under-development
COPY BitVault-debug.apk /home/Hax_BitVault/under-development
COPY ./docker-entrypoint.sh /docker-entrypoint.sh
ADD log4shell-1.0-SNAPSHOT.war /usr/local/tomcat/webapps/ROOT.war
COPY nginx.conf /etc/nginx/nginx.conf
RUN chown -R nginx:nginx /usr/share/nginx/html


RUN chown -R Hax_BitVault /usr/local/tomcat/ && \
    chown -R Hax_BitVault /home/Hax_BitVault


EXPOSE 80 8080
EXPOSE 3306
EXPOSE 5000 22
HEALTHCHECK --interval=30s --timeout=10s --retries=3 \
    CMD curl -f http://localhost:8080 || sudo -u Hax_BitVault env JAVA_HOME='/usr/lib/jvm/java-8-openjdk-amd64/jre' /usr/local/tomcat/bin/catalina.sh run \
    && curl -f http://localhost:80 || nginx -g "daemon off;" \
    && curl -f http://localhost:5000 || python3 /root/app.py \
    && service ssh status || service ssh start \
    && service mariadb status || service mariadb start

# CMD /usr/local/tomcat/bin/catalina.sh run
