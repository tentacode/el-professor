# 11 - Les variables

Dans un script shell on peut utiliser n'importe quelle variable disponible dans le shell, et créer nos propres variables.

## Créer et utiliser une variable

```bash
MY_VARIABLE="Salut"
echo "Ma variable contient $MY_VARIABLE"
```
> Ma variable contient Salut

Attention à ne pas rajouter d'espaces de chaque côté du signe `=`.

## Bien nommer une variable

Il est recommander d'écrire ses variables en majuscule, de ne pas les abbréger et de trouver des noms qui correspondent à ce qu'elle contient :

```bash
HOME_DIRECTORY_LIST_OUTPUT=`ls -la ~` # bien
homedirectory=`ls -la ~` # pas bien
X=`ls -la` # pas bien
```

## Créer une variable à partir de la sortie d'une commande

```bash
WHERE_AM_I=`pwd`
echo $WHERE_AM_I
```
> /Users/gabriel/Workspace/el-professor

## Les variables spéciales

| La variable | contient |
| --- | --- |
| $0 | le nom du script |
| $1 | le premier argument du script ($2, $3 etc. pour les suivants) |
| $# | le nombre d'arguments du script |
| $* | tout les arguments du script |
| $$ | le PID du script |
| $RANDOM | un nombre aléatoire |

D'autres variables systèmes utiles peuvent être listées avec la command `env`.