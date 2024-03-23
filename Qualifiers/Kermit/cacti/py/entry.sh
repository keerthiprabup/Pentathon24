#! /bin/bash
wait-for-it web:8000 -t 300 -- echo "database is connected"
python3 /py/setup.py
rm /py -rf
sleep infinity
