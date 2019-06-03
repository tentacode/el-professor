# Variables et types

En PHP les variables **n'ont pas de type strict** ce qui veut dire qu'une variable peut être un nombre, puis une chaîne de caractère, puis un objet durant sa durée de vie, on ne peut pas non plus forcer le type d'une variable en PHP (sauf exception dans les arguments de fonctions depuis PHP 7 et les propriétés de classes depuis PHP 7.4).

## Affectation d'une variable

On utilise le préfixe `$` pour le nom des variables en PHP, l'affectation se fait avec l'opérateur `=` (à ne pas confondre avec `==` qui sert de comparaison).

Le contenu de la variable réside ensuite en mémoire et est accessible pendant la durée du script.

```php
$name = "Gabriel"; // affectation d'une variable

echo $name;
```

## Scope d'une variable

On peut accéder au contenu d'une variable après sa définition n'importe où dans son scope. Si la variable est définit dans un script elle sera accessible dans tout le script, mais pas dans les fonctions. Si elle est définit dans une fonction, elle ne sera accessible que dans la fonction.

```php
<?php

$name = "Gabriel";

echo $name;

function hello()
{
	$message = "Hello World";
	
	echo $message;
	echo $name; // Undefined variable: name
}

echo $message; // Undefined variable: message

hello();
```

## Types des variables

Selon comment elle a été affectée, on peut déduire le type d'une variable. Il y a 4 types "scalaires" en PHP (boolean, integer, float et string) et des types "composés" (array, object, callable) :

```php
$myCatName = 'Shiva'; // string, représente une chaine de caractères
$myCatWeight = 8;    // integer, représente un nombre entier
$myCatIntelectualQuotient = 1.5; // float, représente un chiffre à virgule
$myCatIsFat = true;  // boolean, représente les valeurs "vrai" ou "faux"

// array, permet de stocker plusieurs éléments (qui peuvent avoir des types différents) dans une variable
$myCatEats = [
	"Potatoes",
	"Parmesan",
	"Thon",
]; 

// object, permet de créer des types complexes
$myCatBirthday = new \DateTime('-12 years'); 
```

Le nom d'une variable est écrit en `$camelCase` (comme les bosses d'un chameau).

## La variable null

`null` est une variable spéciale qui permet de dire qu'une variable est "vide", mais qu'elle est tout de même définit.

```php
$a = 'Test';
$a = null; // la variable est vide

var_dump($b); // une variable non définit contient la valeur null également
```

## Les constantes

Une constante de script est définit avec la fonction `define`, on ne peut plus la changer ensuite.

```php
define('CAT_RACE', 'Européen');

print 'Mon chat est un chat '.CAT_RACE; // on utilise pas de $ pour appeller une constante.

define('CAT_RACE', 'Siamois'); // Notice: Constant CAT_RACE already defined
```

Le nom d'une constante est écrit en majuscule avec des `_`.

## Le transtypage

On peut changer le type d'une variable avec l'opérateur de transtypage :

```php
$a = (int)"123abcd"; // devient 123
$a = (int)"abcd123"; // devient 0 😱
$b = (string)123;    // devient "123"
$c = (bool)0;        // devient false
$d = (bool)"true";   // devient true
$e = (bool)"false";  // devient true 😱 ("false" == true)
```

On peut également connaitre le type d'une variable à l'aide des fonctions `is_` et `gettype` :

```php
is_int(123);       // true
is_bool("false");  // false
is_numeric("123"); // true 😱
gettype(123); // int
gettype(new \DateTime); // object
```

On peut également retrouver un transtypage implicite dans le code, par exemple :

```php
print 123; // 123 est transtypé en string automatiquement
print new \DateTime(); // ne fonctionne pas car un objet DateTime ne peut pas être transtypé en string

if ("quelque chose") {
	// ici quelque chose est transtypé en bool, qui est égal à true
	// le code du if sera donc bien exécuté
} 
```

## Désalouer une variable

Pour libérer l'espace mémoire pris par une variable (avant qu'elle sorte de son scope) on utilisera la fonction `unset` :

```php
$toto = 'Toto';
unset($toto);
var_dump($toto); // affichera "NULL"
```
