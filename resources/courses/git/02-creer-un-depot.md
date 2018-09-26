# Créer un dépot sur github

## Créer un repository

Vous pouvez créer un nouveau repository directement depuis github : [https://github.com/new](https://github.com/new)

Pour ajouter du code dans votre repository, suivez les instructions sur la page de votre repository github, en ligne de commande.

Si votre dossier est vide :

```bash
echo "# test" >> README.md
git init
git add README.md
```

Sinon :

```bash
git init
git add .
```

Dans tout les cas :

```bash
git commit -m "First commit"
git remote add origin git@github.com:tentacode/test.git
git push -u origin master
```

## Récupérer un repository existant (non vide)

```bash
git clone git@github.com:tentacode/votre-repo.git un-repertoire
```

Votre code sera accessible dans le dossier `un-reportoire`.