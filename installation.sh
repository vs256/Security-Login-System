
 # Check if running as root  
 if [ "$(id -u)" != "0" ]; then  
   echo "This script must be run as root" 1>&2  
   exit 1  
 fi  

sudo apt -y update #Update the packages
sudo apt -y  full-upgrade  #Do a full upgrade for ubuntu

sudo apt -y install apache2  #Install apache2


#Setup the mysql server
sudo apt -y install mysql-server #Install mysql Server
# Make sure that NOBODY can access the server without a password
mysql -e "UPDATE mysql.user SET Password = PASSWORD('compsecurity') WHERE User = 'root'"
# Kill the anonymous users
mysql -e "DROP USER ''@'localhost'"
# Because our hostname varies we'll use some Bash magic here.
mysql -e "DROP USER ''@'$(hostname)'"
# Kill off the demo database
mysql -e "DROP DATABASE test"
# Make our changes take effect
mysql -e "FLUSH PRIVILEGES"
# Any subsequent tries to run queries this way will get access denied because lack of usr/pwd param

sudo apt -y install php libapache2-mod-php php-mysql #installs PHP
sudo systemctl restart apache2 #restart server to save changes


sudo apache2ctl configtest #check for any errors in config file
sudo systemctl restart apache2 #restart server to save changes

