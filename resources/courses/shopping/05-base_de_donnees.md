# Étape 5 - Création de la bdd

Vous allez créer une base de données MySQL qui correspondra à votre catalogue de produits.

## Ressources utiles

* [Installer et configurer MySQL sur debian](http://elp.tentacode.net/course/symfony-4)
* [Symfony & Doctrine](https://symfony.com/doc/current/doctrine.html)

## Évaluation

Vous serez évalués sur vos compétences à :

* Créer des entités / tables MySQL avec les bons types de champs qui correspondent à vos produits.
* Utiliser les migrations pour créer votre base de données.
* Générer des données de tests cohérentes avec des fixtures pour remplir votre base de données.

## Consignes

### Installer MySQL sur votre Debian

Suivez la doc d'instalation : [Installer et configurer MySQL sur debian](http://elp.tentacode.net/course/symfony-4)

### Créez vos entités

Vous avez déjà une classe `src/Entity/Product.php` et `src/Entity/User.php` et une classe `src/Entity/ProductRepository.php`.

* Renommer ces classes en ajoutant le suffixe `.old` (par exemple : `src/Entity/User.php.old`) pour en garder la trace.
* Utilisez la commande `bin/console make:entity` pour recréer vos entités et les repository correspondants.
* Vous veillerez à utiliser les bons types de champ pour vos produits.

### Créez votre base de données et les migrations

* Créez votre base de données avec la commande `bin/console database:create`.
* Créez vos migrations avec la commande `bin/console make:migration`.
* Créez vos tables avec la commande `bin/console doctrine:migration:migrate`.

### Créez vos fixture

Il n'y a pas encore de doc sur la gestion des fixtures avec Symfony 4, mais vous avez toute l'aide dont vous avez besoin avec la commande `bin/console make:fixtures --help`.

Vous pouvez aussi lire [la documentation Symfony 3 sur les fixtures](https://symfony.com/doc/master/bundles/DoctrineFixturesBundle/index.html) qui vous donnera une idée du principe (mais l'utilisation est un peu différente) : 

* Si la commande plante, installer le paquet manquant.
* Générez une classe de fixtures (par exemple `ShoppingFixtures`).
* Remplissez la classe avec vos données de tests (instanciez des entités, remplissez les données...).
* Lancer les fixtures avec `bin/console doctrine:fixtures:load`.
* Vos données doivent apparaitre dans vos tables MySQL.
