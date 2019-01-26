#!/bin/bash

# Script to install Laravel Application
# Version 1.0
#
# This script should be located in install directory of root Laravel Project

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

# Check and Install Composer if necessary
if ! [ -f $DIR/composer.phar ] > /dev/null 2>1; then
  echo -e "\nInstalling Composer\n"
  $DIR/installcomposer.sh
else
  echo -e "\nComposer already installed, skipping\n"
fi

# If we can't find .env file, then this is new install
# Otherwise don't run installation section
if ! [ -f $DIR/../.env ]; then
  cd $DIR/..
  APP_DIR=`pwd`

  # Create .env file for production
  echo "APP_ENV=production" > .env
  echo "APP_NAME=KOIN" >> .env
  echo "APP_DEBUG=false" >> .env
  echo "APP_URL=$HOSTNAME" >> .env
  echo "APP_KEY=" >> .env

  # Running composer to install dependencies
  php $DIR/composer.phar install

  # Generating APP_KEY
  php artisan key:generate

  # Creating Database
  read -sp 'Enter MySQL Root Password: ' MYSQLPASS
  $DIR/createdb.sh $MYSQLPASS >> .env
  if [ $? -ne 0 ]; then
    echo -e "\nDatabase creation failed. Check $DIR/createdb.log\n"
  fi
else
  echo -e "\nApplication already installed\n"
fi

echo -e "\nFor security, please delete install directory\n"
