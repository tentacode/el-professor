# 15 - Les fonctions

Une fonction permet de réutiliser du code à plusieurs endroits d'un script :

```bash
function hello()
{
    echo Salut $1 !
}

hello Gabriel
hello Charles-Henri
```

> Salut Gabriel !

> Salut Charles-Henri !

Une fonction ne peut pas avoir d'argument nommés comme dans d'autre langage de programmation, mais on peut utiliser `$1`, `$2` etc. comme on le ferait avec un script shell.

## Ordre dans le script

Un shell script est lu de haut en bas, on ne peut donc pas appeller une fonction avant qu'elle soit déclarée :

```bash
hello Gabriel

function hello()
{
    echo Salut $1 !
}

hello Charles-Henri
```
> ./script.sh: line 2: hello: command not found

> Salut Charles-Henri !

C'est pour cette raison qu'on écrit généralement toutes les fonctions en haut du script.

## Code de retour

Une fonction peut retourner un code retour (un nombre entre 0 et 255) à la manière des codes retour des commandes :

```bash
function magical_number()
{
    return 42
}

magical_number
echo $?
```
> 42

Attention à ne pas utiliser `exit` au lieu de `return`, qui terminerait le script.

Retourner un nombre plus grand que 255 n'a pas le résultat attendu (le nombre retourné est le `modulo 256` du nombre) :

```bash
function magical_number()
{
    return 1337
}

magical_number
echo $?
```
> 57

## Utiliser les variables

Pour contourner les limitations de `return` on peut utiliser des variables.

Une variable définit dans une fonction est utilisable après son appel, à moins d'utilisé le mot clé `local` :

```bash
function magical_number()
{
    local SECRET=42
    MAGICAL_NUMBER=1337
}

magical_number
echo $SECRET
echo $MAGICAL_NUMBER
```
>  

> 1337

## Réutiliser des fonctions dans plusieurs scripts

Pour réutiliser des fonctions dans plusieurs scripts (afin d'éviter les copier-collers), on peut utiliser la commande `source` :

```bash
source ./magical_number.sh
magical_number
```

Attention `source` exécute le fichier en argument comme si il était dans le script courrant, donc si il contient des commandes en plus des fonctions, elles seront aussi apellées.

On peut également utiliser la notation `.` qui aura le même effet :

```bash
. ./magical_number.sh
magical_number
```
