# Les variables

En PHP les variables **n'ont pas de type strict** ce qui veut dire qu'une variable peut être un nombre, puis une chaîne de caractère, puis un objet.

## Affectation d'une variable

On utilise le préfixe `$` pour le nom des variables en PHP, l'affectation se fait avec l'opérateur `=` (à ne pas confondre avec `==` qui sert de comparaison).

```php
$name = "Gabriel"; // affectation d'une variable

echo $name;
```

## Scope d'une variable

On peut accéder au contenu d'une variable après sa définition n'importe où dans son scope. Si la variable est définit dans un script elle sera accessible dans tout le script, mais pas dans les fonctions . Si elle est définit dans une fonction, elle ne sera accessible que dans la fonction.

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
$a = 'bar'; // string, représente une chaine de caractères
$b = 12;    // integer, représente un nombre entier
$c = 12.4;  // float, représente un chiffre à virgule
$d = true;  // boolean, représente les valeurs "vrai" ou "faux"
$list = ['foo', 'bar'];  // array, permet de stocker plusieurs éléments dans une variable
$date = new \DateTime(); // object, permet de créer des types complexes
```

## La variable null

`null` est une variable spéciale qui permet de dire qu'une variable est "vide", mais qu'elle est tout de même définit.

```php
$a = 'Test';
$a = null; // la variable est vide
```

## Le transtypage

On peut changer le type d'une variable avec l'opérateur de transtypage :

```php
$a = (int)"123abcd"; // devient 123
$b = (string)123;    // devient "123"
$c = (bool)0;        // devient false
$d = (bool)"true";   // devient true
$e = (bool)"false";  // devient true 😱 ("false" == true)
```

On peut également connaitre le type d'une variable à l'aide des fonctions `is_` :

```php
is_int(123);       // true
is_bool("false");  // false
is_numeric("123"); // true 😱
```