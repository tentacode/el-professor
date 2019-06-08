# Annexe - Sauvegarde et restauration

## Sauvegarde d'une base de données à l'aide de la commande pg_dump

pg_dump est utilisé pour faire un backup d'une base de données spécifique, la syntaxe est similaire à psql pour l'authentification et tire partie du fichier .pgpass pour ne pas avoir à taper de password.

```bash
pg_dump --username=admin shows -f ./backup/backup_shows.sql
```

La commande ci-dessus créera un fichier contenant le SQL (structure et données) nécessaire à recréer la base de données `shows`.

On peut également faire un backup d'un serveur distant :

```bash
pg_dump -h 172.16.0.14 -p 5432 ...
```

On peut également utiliser l'option -F (ou --format) pour spécifier un format pour le fichier de backup, tout les formats sont compatibles avec la commande `pg_restore` :

* -p (par défaut) : "plain", sauve le backup dans un fichier texte en SQL.
* -d : "directory", créé un fichier par table.
* -t : "tar" créé une archive compressée

D'autres options :

* -a (ou --data-only) : seulement les données
* -c (ou --clean) : ajoute également l'instruction "DROP DATABSE"
* -C (ou --create) : ajoute l'instruction de création et de connection de la database
* -j [nombre] (ou --jobs=) : parallélise le backup
* -t [expression] (ou --table=) : backup seulement une table qui correspond à l'expression  (exemple : `--table=users`).
* toutes les options sont disponibles avec la command `man pg_dump`

## Sauvegarde du serveur avec pg_dumpall

La commande `pg_dumpall` permet de sauvegarder toutes les bases de données du serveur, ainsi que les "globals" (utilisateurs, configurations etc.). Elle dispose de la plupart des options de `pg_dump`. Pour faire un backup total on fera :

```bash
pg_dumpall --username=admin -f backup/all.sql
```

Contrairement à `pg_dump`, on est limité au fichiers SQL, on préferera donc utiliser `pg_dump` pour les bases de données (plus flexible) et utiliser `pg_dumpall` uniquement pour les globals :

```bash
pg_dumpall --globals-only --username=admin -f backup/globals.sql
```

On peut également, par exemple, faire un backup des roles uniquement :

```bash
pg_dumpall --roles-only --username=admin -f backup/roles.sql
```

## Restauration avec psql

Si le fichier de backup est au format texte avec du SQL on pourra directement utiliser psql :

```bash
psql --username=admin -f ./backup/roles.sql
```

Si l'on veut s'arrêter si il y a une erreur :

```bash
psql --username=admin --set ON_ERROR_STOP=on -f ./backup/roles.sql
```

## Restauration avec pg_restore

Si le backup a été compressé (sur un fichier unique ou en mode directory), on pourra utiliser la commande `pg_restore`.

```
pg_restore --username=admin --dbname=shows ./backup/shows
```

Si l'on part d'un serveur vide, il ne faudra pas oublier de créer les bases de données auparavant si besoin.
