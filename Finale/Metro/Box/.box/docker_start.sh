docker build -t metro_image .
docker run -d -p80:80 -p2222:22 --name metro_container -v /home/metro/backup:/backup metro_image