# 1 - Utiliser le Shell

## Le prompt

Quand vous ouvrez votre terminal, la première ligne devrait ressembler à ceci (mais peut varier selon votre OS) : 

```bash
gabriel@PC-GABRIEL:~$
```

Le prompt s'affiche quand le shell est pret à recevoir vos instructions.

`gabriel` est l'utilisateur connecté, `PC-GABRIEL` est le nom de la machine sur laquelle je suis connecté, `~` est le dossier dans lequel je me trouve (mon *home directory*) et `$` signifie que je suis un utilisateur normal (si j'étais connecté en admin, ce qui est déconseillé, je verrais `#` à la place).

## Saisir des commandes

Tapez votre commande dans le terminal en terminant par la touche entrée, par exemple :

```bash
gabriel@PC-GABRIEL:~$ cal
```

Affichera :

```bash
Novembre 2018
Di Lu Ma Me Je Ve Sa
             1  2  3
 4  5  6  7  8  9 10
11 12 13 14 15 16 17
18 19 20 21 22 23 24
25 26 27 28 29 30
```

Dès que vous appuyés sur entrée, la commande se lance. Si vous entrer une commande sur plusieurs lignes (pour plus de lisibilité), c'est possible en utilisant `\` avant d'appuyer sur entrée :

```bash
echo Le petit chat \
est très \
mignon.
```

> Le petit chat est très mignon.

## L'historique des commandes

Les flèches haut et bas permettent de remonter l'historique des commandes saisies pour les rejouer. On peut également récupérer l'historique des dernières commandes avec la commande `history`.

## Quitter le terminal

Pour quitter le terminal il suffit d'utiliser la commande `exit`.