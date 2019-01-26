#!/bin/bash
#
# [Script to create new database and new database user]
# Maintainer:     Benny
# Maintainer URL: https://benny.id
#
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
#echo -e "\n$1\n"

MYDBNAME=`tr -cd '[:alnum:]' < /dev/urandom | fold -w15 | head -n1`
MYDBUSER=`tr -cd '[:alnum:]' < /dev/urandom | fold -w15 | head -n1`
MYDBPASS=`tr -cd '[:alnum:]' < /dev/urandom | fold -w15 | head -n1`

Q1="CREATE DATABASE IF NOT EXISTS $MYDBNAME;"
Q2="CREATE USER '$MYDBUSER'@'localhost' IDENTIFIED BY '$MYDBPASS';"
Q3="GRANT ALL PRIVILEGES ON $MYDBNAME.* TO '$MYDBUSER'@'localhost';"
Q4="FLUSH PRIVILEGES;"
SQL="${Q1}${Q2}${Q3}${Q4}"

mysql -uroot -p$1 -e "$SQL" > $DIR/createdb.log 2>$DIR/createdb.log

if [ $? -eq 0 ]; then
cat <<EOENV
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=$MYDBNAME
DB_USERNAME=$MYDBUSER
DB_PASSWORD=$MYDBPASS
EOENV
else
   exit 1
fi
