# 7 - Les commandes de filtre

Les comamndes de filtres prennent en entrée `l'entrée standard` (ou des fichiers en argument) et on comme sortie la `sortie standard`. Ces commandes peuvent donc facilement s'enchainer avec un `pipeline` (voir [Enchainer les commandes](./06-enchainer-les-commandes)).

## cat - concaténer des fichiers

La commande `cat` sert à afficher le contenu d'un ou plusieurs fichiers, si plusieurs fichiers sont passés en arguments, ils sont **concaténés** pour ne former qu'un seul gros texte.

Exemples :

```bash
cat hello.txt # affiche le contenu de hello.tx
cat log0 log1 log2 log3 > log.txt # créé un fichier à partir de 4 autres fichiers
```

## head - obtenir le début d'un fichier

La commande `head` (pour *tête*) affiche les premières lignes d'un fichier ou de l'entrée standard (par défaut 10 lignes) :

```bash
head logs.txt # affiche les 10 premières lignes de logs.txt
head -n 3 logs.txt # affiche les 3 premières lignes de logs.txt
```

## tail - obtenir la fin d'un fichier

La commande `tail` (pour *queue*) affiche les dernières lignes d'un fichier ou de l'entrée standard (par défaut 10 lignes) :

```bash
tail logs.txt # affiche les 10 dernières lignes de logs.txt
tail -n 3 logs.txt # affiche les 3 dernières lignes de logs.txt
```

L'option `-f` (pour *follow*) permet de suivre le fichier en *temps réel*, très pratique quand on veut suivre l'état d'un fichier qui est modifié par une autre commande (comme un fichier de log). Pour quitter l'affichage en temps réel on appuie sur `Ctr + C`.

```bash
tail -f logs.txt
```

## cut - extrait une portion de ligne d'un fichier

La commande `cut` (pour *couper*) permet de récupérer une partie de chaque ligne d'un fichier ou de l'entrée standard, par exemple :

```bash
echo "Le chat est mignon" | cut -c 1-7
```
> Le chat

L'option `-c` permet de spécifier une rangée de caractères à couper.

Exemples :

```bash
echo "Le chat est mignon" | cut -c 1-7,12-18 # affiche "Le chat mignon"
echo "Le chat est mignon" | cut -f 4 -d " " # affiche "mignon" qui correspond au 4e champ, les champs étant délimités par " "
```
> Le chat

## sort - trier des lignes de texte

La commande `sort` (pour *trier*) trie les lignes d'un fichier ou de l'entrée standard et affiche les lignes triées dans la sortie standard. Par défaut `sort` trie les lignes par ordre alphabétique.

Examples :

```bash
sort romeo_et_juliette.txt # trie le fichier par ordre alphabétique
sort -r romeo_et_juliette.txt # trie le fichier par ordre alphabétique inverse
sort -n romeo_et_juliette.txt # trie le fichier en traduisant les lignes en nombres (exemple 123 est plus grand que 23, ce qui est faut en tri alphabétiquee)
sort -rn romeo_et_juliette.txt # trie le fichier par ordre numérique inverse
```

## uniq - dédoublonner des lignes de texte

La commande `uniq` supprime les lignes identiques et consécutives.

Mettons que le fichier `greeting.txt` contienne :

```
Salut
Salut
Salut
Hello
Salut
```

Alors la commande `uniq greeting.txt` affichera :

> Salut

> Hello

> Salut

Si l'ont veut obtenir que les lignes uniques (consécutives ou pas), on peut trier le fichier au préalable :

```bash
sort greeting.txt | uniq
```

Affichera :

> Hello

> Salut

Si on veut récupérer seulement les éléments qui sont en double on peut utiliser `uniq -d greeting.txt` qui affichera :

> Salut

## wc - compter des lignes, mots ou caractères

La commande `wc` (*word count*) permet de compter les lignes, mots (séparés par espace) ou caractères d'un fichier ou d'un flux, par exemple :

```bash
echo "Salut c'est cool" | wc
```
> 1 3 17

Respectivement **1 ligne**, **3 mots** et **17 caractères**.

Exemples :

```bash
wc -l fichier.txt # affiche le nombre de lignes uniquement
wc -w fichier.txt # affiche le nombre de mots uniquement
wc -c fichier.txt # affiche le nombre de caractères uniquement
```

## grep - filtrer des lignes correspondant à une expression

La commande grep (*global regular expression print*) permet de filtrer les lignes d'un fichier ou d'une entrée standard qui correspondent à une expression (ou *pattern*).

Par exemple si j'ai un fichier `fruits.txt` qui contient :

```bash
Poire
Pomme
Bannane
Ananas
```

Voilà ce qu'afficheront les commandes :

```bash
cat fruits.txt | grep Po
```
> Poire

> Pomme

```bash
cat fruits.txt | grep nan
```
> Bannane

> Ananas

La commande `cat fruits.txt | grep po` ne retournera aucun résultat puisque la commande est par défaut **sensible à la case** (les majuscules et minuscules comptent). On peut utiliser l'option `grep -i` (pour *insensitive*) pour rechercher quelque soit la casse.

L'expression peut être une expression régulière, ainsi si on veut chercher les lignes qui commencent par "P" et se termine par "e" on peut écrire :

```bash
cat fruits.txt | grep ^P.*$
```
> Poire

> Pomme

Si on veut seulement les lignes qui ne **correspondent pas** à l'expression, on peut utiliser l'option `-v` (pour *in**v**ert*) :

```bash
cat fruits.txt | grep -v ^P.*$
```
> Bannane

> Ananas

## sed - rechercher remplacer

La commande `sed` (pour *stream editor*) permet de chercher une expression et de la remplacer pour chaque lignes qui correspond à l'expression dans le fichier ou l'entrée standard, par exemple :

```bash
echo "Le chat est mignon" | sed s/mignon/moche/
```
> Le chat est moche

On peut appliquer le replacement sur une ligne en particulier, par exemple :

```bash
echo 'Le chat est mignon
Le chien est mignon
Le rat est mignon' | sed 3s/mignon/moche/
```

> Le chat est mignon

> Le chien est mignon

> Le rat est moche

## tee - redirige la sortie vers la sortie standard ET un fichier

La commande `tee` (pour la lettre *T* qui correspond visuellement à un embranchement avec deux sorties) permet de rediriger l'entrée standard vers un fichier **ET** de la rediriger en sortie standard. Le cas d'utilisation est de sauvegarder le contenu d'une commande, tout en passant la sortie à la commande suivante.

```bash
cat /var/log/php.log | sort | tee sorted_logs.txt | grep ERROR
```

## xargs - exécute des commandes

La commande `xargs` (execute arguments) permet d'exécuter une commande shell à partir de l'entrée standard, par exemple :

```bash
ls /var/log | xargs rm -rf
```

Supprimera tout les fichiers et dossier dans `/var/log`.