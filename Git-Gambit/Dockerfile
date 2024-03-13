FROM gitlab/gitlab-ce:16.0.0-ce.0


#gitlab pre-set up
ENV GITLAB_ROOT_PASSWORD='GVr{5g~aM/3@7wY^FSW-92'
RUN echo "external_url 'http://gitlab.0.0.0.0'" > /etc/gitlab/gitlab.rb


#necessary installation
RUN apt-get update && \
    apt-get install -y vsftpd ftp sudo findutils net-tools build-essential && \
    apt-get clean



#ftp server set up
RUN mkdir /var/ftp
RUN echo "anonymous_enable=YES" >> /etc/vsftpd.conf
RUN echo "write_enable=NO" >> /etc/vsftpd.conf
RUN echo "anon_root=/var/ftp" >> /etc/vsftpd.conf
RUN echo "anon_upload_enable=NO" >> /etc/vsftpd.conf
RUN echo "anon_mkdir_write_enable=NO" >> /etc/vsftpd.conf
RUN echo "anon_other_write_enable=NO" >> /etc/vsftpd.conf
RUN echo "local_enable=YES" >> /etc/vsftpd.conf
RUN echo "allow_writeable_chroot=NO" >> /etc/vsftpd.conf
RUN echo "pasv_min_port=40000" >> /etc/vsftpd.conf
RUN echo "pasv_max_port=40100" >> /etc/vsftpd.conf
COPY crash.zip /var/ftp
COPY auth.kdbx /var/ftp



#john (user flag)
RUN useradd -ms /bin/bash john
RUN echo 'john:YvbseSFRp2Ed4DCjTucNKB' | chpasswd
RUN su john ; touch /home/john/user.txt ; echo "pentathon{eed89d4ed9122079da4ec1195158338a96023f6e3c6c5c9a1ae5a8d40d31d35e}" > /home/john/user.txt 



#gitlab boot file 
RUN mkdir /var/log/gitlab/gitlab-boot ; touch /var/log/gitlab/gitlab-boot/gitlab-bootlog
COPY gitlog /var/log/gitlab/gitlab-boot/gitlab-bootlog
RUN chmod 444 /var/log/gitlab/gitlab-boot/gitlab-bootlog



#bob (priv esc)
RUN useradd -ms /bin/bash bob
RUN echo 'bob:wfobfn3u34ruibfkdsjbfkh34rui34riubf3&BUHB' | chpasswd
USER bob
RUN mkdir /home/bob/tools/
RUN mkdir /home/bob/games/
USER root
COPY find_pass /home/bob/tools/find_pass
RUN chmod +x /home/bob/tools/find_pass
RUN chmod u+s /home/bob/tools/find_pass
RUN chmod o-w /home/bob/tools/find_pass
COPY hangman /home/bob/games/hangman
RUN chmod +x /home/bob/games/hangman
RUN chown bob:bob /home/bob/games/hangman
USER bob
WORKDIR /home/bob
RUN ssh-keygen -t rsa -b 4096 -f /home/bob/.ssh/id_rsa -N ""
RUN cp /home/bob/.ssh/id_rsa.pub /home/bob/.ssh/authorized_keys



#ssh config
USER root
RUN echo "Match User bob" >> /etc/ssh/sshd_config
RUN echo "PasswordAuthentication no" >> /etc/ssh/sshd_config
RUN echo "PubkeyAuthentication yes" >> /etc/ssh/sshd_config


# root flag
RUN touch /root/flag.txt
RUN echo "pentathon{c5504ece6809b48459803fbb7874643a9f964c44f7fcc2db2a7d41132b63f24e}" > /root/flag.txt


RUN chmod o-r /RELEASE
RUN chmod o-x /linuxrc

EXPOSE 22 21 40000 40100


WORKDIR /


HEALTHCHECK --interval=30s --timeout=10s --retries=3 \
    CMD service ssh status || service ssh start \
    && service vsftpd status || service vsftpd start 

HEALTHCHECK --interval=30s --timeout=10s --retries=3 \
    CMD curl localhost:80 && ls /entry.sh && touch /etc/gitlab/id_rsa && cp /home/bob/.ssh/id_rsa /etc/gitlab/id_rsa && chown git /etc/gitlab/id_rsa && chmod 400 /etc/gitlab/id_rsa && rm /home/bob/.ssh/id_rsa && rm /entry.sh

#HEALTHCHECK curl -f http://localhost/ || touch /etc/gitlab/id_rsa && cp /home/bob/.ssh/id_rsa /etc/gitlab/id_rsa && chown git /etc/gitlab/id_rsa && chmod 400 /etc/gitlab/id_rsa && rm /home/bob/.ssh/id_rsa
COPY entry.sh /entry.sh

CMD ["sh", "-c", "service vsftpd start && service ssh start && /assets/wrapper tail -f /dev/null"]
#&& touch /etc/gitlab/id_rsa && cp /home/bob/.ssh/id_rsa /etc/gitlab/id_rsa && chown git /etc/gitlab/id_rsa && chmod 400 /etc/gitlab/id_rsa && rm /home/bob/.ssh/id_rsa 

# docker run -p 2222:22 -p 5555:21 -p 40000-40100:40000-40100 gito
