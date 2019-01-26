#!/bin/bash
echo -e "\nCreating Nginx configuration file...\n"
APP_NAME=koin
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
PHP_VERSION=`php -v | sed -e '/^PHP/!d' -e 's/.* \([0-9]\+\.[0-9]\+\).*$/\1/'`
SSLDIR=/etc/nginx/ssl/$APP_NAME

cd $DIR/..
APP_DIR=`pwd`

echo -e "\nApplication Directory: $APP_DIR\n"

cat >/etc/nginx/sites-available/$APP_NAME <<EOCONF
server {
    listen 80;
    listen 443 ssl;

    root $APP_DIR/public;
    index index.php index.html;

    server_name $APP_NAME;

    ssl_certificate $SSLDIR/$APP_NAME.crt;
    ssl_certificate_key $SSLDIR/$APP_NAME.key;
    ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
    ssl_ciphers 'EECDH+AESGCM:EDH+AESGCM:AES256+EECDH:AES256+EDH';
    #ssl_dhparam $SSL_DIR/dhparam.pem;

    access_log /var/log/nginx/$APP_NAME.access.log;
    error_log /var/log/nginx/$APP_NAME.error.log;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php$PHP_VERSION-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
EOCONF

ln -s /etc/nginx/sites-available/$APP_NAME /etc/nginx/sites-enabled/$APP_NAME

# Generating Self-signed certficate for nginx
#openssl dhparam -out $SSLDIR/dhparam.pem 4096
mkdir -p $SSLDIR
openssl req -x509 -newkey rsa:4096 -sha256 -days 3650 -nodes \
  -keyout $SSLDIR/$APP_NAME.key -out $SSLDIR/$APP_NAME.crt \
  -subj /CN=$APP_NAME
echo -e "\n A self-signed SSL Certificate has been created"
