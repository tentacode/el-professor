# 6 - Enchainer des commandes

## Les tubes (ou pipelines)

Les tubes (ou `pipelines` ou `pipe`) permettent d'utiliser la sortie standard (sans les erreurs) d'une commande comme entrée standard d'une autre commande. C'est un **mécanisme puissant** pour enchainer des commandes sans avoir besoin de stocker le résultat intémédiaire.

Par exemple, les commandes enchainées :

```bash
cat romeo_et_juliette.txt | grep poison | sort | less
```

Va lire le fichier `romeo_et_juliette.txt`, puis la sortie de `cat` qui contient l'intégralité du fichier est envoyée à la commande `grep` qui va filtrer chaque ligne et retourner uniquement les lignes qui contiennent le mot "poison", les lignes résultantes qui sont la sortie standard de `grep` sont ensuite envoyées en entrée de la commande `sort` qui va trier ces lignes par ordre alphabétique. Enfin `sort` redirige sa sortie vers le programme `less` qui affichera les lignes correspondantes avec la possibilité de naviguer dans le résultat comme si c'était un fichier.

À noter que même si l'une des commandes est en erreur, toutes les commandes seront exécutées.

## Les codes de retour des commandes

La variable spéciale `$?` contient le code retour de la dernière commande exécutée, par exemple :

```bash
ls ..
echo $?
```
> 0

`0` correspond à une commande exécutée **avec succès**.

```bash
ls existe_pas
echo $?
```
> 1

Tout les codes différents de `0` (souvent c'est le code `1` qui est retourné, mais ça peut être n'importe quel entier) correspondent à une commande exécutée **en échec**.

## L'opérateur &&

L'opérateur `&&` (dit aussi "et") permet d'exécuter une commande à la suite d'une autre si et seulement si la commande précédente a été exécutée avec succès (code retour 0) :

```bash
ls .. && echo "ok" # affichera le contenu de ls et "ok"
ls existe_pas && echo "ok" # affichera uniquement le contenu de ls
```

Cela permet d'exécuter certaines commandes qui n'ont du sens que si la commande précédente s'est bien passée.

## L'opérateur ||

L'opérateur `||` (dit aussi "ou") permet d'exécuter une commande à la suite d'une autre si et seulement si la commande précédente n'a pas été exécutée avec succès (code retour différent de 0) :

```bash
ls .. || echo "non" # affichera uniquement le contenu de ls
ls existe_pas || echo "non" # affichera l'erreur, puis "non"
```

Cela permet d'exécuter des commandes "par défaut" au cas où une commande précédente aurait échouée.

## L'opérateur ;

L'opérateur `;` permet d'enchainer une commande peut importe le résultat de la commande précédente ainsi :

```bash
ls blabla; ls ..; echo "Je m'en fiche"
```

Est équivalent à lancer les commandes sur des lignes différentes :

```bash
ls blabla
ls ..
echo "Je m'en fiche"
```
