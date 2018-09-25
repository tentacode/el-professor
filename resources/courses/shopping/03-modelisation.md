# Étape 3 - La modélisation des Entités

Vous créerez des classes PHP (les `Entity`) qui correspondront à vos objets métier (les produits et les utilisateurs).

Vous créerez également une classe permettant de retourner une liste d'instance de produit (votre `Repository`).

## Évaluation

Vous serez évalués sur vos compétences à :

* Modéliser des objets qui correspondent au métier.
* Créer un objet PHP simple avec des getters et setters.
* Créer un objet PHP repository qui retourne un tableau d'instance d'objet.
* Utiliser les namespace pour utiliser une classe PHP depuis une autre classe.

## Consignes

### L'entité produit

Vous crérez une classe `Cat.php` (que vous appelerez en fonction du type de produit de votre projet) dans  `src/Entity/Cat.php`. Elle devra avoir un certains nombre de propriétés `private` qui pourront être modifiées via des accesseurs (méthodes get et set), par exemple pour une propriété `$name` j'aurais une méthode `setName($name)` et une méthode `getName()`.

```php
class Cat
{
    private $id;
    private $name;
    // etc.

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName($name)
    {
        return $this->name;
    }

    // etc.
}
```

Vous déciderez des propriétés qui reflettent le mieux le type de produit que vous vendez, qui peuvent être par exemple : un nom, une description, un type, une date de validité, un prix, un poid, une taille, etc. Chaque propriété devra être du type qui correspondra le mieux (`integer`, `string`, `\DateTime`, etc.). **Les propriétés, noms de classes, et TOUT VOTRE CODE doivent être écrits en anglais.**

Le produit **devra** nécessairement posséder une propriété `$id` de type `integer`.

### L'entité utilisateur

Vous créerez également une classe `User.php` qui aura les propriétés :

* `$id` de type `integer`
* `$email` de type `string`
* `$password` de type `string`
* `$firstname` de type `string`
* `$lastname` de type `string`

### Le repository ProductRepository

Vous creerez une classe `ProductRepository.php` dans `src/Repository/CatRepository.php`. Cette classe devra contenir deux méthodes :

* `findAll()` qui retournera la liste de tout les produits.
* `findOneById($productId)` qui retournera un produit selon son id.

Comme nous n'avons pas pour l'instant de produits dans une base de données, on créera juste une propriété `$products` dans le constructeur qui contiendra des instances de notre produit, la classe `CatRepository` ressemblera donc à :

```php
class CatRepository
{
    private $cats;

    public function __construct()
    {
        $cat1 = new Cat();
        $cat1->setId(11);
        $cat1->setName('Shiva');
        // etc.

        $cat2 = new Cat();
        $cat2->setId(12);
        $cat2->setName('Thalie');
        // etc.

        $cat3 = new Cat();
        $cat3->setId(13);
        $cat3->setName('Thalie');
        // etc.

        $this->cats = [
            $cat1,
            $cat2,
            $cat3,
        ];
    }

    public function findAll(): array
    {
        // ici le code pour retourner tout les produits
    }

    public function findOneById(int $id): Cat
    {
        // ici le code pour retourner un produit qui correspond à l'id
    }
}
```

Dans votre `HomeController.php`, vous créerez une instance de `CatRepository` et appelerez la méthode `findAll()` en remplacement de votre tableau d'objet.

```php
$catRepository = new CatRepository();
$cats = $catRepository->findAll();
```

Dans votre `ProductController.php`, vous créerez une instance de `CatRepository` et appelerez la méthode `findOneById($id)` en remplacement de votre tableau d'objet.

```php
$catRepository = new CatRepository();
$cat = $catRepository->findOneById($productId);
```