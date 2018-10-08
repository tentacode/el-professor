# Étape 7 - Relations Doctrine

Vous créerez une relation OneToMany (Category) et une relation ManyToMang (Tags) sur votre entité produit.

## Ressources utiles

* [How to Work with Doctrine Associations / Relations](https://symfony.com/doc/current/doctrine/associations.html)

## Évaluation

Vous serez évalués sur vos compétences à :

* Créer des relations Doctrine avec `make:entity`.
* Faire des migrations qui fonctionnent.
* Lier des objets entre eux dans les fixtures.
* Accéder à des relations dans les templates Twig.

## Consignes

### La relation "Category"

Créer une relation "Category" (ou autre) qui correspond a "Un produit a une seule catégorie, une catégorie est liée à plusieurs produits" (`ManyToOne`).

* Créer une entité "Category" avec `make:entity`.
* Ajouter la relation "category" dans votre entité Product.
* Faire la migration, appliquer la migration (PENSER A VIDER VOS TABLES AVANT).
* Modifier vos fixtures.
* Corriger le code de votre page produit pour la nom de la catégorie s'affiche dans votre table produit.

### La relation "Tags"

Même consignes que ci-dessus, mais avec une relation `ManyToMany`.
