# Ajouter du nouveau code sur github

## Vérifier les fichiers modifiés

Pour savoir ce qui a été modifié.

```bash
git status
```

Pour voir la différence sur tout le code :

```bash
git diff
```

Pour voir la différence juste sur une partie du code :

```bash
git diff src/Controller
```

## Prendre en compte une modification

Ajouter certains fichiers qui seront envoyés vers git :

```bash
git add README.md
git add index.php
```

Ajouter tout un répertoire :

```bash
git add src/
```

Ajouter tout les fichiers modifiés :

```bash
git add .
```

## Supprimer un fichier

Pour supprimer un fichier qui est présent sur git :

```bash
git rm README.md
```

Le fichier ne sera pas supprimer tout de suite dans git, mais il disparait du filesystem.

## Créer un commit

Un commit est une modification qui contient plusieurs fichiers ajoutés / modifiés / supprimés.

```bash
git commit -m "Un message explicite en français, c'est toujours mieux"
```

Le code ne sera toujours pas disponible sur github.

## Pusher les modifications

Envoyer tout les commits qui sont en local mais qui ne sont pas sur github :

```bash
git push
```