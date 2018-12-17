# 12 - Mathématiques

Pour réaliser des opérations mathématiques à l'aide de l'expansion :

```bash
SUM=$(( 2 + 2 ))
echo $SUM
```
> 4

Différentes opérations :

| Opérateur | Opération |
| --- | --- |
| + | Addition |
| - | Soustraction |
| * | Multiplication |
| / | Division |
| % | Modulo (reste de la division) |  
| ** | Exposant |  

**Attention** les opérations mathématiques en shell se font exclusivement avec des nombres entiers, donc une division retournera systématiquement un entier :

```bash
echo $(( 7 / 2 ))
```
> 3

## Variables typées

On peut déclarer une variable comme un entier pour faciliter l'assignation des variables, par exemple :

```bash
NUMBER=6/3
echo $NUMBER
```
> 6/3

Mais :

```bash
declare -i NUMBER
NUMBER=6/3
echo $NUMBER
```
> 2

## Tests arithmétiques

On peut utiliser `(( ))` au lieu de `[[ ]]` pour réaliser des tests sur des nombres, par exemple :

```bash
if [[ 12 -lt 13 ]]
then
    echo Inférieur
fi
```

Peut être remplacé par :

```bash
if (( 12 < 13 ))
then
    echo Inférieur
fi
```

Différentes opérateurs de comparaison :

| Opérateur | Opération |
| --- | --- |
| == | Égal |
| != | Différent |
| <= | Inférieur ou égal |
| > | Strictement supérieur |
| >= | Supérieur ou égal |
| && | Et logique |
| \|\| | Ou logique |

## Incrémenter / décrémenter

Pour incrémenter, décrémenter on peut utiliser les opérateurs `++` et `--`, par exemple :

```bash
X=4
X=$(( $X + 1))
echo $X
Y=4
Y=$(( $Y - 1))
echo $Y
```
> 5

> 3

Peut être remplacé par :

```bash
X=4
((X++))
echo $X
Y=4
((Y--))
echo $Y
```
