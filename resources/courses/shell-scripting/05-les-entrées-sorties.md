# 5 - Les Entrées / Sorties

Ou Input / Output (IO).

## La sortie standard

Quand on exécute une commande, généralement l'affichage du résultat de la commande se fait sur `la sortie standard` (ou `standard output`).

```bash
echo Hello
```
> Hello

Par defaut la `sortie standard` d'une commande correspond à l'affichage dans le terminal.

## Rediriger la sortie standard vers un fichier

Si on veut "sauvegarder" la sortie dans un fichier au lieu de l'afficher dans le terminal on peut **rediriger** la sortie standard avec l'opérateur `>` :

```bash
echo Hello > salut
```

Le terminal n'affichera rien du tout, mais le fichier `salut` contiendra "Hello". On peut rediriger la sortie de n'importe quelle commande vers un fichier, par exemple `ls -la /etc > liste_repertoire_config`. C'est pratique si on veut "stocker" le résultat d'une commande, pour le traiter plus tard par exemple.

Si le fichier n'existe pas, il est créé (à la manière de la commande `touch`).

Si le fichier existe, son contenu est **remplacé** (aucune confirmation n'est demandée). Si on veut écrire la sortie à la fin du fichier (en ajoutant au contenu précédent), on peut utiliser l'opérateur `>>`.

```bash
echo "À rajouter à la fin du fichier" >> salut
```

## La sortie erreur

La sortie erreur (ou `error output`) est une **deuxième sortie** différente de la sortie standard, qui correspond à l'affichage des messages d'erreur. Pour comprendre en quoi c'est une sortie différente de la sortie standard, exécutons la commande suivante :

```bash
ls repertoire_non_existant > output.txt
```
> ls: repertoire_non_existant: No such file or directory

Le terminal affiche bien une sortie, et le fichier `output.txt` a bien été créé mais il est vide ! La raison est que la sortie standard n'a rien affichée, mais le message "ls: repertoire_non_existant: No such file or directory" a été affiché sur la `sortie erreur`.

## Rediriger la sortie erreur

Pour comprendre comment rediriger la sortie erreur, il faut comprendre que les trois entrées / sorties ont chacune leur numéro de descripteur (ou `file descriptor`) :

* `0` : l'entrée standard `stdin`
* `1` : la sortie standard `stdout`
* `2` : la sortie erreur `stderr`

Ce numéro correspond à un `pointeur de fichier ouvert` (tout les fichiers ont leur propre pointeurs, l'entrée et la sortie sont donc **considérés comme des fichiers** !).

Par défaut l'opérateur `>` redirige sur la sortie standard, mais on peut le préfixer par le numéro de descripteur pour rediriger la sortie en question.

```bash
ls repertoire_non_existant 2> output.txt
```

Cette fois la commande n'affiche pas de sortie dans le terminal et le fichier `output.txt` contient bien "ls: repertoire_non_existant: No such file or directory".

## Rediriger les deux sorties vers un fichier

Souvent il est pratique de vouloir récupérer tout l'affichage d'une commande, que ce soit l'affichage normal et les erreurs, pour ça on peut cumuler les deux sorties :

```bash
ls exisite_ou_pas > tout.txt 2>&1
```

La commande ci-dessus redirige d'abords la sortie standard vers le fichier `tout.txt`, puis la sortie erreur sur la sortie standard. Le résultat est que les deux sorties seront redirigées au final vers le fichier.

Les versions récentes de `bash` permettent d'obtenir le même résultat avec l'opérateur `&>` :

```bash
ls exisite_ou_pas &> tout.txt
```

## Rediriger vers rien du tout

Si on ne veut pas que le résultat d'une commande s'affiche, et qu'on ne veut pas non plus rediriger les sorties vers un fichier, on peut utiliser la redirection sur le fichier spécial `/dev/null`. Ce fichier aussi appelé "bit bucket" accepte une entrée, mais ne fait rien avec.

```bash
ls existe_ou_pas > /dev/null # affichera seulement les erreurs
ls existe_ou_pas 2> /dev/null # affichera seulement la sortie standard
ls existe_ou_pas &> /dev/null # n'affichera rien du tout
```

## L'entrée standard

La plupart des commandes sous Linux accepte de recevoir l'entrée standard à la place de paramêtres de commandes. C'est par exemple le cas de la commande `cat`.

La commande `cat` affiche le contenu d'un ou plusieurs fichiers en paramêtre, par exemple :

```bash
cat hello.txt
```

Affichera le contenu du fichier `hello.txt`.

Si on lance la commande `cat` sans paramêtre, le terminal attends que l'on saisisse du texte, jusqu'à interrompre la commande avec `Ctr + C` :

```bash
cat
Je suis en train de taper au clavier
```
> Je suis en train de taper au clavier

> Je suis en train de taper au clavier

Tout le texte qu'on saisit est réafficher en dessous. La raison est que sans paramêtre la fonction `cat` prends **l'entrée standard** en entrée, et l'entrée standard par défaut est : le clavier. C'est donc ce qu'on tape au clavier qui est réafficher en dessous.

## Rediriger un fichier vers l'entrée standard

Pour utiliser un fichier à la place de l'entrée standard, on utilisera l'opérateur `<`, ainsi la commande `cat hello.txt` peut aussi s'écrire : 

```bash
cat < hello.txt
```
