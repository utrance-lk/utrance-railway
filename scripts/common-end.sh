#!/bin/bash

sudo apt autoclean -y
if [ $? -ne 0 ]; then
    echo "Error: apt autoclean failed."
    exit 1
fi

sudo apt autoremove -y
if [ $? -ne 0 ]; then
    echo "Error: apt autoremove failed."
    exit 1
fi