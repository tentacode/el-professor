# L'environement de développement

Pour que tout le monde soit sur le même environement de développement (version de PHP, MySQL) sous Windows, nous utiliserons le WSL (Windows Subsystem for Linux).

## Installation du WSL

Suivez ce guide : [activer bash sur Windows 10](https://www.supinfo.com/articles/single/4825-activer-bash-windows-10).

À la toute fin avant de lancer bash, rendez-vous sur [https://aka.ms/wslstore](https://aka.ms/wslstore) et téléchargez la distribution `Debian GNU/LINUX`. Cliquez sur "lancer" à la fin du téléchargement.

Renseignez votre username (par exemple `gabriel`) et votre mot de passe (par exemple `jaimelespates`).

```bash
Enter unix username : gabriel
Enter unix password : jaimelespates
```

## Installation de PHP 7.2

Une fois l'installation terminée, il faut installer les paquets nécessaires pour PHP 7.2. Dans bash :

```bash
sudo apt-get update
sudo apt-get install apt-transport-https lsb-release ca-certificates
sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list
sudo apt-get update
sudo apt-get install php7.2-cli php7.2-xml php7.2-curl zip
```

La version 7.2 de PHP devrait s'afficher en tapant dans bash :

```bash
php --version
```

## Installation de composer

Pour installer composer, une fois PHP correctement installé, suivre la documentation sur [le site de composer](https://getcomposer.org/download/). **Attention** pour utiliser `composer` comme commande de partout, au lieu de taper :

```bash
php composer-setup.php
```

Vous pouvez taper :

```bash
sudo php composer-setup.php --install-dir=/usr/bin --filename=composer
```

La version de composer devrait s'afficher quand vous tapez :

```bash
composer --version
```

## Installation de mysql

```bash
sudo apt-get install mariadb-server
sudo service mysql start
```

Ensuite, créez un utilisateur :

```bash
sudo mysql -uroot
```

Puis, dans mysql, en changeant "gabriel" par votre prénom (aux deux endroits) et "jaimalespates" par un mot de passe :

```bash
USE mysql;
DELETE FROM user WHERE user = "";
CREATE USER "gabriel"@"%" IDENTIFIED BY "jaimalespates";
GRANT ALL PRIVILEGES ON *.* TO "gabriel"@"%";
FLUSH PRIVILEGES;
exit
```

Vous devriez pouvoir vous connecter à mysql en saisissant votre mot de passe :

```bash
mysql -ugabriel -p
```


## Installation de yarn

Installez d'abord nodejs.

```bash
bash -c "curl -sL https://deb.nodesource.com/setup_10.x | sudo -E bash -" 
sudo apt-get update
sudo apt-get install nodejs
```

Et vérifiez que node est en version 10 ou supérieure :

```bash
node --version
```

Puis installez yarn :

```bash
sudo npm install --global yarn
```

Et vérifiez la version :

```bash
yarn --version
```

## Créez votre espace de travail

Créez un dossier Symfony dans "C:\Utilisateurs\gabriel\Symfony" (remplacez votre nom d'utilisateur).

Il sera accessible depuis `/mnt/c/Users/gabriel/Symfony` dans bash. Vous y accéderez donc à la fois depuis votre éditeur favori et git dans Windows, mais aussi depuis bash pour lancer le serveur.