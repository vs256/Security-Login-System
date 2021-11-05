
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

sudo apt -y install php libapache2-mod-php php-mysql #installs PHP
sudo systemctl restart apache2 #restart server to save changes


sudo apache2ctl configtest #check for any errors in config file
sudo systemctl restart apache2 #restart server to save changes

