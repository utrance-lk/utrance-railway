#!/bin/bash

echo "Starting setup Apache Server at $(date)"

sudo apt install apache2 -y
if [ $? -ne 0 ]; then
    echo "Error: apache2 installation failed."
    exit 1
fi

echo "Apache server download complete"

echo "Apache server is starting..."

sudo service apache2 start
if [ $? -ne 0 ]; then
    echo "Error: apache2 starting failed."
    exit 1
fi

echo "Apache server successfully started on port 80!"

