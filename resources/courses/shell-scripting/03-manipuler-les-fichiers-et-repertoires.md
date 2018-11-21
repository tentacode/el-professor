# 3 - Manipuler les fichiers et les répertoires

## Les noms des fichiers et dossiers

Les fichiers et dossiers qui commencent par un `.`, par exemple le dossier `~/.ssh` ou les fichiers `.gitignore`  sont "cachés". Ils ne sont pas listés par défaut avec la commande `ls`, il faudra utiliser la commande `ls -a` pour les lister. Ils restent utilisables comme n'importe quels autre fichiers.

Contrairement à Windows, les noms de fichiers et dossiers sont **sensibles à la casse**, il peut donc coexister trois fichiers `toto`,  `Toto` et `TOTO` dans le même répertoire. Les noms de fichiers et dossiers peuvent contenir toutes sortes de caractères et des espaces mais il est conseillé par précaution de les écrire en minuscule et sans espaces pour éviter les confusions.

Les "extensions de fichiers" (.txt, .jpg…) n'ont aucune valeur dans Linux. On peut en ajouter pour plus de clarté mais elles sont facultatives. 

## touch - Créer ou mettre à jour la date d'un fichier

On appelle `touch` avec un nom de fichier, si il n'existe pas, le fichier est créé (et est vide), sinon ses dates d'accès, de modification (content) et de *change* (métadonnées, comme les permissions) sont modifiées.

| L'option | sert à |
| --- | --- |
| touch -a | Change juste la date d'accès |
| touch -m | Change juste la date de modification |
| touch -c | Ne créé pas le fichier si il n'existe pas |
| touch -t 19840939235959 | Utilise la date en paramètre comme nouvelle date plutôt que la date courante (format YYYYMMDDhhmmss) |

## mkdir - Créer des répertoires

La commande `mkdir` prends en argument un ou plusieurs répertoires, par example : `mkdir photos videos musique`.

**Attention** si un des répertoires en argument n'existe pas (par exemple, le dossier `dessin` de la commande suivante n'existe pas) la commande va échouer, ex `mkdir dessin/croquis` :

> mkdir: dessin: No such file or directory

On peut pallier à ce problème en créant le dossier `dessin` d'abords : `mkdir dessin dessin/croquis`, ou encore en utilisant l'option `-p` : `mkdir -p dessin/croquis/autant/de/dossier/necessaire`.

## cp - Copie des fichiers et des répertoires

La commande `cp` copie **un ou des** fichiers et répertoires vers **une** destination de la manière suivante `cp fichier1 fichier2 fichier3 destination`.

| L'option | sert à |
| --- | --- |
| cp -r | Copier *récursivement* le contenu d'un dossier vers la destination (on ne peut pas copier de répertoires sans cette option) |
| cp -a | Pour *archive*, copie également les attributs (propriétaires et permissions) des fichiers sources. Sans cette option le propriétaire est l'utilisateur courant. |
| cp -i | Pour *interactif*, demande confirmation avant d'écraser un fichier |
| cp -u | Pour *update*, ne copie que les fichiers nouveaux ou plus récents |

## mv - Déplace ou renomme des fichiers et des répertoires

Le fonctionnement est le même que `cp` mais les fichiers sont déplacés vers la destination : `mv fichier1 fichier2 fichier3 destination`. Si `mv` est fait dans le répertoire courant ou si un nom de fichier est ajouté à la destination, le fichier est renommé.

| L'option | sert à |
| --- | --- |
| mv -i | Pour *interactif*, demande confirmation avant d'écraser un fichier |
| mv -u | Pour *update*, ne déplace que les fichiers nouveaux ou plus récents |

## rm - Supprimer des fichiers et des répertoires

La commande `rm` supprimer un ou plusieurs fichiers ou répertoires, par exemple `rm fichier1 fichier2`.

| L'option | sert à |
| --- | --- |
| rm -i | Pour *interactif*, demande confirmation avant de supprimer chaque fichier |
| rm -r | Pour *récursif*, supprimer récursivement tout les dossiers et fichiers des répertoires ciblés |
| rm -f | Pour *force*, ne tient pas compte des avertissements et supprime tout les fichiers |

**Attention** : `rm` peut par erreur supprimer de nombreux fichiers vitaux, par exemple `rm *.log` supprimera tout les fichiers se terminant par `.log`, mais si vous mettez un espace par erreur `rm * .log` supprimera tout les fichiers de votre répertoire. Si vous devez utiliser des *wildcards* il est judicieux de d'abords tester la commande avec `ls * .log` par exemple.

## ln - Créer des liens symboliques

Un lien symbolique est un raccourçi qui référence un fichier ou un dossier. Si je veux créer un lien `image` dans mon *home directory* qui pointe vers le dossier `~/Downloads/photos`, la commande est `ln -s ~/Downloads/photos ~/image`.

On n'utilisera pas `ln` sans l'option `-s` puisque le lien créé serait un `hard link` qui a beaucoup de limitations face aux liens symboliques et qui sont là principalement pour un souci de compatibilité.