# 9 - Les scripts shell

Un script shell est un fichier exécutable qui contient un ensemble de commande shell. Toutes les commandes shell et les mécanismes du shell peuvent être exécutés dans un script shell, et renvient au même à taper les commandes une à une dans le shell.

## Un script shell doit être exécutable

Pour pouvoir exécuter un script shell, il faut d'abord qu'il soit exécutable :

```bash
echo 'echo "Hello World"' > hello.sh
./hello.sh
```
> -bash: ./hello.sh: Permission denied

```bash
chmod +x hello.sh
./hello.sh
```
> Hello World

## Le shebang

Par défaut un script shell s'exécute avec le shell active (généralement `bash`). Il est préférable de préciser le shell qu'on utilise en commançant le shell script par un "shebang" :

```bash
#!/bin/bash
echo Hello World
```

Shebang est un raccourçi pour "sharp" (#) et "bang" (!).

On peut jouer avec le shebang pour changer l'interpreteur du script par exemple le script ci-dessous sera exécuté par `php` :

```bash
#!/bin/env/php
<?php

die("Hello World");
```

## Les commandes d'un script shell

À noter que toutes les commandes d'un script shell sont exécutées, le script ne s'arrête pas si une des commandes est en erreur.