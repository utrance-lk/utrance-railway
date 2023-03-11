#!/bin/bash

echo "alias mariadbstart='sudo service mariadb start'" >> ~/.bashrc
echo "alias mariadbstop='sudo service mariadb stop'" >> ~/.bashrc
echo "alias mariadbroot='sudo mariadb -u root -p'" >> ~/.bashrc
echo "alias mariadbimport='sudo mariadb -u root -p < ./utrance.sql'" >> ~/.bashrc

source ~/.bashrc

echo -e "Open a new terminal to use the following commands:\n \e[32mmariadbstart\e[0m: Starts the MariaDB server.\n \e[32mmariadbstop\e[0m: Stops the MariaDB server.\n \e[32mmariadbroot\e[0m: Logs in to MariaDB as the root user.\n \e[32mmariadbimport\e[0m: Imports the utrance.sql file into MariaDB as the root user."
