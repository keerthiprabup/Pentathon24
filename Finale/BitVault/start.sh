#!/bin/bash
docker build -t bitvault .
# docker run  -d -p80:80 -p8080:8080 -p22:22 --name bit_container bitvault
docker run -d --name bit_container --network=host bitvault 
