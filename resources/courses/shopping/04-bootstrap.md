# Étape 4 - L'ajout de bootstrap

Pour avoir un site plus joli, nous allons ajouter [Bootstrap 4](https://getbootstrap.com/) dans le projet.

Pour ça deux méthodes sont disponibles : en utilisant le CDN de bootstrap (la méthode la plus simple) ou en utilisant **Symfony Webpack Encore** (la méthode plus complexe, mais aussi la plus puissante).

## Évaluation

Vous serez évalués sur vos compétences à :

* Intégrer bootstrap dans le projet selon l'une ou l'autre des méthodes ci-dessous.
* Correctement intégrer les différents éléments de bootstrap dans votre site.
* Produire un html propre dans vos fichier Twig (lisible, commenté, bien indenté).

## Consignes

### Méthode 1 : le CDN de bootstrap

Suivez la doc de bootstrap : [Bootstrap quickstart](https://getbootstrap.com/docs/4.1/getting-started/introduction/).

### Méthode 2 : Symfony Webpack Encore

Pour installer bootstrap avec Encore, vous devrez suivre plusieurs documentations dans cet ordre :

* [Installing Encore](https://symfony.com/doc/current/frontend/encore/installation.html)
* [Setting up your project](https://symfony.com/doc/current/frontend/encore/simple-example.html) (la doc à partir de jQuery est facultative)
* [Using saas](https://symfony.com/doc/current/frontend/encore/css-preprocessors.html#using-sass) (seulement la partie sur saas, car les fichiers de bootstrap sont en saas)
* [Using Bootstrap CSS & JS](https://symfony.com/doc/current/frontend/encore/bootstrap.html)

### Utiliser bootstrap dans votre projet

Une fois installé, vous pouvez ensuite intégrer une des [templates d'exemple](https://getbootstrap.com/docs/4.1/examples/) ou lire la documentation pour utiliser bootstrap dans votre projet.

Vous prendrez soin à mettre le code au bon endroit : dans votre template `base.html.twig`, dans le `templates/layout/menu.html.twig` ou dans les templates `homepage.html.twig` et `product.html.twig` (comme vu dans l'étape 2 du projet).

Le composant le plus pratique pour faire la liste de produit est le composant [Card](https://getbootstrap.com/docs/4.1/components/card/).

Vous êtes libre d'utiliser bootstrap comme vous le voulez tant que ça ressemble à un site marchand au final.
