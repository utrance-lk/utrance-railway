#!/bin/bash

echo "Starting setup MariaDB at $(date)"

sudo apt install -y mariadb-server mariadb-client
if [ $? -ne 0 ]; then
    echo "Error: mariadb installation failed."
    exit 1
fi

sudo apt install -y software-properties-common
if [ $? -ne 0 ]; then
    echo "Error: software-properties-common installation failed."
    exit 1
fi

sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
if [ $? -ne 0 ]; then
    echo "Error: fetching mariadb signing key failed."
    exit 1
fi

sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] https://mariadb.mirror.liquidtelecom.com/repo/10.6/ubuntu focal main'
if [ $? -ne 0 ]; then
    echo "Error: adding mariadb repository failed."
    exit 1
fi

sudo apt update
if [ $? -ne 0 ]; then
    echo "Error: apt update failed after adding mariadb repository."
    exit 1
fi

sudo apt install -y mariadb-server mariadb-client
if [ $? -ne 0 ]; then
    echo "Error: mariadb installation failed after adding mariadb repository."
    exit 1
fi

sudo service mariadb start
if [ $? -ne 0 ]; then
    echo "Error: starting mariadb service failed."
    exit 1
fi

sudo mysql_install_db
if [ $? -ne 0 ]; then
    echo "Error: running mysql_install_db failed."
    exit 1
fi

echo -e "\n\nY\nN\nN\nY\nY\nY" | sudo mysql_secure_installation
if [ $? -ne 0 ]; then
    echo "Error: running mysql_secure_installation failed. If this command failed. Run it manually"
    exit 1
fi

echo "Setup completed at $(date)"