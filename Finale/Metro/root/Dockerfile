FROM debian:buster-slim
RUN apt-get update && apt-get install -y \
    openssh-server

RUN mkdir -p /backup



CMD service ssh start & 

#################################################################################
# COPY solve /

#################################################################################
