FROM debian:buster-slim
RUN apt-get update && apt-get install -y \
    openssh-server apache2 php libapache2-mod-php openssh-server nfs-kernel-server php-xml sudo python3 wget curl python3-pip

RUN useradd -m metro
RUN echo "metro:blood4lyfe" | chpasswd
RUN echo "root:17553911ccc9b16074b8ef6ad29b534193357101" | chpasswd

COPY ticket.sh /bin/
RUN echo "17553911ccc9b16074b8ef6ad29b534193357101" > /root/.cred
RUN echo "metro ALL=(ALL) /bin/ticket.sh" > /etc/sudoers.d/metro-ticket

RUN mkdir -p /backup
COPY web /var/www/html
EXPOSE 80



CMD service ssh start && \
    apachectl -D FOREGROUND  




