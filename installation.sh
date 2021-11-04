
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


sudo snap install core; sudo snap refresh core #Make sure snap is installed for certificate
sudo snap install --classic certbot #install certbot
sudo ln -s /snap/bin/certbot /usr/bin/certbot #making sure the certbot command can be run
echo "surfingturtlelife@gmail.com" | sudo certbot --apache #turn on HTTPS access
sudo certbot renew --dry-run #test that automatic certificate renewal is on

