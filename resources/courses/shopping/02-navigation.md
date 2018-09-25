# Étape 2 - La navigation entre les pages

Vous créerez une barre de menu pour pouvoir revenir à la page d'accueil.

Sur la page d'accueil vous ajouterez une liste de produits, on pourra cliquer sur les liens de cette liste pour afficher le détail du produit en question.

## Ressources utiles

* [Creating and using templates](https://symfony.com/doc/current/templating.html)
* [Linking to pages](https://symfony.com/doc/current/templating.html#linking-to-pages)

## Évaluation

Vous serez évalués sur vos compétences à :

* Faire des liens entre des pages dans une template Twig.
* Utiliser l'héritage de template Twig pour ne pas avoir de code en doublon.
* Utiliser les filtres de Twig.
* Boucler et accéder au contenu d'un tableau dans Twig.

## Consignes

### La barre de menu

Vous ajouterez sur chacune des pages une barre de menu simple, de la forme :

```html
<ul>
    <li>
        <a href="http://localhost:8000/">Accueil</a>
    </li>
</ul>
```

Pour le lien qui doit diriger vers votre page d'accueil (`HomepageController.php`), vous utiliserez la fonction `path()`.

Comme ce code est en doublon sur les deux pages, vous le mettrez dans un fichier `templates/layout/menu.html.twig` que vous incluerez dans vos templates avec la fonction `include()` de Twig.

Vous en profiterez pour factoriser tout le code html en commun de vos deux pages (tout ce qui n'est pas le `<h1>` et le code spécifique de vos pages) dans un fichier `templates/base.html.twig` dont vos autres templates devront hériter.

### La liste des produits sur la page d'accueil

Dans votre `HomeController.php`, vous allez passer un tableau de produit à la template, le code de votre tableau ressemblera à ça (mais utilisez votre type de produit) :

```php
$products = [
    [
        'id' => 11,
        'name' => 'Shiva',
        'type' => 'Européen',
    ],
    [
        'id' => 12,
        'name' => 'Thalie',
        'type' => 'Siamois',
    ],
    [
        'id' => 13,
        'name' => 'Fridriech',
        'type' => 'Main Coon',
    ],
];
```

El la page devra afficher une liste simple sous la forme :

```html
<ul>
    <li>
        <a href="http//localhost:8000/product/11">
            SHIVA (Européen)
        </a>
    </li>
    <li>
        <a href="http//localhost:8000/product/12">
            THALIE (Siamois)
        </a>
    </li>
    <li>
        <a href="http//localhost:8000/product/13">
            FRIDRIECH (Main Coon)
        </a>
    </li>
</ul>
````

Vous devrez utiliser le filtre Twig `|upper` pour le nom du produit et la fonction `path()` pour diriger vers la bonne page.
