# KOIN Personal Finance Book

## Prequisites
1. Tested on Ubuntu Bionic (18.04.1)
2. NGINX, php (tested on 7.2), MySQL

## installation
1. Clone this repository. Recommendation to clone to `/var/www/koin`
2. Run `install/install.sh`
3. When requested, enter root password for MySQL to create database
4. Run `install/createnginxvhost.sh` as root
5. When finish, remove the whole `install` directory
