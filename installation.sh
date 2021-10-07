# install apache
sudo su
sudo yum update -y
sudo yum install -y httpd httpd-tools mod_ssl
sudo systemctl enable httpd 
sudo systemctl start httpd

# install php 7.4
sudo amazon-linux-extras enable php7.4
sudo yum clean metadata
sudo yum install php php-common php-pear -y
sudo yum install php-{cgi,curl,mbstring,gd,mysqlnd,gettext,json,xml,fpm,intl,zip}


# install mysql5.7
sudo rpm -Uvh https://dev.mysql.com/get/mysql57-community-release-el7-11.noarch.rpm
sudo yum install mysql-community-server -y
sudo systemctl enable mysqld
sudo systemctl start mysqld


# set permissions
sudo usermod -a -G apache ec2-user
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;
sudo find /var/www -type f -exec sudo chmod 0664 {} \;


#move files from s3 to ec2
sudo aws s3 sync s3://security-website-424 /var/www/html
cd /var/www/html
sudo unzip web-424.zip
sudo mv web-424/* /var/www/html
sudo rm -rf web-424 web-424.zip __MACOSX


# enable mod_rewrite on ec2 linux
sudo sed -i '/<Directory "\/var\/www\/html">/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf
sudo service httpd restart