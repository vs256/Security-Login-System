# Make sure that NOBODY can access the server without a password
sudo mysql -e "UPDATE mysql.user SET Password = PASSWORD('compsecurity') WHERE user = 'root'"
# Kill the anonymous users
sudo mysql -e "DROP USER ''@'localhost'"
# Because our hostname varies we'll use some Bash magic here.
sudo mysql -e "DROP USER ''@'$(hostname)'"
# Kill off the demo database
sudo mysql -e "DROP DATABASE test"
# Make our changes take effect
sudo mysql -e "FLUSH PRIVILEGES"
# Any subsequent tries to run queries this way will get access denied because lack of usr/pwd param

sudo mysql -e "CREATE USER 'admin'@'localhost' IDENTIFIED BY 'computersecurity' " #creates new user called admin
sudo mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' " #grants all privileges to admin@localhost

sudo apt -y install ufw #install ufw
sudo ufw allow "OpenSSH" #allows port 22 access for openSSH
sudo ufw allow "Apache Full" #full HTTP/s traffic access on ports 80, 443
sudo ufw --force enable #make sure ufw is enabled without prompting y/n


#setup mysql server
sudo mysql -e "CREATE DATABASE authentication;"
sudo mysql -e "USE authentication;
create table users(
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   password VARCHAR(255) NOT NULL,
   verified INT NOT NULL DEFAULT '0',
   loginCount INT DEFAULT '0',
   lastLogin VARCHAR(50) DEFAULT NULL,
   PRIMARY KEY ( id )
);"

sudo mysql -e "USE authentication;
create table requests(
   id INT NOT NULL AUTO_INCREMENT,
   user INT DEFAULT NULL,
   hash VARCHAR(255) DEFAULT NULL,
   timestamp INT DEFAULT NULL,
   type INT DEFAULT NULL,
   PRIMARY KEY ( id )
);"

sudo mysql -e "USE authentication;
CREATE TABLE loginattempts (
  id INT NOT NULL AUTO_INCREMENT,
  user INT DEFAULT NULL,
  ip varchar(255) DEFAULT NULL,
  timestamp INT DEFAULT NULL,
  PRIMARY KEY ( id )
);"


sudo a2enmod rewrite #enable rewrite rules for redirects
sudo systemctl restart apache2 #restart apache2 server

sudo mv ~/Security-Design-Website/000-default.conf /etc/apache2/sites-available
sudo systemctl restart apache2


sudo touch /var/www/html/.htaccess
sudo mv ~/Security-Design-Website/secureAccountSystem/.htaccess /var/www/html
sudo mv ~/Security-Design-Website/secureAccountSystem/php/* /var/www/html/php
sudo mv ~/Security-Design-Website/secureAccountSystem/* /var/www/html


