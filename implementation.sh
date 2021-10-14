sudo apt -y install ufw #install ufw
sudo ufw allow "OpenSSH" #allows port 22 access for openSSH
sudo ufw allow "Apache Full" #full HTTP/s traffic access on ports 80, 443

