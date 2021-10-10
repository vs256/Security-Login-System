#ubuntu 18.04
sudo apt update #Updating the cache
Y
sudo apt full-upgrade #Updating the cache
Y


sudo apt install apache2  #Install apache2
Y

sudo apt install ufw #Install UFW - firewall
sudo ufw allow OpenSSH #Allow OpenSSH to be able to SSH to port 22
sudo ufw allow "Apache Full" #Allow Apache Full http traffic access to ports 80 & 443
sudo ufw enable #enable UFW

sudo apt install mysql-server #install mysql server
Y
sudo mysql_secure_installation #secure mysql connection
no #decline to use validate password plugin
compsecurity #password
compsecurity #confirm password
y #yes to removing anonymous users 
y #yes to disallow root login remotely
y #remove test database and access to it
y #reload privilege tables
systemctl status mysql.service #start mysql incase it is not running

sudo mysql
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'compsecurity';  #change root password
FLUSH PRIVILEGES; #reload the grant tables and put changes into effect
exit

sudo apt install php libapache2-mod-php php-mysql #installs PHP
Y
sudo systemctl restart apache2 #restart server to save changes

sudo chown -R $USER /var/www #add permissions to /var/www/


cd /var/www/html #this is where the website files have to be to run it
git clone https://github.com/vs256/Security-Design-Website.git #clone our git
sudo mv /var/www/html/Security-Design-Website/web/* /var/www/html #move all the files of our website in our git repo to /var/www/html

