# 13 - Les conditions (if)

## Les tests

Un `test` est une expression qui retourne `0` (true) ou `1` (false).

On les utilise dans un bloc `if` :

```bash
if [ "Raymond" = "Justin" ]
then
    echo Oui
else
    echo Non
fi
```

Affichera non, car les deux chaînes sont différentes.

Ou directement en shell :

```bash
[ "Raymond" = "Justin" ]
echo $? # affichera 1

# équivaut à
test '[ "Raymond" = "Raymond" ]'
echo $? # affichera 0
```

Il ne faut pas oublier de mettre un espace après `[` et avant `]`. Il existe de nombreux tests différents, lister avec `man test`.

## Tests sur les chaînes

Par exemple :

```bash
if [ "Salut" !=  "$GREET"]
then
    echo "Vous n'avez pas dit Salut mais $GREET."
fi
```

| Test | vérifie |
| --- | --- |
| str1 = str2 | les chaînes sont égales |
| str1 != str2 | les chaînes sont différentes |
| -z str | la chaîne est vide |
| -n str | la chaîne n'est pas vide |
| str | la chaîne n'est pas vide |  

## Tests sur les nombres

Par exemple :

```bash
if [ 12 -ne  13]
then
    echo "C'est vrai, 12 n'est pas égal à 13."
fi
```

| Test | vérifie |
| --- | --- |
| 12 -eq 12 | les nombres sont égaux (*equals*) |
| 12 -ne  13 | les nombres sont différents  (*not equals*) |
| 12 -lt 13 | 12 est strictement inférieur à 13 (*lower than*) |
| 12 -le 13 | 12 est inférieur ou égal à 13 (*lower equals*) |
| 14 -gt 13 | 14 est strictement supérieur à 13 (*greater than*) |
| 14 -ge 13 | 14 est supérieur ou égal à 13 (*greater equals*) |

## Tests sur les fichiers

Par exemple :

```bash
if [ -e ~/test.txt ]
then
    echo "Le fichier ~/test.txt existe."
else
    echo "Le fichier ~/test.txt n'existe pas."
fi
```

| Test | vérifie |
| --- | --- |
| -e chemin_fichier | si le fichier existe |
| -d chemin_fichier | si le fichier est un répertoire |
| -f chemin_fichier | si le fichier est un type fichier |
| -s chemin_fichier | si le fichier n'est pas vide |
| -r chemin_fichier | si le fichier est accessible en lecture |
| -w chemin_fichier | si le fichier est accessible en écriture |
| -x chemin_fichier | si le fichier est exécutable |
| file1 -nt file2 | file1 est plus récent que file2 (*newer than*) |
| file1 -ot file2 | file1 est plus vieux que file2 (*older than*) |

## L'opérateur !

Pour inverser une condition (retourner `true` si la condition est `false` et inversement) on utilisera l'opérateur `!` (sans oublier un espace à droite), ainsi :

```bash
if [ ! 12 -lt 13 ]
then
    echo "12 n'est PAS strictement inférieur à 13"
fi
```

Équivaut à :

```bash
if [ 12 -ge 13 ]
then
    echo "12 n'est PAS strictement inférieur à 13"
fi
```

## Combiner plusieurs conditions

Si on veut tester que deux conditions sont vraies, on utilise l'opérateur `&&` :

```bash
if [ -e file1 ] && [ file1 -nt file2 ]
then
    echo "Le fichier file1 existe et est plus récent que file2."
fi
```

Si on veut tester qu'au moins une condition est vraie, on utilise l'opérateur `||` :

```bash
if [ -e file1 ] || [ -e file2 ]
then
    echo "Le fichier file1 ou file2 existe (ou les deux)."
fi
```

## if, elif et else

`if` et `elif` teste des conditions et n'exécute que la première condition qui retourne `true`. Si aucune condition ne retourne `true` et qu'un bloc `else` est présent, il est alors exécuté.

```bash
if [ "$ARGUMENT" = '--help' ]
then
    echo "Vous avez demandez l'aide ?"
elif [ "$ARGUMENT" = '--reset' ]
then
    echo "Vous voulez recommencer ?"
else
    echo "Merci de faire un choix."
fi
```
