# Use a PHP-enabled image as the base image
FROM php:apache

# Set the working directory in the container
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y ncat python3 curl zip wget gcc openssh-server sudo && \
    rm -rf /var/lib/apt/lists/*

RUN useradd -m -s /bin/bash kermit \
    && echo "kermit:0n3_st3p_c10s3r" | chpasswd
USER kermit
RUN mkdir -p /home/kermit/.ssh && \
    ssh-keygen -t rsa -f /home/kermit/.ssh/id_rsa -q -N "" && \
    cp /home/kermit/.ssh/id_rsa.pub /home/kermit/.ssh/authorized_keys && \
    chown -R kermit:kermit /home/kermit/.ssh
USER root
RUN chmod 777 /home/kermit/.ssh/id_rsa

# Copy the PHP files into the container
COPY index.php .
COPY complaints.php .
#COPY challenge.c .
COPY background.jpg .
# Enable Apache modules
RUN a2enmod rewrite

# Copy the PHP files into the container
COPY main.php uploads.php ./

# Copy an .htaccess file for URL rewriting (if needed)
COPY .htaccess ./

# Copy a directory for uploads
RUN mkdir uploads

# Set permissions for the uploads directory
RUN chown -R www-data:www-data uploads
RUN chmod -R 777 uploads

# Create a directory for the subdomain
RUN mkdir actual
WORKDIR /var/www/html/actual
COPY background.jpg .
#RUN ls
#RUN perl Makefile.PL
#RUN make test
#RUN make install
WORKDIR /var/www/html
# Copy PHP files for the subdomain
RUN mkdir /opt/exiftool-12.37
COPY exiftool /opt/exiftool-12.37
RUN chmod -R 777 /opt/exiftool-12.37
#RUN chmod -R 777 /var/www/html/subdomain/exiftool/
RUN mv ./main.php actual/index.php
RUN mv ./uploads.php actual/
# Restrict direct access to the subdomain
RUN mv ./.htaccess actual/
RUN mkdir /var/www/html/resources
#RUN mv ./challenge.c /var/www/html/resources 
#RUN gcc /var/www/html/resources/challenge.c -o /var/www/html/resources/app -lm
#RUN rm /var/www/html/resources/challenge.c
#RUN chown kermit:kermit /var/www/html/resources/app
WORKDIR /var/www/html/uploads
#RUN chown -R kermit:kermit /home/kermit
#RUN chmod +x /var/www/html/resources/app


#RUN chmod 6775 /var/www/html/resources/app



# Expose port 80 for Apache
EXPOSE 80

HEALTHCHECK --interval=30s --timeout=10s --retries=3 \
    CMD curl -f http://localhost:80 || service apache2 start
