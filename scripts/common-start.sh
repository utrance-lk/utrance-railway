#!/bin/bash

sudo apt update -y
if [ $? -ne 0 ]; then
    echo "Error: apt update failed."
    exit 1
fi

sudo apt upgrade -y
if [ $? -ne 0 ]; then
    echo "Error: apt upgrade failed."
    exit 1
fi