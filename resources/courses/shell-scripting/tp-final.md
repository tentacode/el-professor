# TP - Final

## Objectif

Montrez vos compétences en shell scripting dans un TP en équipe de deux.

Vous devez montrez que vous maitriser :

* La création d'un ou plusieurs script shells
* La manipulation de commandes shell (commandes, tubes)
* Les entrées / sorties (arguments de script, affichage, sortie fichier)
* La manipulation de fichiers et dossiers
* Le flow d'exécution d'un script (conditions, boucles, code de sorties etc.)
* L'organisation du code avec des `function` ou plusieurs sous-scripts.

Vous choisirez un sujet parmis ceux-ci, ou vous proposerez un sujer original (qui devra être validé).

## Sujet 1 - rotation de logs

Vous écrirez un script `log_rotate` qui s'emploit de la manière suivante :

```bash
./log_rotate Un message de log
./log_rotate Un autre message de log
./log_rotate Un dernier message de log
```

ceci écrira les messages dans un fichier de log `log.1` sous cette forme :

```
[2018-01-01 11:33:44] Un message de log
[2018-01-01 11:33:45] Un autre message de log
[2018-01-01 11:33:46] Un dernier message de log
```

Si le fichier `log.1` est "remplit" avec 1000 lignes de logs, on stockera le log dans un fichier `log.2` à la place. Quand le fichier `log.2` a également 1000 lignes de logs, on passe au fichier `log.3` et ainsi de suite…

On créera également une commande `log_test` qui supprime tout les fichiers de logs et permet d'appeller **3500 fois** le script `log_rotate` avec une valeur aléatoire pour tester le fonctionnement de la commande. Tout les **100 appels** au script `log_rotate` on fait un `sleep 1` pour que l'insertion des logs ne soit pas trop rapide.

### Bonus

En plus de changer de fichier quand le fichier précédent est remplit, on archivera le fichier précédent avec `gzip` pour économiser de l'espace disque.

## Sujet 2 - Un livre dont vous êtes le héro

**Ce sujet est créatif, mais vous devez aller à l'essentiel, le but est de faire du scripting, pas d'écrire un roman, 4 ou 5 pages suffisent largement pour tester le principe.**

Vous créerez un scripte `livre_hero` qui fonctionnera de la manière suivante :

```bash
./livre_hero foret
```

L'argument du script (ici "foret") correspond à un répertoire `foret` qui contient des fichiers textes :

```
/foret
    1.txt
    2.txt
    3.txt
    ...
```

Le script fonctionne de cette manière : 

* Au chargement du script, on affiche la page 01.txt
* Après l'affichage de la page, on demande vers quelle page le lecteur veut aller
* On affiche prochaine page choisit
* Si une page de fin est affichée, le programme s'arrête après l'affichage de la page.


Par exemple, la page `1.txt` contient :

```bash
Vous entrez dans une forêt et faites face à un gobelin.

[2] Combattre le gobelin
[3] Fuir dans la fôret
```

Donc le premier affichage sera :

```
Vous entrez dans une forêt et faites face à un gobelin.

[2] Combattre le gobelin
[3] Fuir dans la fôret

Que voulez-vous faire ? 
```

Si on tape "2" on affiche la page 2, le fichier `2.txt` contient par exemple :

```
Le goblin vous tabasse, vous êtes mort.
```

Comme il n'y a pas de choix de page sur cette page, elle est considérée comme une page de fin et le script s'arrête après l'affichage.

#### CONTRAINTES :

* À chaque affichage de page le terminal est vidé
* On ne peut changer de page uniquement vers les pages disponibles dans les choix de la page en cours (exemple avec la page 1.txt ci-dessus, on ne peut aller que vers 2 et 3, pas vers 5).

### Bonus

* Utilisez des couleurs.
* Ajoutez un système de point de vie (certaines pages font baisser / augmenter la vie, on meurt aussi si on est à 0).

## Sujet 3 - Administration d'un projet Symfony

Dans un projet Symfony existant (qui a une base de données avec des choses dedans) comme vos projet shopping ou twitter, vous créerez des scripts d'administrations (qui se trouvent dans un dossier `scripts`) :

* un script `scripts/deploy_symfony.sh` : clone le projet depuis git dans un dossier `symfony` (au même niveau que le dossier `scripts`) et installe les dépendances du projet (composer, npm, creation du fichier .env, création et remplissage de la BDD).

* un script `scripts/update_symfony.sh` : fait un `git pull origin master` pour mettre le projet à jour, réinstalle les dépendances (composer, npm) qui peuvent avoir changé, exécute les migrations (mais ne recréé pas la base de donnée).

* un script `scripts/backup_symfony.sh` : fait un backup `20180101125959-backup.sql` (en remplaçant par la date et heure du jour) de la base de donnée mysql (avec `mysqldump` par exemple) dans un dossier `backups` (au même niveau que les dossiers `symfony` et `scripts`), puis `gzip` le fichier pour économiser de la place.
* un cron qui lance le script de backup tout les jours à la même heure (mettez un fichier `cron` qui contient la ligne du cron).