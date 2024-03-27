#!/bin/bash

docker build -t web .
docker run -d -p 80:80 --name web_xxe web 
