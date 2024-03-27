FROM debian:buster-slim

RUN apt-get update && apt-get install -y apache2 php libapache2-mod-php openssh-server nfs-kernel-server php-xml

COPY /web /var/www/html



EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]
