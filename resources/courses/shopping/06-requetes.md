# Étape 6 - Requêtes

Vous utiliserez le repository pour faire des requêtes complexes en base de données. Vous ajouterez un compteur de vue sur la page produit.

## Ressources utiles

* [Fetching objects from the database](https://symfony.com/doc/current/doctrine.html#fetching-objects-from-the-database)
* [Updating an object](https://symfony.com/doc/current/doctrine.html#updating-an-object)

## Évaluation

Vous serez évalués sur vos compétences à :

* Utiliser le repository pour faire une requête simple.
* Utiliser un `QueryBuilder` pour faire une requête complexe.
* Utiliser l'entity manager pour mettre à jour un produit (compteur de vue).

## Consignes

### Faire une requête simple sur la page produit

Pour afficher un produit, vous utiliserez le repository avec la méthode `find($productId)` dans votre `ProductController`.

### Lister les produits sur votre page d'accueil

Vous utiliserez un query builder pour faire une requête complexe pour votre liste de produit sur votre page d'accueil :

* Utiliser le query builder pour retourner des produits.
* La liste des produits doit être triée (orderBy), par exemple par nom ou par prix du produit.
* La liste de produit doit contenir un nombre limité de produits (setMaxResults), par exemple 3, 5 ou 10.

### Faire un compteur de vue sur la fiche produit

Sur votre fiche produit, vous ajouterez un compteur de vue qui correspond au nombre d'affichage de la page produit (pour ce produit spécifique, chaque produit aura son propre compteur) :

* Ajouter une propriété `viewCounter` à votre entité produit (make:entity, make:migration, doctrine:migration:migrate).
* Mettre à jour le compteur du produit dans ProductController.
* Afficher le compteur à jour dans le template de la fiche produit.
