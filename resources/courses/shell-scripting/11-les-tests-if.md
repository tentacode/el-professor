# 11 - Les conditions (if)

## Les tests

Un `test` est une expression qui retourne `true` ou `false`.

On les utilise dans un bloc `if` :

```bash
if [ "foo" = "bar" ]
then
    echo Oui
else
    echo Non
fi
```

Affichera non, car les deux chaines sont différentes.

Différents tests :

| Test | vérifie |
| --- | --- |
| -d chemin_fichier | si c'est un répertoire |
| -e chemin_fichier | si le fichier existe |
| -s chemin_fichier | si le fichier n'est pas vide |
| -f chemin_fichier | si le fichier existe et est un type fichier |
| -r chemin_fichier | si le fichier est accessible en lecture |
| -w chemin_fichier | si le fichier est accessible en écriture |
| -x chemin_fichier | si le fichier est exécutable |
