# Créer un projet Symfony

Documentation : [Installing & Setting up the Symfony Framework](https://symfony.com/doc/current/setup.html)

Dans votre bash, utilisez composer pour créer un projet Symfony (en remplaçant `repertoire_projet`) :

```bash
composer create-project symfony/website-skeleton repertoire_projet
```

Composer va télécharger et installer toutes les dépendances nécessaires pour utiliser Symfony dans un contexte de site web classique.

Pour une version plus légère à destination d'une API, vous pouvez utiliser `symfony/skeleton` à la place de `symfony/website-skeleton`. Vous pouvez aussi installer `symfony/symfony-demo` à la place pour avoir un exemple d'application complète.

Le projet sera accessible depuis votre répertoire `/mnt/c/Users/gabriel/Symfony/repertoire_projet` : 

```bash
cd /mnt/c/Users/gabriel/Symfony/repertoire_projet
```

Vous pouvez lancer le serveur Symfony simplement avec :

```bash
bin/console server:run
```

Il est possible de spécifier l'IP d'écoute et le port :

```bash
bin/console server:run 127.0.0.1:1337
```

Pour lancer le serveur en tâche de fond : 

```bash
bin/console server:start 127.0.0.1:1337
```

Pour arrêter le server :

```bash
bin/console server:stop
```