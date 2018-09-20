# Installer votre environement de développement sous Windows

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

Pour installer composer, une fois PHP correctement installé, il faut taper dans bash :

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/bin --filename=composer
php -r "unlink('composer-setup.php');"
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

## Créez votre espace de travail

Créez un dossier Symfony dans "C:\Utilisateurs\gabriel\Symfony" (remplacez votre nom d'utilisateur).

Il sera accessible depuis `/mnt/c/Users/gabriel/Symfony` dans bash. Vous y accéderez donc à la fois depuis votre éditeur favori et git dans Windows, mais aussi depuis bash pour lancer le serveur.