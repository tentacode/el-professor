# 8 - Chercher des fichiers

## locate

La commande `locate` permet de trouver facilement et rapidement des fichiers, le problème est qu'elle utilise une base de données qui doit être remplit et qui n'est peut être pas disponible (ou à jour) quand vous lancer la commande pour la première fois :

```bash
locate fichier.txt
```
> WARNING: The locate database (/var/db/locate.database) does not exist.

> To create the database, run the following command:

>   sudo launchctl load -w /System/Library/LaunchDaemons/com.apple.locate.plist

> Please be aware that the database can take some time to generate; once
the database has been created, this message will no longer appear.

Cette base de données doit être régulièrement mis à jour (via une tâche `cron` par exemple).

## find

La commande `find` permet de trouver un fichier quoi qu'il arrive et ne dépend pas d'une base de données, par exemple :

```bash
find ~/Workspace/ -type f -name README.md
```

Cherche tout les fichiers (`-type f`) dont le nom est "README.md" (`-name`) dans le dossier `~/Workspace`.

Plus d'exemples en suivant [ce lien](https://alvinalexander.com/unix/edu/examples/find.shtml).