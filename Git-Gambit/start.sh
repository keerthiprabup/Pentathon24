#! /bin/bash
docker build -t box3 .
docker run -p 2222:22 -p 5555:21 -p 40000-40100:40000-40100 box3