# 4 - Comprendre les commandes

## alias - Créer des alias vers une commande

Avant de créer un shell script, on peut créer un alias quand on réutilise souvent les mêmes commandes d'une certaines manières, par exemple :

```bash
alias lsa='ls -lah'
```

Permetra de lister des répertoire avec notre nouvel alias : `lsa ~/scripts`. Un alias ainsi créé n'existe que pendant la session de terminal courrante.

On peut lister tout les alias actifs avec la commande `alias` sans argument.

On peut supprimer un alias avec la commande `unalias nom_de_mon_alias`.

## type - Connaitre le type d'une commande

Une commande peut être un binaire, un alias ou une `shell builtin` (une commande intégrée dans le shell directement qui ne référence pas un fichier physique).

```bash
type echo
```
> echo is a shell builtin

```bash
type cp
```
> cp is /bin/cp

```bash
type lsa
```
> lsa is aliased to `ls -lah'

## which - Connaitre l'emplacement d'une commande

Utile quand plusieurs version d'une même commande est installée sur le système (par exemple `php`) pour savoir quelle version est appellée si on utilise la commande dans le shell actuel : 

```bash
which php
```
> /usr/local/bin/php

## Obtenir de la documentation pour une commande

Pour les `shell builtin` on peut utiliser la commande `help`, par exemple `help cd` :

```
cd: cd [-L|-P] [dir]
    Change the current directory to DIR.  The variable $HOME is the
    default DIR.  The variable CDPATH defines the search path for
    the directory containing DIR.  Alternative directory names in CDPATH
    are separated by a colon (:).  A null directory name is the same as
    the current directory, i.e. `.'.  If DIR begins with a slash (/),
    then CDPATH is not used.  If the directory is not found, and the
    shell option `cdable_vars' is set, then try the word as a variable
    name.  If that variable has a value, then cd to the value of that
    variable.  The -P option says to use the physical directory structure
    instead of following symbolic links; the -L option forces symbolic links
    to be followed.
```

Certains exécutables peuvent avoir de l'aide avec l'option `--help`, c'est le cas par exemple avec `git --help`.

Presque tout les exécutables ont également un manuel qui peut être obtenu avec la commande `man`, par exemple `man ls`. On peut naviguer dans le manuel avec les mêmes commandes que la commande `less`. Le manuel est souvent intimidant mais il est exhaustif. On peut chercher les entrées du manuel avec la commande `whatis`, par exemple `whatis mv`.

La commande `info` est une variante de `man` qui a l'avantage de permettre la navigation d'une commande à l'autre à l'aide de lien hypertextes, il suffit de mettre le curseur sur une autre commande et d'appuyer sur la touche entrée.