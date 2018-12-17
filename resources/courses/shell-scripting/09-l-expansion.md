# 9 - L'expansion

La commande `echo` prend en argument des chaines séparées par des espaces, et les affiche :

```bash
echo Salut Gabriel
```
> Salut Gabriel

Regardons ce qui se passe quand on tape la commande `echo *` depuis notre dossier home :

> Applications Desktop Documents Downloads Dropbox Library Movies Music Pictures Public Screenshots

La commande a listé tout le contenu de notre home directory !

Le mécanisme d'expansion agit **avant** l'exécution d'une commande quand on appuie sur la touche entrée dans le terminal, et remplace certaines partie de la commande dans une autre chaine de caractère, c'est le résultat **remplacé** qui est réélement envoyé à la commande, donc si on prend par exemple la commande ci-dessus, **c'est en réalité cette commande qui a été exécutée** de manière transparente :

```bash
echo Applications Desktop Documents Downloads Dropbox Library Movies Music Pictures Public Screenshots
```

## Empêcher l'expansion

Pour empêcher l'expansion il suffit d'encapsuler la chaîne dans des guillemets simples :

```bash
echo '*'
```
> \* 


## Expansion de chemins

On peut utiliser `*` comme "joker" pour remplacer n'importe quels caractères dans un chemin de fichier, par exemple :

```bash
echo D*
``` 
> Desktop Documents Downloads Dropbox

```bash
echo *s
``` 
> Applications Documents Downloads Movies Pictures Screenshots

On peut utiliser `?` comme joker pour un unique caractère :

```bash
echo D?wnloads
```
> Downloads

## Expansion arithmétique

On peut réaliser des opérations mathématiques avec l'expansion en utilisant `$(( operation ))`, par exemple :

```bash
echo $(( 2 + 2 ))
```
> 4

Ou grouper plusieurs opérations avec des `()` :

```bash
echo $(( 2 * (2 + 5) ))
```
> 14

Pour en savoir plus sur les opérations mathématiques, voir [le chapitre correspondant](./12-mathematiques).

## Brace expansion

L'expansion "brace" (pour accolades) permet de générer plusieurs chaines à l'aide d'une expression, par exemple :

```bash
echo file-{1,2,3}.jpg
```
> file-1.jpg file-2.jpg file-3.jpg

Ce mécanisme est très pratique pour créer des listes de fichiers ou de répertoires.

On peut également générée des intervalles :

```bash
echo file-{1..5}.jpg
echo file-{A..E}.jpg
```
> file-1.jpg file-2.jpg file-3.jpg file-4.jpg file-5.jpg

> file-A.jpg file-B.jpg file-C.jpg file-D.jpg file-E.jpg

Ou encore combiner plusieurs expansion pour générer des chaines plus complexes :

```bash
echo dir/{2010..2012}/{1..12}
```
> dir/2010/1 dir/2010/2 dir/2010/3 dir/2010/4 dir/2010/5 dir/2010/6 dir/2010/7 dir/2010/8 dir/2010/9 dir/2010/10 dir/2010/11 dir/2010/12 dir/2011/1 dir/2011/2 dir/2011/3 dir/2011/4 dir/2011/5 dir/2011/6 dir/2011/7 dir/2011/8 dir/2011/9 dir/2011/10 dir/2011/11 dir/2011/12 dir/2012/1 dir/2012/2 dir/2012/3 dir/2012/4 dir/2012/5 dir/2012/6 dir/2012/7 dir/2012/8 dir/2012/9 dir/2012/10 dir/2012/11 dir/2012/12

## Expansion de commande

On peut récupérer le résultat d'une commande pendant l'expansion également :

```bash
ls `echo *` # affichera le contenu de chaque répertoire du répertoire courrant
ls $(echo *) # une autre manière de l'écrire
```