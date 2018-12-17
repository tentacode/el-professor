# 14 - Les boucles (for, while)

Une boucle permet d'effectuer un traitement plusieurs fois sous conditions.

# La boucle for

La boucle `for` permet d'appliquer un traitement sur chaque élément d'une liste :

```bash
for FRUIT in pomme banane kiwi
do
    echo Le fruit est $FRUIT
done
```
> Le fruit est pomme

> Le fruit est banane

> Le fruit est kiwi

Notez que `FRUIT` est écrit sans `$` puisque c'est un nom de variable *assigné*, comme si on écrivait `FRUIT=banane` à chaque passage dans la boucle. Le code équivaut donc à :

```bash
FRUIT=pomme
echo Le fruit est $FRUIT
FRUIT=banane
echo Le fruit est $FRUIT
FRUIT=kiwi
echo Le fruit est $FRUIT
```

Notez que la liste est juste une chaine de caractère séparée par des espaces, on peut donc en tirer parti pour, par exemple, lister tout les arguments d'un script (`$*` étant la liste de arguments séparés par des espaces) :

```bash
for ARGUMENT in $*
do
    echo "L'argument est $ARGUMENT"
done
```

Pour utiliser `for` pour x itérations, on peut utiliser `seq` qui génère une séquence de nombres séparés par un espace :

```bash
for NUMBER in `seq 1 10`
do
    echo -n "$NUMBER,"
done
```
> 1,2,3,4,5,6,7,8,9,10

## La boucle while

La boucle `while` permet de continuer un traitement tant qu'une condition est vraie :

```bash
while [ "$SECRET" != "sésame" ]
do
    read -p "Quel est le mot de passe ? " SECRET
done

echo BRAVO !
```
> Quel est le mot de passe ? jesaispas

> Quel est le mot de passe ? jesaispaaaaas

> Quel est le mot de passe ? sésame

> BRAVO !

