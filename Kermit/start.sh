#!/bin/bash

# Build Docker images
docker build -t complaint-box -f web/Dockerfile web/
docker build -t debian_image -f cacti/Dockerfile.debian cacti/
docker build -t db_image -f cacti/Dockerfile.db cacti/
docker build -t web_image -f cacti/Dockerfile.web cacti/

# Start containers
docker run -d --name db_container db_image
docker run -d -p80:80 --name complaint-box-container complaint-box
docker run -d -p22:22 --name web_container --link db_container:db web_image sleep infinity
docker exec -d web_container bash /entrypoint.sh
docker run -d --name debian_container --link db_container:db --link web_container:web debian_image 
