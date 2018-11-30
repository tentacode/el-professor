# 2 - Naviguer dans le Shell

Quand vous ouvrez votre terminal, par défaut vous vous trouvez dans votre "*home directory*" (ou "*home*"). Sur debian ce dossier est `/home/gabriel` (ou `gabriel` sera remplacé par votre nom d'utilisateur). Chaque utilisateur a son propre home directory.

## Les chemins

Un chemin (ou "*path*" en anglais) correspond à l'emplacement d'un fichier ou dossier sur le système. Le chemin du fichier `hello.sh` qui se trouve dans le dossier `scripts` de mon *home directory* sera `/home/gabriel/scripts/hello.sh`.

Le chemin `/` correspond à la racine du serveur, le dossier le plus haut dans la hiérarchie de dossier. chaque dossier est séparé par le caractère `/` (attention sur windows il s'agit du caractère `\`).

On parle de chemin absolu quand un chemin est complet à partir de la racine du serveur, par exemple `/home/gabriel/scripts/hello.sh`. Ce chemin absolu sera toujours valable peut importe dans quel dossier on se trouve actuellement.

On parle de chemin relatif quand le chemin est relatif au dossier dans lequel on se trouve. Par exemple si je me trouve dans `/home/gabriel` le chemin relatif de `hello.sh` sera `./scripts/hello.sh` (équivalent à `scripts/hello.sh`).

`.` est utilisé dans les chemins relatifs pour désigner le dossier dans lequel on se trouve.

`..` est utilisé dans les chemins relatifs pour désigner le dossier parent. On peut tout à fait cumuler plusieurs fois ces racourcis par exemple `../../../test` correspond au dossier test qui se trouve à trois niveau de dossier au dessus du dossier actuel.

## Afficher le répertoire courrant

La commande `pwd` affiche le chemin absolu du répertoire dans lequel vous vous trouvez actuellement :

```bash
pwd
```

> /home/gabriel

Le même résultat peut être obtenu en affichant le contenu de la variable spéciale `$PWD` soit `echo $PWD`.

## cd - Changer de répertoire

La commande `cd` (*change directory*) permet de changer de répertoire. Par exemple pour aller dans le répertoire `/home/gabriel/scripts` :

```bash
cd /home/gabriel/scripts
```

Je peux également, si je me trouve déjà dans `/home/gabriel` utiliser le chemin **relatif** avec `cd ./scripts` ou `cd script`.

Je peux également changer de dossier en utilisant le chemin relatif du parent, ainsi si je suis dans `/home/gabriel/scripts` la commande `cd ../../alice` remonte de deux dossiers, je me retrouverais dans le dossier `/home/alice`.

| La commande | sert à |
| --- | --- |
| cd | Aller au home directory |
| cd ~ | Aller au home directory |
| cd ~alice | Aller au home directory de l'utilisateur alice |
| cd - | Retourner au dernier dossier visité |

## ls - Lister le contenu d'un répertoire

La commande `ls` permet de lister le contenu (fichiers et dossiers) d'un répertoire. On peut l'appeler sans argument pour lister le contenu du répertoire courant ou avoir un ou plusieurs dossiers en argument pour avoir la liste des fichiers de chaque répertoires :

```bash
ls Downloads Documents
```

Affichera par exemple :

```bash
Documents/:
facture1.pdf
mon_cours.txt

Downloads/:
chaton_mignon.jpg
video_lol.mp4
```

Pour avoir plus de détail, on utilisera généralement `ls -l` (pour *long*) :

```bash
-rw-r--r--@  1 gabriel  staff     135376 10 sep 11:37 chaton_mignon.jpg
-rw-r--r--@  1 gabriel  staff     122422 16 oct 14:45 video_lol.mp4
drwxr-xr-x@  3 gabriel  staff         96  2 oct 15:44 SousTitre
```

On retrouvera dans l'ordre : les permissions du fichier (voir `chmod`), l'utilisateur, le groupe, le poids du fichier en octet, la date de dernière modification et le nom du fichier. Le premier caractère correspond au type du fichier (`d` pour un dossier)

| L'option | sert à |
| --- | --- |
| ls -a | Afficher aussi les fichiers et dossiers cachés |
| ls -h | Afficher la taille du fichier en *human readable* (avec M pour megabytes par exemple) |
| ls -S | Trier les résultats par taille décroissante |
| ls -t | Trier les résultats par date décroissante |
| ls -r | Inverser l'ordre de tri |

## file - Afficher des informations sur un fichier

`file` donne de nombreuses informations sur un fichier, par exemple `file chaton.jpg` affichera :

> chaton.jpg: JPEG image data, JFIF standard 1.01, aspect ratio, density 72x72, segment length 16, Exif Standard: [TIFF image data, big-endian, direntries=6, orientation=upper-left, xresolution=86, yresolution=94, resolutionunit=2], baseline, precision 8, 640x1136, frames 3

Utilisée sur un répertoire, la commande `file` affichera juste :

> Downloads/: directory

## stat - Afficher des statistiques sur un fichier

@TODO

## less - Afficher le contenu d'un fichier

Pour afficher le contenu d'un fichier en intégralité on peut utiliser la commande `cat`. Cependant la commande `less` est à privilégié car elle permet de se déplacer progressivement dans le fichier ligne par ligne avec la touche entrée ou les flèches haut / bas, et page par page avec les touches *page suivante* (ou b) et *page précedente* (ou la touche espace).

On l'appelera avec le nom du fichier par exemple `less /var/log/symfony.log`.

| Racourcis | sert à |
| --- | --- |
| g | Se déplacer au début du fichier |
| G | Se déplacer à la fin du fichier |
| /bidule | Se déplacer à la première occurence du mot "bidule" |
| h | Afficher l'aide |
| q | Quitter less |

## Les répertoires importants

| Le répertoire | contient |
| --- | --- |
| / | la racine du serveur (*root*) |
| /bin | des exécutables  (*binaries*) |
| /dev | les périphériques (*devices*) |
| /etc | les fichiers de configuration |
| /home | les données propes à chaque utilisateur |
| /media | les points de montage (clé USB, CD…)  |
| /root | le dossier home de l'utilisateur `root`  |
| /sbin | les exécutables réservés au système  |
| /tmp | les fichiers temporaires (peut être vidé automatiquement)  |
| /usr | contient les programmes des utilisateurs normaux  |
| /var | contient le contenu "changeant" : bases de données, logs… |