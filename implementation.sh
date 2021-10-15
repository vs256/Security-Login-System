sudo apt -y install ufw #install ufw
sudo ufw allow "OpenSSH" #allows port 22 access for openSSH
sudo ufw allow "Apache Full" #full HTTP/s traffic access on ports 80, 443
sudo ufw enable #enables the firewall

#setup mysql server
sudo mysql -e "CREATE DATABASE passwordHashing;"
sudo mysql -e "USE passwordHashing;
create table users(
   id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   password VARCHAR(255) NOT NULL,
   PRIMARY KEY ( id )
);"

