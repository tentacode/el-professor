# Étape 1 - Installation du projet

Vous devrez créer le projet Symfony ainsi que deux pages : `la page d'accueil` et `la page détail d'un produit`.

## Ressources utiles

* [Créer un projet Symfony](http://elp.tentacode.net/course/symfony-4/02-installer-symfony)
* [Create your first page in Symfony](https://symfony.com/doc/current/page_creation.html)

## Évaluation

Vous serez évalués sur vos compétences à :

* Installer un projet Symfony.
* Comprendre l'arborescence d'un projet Symfony (où créer les fichiers).
* Créer un controller Symfony avec une route simple (**avec l'anotation `@Route`**).
* Créer une template Twig simple.

## Consignes

Après avoir installer votre projet Symfony avec `composer` et vérifier que tout est opérationnel, vous créerez deux pages.

### La page d'accueil

Vous créerez un Controller `HomepageController.php` au bon endroit dans Symfony, il devra être appelé quand on appele l'url `http://localhost:8000/` (donc la racine de votre serveur).

La page affichera simplement un `<h1>Accueil</h1>`. Le template de la page doit se trouver dans `templates/homepage.html.twig`.

### La page "détail d'un produit"

Vous créerez un Controller `ProductController.php` au bon endroit dans Symfony, il devra être appelé quand on appele l'url `http://localhost:8000/product/123`, "123" est l'id du produit et peut varier.

La page affichera simplement un `<h1>Produit 123.</h1>`. 123 doit varié si il est changé dans l'url. Le template de la page doit se trouver dans `templates/product/detail.html.twig`.
