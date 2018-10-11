# Utiliser git en équipe

Un bon workflow pour utiliser git en équipe :

* Chaque membre de l'équipe travaille sur une branche de feature (et est tout seul dessus), par exemple "feature_homepage".
* On créé la branche à partir de la branche "master" à jour.
* Personne ne commit directement sur la branche "master".
* Une fois la feature terminée, on "pousse la branche sur github" et on "créée une pull request".
* La pull request est relue par les membres de l'équipe (éventuellement commentée) puis est "mergée" dans master.
* On recommence à partir d'une nouvelle branche de feature.

## Créer la branche de feature

On se met sur la branche master :

```bash
git checkout master
```

On s'assure que la branche master est à jour :

```bash
git pull
```

On créé la nouvelle branche :

```bash
git checkout -b feature-homepage
```

## Travailler sur la branche feature

C'est le même principe que [ajouter du code sur github](http://elp.tentacode.net/course/git/03-ajouter-du-code) :

```bash
git status
git add .
git commit -m "Un message de commit en français"
git push
```

La première fois que vous "pusher" sur la branche, vous aurez une erreur :

```
fatal: The current branch feature-homepage has no upstream branch.
To push the current branch and set the remote as upstream, use

    git push --set-upstream origin feature-homepage
```

Il vous suffit d'utiliser la commande en exemple :

```bash
git push --set-upstream origin feature-homepage
```

Vous noterez que dans le message du push, on vous propose un lien pour créer la pull request :

```
remote: Create a pull request for 'feature-homepage' on GitHub by visiting:
remote:      https://github.com/tentacode/el-professor/pull/new/feature-homepage
```

## Créer une pull-request

Une fois que vous êtes satisfait de votre branche feature, ou si quelqu'un d'autre à besoin de vos modifications, vous pouvez créer une pull request dans l'interface de github.

Chaque membre de l'équipe peut commenter la pull request, quand vous êtes satisfait vous pouvez la merger dans master et recommencer à créer une nouvelle branche en partant de master comme indiquer ci-dessus.