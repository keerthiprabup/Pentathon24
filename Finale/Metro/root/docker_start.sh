docker build -t metro_image .
docker run -it --name metro_container -v /home/metro/backup:/backup metro_image /bin/bash