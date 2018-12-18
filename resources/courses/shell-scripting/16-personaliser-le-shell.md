# 16 - Personnaliser le shell

## Le motd

Le fichier `/etc/motd` (pour "message of the day") est un fichier texte dont le contenu est afficher en début de session pour chacun des utilisateur qui se connecte, il peut être utile pour diffuser des informations de maintenance du serveur, documenter les services accessibles, etc.

```bash
Bienvenue sur le serveur !

** LE SERVEUR SERA COUPÉ CE SOIR À 20h!!! 😱 **

Adresse de la messagerie : https://mail.tentacode.net
```

## Les fichiers de démarrage

À chaque ouverture de session, plusieurs fichiers (qui sont des scripts shell) sont exécutés, en fonction du type de shell ouvert :

Login shells (une session classique) :

* `/etc/profile` est exécuté et partagé entre tout les utilisateurs
* `~/.bash_profile` est exécuté ensuite, personnalisable par chaque utilisateur. **C'est généralement ce fichier que l'on va modifier pour personnaliser le shell**.

Non-login shells (une session dans une session, ou l'utilisation de la commande `su` pour changer l'utilisateur) :

* `/etc/bash.bashrc` est exécuté et partagé entre tout les utilisateurs
* `~/.bash_rc` est exécuté ensuite, personnalisable par chaque utilisateur

## Exemple de ~/.bash_profile

Quelques utilisations intéressantes du script `.bash_profile` :

* Ajouter des alias
* Customiser le prompt
* Modifier la variable `$PATH` pour permettre à des commandes d'être accessibles de partout.
* Configurer certaines variables du shell
* Se positionner dans un autre répertoire que `~` par défaut.
* Tout ce que vous jugez utile, `.bash_profile` est un script shell classique.

```bash
#!/bin/bash

# ne pas stocker dans l'historique les commandes en double
HISTCONTROL=ignoredups 

# plus d'entrée dans history
HISTSIZE=1000

# alias pour pouvoir chercher dans l'historique
alias histogrep='history | grep'

# un alias qu'il ne vaut mieux pas utiliser
alias gityolo='git add .; git commit -m "YOLO"; git push -f origin master'

# personnaliser le prompt (voir ci-dessous)
PS1='\W$ '

# configurer vim (attention, mieux vaut quand même modifier le fichier directement)
echo "syntax on" > ~/.vimrc

# Ajout du dossier ~/Scripts dans le path pour que les scripts
# contenus dans le dossier soient accessible de partout
PATH=$PATH:~/Scripts

cd ~/Workspace
```

## Personnaliser le prompt

Le prompt est ce qui est affiché dans le terminal quand vous pouvez saisir une commande, par défaut il peut ressembler à :

```bash
MacBook-Pro-de-Gabriel:Workspace gabriel$
```

Le prompt est contenu dans la variable spéciale `$PS1` :

```bash
echo $PS1
```
> \h:\W \u\$

On peut le changer à tout moment dans le shell, ou le modifier dans un fichier de démarrage pour qu'il soit toujours personnalisé :

```bash
PS1='\u@\W [\t]> '
```
> gabriel@Workspace [11:15:37]>

Voilà une liste de commande que vous pouvez utilisez dans le prompt.

| Flag | affiche |
| --- | --- |
| \a | fait un "bip" |
| \d | la date du jour en anglais |
| \h | le nom de la machine (host) |
| \s | le nom du shell |
| \t | l'heure au format 24:59:59 |
| \A | l'heure au format 24:59 |
| \u | l'utilisateur courrant |
| \w | le nom complet du répertoire actuel |
| \W | le dernier dossier du répertoire actuel |
| \\# | le nombre de commandes saisies durant la session |
| \$ | affiche $ pour un user normal et # pour un user root |

Vous pouvez aussi utiliser le retour d'une commande ou d'une fonction directement dans $PS1, elle sera appelée à chaque prompt :

```bash
PS1='`echo $RANDOM`:\W$ '
```
> 6843:Workspace$

Vous pouvez aussi ajouter de la couleur, par exemple :

```bash
PS1='\[\033[0;31m\]\u\[\033[0m\]$ '
```
> <span style="color: red">gabriel</span>$ 

La première partie `\[\033[0;31m\]` sert à passer le texte en rouge. Attention à ne pas oublier de remettre l'affichage par défaut `\[\033[0m\]` à la fin du prompt, sinon même le texte **après** le prompt et tout le reste de votre terminal sera aussi en rouge.

On peut aussi faire varier le type de texte par exemple au lieu de `[0;31m\]`, `[1;31m\]` affichera le texte en **gras**, `[4;31m\]` en souligné, `[5;31m\]` en clignotant (non supporté par la plupart des shells) et , `[7;31m\]` en inversé (couleur et fond).

Liste des couleurs :

| Code | Couleur |
| --- | --- |
| \033[0m | Défaut |
| \033[0;30m | Noir |
| \033[0;31m | Rouge |
| \033[0;32m | Vert |
| \033[0;33m | Marron |
| \033[0;34m | Bleu |
| \033[0;35m | Violet |
| \033[0;36m | Cyan |
| \033[0;37m | Gris clair |
| \033[1;30m | Gris foncé |
| \033[1;31m | Rouge clair |
| \033[1;32m | Vert clair |
| \033[1;33m | Jaune |
| \033[1;34m | Bleu clair |
| \033[1;35m | Violet clair |
| \033[1;36m | Cyan clair |
| \033[1;37m | Blanc |
| \033[0;40m | Fond Noir |
| \033[0;41m | Fond Rouge |
| \033[0;42m | Fond Vert |
| \033[0;43m | Fond Marron |
| \033[0;44m | Fond Bleu |
| \033[0;45m | Fond Violet |
| \033[0;46m | Fond Cyan |
| \033[0;47m | Fond Gris clair |