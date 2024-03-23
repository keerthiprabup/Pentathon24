#!/bin/bash

docker stop web_container db_container debian_container complaint-box-container
docker rm $(docker ps -a -q)